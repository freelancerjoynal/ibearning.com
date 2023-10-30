<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\customer;
use App\Models\paymentRequest;
use Illuminate\Http\Request;

class paymentController extends Controller
{
    public function addNewRequest(Request $req)
    {
        $amount = $req->amount;
        $userId = $req->userId;
        $username = $_COOKIE['username'];

        $getUserData = customer::where('username', $username)->first();
        $userId = $getUserData['id'];
        $name = $getUserData['name'];
        $oldPoint = $getUserData['point'];

        $insertRequest = paymentRequest::insert([
                            'amount' => $amount,
                            'userId' => $userId,
                            'username' => $username,
                            'name' => $name,
                            'status' => 0
                        ]);                        
        if($insertRequest)
        {
            $newPoint = $oldPoint - $amount;
            $sql = customer::where('id', $userId)->update(['point' => $newPoint]);

            $msg = 'A payment request submitted successfully';
            return  redirect()->back()->with('msg' , $msg);
        }else
        {
            $msg = 'A payment request failed';
            return  redirect()->back()->with('msg' , $msg);
        }

    }
    public function payDuPoint(Request $req)
    {
        $userId = $req->id;
        $user= customer::where('id', $userId)->first();
        
        $point = $user['point'];

        $newPoint = $point - 400;



        $sql = customer::where('id', $userId)->update([
            'duStatus' => 1,
            'point'    => $newPoint
        ]);
        
        return redirect()->back();
    }
}
