<?php
$koneksi = mysqli_connect("localhost", "root", "", "web_sekolah");
$disini = "";
$id = "";


if (isset($_GET['op'])) {
    $op = $_GET['op'];
} else {
    $op = "";
}

if ($op == 'editberita') {
    $id    = $_GET['id'];
    $sql1  = "SELECT * FROM berita WHERE id = '$id'";
    $q1    = mysqli_query($koneksi, $sql1);
    $r1    = mysqli_fetch_array($q1);
    $foto  = $r1['foto'];
    $judul = $r1['judul'];
    $berita = $r1['berita'];

    $disini = "edit disini";
}

if ($op == 'editberita') {
    $sql1   = "UPDATE berita SET foto = '$foto', judul = '$judul',berita = '$berita' WHERE id = '$id'";
    $q1 = mysqli_query($koneksi, $sql1);
    if ($q1) {
        $done = "data berhasil di update";
    }
}


if ($op == 'delete') {  //galeri
    $id = $_GET['id'];
    $sql1 = "DELETE FROM galeri WHERE id = '$id'";
    $q1   = mysqli_query($koneksi, $sql1);
}

if ($op == 'edit') {
    $id    = $_GET['id'];
    $sql1  = "SELECT * FROM galeri WHERE id = '$id'";
    $q1    = mysqli_query($koneksi, $sql1);
    $r1    = mysqli_fetch_array($q1);
    $foto  = $r1['foto'];

    $disini = "edit disini";
}

if ($op == 'deletekomen') {  //komen
    @$id = $_GET['id'];
    $sql1 = "DELETE FROM komentar WHERE id = '$id'";
    $q1   = mysqli_query($koneksi, $sql1);
}
if ($op == 'deletedaftar') {  //pendaftaran
    $no = $_GET['no'];
    $sql1 = "DELETE FROM daftar WHERE no = '$no'";
    $q1   = mysqli_query($koneksi, $sql1);
}
if ($op == 'editdaftar') {
    $sql1   = "UPDATE daftar SET no = '$no', nama = '$nama',ttl = '$ttl',jurusan = '$jurusan',alamat = '$alamat',foto = '$foto' WHERE id = '$id'";
    $q1 = mysqli_query($koneksi, $sql1);
    if ($q1) {
        $done = "data berhasil di update";
    }
}

