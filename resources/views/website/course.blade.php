@extends('website.layout.app')
@section('title')
    Courses
@endsection
@section('style')2
    
@endsection
@section('content')

<section class="pt-3 pb-5">
    <div class="container">
        <h2 class="text-center pt-3">Courses</h2>
        <div id="courses">
            @if($courses)
            @foreach ($courses as $course)
            <div class="course-item">
                <div class="card">
                    <img class="card-img-top" src="/public/{{$course['image']}}" alt="Card image cap">
                    <div class="card-body">
                      <h5 class="card-title">{{$course['title']}}</h5>
                      <hr>
                      <div class="action-area">
                        <div>{{$course['time']}} Days</div>
                        <div class="text-right">
                            <a href="/courses/{{$course['id']}}" class="btn btn-primary">View Details</a>
                        </div>
                      </div>
                    </div>
                  </div>
            </div>
            @endforeach
            @endif
        </div>
    </div>
</section>
@endsection
@section('script')
    
@endsection
    