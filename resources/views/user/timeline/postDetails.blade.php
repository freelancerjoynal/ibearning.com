@extends('user.layout.app')
@section('title')
     TimeLine -  {{$_COOKIE['username']}}
@endsection
@section('content')
<div class="row">
    <div class="col-md-4">
        {{-- Sidebar-Including --}}
        @include('user.partials.sidebar')
    </div>
    <div class="col-md-8">
        
        <div class="post-detail bg-white p-2 p-md-5">
            <div class="content-box">
                <div class="user-info d-flex">
                    <a href="/user/profile/{{$post->id }}" class="d-flex relative">
                        <img src="{{$post->image}}">
                        <p class="mt-1 pl-2">{{$post->username}}</p>
                    </a>
                </div>
                @if ($post->post_image !== null)
                    <div class="image">
                        <img class="w-100" src="{{$post->post_image }}">
                    </div>
                @endif
                @if ($post->post_video !== null)
                    <div class="video">
                        <hr>
                        <video class="w-100" src="{{$post->post_video }}" controls></video>
                    </div>
                @endif
                <p style="font-size:20px">
                    {{$post->post_body}}
                </p>
                <div class="reactions text-center mt-1">
                    @php
                        $user_id   = $_COOKIE['userid'];
                        $user_id   = $user_id/999;
                        $postid    = $post->post_id;
                        $likes     = $postLikes::where('post_id', $postid)->where('user_id', $user_id)->first();
                    @endphp
                    @if ($likes)
                    <div class="liked absolute-middle"> <a href="javascript:void(0)">{{$post->reacts }}</a> </div>
                    @else
                    <div id="{{$postid}}" count="{{$post->reacts}}" id="like" class="like absolute-middle"> <a href="javascript:void(0)">{{$post->reacts }}</a> </div>
                    @endif

                    <div class="comment absolute-middle"><a href="/user/post-id/{{ $post->post_id;}}">{{$post->comments }}</a></div>
                    <div class="views absolute-middle"><a href="javascript:void(0)">{{ $post->post_views}}</a></div>
                </div>
                <br>
                <h6>Comments....</h6>
                <div class="comments-view">
                    @if ($comments) 
                        @foreach ($comments as $comment)
                        <div class="comment-box">
                            @php
                            $commenter_id    = $comment->user_id;
                            $commentinfo     = $customer::where('id', $commenter_id)->first();
                        @endphp
                            <div class="user-info d-flex">
                                <a href="/user/profile/{{ $commenter_id }}" class="d-flex relative">
                                    <img src="{{ $commentinfo->image}}">
                                    <p class="mt-1 pl-2">{{ $commentinfo->name}}</p>
                                </a>
                            </div>
                            <div class="comment-content">
                                <p> {{$comment->comment_text}} </p>
                            </div>
                        </div>
                        @endforeach  
                    @endif
                    <div class="comment-box">
                        <form action="/user/comment/insert" method="post">
                            @csrf
                            <input name="postid" type="hidden" value="{{$post->post_id }}">
                            <input name="commentCount" type="hidden" value="{{$post->comments }}">
                            <textarea class="w-100 m-1" name="comment" required  rows="3" placeholder="Write Something"></textarea>
                            <div class="text-right"><input type="submit" class="btn btn-sm btn-success text-right  mt-1" value="Comment"></div>
                        </form>
                    </div>
                </div>
            </div>
        </div>   
    </div>
</div>
@endsection
@section('script')
@endsection