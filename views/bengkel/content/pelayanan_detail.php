<?php
$id  = $_GET['id_pelayanan'];
$sql = "SELECT p.id_pelayanan, p.no_polisi, p.merk, p.tahun_buat, p.keluhan, p.latitude AS users_latitude, p.longitude AS users_longitude, b.nama, b.latitude AS bengkel_latitude, b.longitude AS bengkel_longitude FROM tb_pelayanan AS p LEFT JOIN tb_bengkel AS b ON p.id_bengkel = b.id_bengkel WHERE p.id_pelayanan = '$id'";
$qry = $pdo->Query($sql);
$row = $qry->fetch(PDO::FETCH_OBJ);
?>

<section role="main" class="content-body">
    <header class="page-header">
        <h2>Algoritma</h2>
    </header>

    <!-- begin:: form -->
    <section class="panel">
        <header class="panel-heading">
            <h2 class="panel-title">Form</h2>
        </header>
        <div class="panel-body">
            <form action="algoritma_hasil" method="post" class="form-horizontal">
                <input type="hidden" name="latitude_users" id="latitude_users" value="<?= $row->users_latitude ?>" />
                <input type="hidden" name="longitude_users" id="longitude_users" value="<?= $row->users_longitude ?>" />
                <input type="hidden" name="latitude_bengkel" id="latitude_bengkel" value="<?= $row->bengkel_latitude ?>" />
                <input type="hidden" name="longitude_bengkel" id="longitude_bengkel" value="<?= $row->bengkel_longitude ?>" />

                <div class="form-group">
                    <label class="col-sm-4 control-label">No. Polisi&nbsp;*</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" value="<?= $row->no_polisi ?>" readonly="readonly" />
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-4 control-label">Merk&nbsp;*</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" value="<?= $row->merk ?>" readonly="readonly" />
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-4 control-label">Tahun Buat&nbsp;*</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" value="<?= $row->tahun_buat ?>" readonly="readonly" />
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-4 control-label">Keluhan&nbsp;*</label>
                    <div class="col-sm-8">
                        <textarea class="form-control"><?= $row->keluhan ?></textarea>
                    </div>
                </div>
            </form>
        </div>
    </section>
    <!-- end:: form -->
    <!-- begin:: map -->
    <section class="panel">
        <header class="panel-heading">
            <h2 class="panel-title">Map</h2>
        </header>
        <div class="panel-body">
            <div id="map" style="height: 400px;"></div>
        </div>
    </section>
    <!-- end:: map -->
</section>