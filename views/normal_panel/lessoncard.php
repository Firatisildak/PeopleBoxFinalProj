<section id="education">
    <div class="container">
        <h3 class="educationTitle">Eğitimler</h3>
        <!--alt satırdaki div yapısının içine own yapımızı kullana bilmek için kütüphaneleri dahil ettim.-->
        <div class="owl-carousel own-theme pt-4">
            <?php
            $menuItems2 = array();
            //Alt'daki kod parçası bizim kayıtlı derslerimizi getiriyor ve bu kodları bir foreach yapısı ile derslerimizi kayıt ilgili koda getiriyor.
            $result2 = $db->query("SELECT * FROM cardlesson");
            if ($result2->rowCount() > 0) {
                while ($row = $result2->fetch(PDO::FETCH_ASSOC)) { //fetch(PDO::FETCH_ASSOC) yöntemi, sonuç kümesinden bir satırı alır ve bu satırı bir dizi olarak döndürür.
                    $truncatedText = substr($row["cardLessonWrite"], 0, 150);
                    $menuItem2 = array("lessonimg" => $row["cardLessonImg"], "title" => $row["cardLessonTitle"], "write" => $truncatedText, "lesson_id" => $row["cardLessonID"], "educator_id" => $row["educatorId"]); //Döngü gövdesi kısmını özelleştirebilirsiniz. Bu bölümde, $row dizisinin herhangi bir özelliğini kullanabilirsiniz. Örneğin, $row['column_name'] şeklinde bir sütun adını kullanarak belirli bir sütundaki verilere erişebilirsiniz.
                    $menuItems2[] = $menuItem2; // Diziye her adımda bir öğe eklenir
                }
            } else {
                echo "Veritabanında hiç veri bulunamadı.";
            }
            // alttaki her satırda "data-merge=1.5" özelliğini kullandım çünkü cardların own yapısındaki şekle oturması gerekiyor. kullandığım fotoğrafların yapısı own yapısına büyük geldi ve ben bu sorunu böyle çözdüm.
            foreach ($menuItems2 as $item) {
                echo '<div class="card" data-merge="1.5">
                <img src="img/education_img/' . $item["lessonimg"] . '" alt="logo" class="img-fluid">
                <h5 class="titleCard">' . $item["title"] . '</h5>
                <p class="cardp">' . $item["write"] . '</p>
                <a href="education_detail.php?lesson_id=' . $item["lesson_id"] . '&educator_id=' . $item["educator_id"] . '"><h5>Devamını Oku</h5></a>
               </div>';
            }
            ?>
        </div>
    </div>
</section>