<nav class="navbar navbar-expand-lg navbar-light bg-light sticky-top">
    <div class="container">
        <a class="navbar-brand" href="/web-admin"><img src="/public/{{$applicationDetails['logo']}} " alt=""></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <i class="fa fa-bars text-light"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
            <li class="nav-item active">
            <a class="nav-link" href="/web-admin">Dashboard</a>
            </li>
            <li class="nav-item">
            <a class="nav-link" href="/web-admin/courses">Courses</a>
            </li>
            <li class="nav-item">
            <a class="nav-link" href="/web-admin/site-detail">App Detail</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="/web-admin/users">Users</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="/web-admin/notifications">Notifications</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="/web-admin/classes">Classes</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="/web-admin/payment-request">Payment Request</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="/web-admin/working-zone">Working Zone</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="/web-admin/support-team">team</a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="admin" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  Admin
                </a>
                <div class="dropdown-menu" aria-labelledby="admin">
                  <a class="dropdown-item" href="/web-admin/log-out">Log Out</a>
                </div>
              </li>
        </ul>
        </div>
    </div>
  </nav>