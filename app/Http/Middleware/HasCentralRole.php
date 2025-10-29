<?php

namespace App\Http\Middleware;

use App\Enums\RoleTypes;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class HasCentralRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response) $next
     *
     * @return Response
     */
    public function handle(Request $request, Closure $next): Response
    {
        $user = $request->user();

        if (! $user || ! $user->hasAnyRole([
            RoleTypes::CENTRAL_ADMIN->value
        ])) {
            abort(403);
        }

        return $next($request);
    }
}
