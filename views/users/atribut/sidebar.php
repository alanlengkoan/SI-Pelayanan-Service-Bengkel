<div class="inner-wrapper">
    <!-- start: sidebar -->
    <aside id="sidebar-left" class="sidebar-left">

        <div class="sidebar-header">
            <div class="sidebar-title">
                Navigation
            </div>
            <div class="sidebar-toggle hidden-xs" data-toggle-class="sidebar-left-collapsed" data-target="html" data-fire-event="sidebar-left-toggle">
                <i class="fa fa-bars" aria-label="Toggle sidebar"></i>
            </div>
        </div>

        <div class="nano">
            <div class="nano-content">
                <nav id="menu" class="nav-main" role="navigation">
                    <ul class="nav nav-main">
                        <li class="<?= ($_REQUEST['content'] == "dashboard") ? 'nav-active' : '' ?>">
                            <a href="dashboard">
                                <i class="fa fa-home" aria-hidden="true"></i>
                                <span>Dashboard</span>
                            </a>
                        </li>
                        <li class="<?= ($_REQUEST['content'] == "lokasi") ? 'nav-active' : '' ?>">
                            <a href="lokasi">
                                <i class="fa fa-map-marker" aria-hidden="true"></i>
                                <span>Lokasi</span>
                            </a>
                        </li>
                        <li class="<?= ($_REQUEST['content'] == "lahan") ? 'nav-active' : '' ?>">
                            <a href="lahan">
                                <i class="fa fa-location-arrow" aria-hidden="true"></i>
                                <span>Lahan</span>
                            </a>
                        </li>
                        <li class="<?= ($_REQUEST['content'] == "konsultasi") ? 'nav-active' : '' ?>">
                            <a href="konsultasi">
                                <i class="fa fa-spinner" aria-hidden="true"></i>
                                <span>Konsultasi</span>
                            </a>
                        </li>
                        <li class="<?= ($_REQUEST['content'] == "riwayat") ? 'nav-active' : '' ?>">
                            <a href="riwayat">
                                <i class="fa fa-history" aria-hidden="true"></i>
                                <span>Riwayat</span>
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
    </aside>
    <!-- end: sidebar -->