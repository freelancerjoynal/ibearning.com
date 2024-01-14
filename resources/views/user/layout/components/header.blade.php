<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>@yield('title')</title>
	<link href="https://fonts.maateen.me/bangla/font.css" rel="stylesheet">
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet"> 
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<!--Old theme styles-->
	<link rel="stylesheet" href="{{url('')}}/public/user/css/style.css">
	<!--New theme styles-->
	<link rel="stylesheet" href="{{url('')}}/public/user/update-one/style.css">
	@yield('style')
</head>
<body>
	<header>
        <div class="top bg-main py-1">
            <div class="container">
                <div class="row">
                    <div class="col-md-7">
                        <div class="logo-area">
                            <div class="d-flex">
                                <img class="logo img-fluid" src="assets/images/logo.png" alt="">
                                <div class="search-bar w-100">
                                    <form action="#" class="h-100 d-flex">
                                        <input class="h-100" type="text" name="username" placeholder="Search">
                                        <button type="submit"></button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-5">
                        <div class="menu-area">
                            <nav class="h-100 d-none d-md-block">
                                <ul class="d-flex">
                                    <li><a href="/user/timeline">Home</a></li>
                                    <li><a href="/user/dashboard">Dashboard</a></li>
                                    <li><a href="/user/dashboard#notification">Notification</a></li>
                                    <li><a href="/user/working-zone">Work Space</a></li>
                                    <li><a href="/user/log-out">Log Out</a></li>
                                </ul>
                            </nav>
                            <div class="text-center m-auto">
                                <nav class="d-md-none">
                                    <ul class="d-flex">
                                        <li class="m-auto"><a href="/user/timeline"><i class="menu-active fa fa-home"></i></a></li>    
                                        <li class="m-auto"><a href="/user/dashboard"><i class="fa fa-tachometer"></i></a></li>
                                        <li class="m-auto"><a href="/user/dashboard#notification"><i class="fa fa-bell-o"></i></a></li>                   
                                        <li class="m-auto"><a href="/user/working-zone"><i class="fa fa-globe"></i></a></li>
                                        <li class="m-auto"><a href="/user/my-profile"><i class="fa fa-user"></i></a></li>
                                        <li class="m-auto"><a href="/user/log-out"><i class="fa fa-sign-out"></i></a></li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>