<?php

namespace App\Http\Controllers\Admin;

use DB;
use App\User;
use App\Product;
use App\ProductVendor;
use App\ProductCategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProductsController extends Controller
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
            $products = Product::where('product_name', 'LIKE', "%$keyword%")
                ->orWhere('product_category', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $products = Product::latest()->paginate($perPage);
        }

        return view('admin.products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $productCategory = ProductCategory::where('status', 1)->orderBy('name', 'desc')->get();
        $productVendor = ProductVendor::where('status', 1)->orderBy('created_at', 'desc')->get();

        return view('admin.products.create', compact('productCategory','productVendor'));
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

        $data = $request->all();

        $latestProductCount = Product::orderBy('created_at', 'DESC')->count();

        if ($latestProductCount > 0) {
            $latestProductCode = Product::orderBy('created_at', 'DESC')->first();
            $product_code = 'PROD' . str_pad($latestProductCode->id + 1, 8, "0", STR_PAD_LEFT);
        } else {
            $product_code = 'PROD' . str_pad(0 + 1, 8, "0", STR_PAD_LEFT);
        }

        // dd($product_code);

        DB::beginTransaction();

        try {

            auth()->user()->products()->create([
                'product_name'      => $data['product_name'],
                'product_slug'      => $data['product_slug'],
                'product_code'      => $product_code,
                'product_category'  => $data['product_category'],
                'vendor'            => $data['vendor'],
                'quantity'          => $data['quantity'],
                'initial_stock'     => $data['initial_stock'],
                'current_stock'     => $data['current_stock'],
                'buying_price'      => $data['buying_price'],
                'selling_price'     => $data['selling_price'],
                'status'            => $data['status'],
                'product_description' => $data['product_description'],
            ]);

        } catch (ValidationException $e) {
            DB::rollback();
            return Redirect()->back()->withErrors($e->getErrors())->withInput();
        } catch (\Exception $e) {
            DB::rollback();
            throw $e;
        }

        try {
            $productInCategory = ProductCategory::where('name', $data['product_category'])->count();
            $catProduct_count = $productInCategory + 1;

            ProductCategory::where(['name' => $data['product_category']])->update([
                'products' => $catProduct_count,
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
            'message' => 'Product added successfully!',
            'alert-type' => 'success',
        );

        return redirect('admin/product')->with($notification);
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
        $product = Product::findOrFail($id);

        $user = User::select('first_name','last_name')->where('id',$product['user_id'])->first();

        // dd($user);

        return view('admin.products.show', compact('product','user'));
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
        $product = Product::findOrFail($id);

        $productCategory = ProductCategory::where('status', 1)->orderBy('name', 'desc')->get();

        $productVendor = ProductVendor::where('status', 1)->orderBy('created_at', 'desc')->get();

        return view('admin.products.edit', compact('product','productCategory','productVendor'));
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

        DB::beginTransaction();

        try {
            $product = Product::findOrFail($id);
            $product->update($requestData);
        } catch (ValidationException $e) {
            DB::rollback();
            return Redirect()->back()->withErrors($e->getErrors())->withInput();
        } catch (\Exception $e) {
            DB::rollback();
            throw $e;
        }

        try {
            $productInCategory = ProductCategory::where('name', $requestData['product_category'])->count();
            $catProduct_count = $productInCategory;

            ProductCategory::where('name', $requestData['product_category'])->update([
                'products' => $catProduct_count,
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
            'message' => 'Product Updated successfully!',
            'alert-type' => 'success',
        );

        return redirect('admin/product')->with($notification);
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
        Product::destroy($id);

        $notification = array(
            'message' => 'Product Deleted successfully!',
            'alert-type' => 'success',
        );

        return redirect('admin/product')->with($notification);
    }

    // Creating unique Slug
    // public function checkSlug(Request $request)
    // {
    //     $slug = SlugService::createSlug(Product::class, 'product_slug', $request->product_name, ['unique' => true]);
    //     // echo "<pre>"; print_r($slug); die;
    //     return response()->json(['slug' => $slug]);
    // }
}
