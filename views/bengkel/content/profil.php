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

            <h2 class="panel-title">Profil</h2>
        </header>
        <div class="panel-body">
            <form action="aksi/?aksi=profil_upd" id="form-add" class="form-horizontal">
                <!-- begin:: id -->
                <input type="hidden" name="inpidusers" id="inpidusers" value="<?= $rowLog->id_users ?>">
                <!-- end:: id -->
                <div class="form-group">
                    <label class="col-sm-4 control-label">Nama *</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" name="inpnama" id="inpnama" value="<?= $rowLog->nama ?>" />
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-4 control-label">E-Mail *</label>
                    <div class="col-sm-8">
                        <input type="email" class="form-control" name="inpemail" id="inpemail" value="<?= $rowLog->email ?>" />
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-4 control-label">Username *</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" name="inpusername" id="inpusername" value="<?= $rowLog->username ?>" />
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-4 control-label"></label>
                    <div class="col-sm-8">
                        <div class="checkbox-custom checkbox-default">
                            <input type="checkbox" name="ubahpassword" id="ubahpassword" />
                            <label for="ubahpassword">Ubah Password</label>
                        </div>
                    </div>
                </div>
                <div id="addpassword"></div>
                <div class="text-center">
                    <button type="reset" class="btn btn-default"><i class="fa fa-refresh"></i> Reset</button>&nbsp;
                    <button type="submit" class="btn btn-primary" name="add" id="add"><i class="fa fa-plus"></i> Add</button>
                </div>
            </form>
        </div>
    </section>
    <!-- end:: form -->
</section>