<?php
// ambil data bengkel
$qry_bengkel = $pdo->GetAll('tb_bengkel', 'id_bengkel');
$tujuan = [];
while ($row = $qry_bengkel->fetch(PDO::FETCH_OBJ)) {
    $id_bengkel = $row->id_bengkel;

    // ambil data evaluasi
    $qry_evaluasi  = $pdo->GetWhere('tb_evaluasi', 'awal', $id_bengkel);
    while ($value = $qry_evaluasi->fetch(PDO::FETCH_OBJ)) {
        $tujuan[$value->awal][$value->akhir] = $value->jarak;
    }
}

for ($r = 1; $r <= count($tujuan); $r++) {
    $lokasi[0][$r] = $_POST[$r];
    $tujuan_terdekat[$r] = $_POST[$r];
}

$get = array_merge($lokasi, $tujuan);

/*
keterangan
i = baris => $i
j = kolom => $j
*/
$h = [];
$e = [];
for ($i = 1; $i <= count($get); $i++) {
    for ($j = 1; $j <= count($get); $j++) {
        if ($i === $j) {
            $h[$i][$j] = 0;
            $e[$i][$j] = 0;
        } else {
            $h[$i][$j] = ($get[$i][$j] ?? INF);
            $e[$i][$j] = ($get[$i][$j] ?? INF);
        }
    }
}

$result = [];
for ($k = 1; $k <= count($h); $k++) {
    for ($i = 1; $i <= count($h); $i++) {
        for ($j = 1; $j <= count($h); $j++) {
            $h[$i][$j] = min($h[$i][$j], ($h[$i][$k] + $h[$k][$j]));
        }
    }
    $result[$k] = $h;
}
?>

<section class="latest-blog objects-car white-bg page page-section-ptb">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12">
                <div class="section-title">
                    <h2>Profil</h2>
                    <div class="separator"></div>
                </div>
            </div>
        </div>
        <div class="blog-1">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <!-- begin:: tabel -->
                    <section class="panel">
                        <header class="panel-heading">
                            <h2 class="panel-title">X0</h2>
                        </header>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-condensed mb-none">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <?php for ($a = 1; $a <= count($get); $a++) { ?>
                                                <th><?= $a ?></th>
                                            <?php } ?>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php for ($a = 1; $a <= count($get); $a++) { ?>
                                            <tr>
                                                <td><?= $a ?></td>
                                                <?php for ($b = 1; $b <= count($get); $b++) { ?>
                                                    <td><?= (is_infinite($e[$a][$b]) ? '&infin;' : $e[$a][$b]) ?></td>
                                                <?php } ?>
                                            </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </section>


                    <?php for ($g = 1; $g <= count($result); $g++) { ?>
                        <section class="panel">
                            <header class="panel-heading">
                                <h2 class="panel-title">X<?= $g ?></h2>
                            </header>
                            <div class="panel-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered table-striped table-condensed mb-none">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <?php for ($a = 1; $a <= count($get); $a++) { ?>
                                                    <th><?= $a ?></th>
                                                <?php } ?>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php for ($a = 1; $a <= count($get); $a++) { ?>
                                                <tr>
                                                    <td><?= $a ?></td>
                                                    <?php for ($b = 1; $b <= count($get); $b++) { ?>
                                                        <td><?= (is_infinite($result[$g][$a][$b]) ? '&infin;' : $result[$g][$a][$b]) ?></td>
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
                            <h2 class="panel-title">Hasil Akhir</h2>
                        </header>
                        <div class="panel-body">
                            <?php
                            for ($c = 1; $c <= count($get); $c++) {
                                foreach ($result[count($get) - 1] as $key => $value) {
                                    $last[$c][$key] = $result[count($get) - 1][$c][$key];
                                }
                            }
                            ?>
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>Lokasi</th>
                                        <th>Bobot Awal</th>
                                        <th>Bobot Akhir</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php for ($i = 1; $i <= count($get); $i++) { ?>
                                        <?php
                                        foreach ($result[count($get) - 1] as $key => $value) {
                                        ?>
                                            <tr>
                                                <td><?= $i ?>, <?= $key ?></td>
                                                <td><?= $get[$i][$key] ?? 0 ?> Km</td>
                                                <td><?= $last[$i][$key] ?> Km</td>
                                            </tr>
                                        <?php } ?>
                                    <?php } ?>
                                </tbody>
                            </table>

                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>Lokasi</th>
                                        <th>Jarak (Km)</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    for ($l = 1; $l <= count($last); $l++) {
                                        $keys = array_keys(array_filter($last[$l]), min(array_filter($last[$l])));
                                        $result_show[$l][$keys[0]] = min(array_filter($last[$l]));
                                    }

                                    for ($i = 1; $i <= count($result_show); $i++) { ?>
                                        <?php
                                        foreach ($result_show[$i] as $key => $value) {
                                        ?>
                                            <tr>
                                                <td><?= $i ?>, <?= $key ?></td>
                                                <td><?= $value ?></td>
                                            </tr>
                                        <?php } ?>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </section>
                    <!-- end:: tabel -->

                    <section class="panel">
                        <header class="panel-heading">
                            <h2 class="panel-title">Map</h2>
                            <?php
                            $id    = array_keys($tujuan_terdekat, min($tujuan_terdekat));
                            $query = $pdo->GetWhere('tb_bengkel', 'id_bengkel', $id[0]);
                            $row   = $query->fetch(PDO::FETCH_OBJ);

                            $field = [
                                "id_bengkel",
                                "id_users",
                                "no_polisi",
                                "merk",
                                "tahun_buat",
                                "tgl_pajak",
                                "tgl_stnk",
                                "keluhan",
                                "latitude",
                                "longitude"
                            ];

                            $value = [
                                $id[0],
                                $rowLog->id_users,
                                $_POST['inpnopolisi'],
                                $_POST['inpmerk'],
                                $_POST['inptahunbuat'],
                                $_POST['inptglpajak'],
                                $_POST['inptglstnk'],
                                $_POST['inpkeluhan'],
                                $_POST['lat'],
                                $_POST['lng'],
                            ];

                            $insert = $pdo->Insert("tb_pelayanan", $field, $value);
                            ?>
                        </header>
                        <div class="panel-body">
                            <div id="map" style="height: 400px;"></div>
                        </div>
                    </section>
                </div>
            </div>
        </div>
    </div>
</section>