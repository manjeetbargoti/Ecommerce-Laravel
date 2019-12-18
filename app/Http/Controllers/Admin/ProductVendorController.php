<?php

namespace App\Http\Controllers\Admin;

use DB;
use App\User;
use App\SupplierData;
use App\ProductVendor;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;

class ProductVendorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    // Show all Suppliers
    public function index(Request $request)
    {
        $keyword = $request->get('search');
        $perPage = 25;

        if (!empty($keyword)) {
            $productvendor = User::whereHas("roles", function ($q) {$q->where("name", "Seller");})->where('first_name', 'LIKE', "%$keyword%")->orWhere('last_name', 'LIKE', "%$keyword%")->orWhere('email', 'LIKE', "%$keyword%")->orWhere('phone', 'LIKE', "%$keyword%")->orWhere('username', 'LIKE', "%$keyword%")->latest()->paginate($perPage);
        } else {
            $productvendor = User::whereHas("roles", function ($q) {$q->where("name", "Seller");})->latest()->paginate($perPage);
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
        $roles = Role::get()->pluck('name', 'name');

        return view('admin.product-vendor.create', compact('roles'));
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
        if ($request->isMethod('POST')) {
            $requestData = $request->except('roles');
            $roles = $request->roles;

            // dd($roles);

            DB::beginTransaction();

            try {

                $user = User::create($requestData);
                $user->assignRole($roles);

            } catch (ValidationException $e) {
                DB::rollback();
                return Redirect()->back()->withErrors($e->getErrors())->withInput();
            } catch (\Exception $e) {
                DB::rollback();
                throw $e;
            }

            try {
                if ($roles == 'Vendor') {
                    SupplierData::create([
                        'business_name' => $requestData['business_name'],
                        'category' => $requestData['category'],
                        'user_id' => $user->id,
                    ]);
                }

            } catch (ValidationException $e) {
                DB::rollback();
                return Redirect()->back()->withErrors($e->getErrors())->withInput();
            } catch (\Exception $e) {
                DB::rollback();
                throw $e;
            }

            DB::commit();

            $notification = array(
                'message' => 'Vendor Added successfully!',
                'alert-type' => 'success',
            );

            return redirect('admin/product-vendor')->with($notification);
        }
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
        $productvendor = User::findOrFail($id);

        $supplierData = SupplierData::where('user_id',$id)->first();

        return view('admin.product-vendor.show', compact('productvendor','supplierData'));
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
        $productvendor = User::findOrFail($id);

        $supplierData = SupplierData::where('user_id',$id)->first();

        return view('admin.product-vendor.edit', compact('productvendor','supplierData'));
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

        $requestData = $request->except('roles');
        $roles = $request->roles;

        // dd($requestData);

        DB::beginTransaction();

        try {
            $user = User::findOrFail($id);
            $user->update($requestData);
            $user->syncRoles($roles);
        } catch (ValidationException $e) {
            DB::rollback();
            return Redirect()->back()->withErrors($e->getErrors())->withInput();
        } catch (\Exception $e) {
            DB::rollback();
            throw $e;
        }

        try {
            SupplierData::where('user_id', $id)->update([
                'business_name' => $requestData['business_name'],
                'category' => $requestData['category'],
            ]);
        } catch (ValidationException $e) {
            DB::rollback();
            return Redirect()->back()->withErrors($e->getErrors())->withInput();
        } catch (\Exception $e) {
            DB::rollback();
            throw $e;
        }

        DB::commit();

        $notification = array(
            'message' => 'Supplier Updated successfully!',
            'alert-type' => 'success',
        );

        return redirect('admin/product-vendor')->with($notification);
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
        User::destroy($id);

        $notification = array(
            'message' => 'Vendor Deleted successfully!',
            'alert-type' => 'success',
        );

        return redirect('admin/product-vendor')->with($notification);
    }
}
