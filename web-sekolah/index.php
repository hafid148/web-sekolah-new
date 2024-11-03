<?php
$koneksi = mysqli_connect("localhost", "root", "", "web_sekolah");

$none = "";

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <link rel="stylesheet" href="style.css" />
</head>

<body>
    <header>
        <?php include('header.html') ?>
    </header>
    <div class="center">
        <div class="slider">
            <div class="slides">
                <!-- Radio buttons -->
                <input type="radio" name="radio-btn" id="radio1" checked>
                <input type="radio" name="radio-btn" id="radio2">
                <input type="radio" name="radio-btn" id="radio3">

                <!-- Slide images -->
                <div class="slide first">
                    <img src="mondo.jpg" alt="Image 1">
                </div>
                <div class="slide">
                    <img src="inazuma.jpg" alt="Image 2">
                </div>
                <div class="slide">
                    <img src="poster.jpeg" alt="Image 3">
                </div>

                <!-- Automatic navigation -->
                <div class="navigation-auto">
                    <div class="auto-btn1"></div>
                    <div class="auto-btn2"></div>
                    <div class="auto-btn3"></div>
                </div>
            </div>

            <!-- Manual navigation -->
            <div class="navigation-manual">
                <label for="radio1" class="manual-btn"></label>
                <label for="radio2" class="manual-btn"></label>
                <label for="radio3" class="manual-btn"></label>
            </div>
        </div>
    </div>


    <div class="flex">
        <div class="clock">
            <div class="hour-hand" id="hour"></div>
            <div class="minute-hand" id="minute"></div>
            <div class="second-hand" id="second"></div>
            <div class="center-dot"></div>
            <div class="number number3">3</div>
            <div class="number number6">6</div>
            <div class="number number9">9</div>
            <div class="number number12">12</div>
        </div>
        <div class="container">
            <h1>Berita</h1>
            <?php
            $sql = "SELECT * FROM berita ORDER BY id ASC";
            $q1 = mysqli_query($koneksi, $sql);
            $urut = 1;

            while ($r2 = mysqli_fetch_array($q1)) {
                $foto = $r2['foto'];
                $judul = $r2['judul'];
                $berita = $r2['berita'];

            ?>
                <div class="berita">
                    <div class="isi-berita">
                        <img src="admin/images/<?php echo $foto ?>" alt="" width="100%">
                        <div class="teks-berita">
                            <h1><?php echo $judul; ?></h1>
                            <p><?php echo $berita; ?></p>
                        </div>
                    </div>

                </div>
            <?php } ?>

        </div>
        <div class="calendar">
            <div class="calendar-header">
                <button onclick="prevMonth()">&#10094;</button>
                <h2 id="monthYear"></h2>
                <button onclick="nextMonth()">&#10095;</button>
            </div>
            <div class="calendar-days">
                <div>Sun</div>
                <div>Mon</div>
                <div>Tue</div>
                <div>Wed</div>
                <div>Thu</div>
                <div>Fri</div>
                <div>Sat</div>
            </div>
            <div class="calendar-dates" id="calendarDates"></div>
        </div>



        <!--<div class="kepsek">
            <img src="nahida.webp" alt="" width="100%">
            <div class="kepsekback">

                <h1>Nahida</h1>
                <p>-kepala sekolah-</p>
                <p>lorem ipsum dolor sit amet</p>
            </div>
        </div>-->
    </div>
    <main>
        <div class="galery">
            <h1>Galery</h1>
            <div class="gambar">
                <?php
                // Loop melalui hasil query dan menampilkan gambar
                $sql2 = "SELECT * FROM galeri ORDER BY id DESC";
                $q2 = mysqli_query($koneksi, $sql2);
                while ($r2 = mysqli_fetch_array($q2)) {
                    $foto   = $r2['foto'];   // Mengambil path foto dari database
                ?>
                    <div class="isi">
                        <img src="admin/images/<?php echo $foto; ?>" alt="<?php echo $foto; ?>" width="100%" />
                    </div>
                <?php } ?>
            </div>
        </div>
        <div class="komen">
            <h1>Komentar</h1>

            <?php
            $sql2 = "SELECT * FROM komentar ORDER BY email";
            $q2  = mysqli_query($koneksi, $sql2);

            if ($q2->num_rows > 0) {
                while ($r2 = mysqli_fetch_array($q2)) {
                    $email = $r2['email'];
                    $komentar = $r2['komentar'];

            ?>
                    <div class="kolom-komen">
                        <h3><?php echo $email; ?></h3>
                        <h3><?php echo $komentar; ?></h3>
                    </div>


        </div>
<?php
                }
            } else {
                echo "<h3>tidak ada komentar</h3>";
            } ?>

<marquee behavior="" direction="right">Teyvat Academy</marquee>

    </main>
    <footer>
        <?php include('footer.html') ?>
    </footer>

    <script src="index.js"></script>
</body>

</html>