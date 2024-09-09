
<body>
  <div class="container-scroller">
    <!-- partial:partials/_navbar.html -->
    <nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
      <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
         <img src="<?= base_url('images/' . $yogi->logo_website) ?>" alt="logo" class="fade-in" width="90px" />
        <a class="navbar-brand brand-logo-mini" href="index.html"><img src="<?= base_url('images/logo-mini.svg')?>" alt="logo"/></a>
      </div>
      <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
        <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
          <span class="icon-menu"></span>
        </button>
        <ul class="navbar-nav mr-lg-2">
          <li class="nav-item nav-search d-none d-lg-block">
            <div class="input-group">
              <div class="input-group-prepend hover-cursor" id="navbar-search-icon">
                <span class="input-group-text" id="search">
                  <i class="icon-search"></i>
                </span>
              </div>
              <input type="text" class="form-control" id="navbar-search-input" placeholder="Search now" aria-label="search" aria-describedby="search">
            </div>
          </li>
        </ul>
        <ul class="navbar-nav navbar-nav-right">
          <li class="nav-item dropdown">
          <a class="nav-link count-indicator dropdown-toggle" id="notificationDropdown" href="<?= base_url('home/profile') ?>" data-toggle="dropdown">
  <i class="mdi mdi-account"></i>
</a>

            <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="notificationDropdown">
              <p class="mb-0 font-weight-normal float-left dropdown-header">Notifications</p>
              <a class="dropdown-item preview-item">
                <div class="preview-thumbnail">
                  <div class="preview-icon bg-success">
                    <i class="ti-info-alt mx-0"></i>
                  </div>
                </div>
                <div class="preview-item-content">
                  <h6 class="preview-subject font-weight-normal">Application Error</h6>
                  <p class="font-weight-light small-text mb-0 text-muted">
                    Just now
                  </p>
                </div>
              </a>
              <a class="dropdown-item preview-item">
                <div class="preview-thumbnail">
                  <div class="preview-icon bg-warning">
                    <i class="ti-settings mx-0"></i>
                  </div>
                </div>
                <div class="preview-item-content">
                  <h6 class="preview-subject font-weight-normal">Settings</h6>
                  <p class="font-weight-light small-text mb-0 text-muted">
                    Private message
                  </p>
                </div>
              </a>
              <a class="dropdown-item preview-item">
                <div class="preview-thumbnail">
                  <div class="preview-icon bg-info">
                    <i class="ti-user mx-0"></i>
                  </div>
                </div>
                <div class="preview-item-content">
                  <h6 class="preview-subject font-weight-normal">New user registration</h6>
                  <p class="font-weight-light small-text mb-0 text-muted">
                    2 days ago
                  </p>
                </div>
              </a>
            </div>
          </li>
          <li class="nav-item nav-profile dropdown">
            <a class="nav-link dropdown-toggle" href="" data-toggle="dropdown" id="profileDropdown">
            </a>
            <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="profileDropdown">
              <a class="dropdown-item">
                <i class="ti-settings text-primary"></i>
                Settings
              </a>
              <a class="dropdown-item">
                <i class="ti-power-off text-primary"></i>
                Logout
              </a>
            </div>
          </li>
          <li class="nav-item nav-settings d-none d-lg-flex">
            <a class="nav-link" href="#">
              <i class="icon-ellipsis"></i>
            </a>
          </li>
        </ul>
        <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
          <span class="icon-menu"></span>
        </button>
      </div>
    </nav>
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <!-- partial:partials/_settings-panel.html -->
      <div class="theme-setting-wrapper">
        <div id="settings-trigger"><i class="ti-settings"></i></div>
        <div id="theme-settings" class="settings-panel">
          <i class="settings-close ti-close"></i>
          <p class="settings-heading">SIDEBAR SKINS</p>
          <div class="sidebar-bg-options selected" id="sidebar-light-theme"><div class="img-ss rounded-circle bg-light border mr-3"></div>Light</div>
          <div class="sidebar-bg-options" id="sidebar-dark-theme"><div class="img-ss rounded-circle bg-dark border mr-3"></div>Dark</div>
          <p class="settings-heading mt-2">HEADER SKINS</p>
          <div class="color-tiles mx-0 px-4">
            <div class="tiles success"></div>
            <div class="tiles warning"></div>
            <div class="tiles danger"></div>
            <div class="tiles info"></div>
            <div class="tiles dark"></div>
            <div class="tiles default"></div>
          </div>
        </div>
      </div>
     
      <!-- partial -->
      <!-- partial:partials/_sidebar.html -->
      <nav class="sidebar sidebar-offcanvas" id="sidebar">
        <ul class="nav">
          <li class="nav-item">
            <a class="nav-link" href="<?= base_url('home/dashboard')?>">
              <i class="icon-grid menu-icon"></i>
              <span class="menu-title">Dashboard</span>
            </a>
          </li>

         
