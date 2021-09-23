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
                        <th>No. Rangka</th>
                        <th>Keluhan</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $idu = $rowLog->id_users;
                    $sql = "SELECT p.id_pelayanan, p.no_polisi, p.no_rangka, p.merk, p.tipe, p.tahun_buat, p.tgl_pajak, p.tgl_stnk, p.keluhan, p.latitude, p.longitude, b.nama FROM tb_pelayanan AS p LEFT JOIN tb_bengkel AS b ON p.id_bengkel = b.id_bengkel WHERE p.id_users = '$idu'";
                    $qry = $pdo->Query($sql);
                    $sum = $qry->rowCount();
                    $no = 1;
                    if ($sum > 0) {
                        while ($row = $qry->fetch(PDO::FETCH_OBJ)) { ?>
                            <tr>
                                <td class="center"><?= $no++; ?></td>
                                <td class="center"><?= $row->nama; ?></td>
                                <td class="center"><?= $row->no_polisi; ?></td>
                                <td class="center"><?= $row->no_rangka; ?></td>
                                <td class="center"><?= substr($row->keluhan, 0, 60); ?>...</td>
                            </tr>
                        <?php } ?>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </section>
    <!-- end:: tabel -->
</section>