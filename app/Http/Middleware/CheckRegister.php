<?php

namespace App\Http\Middleware;

use Closure;

class CheckRegister
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
        $request->session()->flush();
        $error_check = false;
        #正規表現チェック
        if(preg_match("#[^ぁ-んァ-ヶー一-龠a-z0-9０-９A-Z_]#u",$request->nick_name)){
            $request->session()->put("nick_name",$request->nick_name);
            $error_check = true;
            $request->session()->put("nick_name_error",'nike_name_error');
        }else{
            
            $request->session()->put("nick_name",$request->nick_name);
        }
        if(filter_var($request->email,FILTER_VALIDATE_EMAIL === false)){
             $error_check = true;
            $request->session()->put("email_error",'email_error');
            $request->session()->put("email",$request->email);
        }else{
           $request->session()->put("email",$request->email);
        }
        if(preg_match("#\A[a-z\d]{8,100}+\z#i",$request->password)){
            if($request->password === $request->re_password){
            }else{
                $error_check = true;
                $request->session()->put("re_password_error",'re_password_error');
            }
        }else{
            $error_check = true;
            $request->session()->put("password_error",'password_error');
        }
        if($error_check){
            return redirect('/login/register');
        }else{
            $request->session()->flush();
            return $next($request);
        }
    }
}
