<?php

namespace App\Http\Controllers\Admin;

// use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\ProductCategory;
use Illuminate\Http\Request;
use Image;

class ProductCategoryController extends Controller
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
            $productcategory = ProductCategory::where('name', 'LIKE', "%$keyword%")
                ->orWhere('description', 'LIKE', "%$keyword%")
                ->orWhere('status', 'LIKE', "%$keyword%")
                ->orWhere('image', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $productcategory = ProductCategory::latest()->paginate($perPage);
        }

        return view('admin.product-category.index', compact('productcategory'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('admin.product-category.create');
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
        if ($request->hasFile('image')) {
            $image_array = $request->file('image');
            // $image_size = $image_array->getClientSize();
            $extension = $image_array->getClientOriginalExtension();
            $filename = 'category_' . $requestData['name'] . '.' . $extension;
            // $watermark = Image::make(public_path('/images/frontend_images/images/logo.png'));
            $large_image_path = public_path('/images/product-category/large/' . $filename);
            $medium_image_path = 'images/backend_images/property_images/medium/' . $filename;
            $small_image_path = 'images/backend_images/property_images/small/' . $filename;
            // Resize image
            Image::make($image_array)->save($large_image_path);

            // Store image in property folder
            $requestData['image'] = $filename;
            // $requestData['image'] = $request->file('image')->store('uploads', 'public/images/product-category/large');
        }

        // dd($requestData);

        ProductCategory::create($requestData);

        $notification = array(
            'message' => 'Category Added successfully!',
            'alert-type' => 'success',
        );

        return redirect('admin/product-category')->with($notification);
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
        $productcategory = ProductCategory::findOrFail($id);

        return view('admin.product-category.show', compact('productcategory'));
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
        $productcategory = ProductCategory::findOrFail($id);

        return view('admin.product-category.edit', compact('productcategory'));
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
        if ($request->hasFile('image')) {
            $requestData['image'] = $request->file('image')
                ->store('uploads', 'public');
        }

        $productcategory = ProductCategory::findOrFail($id);
        $productcategory->update($requestData);

        $notification = array(
            'message' => 'Category Updated successfully!',
            'alert-type' => 'success',
        );

        return redirect('admin/product-category')->with($notification);
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
        ProductCategory::destroy($id);

        $notification = array(
            'message' => 'Category Deleted successfully!',
            'alert-type' => 'success',
        );

        return redirect('admin/product-category')->with($notification);
    }

    //#################################################################################//
    //           ###########          Frontend Functions          ##########           //
    //#################################################################################//

    // Product Category Route
    public function productCategory()
    {
        $productcategory = ProductCategory::where('status', 1)->get();

        return view('front.product.category', compact('productcategory'));
    }

}
