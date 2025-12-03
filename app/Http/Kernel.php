<?php

namespace App\Http;

use Illuminate\Foundation\Http\Kernel as HttpKernel;

class Kernel extends HttpKernel
{
    // ... (middleware stack lainnya) ...

    protected $routeMiddleware = [
        // ... middleware bawaan Laravel ...
        'throttle' => \Illuminate\Routing\Middleware\ThrottleRequests::class,
        
        // === MIDDLEWARE KUSTOM ===
        'role' => \App\Http\Middleware\RoleMiddleware::class, // <-- PENTING
    ];
}