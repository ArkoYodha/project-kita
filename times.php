<?php 

date_default_timezone_set("Asia/jakarta");

session_start();
include 'koneksi.php';


if (isset($_SESSION['admin_akses'])) {
    $user= $_SESSION['admin_nama'];



 if (isset($_POST['kirim'])) {

    $usr= $_SESSION['admin_nama'];
    $nama= $_SESSION['nama'];
    $waktu= date('Y-m-d H:i:s');
    $chat= $_POST['chat']; 
    
    $sql= "INSERT INTO chat(id, username, nama, chat, waktu) VALUES ('','$usr','$nama','$chat','$waktu')";
     mysqli_query($koneksi, $sql);
     // mysqli_close($koneksi);
    }

$query= "SELECT * FROM chat WHERE 1";
$hasil=mysqli_query($koneksi, $query);

$query1= "SELECT * FROM chat  WHERE username ='$user' LIMIT 1";
$hasil1=mysqli_query($koneksi, $query1);

}

?>



<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="assets/img/favicon.png">
  <title>
  Kalender
  </title>
  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
  <!-- Nucleo Icons -->
  <link href="assets/css/nucleo-icons.css" rel="stylesheet" />
  <link href="assets/css/nucleo-svg.css" rel="stylesheet" />
  <!-- Font Awesome Icons -->
  <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
  <link href="assets/css/nucleo-svg.css" rel="stylesheet" />
  <!-- CSS Files -->
  <link id="pagestyle" href="assets/css/soft-ui-dashboard.css?v=1.0.7" rel="stylesheet" />
  <!-- Nepcha Analytics (nepcha.com) -->
  <!-- Nepcha is a easy-to-use web analytics. No cookies and fully compliant with GDPR, CCPA and PECR. -->
  <script defer data-site="YOUR_DOMAIN_HERE" src="https://api.nepcha.com/js/nepcha-analytics.js"></script>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/5.1.3/css/bootstrap.min.css" rel="stylesheet">

    
</head>
<?php include "sidebar.php" ?>

<body class="g-sidenav-show  bg-gray-100">
<main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
<?php include "header.php" ?>

<?php

    $no=1;
    while ($a=mysqli_fetch_array($hasil)){
      
      $no++;
        echo '<div id="'.$a['id'].'" >'.$a['nama']." | ".$a['waktu'],'<br>';
        echo  $a['chat'],'</div><br>';
    }

?>

        <?php while ($b=mysqli_fetch_array($hasil1)){ ?>
        <form action="<?= $b['id'] ?>" method="POST">

            <input type="text" name="chat" placeholder="Masukkan chat">
            <input type="submit" name="kirim" value="kirim">
    

        </form>
        <?php } ?>


    </main>
    <?php include "footer.php"?>

    <!-- Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.1.3/js/bootstrap.bundle.min.js"></script>
</body>
</html>
