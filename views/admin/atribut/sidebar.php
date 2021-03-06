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
                                <i class="fa fa-circle" aria-hidden="true"></i>
                                <span>Dashboard</span>
                            </a>
                        </li>
                        <li class="<?= ($_REQUEST['content'] == "users") ? 'nav-active' : '' ?>">
                            <a href="users">
                                <i class="fa fa-circle" aria-hidden="true"></i>
                                <span>Users</span>
                            </a>
                        </li>
                        <li class="<?= ($_REQUEST['content'] == "bengkel") ? 'nav-active' : '' ?>">
                            <a href="bengkel">
                                <i class="fa fa-circle" aria-hidden="true"></i>
                                <span>Bengkel</span>
                            </a>
                        </li>
                        <li class="<?= ($_REQUEST['content'] == "evaluasi") ? 'nav-active' : '' ?>">
                            <a href="evaluasi">
                                <i class="fa fa-circle" aria-hidden="true"></i>
                                <span>Evaluasi</span>
                            </a>
                        </li>
                        <li class="<?= ($_REQUEST['content'] == "algoritma") ? 'nav-active' : '' ?>">
                            <a href="algoritma">
                                <i class="fa fa-circle" aria-hidden="true"></i>
                                <span>Algoritma</span>
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
    </aside>
    <!-- end: sidebar -->