<div class="main-menu menu-fixed menu-light menu-accordion menu-shadow" data-scroll-to-active="true">
    <div class="navbar-header">
        <ul class="nav navbar-nav flex-row">
            <li class="nav-item mr-auto"><a class="navbar-brand" href="">
                    <div class="brand-logo"></div>
                    <h2 class="brand-text mb-0">Skripsi</h2>
                </a></li>
            <li class="nav-item nav-toggle"><a class="nav-link modern-nav-toggle pr-0" data-toggle="collapse"><i class="feather icon-x d-block d-xl-none font-medium-4 primary toggle-icon"></i><i class="toggle-icon feather icon-disc font-medium-4 d-none d-xl-block collapse-toggle-icon primary" data-ticon="icon-disc"></i></a></li>
        </ul>
    </div>
    <div class="shadow-bottom"></div>
    <div class="main-menu-content">
        <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
            <li class=" navigation-header"><span>Apps</span>
            </li>
            <li class="<?php echo($_GET[p] == 'dashboard' ? 'active' : '');?> nav-item"><a href="?p=dashboard"><i class="feather icon-home"></i><span class="menu-title" data-i18n="Dashboard">Dashboard</span></a>
            </li>
            <li class="<?php echo($_GET[p] == 'skripsi' ? 'active' : '');?>  nav-item"><a href="?p=skripsi"><i class="feather icon-message-square"></i><span class="menu-title" data-i18n="Skripsi">Skripsi</span></a>
            </li>
            <li class="<?php echo($_GET[p] == 'bimbingan-skripsi' ? 'active' : '');?> nav-item"><a href="?p=bimbingan-skripsi"><i class="feather icon-check-square"></i><span class="menu-title" data-i18n="Bimbingan Skripsi">Bimbingan Skripsi</span></a>
            </li>

            <?php
                if ($_SESSION['role'] == 'admin') {
            ?>
            <li class="nav-item"><a href="#"><i class="feather icon-copy"></i><span class="menu-title" data-i18n="Master">Master</span></a>
                <ul class="menu-content">
                    <li class="<?php echo($_GET[p] == 'dosen' ? 'active' : '');?>"><a href="?p=dosen"><i class="feather icon-circle"></i><span class="menu-item" data-i18n="Dosen">Dosen</span></a>
                    </li>
                    <li class="<?php echo($_GET[p] == 'mahasiswa' ? 'active' : '');?>"><a href="?p=mahasiswa"><i class="feather icon-circle"></i><span class="menu-item" data-i18n="Mahasiswa">Mahasiswa</span></a>
                    </li>
                    <li class="<?php echo($_GET[p] == 'prodi' ? 'active' : '');?>"><a href="?p=prodi"><i class="feather icon-circle"></i><span class="menu-item" data-i18n="Prodi">Prodi</span></a>
                    </li>
                    <li class="<?php echo($_GET[p] == 'user' ? 'active' : '');?>"><a href="?p=user"><i class="feather icon-circle"></i><span class="menu-item" data-i18n="User">User</span></a>
                    </li>
                    </li>
                </ul>
            </li>
            <?php 
                }
             ?>
        </ul>
    </div>
</div>