<li class="nav-item">
    <a class="nav-link" data-toggle="collapse" href="<?= base_url('home/kelas') ?>" aria-expanded="false" aria-controls="ui-basic">
        <i class="icon-layout menu-icon"></i>
        <span class="menu-title">Kelas</span>
    </a>
</li>


<?php
      if (session()->get('status') == 'admin' || session()->get('status') == 'admin_ruangan'){
        ?>
<li class="nav-item">
    <a class="nav-link" data-toggle="collapse" href="<?= base_url('home/kelas_admin') ?>" aria-expanded="false" aria-controls="ui-basic">
        <i class="icon-layout menu-icon"></i>
        <span class="menu-title">Kelas</span>
    </a>
</li>
<?php 
      } else {

      }
?>

<?php
      if (session()->get('status') == 'admin'){
        ?>
<li class="nav-item">
    <a class="nav-link" data-toggle="collapse" href="<?= base_url('home/user') ?>" aria-expanded="false" aria-controls="ui-basic">
        <i class="icon-layout menu-icon"></i>
        <span class="menu-title">User</span>
    </a>
</li>
<?php 
      } else {

      }
?>


<?php
      if (session()->get('status') == 'admin' || session()->get('status') == 'admin_ruangan'){
        ?>
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="<?= base_url('home/restore') ?>" aria-expanded="false" aria-controls="ui-basic">
              <i class="icon-layout menu-icon"></i>
              <span class="menu-title">Restore</span>
            </a>
            
          </li>
          <?php 
      } else {

      }
?>


<?php
      if (session()->get('status') == 'admin' || session()->get('status') == 'admin_ruangan'){
        ?>
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="<?= base_url('home/restore_edit') ?>" aria-expanded="false" aria-controls="ui-basic">
              <i class="icon-layout menu-icon"></i>
              <span class="menu-title">Restore Edit</span>
            </a>
            
          </li>
          <?php 
      } else {

      }
?>

<?php
      if (session()->get('status') == 'admin' || session()->get('status') == 'admin_ruangan'){
        ?>
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="<?= base_url('home/laporan') ?>" aria-expanded="false" aria-controls="ui-basic">
              <i class="icon-layout menu-icon"></i>
              <span class="menu-title">Laporan</span>
            </a>
            
          </li>
          <?php 
      } else {

      }
?>

<?php
      if (session()->get('status') == 'admin'){
        ?>
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="<?= base_url('home/setting') ?>" aria-expanded="false" aria-controls="ui-basic">
              <i class="icon-layout menu-icon"></i>
              <span class="menu-title">Setting</span>
            </a>
            
          </li>
          <?php 
      } else {

      }
?>

<?php
      if (session()->get('status') == 'admin'){
        ?>
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="<?= base_url('home/log_activity') ?>" aria-expanded="false" aria-controls="ui-basic">
              <i class="icon-layout menu-icon"></i>
              <span class="menu-title">Log Activity</span>
            </a>
            
          </li>
          <?php 
      } else {

      }
?>

          
          
          
        </ul>
      </nav>
      <!-- partial -->
      
      <!-- main-panel ends -->
  
  <!-- End custom js for this page-->