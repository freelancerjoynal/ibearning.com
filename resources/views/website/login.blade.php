@extends('website.layout.app')
@section('title')
Log In
@endsection
@section('style')2
    
@endsection
@section('content')

<section id="register" class="m-auto py-3">
    <h3 class="text-center ">Log In</h3>
    <div class="register-box">
        @if(Session::has('msg'))
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
            {{ Session::get('msg') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
        </div>
        @endif
        @isset($msg)
		<div class="alert alert-warning alert-dismissible fade show" role="alert">
			{{ $msg }}
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			<span aria-hidden="true">&times;</span>
			</button>
		</div>
	    @endisset
        
        <form action="/login-confirm" class="form-group" method="POST">
            @csrf      
            <label for="email">Email Address</label>
            <input name="email" id="email" type="email" class="form-control" required placeholder="yourname@email.com">
            @error('email')
            <i class="text-warning d-block"> <small> {{$message}} </small> </i>
            @enderror
            @if(Session::has('email'))
            <i class="text-warning d-block"> <small> {{ Session::get('email') }} </small> </i>
            @endif


            <label for="password">Password</label>
            <input name="password" id="password" type="password" class="form-control" required placeholder="*******">
            @error('password')
            <i class="text-warning d-block"> <small> {{$message}} </small> </i>
            @enderror

            


            <div class="text-right mt-3">
                <a href="/register" class="btn btn-danger">Register New</a>
                <button type="submit" class="btn btn-success">Log In</button>
            </div>
        </form>
    </div>
</section>

@endsection
@section('script')
    <script>
        $(document).ready(function(){
            $('form').trigger("reset");
        })
    </script>
@endsection
    