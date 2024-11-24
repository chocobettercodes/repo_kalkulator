<?php
/* 
 PERHITUNGAN MANUAL UMUR DENGAN FORMAT 
 X TAHUN X BULAN X MINGGU X HARI 
 ATAU X BULAN
 ATAU X MINGGU X HARI 
 ATAU X HARI 
 ATAU X JAM 
 ATAU X MENIT 
 ATAU X DETIK

 CONTOH : TGL LAHIR 9 JULI 2000 - 24 NOVEMBER 2024 

1. HITUNG X TAHUN X BULAN X MINGGU X HARI 
   - HITUNG X TAHUN X BULAN X MINGGU X HARI
     > TAHUN : 2024 - 2000 = 24 TAHUN 
     > BULAN : JULI 2024 - NOVEMBER 2024 = 4 BULAN 15 HARI 
     > MINGGU : 15 HARI = 2 MINGGU 1 HARI ( 1 MINGGU 14 HARI)
     HASILNYA : 24 TAHUN 4 BULAN 2 MINGGU 1 HARI
2. HITUNG X BULAN
   > 1 TAHUN : 12 BULAN MAKA 24 * 12 BULAN = 288 BULAN
   > SISA BULAN DARI BULAN JULI 2024 - BULAN NOVEMBER 2024 = 4 BULAN 
   > 288 BULAN + 4 BULAN = 293 BULAN -> harusnya 292 namun menerapkan yang namanya pembulatan wajar hari ke-15 
3. HITUNG X MINGGU X HARI 
   > 1 tahun = 52 minggu + 1 hari 
   > 24 tahun = 24 × 52 minggu + (24 ÷ 4) hari (karena 6 tahun adalah tahun kabisat): 
     > 24 × 52 = 1248 minggu.
     > 6 hari ekstra (untuk tahun kabisat).
   > Dari 9 Juli hingga 24 November 2024, tambahkan:
     > 4 bulan = 4 × 30 = 120 hari ≈ 17 minggu dan 1 hari.
   Total: 1248 + 17 = 1272 minggu 1 hari.
4. HITUNG X HARI 
   > 24 tahun = 24 × 365 = 8760 hari.
   > Tambahkan hari dari tahun kabisat: 24 ÷ 4 = 6 hari (untuk tahun kabisat).
   > Dari 9 Juli hingga 24 November 2024: 4 × 30 + 15 = 135 hari.
    Total hari: 8760 + 6 + 135 = 8904 hari.
5. HITUNG X JAM
   > 1 hari = 24 jam.
   > 8904 hari × 24 jam = 213.696 jam.
6. HITUNG X MENIT 
   > 1 jam = 60 menit.
   > 213.696 jam × 60 menit = 12.821.760 menit.
7. HITUNG X DETIK 
   > 1 menit = 60 detik.
   > 12.821.760 menit × 60 detik = 769.305.600 detik.
*/

