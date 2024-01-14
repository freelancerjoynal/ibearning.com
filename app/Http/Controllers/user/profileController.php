<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\customer;
use App\Models\post;
use App\Models\post_like;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class profileController extends Controller
{
    public function ShowOwnProfile(Request $req){
        $id = $_COOKIE['userid']/999;
        $user = customer::where('id', $id)->first();

        $posts = post::where('user_id', $id)->orderBy('id', 'DESC')->simplePaginate(6);
        $postLikes = new post_like();
        return view('user.timeline.ownProfile')
            ->with('posts', $posts)
            ->with('user', $user)
            ->with('postLikes', $postLikes);
    }
    





    public function updateProfile(Request $req)
    {
        $id = $req->id;
        $name = trim($req->name);
        $birthDate = trim($req->birthDate);
        $city = trim($req->city);
        $language = trim($req->language);
        $postCode = trim($req->postCode);
        $facebookLink = trim($req->facebookLink);
        $gender = trim($req->gender);
        $paymentMethod = trim($req->paymentMethod);
        $payID = trim($req->payID);
        $refererName = trim($req->refererName);

        $sql = customer::where('id', $id)->update([
                    'name' => $name,
                    'gender' => $gender,
                    'birthDate' => $birthDate,
                    'city' => $city,
                    'postalCode' => $postCode,
                    'language' => $language,
                    'facebook' => $facebookLink,
                    'paymenMethod' => $paymentMethod,
                    'paymentAddress' => $payID,
                    'name' => $name,
                    'refererName' => $refererName
               ]);
        if($sql)
        {
            $msg = 'Profile updated successfully';
            return redirect()->back()->with('msg' , $msg);
        }
        else
        {
            $msg = 'Profile updated failed';
            return redirect()->back()->with('msg' , $msg);
        }

        
    }
}
