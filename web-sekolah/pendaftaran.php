<?php
$koneksi = mysqli_connect("localhost", "root", "", "web_sekolah");
$done = "";
$error = "";
$disini = "";



if (isset($_POST['submit'])) {
    @$id     = $_POST['id'];
    $no     = $_POST['no'];
    $nama   = $_POST['nama'];
    $ttl    = $_POST['ttl'];
    $jurusan = $_POST['jurusan'];
    $alamat = $_POST['alamat'];

    $folder = "images/";
    $foto   = $_FILES["foto"]["name"];
    $tmp_name = $_FILES["foto"]["tmp_name"];
    $file_ext = strtolower(pathinfo($foto, PATHINFO_EXTENSION));
    $allowed_extensions = array('jpg', 'jpeg', 'png', 'webp');




    $sql_check = "SELECT * FROM daftar WHERE no='$no'";
    $result_check = mysqli_query($koneksi, $sql_check);

    if (mysqli_num_rows($result_check) > 0) {
        $error = "Nomor sudah terdaftar!";
    } else {
        $sql = "INSERT INTO daftar VALUES ('$id','$no','$nama','$ttl','$jurusan','$alamat','$foto')";

        $q1 = mysqli_query($koneksi, $sql);
        if ($q1) {
            $done = "data berhasil terkirim";
        } else {
        }
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="pendaftaran.css">
    <title>pendaftaran</title>
</head>

<body>
    <header>
        <?php include('header.html'); ?>
    </header>
    <div class="reg">
        <h1>DAFTAR SEKARANG!</h1>

        <?php if ($done) {
            echo "<div class='done'>$done</div>";
        } ?>
        <?php if ($error) {
            echo "<div class='error'>$error</div>";
        } ?>


        <form action="" method="post" enctype="multipart/form-data">
            <label for="no">no pendaftaran</label>
            <input type="number" name="no">
            <label for="nama">nama</label>
            <input type="text" name="nama">
            <label for="ttl">Tanggal Lahir:</label>
            <input type="date" name="ttl">
            <label for="jurusan">jurusan</label>
            <select name="jurusan" aria-placeholder="jurusan">
                <option>TKJ</option>
                <option>BDP</option>
                <option>AK</option>
            </select>
            <label for="alamat">alamat</label>
            <input type="text" name="alamat" style="padding: 20px;">
            <label for="foto">foto</label>
            <input type="file" name="foto">
            <button type="submit" name="submit">kirim</button>
        </form>
        <div class="card">
            <?php
            $sql1 = "SELECT * FROM daftar";
            $q1 = mysqli_query($koneksi, $sql1);


            while ($r2 = mysqli_fetch_array($q1)) {
                $id = $r2['id'];
                $no = $r2['no'];
                $nama = $r2['nama'];
                $ttl = $r2['ttl'];
                $jurusan = $r2['jurusan'];
                $alamat = $r2['alamat'];
                $foto = $r2['foto'];
            }
            ?>


        </div>
    </div>
    <div class="border">
        <img src="admin/images/<?php echo $foto; ?>" alt="$nama">
        <div class="isi">
            <p>nomor :<?php echo @$no; ?></p>
            <p>nama :<?php echo @$nama; ?></p>
            <p>tanggal lahir :<?php echo @$ttl; ?></p>
            <p>jurusan :<?php echo @$jurusan; ?></p>
            <p>alamat :<?php echo @$alamat; ?></p>
            <a href="admin/print.php?op=print&id=<?php echo $id; ?>" target="_blank"><button style="width: 200px;">print</button></a>
        </div>
    </div>


    <footer>
        <?php include('footer.html'); ?>

    </footer>

</body>

</html>