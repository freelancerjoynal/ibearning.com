@extends('admin.layout.app')
@section('title')
    Edit a course
@endsection
@section('style')
    
@endsection
@section('content')
  <!-- Button trigger modal -->
  <div class="absolute-middle">
    <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#exampleModal">
      Edit Options
    </button>
    <a href="javascript:history.back()" class="btn-sm btn-danger">Back</a>
  </div>
  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Edit the course</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form action="/web-admin/courses/update" method="post" enctype="multipart/form-data">
            @csrf
            <input value="{{$course['id']}}" type="hidden" name="id">
            <label for="title">Couse Title</label>
            <input value="{{$course['title']}}" type="text" id="title" name="title" required class="form-control">
            <label for="link">Course Link</label>
            <input value="{{$course['link']}}" type="text" id="link" name="link" required class="form-control">
            <label for="time">Time (Days)</label>
            <input value="{{$course['time']}}" type="number" name="time" id="time" required class="form-control">
            <label for="video">Video Link</label>
            <input value="{{$course['video']}}" type="text" name="video" id="video" required class="form-control">
            <label for="description">Description</label>
            <textarea id="description" name="description" class="form-control" required>{{$course['description']}}</textarea>
            <label for="topics">Couse Topics</label>
            <textarea id="topics" name="topics" class="form-control" required>{{$course['topics']}}</textarea>
            <label for="iamge">Select an image</label>
            <img src="/{{$course['image']}}" style="width: 100px; text-align:center">
            <input type="file" id="image" name="image">
            <button type="submit" class="btn btn-success float-right mt-4">Save Changes</button>
        </form>
        </div>
        <div class="modal-footer">
          <a href="javascript:history.back()" class="btn-sm btn-danger">Back</a>
        </div>
      </div>
    </div>
  </div>
@endsection
@section('script')
<script type="text/javascript">
    $(window).on('load', function() {
        $('#exampleModal').modal('show');
    });
</script>
@endsection
