<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class adminController extends Controller
{
    public function logOut()
    {
        $user   = isset($_COOKIE['user']);
        $userVarify = isset($_COOKIE['userVarify']);

        if($user && $userVarify)
        {
            setcookie("user", null , time()- 86400 * 8);
            setcookie("userVarify", null , time()- 86400 * 8);
            return redirect('/web-admin/login');
        }else{
            return redirect('/web-admin/login');
        }
    }
}
