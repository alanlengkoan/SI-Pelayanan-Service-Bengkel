<section role="main" class="content-body">
    <header class="page-header">
        <h2>Dashboard</h2>
    </header>

    <div class="row">
        <div class="col-md-12 col-lg-6 col-xl-6">
            <section class="panel panel-featured-left panel-featured-tertiary">
                <div class="panel-body">
                    <div class="widget-summary">
                        <div class="widget-summary-col widget-summary-col-icon">
                            <div class="summary-icon bg-tertiary">
                                <i class="fa fa-tree"></i>
                            </div>
                        </div>
                        <div class="widget-summary-col">
                            <div class="summary">
                                <h4 class="title">Jenis Tanaman</h4>
                                <div class="info">
                                    <?php
                                    $query = $pdo->GetAll('tb_responden', 'id_responden');
                                    $jml_jenis_tanaman = $query->rowCount();
                                    ?>
                                    <strong class="amount"><?= $jml_jenis_tanaman ?></strong>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
        <div class="col-md-12 col-lg-6 col-xl-6">
            <section class="panel panel-featured-left panel-featured-quartenary">
                <div class="panel-body">
                    <div class="widget-summary">
                        <div class="widget-summary-col widget-summary-col-icon">
                            <div class="summary-icon bg-quartenary">
                                <i class="fa fa-users"></i>
                            </div>
                        </div>
                        <div class="widget-summary-col">
                            <div class="summary">
                                <h4 class="title">Users</h4>
                                <div class="info">
                                    <?php
                                    $query = $pdo->GetAll('tb_member', 'id_member');
                                    $jml_users = $query->rowCount();
                                    ?>
                                    <strong class="amount"><?= $jml_users ?></strong>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
</section>