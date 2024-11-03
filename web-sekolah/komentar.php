<?php
$koneksi = mysqli_connect("localhost", "root", "", "web_sekolah");
$id = "";

$done = "";

if (isset($_POST['submit'])) {
    $email = $_POST['email'];
    $komentar = $_POST['komentar'];

    $sql = "INSERT INTO komentar VALUES ('$id','$email','$komentar')";
    mysqli_query($koneksi, $sql);

    $done = "komentar berhasil di kirim";
} else {
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="komentar.css">
    <title>Document</title>
</head>

<body>
    <header> <?php include('header.html'); ?>
    </header>
    <main>
        <div class="komen">

            <form action="" method="post">
                <p><?php echo $done; ?></p>

                <label for="nama">email pengirim:</label>
                <input type="email" name="email">
                <label for="komentar">komentar:</label>
                <input type="text" name="komentar">
                <button type="submit" name="submit">kirim</button>
            </form>
        </div>
    </main>
    <footer>
        <?php include('footer.html'); ?>
    </footer>
</body>

</html>