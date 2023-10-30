@extends('admin.layout.app')
@section('title')
    Payment Request
@endsection
@section('style')
<link rel="stylesheet" href="https://cdn.datatables.net/1.11.4/css/jquery.dataTables.min.css">
@endsection
@section('content')
<br>
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
<table id="request-table">
    <thead>
        <tr>
            <th>S.N</th>
            <th>Name</th>
            <th>Amout</th>
            <th>Status</th>
            <th>Action</th>
        </tr>
    </thead>
    @php
        $count = 1;
    @endphp
    @if ($requests)
    @foreach ($requests as $request)
    <tr>
        <td>{{$count++}}</td>
        <td><a href="/web-admin/users/view/{{$request['userId']}}" target="_blank">{{$request['name']}}</a></td>
        <td>{{$request['amount']}}</td>
        <td>
            @if ($request['status'] == 1)
                <i class="fa fa-check"></i>
            @else
            <i class="fa fa-times"></i>
            @endif
        </td>
        <td>
            <a href="/web-admin/payment-request/paid/{{$request['id']}}" class="btn-sm btn-success"><i class="fa fa-check"></i></a>
            <a onclick="return confirm('Are you sure?')" href="/web-admin/payment-request/delete/{{$request['id']}}" class="btn-sm btn-danger"><i class="fa fa-times"></i></a>
        </td>
    </tr>
    @endforeach
    @endif
</table>

@endsection
@section('script')
    <script src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript">
        $(document).ready( function () {
            $('#request-table').DataTable();
        } );
    </script>
@endsection