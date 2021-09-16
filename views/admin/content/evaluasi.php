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
            <form action="aksi/?aksi=evaluasi_add" id="form-add" class="form-horizontal">
                <!-- begin:: id -->
                <input type="hidden" name="inpiddata" id="inpiddata">
                <!-- end:: id -->
                <div class="form-group">
                    <label class="col-sm-4 control-label">Jenis Pohon *</label>
                    <div class="col-sm-8">
                        <select class="form-control" name="inpidresponden" id="inpidresponden">
                            <option value="">- Pilih -</option>
                            <?php
                            $query1 = $pdo->GetAll('tb_responden', 'id_responden');
                            while ($row = $query1->fetch(PDO::FETCH_OBJ)) { ?>
                                <option value="<?= $row->id_responden ?>"><?= $row->responden ?></option>
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

    // untuk mengambil data responden / jenis pohon
    $qryResponden = $pdo->GetAll('tb_responden', 'id_responden');
    $responden = [];
    while ($row = $qryResponden->fetch(PDO::FETCH_OBJ)) {
        $responden[$row->id_responden] = $row->responden;
    }

    // untuk mengambil data parameter
    $sqlParameter = "SELECT * FROM tb_parameter ORDER BY id_atribut, id_parameter";
    $qryParameter = $pdo->Query($sqlParameter);
    $parameter = [];
    while ($row = $qryParameter->fetch(PDO::FETCH_OBJ)) {
        $parameter[$row->id_atribut][$row->nilai] = $row->parameter;
    }

    // untuk ambil data training
    $sqlData = "SELECT tb_data.id_responden, tb_data.count FROM tb_data GROUP BY tb_data.count, tb_data.id_responden ORDER BY tb_data.id_responden";
    $qryData = $pdo->Query($sqlData);
    $data = [];
    while ($row = $qryData->fetch(PDO::FETCH_OBJ)) {
        $sqlDetail = "SELECT tb_data.count, tb_data.id_responden, tb_data.id_atribut, tb_data.nilai FROM tb_data WHERE tb_data.count = '$row->count' AND tb_data.id_responden = '$row->id_responden'";
        $qryDetail = $pdo->Query($sqlDetail);
        while ($rows = $qryDetail->fetch(PDO::FETCH_OBJ)) {
            $getAtribut[$row->id_responden][$row->count][] = [
                'nilai' => $parameter[$rows->id_atribut][$rows->nilai]
            ];
        }

        $data[] = [
            'id_responden' => $row->id_responden,
            'count'        => $row->count,
            'jenis_pohon'  => $responden[$row->id_responden],
            'atribut'      => $getAtribut[$row->id_responden][$row->count]
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
            <table class="table table-bordered table-striped mb-none" id="datatable-default">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Jenis Pohon</th>
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
                            <td><?= $value['jenis_pohon'] ?></td>
                            <?php foreach ($value['atribut'] as $row) { ?>
                                <td><?= $row['nilai'] ?></td>
                            <?php } ?>
                            <td align="center">
                                <button id="upd" class="btn btn-primary btn-sm" data-id="<?= $value['id_responden'] ?>" data-count="<?= $value['count'] ?>"><i class="fa fa-edit"></i> Ubah</button>&nbsp;
                                <button id="del" class="btn btn-danger btn-sm" data-id="<?= $value['id_responden'] ?>" data-count="<?= $value['count'] ?>"><i class="fa fa-trash-o"></i> Hapus</button>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </section>
    <!-- end:: tabel -->
</section>