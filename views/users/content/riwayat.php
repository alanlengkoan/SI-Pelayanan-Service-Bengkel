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
                        <th>Lokasi</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $idu   = $rowLog->id_users;
                    $sql   = "SELECT tb_laporan.*, tb_lokasi.nama FROM tb_laporan INNER JOIN tb_lokasi ON tb_laporan.id_lokasi = tb_lokasi.id_lokasi WHERE id_users = '$idu'";
                    $qry   = $pdo->Query($sql);
                    $count = $qry->rowCount();
                    $no = 1;
                    if ($count > 0) {
                        while ($row = $qry->fetch(PDO::FETCH_OBJ)) { ?>
                            <tr>
                                <td><?= $no++ ?></td>
                                <td><?= $row->nama ?></td>
                                <td align="center">
                                    <a href="riwayat_detail&id_laporan=<?= $row->id_laporan ?>" class="btn btn-primary btn-sm" target="_blank"><i class="fa fa-info-circle"></i> Detail</a>
                                    &nbsp;
                                    <a href="content/riwayat_cetak.php?id_laporan=<?= $row->id_laporan ?>" class="btn btn-info btn-sm" target="_blank"><i class="fa fa-print"></i> Cetak</a>
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