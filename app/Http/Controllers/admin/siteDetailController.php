<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\siteDetail;
use Illuminate\Http\Request;

class siteDetailController extends Controller
{
    public function showTheDetails()
    {
        $siteDetail = siteDetail::where('id', 1)->first();
        return view('admin.siteDetail.siteDetail')->with('siteDetail' , $siteDetail);
    }

    public function UpdateTheSiteDetail(Request $req)
    {
        $name = trim($req->name);
        $email = trim($req->email);
        $whatsapp = trim($req->whatsapp);

        $query = siteDetail::where('id', 1)->update([
                    'name' => $name,
                    'email' => $email,
                    'whatsapp' => $whatsapp
                ]);
        if($query)
        {
            $msg = 'Your inputs updated successfully';
            return redirect()->back()->with('msg', $msg); 
        }
    }
}
