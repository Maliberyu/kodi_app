<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class Role
{
    public function handle(Request $request, Closure $next, $role)
    {
        if (! $request->user() || $request->user()->role !== $role) {
            abort(403, 'Akses ditolak! Halaman ini khusus ' . ucfirst($role));
        }

        return $next($request);
    }
}