<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\AdminAuthenticate as Middleware;
use Illuminate\Http\Request;

class AdminAuthenticate extends Middleware{
    protected function redirectTo(Request $request): ?string
    {
        return $request->expectsJson() ? null : route('login');
    }
}