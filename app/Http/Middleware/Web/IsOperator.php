<?php

namespace App\Http\Middleware\Web;

use Closure;

class IsOperator
{
    public function handle($request, Closure $next)
    {
        $auth = auth()->guard('web');
        if ($auth->check() && $auth->user()->role_id == 2) {
            return $next($request);
        }
        return redirect()->back()
            ->with('message', format_message('Hanya bisa diakses oleh operator !', 'danger'));
    }
}
