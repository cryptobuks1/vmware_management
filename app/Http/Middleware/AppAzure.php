<?php

namespace App\Http\Middleware;

use Illuminate\Support\Str;
use RootInc\LaravelAzureMiddleware\Azure as Azure;
use Microsoft\Graph\Graph;
use Microsoft\Graph\Model;

use Auth;

use App\Models\User;

class AppAzure extends Azure
{
    protected function success($request, $access_token, $refresh_token, $profile)
    {
        $graph = new Graph();
        $graph->setAccessToken($access_token);

        $graph_user = $graph->createRequest("GET", "/me")
            ->setReturnType(Model\User::class)
            ->execute();

        $email = strtolower($graph_user->getUserPrincipalName());

        $user = User::where('email', $email)->first();
        if (!$user) {
            return redirect('/login')->withErrors(['email' => 'Unregistered Email Address']);
        }

        Auth::login($user, true);

        return parent::success($request, $access_token, $refresh_token, $profile);
    }
}
