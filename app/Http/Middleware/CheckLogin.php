<?php

namespace App\Http\Middleware;

use Closure;
use \App\users;
use Illuminate\Support\Facades\Auth;

class CheckLogin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        #DB呼び出し
        $user = new \App\users;
        $error_check = false;
        #認証が既に行われているかのチェック
        if(Auth::check()){
            #この中は認証が行われていた場合のチェック
            #ただし、クッキーの時間が過ぎてもリメンバーされるので
            #時間があったらチェックボックスを作るか考えてます
            return $next($request);
        }else if(Auth::viaRemember()){
            #継続ログインが残っていたら実行
            #※期限をどうするか迷走中
            return $next($request);
        }else if(Auth::guest()){
            return redirect('login');
        }
    }
}
