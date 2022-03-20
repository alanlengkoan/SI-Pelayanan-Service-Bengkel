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
                        <th>Node</th>
                        <th>Nama</th>
                        <th>Alamat</th>
                        <th>Gambar</th>
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
                            </tr>
                        <?php } ?>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </section>
    <!-- end:: tabel -->
</section>