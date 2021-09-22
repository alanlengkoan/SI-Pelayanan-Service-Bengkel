<section role="main" class="content-body">
    <header class="page-header">
        <h2>Algoritma</h2>
    </header>

    <!-- begin:: tabel -->
    <section class="panel">
        <header class="panel-heading">
            <h2 class="panel-title">Map</h2>
        </header>
        <div class="panel-body">

            <form action="algoritma_hasil" method="post">
                <input type="hidden" name="lat" id="lat">
                <input type="hidden" name="lng" id="lng">
                <div id="tujuan"></div>
                <button type="submit" class="btn btn-primary btn-sm"><i class="fa fa-search"></i>&nbsp;Cari Bengkel</button>
            </form>

            <h3>Keterangan</h3>
            <span class="map-icon map-icon-map-pin"></span>Lokasi Bengkel
            <span class="map-icon map-icon-male"></span>Lokasi User
            <div id="map" style="height: 400px;"></div>
        </div>
    </section>
    <!-- end:: tabel -->
</section>