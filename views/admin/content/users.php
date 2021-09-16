<section role="main" class="content-body">
    <header class="page-header">
        <h2>Users</h2>
    </header>

    <section class="panel">
        <header class="panel-heading">
            <div class="panel-actions">
                <a href="#" class="fa fa-caret-down"></a>
                <a href="#" class="fa fa-times"></a>
            </div>

            <h2 class="panel-title">Tabel</h2>
        </header>
        <div class="panel-body">
            <table class="table table-bordered table-striped mb-none" id="datatable-default">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Username</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $query  = $pdo->GetWhere('tb_users', 'level', 'users');
                    $jumlah = $query->rowCount();
                    $no = 1;
                    if ($jumlah > 0) {
                        while ($row = $query->fetch(PDO::FETCH_OBJ)) { ?>
                            <tr>
                                <td align="center"><?= $no++; ?></td>
                                <td align="center"><?= $row->nama; ?></td>
                                <td align="center"><?= $row->username; ?></td>
                                <td><button class="btn btn-round btn-primary btn-sm" id="sts" data-sts="<?= $row->status_akun ?>" data-id="<?= $row->id_users ?>"><?= ($row->status_akun == '1') ? '<i class="fa fa-check"></i>&nbsp;Aktif' : '<i class="fa fa-times"></i>&nbsp;Tidak aktif' ?></button></td>
                            </tr>
                        <?php } ?>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </section>
</section>