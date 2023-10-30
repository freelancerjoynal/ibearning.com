<nav class="navbar navbar-expand-lg navbar-light bg-light sticky-top">
    <div class="container">
        <a class="navbar-brand" href="/user/dashboard"><img src="/public/{{$applicationDetails['logo']}} " alt=""></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <i class="fa fa-bars text-light"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
            <li class="nav-item active">
            <a class="nav-link" href="/user/dashboard">Dashboard</a>
            </li>
            <li class="nav-item">
            <a class="nav-link" href="/courses" target="_blank">Courses</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="/user/working-zone">Working Zone</a>
              </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="admin" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  Profile
                </a>
                <div class="dropdown-menu" aria-labelledby="admin">
                  <a class="dropdown-item" href="/user/log-out">Log Out</a>
                </div>
              </li>
        </ul>
        </div>
    </div>
  </nav>