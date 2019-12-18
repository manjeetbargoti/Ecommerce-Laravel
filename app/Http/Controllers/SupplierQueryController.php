<?php

namespace App\Http\Controllers;

use App\SupplierQuery;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class SupplierQueryController extends Controller
{
    //
    public function index(Request $request)
    {
        $keyword = $request->get('search');
        $perPage = 25;

        $supplier_info = Auth::user();

        $role = $supplier_info->roles[0]->name;

        // dd($supplier_info->id);
        if($role == 'Supplier'){
            if (!empty($keyword)) {
                $supplierQuery = SupplierQuery::where('supplier_id',$supplier_info->id)->where('name', 'LIKE', "%$keyword%")
                    ->orWhere('email', 'LIKE', "%$keyword%")
                    ->orWhere('phone', 'LIKE', "%$keyword%")
                    ->orWhere('query_message', 'LIKE', "%$keyword%")
                    ->orWhere('status', 'LIKE', "%$keyword%")
                    ->latest()->paginate($perPage);
            } else {
                $supplierQuery = SupplierQuery::where('supplier_id',$supplier_info->id)->latest()->paginate($perPage);
            }
        }else{
            if (!empty($keyword)) {
                $supplierQuery = SupplierQuery::where('name', 'LIKE', "%$keyword%")
                    ->orWhere('email', 'LIKE', "%$keyword%")
                    ->orWhere('phone', 'LIKE', "%$keyword%")
                    ->orWhere('query_message', 'LIKE', "%$keyword%")
                    ->orWhere('status', 'LIKE', "%$keyword%")
                    ->latest()->paginate($perPage);
            } else {
                $supplierQuery = SupplierQuery::get();
            }
        }

        return view('admin.supplier-query.index', compact('supplierQuery'));
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
        $supplierQuery = SupplierQuery::findOrFail($id);

        return view('admin.supplier-query.show', compact('supplierQuery'));
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
        $supplierQuery = SupplierQuery::findOrFail($id);

        return view('admin.supplier-query.edit', compact('supplierQuery'));
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

        $supplierQuery = SupplierQuery::findOrFail($id);
        $supplierQuery->update($requestData);

        return redirect('admin/support/supplier-query')->with('flash_message', 'ProductQuery updated!');
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
        SupplierQuery::destroy($id);

        return redirect('admin/support/supplier-query')->with('flash_message', 'ProductQuery deleted!');
    }
}
