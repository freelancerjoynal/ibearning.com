@extends('admin.layout.app')
@section('title')
    Edit Class 
@endsection
@section('style')
    
@endsection
@section('content')

<div class="absolute-middle">
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
    Editing Option
    </button>
    <br><br>
    <button onclick="history.back()" class="btn btn-danger">Back</button>
</div>
<!-- The Modal -->
<div class="modal" id="myModal">
    <div class="modal-dialog">
      <div class="modal-content">
  
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Edit the link</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
  
        <!-- Modal body -->
        <div class="modal-body">
            <form action="/web-admin/classes/update" method="POST">
                @csrf
                <input name="id" type="hidden" value="{{$class['id']}}">
                <input type="text" value="{{$class['link']}}" class="form-control" name="link">
                <br><br>
                <button type="submit" class="btn btn-dark">Update</button>
            </form>
        </div>
      </div>
    </div>
  </div>


@endsection
@section('script')
<script type="text/javascript">
    $(window).on('load', function() {
        $('#myModal').modal('show');
    });
</script>

@endsection