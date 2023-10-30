@extends('admin.layout.app')
@section('title')
    Notifications
@endsection
@section('style')
    
@endsection
@section('content')
<h3 class="mt-3">Notifications:
    <!-- Button to Open the Modal -->
    <button type="button" class="btn btn-light" data-toggle="modal" data-target="#myModal">
        +
    </button>
</h3>
<div style="max-width: 500px">
  @if(Session::has('msg'))
      <div class="alert alert-warning alert-dismissible fade show" role="alert">
          {{ Session::get('msg') }}
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
          </button>
      </div>
  @endif
</div>
<div id="courses">
    @if ($notifications)
    @foreach ($notifications as $item)
    <div class="course-item">
        <div class="card">
            <img class="card-img-top w-100" src="https://img.icons8.com/stickers/100/000000/bell.png"/>
            <div class="card-body">
              <h5 class="card-title">{{$item['message']}}</h5>
                <div class="text-right">
                    <a href="/web-admin/notifications/delete/{{$item['id']}}" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this item?');">X</a>
                </div>
            </div>
          </div>
    </div>
    @endforeach
    @endif
</div>

  
  <!-- The Modal -->
  <div class="modal" id="myModal">
    <div class="modal-dialog">
      <div class="modal-content">
  
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">New Notification</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
  
        <!-- Modal body -->
        <div class="modal-body">
            <form action="/web-admin/notifications/add-new" method="post">
              @csrf
                <textarea name="message" id="message" cols="30" rows="10" class="form-control">Meet MD. JOYNAL ABEDIN</textarea>
                <div class="text-right">
                  <button type="submit" class="btn btn-primary mt-1">Save</button>
                </div>
            </form>
        </div>
      </div>
    </div>
  </div>
@endsection
@section('script')
    
@endsection