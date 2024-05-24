<?php
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
?>