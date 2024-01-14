<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class adminLoginController extends Controller
{
    //Show the login Page
    public function showLoginPage(){
        $user   = isset($_COOKIE['user']);
        $userVarify = isset($_COOKIE['userVarify']);

        if( $user && $userVarify )
        {
            return redirect('/web-admin/dashbaord');
        }else
        {
            return view('admin.login');
        }
    }

    //Login With Email & Password
    public function adminLoginCheck(Request $req)
    {
        $email = $req->email;
        $email = strtolower(trim($email));

        $pass  = $req->password;
        $pass  = trim($pass);
        $pass  = md5($pass);
        
        $user = User::where('email',$email )->first();
        

        if($user){
            $dbPass = $user['password'];
            $username = $user['username'];

            if($pass == $dbPass)
            {
                $userVarify = md5(md5($pass));

                $username = setcookie("user", $username , time()+ 86400 * 7);
                $userVarify = setcookie("userVarify", $userVarify , time()+ 86400 * 7);

                if($user && $userVarify)
                {
                    return  redirect('/web-admin/dashboard');
                }
            }else
            {
                $msg = 'Password is wrong';
                return view('admin.login')->with('msg' , $msg);
            }
        }else
        {
            $msg = 'There is no user with this email address';
            return view('admin.login')->with('msg' , $msg);
        }
    }
}
