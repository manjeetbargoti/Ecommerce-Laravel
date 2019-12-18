<?php

namespace App\Http\Controllers\Admin;

use App\Page;
use App\ContactQuery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Http\Controllers\Controller;

class PagesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $keyword = $request->get('search');
        $perPage = 25;

        if (!empty($keyword)) {
            $pages = Page::where('name', 'LIKE', "%$keyword%")
                ->orWhere('slug', 'LIKE', "%$keyword%")
                ->orWhere('content', 'LIKE', "%$keyword%")
                ->orWhere('status', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $pages = Page::latest()->paginate($perPage);
        }

        return view('admin.pages.index', compact('pages'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('admin.pages.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        
        $requestData = $request->all();

        // dd($requestData);
        
        Page::create($requestData);

        return redirect('admin/pages')->with('flash_message', 'Page added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        $page = Page::findOrFail($id);

        return view('admin.pages.show', compact('page'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        $page = Page::findOrFail($id);

        return view('admin.pages.edit', compact('page'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Request $request, $id)
    {
        
        $requestData = $request->all();
        
        $page = Page::findOrFail($id);
        $page->update($requestData);

        return redirect('admin/pages')->with('flash_message', 'Page updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        Page::destroy($id);

        return redirect('admin/pages')->with('flash_message', 'Page deleted!');
    }

    // View Single Page
    public function singleCms(Request $request, $url=null)
    {
        if($request->isMethod('post') && request()->is('contact')){
            $requestData = $request->all();
            ContactQuery::create($requestData);

            $admin_email = 'msb.2905@gmail.com';

            $messageData = ['email' => $requestData['email'], 'name' => $requestData['name'], 'phone' => $requestData['phone'], 'query_message' => $requestData['query_message']];
            Mail::send('emails.contact_email', $messageData, function ($message) use ($admin_email) {
                $message->to($admin_email)->subject('Contact us Query form VVV Luxury website');
            });

            $notification = array(
                'message' => 'Query Submitted successfully!',
                'alert-type' => 'success',
            );

            return redirect()->back()->with($notification);

        }

        $pageData = Page::where('slug',$url)->first();
        if($pageData['status'] == 1){
            if($pageData['page_type'] == 1){
                return view('front.pages.single_page',compact('pageData'));
            }elseif($pageData['page_type'] == 2){
                return view('front.pages.contact_us',compact('pageData'));
            }
        }else{
            abort('Page not found!');
        }
        
    }
}
