<!-- NIM B220221012 -->
<?php
date_default_timezone_set("Asia/Jakarta");

function getCurrentTime($format) {
    return date($format);
}

$waktu= "";
if (isset($_POST['submit'])) {
    $nim = $_POST['select'];
    $ahkir2angka= substr($nim, -2); // Ambil dua angka belakang menggunakan substr
    $tambahangka = intval($ahkir2angka); //cek apa dia benar int bilangan bulat
    $penghitung = strtotime("+$tambahangka minutes");
    $hasil = date("d F Y H:i:s", $penghitung);
}

if (isset($_POST['submit'])) {
    date_default_timezone_set("Asia/Jakarta");

    $angka = $_POST['select'];
    
    $ambil = substr($angka, -2);
    
    $hitung = strtotime("+$ambil minutes");
    
    $hasil = date("d F Y H:i:s", $hitung);
    
    $waktu = "Waktu saat ini: " .  getCurrentTime("d F Y H:i:s")  . "\n";
    $waktu = "Jarak waktu setelah ditambahkan $ambil menit: <b> $hasil </b>";
    
};
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Countdown Timer</title>
</head>
<body>
    <h1>Penghitung waktu</h1>
   <p> Waktu Sekarang | <?php echo getCurrentTime("d F Y H:i:s"); ?></p>
    Waktu yang Akan Datang |
    <?php if(isset($hasil)): ?>
        <?php echo $hasil; ?>
        <!-- Display the countdown timer in an element -->
        <p id="demo"></p>
        <script>
            // Set the date we're counting down to
            var countDownDate = new Date("<?php echo date("Y-m-d\TH:i:s", $penghitung); ?>");

            // Update the count down every 1 second
            var x = setInterval(function() {

                // Get today's date and time
                var now = new Date().getTime();
                // Find the distance between now and the count down date
                var distance = countDownDate - now;

                // Time calculations for days, hours, minutes and seconds
                var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
                var seconds = Math.floor((distance % (1000 * 60)) / 1000);

                // Display the result in the element with id="demo"
                document.getElementById("demo").innerHTML = "<b>" + hours + "h "
                + minutes + "m " + seconds + "s " + "</b>";

                // If the count down is finished, write some text
                if (distance < 0) {
                    clearInterval(x);
                    document.getElementById("demo").innerHTML = "<b>EXPIRED</b>";
                }
            }, 1000);
        </script>
    <?php else: ?>
        <p>Silahkan pilih NIM untuk melihat waktu yang akan datang.</p>
    <?php endif; ?>

    <form action="" method="POST">
        <p>
            NIM 
            <select id="select" name="select">
                <option selected>Pilih NIM</option>
                <option value="B220221001">B220221001</option>
                <option value="B220221002">B220221002</option>
                <option value="B220221003">B220221003</option>
                <option value="B220221004">B220221004</option>
                <option value="B220221005">B220221005</option>
                <option value="B220221006">B220221006</option>
                <option value="B220221012">B220221012</option>
            </select>
            <input type="submit" name="submit" value="Hitung">
        </p>
    </form>

    <?= $waktu ?>
</body>
</html>
