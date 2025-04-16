<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/member';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    /**
     * Show the application's login form.
     *
     * @return \Illuminate\View\View
     */
    public function showLoginForm(Request $request)
    {
        if ($request->has('job')) {
            session(['redirect_to' => route('front.jobs.show', $request->job)]);
        }

        return viewCompro('auth.login');
    }

    /**
     * Handle a login request to the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function login(Request $request)
    {
        $this->validateLogin($request);

        // Check for too many login attempts
        if (method_exists($this, 'hasTooManyLoginAttempts') &&
            $this->hasTooManyLoginAttempts($request)) {
            $this->fireLockoutEvent($request);
            return $this->sendLockoutResponse($request);
        }

        // Attempt to log the user in
        if (Auth::attempt($this->credentials($request), $request->filled('remember'))) {
            $user = Auth::user();

            // Check if user is a member
            if (!$user->hasRole('member')) {
                Auth::logout();
                $request->session()->invalidate();
                $request->session()->regenerateToken();
                return redirect()->back()->withErrors(['email' => 'Email atau password salah']);
            }

            // Check if email is verified
            if (is_null($user->email_verified_at)) {
                Auth::logout();
                $request->session()->invalidate();
                $request->session()->regenerateToken();
                return redirect()->back()->withErrors(['email' => 'Email belum terverifikasi']);
            }

            // Success! Reset the login attempts
            $request->session()->regenerate();
            $this->clearLoginAttempts($request);

            // Redirect to the intended location
            $redirectTo = session()->has('redirect_to') ? session()->get('redirect_to') : route('member.index');
            session()->forget('redirect_to');

            return redirect()->intended($redirectTo);
        }

        // Login attempt failed, increment the number of attempts
        $this->incrementLoginAttempts($request);

        // Redirect back with an error message
        return $this->sendFailedLoginResponse($request);
    }

    /**
     * Log the user out of the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }
}
