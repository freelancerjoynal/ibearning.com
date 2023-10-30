@extends('admin.layout.app')
@section('title')
    Courses
@endsection
@section('style')
    
@endsection


@section('content')
<h2 class="py-3">
    <q class="border-b">All Courses</q>
    <!-- Button to Open the Modal -->
    <button type="button" class="btn btn-primary float-right" data-toggle="modal" data-target="#addCouse"> +</button>
</h2>
<div id="courses">
    @if($courses)
    @foreach ($courses as $course)
    <div class="course-item">
        <div class="card">
            <img class="card-img-top" src="/public/{{$course['image']}}" alt="Card image cap">
            <div class="card-body">
              <h5 class="card-title">{{$course['title']}}</h5>
              <div class="action-area">
                <div>{{$course['time']}} Days</div>
                <div class="text-right">
                    <a href="/web-admin/courses/delete/{{$course['id']}}" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this item?');">X</a>
                    <a href="/web-admin/courses/edit/{{$course['id']}}" class="btn btn-primary"><i class="fa fa-code"></i></a>
                </div>
              </div>
            </div>
          </div>
    </div>
    @endforeach
    @endif
</div>
<!--Add Course Modal Body-->
<div class="modal" id="addCouse">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Add a new course</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
            <form action="/web-admin/courses/add-new-couse" method="post" enctype="multipart/form-data">
                @csrf
                <label for="title">Couse Title</label>
                <input type="text" id="title" name="title" required class="form-control">
                <label for="link">Course Link</label>
                <input type="text" id="link" name="link" required class="form-control">
                <label for="time">Time (Days)</label>
                <input type="number" name="time" id="time" required class="form-control">
                <label for="video">Video Link</label>
                <input type="text" name="video" id="video" required class="form-control">
                <label for="description">Description</label>
                <textarea id="description" name="description" class="form-control" required>Type something</textarea>
                <label for="topics">Couse Topics</label>
                <textarea id="topics" name="topics" class="form-control" required>Separate By Comma(,)</textarea>
                <label for="iamge">Select an image</label>
                <input type="file" id="image" name="image" required>
                <button type="submit" class="btn btn-success float-right mt-4">Save</button>
            </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">X</button>
        </div>
      </div>
    </div>
  </div>
  <!--=====================
    Sticky Notice Alert
    =========================-->
    @if(Session::has('msg'))
      <div class="sticky-notice">
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
           <q>{{Session::get('msg')}}</q>
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
      </div>
    @endif
@endsection



@section('script')


@endsection