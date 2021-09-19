<?php
// ambil data bengkel
$qry_bengkel = $pdo->GetAll('tb_bengkel', 'id_bengkel');
$get = [];
while ($row = $qry_bengkel->fetch(PDO::FETCH_OBJ)) {
    $id_bengkel = $row->id_bengkel;

    // ambil data evaluasi
    $qry_evaluasi  = $pdo->GetWhere('tb_evaluasi', 'awal', $id_bengkel);
    while ($value = $qry_evaluasi->fetch(PDO::FETCH_OBJ)) {
        $get[$value->awal][$value->akhir] = $value->jarak;
    }
}

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

<section role="main" class="content-body">
    <header class="page-header">
        <h2>Algoritma</h2>
    </header>

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
            
        </div>
    </section>
    <!-- end:: tabel -->
</section>