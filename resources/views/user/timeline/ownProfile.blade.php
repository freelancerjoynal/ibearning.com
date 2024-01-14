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
        <div class="card text-center py-1">
            <h4>{{$user->name}}</h4>
        </div>
        <div class="article-area bg-white border-left ">

            <div class="new-post">
                <h3>What's on your mind?</h3>
                <form action="/user/profile/add-new/post" method="POST">
                    @csrf
                    <textarea required="" class="w-100 m-1 p-2" name="postBody" id="" rows="3" placeholder="Write Something"></textarea>
                    <div class="d-flex">
                        <div class="image mr-1">
                            <label for="formFileLg" class="btn btn-sm btn-primary form-label">Select Image</label>
                            <input name="postImage" class="d-none form-control form-control-lg" id="formFileLg" type="file">
                        </div>
                        <div class="video">
                            <label for="formFileLg" class="btn btn-sm btn-primary form-label">Select Video</label>
                            <input name="postVideo" class="d-none form-control form-control-lg" id="formFileLg" type="file">
                        </div>
                    </div>
                    <div class="text-right"><input type="submit" class="btn btn-sm btn-success text-right  mt-1 mb-1 p-2" value="POST"></div>
                </form>
            </div>


            @isset($posts)
                @foreach ($posts as $post)
                    <article>
                        <div class="user-info">
                            <a href="/user/profile/{{$user->id }}" class="d-flex relative">
                                <img src="{{$user->image }}" alt="">
                                <p class="mt-1 pl-2"> {{$user->name }} </p> 
                            </a>
                            <hr>
                            <div class="info">
                                <p>
                                    @php
                                        $text = $post->post_body;
                                    @endphp
                                    {{ \Illuminate\Support\Str::limit($text, 150, $end='...') }}
                                </p>
                                <a href="/user/post-id/{{ $post->post_id;}}">See More</a>
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

                                <div class="comment absolute-middle"><a href="/user/post-id/{{ $post->post_id}}">{{$post->comments }}</a></div>
                                <div class="views absolute-middle"><a href="javascript:void(0)">{{ $post->post_views}}</a></div>
                            </div>
                        </div>
                        <div class="actions d-flex">
                            <a class="mr-1 btn-sm btn btn-danger btn-xs" onclick=" return confirm('Are you sure to delete');" href="/user/profile/post-delete/{{ $post->post_id}}">DELETE</a>
                            <a class="btn-sm btn btn-success" href="/user/profile/post-edit/">EDIT</a>
                        </div>
                    </article>
                @endforeach
                <div class="text-center py-2">
                    {{ $posts->links() }}
                </div>
            @endisset

        </div>
    </div>
</div>
@endsection
@section('script')
@endsection