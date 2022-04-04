<section class="latest-blog objects-car white-bg page page-section-ptb">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12">
                <div class="section-title">
                    <h2>Bengkel</h2>
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
                                <th>Node</th>
                                <th>Nama</th>
                                <th>Alamat</th>
                                <th>Gambar</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $query  = $pdo->GetAll('tb_bengkel', 'id_bengkel');
                            $jumlah = $query->rowCount();
                            $no = 1;
                            if ($jumlah > 0) {
                                while ($row = $query->fetch(PDO::FETCH_OBJ)) { ?>
                                    <tr>
                                        <td class="center"><?= $no++; ?></td>
                                        <td class="center"><?= $row->node; ?></td>
                                        <td class="center"><?= $row->nama; ?></td>
                                        <td class="center"><?= substr($row->alamat, 0, 60); ?>...</td>
                                        <td class="center"><img src="../../assets/uploads/pohon/<?= $row->gambar ?>" width="100" heigth="100" /></td>
                                        <td class="center">
                                            <a href="bengkel_detail&id_bengkel=<?= $row->id_bengkel ?>">Detail</a>
                                        </td>
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