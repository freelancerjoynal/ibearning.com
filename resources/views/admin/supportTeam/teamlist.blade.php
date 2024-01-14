@extends('admin.layout.app')
@section('title')
    Support Team
@endsection
@section('style')
    
@endsection
@section('content')
    <br><br>
    <div class="m-auto card" style="max-width: 500px">
        <h4 class="px-2">Team List 
            <span class="float-right">
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
                    +
                </button>
            </span>
        </h4>
        <table class="table table-stripped ">
            <tr>
                <th>Name</th>
                <th>WhatsApp</th>
                <th>Action</th>
            </tr>
            @foreach ($teamlist as $item)
            <tr>
                <td>{{$item['name']}}</td>
                <td> {{$item['whatsApp']}} </td>
                <td><a href="/web-admin/support-team/delete/{{$item['id']}}" onclick=" return confirm('Are you sure to delete?')"><i class="fa fa-times btn-sm btn-danger"></i></a></td>
            </tr>
            @endforeach
        </table>
    </div>



    <!-- The Modal -->
<div class="modal" id="myModal">
    <div class="modal-dialog">
      <div class="modal-content">
  
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Add New</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
  
        <!-- Modal body -->
        <div class="modal-body">
         <form action="/web-admin/support-team/add-new" method="POST">
            @csrf
            <label for="name">Name</label>
            <input type="text" name="name" id="id" class="form-control">
            <label for="whatsapp">WhatsApp</label>
            <input type="numberq" name="whatsapp" id="whatsapp" class="form-control">
            <button class="btn btn-dark mt-2" type="submit">Save</button>
        </form>
        </div>
  
  
      </div>
    </div>
  </div>
@endsection
@section('script')
    
@endsection