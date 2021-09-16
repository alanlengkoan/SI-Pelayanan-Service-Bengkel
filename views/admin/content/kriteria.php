<section role="main" class="content-body">
    <header class="page-header">
        <h2>Kriteria</h2>
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
            <form action="aksi/?aksi=kriteria_add" id="form-add" class="form-horizontal">
                <!-- begin:: id -->
                <input type="hidden" name="inpidatribut" id="inpidatribut">
                <!-- end:: id -->
                <div class="form-group">
                    <label class="col-sm-4 control-label">Kriteria *</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" name="inpkriteria" id="inpkriteria" placeholder="Masukkan kriteria">
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
                        <th>Nama</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $query  = $pdo->GetAll('tb_atribut', 'id_atribut');
                    $jumlah = $query->rowCount();
                    $no = 1;
                    if ($jumlah > 0) {
                        while ($row = $query->fetch(PDO::FETCH_OBJ)) { ?>
                            <tr>
                                <td><?= $no++; ?></td>
                                <td><?= $row->atribut; ?></td>
                                <td align="center">
                                    <button class="btn btn-primary btn-sm" id="upd" data-id="<?= $row->id_atribut ?>"><i class="fa fa-edit"></i> Ubah</button>&nbsp;
                                    <button class="btn btn-danger btn-sm" id="del" data-id="<?= $row->id_atribut ?>"><i class="fa fa-trash-o"></i> Hapus</button>
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