<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\customer;
use Illuminate\Http\Request;

class userController extends Controller
{
    //Showing the users
    public function showUserList()
    {
        $customers = customer::orderBy('id', 'DESC')->get();
        return view('admin.users.userlist')->with('users' , $customers);
    }
    //Showing the user Information 
    public function viewTheUserData(Request $req)
    {
        $userId = $req->userId;
        $sql = customer::where('id', $userId)->first();
        return view('admin.users.profile')->with('userData' , $sql);
    }

    //Delete the user
    public function deleteUser(Request $req)
    {
        $userId = $req->userId;
        $sql = customer::where('id', '=', $userId)->delete();

        if($sql){
            $msg = 'An user deleted successfully';
            return redirect('/web-admin/users')->with('msg' , $msg);
        }else
        {
            $msg = 'An user not deleted successfully';
            return redirect('/web-admin/users')->with('msg' , $msg);
        }
    }

    //Aprove the user
    public function userAprove(Request $req)
    {
        $time = time();
        $userId = $req->userId;
        $sql = customer::where('id', $userId)->update([
                    'status' => 1,
                    'lastLogin' => $time
                ]);
        if($sql)
        {
            $msg = 'User aproved successfully';
            return redirect('/web-admin/users')->with('msg' , $msg);
        }else
        {
            $msg = 'User aproved successfully';
            return redirect('/web-admin/users')->with('msg' , $msg);
        }
    }

    //Deactive the user 
    public function userDeActive( Request $req)
    {
        $userId = $req->userId;
        $sql = customer::where('id', $userId)->update([
                    'status' => 0
                ]);
        if($sql)
        {
            $msg = 'User Deactivated successfully';
            return redirect('/web-admin/users')->with('msg' , $msg);
        }else
        {
            $msg = 'User Deactivated successfully';
            return redirect('/web-admin/users')->with('msg' , $msg);
        }
    }

    //SMS Done Option
    public function smsSentDone(Request $req)
    {
        $userId = $req->userId;
        
        $sql = customer::where('id', $userId)->update([
                    'sms' => 1
                ]);
        if($sql)
        {
            $msg = 'Status updated successfully';
            return redirect('/web-admin/users')->with('msg' , $msg);
        }else
        {
            $msg = 'Status updated successfully';
            return redirect('/web-admin/users')->with('msg' , $msg);
        }

    }

    //Update the point of users
    public function updatePoint(Request $req)
    {
        $userId = $req->userId;
        $point = $req->point;

        $sql = customer::where('id', $userId)->update([
            'point' => $point
        ]);
        if($sql)
        {
            $msg = 'Point updated successfully';
            return  redirect()->back()->with('msg' , $msg);
        }else
        {
            $msg = 'Point updated successfully';
            return  redirect()->back()->with('msg' , $msg);
        }
        
    }
}