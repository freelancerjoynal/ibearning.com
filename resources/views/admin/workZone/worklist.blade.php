@extends('admin.layout.app')
@section('title')
    Working Zone
@endsection
@section('style')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
@endsection
@section('content')
    <br>
    <h3>Works List</h3>
    <table id="worklisttable">
        <thead>
            <tr>
                <th>S.N</th>
                <th>Name</th>
                <th>User Name</th>
                <th>Link</th>
                <th>Status</th>
                <th>PV</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @if ($worklist)
            @php  $counter =1; @endphp
                @foreach ($worklist as $item)
                    <tr>
                        <td>{{$counter++}}</td>
                        <td> {{$item['name']}} </td>
                        <td> {{$item['CustomerName']}} </td>
                        <td> <a href="{{$item['link']}}" target="_blank">Visit</a> </td>
                        <td>
                            @if ($item['status'] == 0)
                                Pending
                            @else
                            Done
                            @endif 
                        </td>
                        <td> {{$item['point']}} </td>
                        <td>
                            @if ($item['status'] == 0)
                            <a href="/web-admin/working-zone/submit-done/{{$item['id']}}/{{$item['customerId']}}" onclick="return confirm('Are you sure')"><i class="fa fa-check btn-sm btn-dark"></i></a>
                            @endif
                            <a href="/web-admin/working-zone/submit-delete/{{$item['id']}}" onclick="return confirm('Are you sure')"><i class="fa fa-times btn-sm btn-danger"></i></a>
                        </td>
                    </tr>
                @endforeach
            @endif
        </tbody>

    </table>
@endsection
@section('script')
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready( function () {
            $('#worklisttable').DataTable();
        } );
    </script>
@endsection