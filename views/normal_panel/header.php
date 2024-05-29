<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0,user-scalable=0"> <!--user-scalable=0 bu kod ile sitenin mobilde yakınlaşırma ve uzaklaştırmayı önlüyor.-->
  <link rel="stylesheet" href="packets/bootstrap/bootstrap.css">
  <title>Anasayfa | Kod Dünyası</title>
  <!--alt 3 satır font awesome ile bağlantıyı sağlıyor-->
  <script src="https://kit.fontawesome.com/0761d8fd00.js" crossorigin="anonymous"></script>
  <script src="https://unpkg.com/@popperjs/core@2.10.1/dist/umd/popper.min.js"></script>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <!--alt satır yazı fontu için seçmiş olduğum kütüphane linki-->
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans&display=swap" rel="stylesheet">
  <!--alt satırdaki bağlantıyı own Carouselden indirmiş olduğum owl dosyasındaki bağlantılar ile bağladım card yapıları kendi kendine kaya bilsin diye.   CSS kısmı-->
  <link rel="stylesheet" href="packets/owl/owl.carousel.min.css">
  <link rel="stylesheet" href="packets/owl/owl.theme.default.min.css">
  <!--Alt'daki php kod parçası bizim her sayfa için ayrı olan css dosyalarının bağlantı koşullarını burada oluşturuyor.-->
  <?php
  $page = basename($_SERVER['PHP_SELF']);
  $cssFile = '';

  switch ($page) {
    case 'index.php':
      $cssFile = 'style';
      break;
    case 'education_detail.php':
      $cssFile = 'educationDetailStyle';
      break;
    case 'education.php':
      $cssFile = 'educationStyle';
      break;
    default:
      echo "Tanımlanamayan bir sayfadasınız yönlendiriliyorsunuz.";
      header('Refresh:2; index.php');
      break;
  }
  ?>
  <link rel="stylesheet" href="./css/<?php echo $cssFile; ?>.css"><!--bu kodda üstteki php kodunun devamı.-->
</head>

<body>
  <?php
  include("libs/functions/database_connection.php");
  ?>