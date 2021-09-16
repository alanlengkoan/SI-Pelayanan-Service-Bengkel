<section role="main" class="content-body">
    <header class="page-header">
        <h2>Bobot</h2>
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
            <form action="aksi/?aksi=bobot_add" id="form-add" class="form-horizontal">
                <!-- begin:: id -->
                <input type="hidden" name="inpidparamater" id="inpidparamater">
                <!-- end:: id -->
                <div class="form-group">
                    <label class="col-sm-4 control-label">Kriteria *</label>
                    <div class="col-sm-8">
                        <select class="form-control" name="inpidkriteria" id="inpidkriteria">
                            <option value="">- Pilih -</option>
                            <?php
                            $query = $pdo->GetAll('tb_atribut', 'id_atribut');
                            while ($row = $query->fetch(PDO::FETCH_OBJ)) { ?>
                                <option value="<?= $row->id_atribut ?>"><?= $row->atribut ?></option>
                            <?php } ?>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-4 control-label">Parameter *</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" name="inpparameter" id="inpparameter" placeholder="Masukkan parameter">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-4 control-label">Nilai *</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" name="inpnilai" id="inpnilai" placeholder="Masukkan nilai">
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
                        <th>Kriteria</th>
                        <th>Parameter</th>
                        <th>Nilai</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $sql    = "SELECT tb_parameter.id_parameter, tb_parameter.parameter, tb_parameter.nilai, tb_atribut.id_atribut, tb_atribut.atribut AS kriteria FROM tb_parameter LEFT JOIN tb_atribut ON tb_parameter.id_atribut = tb_atribut.id_atribut";
                    $query  = $pdo->Query($sql);
                    $jumlah = $query->rowCount();
                    $no = 1;
                    if ($jumlah > 0) {
                        while ($row = $query->fetch(PDO::FETCH_OBJ)) { ?>
                            <tr>
                                <td align="center"><?= $no++; ?></td>
                                <td><?= $row->kriteria; ?></td>
                                <td><?= $row->parameter; ?></td>
                                <td><?= $row->nilai; ?></td>
                                <td align="center">
                                    <button class="btn btn-primary btn-sm" id="upd" data-id="<?= $row->id_parameter ?>"><i class="fa fa-edit"></i> Ubah</button>&nbsp;
                                    <button class="btn btn-danger btn-sm" id="del" data-id="<?= $row->id_parameter ?>"><i class="fa fa-trash-o"></i> Hapus</button>
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