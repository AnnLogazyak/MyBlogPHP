<?php

namespace App\Http\Middleware;

use App\Models\User;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Если пользователь не авторизован, перенаправляем на страницу логина
        if (!auth()->check()) {
            return redirect('/login');
        }

        // Если пользователь не админ, перенаправляем на главную страницу
        if ((int) auth()->user()->role_id !== User::ROLE_ADMIN) {
            return redirect('/');
        }

        return $next($request);
    }
}
