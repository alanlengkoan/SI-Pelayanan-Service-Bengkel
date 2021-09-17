<section role="main" class="content-body">
    <header class="page-header">
        <h2>Evaluasi</h2>
    </header>

    <!-- begin:: form -->
    <section class="panel">
        <header class="panel-heading">
            <h2 class="panel-title">Form</h2>
        </header>
        <div class="panel-body">
            <div class="row">
                <div class="col-lg-6">
                    <form action="aksi/?aksi=evaluasi_save" id="form-add-upd" class="form-horizontal" method="post">
                        <!-- begin:: id -->
                        <input type="hidden" name="inpidevaluasi" id="inpidevaluasi">
                        <!-- end:: id -->

                        <div class="form-group">
                            <label class="col-sm-4 control-label">Awal&nbsp;*</label>
                            <div class="col-sm-8">
                                <select class="form-control" name="inpawal" id="inpawal">
                                    <option value="">- Pilih -</option>
                                    <?php
                                    $query1 = $pdo->GetAll('tb_bengkel', 'id_bengkel');
                                    while ($row = $query1->fetch(PDO::FETCH_OBJ)) { ?>
                                        <option value="<?= $row->id_bengkel ?>" data-lat="<?= $row->latitude ?>" data-long="<?= $row->longitude ?>"><?= $row->nama ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-4 control-label">Akhir&nbsp;*</label>
                            <div class="col-sm-8">
                                <select class="form-control" name="inpakhir" id="inpakhir">
                                    <option value="">- Pilih -</option>
                                    <?php
                                    $query2 = $pdo->GetAll('tb_bengkel', 'id_bengkel');
                                    while ($row = $query2->fetch(PDO::FETCH_OBJ)) { ?>
                                        <option value="<?= $row->id_bengkel ?>" data-lat="<?= $row->latitude ?>" data-long="<?= $row->longitude ?>"><?= $row->nama ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-4 control-label">Jarak&nbsp;*</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="inpjarak" id="inpjarak" placeholder="Masukkan jarak" readonly="readonly" />
                            </div>
                        </div>
                        <div class="text-center">
                            <button type="reset" class="btn btn-default"><i class="fa fa-refresh"></i> Reset</button>&nbsp;
                            <button type="submit" class="btn btn-primary" name="add" id="add"><i class="fa fa-plus"></i> Add</button>
                        </div>
                    </form>
                </div>
                <div class="col-lg-6">
                    <div id="map" style="height: 400px;"></div>
                </div>
            </div>
        </div>
    </section>
    <!-- end:: form -->

    <!-- begin:: tabel -->
    <section class="panel">
        <header class="panel-heading">
            <h2 class="panel-title">Tabel</h2>
        </header>
        <div class="panel-body">
            <table class="table table-bordered table-striped mb-none" id="datatable-default">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Awal</th>
                        <th>Akhir</th>
                        <th>Jarak</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $query  = $pdo->GetAll('tb_evaluasi', 'id_evaluasi');
                    $jumlah = $query->rowCount();
                    $no = 1;
                    if ($jumlah > 0) {
                        while ($row = $query->fetch(PDO::FETCH_OBJ)) { ?>
                            <tr>
                                <td><?= $no++; ?></td>
                                <td><?= $row->awal; ?></td>
                                <td><?= $row->akhir; ?></td>
                                <td><?= $row->jarak ?></td>
                                <td align="center">
                                    <button class="btn btn-primary btn-sm" id="upd" data-id="<?= $row->id_evaluasi ?>"><i class="fa fa-edit"></i></button>&nbsp;
                                    <button class="btn btn-danger btn-sm" id="del" data-id="<?= $row->id_evaluasi ?>"><i class="fa fa-trash-o"></i></button>
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