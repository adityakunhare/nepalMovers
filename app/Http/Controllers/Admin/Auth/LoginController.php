<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Admin;
use App\Http\Controllers\Controller;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Support\Facades\Hash;


class LoginController extends Controller
{


    use AuthenticatesUsers,ThrottlesLogins;

    /**
     * Max login attempts allowed.
     */
    public $maxAttempts = 5;

    /**
     * Number of minutes to lock the login.
     */
    public $decayMinutes = 3;

    /**
     * Only guests for "admin" guard are allowed except
     * for logout.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest:admin')->except('logout');
    }

    /**
     * Username used in ThrottlesLogins trait
     *
     * @return string
     */
    public function username()
    {
        return 'email';
    }

    /**
     * Show the login form.
     *
     * @return \Illuminate\Http\Response
     */
    public function showLoginForm()
    {
        return view('admin.auth.login');
    }

    /**
     * Validate the form data.
     *
     * @param \Illuminate\Http\Request $request
     * @return
     */

    private function validator(Request $request)
    {

        //validation rules.
        $rules = [
            'email' => 'required|email|exists:admins|min:5|max:191',
            'password' => 'required|string|min:4|max:255',
        ];
        //custom validation error messages.
        $messages = [
            'email.exists' => 'These credentials do not match our records.',
        ];

        $user = Admin::where('email', $request->email)->first();

        if (!$user || !Hash::check($request->password, $user->password)) {

            return response([
                'message' => ['These credentials do not match our records.'],
            ], 404);
        }


        $messages = [
            'email.exists' => 'These credentials do not match our records.',
        ];
        //validate the request.
        $request->validate($rules, $messages);
    }

    /**
     * Login the admin.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function login(Request $request)
    {

        $this->validator($request);

        //check if the user has too many login attempts.
        if ($this->hasTooManyLoginAttempts($request)) {
            //Fire the lockout event.
            $this->fireLockoutEvent($request);
            //redirect the user back after lockout.
            return $this->sendLockoutResponse($request);
        }

        if (Auth::guard('admin')->attempt($request->only('email', 'password'), $request->filled('remember'))) {
            //Authentication passed...
            return redirect()
                ->intended(route('admin.home'))
                ->with('message', 'You are Logged in as Admin!');
        }else{
            return $this->loginFailed();
        }

        //keep track of login attempts from the user.
        $this->incrementLoginAttempts($request);

        //Authentication failed...
        return $this->loginFailed();

    }

    /**
     * Logout the admin.
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function logout()
    {
        Auth::guard('admin')->logout();
        return redirect()
            ->route('admin.login')
            ->with('message', 'Admin has been logged out!');

    }

    /**
     * Redirect back after a failed login.
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    private function loginFailed()
    {
        return redirect()
            ->back()
            ->withInput()
            ->with('error-message', 'Login failed, please try again!');

    }
}
