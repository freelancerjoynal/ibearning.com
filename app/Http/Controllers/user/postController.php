<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\comment;
use App\Models\customer;
use App\Models\post;
use App\Models\post_like;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class postController extends Controller
{
    public function showPostDetails(Request $req){
        $postid = $req->postid;
        $postLikes = new post_like();
        $customer = new customer();

        $post  = DB::table('posts')
                ->join('customers' , 'posts.user_id' ,"=", 'customers.id' )
                ->where('post_id', $postid)
                ->first();
        
        if($post){
            $commnet = comment::where('post_id' , $postid)
                ->inRandomOrder()
                ->get();



            //Update The views
            $views =  $post->post_views;
            $views = $views+1;
            $update = post::where('post_id', $postid)->update(['post_views' => $views ]);

            return view('user.timeline.postDetails')
                ->with('post' , $post)
                ->with('postLikes', $postLikes)
                ->with('customer' , $customer)
                ->with('comments' , $commnet);
            }else{
                return redirect('/error');
            }
        
    }


    //Commenting system
    public function insertNewComment(Request $req){
        $postid = $req->postid;
        $comment = $req->comment;
        $commentCount = trim($req->commentCount);
        $commentCount = $commentCount+1;


        $userid = $_COOKIE['userid']/999;
        
        $sql = comment::insert([
                    [
                        'post_id' => $postid,
                        'user_id' => $userid,
                        'comment_text' => $comment
                    ]
                ]);
            
        if($sql){
            $updateCount = post::where('post_id', $postid)->update(['comments' => $commentCount]);
            if($updateCount){
                return redirect()->back();
            }else{
                return redirect('/error');
            }
        }else{
            return redirect('/error');
        }
        
    }
}
