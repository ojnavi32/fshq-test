<nav class="main-header navbar navbar-expand navbar-white navbar-light">
<!-- Right navbar links -->
<ul class="navbar-nav ml-auto">
    <li class="nav-item dropdown">
    <a class="nav-link" data-toggle="dropdown" href="#">
        <i class="far fa-caret-square-down"></i>
    </a>
    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
        <span class="dropdown-item dropdown-header">{{ Auth::user()->firstname }} {{ Auth::user()->lastname }}</span>
        <div class="dropdown-divider"></div>
        <!-- <a href="#" class="dropdown-item">
        <i class="fas fa-user mr-2"></i> Profile
        </a> -->
        <div class="dropdown-divider"></div>
        <a href="{{ url('logout') }}" class="dropdown-item">
        <i class="fas fa-power-off mr-2"></i> Logout
        </a>
    </div>
    </li>
</ul>
</nav>