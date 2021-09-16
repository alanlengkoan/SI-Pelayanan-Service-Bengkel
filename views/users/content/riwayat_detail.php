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
        $getAtribut[$row->id_responden][$row->count][$rows->id_atribut] = [
            'label' => $parameter[$rows->id_atribut][$rows->nilai],
            'nilai' => $rows->nilai,
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

<section role="main" class="content-body">
    <header class="page-header">
        <h2>Algoritma</h2>
    </header>

    <!-- begin:: tabel -->
    <section class="panel">
        <header class="panel-heading">
            <div class="panel-actions">
                <a href="#" class="fa fa-caret-down"></a>
                <a href="#" class="fa fa-times"></a>
            </div>

            <h2 class="panel-title">Tabel : Data Training</h2>
        </header>
        <div class="panel-body">
            <div class="table-responsive">
                <table class="table table-bordered table-striped table-condensed mb-none">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <?php foreach ($atribut as $key => $row) { ?>
                                <th><?= $row ?></th>
                            <?php } ?>
                            <th>Jenis Pohon (Kelas)</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($data as $key => $value) { ?>
                            <tr>
                                <td><?= $no++ ?></td>
                                <?php foreach ($value['atribut'] as $row) { ?>
                                    <td><?= $row['label'] ?></td>
                                <?php } ?>
                                <td><?= $value['jenis_pohon'] ?></td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </section>
    <?php
    // ambil kelas
    foreach ($data as $keyData => $valueData) {
        // untuk kelas
        foreach ($responden as $keyResponden => $valueResponden) {
            if ($valueData['id_responden'] === $keyResponden) {
                $kelas[$valueResponden][] = $valueData['jenis_pohon'];
            }
        }
    }

    // untuk atribut
    foreach ($data as $keyData => $valueData) {
        foreach ($kelas as $keyKelas => $valueKelas) {
            for ($i = 1; $i <= count($atribut); $i++) {
                if ($valueData['jenis_pohon'] === $keyKelas && $valueData['atribut'][$i]['label'] === $parameter[$i][$valueData['atribut'][$i]['nilai']]) {
                    $freg[$i][$keyKelas][$parameter[$i][$valueData['atribut'][$i]['nilai']]][] = 'test';
                    $likehood[$i][$parameter[$i][$valueData['atribut'][$i]['nilai']]][] = 'test';
                }
            }
        }
    }
    ?>

    <section class="panel">
        <header class="panel-heading">
            <div class="panel-actions">
                <a href="#" class="fa fa-caret-down"></a>
                <a href="#" class="fa fa-times"></a>
            </div>

            <h2 class="panel-title">Tabel : Jumlah Data Kelas</h2>
        </header>
        <div class="panel-body">
            <div class="table-responsive">
                <table class="table table-bordered table-striped table-condensed mb-none">
                    <thead>
                        <tr>
                            <th>Jenis Pohon (Kelas)</th>
                            <th>Jumlah</th>
                            <th>Total Data</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($kelas as $keyKelas => $valueKelas) { ?>
                            <tr>
                                <td><?= $keyKelas ?></td>
                                <td><?= count($valueKelas) ?></td>
                                <td><?= count($data) ?></td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </section>

    <?php for ($i = 1; $i <= count($atribut); $i++) { ?>
        <section class="panel">
            <header class="panel-heading">
                <div class="panel-actions">
                    <a href="#" class="fa fa-caret-down"></a>
                    <a href="#" class="fa fa-times"></a>
                </div>

                <h2 class="panel-title">Tabel : Jumlah Data Atribut <?= $atribut[$i] ?></h2>
            </header>
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped table-condensed mb-none">
                        <thead>
                            <tr>
                                <th>Jenis Pohon (Kelas)</th>
                                <?php foreach ($parameter[$i] as $nilai => $param) { ?>
                                    <th><?= $param ?></th>
                                <?php } ?>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($kelas as $keyKelas => $valueKelas) { ?>
                                <tr>
                                    <td><?= $keyKelas ?></td>
                                    <?php foreach ($parameter[$i] as $nilai => $param) { ?>
                                        <td><?= (empty($freg[$i][$keyKelas][$param]) ? 0 : count($freg[$i][$keyKelas][$param])) ?></td>
                                    <?php } ?>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </section>
    <?php } ?>

    <section class="panel">
        <header class="panel-heading">
            <div class="panel-actions">
                <a href="#" class="fa fa-caret-down"></a>
                <a href="#" class="fa fa-times"></a>
            </div>

            <h2 class="panel-title">Tabel : Probabilitas Kelas</h2>
        </header>
        <div class="panel-body">
            <div class="table-responsive">
                <table class="table table-bordered table-striped table-condensed mb-none">
                    <thead>
                        <tr>
                            <th>Jenis Pohon</th>
                            <th>Hasil</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($kelas as $keyKelas => $valueKelas) { ?>
                            <tr>
                                <td><?= $keyKelas ?></td>
                                <td><?= (count($valueKelas) / count($data)) ?></td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </section>

    <?php for ($i = 1; $i <= count($atribut); $i++) { ?>
        <section class="panel">
            <header class="panel-heading">
                <div class="panel-actions">
                    <a href="#" class="fa fa-caret-down"></a>
                    <a href="#" class="fa fa-times"></a>
                </div>

                <h2 class="panel-title">Tabel : Probabilitas Atribut <?= $atribut[$i] ?></h2>
            </header>
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped table-condensed mb-none">
                        <thead>
                            <tr>
                                <th>Jenis Pohon (Kelas)</th>
                                <?php foreach ($parameter[$i] as $nilai => $param) { ?>
                                    <th><?= $param ?></th>
                                <?php } ?>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($kelas as $keyKelas => $valueKelas) { ?>
                                <tr>
                                    <td><?= $keyKelas ?></td>
                                    <?php foreach ($parameter[$i] as $nilai => $param) {
                                        $hasil_sebelum   = (empty($freg[$i][$keyKelas][$param]) ? 0 : count($freg[$i][$keyKelas][$param]));
                                        $parameter_hasil = (empty($likehood[$i][$param]) ? 0 : count($likehood[$i][$param]));
                                        $hasil           = ($hasil_sebelum !== 0 ? ($hasil_sebelum / $parameter_hasil) : 0);
                                        // untuk ambil hasil akhir
                                        $last[$keyKelas][$i][$param] = $hasil;
                                    ?>
                                        <td><?= $hasil ?></td>
                                    <?php } ?>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </section>
    <?php } ?>

    <?php
    foreach ($data as $key => $value) {
        foreach ($kelas as $keyKelas => $valueKelas) {
            foreach ($value['atribut'] as $keyAtribut => $row) {
                $countDetail[$value['id_responden']][$value['count']][$keyKelas][] = $last[$keyKelas][$keyAtribut][$row['label']];
            }
        }

        $result[] = [
            'id_responden' => $value['id_responden'],
            'count'        => $countDetail[$value['id_responden']][$value['count']]
        ];
    }

    // ambil data laporan
    $id_laporan = $_GET['id_laporan'];
    $qryLaporan = $pdo->GetWhere('tb_laporan', 'id_laporan', $id_laporan);
    $rowLaporan = $qryLaporan->fetch(PDO::FETCH_OBJ);
    $id_lokasi  = $rowLaporan->id_lokasi;

    // ambil data lahan
    $qryLahan = $pdo->GetWhere('tb_lahan', 'id_lokasi', $id_lokasi);

    while ($rowLahan = $qryLahan->fetch(PDO::FETCH_OBJ)) {
        $konsultasi[$rowLahan->id_atribut] = $rowLahan->nilai;
    }

    foreach ($kelas as $keyKelas => $valueKelas) {
        foreach ($atribut as $keyAtribut => $valueAtribut) {
            $konsultasiResult[$keyKelas][$keyAtribut] = $last[$keyKelas][$keyAtribut][$parameter[$keyAtribut][$konsultasi[$keyAtribut]]];
        }
    }
    ?>

    <section class="panel">
        <header class="panel-heading">
            <div class="panel-actions">
                <a href="#" class="fa fa-caret-down"></a>
                <a href="#" class="fa fa-times"></a>
            </div>

            <h2 class="panel-title">Tabel : Konsultasi</h2>
        </header>
        <div class="panel-body">
            <div class="table-responsive">
                <table class="table table-bordered table-striped table-condensed mb-none">
                    <thead>
                        <tr>
                            <?php foreach ($atribut as $key => $row) { ?>
                                <th><?= $row ?></th>
                            <?php } ?>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($atribut as $key => $row) { ?>
                            <td><?= $parameter[$key][$konsultasi[$key]] ?></td>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </section>

    <section class="panel">
        <header class="panel-heading">
            <div class="panel-actions">
                <a href="#" class="fa fa-caret-down"></a>
                <a href="#" class="fa fa-times"></a>
            </div>

            <h2 class="panel-title">Tabel : Hasil Konsultasi</h2>
        </header>
        <div class="panel-body">
            <div class="table-responsive">
                <table class="table table-bordered table-striped table-condensed mb-none">
                    <thead>
                        <tr>
                            <?php foreach ($atribut as $key => $row) { ?>
                                <th><?= $row ?></th>
                            <?php } ?>
                            <?php foreach ($kelas as $keyKelas => $valueKelas) { ?>
                                <th><?= $keyKelas ?></th>
                            <?php } ?>
                            <th>Prediksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($atribut as $key => $row) { ?>
                            <td><?= $parameter[$key][$konsultasi[$key]] ?></td>
                        <?php } ?>
                        <?php foreach ($kelas as $keyKelas => $valueKelas) {
                            $hitung = array_product($konsultasiResult[$keyKelas]) * (count($valueKelas) / count($data));
                            $rank[$keyKelas] = $hitung;
                        ?>
                            <td><?= $hitung ?></td>
                        <?php } ?>
                        <td>
                            <?php
                            $maxVal = max($rank);
                            $maxValKeys = array_keys($rank, $maxVal);
                            echo '<span style="color: yellow; background-color: green">' . $maxValKeys[0] . '</span>'
                            ?>
                        </td>
                    </tbody>
                </table>
            </div>
        </div>
    </section>
    <!-- end:: tabel -->
</section>