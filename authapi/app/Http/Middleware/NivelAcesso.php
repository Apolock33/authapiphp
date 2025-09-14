<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class NivelAcesso
{
    public function handle(Request $request, Closure $next, ...$roles)
    {
        $user = $request->user();
        info($user,$roles);

        if (!in_array($user->nivel, $roles)) {
            return response()->json([
                'error' => 'Acesso negado'
            ], 403);
        }

        return $next($request);
    }
}
