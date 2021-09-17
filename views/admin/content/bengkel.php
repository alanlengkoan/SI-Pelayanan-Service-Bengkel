<section role="main" class="content-body">
    <header class="page-header">
        <h2>Bengkel</h2>
    </header>

    <!-- begin:: form -->
    <section class="panel">
        <header class="panel-heading">
            <h2 class="panel-title">Form</h2>
        </header>
        <div class="panel-body">
            <div class="row">
                <div class="col-lg-6">
                    <form action="aksi/?aksi=bengkel_save" id="form-add-upd" class="form-horizontal" method="POST">
                        <!-- begin:: id -->
                        <input type="hidden" name="inpidbengkel" id="inpidbengkel">
                        <!-- end:: id -->

                        <div class="form-group">
                            <label class="col-sm-4 control-label">Node&nbsp;*</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="inpnode" id="inpnode" placeholder="Masukkan node">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-4 control-label">Nama&nbsp;*</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="inpnama" id="inpnama" placeholder="Masukkan nama">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-4 control-label">Alamat&nbsp;*</label>
                            <div class="col-sm-8">
                                <textarea class="form-control" name="inpalamat" id="inpalamat" placeholder="Masukkan alamat"></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-4 control-label">Latitude&nbsp;*</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="inplatitude" id="inplatitude" placeholder="Masukkan latitude" readonly="readonly" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-4 control-label">Longittude&nbsp;*</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="inplongitude" id="inplongitude" placeholder="Masukkan longitude" readonly="readonly" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-4 control-label">Gambar&nbsp;*</label>
                            <div class="col-md-8">
                                <div id="lihat_gambar" style="padding-bottom: 10px"></div>
                                <input type="file" name="inpgambar" id="inpgambar" />
                                <div id="centang_gambar" style="padding-top: 10px"></div>
                            </div>
                        </div>
                        <div class="text-center">
                            <button type="reset" class="btn btn-default"><i class="fa fa-refresh"></i></button>&nbsp;
                            <button type="submit" class="btn btn-primary" name="add" id="add"><i class="fa fa-plus"></i></button>
                        </div>
                    </form>
                </div>
                <div class="col-lg-6">
                    <div id="map" style="height: 400px;"></div>
                </div>
            </div>
        </div>
    </section>
    <!-- end:: form -->

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
                                <td><?= $no++; ?></td>
                                <td><?= $row->node; ?></td>
                                <td><?= $row->nama; ?></td>
                                <td><?= substr($row->alamat, 0, 60); ?>...</td>
                                <td><img src="../../assets/uploads/pohon/<?= $row->gambar ?>" width="100" heigth="100" /></td>
                                <td align="center">
                                    <button class="btn btn-primary btn-sm" id="upd" data-id="<?= $row->id_bengkel ?>"><i class="fa fa-edit"></i></button>&nbsp;
                                    <button class="btn btn-danger btn-sm" id="del" data-id="<?= $row->id_bengkel ?>"><i class="fa fa-trash-o"></i></button>
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