<?php

use App\Providers\RepositoryProvider;
use Inertia\Inertia;
use Inertia\Middleware;

class HandleInertiaRequests extends Middleware
{
    public function share(Request $request)
    {
        Inertia::share('repositories', fn (Request $request) => $request->user()
            ? $request->user()->only('id', 'name', 'email')
            : null);
        return array_merge(parent::share($request), [

            // Synchronously
            'appName' => config('app.name'),

            // Lazily
            'user' => fn () => 'user',

            'repositories' => RepositoryProvider::getRepositories(),
        ]);
    }
}
