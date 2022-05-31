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
                                <i class="fa fa-motorcycle"></i>
                            </div>
                        </div>
                        <div class="widget-summary-col">
                            <div class="summary">
                                <h4 class="title">Bengkel</h4>
                                <div class="info">
                                    <?php
                                    $query = $pdo->GetAll('tb_bengkel', 'id_bengkel');
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
                                <h4 class="title">Member</h4>
                                <div class="info">
                                    <?php
                                    $query = $pdo->GetAll('tb_users', 'id_users');
                                    $query = $pdo->GetWhere('tb_users', 'level', 'users');
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