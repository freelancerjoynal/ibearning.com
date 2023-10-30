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
        <div class="article-area bg-white border-left ">
            @isset($posts)
                @foreach ($posts as $post)
                    <article>
                        <div class="user-info">
                            <a href="/user/profile/{{$post->id }}" class="d-flex relative">
                                <img src="{{$post->image }}" alt="">
                                <p class="mt-1 pl-2"> {{$post->name }} </p> 
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