<?php

namespace App\Http\Controllers;

use App\Models\Repository;
use App\Models\User;
use App\Providers\RepositoryProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;
use Inertia\Inertia;

class NavigationController extends Controller
{
    public function welcome()
    {
        Cache::flush();
        // if Cache for 'user' key is empty
        if (!Cache::has('user')) {
            // if not user into database
            // API call with github_user
            // save it into as User
            if (!User::first()) {
                $response = Http::get('https://api.github.com/users/' . config('settings.github_user'));
                $body = $response->body();
                $bodyDecoded = json_decode($body);
                $user = User::firstOrCreate([
                    'name' => $bodyDecoded->login,
                ]);
                $user->github = $body;
                $user->save();
            } else {
                // get user from database
                $user = User::first();
            }

            // add user to Cache
            Cache::put('user', $user, 600);
            $userCache = $user;
        } else {
            $userCache = Cache::get('user');
        }

        if (!Cache::has('repositories')) {
            $repositoriesCache = RepositoryProvider::getRepositories();
            Cache::put('repositories', $repositoriesCache, 600);
        } else {
            $repositoriesCache = Cache::get('repositories');
        }

        Inertia::share('user', $userCache);
        Inertia::share('repositories', fn (Request $request) => $repositoriesCache);
        return Inertia::render('Dashboard');
    }
}
