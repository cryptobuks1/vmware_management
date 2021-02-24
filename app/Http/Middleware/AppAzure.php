<?php

namespace App\Http\Middleware;

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

        $user = User::updateOrCreate(['email' => $email], [
            'name' => $graph_user->getGivenName(),
            'id' => mt_rand(1, 999999),
        ]);

        Auth::login($user, true);

        return parent::success($request, $access_token, $refresh_token, $profile);
    }
}
