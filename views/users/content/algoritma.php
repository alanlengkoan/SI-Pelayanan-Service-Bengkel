<section class="latest-blog objects-car white-bg page page-section-ptb">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12">
                <div class="section-title">
                    <h2>Cari Bengkel</h2>
                    <div class="separator"></div>
                </div>
            </div>
        </div>
        <div class="blog-1">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <!-- begin:: form -->
                    <section class="panel">
                        <header class="panel-heading">
                            <h2 class="panel-title">Form</h2>
                        </header>
                        <div class="panel-body">
                            <form action="algoritma_hasil" method="post" class="form-horizontal">
                                <input type="hidden" name="lat" id="lat">
                                <input type="hidden" name="lng" id="lng">
                                <div id="tujuan"></div>

                                <div class="form-group">
                                    <label class="col-sm-4 control-label">No. Polisi&nbsp;*</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" name="inpnopolisi" id="inpnopolisi" placeholder="Masukkan nomor polisi" required="required" />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-4 control-label">Merk&nbsp;*</label>
                                    <div class="col-sm-8">
                                        <select class="form-control" name="inpmerk" id="inpmerk">
                                            <option value="">Pilih Merek</option>
                                            <option value="Honda">Honda</option>
                                            <option value="Yamaha">Yamaha</option>
                                            <option value="Suzuki">Suzuki</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-4 control-label">Tahun Buat&nbsp;*</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" name="inptahunbuat" id="inptahunbuat" placeholder="Masukkan tahun buat" required="required" />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-4 control-label">Keluhan&nbsp;*</label>
                                    <div class="col-sm-8">
                                        <textarea class="form-control" name="inpkeluhan" id="inpkeluhan" placeholder="Masukkan keluhan"></textarea>
                                    </div>
                                </div>
                                <div class="text-center">
                                    <button type="submit" class="btn btn-primary btn-sm"><i class="fa fa-search"></i>&nbsp;Cari Bengkel</button>
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
                            <h3>Keterangan</h3>
                            <i class="fa fa-map-pin"></i>&nbsp;Lokasi Bengkel
                            <i class="fa fa-user"></i>&nbsp;Lokasi User
                            <div id="map" style="height: 400px;"></div>
                        </div>
                    </section>
                    <!-- end:: map -->
                </div>
            </div>
        </div>
    </div>
</section>