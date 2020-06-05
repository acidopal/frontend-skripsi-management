<nav class="header-navbar navbar-expand-lg navbar navbar-with-menu floating-nav navbar-light navbar-shadow">
    <div class="navbar-wrapper">
        <div class="navbar-container content">
            <div class="navbar-collapse" id="navbar-mobile">
                <div class="mr-auto float-left bookmark-wrapper d-flex align-items-center">
                    <ul class="nav navbar-nav">
                        <li class="nav-item mobile-menu d-xl-none mr-auto"><a class="nav-link nav-menu-main menu-toggle hidden-xs" href="#"><i class="ficon feather icon-menu"></i></a></li>
                    </ul>
                    <ul class="nav navbar-nav bookmark-icons">
                     
                    </ul>
                    <ul class="nav navbar-nav">
                        
                    </ul>
                </div>
                <ul class="nav navbar-nav float-right">
                   <!--  <li class="dropdown dropdown-notification nav-item"><a class="nav-link nav-link-label" href="#" data-toggle="dropdown"><i class="ficon feather icon-bell"></i><span class="badge badge-pill badge-primary badge-up">1</span></a>
                        <ul class="dropdown-menu dropdown-menu-media dropdown-menu-right">
                            <li class="dropdown-menu-header">
                                <div class="dropdown-header m-0 p-2">
                                    <h3 class="white">1 New</h3><span class="notification-title">App Notifications</span>
                                </div>
                            </li>
                            <li class="scrollable-container media-list"><a class="d-flex justify-content-between" href="javascript:void(0)">
                                    <div class="media d-flex align-items-start">
                                        <div class="media-left"><i class="feather icon-plus-square font-medium-5 primary"></i></div>
                                        <div class="media-body">
                                            <h6 class="primary media-heading">Selamat Skripsi Disetujui!</h6><small class="notification-text"> Kamu siap wisuda?</small>
                                        </div><small>
                                            <time class="media-meta" datetime="2015-06-11T18:29:20+08:00">9 hours ago</time></small>
                                    </div>
                                </a></li>
                        </ul>
                    </li> -->
                    <li class="dropdown dropdown-user nav-item"><a class="dropdown-toggle nav-link dropdown-user-link" href="#" data-toggle="dropdown">
                            <div class="user-nav d-sm-flex d-none"><span class="user-name text-bold-600">
                                <?php  
                                      echo (!empty($_SESSION)) ? $_SESSION['nama'] : '';
                                      echo (($_SESSION['role'] == 'Mahasiswa') || ($_SESSION['role'] == 'Dosen')) ?  ' ('.$_SESSION['kode_prodi'].')' : '';
                                ?>
    
                            </span><span class="user-status"> 
                                <?php 
                                    if (!empty($_SESSION)) {
                                        echo (($_SESSION['role'] == 'Mahasiswa')) ?  'NIM Mahasiswa : '.$_SESSION['nim'] : '';
                                        echo (($_SESSION['role'] == 'Dosen')) ?  'NIDN Dosen : '.$_SESSION['nidn'] : '';
                                        echo (($_SESSION['role'] == 'Admin')) ?  'Admin' : '';
                                    }
                                 ?>
                                 </span></div><span><img class="round" src="./assets/app-assets/images/portrait/small/avatar-s-11.jpg" alt="avatar" height="40" width="40"></span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right"><a class="dropdown-item" href="index.php?p=profile"><i class="feather icon-user"></i> Edit Profile</a>
                            <div class="dropdown-divider"></div><a class="dropdown-item" href="index.php?p=logout"><i class="feather icon-power"></i> Logout</a>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</nav>