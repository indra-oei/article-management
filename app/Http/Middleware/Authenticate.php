<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Auth\Middleware\Authenticate as MiddlewareAuthenticate;

class Authenticate extends MiddlewareAuthenticate
{
    protected function unauthenticated($request, array $guards)
    {
        $fallback = match ($guards[0] ?? 'web') {
            'admin' => route('admin.login'),
            default => route('login'),
        };

        throw new AuthenticationException(
            'Unauthenticated.',
            $guards,
            $request->expectsJson() ? null : $fallback,
        );
    }
}
