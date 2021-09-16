<?php
ob_start();
// untuk router
include_once '../../../configs/library/my_root.php';
// autoload class
spl_autoload_register('autoLoadClass');
// untuk memanggil class sql
$pdo = new sql;
// untuk class my_login
$mylog = new my_login;
// untuk class my_function
$myfun = new my_function;

// untuk mengambil data atribut
$qryAtribut = $pdo->GetAll('tb_atribut', 'id_atribut');
$atribut = [];
while ($row = $qryAtribut->fetch(PDO::FETCH_OBJ)) {
    $atribut[$row->id_atribut] = $row->atribut;
}

// untuk mengambil data parameter
$sqlParameter = "SELECT * FROM tb_parameter ORDER BY id_atribut, id_parameter";
$qryParameter = $pdo->Query($sqlParameter);
$parameter = [];
while ($row = $qryParameter->fetch(PDO::FETCH_OBJ)) {
    $parameter[$row->id_atribut][$row->nilai] = $row->parameter;
}

// untuk mengambil data responden / jenis pohon
$qryResponden = $pdo->GetAll('tb_responden', 'id_responden');
$responden = [];
while ($row = $qryResponden->fetch(PDO::FETCH_OBJ)) {
    $responden[$row->id_responden] = $row->responden;
}

// ambil data laporan
$id_laporan   = $_GET['id_laporan'];
$qryLaporan   = $pdo->GetWhere('tb_laporan', 'id_laporan', $id_laporan);
$rowLaporan   = $qryLaporan->fetch(PDO::FETCH_OBJ);
$id_lokasi    = $rowLaporan->id_lokasi;
$id_responden = $rowLaporan->id_responden;

// ambil data lahan
$qryLahan = $pdo->GetWhere('tb_lahan', 'id_lokasi', $id_lokasi);

while ($rowLahan = $qryLahan->fetch(PDO::FETCH_OBJ)) {
    $konsultasi[$rowLahan->id_atribut] = $rowLahan->nilai;
}
?>

<!-- CSS -->
<style media="screen">
    .judul {
        padding: 4mm;
        text-align: center;
    }

    .nama {
        text-decoration: underline;
        font-weight: bold;
    }

    h1,
    h2,
    h3,
    h4,
    h5,
    h6 {
        margin-top: 0;
        margin-bottom: 5px;
    }

    h3 {
        font-family: times;
    }

    p {
        margin: 0;
    }
</style>
<!-- CSS -->

<div class="judul">
    <table align="center">
        <tr>
            <td width="600" align="center">
                <h3>SISTEM PENDUKUNG KEPUTUSAN JENIS TANAMAN</h3>
                <h3>BERDASARKAN KONDISI LAHAN</h3>
            </td>
        </tr>
    </table>
    <hr>

    <br /><br />

    <h3>Konsultasi :</h3>

    <br /><br />

    <table border="1" style="width: 100%;" align="center">
        <?php foreach ($atribut as $keyAtribut => $row) { ?>
            <tr>
                <th><?= $row ?></th>
                <td>:</td>
                <td><?= $parameter[$keyAtribut][$konsultasi[$keyAtribut]] ?></td>
            </tr>
        <?php } ?>
    </table>

    <br /><br />

    <h3>Hasil :</h3>

    <br /><br />

    <p>
        Berdasarkan hasil metode dapat disimpulkan bahwa jenis pohon yang cocok berdasarkan kondisi lahan dari konsultasi adalah : <b><?= $responden[$id_responden] ?></b>
    </p>

    <br /><br />
    <br /><br />

    <table>
        <tr>
            <td width="500"></td>
            <td>
                <p>DITETAPKAN DI&nbsp;&nbsp;&nbsp;: MAKASSAR</p>
                <br />
                <br />
                <br />
                <br />
                <p class="nama">Nama Penyuluh</p>
                <p>Penyuluh</p>
            </td>
        </tr>
    </table>
</div>

<?php
// proses untuk menampilkan file pdf
$content = ob_get_clean();
include_once "../../../vendors/html2pdf/html2pdf.class.php";
$html2pdf = new HTML2PDF('P', 'A4', 'en', 'utf-8');
$html2pdf->WriteHTML($content);
$html2pdf->Output('Laporan Hasil Diagnosa.pdf');
?>