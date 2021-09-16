<div class="wrapper animsition" data-animsition-in-class="fade-in" data-animsition-in-duration="1000" data-animsition-out-class="fade-out" data-animsition-out-duration="1000">
    <div class="container">
        <nav class="navbar navbar-expand-lg navbar-light navbar-default navbar-fixed-top" role="navigation">
            <div class="container">
                <a class="navbar-brand page-scroll" href="#main">
                    Sistem Pendukung Keputusan
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mr-auto">
                    </ul>
                    <ul class="navbar-nav my-2 my-lg-0">
                        <li class="nav-item">
                            <a class="nav-link page-scroll" href="index">Beranda</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link page-scroll" href="tentang">Tentang</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link page-scroll" href="jenis_pohon">Jenis Pohon</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="login">Masuk</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </div>
    <div class="main" id="main">
        <!-- Main Section-->
        <div class="hero-section">
            <div class="container">
                <div class="hero-content app-hero-content text-center">
                    <div class="row justify-content-md-center">
                        <div class="col-md-10" style="margin-bottom: 250px;">
                            <h1 class="wow fadeInUp" data-wow-delay="0s">Sistem Pendukung Keputusan</h1>
                            <p class="wow fadeInUp" data-wow-delay="0.2s">
                                Jenis Tanaman
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="services-section text-center" id="services">
            <!-- Services section (small) with icons -->
            <div class="container">
                <div class="row justify-content-md-center">
                    <div class="col-md-8">
                        <div class="services-content">
                            <h1 class="wow fadeInUp" data-wow-delay="0s">Jenis Pohon</h1>
                        </div>
                    </div>
                    <div class="col-md-12 text-justify">
                        <div class="services">
                            <div class="row">
                                <div class="col-sm-12" data-wow-delay="0.2s">
                                    <table class="table table-bordered table-striped mb-none">
                                        <thead>
                                            <tr>
                                                <th>Nama</th>
                                                <th>Keterangan</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $query  = $pdo->GetAll('tb_responden', 'id_responden');
                                            $jumlah = $query->rowCount();
                                            $no = 1;
                                            if ($jumlah > 0) {
                                                while ($row = $query->fetch(PDO::FETCH_OBJ)) { ?>
                                                    <tr>
                                                        <td><?= $row->responden; ?></td>
                                                        <td><?= $row->keterangan; ?></td>
                                                    </tr>
                                                <?php } ?>
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer">
            <div class="container">
                <div class="col-md-12 text-center">
                    <ul class="footer-menu">
                        <li><a href="index">Beranda</a></li>
                        <li><a href="tentang">Tentang</a></li>
                        <li><a href="jenis_pohon">Jenis Pohon</a></li>
                        <li><a href="login">Masuk</a></li>
                    </ul>
                    <div class="footer-text">
                        <p>
                            Copyright &copy;
                            <script>
                                document.write(new Date().getFullYear());
                            </script>
                            <a href="https://alanlengkoan.netlify.app/" target="_blank"> AL</a> - Sistem Pendukung Keputusan Jenis Tanaman.
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <a id="back-top" class="back-to-top page-scroll" href="#main">
            <i class="ion-ios-arrow-thin-up"></i>
        </a>
    </div>
</div>