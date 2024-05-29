<?php
include("header.php");
include("libs/functions/user_all_func.php");
?>
<section id="education">
  <div class="container">
    <h3 class="educationTitle">Eğitimler</h3>
    <h1 class="text-center">"html" için 10.000 sonuç</h1>
    <h3 class="text-center">HTML kursları kurslarını keşfedin</h3>
    <div class="row">
      <div class="col-md-3">
        <p class="text-center mt-5">
          <button class="btn btn-warning pe-5 ps-5" type="button" data-bs-toggle="collapse" data-bs-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
            Filtre
            <i class="fa-solid fa-filter fa-xl ms-3 me-3"></i>
          </button>
        </p>
        <div class="collapseMe visibleCollaps" id="collapseExample">
          <div class="card card-body">
            <div class="accordion" id="accordionExample">
              <div class="accordion-item">
                <h2 class="accordion-header">
                  <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                    Dİl
                  </button>
                </h2>
                <div id="collapseOne" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                  <div class="accordion-body">
                    <option value="1">One</option>
                    <option value="2">Two</option>
                    <option value="3">Three</option>
                  </div>
                </div>
              </div>
              <div class="accordion-item">
                <h2 class="accordion-header">
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                    Fiyat
                  </button>
                </h2>
                <div id="collapseTwo" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                  <div class="accordion-body">
                    <option value="1">One</option>
                    <option value="2">Two</option>
                    <option value="3">Three</option>
                  </div>
                </div>
              </div>
              <div class="accordion-item">
                <h2 class="accordion-header">
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                    Video Süresi
                  </button>
                </h2>
                <div id="collapseThree" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                  <div class="accordion-body">
                    <option value="1">One</option>
                    <option value="2">Two</option>
                    <option value="3">Three</option>
                  </div>
                </div>
              </div>
              <div class="accordion-item">
                <h2 class="accordion-header">
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                    Özellikler
                  </button>
                </h2>
                <div id="collapseFour" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                  <div class="accordion-body">
                    <option value="1">One</option>
                    <option value="2">Two</option>
                    <option value="3">Three</option>
                  </div>
                </div>
              </div>
              <div class="accordion-item">
                <h2 class="accordion-header">
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                    Konu
                  </button>
                </h2>
                <div id="collapseFive" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                  <div class="accordion-body">
                    <option value="1">One</option>
                    <option value="2">Two</option>
                    <option value="3">Three</option>
                  </div>
                </div>
              </div>
              <div class="accordion-item">
                <h2 class="accordion-header">
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseSix" aria-expanded="false" aria-controls="collapseSix">
                    Seviye
                  </button>
                </h2>
                <div id="collapseSix" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                  <div class="accordion-body">
                    <option value="1">One</option>
                    <option value="2">Two</option>
                    <option value="3">Three</option>
                  </div>
                </div>
              </div>
              <div class="accordion-item">
                <h2 class="accordion-header">
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseSeven" aria-expanded="false" aria-controls="collapseSeven">
                    Alt Yazı
                  </button>
                </h2>
                <div id="collapseSeven" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                  <div class="accordion-body">
                    <option value="1">One</option>
                    <option value="2">Two</option>
                    <option value="3">Three</option>
                  </div>
                </div>
              </div>
              <div class="accordion-item">
                <h2 class="accordion-header">
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseEight" aria-expanded="false" aria-controls="collapseEight">
                    Boyut
                  </button>
                </h2>
                <div id="collapseEight" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                  <div class="accordion-body">
                    <option value="1">One</option>
                    <option value="2">Two</option>
                    <option value="3">Three</option>
                  </div>
                </div>
              </div>
              <div class="accordion-item">
                <h2 class="accordion-header">
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseNight" aria-expanded="false" aria-controls="collapseNight">
                    Ülke
                  </button>
                </h2>
                <div id="collapseNight" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                  <div class="accordion-body">
                    <option value="1">One</option>
                    <option value="2">Two</option>
                    <option value="3">Three</option>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-12 mt-5 border pt-4 text-center">
          <h3>En iyi şirketler, çalışanlarına bu kursları sunmaktadır</h3>
          <p>Bu kurs, dünya genelindeki işletmelerin güvendiği ve en yüksek puan alan kurslardan oluşan koleksiyonumuz için seçilmiştir.</p>
          <div class="row">
            <div class="col-md-3 col-3"><a target="_blank" href="https://www.google.com.tr/"><i class="fa-brands fa-microsoft fa-2xl mb-5"></i></a></div>
            <div class="col-md-3 col-3"><a target="_blank" href="https://www.google.com.tr/"><i class="fa-brands fa-google fa-2xl mb-5"></i></a></div>
            <div class="col-md-3 col-3"><a target="_blank" href="https://www.google.com.tr/"><i class="fa-solid fa-code fa-2xl mb-5"></i></a></div>
            <div class="col-md-3 col-3"><a target="_blank" href="https://www.google.com.tr/"><i class="fa-brands fa-twitch fa-2xl mb-5"></i></a></div>
          </div>
        </div>
      </div>
      <div class="col-md-9">
        <div class="row mt-5">
          <div class="col-md-4 col-4">
            <a href="education_Detail.php"><img src="img/education_img/r1.jpg" alt="logo" class="img-fluid"></a>
          </div>
          <div class="col-md-8 col-8 leanLeft">
            <h5>HTML5 ve CSS3 Eğitimleri</h5>
            <p>sıfırdan ileri düzey eğitim serisi. Bu kurs, dünya genelindeki işletmelerin güvendiği ve en yüksek puan alan kurslardan oluşan koleksiyonumuz için seçilmiştir</p>
            <p>36,5 Saat Eğitim içeriği ve 20 adet Uygulamalı Etkinlik.</p>
            <span class="star-rating"><i class="fas fa-star"></i></span>
            <span class="star-rating"><i class="fas fa-star"></i></span>
            <span class="star-rating"><i class="fas fa-star"></i></span>
            <span class="star-rating"><i class="fas fa-star"></i></span>
            <span class="star-rating"><i class="fas fa-star"></i></span>
          </div>
          <hr class="mt-5">
        </div>
        <div class="row mt-3">
          <div class="col-md-4 col-4">
            <a href="education_Detail.php"><img src="img/education_Img/r2.jpg" alt="logo" class="img-fluid"></a>
          </div>
          <div class="col-md-8 col-8 leanLeft">
            <h5>HTML5 ve CSS3 Eğitimleri</h5>
            <p>sıfırdan ileri düzey eğitim serisi. Bu kurs, dünya genelindeki işletmelerin güvendiği ve en yüksek puan alan kurslardan oluşan koleksiyonumuz için seçilmiştir</p>
            <p>36,5 Saat Eğitim içeriği ve 20 adet Uygulamalı Etkinlik.</p>
            <span class="star-rating"><i class="fas fa-star"></i></span>
            <span class="star-rating"><i class="fas fa-star"></i></span>
            <span class="star-rating"><i class="fas fa-star"></i></span>
            <span class="star-rating"><i class="fas fa-star"></i></span>
            <span class="star-rating"><i class="fas fa-star"></i></span>
          </div>
          <hr class="mt-5">
        </div>
        <div class="row mt-3">
          <h3 class="mb-5">En Çok Satan Kurslar</h3>
          <!--alttaki her satırda "data-merge=1.5" özelliğini kullandım çünkü cardların own yapısındaki şekle oturması gerekiyor. kullandığım fotoğrafların yapısı own yapısına büyük geldi ve ben bu sorunu böyle çözdüm -->
          <div class="owl-carousel own-theme text-center">
            <?php
            $menuItems2 = array();
            //Alt'daki kod parçası bizim kayıtlı derslerimizi getiriyor ve bu kodları bir foreach yapısı ile derslerimizi kayıt ilgili koda getiriyor.
            $result2 = $db->query("SELECT cardLessonImg, cardLessonTitle, cardLessonWrite FROM cardlesson");
            if ($result2->rowCount() > 0) {
              while ($row = $result2->fetch(PDO::FETCH_ASSOC)) { //fetch(PDO::FETCH_ASSOC) yöntemi, sonuç kümesinden bir satırı alır ve bu satırı bir dizi olarak döndürür.
                $menuItem2 = array("lessonimg" => $row["cardLessonImg"], "title" => $row["cardLessonTitle"], "write" => $row["cardLessonWrite"]); //Döngü gövdesi kısmını özelleştirebilirsiniz. Bu bölümde, $row dizisinin herhangi bir özelliğini kullanabilirsiniz. Örneğin, $row['column_name'] şeklinde bir sütun adını kullanarak belirli bir sütundaki verilere erişebilirsiniz.
                $menuItems2[] = $menuItem2; // Diziye her adımda bir öğe eklenir
              }
            } else {
              echo "Veritabanında hiç veri bulunamadı.";
            }
            // alttaki her satırda "data-merge=1.5" özelliğini kullandım çünkü cardların own yapısındaki şekle oturması gerekiyor. kullandığım fotoğrafların yapısı own yapısına büyük geldi ve ben bu sorunu böyle çözdüm.
            foreach ($menuItems2 as $item) {
              echo '<div class="card" data-merge="1.5">';
              echo '<a href="education_Detail.php"><img src="img/education_img/' . $item["lessonimg"] . '" alt="logo" class="img-fluid"></a>';
              echo '<h5 class="titleCard">' . $item["title"] . '</h5>';
              echo '<p class="cardp">' . $item["write"] . '</p>';
              echo '</div>';
            }
            ?>
          </div>
        </div>
        <div class="row mt-2">
          <div class="col-md-4 col-4">
            <a href="education_Detail.php"><img src="img/education_img/r3.jpg" alt="logo" class="img-fluid"></a>
          </div>
          <div class="col-md-8 col-8 leanLeft">
            <h5>HTML5 ve CSS3 Eğitimleri</h5>
            <p>sıfırdan ileri düzey eğitim serisi. Bu kurs, dünya genelindeki işletmelerin güvendiği ve en yüksek puan alan kurslardan oluşan koleksiyonumuz için seçilmiştir</p>
            <p>36,5 Saat Eğitim içeriği ve 20 adet Uygulamalı Etkinlik.</p>
            <span class="star-rating"><i class="fas fa-star"></i></span>
            <span class="star-rating"><i class="fas fa-star"></i></span>
            <span class="star-rating"><i class="fas fa-star"></i></span>
            <span class="star-rating"><i class="fas fa-star"></i></span>
            <span class="star-rating"><i class="fas fa-star"></i></span>
          </div>
          <hr class="mt-5">
        </div>
        <div class="row mt-5">
          <div class="col-md-4 col-4">
            <a href="education_Detail.php"><img src="img/education_Img/r4.jpg" alt="logo" class="img-fluid"></a>
          </div>
          <div class="col-md-8 col-8 leanLeft">
            <h5>HTML5 ve CSS3 Eğitimleri</h5>
            <p>sıfırdan ileri düzey eğitim serisi. Bu kurs, dünya genelindeki işletmelerin güvendiği ve en yüksek puan alan kurslardan oluşan koleksiyonumuz için seçilmiştir</p>
            <p>36,5 Saat Eğitim içeriği ve 20 adet Uygulamalı Etkinlik.</p>
            <span class="star-rating"><i class="fas fa-star"></i></span>
            <span class="star-rating"><i class="fas fa-star"></i></span>
            <span class="star-rating"><i class="fas fa-star"></i></span>
            <span class="star-rating"><i class="fas fa-star"></i></span>
            <span class="star-rating"><i class="fas fa-star"></i></span>
          </div>
          <hr class="mt-5">
        </div>
      </div>
    </div>
  </div>
  <?php
    include("footer.php");
  ?>
