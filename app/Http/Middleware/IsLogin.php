<?php

namespace App\Http\Middleware;

use Closure;

class IsLogin
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        // 1.如果已经登录 继续执行
        if (session()->get('admin')) {
            return $next($request);
        } // 2.如未登录跳转到登录页面
        else {
            return redirect('admin/login')->with('errors', '请登录');
        }
    }
}
