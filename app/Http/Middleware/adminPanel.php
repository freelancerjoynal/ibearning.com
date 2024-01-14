<?php

namespace App\Http\Middleware;

use App\Models\User;
use Closure;
use Illuminate\Http\Request;

class adminPanel
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
        $user   = isset($_COOKIE['user']);
        $userVarify = isset($_COOKIE['userVarify']); 
        if($user && $userVarify)
        {
            $user   = $_COOKIE['user'];
            $userVarify = $_COOKIE['userVarify']; 
            $userDetail = User::where('username',$user )->first();
            if($userDetail)
            {
                $dbUsr  = $userDetail['username'];
                $dbPass = md5(md5($userDetail['password']));

                if($user == $dbUsr && $userVarify == $dbPass )
                {
                    return $next($request);
                }else{
                    
                    setcookie("user", null , time()- 86400 * 8);
                    setcookie("userVarify", null , time()- 86400 * 8);
                    return redirect('/web-admin/login');
                }
            }else
            {
                return redirect('/web-admin/login');
            }       
        }else
        {
            return redirect('/web-admin/login');
        }
        
    }
}
