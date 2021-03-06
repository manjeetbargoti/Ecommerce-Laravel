<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\SupplierCategory;
use App\SupplierData;
use App\SupplierQuery;
use App\User;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Spatie\Permission\Models\Role;

class SupplierController extends Controller
{
    // Show all Suppliers
    public function index(Request $request)
    {
        $keyword = $request->get('search');
        $perPage = 25;

        if (!empty($keyword)) {
            $user = User::whereHas("roles", function ($q) {$q->where("name", "Supplier");})->where('first_name', 'LIKE', "%$keyword%")->orWhere('last_name', 'LIKE', "%$keyword%")->orWhere('email', 'LIKE', "%$keyword%")->orWhere('phone', 'LIKE', "%$keyword%")->orWhere('username', 'LIKE', "%$keyword%")->latest()->paginate($perPage);
        } else {
            $user = User::whereHas("roles", function ($q) {$q->where("name", "Supplier");})->latest()->paginate($perPage);
        }

        return view('admin.supplier.index', compact('user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $roles = Role::get()->pluck('name', 'name');

        return view('admin.supplier.create', compact('roles'));
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

            // dd($requestData);

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
                if ($roles == 'Supplier') {
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
                'message' => 'Supplier Added successfully!',
                'alert-type' => 'success',
            );

            return redirect('admin/supplier')->with($notification);
        }

        return view('admin.supplier.create');
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
        $user = User::findOrFail($id);

        $roleName = implode(', ', $user->getRoleNames()->toArray());

        $supplierData = SupplierData::where('user_id', $id)->first();

        // dd($roleName);

        return view('admin.supplier.show', compact('user', 'supplierData', 'roleName'));
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
        $user = User::findOrFail($id);

        $roles = Role::get()->pluck('name', 'name');

        $supplierData = SupplierData::where('user_id', $id)->first();

        return view('admin.supplier.edit', compact('user', 'roles', 'supplierData'));
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

        return redirect('admin/supplier')->with($notification);
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
            'message' => 'Supplier Deleted successfully!',
            'alert-type' => 'success',
        );

        return redirect('admin/supplier')->with($notification);
    }

    //#################################################################################//
    //           ###########          Frontend Functions          ##########           //
    //#################################################################################//

    // Product Category Route
    public function supplierCategory()
    {
        $suppliercategory = SupplierCategory::where('status', 1)->get();

        return view('front.supplier.category', compact('suppliercategory'));
    }

    // Category Suppliers
    public function categorySupplier(Request $request, $category = null)
    {
        if ($request->isMethod('POST')) {
            $requestData = $request->all();

            // dd($requestData);

            $supplierData = User::where('id', $requestData['supplier_id'])->first();

            // dd($supplierData->email);

            $supplier_email = $supplierData->email;

            SupplierQuery::create($requestData);

            $messageData = ['supplier_email' => $supplier_email, 'supplier_name' => $supplierData->first_name, 'name' => $requestData['name'], 'email' => $requestData['email'], 'phone' => $requestData['phone'], 'query_message' => $requestData['query_message'], 'location' => $requestData['location']];
            Mail::send('emails.supplier_query', $messageData, function ($message) use ($supplier_email) {
                $message->to($supplier_email)->subject('A user query about you on VVV Luxury');
            });

            $notification = array(
                'message' => 'Query Submited successfully!',
                'alert-type' => 'success',
            );

            return redirect()->back()->with($notification);
        }

        $suppliercategory = SupplierCategory::where('status', 1)->get();

        $supplier = User::whereHas("roles", function ($q) {$q->where("name", "Supplier");})->where('category', $category)->where('status', 1)->get();

        $supplier_count = $supplier->count();

        // $supplierData = SupplierData::where('category',$category)->get();
        $supplier = json_decode(json_encode($supplier));

        foreach ($supplier as $key => $val) {
            $supplier_count = SupplierData::where('user_id', $val->id)->where('category', $category)->count();
            if ($supplier_count > 0) {
                $supplier_data = SupplierData::where('user_id', $val->id)->where('category', $category)->first();
                $supplier[$key]->business_name = $supplier_data->business_name;
                $supplier[$key]->image = $supplier_data->image;
                $supplier[$key]->country = $supplier_data->country;
                $supplier[$key]->description = $supplier_data->description;
            }

            // dd($supplier);
        }

        // dd($supplier_count);

        return view('front.supplier.category_supplier', compact('suppliercategory', 'supplier', 'supplier_count'));
    }
}
