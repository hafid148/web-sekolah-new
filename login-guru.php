<?php
$db = mysqli_connect("localhost", "root", "", "web_sekolah");
$done = "";
$error = "";

if (isset($_POST['login'])) {
    $akun   = $_POST['akun'];
    $sandi  = $_POST['sandi'];
    $mapel = $_POST['mapel'];
}

@$sql = "SELECT * FROM guru_learning_veryfi WHERE 
    akun='$akun' AND sandi='$sandi' AND mapel='$mapel'
    ";
$q1 = mysqli_query($db, $sql);
if ($q1->num_rows > 0) {
    header("location:e-learning/halaman-guru.php");
    $done = "akun di temukan";
} else {
    $error = "Akun tidak di temukan";
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
        }

        .wrap {
            width: 20%;
            height: 110vh;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.3);
            border-radius: 5px;
            padding: 10px;
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
        input[type="password"] {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        input[type="text"],
        input[type="password"]:focus {
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
                <h1>login sebagai guru</h1>
                <img src="elearning.png" alt="" width="100%">
                <div class="error"><?php echo $error; ?></div>
                <div class="error"><?php echo $done; ?></div>

                <form action="" method="post">
                    <label for="akun">user</label>
                    <input type="text" name="akun" id="akun" maxlength="100" placeholder="enter your username">
                    <br>
                    <label for="sandi">password</label>
                    <input type="password" name="sandi" id="sandi" maxlength="100" placeholder="enter your password">
                    <br>
                    <label for="mapel">mapel:</label>
                    <select name="mapel">
                        <option value="matematika">matematika</option>
                        <option value="ipas">ipas</option>
                        <option value="B.Indo">B.Indo</option>
                    </select>


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