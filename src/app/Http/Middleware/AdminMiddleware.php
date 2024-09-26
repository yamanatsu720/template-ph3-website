<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function handle(Request $request, Closure $next): Response
    {
        // ユーザーがログインしていない、または管理者でない場合はトップページにリダイレクト
        if (!auth()->check() || auth()->user()->is_admin !== 1) {
            return redirect('/');  // トップページにリダイレクト
        }

        // 管理者の場合は次の処理へ
        return $next($request);
    }
}
