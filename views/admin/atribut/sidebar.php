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
                        <li class="<?= ($_REQUEST['content'] == "users") ? 'nav-active' : '' ?>">
                            <a href="users">
                                <i class="fa fa-users" aria-hidden="true"></i>
                                <span>Users</span>
                            </a>
                        </li>
                        <li class="<?= ($_REQUEST['content'] == "jenis_pohon") ? 'nav-active' : '' ?>">
                            <a href="jenis_pohon">
                                <i class="fa fa-leaf" aria-hidden="true"></i>
                                <span>Jenis Tanaman</span>
                            </a>
                        </li>
                        <li class="<?= ($_REQUEST['content'] == "kriteria") ? 'nav-active' : '' ?>">
                            <a href="kriteria">
                                <i class="fa fa-asterisk" aria-hidden="true"></i>
                                <span>Kriteria</span>
                            </a>
                        </li>
                        <li class="<?= ($_REQUEST['content'] == "bobot") ? 'nav-active' : '' ?>">
                            <a href="bobot">
                                <i class="fa fa-list" aria-hidden="true"></i>
                                <span>Bobot</span>
                            </a>
                        </li>
                        <li class="<?= ($_REQUEST['content'] == "evaluasi") ? 'nav-active' : '' ?>">
                            <a href="evaluasi">
                                <i class="fa fa-check" aria-hidden="true"></i>
                                <span>Basis Pengetahuan</span>
                            </a>
                        </li>
                        <li class="<?= ($_REQUEST['content'] == "laporan") ? 'nav-active' : '' ?>">
                            <a href="laporan">
                                <i class="fa fa-file" aria-hidden="true"></i>
                                <span>Laporan</span>
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
    </aside>
    <!-- end: sidebar -->