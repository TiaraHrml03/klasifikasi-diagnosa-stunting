<div class="nav-header">
    <a href="#" class="brand-logo">
        <img class="logo-abbr" src="./assets/images/logo.png" alt="">
        <img class="logo-compact" src="./assets/images/logo-text.png" alt="">
        <img class="brand-title" src="./assets/images/logo-text.png" alt="">
    </a>
    <div class="nav-control">
        <div class="hamburger">
            <span class="line"></span><span class="line"></span><span class="line"></span>
        </div>
    </div>
</div>
<div class="header">
    <div class="header-content">
        <nav class="navbar navbar-expand">
            <div class="collapse navbar-collapse justify-content-between">
                <div class="header-left">
                
                </div>
                <ul class="navbar-nav header-right">
                    <li class="nav-item dropdown header-profile">
                        <a class="nav-link" href="#" role="button" data-toggle="dropdown">
                            <i class="mdi mdi-account"></i>
                            @if(isset($user->email))
                                {{ $user -> email }}
                            @endif
                        </a>
                        <div class="dropdown-menu dropdown-menu-right">
                            <a href="../assets/app-profile.html" class="dropdown-item">
                                <i class="icon-user"></i>
                                <span class="ml-2">Profile </span>
                            </a>
                            <a href="../assets/email-inbox.html" class="dropdown-item">
                                <i class="icon-envelope-open"></i>
                                <span class="ml-2">Inbox </span>
                            </a>
                            <a href="../assets/page-login.html" class="dropdown-item">
                                <i class="icon-key"></i>
                                <span class="ml-2">Logout </span>
                            </a>
                        </div>
                    </li>
                </ul>
            </div>
        </nav>
    </div>
</div>