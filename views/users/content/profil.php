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
                                    <label for="ubahpassword">&nbsp;Ubah Password</label>
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
            </div>
        </div>
    </div>
</section>