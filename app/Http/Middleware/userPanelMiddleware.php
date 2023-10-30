<?php

namespace App\Http\Middleware;

use App\Models\customer;
use Closure;
use Illuminate\Http\Request;

class userPanelMiddleware
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
        $username   = isset($_COOKIE['username']);
        $userAuth = isset($_COOKIE['userAuth']); 
        if($username && $userAuth)
        {
            $username   = $_COOKIE['username'];
            $userAuth = $_COOKIE['userAuth']; 
            $customerDetail = customer::where('username',$username )->first();
            if($customerDetail)
            {
                $dbUsr  = $customerDetail['username'];
                $dbPass = md5(md5(md5($customerDetail['password'])));

                if($username == $dbUsr && $userAuth == $dbPass )
                {
                    return $next($request);
                }else{
                    
                    setcookie("username", null , time()- 86400 * 8);
                    setcookie("userAuth", null , time()- 86400 * 8);
                    return redirect('/log-in');
                }
            }else
            {
                return redirect('/log-in');
            }       
        }else
        {
            return redirect('log-in');
        }
    }
}
