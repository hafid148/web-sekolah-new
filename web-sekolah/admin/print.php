<?php
$koneksi = mysqli_connect("localhost", "root", "", "web_sekolah");

$id = "";

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        .card {
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 5px;
        }

        .border {
            border: 1px black solid;
            padding: 5px;
            align-items: center;
            width: 100%;
            height: 100vh;
            gap: 5px;


        }

        img {
            width: 60%;
        }
    </style>

</head>

<body>
    <?php
    if (isset($_GET['op'])) {
        $op = $_GET['op'];
    } else {
        $op = "";
    }

    if ($op == 'print') {
        $id  = $_GET['id'];
        $sql1 = "SELECT * FROM daftar WHERE id = '$id'";
        $q1   = mysqli_query($koneksi, $sql1);


        while ($r2 = mysqli_fetch_array($q1)) {
            $id         = $r2['id'];
            $no         = $r2['no'];
            $nama       = $r2['nama'];
            $ttl        = $r2['ttl'];
            $jurusan    = $r2['jurusan'];
            $alamat     = $r2['alamat'];
            $foto       = $r2['foto'];
        }
    ?>
        <div class="card">
            <div class="border">
                <img src="images/<?php echo $foto; ?>" alt="$nama">
                <div class="isi">
                    <p>nomor :<?php echo $no; ?></p>
                    <p>nama :<?php echo $nama; ?></p>
                    <p>tanggal lahir :<?php echo $ttl; ?></p>
                    <p>jurusan :<?php echo $jurusan; ?></p>
                    <p>alamat :<?php echo $alamat; ?></p>
                </div>
            </div>
        </div>

    <?php } ?>
    <script>
        window.print();
    </script>
</body>

</html>