if (isset($_POST['submit'])) {
    @$judul = $_POST['judul'];
    @$berita  = $_POST['berita'];

    $folder = "images/";
    @$foto   = $_FILES["foto"]["name"];
    @$tmp_name = $_FILES["foto"]["tmp_name"];
    $file_ext = strtolower(pathinfo(@$foto, PATHINFO_EXTENSION));
    $allowed_extensions = array('jpg', 'jpeg', 'png');



    if (in_array($file_ext, $allowed_extensions) && $_FILES['foto']['size'] <= 2000000) {
        move_uploaded_file($tmp_name, $folder . $foto); // Pindahkan foto ke folder tujuan
    } else {
        $error = "File harus berupa JPG/PNG dan ukuran maksimal 2MB.";
    }
    // insert berita
    $sql1 = "INSERT INTO berita VALUES('$id', '$foto','$judul', '$berita')";
    mysqli_query($koneksi, $sql1);
    echo "data berhasil dikirim";


    if ($op == 'edit') {
        $sql1   = "UPDATE galeri SET judul = '$judul', foto = '$foto',desk = '$desk' WHERE id = '$id'";
        $q1 = mysqli_query($koneksi, $sql1);
        if ($q1) {
            $done = "data berhasil di update";
        }
    } else {
        $sql1 = "INSERT INTO galeri VALUES('$id', '$foto')";
        mysqli_query($koneksi, $sql1);
        echo "data berhasail dikirim";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="style.css" />
    <title>Document</title>
</head>

<body>
    <div class="title">
        <h1>Selamat Datang Di halaman Admin</h1>
        <p><a href="http://localhost/web-sekolah" target="_blank">ke halaman utama</a></p>
    </div>
    <div class="left">
        <div class="sidebar">
            <div class="option">
                <h2><a href="#galery">galery</a></h2>
            </div>
            <div class="option">
                <h2><a href="#komen">komentar</a></h2>
            </div>
            <div class="option">
                <h2><a href="#daftar">data pendaftaran</a></h2>
            </div>

        </div>
        <div class="menu">
            <div class="berita">
                <h1>Tambahkan Berita</h1>
                <form action="" method="post" enctype="multipart/form-data">
                    <label for="judul">judul berita:</label>
                    <input type="text" name="judul">
                    <label for="berita">berita:</label>
                    <input type="text" name="berita" id="">
                    <label for="foto">tambahkan foto</label>
                    <input type="file" name="foto">
                    <button name="submit" type="submit">kirim</button>
                </form>
                <table>
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>foto</th>
                            <th>judul</th>
                            <th>berita</th>
                            <th>setting</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $sql = "SELECT * FROM berita ORDER BY id ASC";
                        $q1 = mysqli_query($koneksi, $sql);
                        $urut = 1;

                        while ($r2 = mysqli_fetch_array($q1)) {
                            $foto = $r2['foto'];
                            $judul = $r2['judul'];
                            $berita = $r2['berita'];

                        ?>

                            <tr>
                                <th><?php echo $urut++; ?></th>
                                <td><img src="images/<?php echo $foto; ?>" alt="" width="50%"></td>
                                <td><?php echo $judul; ?></td>
                                <td><?php echo $berita; ?></td>
                                <td><a href="dashboard.php?op=editberita&id=<?php echo $id; ?>"><button>edit</button></a></td>
                            </tr>

                        <?php  } ?>
                    </tbody>
                </table>
            </div>
            <div class="galeri" id="galery">
                <h1>galeri</h1>
                <form action="" method="post" enctype="multipart/form-data">
                    <p><?php echo $disini; ?></p>
                    <label for="foto">upload foto</label>
                    <input type="file" name="foto" id="foto">
                    <button type="submit" name="submit" id="submit">submit</button>
                </form>
            </div>

            <div class="galeri-result">

                <h1>Tampilan Galery</h1>
                <table>
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>foto</th>
                            <th>setting</th>


                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $sql1 = "SELECT * FROM galeri ORDER BY id";
                        $q2   = mysqli_query($koneksi, $sql1);
                        $urut = 1;

                        while ($r2 = mysqli_fetch_array($q2)) {
                            $id    = $r2['id'];
                            $foto  = $r2['foto'];



                        ?>

                            <tr>
                                <td scope="row"><?php echo $urut++; ?></td>
                                <td scope="row"><img src="images/<?php echo $foto; ?>" alt="" width="30%"></td>
                                <td scope="row"><a href="dashboard.php?op=edit&id=<?php echo $id; ?>"><button type="button">edit</button></a>
                                    <a href="dashboard.php?op=delete&id=<?php echo $id; ?>" onclick="return confirm('yakin ingin di delete?')"><button>delete</button></a>
                                </td>



                            </tr>
                        <?php } ?>

                    </tbody>
                </table>
            </div>
            <div class="komen" id="komen">
                <h1>Komentar</h1>
                <table>
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>nama pengirim</th>
                            <th>Komentar</th>
                            <th>setting</th>

                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $sql1 = "SELECT * FROM komentar ORDER BY id";
                        $q2   = mysqli_query($koneksi, $sql1);
                        $urut   = 1;

                        while ($r2 = mysqli_fetch_array($q2)) {
                            $id     = $r2['id'];
                            $email = $r2['email'];
                            $komen  = $r2['komentar'];



                        ?>

                            <tr>
                                <th><?php echo $urut++ ?></th>
                                <td><?php echo @$email; ?></td>
                                <td><?php echo @$komen; ?></td>
                                <td><a href="dashboard.php?op=deletekomen&id=<?php echo $id; ?>" onclick="return confirm('yakin ingin delete?')"><button>delete</button></a></td>

                            </tr>
                        <?php } ?>

                    </tbody>
                </table>

            </div>
            <div class="daftar" id="daftar"> <!--  pendaftaran -->
                <h1>Data Pendaftaran</h1>
                <table>
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>nomor</th>
                            <th>nama</th>
                            <th>tanggal lahir</th>
                            <th>jurusan</th>
                            <th>alamat</th>
                            <th>foto</th>
                            <th>setting</th>

                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $sql1 = "SELECT * FROM daftar ORDER BY id";
                        $q2   = mysqli_query($koneksi, $sql1);
                        $urut   = 1;


                        while ($r2 = mysqli_fetch_array($q2)) {
                            $id     = $r2['id'];
                            $no = $r2['no'];
                            $nama = $r2['nama'];
                            $ttl  = $r2['ttl'];
                            $jurusan  = $r2['jurusan'];
                            $alamat  = $r2['alamat'];
                            $foto    = $r2['foto'];

                        ?>


                            <tr>
                                <th><?php echo $urut++; ?></th>
                                <td><?php echo @$no; ?></td>
                                <td><?php echo @$nama; ?></td>
                                <td><?php echo @$ttl; ?></td>
                                <td><?php echo @$jurusan; ?></td>
                                <td><?php echo @$alamat; ?></td>
                                <td><img src="images/<?php echo $foto; ?>" alt="<?php $nama ?>" width="100px"></td>
                                <td class="button"><a href="http://localhost/web-sekolah/pendaftaran.php?op=editdaftar&id=<?php echo $id; ?>"><button>edit</button></a>
                                    <a href="dashboard.php?op=deletedaftar&no=<?php echo $no; ?>" onclick="return confirm('yakin ingin delete?')"><button>delete</button></a>
                                    <a href="print.php?op=print&id=<?php echo $id; ?>" target="_blank"><button>print</button></a>
                                </td>

                            </tr>
                        <?php } ?>

                    </tbody>
                </table>
            </div>
        </div>

    </div>

</body>

</html>