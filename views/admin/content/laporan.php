<section role="main" class="content-body">
    <header class="page-header">
        <h2>Riwayat</h2>
    </header>

    <!-- begin:: tabel -->
    <section class="panel">
        <header class="panel-heading">
            <div class="panel-actions">
                <a href="#" class="fa fa-caret-down"></a>
                <a href="#" class="fa fa-times"></a>
            </div>

            <h2 class="panel-title">Riwayat</h2>
        </header>
        <div class="panel-body">
            <table class="table table-bordered table-striped mb-none" id="datatable-default">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Users</th>
                        <th>Lokasi</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $sql   = "SELECT tb_laporan.*, tb_users.nama AS users, tb_lokasi.nama AS lokasi FROM tb_laporan LEFT JOIN tb_lokasi ON tb_laporan.id_lokasi = tb_lokasi.id_lokasi LEFT JOIN tb_users ON tb_laporan.id_users = tb_users.id_users";
                    $qry   = $pdo->Query($sql);
                    $count = $qry->rowCount();
                    $no = 1;
                    if ($count > 0) {
                        while ($row = $qry->fetch(PDO::FETCH_OBJ)) { ?>
                            <tr>
                                <td><?= $no++ ?></td>
                                <td><?= $row->users ?></td>
                                <td><?= $row->lokasi ?></td>
                                <td align="center">
                                    <a href="laporan_detail&id_laporan=<?= $row->id_laporan ?>" class="btn btn-primary btn-sm" target="_blank"><i class="fa fa-info-circle"></i> Detail</a>
                                    &nbsp;
                                    <a href="content/laporan_cetak.php?id_laporan=<?= $row->id_laporan ?>" class="btn btn-info btn-sm" target="_blank"><i class="fa fa-print"></i> Cetak</a>
                                </td>
                            </tr>
                        <?php } ?>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </section>
    <!-- end:: tabel -->
</section>