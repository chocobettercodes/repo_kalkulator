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
                    <center>Kalkulator Hari</center>
                </h1>
                <center>
                    <p class="text-muted mb-0" style="white-space: nowrap;">Time & Date</p>
                </center>
                <hr>
            </div>
            <div class="col-md-4 m-2">
                <div class="card" style="width: 18rem;">
                    <div class="card-header">
                        Kalkulator Hari
                    </div>
                    <div class="card-body">
                        <form action="" method="post">
                            <label for="tgllahir">Tanggal Mulai</label>
                            <input type="date" class="form-control" id="tglmulai" name="tglmulai"><br>
                            <label for="tglsekarang">Tanggal Akhir</label>
                            <input type="date" class="form-control" id="tglakhir" name="tglakhir"><br>
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
                        Hasil
                    </div>
                    <div class="card-body">
                        <?php

                        $pesan_peringatan = '';
                        $harikerja = 0;
                        $hariweekend = 0;
                        $hari = 0;

                        if($_SERVER['REQUEST_METHOD'] == 'POST'){
                            // tampung inputan user 
                            $tgl_mulai = strtotime($_POST['tglmulai']);
                            $tgl_selesai = strtotime($_POST['tglakhir']);

                            if (empty($tgl_mulai) || empty($tgl_selesai)) {
                                $pesan_peringatan = "Tanggal sekarang dan tanggal lahir harus diisi.";
                                // $hari = $harikerja = $hariweekend = 0;
                                
                            }else{
                                $selisihari = $tgl_selesai - $tgl_mulai;

                                // $hari = $selisihari/(60*60*24);
                                $hari = floor($selisihari / (60 * 60 * 24)) + 1; 
                                // $hari--;

                                // menghitung hari kerja dan akhir pekan

                                // membuat perulangan dari jumlah hari 
                                for($i = 0 ; $i < $hari; $i++){
                                    $tgl_insert = strtotime("+$i day", $tgl_mulai);

                                    $hari_dalam_minggu = date('N', $tgl_insert);

                                    if($hari_dalam_minggu >= 1 && $hari_dalam_minggu <= 5){
                                        $harikerja++;
                                    }else{
                                        $hariweekend++;
                                    }
                                    
                                    // echo date('Y-m-d', $tgl_insert) . " - Hari ke-" . ($i + 1) . ": ";
                                    // if ($hari_dalam_minggu >= 1 && $hari_dalam_minggu <= 5) {
                                    //     echo "Hari kerja<br>";
                                    // } else {
                                    //     echo "<p style='color : red;'> Akhir pekan </p><br>";
                                    // }
                                }

                            }
                        }
                        ?>
                        <?php echo $hari ? "$hari hari" : "" ?>
                        <?php echo $harikerja ? "$harikerja hari kerja" : "" ?>
                        <?php echo $hariweekend ? "$hariweekend hari akhir pekan" : "" ?>

                        <br>

                        <br>

                        <br>

                        <br>

                        <br>

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