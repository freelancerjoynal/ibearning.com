@extends('website.layout.app')
@section('title')
Register
@endsection
@section('style')2
    
@endsection
@section('content')

<section id="register" class="m-auto py-3">
    <h3 class="text-center ">Apply Here</h3>
    <div class="register-box">
        <form action="/register-confirm" class="form-group" method="POST">
            @csrf
            <label for="name">Full Name</label>
            <input name="name" id="name" type="text" class="form-control" required placeholder="John Doe">
            @error('name')
            <i class="text-warning d-block"> <small> {{$message}} </small> </i>
            @enderror            
            

            <label for="email">Email Address</label>
            <input name="email" id="email" type="email" class="form-control" required placeholder="yourname@email.com">
            @error('email')
            <i class="text-warning d-block"> <small> {{$message}} </small> </i>
            @enderror
            @if(Session::has('email'))
            <i class="text-warning d-block"> <small> {{ Session::get('email') }} </small> </i>
            @endif

            <label for="username">username</label>
            <input name="username" id="username" type="text" class="form-control" required placeholder="johndoe644">


            @error('username')
            <i class="text-warning d-block"> <small> {{$username}} </small> </i>
            @enderror
            @if(Session::has('username'))
            <i class="text-warning d-block"> <small> {{ Session::get('username') }} </small> </i>
            @endif

            <label for="password">Password</label>
            <input name="password" id="password" type="password" class="form-control" required placeholder="*******">
            @error('password')
            <i class="text-warning d-block"> <small> {{$message}} </small> </i>
            @enderror

            <label for="mobile">Mobile <small><q>with country code</q></small></label>
            <input name="mobile" id="mobile" value="+880" type="text" class="form-control" required >
            @error('mobile')
            <i class="text-warning d-block"> <small> {{$message}} </small> </i>
            @enderror

            <label for="whatsapp">whatsapp <small><q>with country code</q></small></label>
            <input name="whatsapp" id="whatsapp" value="+880" type="text" class="form-control" required>
            @error('whatsapp')
            <i class="text-warning d-block"> <small> {{$message}} </small> </i>
            @enderror

            <label for="gender">Gender</label>
            <select name="gender" id="gender" class="form-control">
                <option value="others" selected="selected">Others</option>
                <option value="male">Male</option>
                <option value="female">Female</option>
            </select>

            <label for="country">Country</label>
            <select name="country" id="country" class="form-control">
                @if ($countries)
                    @foreach ($countries as $country)
                    <option value="{{$country['countryName']}}"> {{$country['countryName']}} </option>
                    @endforeach
                @endif
            </select>


            <div class="text-right mt-3">
                <a href="/log-in" class="btn btn-danger">Log In</a>
                <button class="btn btn-success">Register</button>
            </div>
        </form>
    </div>
</section>

@endsection
@section('script')
    
@endsection
    