<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\ProductEmailToken;
use App\ProductQuery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class ProductQueryController extends Controller
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

        // dd($product_info);
        if ($role == 'Buyer') {
            if (!empty($keyword)) {
                $productquery = ProductQuery::where('email', $user_info->email)->orWhere('name', 'LIKE', "%$keyword%")
                    ->orWhere('email', 'LIKE', "%$keyword%")
                    ->orWhere('phone', 'LIKE', "%$keyword%")
                    ->orWhere('query_message', 'LIKE', "%$keyword%")
                    ->orWhere('product_id', 'LIKE', "%$keyword%")
                    ->orWhere('product_type', 'LIKE', "%$keyword%")
                    ->orWhere('status', 'LIKE', "%$keyword%")
                    ->orWhere('terms', 'LIKE', "%$keyword%")
                    ->latest()->paginate($perPage);
            } else {
                $productquery = ProductQuery::where('email', $user_info->email)->latest()->paginate($perPage);
                // dd($productquery);
            }
        } elseif ($role == 'Seller') {
            if (!empty($keyword)) {
                $productquery = ProductQuery::where('user_id', $user_info->id)->orWhere('name', 'LIKE', "%$keyword%")
                    ->orWhere('email', 'LIKE', "%$keyword%")
                    ->orWhere('phone', 'LIKE', "%$keyword%")
                    ->orWhere('query_message', 'LIKE', "%$keyword%")
                    ->orWhere('product_id', 'LIKE', "%$keyword%")
                    ->orWhere('product_type', 'LIKE', "%$keyword%")
                    ->orWhere('status', 'LIKE', "%$keyword%")
                    ->orWhere('terms', 'LIKE', "%$keyword%")
                    ->latest()->paginate($perPage);
            } else {
                $productquery = ProductQuery::where('user_id', $user_info->id)->latest()->paginate($perPage);
                // dd($productquery);
            }
        } else {
            if (!empty($keyword)) {
                $productquery = ProductQuery::where('name', 'LIKE', "%$keyword%")
                    ->orWhere('email', 'LIKE', "%$keyword%")
                    ->orWhere('phone', 'LIKE', "%$keyword%")
                    ->orWhere('query_message', 'LIKE', "%$keyword%")
                    ->orWhere('product_id', 'LIKE', "%$keyword%")
                    ->orWhere('product_type', 'LIKE', "%$keyword%")
                    ->orWhere('status', 'LIKE', "%$keyword%")
                    ->orWhere('terms', 'LIKE', "%$keyword%")
                    ->latest()->paginate($perPage);
            } else {
                $productquery = ProductQuery::latest()->paginate($perPage);
            }
        }

        return view('admin.product-query.index', compact('productquery'));
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

        ProductQuery::create($requestData);

        return redirect('admin/product-query')->with('flash_message', 'ProductQuery added!');
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
        $productquery = ProductQuery::findOrFail($id);

        return view('admin.product-query.show', compact('productquery'));
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
        $productquery = ProductQuery::findOrFail($id);

        return view('admin.product-query.edit', compact('productquery'));
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

        $productquery = ProductQuery::findOrFail($id);
        $productquery->update($requestData);

        return redirect('admin/support/product-query')->with('flash_message', 'ProductQuery updated!');
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
        ProductQuery::destroy($id);

        return redirect('admin/support/product-query')->with('flash_message', 'ProductQuery deleted!');
    }

    // Send Email
    public function sendEmail($id = null)
    {
        $queryData = ProductQuery::where('id', $id)->first();

        $email = $queryData['email'];

        $var = str_random($length = 64);

        // $productData = Product::where('id', $queryData->product_id)->first();

        $token = base64_encode($var);

        // dd($queryData);

        $messageData = ['email' => $queryData['email'], 'id' => $queryData['product_id'], 'name' => $queryData['name'], 'token' => $token];
        Mail::send('emails.product_url', $messageData, function ($message) use ($email) {
            $message->to($email)->subject('Please check requested Product link | VVV Luxury');
        });

        ProductEmailToken::create([
            'product_id' => $queryData['product_id'],
            'email' => $queryData['email'],
            'token' => $token,
        ]);

        ProductQuery::where('id', $id)->update(['status' => 1]);

        // dd($messageData);

        $notification = array(
            'message' => 'Email Sent Successfully!',
            'alert-type' => 'success',
        );

        return redirect('/admin/support/product-query')->with($notification);
    }

    // Recent Queries
    
}
