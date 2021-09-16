<section role="main" class="content-body">
    <header class="page-header">
        <h2>Konsultasi</h2>
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
            <form action="konsultasi_hasil" id="form-add" method="post" class="form-horizontal">
                <div class="form-group">
                    <label class="col-sm-4 control-label">Lahan *</label>
                    <div class="col-sm-8">
                        <select class="form-control" name="inpidlahan" id="inpidlahan">
                            <option value="">- Pilih Lahan -</option>
                            <?php
                            $sql = "SELECT tb_lahan.id_lokasi, tb_lokasi.nama FROM tb_lahan LEFT JOIN tb_lokasi ON tb_lahan.id_lokasi = tb_lokasi.id_lokasi GROUP BY tb_lahan.id_lokasi ORDER BY tb_lahan.id_lokasi";
                            $qry = $pdo->Query($sql);
                            while ($row = $qry->fetch(PDO::FETCH_OBJ)) { ?>
                                <option value="<?= $row->id_lokasi ?>"><?= $row->nama ?></option>
                            <?php } ?>
                        </select>
                    </div>
                </div>
                <div class="text-center">
                    <button type="reset" class="btn btn-default"><i class="fa fa-refresh"></i> Reset</button>&nbsp;
                    <button type="submit" class="btn btn-primary" name="add" id="add"><i class="fa fa-gear"></i> Proses</button>&nbsp;
                </div>
            </form>
        </div>
    </section>
    <!-- end:: form -->
</section>