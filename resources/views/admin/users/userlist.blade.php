@extends('admin.layout.app')
@section('title')
    User List
@endsection
@section('style')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.4/css/jquery.dataTables.min.css">
@endsection
@section('content')
<div class="py-3" >
  @if(Session::has('msg'))
      <div class="alert alert-warning alert-dismissible fade show" role="alert">
          {{ Session::get('msg') }}
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
      </div>
   @endif

    <table id="userTable" style="overflow: scroll" class="mt-3">
        <thead>
          <tr>
            <th scope="col">S.N</th>
            <th scope="col">Status</th>
            <th scope="col">Name</th>
            <th scope="col">Point</th>
            <th scope="col">WhatsApp</th>
            <th scope="col">SMS</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody>
          @isset($users)
          @php
              $count = 1;
          @endphp
              @foreach ($users as $user)
              <tr>
                <th>{{$count++}}</th>
                <td>
                  @if ($user['status'] == 0)
                  <i class="fa fa-lock"></i>
                  @else
                  <i class="fa fa-unlock"></i>
                  @endif
                </td>
                <td> {{$user['name']}} </td>
                <td> {{$user['point']}} </td>
                <td> <a href="https://wa.me/{{$user['whatsapp']}}"><i class="fa fa-whatsapp btn-sm btn-success"></i></a></td>
                <td>
                   
                   @if ($user['sms'] == 0)
                   <a href="/web-admin/users/sms-done/{{$user['id']}}"><i class="fa fa-frown-o p-1 btn-sm btn-danger"></i></a>
                   @else
                   <i class="fa fa-check-square-o"></i>
                   @endif
                </td>
                <td class="d-flex"> 
                  <a href="/web-admin/users/view/{{$user['id']}} " class="btn-sm btn-success m-1"> <i class="fa fa-eye"></i> </a>
                  <a href="/web-admin/users/delete/{{$user['id']}} " class="btn-sm btn-danger  m-1"> <i class="fa fa-times"></i> </a>
                  <a href="/web-admin/users/aprove/{{$user['id']}} " class="btn-sm btn-primary  m-1"> <i class="fa fa-unlock"></i> </a>
                  <a href="/web-admin/users/deactive/{{$user['id']}} " class="btn-sm btn-primary  m-1"> <i class="fa fa-lock"></i> </a>
                </td>
              </tr>
              @endforeach
          @endisset
        </tbody>
      </table>
</div>
@endsection
@section('script')
    <script src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript">
        $(document).ready( function () {
            $('#userTable').DataTable();
        } )
    </script>
@endsection