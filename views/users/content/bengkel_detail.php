<?php
$id    = $_GET['id_bengkel'];
$query = $pdo->GetWhere('tb_bengkel', 'id_bengkel', $id);
$row   = $query->fetch(PDO::FETCH_OBJ);
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
            <form class="form-horizontal">
                <div class="form-group">
                    <label class="col-sm-4 control-label">Nama</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" name="nama" id="nama" value="<?= $row->nama ?>" readonly="readonly" />
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-4 control-label">Alamat</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" name="alamat" id="alamat" value="<?= $row->alamat ?>" readonly="readonly" />
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-4 control-label">Gambar</label>
                    <div class="col-sm-8">
                        <img src="../../assets/uploads/pohon/<?= $row->gambar ?>" width="100" heigth="100" />
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-4 control-label">Latitude</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" name="latitude" id="latitude" value="<?= $row->latitude ?>" readonly="readonly" />
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-4 control-label">Longitude</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" name="longitude" id="longitude" value="<?= $row->longitude ?>" readonly="readonly" />
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