<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\liveclass;
use Illuminate\Http\Request;

class classController extends Controller
{
    public function showTheClasses()
    {
        $sql = liveclass::get();
        return view('admin.class.list')->with('classlist' , $sql);
    }

    public function addNewClass(Request $req)
    {
        $className = trim($req->name);
        $classLink = trim($req->link);

        $sql=  liveclass::insert([
                    'name' => $className,
                    'link' => $classLink
                ]);
                  

        return redirect()->back();
    }


    //edit the class link
    public function editClassItem(Request $req)
    {
        $id = $req->id;
        $sql = liveclass::where('id', $id)->first();
        return view('admin.class.edit')->with('class' , $sql);
    }

    //Update the class link
    public function updateClassitem(Request $req)
    {
        $id = $req->id;
        $link = $req->link;
        liveclass::where('id', $id)->update([
            'link' => $link
        ]);
        return redirect('/web-admin/classes');

    }

    public function deleteClass(Request $req)
    {
        $id = $req->id;
        liveclass::where('id', '=', $id)->delete();
        return redirect()->back();
    }
}
