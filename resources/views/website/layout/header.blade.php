<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> @yield('title') </title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="public/website/css/style.css">
</head>
<body>
    <header class="sticky-top">
        <div class="container">
            <div class="desktop-header">
                <div class="logo">
                    <a href="/"><img src="public/{{$applicationDetails['logo']}}" alt="title"></a>
                </div>
                <div class="nav-items">
                    <div class="links">
                        <a href="/">Home</a>
                        <a href="/about">About</a>
                        <a href="https://wa.me/{{$applicationDetails['whatsapp']}}">Contact</a>
                        <a href="/courses">Courses</a>
                    </div>
                </div>
                <div class="admin-button">
                    <a href="/web-admin" class="btn btn-outline-light">Admin Panel</a>
                </div>
            </div>
            <div class="mobile-header">
                <div class="logo">
                    <img src="/public/{{$applicationDetails['logo']}}" alt="title">
                </div>
                <div class="icon text-center">
                    <i id="menu-open" class="fa fa-bars"></i>
                </div>
            </div>
            <div class="mobile-links">
                <i class="fa fa-close"></i>
                <div class="mt-5">
                    <a href="/">Home</a>
                    <a href="/about">About</a>
                    <a href="tel:{{$applicationDetails['whatsapp']}}">Contact</a>
                    <a href="/courses">Courses</a>
                    <a href="/web-admin">Admin Panel</a>
                </div>
            </div>
        </div>
    </header>