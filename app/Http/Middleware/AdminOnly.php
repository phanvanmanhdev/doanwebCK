<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminOnly
{
    public function handle(Request $request, Closure $next)
    {
        $user = Auth::user();
        
        if ($user && $user->role === 'admin') {
            return $next($request);
        }
        
        return redirect('/'); // Chuyển hướng nếu không phải admin
    }
}
