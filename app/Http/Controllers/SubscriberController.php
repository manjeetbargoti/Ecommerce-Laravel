<?php

namespace App\Http\Controllers;

use App\Subscriber;
use Illuminate\Http\Request;

class SubscriberController extends Controller
{
    // Subscriber List
    public function index(Request $request)
    {
        $keyword = $request->get('search');
        $perPage = 25;

        if (!empty($keyword)) {
            $subscriber = Subscriber::where('name', 'LIKE', "%$keyword%")
                ->orWhere('email', 'LIKE', "%$keyword%")
                ->orWhere('phone', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $subscriber = Subscriber::latest()->paginate($perPage);
        }

        return view('admin.subscriber.index', compact('subscriber'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('admin.product-query.create');
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

        Subscriber::create($requestData);

        $notification = array(
            'message' => 'Subscriber Added!',
            'alert-type' => 'success',
        );

        return redirect('admin/product-query')->with($notification);
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
        $subscriber = Subscriber::findOrFail($id);

        return view('admin.subscriber.show', compact('subscriber'));
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
        $subscriber = Subscriber::findOrFail($id);

        return view('admin.subscriber.edit', compact('subscriber'));
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

        $subscriber = Subscriber::findOrFail($id);
        $subscriber->update($requestData);

        $notification = array(
            'message' => 'Subscriber updated!',
            'alert-type' => 'success',
        );

        return redirect('admin/support/subscribers')->with($notification);
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
        Subscriber::destroy($id);

        $notification = array(
            'message' => 'Subscriber deleted!',
            'alert-type' => 'danger',
        );

        return redirect('admin/support/subscribers')->with($notification);
    }

    // Subscribe Now
    public function subscribeNow(Request $request)
    {
        $requestData = $request->all();

        Subscriber::create($requestData);

        $notification = array(
            'message' => 'Subscribed successfully!',
            'alert-type' => 'success',
        );

        return redirect()->back()->with($notification);

        // dd($requestData);
    }
}
