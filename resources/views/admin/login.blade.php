<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Please Login</title>
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,300&family=Roboto:wght@300;400&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="/public/admin/css/login.css">
	<link rel="stylesheet" href="/public/admin/css/style.css">
</head>
<body>
<div class="login-form">

	<form class="form-1" action="/web-admin/admin-login-check" method="POST">
		@csrf
	  <h1>Login</h1>
	  <label for="email">Email</label>
	  <input type="email" name="email" id="email" required />
	  <label for="password">Password</label>
	  <input type="password" name="password" id="password" required />
	  <span>Forgot Password</span>
	  <input type="submit" value="Log In" class="submit-btn">

	   <!-- .........///Error Showin Area///.......... -->

	  @isset($msg)
		<div class="alert alert-warning alert-dismissible fade show" role="alert">
			{{ $msg }}
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			<span aria-hidden="true">&times;</span>
			</button>
		</div>
	  @endisset
	  <!-- .........///sign-up///.......... -->


	</form>
  </div>

  <div style="height: 120px"></div>
  <footer>
	  <div class="row">
		  <div class="col-md-6"></div>
		  <div class="col-md-6 text-right developer"><a target="_blank" href="https://facebook.com/joynalabedin644"><i>Developed By</i> <q>MD. JOYNAL ABEDIN</q></a></div>
	  </div>
  </footer>
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
  @yield('script')
  </body>
  </html>