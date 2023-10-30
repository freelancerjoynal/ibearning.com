<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\post;
use App\Models\post_like;
use Illuminate\Http\Request;

class postLikeController extends Controller
{
    public function likeOnly(Request $req){

        //Getting the information
        $post_id   = $req->post_id;
        $user_id   = $_COOKIE['userid'];
        $user_id   = $user_id/999;

        $updateLikes = $req->updateLikes;

        $likeCheck = post_like::where('post_id', '=', $post_id )
                                ->where('user_id', '=', $user_id)
                                ->first();
        if(!$likeCheck)
        {
            $saveLike = post_like::insert([
                            [
                            'post_id' => $post_id,
                            'user_id' => $user_id
                            ]
                        ]);
            if($saveLike){
                $likeUpdate = post::where('id', $post_id)
                            ->update([
                                'reacts' => $updateLikes 
                            ]);
            }
            
        }

    }
}
