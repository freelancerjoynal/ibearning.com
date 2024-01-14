@extends('admin.layout.app')
@section('title')
    App Details
@endsection
@section('style')
    <style>
        .detail-logo {
            width: 150px;
        }
        .site-details {
            max-width: 500px;
            margin: auto;
            border: 2px solid blue;
            padding: 15px;
            border-radius: 5px;
        }
    </style>
@endsection
@section('content')
<br>
<div class="m-auto">
    <div class="site-details">
        <h4 class="text-center"><q><strong>Site Details</strong></q></h4>
        @if ($siteDetail)
            <table class="table table-responsive-sm">
            <thead>
              
            </thead>
            <tbody>
              <tr>
                <td scope="col">App Name</td>
                <td scope="col"> {{$siteDetail->name}} </td>
              </tr>
              <tr>
                <td>WhatsApp</td>
                <td>{{$siteDetail->whatsapp}}</td>
              </tr>
              <tr>
                <td>Email</td>
                <td>{{$siteDetail->email}}</td>
              </tr>
            </tbody>
          </table>
          @if(Session::has('msg'))
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                <strong> {{Session::get('msg')}} </strong> 
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
          @endif
        
          <!--=======================
            Update Modal
            ====================-->
            <div class="modal" id="updateDetail">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h4 class="modal-title">Update Site Information</h4>
                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body">
                      <form action="/web-admin/site-detail/update" method="POST">
                        @csrf
                          <label for="name">Title</label>
                          <input name="name" value="{{$siteDetail->name}}" required id="name" type="text" class="form-control">
                          <label for="email">Email</label>
                          <input name="email" value="{{$siteDetail->email}}" required id="email" type="email" class="form-control">
                          <label for="whatsapp">WhatsApp</label>
                          <input name="whatsapp" value="{{$siteDetail->whatsapp}}" required id="whatsapp" type="text" class="form-control">
                          <button type="submit" class="btn btn-success mt-2">Update</button>
                      </form>
                    </div>
              
                    <!-- Modal footer -->
                    <div class="modal-footer">
                      <button type="button" class="btn btn-danger" data-dismiss="modal">X</button>
                    </div>
              
                  </div>
                </div>
              </div>
        @endif
        <div class="text-right">
            <!-- Button to Open the Modal -->
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#updateDetail">
                Edit
            </button>
        </div>
    </div>
</div>
@endsection