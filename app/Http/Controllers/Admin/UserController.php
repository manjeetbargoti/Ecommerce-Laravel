<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\ProductQuery;
use App\SupplierData;
use App\SupplierQuery;
use App\User;
use App\UserAddress;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Image;
use Spatie\Permission\Models\Role;

class UserController extends Controller
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
            $user = User::where('first_name', 'LIKE', "%$keyword%")->orWhere('last_name', 'LIKE', "%$keyword%")->orWhere('email', 'LIKE', "%$keyword%")->orWhere('phone', 'LIKE', "%$keyword%")->orWhere('username', 'LIKE', "%$keyword%")->latest()->paginate($perPage);
        } else {
            $user = User::latest()->paginate($perPage);
        }

        return view('admin.user.index', compact('user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $roles = Role::get()->pluck('name', 'name');

        return view('admin.user.create', compact('roles'));
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

        // $requestData = $request->all();
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
            if ($roles[0] == 'Supplier' || $roles[0] == 'Vendor') {
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
            'message' => 'User Added successfully!',
            'alert-type' => 'success',
        );

        return redirect('admin/user')->with($notification);
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

        return view('admin.user.show', compact('user', 'supplierData', 'roleName'));
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

        // dd($supplierData);

        return view('admin.user.edit', compact('user', 'roles', 'supplierData'));
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

        // dd($roles[0]);

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
        }

        try {
            if ($roles[0] == "Supplier" || $roles[0] == "Seller") {
                SupplierData::where('user_id', $id)->update([
                    'business_name' => $requestData['business_name'],
                    'category' => $requestData['category'],
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
            'message' => 'User Updated successfully!',
            'alert-type' => 'success',
        );

        return redirect('admin/user')->with($notification);
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
            'message' => 'User Deleted successfully!',
            'alert-type' => 'success',
        );

        return redirect('admin/user')->with($notification);
    }

    public function registerUser(Request $request)
    {

        if ($request->isMethod('post')) {

            $requestData = $request->except('roles');
            $roles = $request->roles;

            // dd($requestData);

            $user = User::create($requestData);
            $user->assignRole($roles);

            $notification = array(
                'message' => 'User Added successfully!',
                'alert-type' => 'success',
            );

            return redirect('/register')->with($notification);
        }
    }

    // Profile Access
    public function profile()
    {
        $auth_user = Auth::user();
        $user = User::findOrFail($auth_user['id']);

        $roleName = implode(', ', $user->getRoleNames()->toArray());

        $supplierData = SupplierData::where('user_id', $auth_user['id'])->first();

        $userAddress = UserAddress::where('user_id', $auth_user['id'])->first();

        if ($roleName == 'Seller') {
            $productquery = ProductQuery::where('user_id', $auth_user->id)->latest()->take(12)->get();
            $supplierquery = '';
            return view('admin.profile.view', compact('user', 'roleName', 'supplierData', 'productquery', 'userAddress'));
        } elseif ($roleName == 'Buyer') {
            $productquery = ProductQuery::where('email', $auth_user->email)->latest()->take(10)->get();
            $supplierquery = '';
            return view('admin.profile.view', compact('user', 'roleName', 'supplierData', 'productquery', 'userAddress'));
        } elseif ($roleName == 'Supplier') {
            $productquery = '';
            $supplierQuery = SupplierQuery::where('supplier_id', $auth_user->id)->latest()->take(10)->get();
            return view('admin.profile.view', compact('user', 'roleName', 'supplierData', 'supplierQuery', 'userAddress'));
        } elseif ($roleName == 'Super Admin') {
            $supplierQuery = SupplierQuery::latest()->take(10)->get();
            $productquery = ProductQuery::latest()->take(12)->get();
            return view('admin.profile.view', compact('user', 'roleName', 'supplierData', 'supplierQuery', 'productquery', 'userAddress'));
        }

        // return view('admin.profile.view', compact('user','roleName','supplierData','productquery','supplierQuery'));
    }

    // Edit Profile Information
    public function profileEdit(Request $request, $id)
    {

        if ($request->isMethod('post')) {

            $requestData = $request->all();
            // dd($requestData);

            if ($request->hasFile('file')) {
                $image_array = Input::file('file');
                // if($image_array->isValid()){
                $array_len = count($image_array);
                // dd($array_len);
                for ($i = 0; $i < $array_len; $i++) {
                    // $image_name = $image_array[$i]->getClientOriginalName();
                    $image_size = $image_array[$i]->getClientSize();
                    $extension = $image_array[$i]->getClientOriginalExtension();
                    $filename = 'user' . $requestData['first_name'] . '_' . rand(0, 99999) . '.' . $extension;
                    $large_image_path = public_path('/images/user/large/' . $filename);
                    // Resize image
                    Image::make($image_array[$i])->save($large_image_path);

                    // dd($filename);

                    // Store image in property folder
                    $requestData['image'] = $filename;
                    // }
                }
            }

            DB::beginTransaction();
            try {
                // dd($requestData);

                $user = User::findOrFail($id);
                $user->update($requestData);
            } catch (ValidationException $e) {
                DB::rollback();
                return Redirect()->back()->withErrors($e->getErrors())->withInput();
            } catch (\Exception $e) {
                DB::rollback();
            }

            DB::commit();

            $notification = array(
                'message' => 'Profile Updated!',
                'alert-type' => 'success',
            );

            return redirect('/admin/profile')->with($notification);
        }

        $auth_user = Auth::user();
        $user = User::findOrFail($auth_user['id']);

        $roleName = implode(', ', $user->getRoleNames()->toArray());

        return view('admin.profile.edit', compact('user', 'roleName'));
    }

    // Edit Supplier Business Info
    public function editBusinessInfo(Request $request, $id = null)
    {
        $requestData = $request->all();

        if ($request->isMethod('post')) {
            // dd($id);
            $supplierData = SupplierData::findOrFail($id);
            $supplierData->update($requestData);

            $notification = array(
                'message' => 'Business info Updated!',
                'alert-type' => 'success',
            );

            return redirect('/admin/profile')->with($notification);
        }
        $auth_user = Auth::user();
        $sdata = SupplierData::where('user_id', $auth_user['id'])->first();

        return view('admin.profile.edit-supplier-info', compact('sdata'));
    }

    // Change Password
    public function changePassword(Request $request, $id = null)
    {
        $requestData = $request->all();

        if ($request->isMethod('post')) {
            $user = User::findOrFail($id);
            $user->update($requestData);

            $notification = array(
                'message' => 'Password changed successfully!',
                'alert-type' => 'success',
            );

            return redirect('/admin/profile')->with($notification);
        }

        return view('admin.profile.change-password');
    }
}
