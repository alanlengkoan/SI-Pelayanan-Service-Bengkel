<section role="main" class="content-body">
    <header class="page-header">
        <h2>Bengkel</h2>
    </header>

    <!-- begin:: tabel -->
    <section class="panel">
        <header class="panel-heading">
            <h2 class="panel-title">Tabel</h2>
        </header>
        <div class="panel-body">
            <table class="table table-bordered table-striped mb-none" id="datatable-default">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Bengkel</th>
                        <th>No. Polisi</th>
                        <th>Keluhan</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $idu = $rowLog->id_users;
                    $sql = "SELECT p.id_pelayanan, p.no_polisi, p.merk, p.tahun_buat, p.tgl_pajak, p.tgl_stnk, p.keluhan, p.latitude, p.longitude, b.nama FROM tb_pelayanan AS p LEFT JOIN tb_bengkel AS b ON p.id_bengkel = b.id_bengkel WHERE b.id_users = '$idu'";
                    $qry = $pdo->Query($sql);
                    $sum = $qry->rowCount();
                    $no = 1;
                    if ($sum > 0) {
                        while ($row = $qry->fetch(PDO::FETCH_OBJ)) { ?>
                            <tr>
                                <td class="center"><?= $no++; ?></td>
                                <td class="center"><?= $row->nama; ?></td>
                                <td class="center"><?= $row->no_polisi; ?></td>
                                <td class="center"><?= substr($row->keluhan, 0, 60); ?>...</td>
                                <td class="center">
                                    <a href="pelayanan_detail&id_pelayanan=<?= $row->id_pelayanan ?>" class="btn btn-info btn-sm"><i class="fa fa-info-circle"></i></a>
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