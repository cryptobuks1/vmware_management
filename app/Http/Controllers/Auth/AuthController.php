<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use App\Mail\SigninEmail;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
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
        $random_id = mt_rand(1, 99999);
        $user = User::where('email', $request->post('email'))->firstOrFail();
        if (!$user) {
            $user = User::Create(
                ['id' => $random_id, 'name' => $request->post('email'), 'email' => $request->post('email'),
                    'password' => Str::random()]
            );
            $user->id = $random_id;
        }
        $url = URL::temporarySignedRoute(
            'sign-in',
            now()->addMinutes(30),
            ['user' => $random_id]
        );
        Mail::send(new SigninEmail($user, $url));

        return view('auth/login-sent');
//        $user = User::findOrFail($user->id);
//        Auth::login($user);
//        return redirect('/');
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
