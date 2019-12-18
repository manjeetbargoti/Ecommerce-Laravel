<?php

namespace Illuminate\Foundation\Auth;

use App\SupplierData;
use DB;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

trait RegistersUsers
{
    use RedirectsUsers;

    /**
     * Show the application registration form.
     *
     * @return \Illuminate\Http\Response
     */
    public function showRegistrationForm()
    {
        return view('auth.register');
    }

    /**
     * Handle a registration request for the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function register(Request $request)
    {
        $this->validator($request->all())->validate();

        // event(new Registered($user = $this->create($request->all())));

        $requestData = $request->except('roles');
        $roles = $request->roles;

        // dd($roles);

        DB::beginTransaction();

        try {

            event(new Registered($user = $this->create($requestData)));
            event(new Registered($user->assignRole($roles)));

        } catch (ValidationException $e) {
            DB::rollback();
            return Redirect()->back()->withErrors($e->getErrors())->withInput();
        } catch (\Exception $e) {
            DB::rollback();
            throw $e;
        }

        if ($roles == 'Supplier') {
            try {
                SupplierData::create([
                    'business_name' => $requestData['business_name'],
                    'category' => $requestData['supplier_category'],
                    'user_id' => $user->id,
                ]);
                // echo "Test"; die;
            } catch (ValidationException $e) {
                DB::rollback();
                return Redirect()->back()->withErrors($e->getErrors())->withInput();
            } catch (\Exception $e) {
                DB::rollback();
                throw $e;
            }
        }

        $email = $requestData['email'];

        $token = base64_encode($email);
        $code = base64_encode($requestData['username']);

        // dd($token);

        $messageData = ['email' => $requestData['email'], 'name' => $requestData['first_name'], 'token' => $token, 'code' => $code];
        Mail::send('emails.registration_email', $messageData, function ($message) use ($email) {
            $message->to($email)->subject('Welcome! You have successfully created your VVVLux – Triple V Luxury Account');
        });

        DB::commit();

        // $this->guard()->login($user);

        $notification = array(
            'message' => 'Registered successfully! Kindly check your email to verify your account.',
            'alert-type' => 'success',
        );

        return redirect('/')->with($notification);

        // return $this->registered($request, $user)
        // ?: redirect($this->redirectPath())->with($notification);
    }

    /**
     * Get the guard to be used during registration.
     *
     * @return \Illuminate\Contracts\Auth\StatefulGuard
     */
    protected function guard()
    {
        return Auth::guard();
    }

    /**
     * The user has been registered.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  mixed  $user
     * @return mixed
     */
    protected function registered(Request $request, $user)
    {
        //
    }
}
