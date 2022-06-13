<section class="latest-blog objects-car white-bg page page-section-ptb">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12">
                <div class="section-title">
                    <h2>Pelayanan</h2>
                    <div class="separator"></div>
                </div>
            </div>
        </div>
        <div class="blog-1">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <table class="table table-bordered table-striped mb-none" id="datatable-default">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Bengkel</th>
                                <th>No. Polisi</th>
                                <th>Merk</th>
                                <th>Keluhan</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $idu = $rowLog->id_users;
                            $sql = "SELECT p.id_pelayanan, p.no_polisi, p.merk, p.tahun_buat, p.tgl_pajak, p.tgl_stnk, p.keluhan, p.latitude, p.longitude, b.nama FROM tb_pelayanan AS p LEFT JOIN tb_bengkel AS b ON p.id_bengkel = b.id_bengkel WHERE p.id_users = '$idu'";
                            $qry = $pdo->Query($sql);
                            $sum = $qry->rowCount();
                            $no = 1;
                            if ($sum > 0) {
                                while ($row = $qry->fetch(PDO::FETCH_OBJ)) { ?>
                                    <tr>
                                        <td class="center"><?= $no++; ?></td>
                                        <td class="center"><?= $row->nama; ?></td>
                                        <td class="center"><?= $row->no_polisi; ?></td>
                                        <td class="center"><?= $row->merk; ?></td>
                                        <td class="center"><?= substr($row->keluhan, 0, 60); ?>...</td>
                                    </tr>
                                <?php } ?>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>