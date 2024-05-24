<section id="educator">
  <div class="container">
    <h3 id="educatorh3">Eğitmenler</h3>
    <div class="row">
      <div class="d-flex">
        <?php
        $menuItems = array();
        //Alt'daki kod parçası bizim menüdeki kayıtlı verilerimizi getiriyor ve bu kodları bir foreach yapısı ile menülerin kayıt olduğu nav bar kısmındaki ilgili koda getiriyor.
        $result = $db->query("SELECT * FROM educator_table");
        if ($result->rowCount() > 0) {
          while ($row = $result->fetch(PDO::FETCH_ASSOC)) { //fetch(PDO::FETCH_ASSOC) yöntemi, sonuç kümesinden bir satırı alır ve bu satırı bir dizi olarak döndürür.
            $menuItem = array("img" => $row["imgLink"], "name" => $row["nameSurname"], "text" => $row["aboutWrite"], "facebook" => $row["faceLink"], "linkedin" => $row["linkedinLink"], "github" => $row["githubLink"]); //Döngü gövdesi kısmını özelleştirebilirsiniz. Bu bölümde, $row dizisinin herhangi bir özelliğini kullanabilirsiniz. Örneğin, $row['column_name'] şeklinde bir sütun adını kullanarak belirli bir sütundaki verilere erişebilirsiniz.
            $menuItems[] = $menuItem; // Diziye her adımda bir öğe eklenir
          }
        } else {
          echo "Veritabanında hiç veri bulunamadı.";
        }
        unset($db); // Veritabanı bağlantısını kapatma

        foreach ($menuItems as $item) {
          echo '<div class="col-md-3">';
          echo '<img src="img/educator_img/' . $item["img"] . '" class="img-fluid oval">';
          echo '<h4 class="educatorName">' . $item["name"] . '</h4>';
          echo '<p class="educatorp">';
          echo '' . $item["text"] . '';
          echo '</p>';
          echo ' <div class="egitmen-icon">';
          echo ' <a href="' . $item["facebook"] . '"><i class="fa-brands fa-facebook social"></i></a>';
          echo ' <a href="' . $item["linkedin"] . '"><i class="fa-brands fa-linkedin social"></i></a>';
          echo '<a href="' . $item["github"] . '"><i class="fa-brands fa-github social"></i></a>';
          echo '</div>';
          echo '</div>';
        }
        ?>
      </div>
    </div>
  </div>
</section>