<?php

namespace App\Http\Controllers;

use \App\Subscriber;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('homepage');

    }

    // Submit newsletter email
    public function newsletterEmail(Request $request)
    {
        $requestData = $request()->all();

        Subscriber::craete($requestData);

        $notification = array(
            'message' => 'Subscribe successfully!',
            'alert-type' => 'success',
        );

        return redirect()->back()->with($notification);
    }
}
