<?php

namespace App\Http\Middleware\Web;

use Closure;

class IsAdmin
{
    public function handle($request, Closure $next)
    {
        $auth = auth()->guard('web');
        if ($auth->check() && $auth->user()->role_id == 1) {
            return $next($request);
        }
        return redirect()->back()
            ->with('message', format_message('Anda tidak memiliki akses. Silahkan hubungi Admin !', 'danger'));
    }
}
