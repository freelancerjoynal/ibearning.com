<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\supportTeaam;
use Illuminate\Http\Request;

class supportingTeamController extends Controller
{
    //Showing the supporting team
    public function showTheSupportingTeamList()
    {
        $sql = supportTeaam::get();
        return view('admin.supportTeam.teamlist')->with('teamlist' , $sql);
    }

    //Add new member 
    public function addNewMember(Request $req)
    {
        $name = $req->name;
        $whatsapp = $req->whatsapp;

        supportTeaam::insert([
            'name' => $name,
            'whatsApp' => $whatsapp
        ]);
        return redirect()->back();
        
    }


    //Deleting the member
    public function delteTheTeamMember(Request $req)
    {
        $id = $req->id;
        supportTeaam::where('id', '=', $id)->delete();
        return redirect()->back();
    }
}
