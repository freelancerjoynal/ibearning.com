@extends('user.layout.app')
@section('title')
     Dashboard -  {{$_COOKIE['username']}}
@endsection
@section('style')
    <style>
        .pay-request{
            font-size:12px;
            border-radius: 10px;
        }
        .meet-icon{
            width: 35px
        }
        .classes {
            border: 1px solid black;
            border-radius: 10px;
            padding-top: 10px;
            font-size: 13px;
        }
    </style>
@endsection
@section('content')
<br>
@if ($userInfo)

<div class="row">
    <div class="col-md-4">
        <div class="card">
            <img src="/public/{{$userInfo['image']}}" alt="" class="img-fluid m-auto" style="max-width: 200px">
            <h2 class="text-center py-5">
                <small>Total PV</small><br>
                <q style="font-size: 50px;font-weight:800">{{$userInfo['point']}} </q><br>
                <!-- Button trigger modal -->
               <button type="button" class="btn-sm btn-success" data-toggle="modal" data-target="#paymentRequest">
                   Request Pay
               </button>
               @if ($userInfo['point'] > 400 && $userInfo['duStatus'] == 0 )
               <a href="/user/payment/pay-du/{{$userInfo['id']}}" class="btn-sm btn-info">Pay 400PV</a>
               @endif
               
           </h2>
        </div>
        @if(Session::has('msg'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
            <q><small>{{Session::get('msg')}}</small></q>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
        @endif

        <!--Recent Payment Requests-->
        <div class="bg-warning mt-1 px-2 py-2 pay-request">
            @if ($payRequests)
                @foreach ($payRequests as $request)
                <div class="row">
                    <div class="col-4"> {{ date('d-M-Y', strtotime($request->created_at));  }} </div>
                    <div class="col-4"> {{ $request['amount'] }} PV</div>
                    <div class="col-4 text-right">
                        @if ($request['status']==0)
                            Pending 
                        @else
                            Paid
                        @endif
                    </div>
                </div>
                @endforeach
            @endif     
        </div>
        <div class="card p-2 mt-2" style="font-size: 12px;">
            <h5> Support Team</h5>
            @foreach ($supportTeam as $member)
            <div class="row py-1">
                <div class="col-1"><img src="/public/{{$userInfo['image']}}" alt="" class="img-fluid m-auto" style="max-width: 30px"></div>
                <div class="col-5">{{$member['name']}}</div>
                <div class="col-5"><a href="https://wa.me/{{$member['whatsApp']}}" class="btn-sm btn-primary">WhatsApp</a></div>
            </div>
            @endforeach
            

        </div>
    </div>

    <div class="col-md-8">
        <div class="card p-2">
            <table class="table table-stripped" style="font-size: 12px">
                <tr>
                    <th>Name:</th>
                    <td>{{$userInfo['name']}}</td>
                </tr>
                <tr>
                    <th>Username:</th>
                    <td>{{$userInfo['username']}}</td>
                </tr>
                <tr>
                    <th>Email:</th>
                    <td>{{$userInfo['email']}}</td>
                </tr>
                <tr>
                    <th>Phone:</th>
                    <td>{{$userInfo['phone']}}</td>
                </tr>
                <tr>
                    <th>WhatsApp:</th>
                    <td>{{$userInfo['whatsapp']}}</td>
                </tr>
                <tr>
                    <th>Country:</th>
                    <td class="text-capitalize">{{$userInfo['country']}}</td>
                </tr>
                <tr>
                    <th>City:</th>
                    <td>{{$userInfo['city']}}</td>
                </tr>
                <tr>
                    <th>Facebook:</th>
                    <td><a href="{{$userInfo['facebook']}}" target="_blank">Visit</a></td>
                </tr>
                <tr>
                    <th>Payment Method:</th>
                    <td>{{$userInfo['paymenMethod']}}</td>
                </tr>
                <tr>
                    <th>Pay due:</th>
                    <td>
                        @if ($userInfo['duStatus'] == 1)
                        Done
                        @else 
                        No yet
                        @endif
                    </td>
                </tr>
                <tr>
                    <th>Payment Address:</th>
                    <td>{{$userInfo['paymentAddress']}}</td>
                </tr>
                <tr>
                    <th>Referar Name:</th>
                    <td>{{$userInfo['refererName']}}</td>
                </tr>
                <tr>
                    <th>Refer Link:</th>
                    <td>{{$userInfo['referLink']}}</td>
                </tr>
                <tr>
                    <th>Action:</th>
                    <td>
                        <!-- Modal Button For Info Update -->
                        <button type="button" class="btn-sm btn-outline-dark" data-toggle="modal" data-target="#profile-update">
                            Update
                        </button>
                    </td>
                </tr>
            </table>
        </div>
        <br>
        <div class="card p-3">
            <h4>Join our live class</h4>
            <div class="classes">
                @if ($classes)
                @foreach ($classes as $class)
                <div class="row py-1">
                    <div class="col-2 text-right"><img class="meet-icon" src="https://yesnetdigital.com/en/user/assets/img/Google_Meet_icon.png" alt="Meet"></div>
                    <div class="col-6">{{$class['name']}}</div>
                    <div class="col-4"><a href="{{$class['link']}}" class="btn-sm btn-success">Join</a></div>
                </div>
                @endforeach
                @endif
            </div>
        </div>
        <br>
        <div id="notification" class="card">
            <h3 class="py-3 px-2"><q><span class="bg-warning rounded">Notifications</span></q></h3>
        <br>
        @if ($notifications)
        @foreach ($notifications as $item)
        <div class="alert alert-warning" role="alert">
            {{$item['message']}}
        </div>
        @endforeach
        @endif
        </div>
    </div>
    
</div>


<!--
===============================================
Payment Request Modal
============================================-->
<div class="modal" id="paymentRequest">
    <div class="modal-dialog">
      <div class="modal-content">
  
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Request Payment</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
  
        <!-- Modal body -->
        <div class="modal-body">
            <p>Minimum 50 PV</p>
            <form action="/user/payment/request" method="POST">
                @csrf
                <input name="userId" type="hidden" value="{{$userInfo['id']}}">
                <input name="amount" type="number" required class="form-control">
                <button type="submit" class="btn-sm btn-primary mt-1">Send</button>
            </form>
        </div>
  
        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">X</button>
        </div>
  
      </div>
    </div>
  </div>


<!--
===============================================
Profile Information update Modal
============================================-->
<div class="modal" id="profile-update">
    <div class="modal-dialog">
      <div class="modal-content">
  
        <!-- Modal Header -->
        <div class="modal-header">
          <h6 class="modal-title">Update Info</h6>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
  
        <!-- Modal body -->
        <div class="modal-body">
          <form action="/user/profile/update" method="POST">
            @csrf
            <input type="hidden" name="id" value="{{$userInfo['id']}}">
            <label for="name">Name:</label>
            <input value="{{$userInfo['name']}}" name="name" id="name" type="text" class="form-control">

            <label for="birthDate">BirthDate</label>
            <input value="{{$userInfo['birthDate']}}" name="birthDate" id="birthDate" type="date" class="form-control">

            <label for="city">City:</label>
            <input value="{{$userInfo['city']}}" name="city" id="city" type="text" class="form-control">

            <label for="language">Language:</label>
            <input value="{{$userInfo['language']}}" name="language" id="language" type="text" class="form-control">

            <label for="refererName">Referer Name:</label>
            <input value="{{$userInfo['refererName']}}" name="refererName" id="refererName" type="text" class="form-control">

            <label for="postCode">Postal Code:</label>
            <input value="{{$userInfo['postalCode']}}" name="postCode" id="postCode" type="number" class="form-control">

            <label for="facebookLink">Facebook Profile Link:</label>
            <input value="{{$userInfo['facebook']}}" name="facebookLink" id="facebookLink" type="text" class="form-control">

            <label for="gender">Gender:</label>
            <select name="gender" id="gender" class="form-control">
                <option value="male">Male</option>
                <option value="female">Female</option>
                <option value="female">Others</option>
            </select>



              <label for="paymentMethod">Payment Method:</label>
              <select name="paymentMethod" id="paymentMethod" class="form-control">
                  @if ($methodName)
                  @foreach ($methodName as $item)
                  <option value="{{$item['methodName']}}">{{$item['methodName']}}</option>
                  @endforeach
                  @endif
              </select>

            <label for="payID">Paymennt ID:</label>
            <input name="payID" id="payID" type="text" class="form-control">
            <button type="submit" class="btn-sm btn-outline-dark float-right mt-1">Save</button>
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
@endsection
@section('script')
    
@endsection