<section role="main" class="content-body">
    <header class="page-header">
        <h2>Evaluasi</h2>
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
            <form action="aksi/?aksi=lahan_add" id="form-add" class="form-horizontal">
                <div class="form-group">
                    <label class="col-sm-4 control-label">Lokasi *</label>
                    <div class="col-sm-8">
                        <select class="form-control" name="inpidlokasi" id="inpidlokasi">
                            <option value="">- Pilih -</option>
                            <?php
                            $sqlLokasi = "SELECT tb_lokasi.id_lokasi, tb_lokasi.nama FROM tb_lokasi LEFT JOIN tb_lahan ON tb_lokasi.id_lokasi = tb_lahan.id_lokasi WHERE tb_lahan.id_lokasi IS NULL";
                            $qryLokasi = $pdo->Query($sqlLokasi);
                            while ($row = $qryLokasi->fetch(PDO::FETCH_OBJ)) { ?>
                                <option value="<?= $row->id_lokasi ?>"><?= $row->nama ?></option>
                            <?php } ?>
                        </select>
                    </div>
                </div>
                <?php
                $query2 = $pdo->GetAll('tb_atribut', 'id_atribut');
                while ($row = $query2->fetch(PDO::FETCH_OBJ)) { ?>
                    <div class="form-group">
                        <label class="col-sm-4 control-label"><?= $row->atribut ?> *</label>
                        <div class="col-sm-8">
                            <input type="hidden" name="inpidkriteria[]" value="<?= $row->id_atribut ?>" readonly="readonly" />
                            <select class="form-control" name="inpnilai[]" id="inpnilai">
                                <option value="">- Pilih <?= $row->atribut ?> -</option>
                                <?php
                                $sql    = "SELECT * FROM tb_parameter WHERE id_atribut = '$row->id_atribut'";
                                $query3 = $pdo->Query($sql);
                                while ($row = $query3->fetch(PDO::FETCH_OBJ)) { ?>
                                    <option value="<?= $row->nilai ?>"><?= $row->parameter ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                <?php } ?>
                <div class="text-center">
                    <button type="reset" class="btn btn-default"><i class="fa fa-refresh"></i> Reset</button>&nbsp;
                    <button type="submit" class="btn btn-primary" name="add" id="add"><i class="fa fa-plus"></i> Add</button>
                </div>
            </form>
        </div>
    </section>
    <!-- end:: form -->

    <?php
    // untuk mengambil data atribut
    $qryAtribut = $pdo->GetAll('tb_atribut', 'id_atribut');
    $atribut = [];
    while ($row = $qryAtribut->fetch(PDO::FETCH_OBJ)) {
        $atribut[$row->id_atribut] = $row->atribut;
    }

    // untuk mengambil data lokasi
    $qryLokasi = $pdo->GetAll('tb_lokasi', 'id_lokasi');
    $lokasi = [];
    while ($row = $qryLokasi->fetch(PDO::FETCH_OBJ)) {
        $lokasi[$row->id_lokasi] = $row->nama;
    }

    // untuk mengambil data parameter
    $sqlParameter = "SELECT * FROM tb_parameter ORDER BY id_atribut, id_parameter";
    $qryParameter = $pdo->Query($sqlParameter);
    $parameter = [];
    while ($row = $qryParameter->fetch(PDO::FETCH_OBJ)) {
        $parameter[$row->id_atribut][$row->nilai] = $row->parameter;
    }

    // untuk ambil data training
    $sqlData = "SELECT tb_lahan.id_lokasi FROM tb_lahan GROUP BY tb_lahan.id_lokasi ORDER BY tb_lahan.id_lokasi";
    $qryData = $pdo->Query($sqlData);
    $data = [];
    while ($row = $qryData->fetch(PDO::FETCH_OBJ)) {
        $sqlDetail = "SELECT tb_lahan.id_lahan, tb_lahan.id_lokasi, tb_lahan.id_atribut, tb_lahan.nilai FROM tb_lahan WHERE tb_lahan.id_lokasi = '$row->id_lokasi'";
        $qryDetail = $pdo->Query($sqlDetail);
        while ($rows = $qryDetail->fetch(PDO::FETCH_OBJ)) {
            $getAtribut[$row->id_lokasi][] = [
                'nilai' => $parameter[$rows->id_atribut][$rows->nilai]
            ];
        }

        $data[] = [
            'id_lokasi' => $row->id_lokasi,
            'lokasi'    => $lokasi[$row->id_lokasi],
            'atribut'   => $getAtribut[$row->id_lokasi],
        ];
    }
    ?>

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
            <div class="table-responsive">
                <table class="table table-bordered table-striped mb-none" id="datatable-default">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Lokasi</th>
                            <?php foreach ($atribut as $key => $row) { ?>
                                <th><?= $row ?></th>
                            <?php } ?>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($data as $key => $value) { ?>
                            <tr>
                                <td><?= $no++ ?></td>
                                <td><?= $value['lokasi'] ?></td>
                                <?php foreach ($value['atribut'] as $row) { ?>
                                    <td><?= $row['nilai'] ?></td>
                                <?php } ?>
                                <td align="center">
                                    <button id="upd" class="btn btn-primary btn-sm" data-id="<?= $value['id_lokasi'] ?>" data-count="<?= $value['count'] ?>"><i class="fa fa-edit"></i> Ubah</button>&nbsp;
                                    <button id="del" class="btn btn-danger btn-sm" data-id="<?= $value['id_lokasi'] ?>" data-count="<?= $value['count'] ?>"><i class="fa fa-trash-o"></i> Hapus</button>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </section>
    <!-- end:: tabel -->
</section>