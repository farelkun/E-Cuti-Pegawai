<body class="nav-md">
  <div class="container body">
    <div class="main_container">
      <div class="col-md-3 left_col">
        <div class="left_col scroll-view">
          <div class="navbar nav_title" style="border: 0;">
            <a href="index.html" class="site_title">
              <img src="<?php echo base_url() ?>assets/production/images/sumenep.png" alt="..." width="50px" height="50px">
              <span>E - CUTI</span>
            </a>
          </div>

          <div class="clearfix"></div>

          <!-- menu profile quick info -->
          <div class="profile clearfix">
            <div class="profile_pic">
              <br>
              <img src="<?php echo base_url() ?>assets/production/images/<?= $tampil['foto_profil'] ?>" width="70" height="70">
            </div>
            <div class="profile_info">
              <h2><?= $tampil['nama'] ?></h2>
              <span> <?= $tampil['level'] ?></span>
            </div>
          </div>
          <!-- /menu profile quick info -->

          <br />

          <!-- sidebar menu -->
          <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
            <div class="menu_section">
              <ul class="nav side-menu">
                <li><a href="<?php echo base_url('dashboard_pegawai') ?>"><i class="fa fa-home"></i> Home</a></li>
                <li><a href="<?php echo base_url() ?>pegawai/content_permohonan"><i class="fa fa-envelope"></i> Surat Permohonan Cuti</a></li>
                <li><a href="<?php echo base_url() ?>pegawai/content_cuti"><i class="fa fa-envelope-o"></i> Data Surat Cuti</a></li>
                <li><a href="<?php echo base_url() ?>pegawai/content_profil"><i class="fa fa-user"></i> Profil</a></li>
                <li><a href="<?php echo base_url() ?>pegawai/content_ubahPassword"><i class="fa fa-key"></i> Ubah Password</a></li>
              </ul>
            </div>


          </div>
          <!-- /sidebar menu -->

          <!-- /menu footer buttons -->
          <div class="sidebar-footer hidden-small">
            <a data-toggle="tooltip" data-placement="top" title="Settings">
              <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
            </a>
            <a data-toggle="tooltip" data-placement="top" title="FullScreen">
              <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
            </a>
            <a data-toggle="tooltip" data-placement="top" title="Lock">
              <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
            </a>
            <a data-toggle="tooltip" data-placement="top" title="Logout" href="login.html">
              <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
            </a>
          </div>
          <!-- /menu footer buttons -->
        </div>
      </div>

      <!-- top navigation -->
      <div class="top_nav">
        <div class="nav_menu">
          <nav>
            <div class="nav toggle">
              <a id="menu_toggle"><i class="fa fa-bars"></i></a>
            </div>

            <ul class="nav navbar-nav navbar-right">
              <li class="">
                <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                  <img src="<?php echo base_url() ?>assets/production/images/<?= $tampil['foto_profil'] ?>" alt="">
                  <span class=" fa fa-angle-down"></span>
                </a>
                <ul class="dropdown-menu dropdown-usermenu pull-right">
                  <li><a href="<?php echo base_url() ?>pegawai/content_profil"> Profile</a></li>
                  <li><?php echo anchor('login/logout', 'Logout'); ?></li>
                </ul>
              </li>
            </ul>
          </nav>
        </div>
      </div>