<?php
function goAndComeBack($url, $time = 0, $choos = 0)
{
  if ($choos != 1) {
    $url = $_SERVER["HTTP_REFERER"]; //önceki geldiğim yerin url sini tutuyor
  }
  if ($time != 0) {
    header("Refresh:$time;url=$url");
  } else {
    header("Location:$url");
  }
}
function logoutAdmin()
{
  if (isset($_SESSION['Active_Time'])) {
    $elapsedTime = time() - $_SESSION['Active_Time'];
    if ($elapsedTime >= 3600) {
      echo "Oturumunuz sonlandı.";
      session_unset();
      session_destroy();
      goAndComeBack("admin_Login.php", 3, 1);
      unset($db);
      exit;
    }
  } else {
    $_SESSION['Active_Time'] = time();
  }
}
function abouttext($maxLength)
{
  include("libs/functions/database_connection.php");
  $menuItems3 = array();
  $result3 = $db->query("SELECT aboutText FROM about");
  if ($result3->rowCount() > 0) {
    while ($row = $result3->fetch(PDO::FETCH_ASSOC)) {
      $truncatedText = substr($row["aboutText"], 0, $maxLength); // Kırpılmış metin
      $menuItem3 = array("textAbout" => $truncatedText);
      $menuItems3[] = $menuItem3;
    }
  } else {
    echo "Veritabanında hiç veri bulunamadı.";
  }
  foreach ($menuItems3 as $item) {
    echo '<p>' . $item["textAbout"] . '</p>';
  }
}
//buton ile çıkışı sağlıyor.
if (isset($_POST['cikis']) || isset($_POST['cikis1'])) {
  session_start();
  $_SESSION["username"] = '';
  $_SESSION["LoggedIn"] = false;
  $_SESSION["LoggedIn1"] = false;
  if(isset($_POST['cikis1'])){
    goAndComeBack("index.php", 0, 1);
  }else{
    goAndComeBack("admin_Login.php", 0, 1);
  }
  unset($db); // Veritabanı bağlantısını kapatma
}
