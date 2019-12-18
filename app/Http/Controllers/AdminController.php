<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class AdminController extends Controller
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
    public function dashboard($guard = null)
    {
        $usercount = User::count();

        return view('admin.dashboard', compact('usercount'));
    }

    // Check User Email
    public function checkEmail(Request $request)
    {
        if ($request->get('email')) {
            $email = $request->get('email');
            $data = User::where('email', $email)->count();
            if ($data > 0) {
                echo 'not_unique';
            } else {
                echo 'unique';
            }
        }
    }

    // Check Username
    public function checkUsername(Request $request)
    {
        if ($request->get('username')) {
            $username = $request->get('username');
            $data = User::where('username', $username)->count();
            if ($data > 0) {
                echo 'not_unique';
            } else {
                echo 'unique';
            }
        }
    }

    // Verify Email
    public function verifyEmail(Request $request, $token=null, $code=null)
    {
        $email = base64_decode($token);
        $username = base64_decode($code);

        // dd($username);

        User::where('email',$email)->where('username',$username)->update(['status' => 1]);

        $notification = array(
            'message' => 'Account activated successfully! Please login with your details.',
            'alert-type' => 'success',
        );

        return redirect('/login')->with($notification);
    }

}
