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
                        <li class="<?= ($_REQUEST['content'] == "pelayanan") ? 'nav-active' : '' ?>">
                            <a href="pelayanan">
                                <i class="fa fa-circle" aria-hidden="true"></i>
                                <span>Pelayanan</span>
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
    </aside>
    <!-- end: sidebar -->