@extends('admin.layout.app')
@section('title')
    User Profile
@endsection
@section('style')
    
@endsection
@section('content')
@if ($userData)
<div class="mt-2">
    <div class="row">
        <div class="col-md-4">
            <div class="card">
                <img src=" {{$userData['image']}} " alt="" class="img-fluid">
                @if(Session::has('msg'))
                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                        {{ Session::get('msg') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif
                <h2 class="text-center py-5">
                     <small>Total Points</small><br>
                     <q style="font-size: 50px;font-weight:800">{{$userData['point']}} </q><br>
                     <!-- Button trigger modal -->
                    <button type="button" class="btn-sm btn-primary" data-toggle="modal" data-target="#exampleModalLong">
                        Update
                    </button>
                </h2>
                <h6 class="text-center"><q> {{$userData['name']}} </q></h6>
                <a href="javascript:history.back()" class="btn btn-danger">Back to userlist</a>
            </div>
        </div>
        <div class="col-md-8 bg-light">
            <table class="table table-striped">
                <tr>
                    <th scope="col">Name</th>
                    <th scope="col">{{$userData['name']}}</th>
                </tr>
                <tr>
                    <th scope="col">Username</th>
                    <th scope="col">{{$userData['username']}}</th>
                </tr>
                <tr>
                    <th scope="col">Email</th>
                    <th scope="col">{{$userData['email']}}</th>
                </tr>
                <tr>
                    <th scope="col">Phone Number</th>
                    <th scope="col">{{$userData['phone']}}</th>
                </tr>
                <tr>
                    <th scope="col">WhatsApp</th>
                    <th scope="col">{{$userData['whatsapp']}}</th>
                </tr>
                <tr>
                    <th scope="col">Payment Method</th>
                    <th scope="col">{{$userData['paymenMethod']}}</th>
                </tr>
                <tr>
                    <th>Pay due:</th>
                    <td>
                        @if ($userData['duStatus'] == 1)
                        Done
                        @else 
                        No yet
                        @endif
                    </td>
                </tr>
                <tr>
                    <th scope="col">Payment Address</th>
                    <th scope="col">{{$userData['paymentAddress']}}</th>
                </tr>
                <tr>
                    <th scope="col">Referer Name</th>
                    <th scope="col">{{$userData['refererName']}}</th>
                </tr>
                <tr>
                    <th scope="col">Last Login</th>
                    @php
                        $dt = new DateTime('now', new DateTimezone('Asia/Dhaka'));
                    @endphp
                    <th> {{ $dt->format('g:i a F j, Y');  }}  </th>
                    
                </tr>
            </table>
        </div>
    </div>
</div>
  
  <!-- Modal -->
  <div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle">Update Users Point</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form action="/web-admin/users/update-point" method="POST">
                @csrf
                <label for="point">Update Here</label>
                <input name="point" id="point" type="number" value="{{$userData['point']}}" class="form-control">
                <input type="hidden" value="{{$userData['id']}}" id="userId" name="userId">
                <br>
                <button type="submit" class="btn btn-primary">Update</button>
            </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
@endif
@endsection
@section('script')
    
@endsection