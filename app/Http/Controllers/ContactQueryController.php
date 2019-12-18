<?php

namespace App\Http\Controllers;

use App\ContactQuery;
use Illuminate\Http\Request;

class ContactQueryController extends Controller
{
    // Contact Queries
    public function index(Request $request)
    {
        $keyword = $request->get('search');
        $perPage = 25;

        if (!empty($keyword)) {
            $contactQuery = ContactQuery::where('query_message', 'LIKE', "%$keyword%")
                ->orWhere('name', 'LIKE', "%$keyword%")
                ->orWhere('email', 'LIKE', "%$keyword%")
                ->orWhere('phone', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $contactQuery = ContactQuery::latest()->paginate($perPage);
        }

        return view('admin.contact.index', compact('contactQuery'));
    }

    // Show Quer details
    public function show($id)
    {
        $contactQuery = ContactQuery::findOrFail($id);

        return view('admin.contact.show', compact('contactQuery'));
    }

    public function edit($id)
    {
        $contactQuery = ContactQuery::findOrFail($id);

        return view('admin.contact.edit', compact('contactQuery'));
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
        
        $page = ContactQuery::findOrFail($id);
        $page->update($requestData);

        return redirect('admin/support/contact-query')->with('flash_message', 'Query updated!');
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
        ContactQuery::destroy($id);

        $notification = array(
            'message' => 'Query Deleted successfully!',
            'alert-type' => 'success',
        );

        return redirect('admin/support/contact-query')->with($notification);
    }
}
