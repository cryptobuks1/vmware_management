<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use App\Mail\SigninEmail;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\URL;

class AuthController extends Controller
{
    /**
     * Processes the login form
     *
     * @param \Illuminate\Http\Request $request
     * @return string
     **/
    public function login(Request $request)
    {
        // find the user for the email - or create it.

        $user = User::where('email', $request->post('email'))->first();
        if(!$user){
            return redirect('/login')->withErrors(['email' => 'Unregistered Email Address']);
        }
        $url = URL::temporarySignedRoute(
            'sign-in',
            now()->addMinutes(30),
            ['user' => $user->id]
        );
//        Mail::send(new SigninEmail($user, $url));
//
//        return view('auth/login-sent');
        Auth::login($user);
        return redirect('/');
    }

    /**
     * Processes the actual login
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\User $user
     * @return redirect
     **/
    public function signIn(Request $request, $user)
    {
        // Check if the URL is valid
        if (!$request->hasValidSignature()) {
            abort(401);
        }

        // Authenticate the user
        $user = User::findOrFail($user);

        Auth::login($user);

        // Redirect to homepage
        return redirect('/');
    }

    /**
     * Processes the logout
     *
     * @param \Illuminate\Http\Request $request
     * @return redirect
     **/
    public function logout(Request $request)
    {
        // logout
        Auth::logout();

        // Redirect to homepage
        return redirect('/');
    }
}
