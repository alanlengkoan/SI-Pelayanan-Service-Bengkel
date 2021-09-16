<!-- start: header -->
<header class="header">
  <div class="logo-container">
    <a href="dashboard" class="logo">
      <h4>SPK Jenis Tanaman</h4>
    </a>
    <div class="visible-xs toggle-sidebar-left" data-toggle-class="sidebar-left-opened" data-target="html" data-fire-event="sidebar-left-opened">
      <i class="fa fa-bars" aria-label="Toggle sidebar"></i>
    </div>
  </div>

  <!-- start: search & user box -->
  <div class="header-right">
    <span class="separator"></span>

    <div id="userbox" class="userbox">
      <a href="#" data-toggle="dropdown">
        <figure class="profile-picture">
          <img src="../../assets/admin/images/!happy-face.png" alt="Joseph Doe" class="img-circle" data-lock-picture="assets/images/!logged-user.jpg" />
        </figure>
        <div class="profile-info" data-lock-name="John Doe" data-lock-email="johndoe@JSOFT.com">
          <span class="name"><?= $rowLog->nama ?></span>
          <span class="role"><?= $rowLog->level ?></span>
        </div>

        <i class="fa custom-caret"></i>
      </a>

      <div class="dropdown-menu">
        <ul class="list-unstyled">
          <li class="divider"></li>
          <li>
            <a role="menuitem" tabindex="-1" href="profil"><i class="fa fa-user"></i> My Profile</a>
          </li>
          <li>
            <a role="menuitem" tabindex="-1" href="../logout.php"><i class="fa fa-power-off"></i> Logout</a>
          </li>
        </ul>
      </div>
    </div>
  </div>
  <!-- end: search & user box -->
</header>
<!-- end: header -->