</section>
<!-- aşağıdaki javaacript kodu yıldızların işaretlenebilir hale gelmesini sağlıyor. -->
<script>
  const stars = document.querySelectorAll('.star-rating');

  stars.forEach((star, index) => {
    star.addEventListener('click', () => {
      stars.forEach((s, i) => {
        if (i <= index) {
          s.classList.add('selected');
        } else {
          s.classList.remove('selected');
        }
      });
    });
  });
</script>
<!--alt satır own Carouselden bilgisyarımızda olmayan kısmı yani kütüphanesini netten çağırmak için kullandığımız link -->
<script src="https://code.jquery.com/jquery-3.6.4.slim.min.js" integrity="sha256-a2yjHM4jnF9f54xUQakjZGaqYs/V1CYvWpoqZzC2/Bw=" crossorigin="anonymous"></script>
<!--alt satırdaki bağlantıyı own Carouselden indirmiş olduğum owl dosyasındaki bağlantılar ile bağladım card yapıları kendi kendine kaya bilsin diye. javascript kısmı-->
<script src="owl/owl.carousel.min.js"></script>
<!--alt satır bootstrap bağlantısını sağlıyor.-->
<script src="bootstrap.js"></script>
<!--alt satır bizim javascript kısmımız ile bağlantıyı sağlıyor. Bu bağlantıyı en alta yazdım çünkü kart yapısını oluşturmadan javascript dosyasını oluşturmak mantıklı değil.-->
<script src="owl/script.js"></script>
</body>

</html>