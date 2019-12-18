<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Product;
use App\ProductCategory;
use App\ProductEmailToken;
use App\ProductImage;
use App\ProductQuery;
use App\ProductVendor;
use App\User;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Image;

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

        $user_info = Auth::user();

        $role = $user_info->roles[0]->name;

        // dd($role);

        if ($role == 'Seller') {
            if (!empty($keyword)) {
                $products = Product::where('user_id',$user_info->id)->orWhere('product_name', 'LIKE', "%$keyword%")
                    ->orWhere('product_category', 'LIKE', "%$keyword%")
                    ->latest()->paginate($perPage);
            } else {
                $products = Product::where('user_id',$user_info->id)->latest()->paginate($perPage);
            }
        } elseif ($role == 'Super Admin') {
            if (!empty($keyword)) {
                $products = Product::where('product_name', 'LIKE', "%$keyword%")
                    ->orWhere('product_category', 'LIKE', "%$keyword%")
                    ->latest()->paginate($perPage);
            } else {
                $products = Product::latest()->paginate($perPage);
            }
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

        return view('admin.products.create', compact('productCategory', 'productVendor'));
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

        // dd($data);

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

            $product = auth()->user()->products()->create([
                'product_name' => $data['product_name'],
                'product_slug' => $data['product_slug'],
                'product_code' => $product_code,
                'product_category' => $data['product_category'],
                'vendor' => $data['vendor'],
                'quantity' => $data['quantity'],
                'initial_stock' => $data['initial_stock'],
                'current_stock' => $data['current_stock'],
                'buying_price' => $data['buying_price'],
                'selling_price' => $data['selling_price'],
                'is_premium' => $data['is_premium'],
                'status' => $data['status'],
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

            if ($request->hasFile('file')) {
                $image_array = Input::file('file');
                // if($image_array->isValid()){
                $array_len = count($image_array);
                // dd($array_len);
                for ($i = 0; $i < $array_len; $i++) {
                    // $image_name = $image_array[$i]->getClientOriginalName();
                    $image_size = $image_array[$i]->getClientSize();
                    $extension = $image_array[$i]->getClientOriginalExtension();
                    $filename = 'VVV_Lux_' . rand(1, 99999) . '.' . $extension;
                    $large_image_path = public_path('images/product/large/' . $filename);
                    // Resize image
                    Image::make($image_array[$i])->save($large_image_path);

                    // dd($product->id);

                    // Store image in property folder
                    ProductImage::create([
                        'image_name' => $filename,
                        'image_size' => $image_size,
                        'product_id' => $product->id,
                    ]);
                    // }
                }
            } else {
                $filename = "default.png";
                // $property->image = "default.jpg";
                ProductImage::create([
                    'image_name' => $filename,
                    'image_size' => '7.4',
                    'product_id' => $product->id,
                ]);
            }

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

        $user = User::select('first_name', 'last_name')->where('id', $product['user_id'])->first();

        // dd($user);

        return view('admin.products.show', compact('product', 'user'));
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

        return view('admin.products.edit', compact('product', 'productCategory', 'productVendor'));
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

    //#################################################################################//
    //           ###########          Frontend Functions          ##########           //
    //#################################################################################//

    // Category Products
    public function categoryProduct(Request $request, $category = null)
    {
        if ($request->isMethod('POST')) {
            $requestData = $request->all();

            // dd($requestData);

            ProductQuery::create($requestData);

            $notification = array(
                'message' => 'Query Submited successfully!',
                'alert-type' => 'success',
            );

            return redirect()->back()->with($notification);
        }

        $productcategory = ProductCategory::where('status', 1)->get();

        $pcategory = ProductCategory::where('name', $category)->first();

        $products = Product::where('product_category', $category)->where('status', 1)->get();
        $product_count = $products->count();
        $products = json_decode(json_encode($products));

        foreach($products as $key => $val){
            $productImage_count = ProductImage::where('product_id',$val->id)->count();
            if($productImage_count > 0){
                $productImage = ProductImage::where('product_id',$val->id)->first();
                $products[$key]->image = $productImage->image_name;
                // dd($productImage);
            }
        }

        // $products = json_encode($products);

        // dd($pcategory);

        return view('front.product.category_product', compact('productcategory', 'products', 'pcategory','product_count'));
    }

    // VVV Lux Products
    public function vvvProduct(Request $request)
    {
        if ($request->isMethod('POST')) {
            $requestData = $request->all();

            // dd($requestData);

            ProductQuery::create($requestData);

            $notification = array(
                'message' => 'Query Submited successfully!',
                'alert-type' => 'success',
            );

            return redirect()->back()->with($notification);
        }

        $productcategory = ProductCategory::where('status', 1)->get();

        // $pcategory = ProductCategory::where('name', $category)->first();

        $products = Product::where('is_premium', '1')->where('status', 1)->get();

        // dd($pcategory);

        return view('front.product.vvv_products', compact('productcategory', 'products'));
    }

    // Single Product Page
    public function singleProduct(Request $request, $category = null, $id = null)
    {
        if ($request->isMethod('POST')) {
            $requestData = $request->all();

            // dd($requestData);

            ProductQuery::create($requestData);

            $notification = array(
                'message' => 'Query Submited successfully!',
                'alert-type' => 'success',
            );

            return redirect()->back()->with($notification);
        }

        $productcategory = ProductCategory::where('status', 1)->get();

        $productData = Product::where('id', $id)->where('product_category', $category)->where('status', 1)->first();

        $productImage = ProductImage::where('product_id', $id)->get();

        if (Auth::check()) {
            $auth_condition = 1;
        } else {
            $auth_condition = 0;
        }

        // if (Auth::check()) {
        //     if ($productData->is_premium == 0) {
        //         return view('front.product.single_product', compact('productcategory', 'productData'));
        //     } else {
        //         return redirect()->back();
        //     }
        // } else {
        //     return redirect('/login');
        // }

        if ($productData->is_premium == 0) {
            return view('front.product.single_product', compact('productcategory', 'productData', 'auth_condition', 'productImage'));
        } else {
            return redirect()->back();
        }
    }

    // Single Email Product Page
    public function singleEmailProduct(Request $request, $id = null, $token = null)
    {
        if ($request->isMethod('POST')) {
            $requestData = $request->all();

            // dd($requestData);

            ProductQuery::create($requestData);

            $notification = array(
                'message' => 'Query Submited successfully!',
                'alert-type' => 'success',
            );

            return redirect()->back()->with($notification);
        }

        $tokenCount = ProductEmailToken::where('product_id', $id)->where('token', $token)->count();

        if ($tokenCount > 0) {
            $tokenEmailData = ProductEmailToken::where('product_id', $id)->where('token', $token)->first();
        }

        // dd($tokenCount);

        if ($tokenCount > 0) {
            $productcategory = ProductCategory::where('status', 1)->get();

            $productData = Product::where('id', $id)->first();

            $productImage = ProductImage::where('product_id', $id)->get();

            // $pcategory = ProductCategory::where('name', $category)->first();

            // dd($productData);

            ProductEmailToken::where('id', $tokenEmailData->id)->delete();

            return view('front.product.single_product', compact('productcategory', 'productData'));
        } else {

            $productcategory = ProductCategory::where('status', 1)->get();

            $notification = array(
                'message' => 'URL has been expired!',
                'alert-type' => 'success',
            );

            return view('front.product.partials.expire_email', compact('productcategory'))->with($notification);
        }

        return view('front.product.single_product', compact('productcategory', 'productData', 'productImage'));
    }
}
