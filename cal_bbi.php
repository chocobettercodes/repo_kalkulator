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
                <a class="nav-link " href="calculator.php">Home</a>
                <a class="nav-link" href="time_date.php">Time & Date</a>
                <a class="nav-link active" href="health.php">Health <span class="sr-only">(current)</span></a>
            </div>
        </div>
    </nav>

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <br>
                <h1>
                    <center>Kalkulator Berat Badan Ideal</center>
                </h1>
                <center>
                    <p class="text-muted mb-0" style="white-space: nowrap;">Health</p>
                </center>
                <hr>
            </div>
            <div class="col-md-4 m-2">
                <div class="card" style="width: 18rem;">
                    <div class="card-header">
                        Kalkulator Berat Badan Ideal
                    </div>
                    <div class="card-body">
                        <form action="" method="post">
                            <div class="form-group">
                                <label for="inputState">Jenis Kelamin</label>
                                <select id="jk" name="jk" class="form-control">
                                    <option value="L" selected>Laki-laki</option>
                                    <option value="P">Perempuan</option>
                                </select>
                            </div>
                            <label for="tgllahir">Umur</label>
                            <input type="text" class="form-control" id="umur" name="umur"><br>
                            <label for="tglsekarang">Tinggi Badan</label>
                            <input type="text" class="form-control" id="tb" name="tb"><br>
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
                        $bbi = 0;
                        $sex = '';
                        $tb = 0;
                        $umur = 0;

                        if($_SERVER['REQUEST_METHOD'] == 'POST'){
                            // tampung inputan user 
                            $jk = $_POST['jk'];
                            $umur = $_POST['umur'];
                            $tb = $_POST['tb'];

                            // echo 'Jenis kelamin : '.$jk.' , Umur : '.$umur.' , Tinggi Badan : '.$tb;
                            // perhitungan BBI menggunakan rumus mungkung
                            /* Untuk Pria:
                                BBI = (Tinggi Badan - 100) - ((Tinggi Badan - 150) / 4)

                                Untuk Wanita:
                                BBI = (Tinggi Badan - 100) - ((Tinggi Badan - 150) / 2) */

                            if($jk == 'P'){
                                $sex = "Perempuan";
                                $bbi = ($tb - 100) - (($tb - 150) / 2);
                            }else{
                                $sex = "Laki-laki";
                                $bbi = ($tb - 100) - (($tb - 150) / 4);
                            }

                            

                        }
                        ?>
                        <?php echo $sex ? "Jenis Kelamin : $sex " : "" ?><br>
                        <?php echo $umur ? "Umur : $umur Tahun" : "" ?><br>
                        <?php echo $tb ? "Tinggi : $tb cm" : "" ?><br>
                        <?php echo $bbi ? "Berat Badan Ideal untuk anda adalah : $bbi Kg" : "" ?><br>

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