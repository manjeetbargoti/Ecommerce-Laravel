<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\ProductVendor;
use Illuminate\Http\Request;

class ProductVendorController extends Controller
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
            $productvendor = ProductVendor::where('name', 'LIKE', "%$keyword%")
                ->orWhere('business_name', 'LIKE', "%$keyword%")
                ->orWhere('status', 'LIKE', "%$keyword%")
                ->orWhere('description', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $productvendor = ProductVendor::latest()->paginate($perPage);
        }

        return view('admin.product-vendor.index', compact('productvendor'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('admin.product-vendor.create');
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
        
        ProductVendor::create($requestData);

        return redirect('admin/product-vendor')->with('flash_message', 'ProductVendor added!');
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
        $productvendor = ProductVendor::findOrFail($id);

        return view('admin.product-vendor.show', compact('productvendor'));
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
        $productvendor = ProductVendor::findOrFail($id);

        return view('admin.product-vendor.edit', compact('productvendor'));
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
        
        $productvendor = ProductVendor::findOrFail($id);
        $productvendor->update($requestData);

        return redirect('admin/product-vendor')->with('flash_message', 'ProductVendor updated!');
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
        ProductVendor::destroy($id);

        return redirect('admin/product-vendor')->with('flash_message', 'ProductVendor deleted!');
    }
}
