<section role="main" class="content-body">
    <header class="page-header">
        <h2>Jenis Pohon</h2>
    </header>

    <!-- begin:: form -->
    <section class="panel">
        <header class="panel-heading">
            <div class="panel-actions">
                <a href="#" class="fa fa-caret-down"></a>
                <a href="#" class="fa fa-times"></a>
            </div>

            <h2 class="panel-title">Form</h2>
        </header>
        <div class="panel-body">
            <form action="aksi/?aksi=jenis_pohon_add" id="form-add" class="form-horizontal">
                <!-- begin:: id -->
                <input type="hidden" name="inpidresponden" id="inpidresponden">
                <!-- end:: id -->
                <div class="form-group">
                    <label class="col-sm-4 control-label">Jenis Pohon *</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" name="inpjenistanaman" id="inpjenistanaman" placeholder="Masukkan jenis pohon">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-4 control-label">Gambar *</label>
                    <div class="col-md-8">
                        <div id="lihat_gambar" style="padding-bottom: 10px"></div>
                        <input type="file" name="inpgambar" id="inpgambar" />
                        <div id="centang_gambar" style="padding-top: 10px"></div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-4 control-label">Keterangan *</label>
                    <div class="col-sm-8">
                        <textarea class="form-control" name="inpketerangan" id="inpketerangan" placeholder="Masukkan keterangan"></textarea>
                    </div>
                </div>
                <div class="text-center">
                    <button type="reset" class="btn btn-default"><i class="fa fa-refresh"></i> Reset</button>&nbsp;
                    <button type="submit" class="btn btn-primary" name="add" id="add"><i class="fa fa-plus"></i> Add</button>
                </div>
            </form>
        </div>
    </section>
    <!-- end:: form -->

    <!-- begin:: tabel -->
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
                        <th>No.</th>
                        <th>Gambar</th>
                        <th>Nama</th>
                        <th>Keterangan</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $query  = $pdo->GetAll('tb_responden', 'id_responden');
                    $jumlah = $query->rowCount();
                    $no = 1;
                    if ($jumlah > 0) {
                        while ($row = $query->fetch(PDO::FETCH_OBJ)) { ?>
                            <tr>
                                <td><?= $no++; ?></td>
                                <td><img src="../../assets/uploads/pohon/<?= $row->gambar ?>" width="100" heigth="100" /></td>
                                <td><?= $row->responden; ?></td>
                                <td><?= substr($row->keterangan, 0, 60); ?>...</td>
                                <td align="center">
                                    <button class="btn btn-primary btn-sm" id="upd" data-id="<?= $row->id_responden ?>"><i class="fa fa-edit"></i> Ubah</button>&nbsp;
                                    <button class="btn btn-danger btn-sm" id="del" data-id="<?= $row->id_responden ?>"><i class="fa fa-trash-o"></i> Hapus</button>
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