<?php
include("views/normal_panel/header.php");
include("views/normal_panel/navbar.php");
include("libs/functions/user_all_func.php");
include("libs/functions/database_connection.php");

?>
<div class="container">
  <div class="row" id="black_Row">
    <div class="col-md-6 text-center mt-4" id="mainContent">
      <h2>Eğitim Hakkında</h2>
      <?php
      $lesson_id = $_GET["lesson_id"]; // Parametre alınır, güvenliğe dikkat edin.

      $result = $db->query("SELECT cardLessonWrite FROM cardlesson WHERE cardLessonID = $lesson_id");
      $row = $result->fetch(PDO::FETCH_ASSOC);

      echo '<div class="lesson-content">';
      echo $row["cardLessonWrite"];
      echo '</div>';
      ?>
    </div>
    <div class="col-md-6 mt-4 mb-4 text-center">
      <?php
      // education_Detail.php
      $educator_id = $_GET["educator_id"]; // Parametre alınır, güvenliğe dikkat edin.

      // Veritabanından dersin tam metnini alın
      $result2 = $db->query("SELECT * FROM educator_table WHERE educatorId = $educator_id");
      $row2 = $result2->fetch(PDO::FETCH_ASSOC);

      echo '<img src="img/educator_img/' . $row2["imgLink"] . '" class="img-fluid oval">';
      echo '<h4 class="educatorName">' . $row2["nameSurname"] . '</h4>';
      echo '<p class="educatorp">';
      echo '' . $row2["aboutWrite"] . '';
      echo '</p>';
      echo ' <div class="egitmen-icon">';
      echo ' <a href="' . $row2["faceLink"] . '"><i class="fa-brands fa-facebook social"></i></a>';
      echo ' <a href="' . $row2["linkedinLink"] . '"><i class="fa-brands fa-linkedin social"></i></a>';
      echo '<a href="' . $row2["githubLink"] . '"><i class="fa-brands fa-github social"></i></a>';
      echo '</div>';
      ?>
    </div>
  </div>
</div>
<div class="container">
  <div class="row mt-5">
    <h3 class="title_Center">Öğrenecekleriniz :</h3>
    <div class="col-md-4 col-12 order-lg-2 mb-4"> <!-- order-md-1 sınıfı eklendi -->
      <div class="card">
        <div class="ratio ratio-16x9">
          <iframe src="https://www.youtube.com/embed/3EGZBWNBSSk" frameborder="0"></iframe>
        </div>
        <h3 class="title_Center"><i class="fa-solid fa-turkish-lira-sign mt-4"></i>84,99</h3>
        <button type="button" class="btn btn-primary me-5 ms-5 mb-5">Sepete Ekle</button>
        <div id="writeCenter">
          <h3 class="mb-5">Bu kursun içeriği :</h3>
          <p><i class="fa-brands fa-youtube icon mb-3"></i>26,5 saatlik video içeriği</p>
          <p><i class="fa-sharp fa-solid fa-circle-down icon mb-3"></i>32 İndirilebilir kaynak</p>
          <p><i class="fa-solid fa-infinity icon mb-3"></i>Ömür boyu tam erişim</p>
          <p><i class="fa-solid fa-mobile icon mb-3"></i>Mobil ve TV'den erişim</p>
          <p><i class="fa-solid fa-newspaper icon mb-3"></i>2 Adet Makale</p>
          <p><i class="fa-solid fa-trophy icon"></i>Katılım sertifikası</p>
          <h3>5 veya daha fazla kişiye mi eğitim veriyorsunuz?</h3>
          <p>Ekibinize Fırat Akademi'nin en iyi 19.000+ kursuna istedikleri zaman istedikleri yerden erişebilme imkanı sağlayın.</p>
        </div>
      </div>
    </div>
    <div class="col-md-8 border-lg-1">
      <div class="row">
        <div class="col-md-6 border global_Color pt-4">
          <div class="d-flex">
            <i class="fa-solid fa-check icon"></i>
            <p>Hiçbir programlama bilgisine sahip olmasanız dahi bu kursa rahatlıkla başlayabileceksiniz.</p>
          </div>
          <div class="d-flex">
            <i class="fa-solid fa-check icon"></i>
            <p>Web Geliştirici olmak için tüm konuları öğrenmiş olacaksınız.</p>
          </div>
          <div class="d-flex">
            <i class="fa-solid fa-check icon"></i>
            <p>Bir blog sitesi tasarlayıp bu sitelerden para kazanabileceksiniz.</p>
          </div>
          <div class="d-flex">
            <i class="fa-solid fa-check icon"></i>
            <p>Bootstrap ile modern görünümlü web sayfaları oluşturabileceksiniz.</p>
          </div>
        </div>
        <div class="col-md-6 border global_Color pt-4">
          <div class="d-flex">
            <i class="fa-solid fa-check icon"></i>
            <p>Programlamanın iskeleti olan konuları öğrenerek programlamanın en önemli temelini atmış olacaksınız.</p>
          </div>
          <div class="d-flex">
            <i class="fa-solid fa-check icon"></i>
            <p>HTML ve CSS kodlamayı öğrenerek efektif web siteleri oluşturabileceksiniz.</p>
          </div>
          <div class="d-flex">
            <i class="fa-solid fa-check icon"></i>
            <p>Javascript ile beraber etkileşimli web siteleri oluşturabileceksiniz.</p>
          </div>
          <div class="d-flex">
            <i class="fa-solid fa-check icon"></i>
            <p>JQuery kütüphanesini öğrenerek etkin ve efektif javascript kodlayabileceksiniz.</p>
          </div>
        </div>
        <div class="col-md-12 mt-5 border global_Color pt-4">
          <h3>En iyi şirketler, çalışanlarına bu kursu sunmaktadır</h3>
          <p>Bu kurs, dünya genelindeki işletmelerin güvendiği ve en yüksek puan alan kurslardan oluşan koleksiyonumuz için seçilmiştir.</p>
          <a target="_blank" href="https://www.google.com.tr/"><i class="fa-brands fa-microsoft fa-2xl me-5 ms-5 mb-5"></i></a>
          <a target="_blank" href="https://www.google.com.tr/"><i class="fa-brands fa-google fa-2xl me-5 mb-5"></i></a>
          <a target="_blank" href="https://www.google.com.tr/"><i class="fa-solid fa-code fa-2xl me-5 mb-5"></i></a>
          <a target="_blank" href="https://www.google.com.tr/"><i class="fa-brands fa-twitch fa-2xl me-5 mb-5"></i></a>
        </div>
        <h3 class="title_Center mt-5">Ders içerikleri:</h3>
        <div class="accordion mb-5" id="accordionExample">
          <div class="accordion-item">
            <h2 class="accordion-header">
              <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                Kurulumlar
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
                HTML5 Kullanımı
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
                İleri Seviye HTML
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
                CSS-Temel Seviye
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
                CSS-Orta Seviye
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
                CSS-İleri Seviye
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
                CSS-Responsive Tasarım
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
                Uygulama-Responsive Sİte Oluşturma
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
                Bootstrap 5
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
  </div>
</div>
<?php
 include("views/normal_panel/footer.php");
?>
</body>

</html>