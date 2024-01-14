<div id="sidebar" class="d-none d-md-block p-5 bg-white border-right">
    <h6 class="text-center text-bold">@yield('name')</h6>
            <a href="#"><div style="background-image: url('{{$_COOKIE['userAvatar']}}');" class="mb-1 m-auto avatar"></div></a>
            <nav>
                <ul>
                    <li><a href="/user/my-profile">My Profile</a></li>
                    <li><a href="/user/timeline">Home</a></li>
                    <li><a href="/user/dashboard">Dashboard</a></li>
                    <li><a href="/user/dashboard#notification">Notification</a></li>
                    <li><a href="/user/working-zone">Work Space</a></li>
                    <li><a href="/user/log-out">Log Out</a></li>
                </ul>
            </nav>
        </div>
        <br>