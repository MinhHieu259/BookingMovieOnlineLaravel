<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminWebMiddleWare
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if(Auth::guard('admins')->check()){
            if(Auth::guard('admins')->user()->maQuyen == 'Q000001'){
                return $next($request);
            }else {
                return redirect('/access-denied');
            }
        }else if(!Auth::guard('admins')->check()){
            return redirect('/admin/dang-nhap')->with('message', 'Bạn chưa đăng nhập !!!');
        }
    }
}
