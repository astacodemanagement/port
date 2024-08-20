<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

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

    public function showLoginForm(Request $request)
    {
        if ($request->has('job')) {
            session(['redirect_to' => route('front.jobs.show', $request->job)]);
            
            return redirect(route('front.login'));
        }

        return viewCompro('auth.login');
    }

    protected function credentials(Request $request)
    {
        return array_merge($request->only($this->username(), 'password'));
    }

    protected function sendLoginResponse(Request $request)
    {
        $request->session()->regenerate();
    
        $this->clearLoginAttempts($request);
        $user = $this->guard()->user();
    
        if (!$this->guard()->user()->hasRole('member')) {
            $this->guard()->logout();
            $request->session()->invalidate();
            $request->session()->regenerateToken();
    
            return response()->json([
                'status' => 'error',
                'message' => 'Email atau password salah',
            ], 422);
        }
    
        if (is_null($user->email_verified_at)) {
            $this->guard()->logout();
            $request->session()->invalidate();
            $request->session()->regenerateToken();
    
           return redirect()->back()->with("error","email belum terverikasi");
        }
    
        if ($response = $this->authenticated($request, $this->guard()->user())) {
            return $response;
        }
    
        $redirectTo = session()->has('redirect_to') ? session()->get('redirect_to') : route('member.index');
        session()->forget('redirect_to');
    
        return response()->json([
            'status' => 'success',
            'message' => 'Login successful',
            'redirect_to' => $redirectTo,
        ], 200);
    }
    
    public function logout(Request $request)
    {
        $this->guard()->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        if ($response = $this->loggedOut($request)) {
            return $response;
        }

        return $request->wantsJson()
            ? new JsonResponse([], 204)
            : redirect(route('front.login'));
    }
}