$pesan_peringatan = '';
$tahun = "0";
$bulan = "0";
$hari = "0";
$mingguan = "0";
$sisahari = "0";
$totalbulan = "0";
$totalminggu = "0";
$totalhari = "0";
$totaljam = "0";
$totalmenit = "0";
$totaldetik = "0";
$jam = "0";
$menit = "0";
$detik = "0";

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    if (empty($tglsekarang) || empty($tgllahir)) {
        $pesan_peringatan = "Tanggal sekarang dan tanggal lahir harus diisi.";
    }
            // tampung inputan user 
    $tglsekarang = $_POST['tglsekarang'];
    $tgllahir = $_POST['tgllahir'];

    $get_tgllahir = new DateTime($tgllahir);
    $get_tglsekarang = new DateTime($tglsekarang);

    /* Hitung umur dalam tahun bulan minggu hari */ 

        // Hitung umur dalam tahun dan bulan
        $selisih = $get_tgllahir->diff($get_tglsekarang);
        // menghitung selisih tahun (tahun sekarang - tahun lahir)
        $tahun = $selisih->y;
        // menghitung selisih bulan
        $bulan = $selisih->m;
        // menghitung sisa hari
        $hari = $selisih->d;
        // total minggu dari semua hari
        $mingguan = floor($hari / 7);
        // sisa hari setelah dibagi 7
        $sisahari = $hari % 7;

    /* hitung umur dalam bulan dan hari */ 
    $totalbulan = ($tahun * 12) + $bulan;

    if($hari >= 15){
        $totalbulan++;
    }

    // hitung umur dalam minggu dan hari 
    $totalhari = $selisih->days;
    $totalminggu = floor($totalhari/7);
    $totaljam = $totalhari * 24;
    $totalmenit = $totalhari * 24 * 60;
    $totaldetik = $totalhari * 24 * 60 * 60;
    $jam = number_format($totaljam, 0, ',', '.');
    $menit = number_format($totalmenit, 0, ',', '.');
    $detik = number_format($totaldetik, 0, ',', '.');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css"
        integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <title>Repo Kalkulator

    </title>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup"
            aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-center" id="navbarNavAltMarkup">
            <div class="navbar-nav">
                <span class="navbar-brand mb-0 h1">Repo Kalkulator</span>
                <a class="nav-link active" href="calculator.php">Home</a>
                <a class="nav-link" href="time_date.php">Time & Date <span class="sr-only">(current)</span></a>
            </div>
        </div>
    </nav>

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <br>
                <h1>
                    <center>Kalkulator Umur</center>
                </h1>
                <center>
                    <p class="text-muted mb-0" style="white-space: nowrap;">Time & Date</p>
                </center>
                <hr>
            </div>
            <div class="col-md-4 m-2">
                <div class="card" style="width: 18rem;">
                    <div class="card-header">
                        Kalkulator Umur
                    </div>
                    <div class="card-body">
                        <form action="" method="post">
                            <label for="tgllahir">Tanggal Lahir</label>
                            <input type="date" class="form-control" id="tgllahir" name="tgllahir"><br>
                            <label for="tglsekarang">Usia Pada Tanggal</label>
                            <input type="date" class="form-control" id="tglsekarang" name="tglsekarang"><br>
                            <button type="submit" class="btn btn-primary">Yuk Cobain</button>
                        </form>
                    </div>
                    <div class="card-footer text-muted">
                        <!-- <a href="#" class="btn btn-primary">Yuk Cobain</a> -->
                    </div>
                </div>
            </div>
            <div class="col-md-7">
                <div class="card">
                    <div class="card-header">
                        Umur
                    </div>
                    <div class="card-body">
                        <?php echo $tahun ? "$tahun tahun" : "" ?>
                        <?php echo $bulan ? "$bulan bulan" : "" ?>
                        <?php echo $mingguan ? "$mingguan minggu" : "" ?>
                        <?php echo $sisahari ? "$sisahari hari <br>" : "" ?>
                        <?php echo $totalbulan ? "atau $totalbulan bulan <br>" : "" ?>
                        <?php echo $totalminggu ? "atau $totalminggu minggu $sisahari hari <br>" : "" ?>
                        <?php echo $totalhari ? "atau $totalhari hari <br>" : "" ?>
                        <?php echo $totalhari ? "atau $jam jam <br>" : "" ?>
                        <?php echo $totalhari ? "atau $menit menit <br>" : "" ?>
                        <?php echo $totalhari ? "atau $detik detik <br>" : "" ?>
                        <!-- atau minggu 5 hari <br> -->
                        <!-- atau 8 minggu 5 hari <br> -->
                        <!-- atau 61 hari <br> -->
                        <!-- atau 1.464 jam <br> -->
                        <!-- atau 87.840 menit <br>
                        atau 5.270.400 detik <br> -->

                        <br>
                        <br><br><br><br>

                    </div>
                </div>
            </div>

        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous">
    </script>
</body>

</html>