<?php
$db = mysqli_connect("localhost", "root", "", "web_sekolah");
$done = "";
$error = "";

if (isset($_POST['login'])) {
    $nama   = $_POST['nama'];
    $kelas = $_POST['kelas'];
    $jurusan = $_POST['jurusan'];
    $nis = $_POST['nis'];
    $sandi  = $_POST['sandi'];
}
@$sql2 = "SELECT * FROM murid_learning_verify WHERE nama='$nama' AND kelas='$kelas' AND jurusan='$jurusan' AND nis='$nis' AND sandi='$sandi' ";
$q2 = mysqli_query($db, $sql2);
if ($q2) {
    if ($q2->num_rows > 0) {
        header("location:e-learning/halaman-murid.php");
        $done = "akun ditemukan";
        exit;
    } else {
        $error = "akun tidak di temukan";
    }
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login e learing</title>
    <style>
        body {
            font-family: "Gill Sans", "Gill Sans MT", Calibri, "Trebuchet MS", sans-serif;
            background-color: #3333;
        }

        .center {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }

        h1 {
            text-align: center;
            color: rgb(219, 51, 234);
            animation: masuk 1s ease-in;
        }

        @keyframes masuk {
            0% {
                opacity: 0;
                transform: translateY(-30px)
            }

            100% {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .wrap {
            width: 20%;
            height: 130vh;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.3);
            border-radius: 5px;
            padding: 5px;
            background-color: white;
            padding: 50px;
        }

        form {
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            gap: 5px;
            height: 20px;
        }

        label {
            font-size: 20px;
            color: rgb(219, 51, 234);
        }

        input[type="text"],
        input[type="password"],
        input[type="number"] {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        input[type="text"],
        input[type="password"],
        input[type="number"]:focus {
            border-color: rgb(219, 51, 234);
            box-shadow: 0 0 8px rgba(98, 0, 234, 0.2);
        }

        button {
            background-color: rgb(219, 51, 234);
            border: 1px solid #ccc;
            border-radius: 5px;
            padding: 5px;
            width: 50%;
            color: white;
        }

        .error {
            text-decoration: none;
            color: rgb(219, 51, 234);
        }

        img {
            border-radius: 350px;
        }

        select {
            padding: 5px;
            border-radius: 5px;
        }
    </style>

</head>

<body>
    <div class="center">
        <div class="wrap">
            <div class="main">
                <h1>login sebagai murid</h1>
                <img src="elearning.png" alt="" width="100%">
                <div class="error"> <?php
                                    if ($q2) {
                                        echo $error;
                                    }
                                    ?></div>
                <div class="error"><?php echo $done; ?></div>

                <form action="" method="post">
                    <label for="nama">nama</label>
                    <input type="text" name="nama" id="akun" maxlength="100" placeholder="enter your username">
                    <br>
                    <label for="kelas">kelas</label>
                    <select name="kelas">
                        <option value="10">10</option>
                        <option value="11">11</option>
                        <option value="12">12</option>
                    </select>
                    <label for="jurusan">jurusan</label>
                    <select name="jurusan">
                        <option value="tkj">TKJ</option>
                        <option value="bdp">BDP</option>
                        <option value="mp">MP</option>
                    </select>
                    <label for="nis">NIS</label>
                    <input type="number" name="nis" placeholder="enter your nis">

                    <label for="sandi">sandi</label>
                    <input type="password" name="sandi" id="sandi" maxlength="100" placeholder="enter your password">
                    <br>


                    <button type="submit" name="login" value=<?php echo date("h:i:sa") ?>>Login</button>
                    <div class="href">
                        <a href="buat-akun-learning-guru.php" .>
                            <p>buat akun guru</p>
                        </a>
                        <a href="buat-akun-learning-siswa.php">
                            <p>buat akun murid</p>
                        </a>
                    </div>

                </form>


            </div>
        </div>
    </div>
</body>

</html>