<?php

namespace App\Http\Controllers\user\timeline;

use App\Http\Controllers\Controller;
use App\Models\customer;
use App\Models\post;
use App\Models\post_like;
use App\Providers\AppServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class timelineController extends Controller
{
    public function showTimeLine(){

        $posts = DB::table('posts')
                ->join('customers' , 'posts.user_id' ,"=", 'customers.id' )
                ->inRandomOrder()
                ->simplePaginate(12);
        $postLikes = new post_like();
        
        return view('user.timeline.timeline')->with('posts', $posts)->with('postLikes', $postLikes);
    }

    //Showing the friends profile
    public function showProfile(Request $req){
        $userid = $req->userid;
        $postLikes = new post_like();
        $name = customer::where('id', $userid)->first();

        
        $posts = DB::table('posts')
                ->join('customers' , 'posts.user_id' ,"=", 'customers.id' )
                ->select('customers.name', 'customers.username', 'posts.*')
                ->where('user_id', $userid)
                ->orderBy('id', 'DESC')
                ->simplePaginate(6);
        if($posts){
            return view('user.timeline.profile')
                ->with('posts', $posts)
                ->with('name', $name)
                ->with('postLikes', $postLikes);
        }else{
            return redirect('/error');
        }

    }

    //Adding a new post
    public function addNewPost(Request $req){
        $postBody = trim($req->postBody);
        
        $lastid = post::max('id');
        $lastid = $lastid+1;
        
        

        $savePost = post::insert([
                    'post_id'  => $lastid,
                    'user_id'  => $_COOKIE['userid']/999,
                    'post_body'=> $postBody,
                    'reacts'   => 0,
                    'post_views' => 0,
                    'comments' => 0,
                    'post_image' => null,
                    'post_video' => null

                    ]);

            return redirect()->back();

        
        


    }















    public function deletePost(Request $req)
    {
        $postid = $req->postid;
        
        $delete = post::where('id', '=', $postid)->delete();
        

        if($delete){
            return redirect()->back();
        }else{
            return redirect('/error');
        }
    }
}
