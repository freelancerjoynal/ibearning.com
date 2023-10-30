<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\notification;
use Illuminate\Http\Request;

class notificationController extends Controller
{
    public function showNotifications()
    {
        $sql = notification::orderBy('id', 'DESC')->get();

        if($sql)
        {
            return view('admin.notification.notification')->with('notifications', $sql);
        }else
        {
            return redirect('/web-admin');
        }

    }
    //Adding a new notification
    public function addNewNotifiation(Request $req)
    {
        $message = trim($req->message);
        $sql = notification::insert([
                    'message' => $message
                ]);
        if($sql)
        {
            $msg = 'A notification added successfully';
            return  redirect()->back()->with('msg' , $msg);
        }else
        {
            $msg = 'A notification not added successfully';
            return  redirect()->back()->with('msg' , $msg);
        }

    }


    //Delete the notification 
    public function deleteNotification(Request $req)
    {
        $notificationId = $req->id;
        
        $sql = notification::where('id', '=', $notificationId)->delete();

        if($sql)
        {
            $msg = 'A notification deleted successfully';
            return  redirect()->back()->with('msg' , $msg);
        }else{
            $msg = 'Failed to delete';
            return  redirect()->back()->with('msg' , $msg);
        }
    }
}
