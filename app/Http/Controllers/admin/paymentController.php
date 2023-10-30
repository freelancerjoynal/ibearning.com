<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\paymentRequest;
use Illuminate\Http\Request;

class paymentController extends Controller
{
    public function showThePaymentRequest()
    {
        $sql = paymentRequest::orderBy('id', 'DESC')->get();
        return view('admin.payment.request')->with('requests', $sql);
    }

    //Pay the request 
    public function payTheRequest(Request $req)
    {
        $reqid = $req->requestid;
        $sql =  paymentRequest::where('id', $reqid)->update([
                    'status' => 1
                ]);
        if($sql)
        {
            $msg = 'Paymetn status updated';
            return  redirect()->back()->with('msg' , $msg);
        }
    }

    //delete the request 
    public function deleteRequest(Request $req)
    {
        $reqid = $req->requestid;
        $sql = paymentRequest::where('id', $reqid)->delete();

        if($sql)
        {
            $msg = 'Paymetn item deleted';
            return  redirect()->back()->with('msg' , $msg);
        }else
        {
            $msg = 'Something wrong happend';
            return  redirect()->back()->with('msg' , $msg);
        }
    }

    
}
