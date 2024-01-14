<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\customer;
use App\Models\liveclass;
use App\Models\notification;
use App\Models\paymentRequest;
use App\Models\payMethod;
use App\Models\supportTeaam;
use Illuminate\Http\Request;

class userDashboardController extends Controller
{
    public function showTheDashbard()
    {
        $username = $_COOKIE['username'];
        $sql = customer::where('username', $username)->first();
        $paySQL = payMethod::get();
        $payRequests = paymentRequest::where('username',$username )->take(5)->orderBy('id', 'DESC')->get();
        $notifications = notification::orderBy('id', 'DESC')->take(5)->get();
        $classes = liveclass::orderBy('id', 'DESC')->get();
        $supportTeam = supportTeaam::get();

        //Settimg the last last login time
        $customerid  = $sql['id'];
        $currentTime = time();
        
        customer::where('id', $customerid)->update(['lastLogin' => $currentTime ]);

        //Checking the Locked or Unlocked
        $status = $sql['status'];


        if($status == 1)
        {
            return view('user.dashboard')->with('userInfo' , $sql)->with('methodName' , $paySQL)->with('payRequests' , $payRequests)->with('notifications' , $notifications)->with('classes' , $classes)->with('supportTeam' , $supportTeam);
        }else
        {
            return redirect('/user/log-out');
        }
    }

    public function logOut()
    {
        if (isset($_SERVER['HTTP_COOKIE'])) {
            $cookies = explode(';', $_SERVER['HTTP_COOKIE']);
            foreach($cookies as $cookie) {
                $parts = explode('=', $cookie);
                $name = trim($parts[0]);
                setcookie($name, '', time()-1000);
                setcookie($name, '', time()-1000, '/');
            }
        }
        $username   = isset($_COOKIE['username']);
        $userAuth = isset($_COOKIE['userAuth']);

        if($username && $userAuth)
        {
            setcookie("username", null , time()- 86400 * 8);
            setcookie("userAuth", null , time()- 86400 * 8);
            return redirect('/log-in');
        }else{
            return redirect('/log-in');
        }
    }
}
