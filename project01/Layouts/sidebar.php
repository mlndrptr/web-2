<?php
$activeUrl = $_GET['url'] ?? ''; // Get the current URL parameter or default to 'home'
?>

<!-- Navbar -->
<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
        <!-- <li class="nav-item d-none d-sm-inline-block">
            <a href="index3.html" class="nav-link">Home</a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
            <a href="#" class="nav-link">Contact</a>
        </li> -->
    </ul>

    <!-- Center navbar text -->
    <div class="navbar-text mx-auto" style="position: absolute; left: 50%; transform: translateX(-50%);">
        <h5 class="mb-0">Aplikasi Manajemen Penelitian dan Kegiatan Dosen</h5>
    </div>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
        <li class="nav-item">
            <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                <i class="fas fa-expand-arrows-alt"></i>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-widget="control-sidebar" data-controlsidebar-slide="true" href="#" role="button">
                <i class="fas fa-th-large"></i>
            </a>
        </li>
    </ul>
</nav>
<!-- /.navbar -->

<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <div class="brand-link">
        <i class="fas fa-cloud brand-image elevation-3 text-light" style="opacity: .8; font-size: 1.5rem; margin: 0 0.5rem;"></i>
        <span class="brand-text font-weight-light">Fitur - Fitur</span>
    </div>

    <!-- Sidebar -->
    <div class="sidebar">


        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class -->
                <li class="nav-header"></li>
                <li class="nav-item">
                    <a href="./?url=dosen" class="nav-link <?php echo $activeUrl === 'dosen' ? 'active' : ''; ?>">
                        <i class="nav-icon fas fa-users"></i> <!-- Icon for Dosen -->
                        <p>Data Dosen</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="./?url=kegiatan" class="nav-link <?php echo $activeUrl === 'kegiatan' ? 'active' : ''; ?>">
                        <i class="nav-icon fas fa-calendar-alt"></i> <!-- Icon for Kegiatan -->
                        <p>Data Kegiatan</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="./?url=penelitian"
                        class="nav-link <?php echo $activeUrl === 'penelitian' ? 'active' : ''; ?>">
                        <i class="nav-icon fas fa-microscope"></i> <!-- Icon for Penelitian -->
                        <p>Data Penelitian</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="./?url=jenis_kegiatan"
                        class="nav-link <?php echo $activeUrl === 'jenis_kegiatan' ? 'active' : ''; ?>">
                        <i class="nav-icon fas fa-list-alt"></i> <!-- Icon for Jenis Kegiatan -->
                        <p>Jenis Kegiatan</p>
                    </a>
                </li>
            </ul>

        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
