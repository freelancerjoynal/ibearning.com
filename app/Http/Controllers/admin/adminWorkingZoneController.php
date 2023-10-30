<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\customer;
use App\Models\worksubmitlist;
use Illuminate\Http\Request;

class adminWorkingZoneController extends Controller
{
    //Showing the working list
    public function showThelinksSubmitted()
    {
        $sql = worksubmitlist::orderBy('id', 'DESC')->get();

        return view('admin.workZone.worklist')->with('worklist' , $sql);
    }


    //Open the aprove page
    public function openTheAproveForm(Request $req)
    {
        $id = $req->id;
        $customerid = $req->userid;
        return view('admin.workZone.submitDone')->with('customerid' , $customerid)->with('workid' , $id);
    }

    //Finaly aprove the work
    public function AproveTheWork(Request $req )
    {
        $customerid = $req->customerid;
        $workid     = $req->workid;
        $point     = trim($req->point);

        $customer = customer::where('id', $customerid)->first();

        $oldPoint = $customer['point'];
        $newPoint = $oldPoint + $point;

        customer::where('id', $customerid)->update(['point' => $newPoint]);
        worksubmitlist::where('id', $workid)->update(['status' => 1 , 'point' => $point]);
        return redirect('/web-admin/working-zone');

    }

    //Deleteing the work item
    public function deleteTheSubmitted(Request $req)
    {
        $id = $req->id;
        worksubmitlist::where('id', '=', $id)->delete();
        return redirect()->back();
    }
}
