<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\country;
use App\Models\customer;
use Illuminate\Http\Request;

class userLoginRegisterController extends Controller
{
    //Showing the registration page
    public function showRegisterPage()
    {
        $county = country::get();
        return view('website.register')->with('countries' , $county);
    }
    //Cofirming the user registration
    public function userRegistration(Request $req)
    {
        
        
        

        $name       = trim($req->name);
        $email      = trim($req->email);
        $username   = trim($req->username);
        $username   = preg_replace('/\s+/', '', $username);
        $password   = trim($req->password);
        $phone      = trim($req->phone);
        $whatsapp   = trim($req->whatsapp);
        $gender     = trim($req->gender);
        $country    = trim($req->country);
        $refererName = trim($req->refererName);
        $referLink = $_SERVER['SERVER_NAME'].'/refer/'.uniqid();


        //Checking the username is available or not.
        $checkUsername = customer::where('username', $username)->first();
        $checkEmail = customer::where('email', $email)->first();
        if($checkEmail)
        {
            //Checking email is availble or not.
            $msg = 'This email address is already used';
            return redirect()->back()->with('email', $msg);

        }elseif($checkUsername)
        {
            //Checking email is availble or not.
            $msg = 'This username is already used';
            return redirect()->back()->with('email', $msg);
        }else
        {
            $sql = customer::insert([
                'status' => 0,
                'name' => $name,
                'email' => $email,
                'username' => $username,
                'email' => $email,
                'password' => $password,
                'phone' => $phone,
                'whatsapp' => $whatsapp,
                'gender' => $gender,
                'country' => $country,
                'referLink' => $referLink
               ]);
            if($sql)
            {
                $msg = 'Registered please wait & login. Thanks';
                return redirect('/log-in')->with('msg' , $msg);
            }else
            {
                return redirect()->back();
            }
        }
    }
    //Showing the log in page
    public function showLogInPage()
    {
        return view('website.login');
    }
    //UserLogIn 
    public function userLoginConfirm(Request $req )
    {
        $email = $req->email;
        $email = strtolower(trim($email));

        $pass  = $req->password;
        $pass  = trim($pass);
        
        $customer = customer::where('email',$email )->first();
        
        $currentTime = time();
        $minLoginTime = $currentTime - 259200;
        

        if($customer){
            $dbPass = $customer['password'];
            $username = $customer['username'];
            $userAvatar = $customer['image'];
            $customerid = $customer['id'];
            $lastLoginTime = $customer['lastLogin'];
            $status = $customer['status'];
            $userid = $customer['id'];
            $userid = $customer['id']*999;


            if( $pass == $dbPass)
            {
  
                if($status == 1)
                {
                    //Checking the minimul login time
                    if($lastLoginTime > $minLoginTime)
                    {
                        $userVarify = md5(md5(md5($pass)));

                        $username = setcookie("username", $username , time()+ 86400 * 1);
                        $userid = setcookie("userid", $userid , time()+ 86400 * 1);
                        $userVarify = setcookie("userAuth", $userVarify , time()+ 86400 * 1);
                        $userAvatar = setcookie("userAvatar", $userAvatar , time()+ 86400 * 1);
                        customer::where('id', $customerid)->update(['lastLogin' => $currentTime ]);



                        if($username && $userVarify)
                        {
                            return redirect('/user/timeline');
                        }
                    }else{
                        customer::where('id', $customerid)->update(['status' => 0 ]);
                        $msg = 'Your account is currently disabled. Please contact the admin.';
                        return  view('website.login')->with('msg' , $msg);
                    }
                    
                }else{
                    $msg = 'Your account is under review. Please contact the admin.';
                    return  view('website.login')->with('msg' , $msg);
                }
                
            }else
            {
                $msg = 'Password is wrong';
                return  view('website.login')->with('msg' , $msg);
            }
        }else
        {
            $msg = 'There is no user with this email address';
            return view('website.login')->with('msg' , $msg);
        }
    }

    //Register by refer 
    public function registerByRefer()
    {
        return redirect('/register');
    }
}
