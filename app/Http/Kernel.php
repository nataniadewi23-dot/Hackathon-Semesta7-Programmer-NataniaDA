<?php

namespace App\Http;

use illuminate\Foundation\Http;

class Kernel extends HttpKernel
{
    protected $routeMiddleware = [
        'auth' => \App\Http\Middleware\Authenticate::class,
        'cache.headers' => \Illuminate\Http\Middleware\SetCacheHeaders::class,
        'can' => \Illuminate\Auth\Middleware\Authorize::class,
        'guest' => \App\Http\Middleware\RedirectIfAuthenticated::class,
        'signed' => \Illuminate\Routing\Middleware\ValidateSignature::class,
        'throttle' => \Illuminate\Routing\Middleware\Throttle::class,
        'verified' => \Illuminate\Auth\Middleware\EnsureEmailIsVerified::class,
        'ensureUsercanVote' => \App\Http\Middleware\EnsureUserCanVote::class,
    ];
}

    
    
