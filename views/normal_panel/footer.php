<div class="container">
  <div class="row" id="rowInformation">
    <div class="col-md-4 col-sm-12">
      <?php
      $itemFooter = array();
      include("libs/functions/database_Connection.php");
      $result = $db->query("SELECT footerIcon, footerText FROM footertext");
      if ($result->rowCount() > 0) {
        while ($row = $result->fetch(PDO::FETCH_ASSOC)) { //fetch(PDO::FETCH_ASSOC) yöntemi, sonuç kümesinden bir satırı alır ve bu satırı bir dizi olarak döndürür.
          $itemFooter = array("footerIc" => $row["footerIcon"], "footerTx" => $row["footerText"]); //Döngü gövdesi kısmını özelleştirebilirsiniz. Bu bölümde, $row dizisinin herhangi bir özelliğini kullanabilirsiniz. Örneğin, $row['column_name'] şeklinde bir sütun adını kullanarak belirli bir sütundaki verilere erişebilirsiniz.
          $itemFooters[] = $itemFooter; // Diziye her adımda bir öğe eklenir
        }
      } else {
        echo "Veritabanında hiç veri bulunamadı.";
      }
      // alttaki her satırda "data-merge=1.5" özelliğini kullandım çünkü cardların own yapısındaki şekle oturması gerekiyor. kullandığım fotoğrafların yapısı own yapısına büyük geldi ve ben bu sorunu böyle çözdüm.
      foreach ($itemFooters as $item) {
        echo '<div class="d-flex">';
        echo '<i class="' . $item["footerIc"] . ' me-3 ms-5 mt-3"></i>';
        echo '<p>' . $item["footerTx"] . '</p>';
        echo '</div>';
      }
      ?>
    </div>
    <div class="col-md-4 text-center">
      <div id="copyright">2023 © Fırat akademi</div>
      <!--alt satırda ikon kısımları yer alıyor-->
      <div>
        <a href="#"><i class="fa-brands fa-facebook social"></i></a>
        <a href="https://www.linkedin.com/in/f%C4%B1rat-i%C5%9F%C4%B1ldak-608176250/"><i class="fa-brands fa-linkedin social"></i></a>
        <a href="#"><i class="fa-brands fa-github social"></i></a>
      </div>
      <!--alt satır da iletişim kısmının sonunda bizim anasayfaya geri çıkmamıza yardımcı olan bir ok ikonu oluşturduk. Up kısmınıda  css de oynama yapabilmek için kullandık.-->
      <a href="#"><i class="fa-sharp fa-solid fa-angle-up" id="up"></i></a>
    </div>
    <div class="col-md-4">
      <h4 class="me-3 ms-5">Hakkımızda:</h4>
      <p class="me-3 ms-5"><?php abouttext(278); ?></p>
    </div>
  </div>
</div>