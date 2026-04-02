<?php
namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next, ...$roles)
    {
        if (! Auth::check()) {
            return redirect('/login');
        }

        $user = Auth::user();

        // Jika user memiliki salah satu role yang diizinkan, lanjutkan
        if (in_array($user->role, $roles)) {
            return $next($request);
        }

        // Tambahan pengecekan khusus jika diperlukan
        if ($request->routeIs('guru.*') && $user->role !== 'admin') {
            abort(403, 'Anda tidak memiliki akses ke halaman guru.');
        }

        // Default: akses ditolak
        abort(403, 'Anda tidak memiliki akses.');
    }
}
