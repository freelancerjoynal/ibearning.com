@extends('user.layout.app')
@section('title')
     Working Zone -  {{$_COOKIE['username']}}
@endsection
@section('style')
<link rel="stylesheet" href="https://cdn.datatables.net/1.11.4/css/jquery.dataTables.min.css">
    <style>
        table{
            overflow: scroll;
        }
    </style>
@endsection
@section('content')
<br>
<h4>
    <span class="text-light bg-dark p-2 rounded">Your works</span>
    <span class="float-right">
        <!-- Button to Open the Modal -->
        <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#addWork">
            +
        </button>
    </span>
</h4>
<br>
<table id="workTable" class="table-responsive d-block">
    <thead>
        <tr>
            <th>S.N</th>
            <th>Name</th>
            <th>PV</th>
            <th>Status</th>
        </tr>
    </thead>
    <tbody>
        @php $count=1; @endphp
        @if ($worklist)
        @foreach ($worklist as $item)
        <tr>
            <td>{{$count++}}</td>
            <td>{{$item['name']}}</td>
            <td>{{$item['Point']}}</td>
            <td>
                @if ($item['status'] == 1)
                    Aproved
                @else 
                Pending
                @endif
            </td>
        </tr>
        @endforeach
        @endif
    </tbody>
</table>


<!-- The Modal -->
<div class="modal" id="addWork">
    <div class="modal-dialog">
      <div class="modal-content">
  
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Submit a work</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
  
        <!-- Modal body -->
        <div class="modal-body">
            <form action="/user/working-zone/add-new" method="POST">
                @csrf
                <input type="hidden" name="username" value="{{$user['name']}}">
                <input type="hidden" name="userid" value="{{$user['id']}}">
                <label for="name">Name</label>
                <input id="name" name="name" type="text" class="form-control" required>

                <label for="link">Link</label>
                <input id="link" name="link" type="text" class="form-control" required>

                <div class="text-right">
                    <button class="btn btn-dark mt-1">Save</button>
                </div>
            </form>
        </div>
      </div>
    </div>
  </div>
@endsection
@section('script')
    <script src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready( function () {
            $('#workTable').DataTable();
        } );
    </script>
@endsection