<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\customer;
use App\Models\worksubmitlist;
use Illuminate\Http\Request;

class workingZoneController extends Controller
{
    public function showTheWorks()
    {
        $username = $_COOKIE['username'];
        $sql = worksubmitlist::orderBy('id', 'DESC')->get();
        $customer = customer::where('username', $username)->first();

        return view('user.workZone.worklist')->with('worklist' , $sql)->with('user' , $customer);
    }

    public function submitWork(Request $req)
    {
        $name = trim($req->name);
        $link = trim($req->link);
        $customerId = trim($req->userid);
        $CustomerName = trim($req->username);


        worksubmitlist::insert([
            'name' => $name,
            'customerId' => $customerId,
            'CustomerName' => $CustomerName,
            'link' => $link
        ]);

        return redirect()->back();
        

    }
}
