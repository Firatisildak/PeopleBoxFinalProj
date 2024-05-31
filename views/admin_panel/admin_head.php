<button class="btn btn-danger" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasWithBothOptions" aria-controls="offcanvasWithBothOptions"><i class="fa-sharp fa-solid fa-arrow-right fa-2xl pt-3 pb-3 pe-3 ps-3"></i></button>
<div class="offcanvas offcanvas-start" data-bs-scroll="true" tabindex="-1" id="offcanvasWithBothOptions" aria-labelledby="offcanvasWithBothOptionsLabel">
  <div class="offcanvas-header bg-danger">
    <h5 class="offcanvas-title" id="offcanvasWithBothOptionsLabel"><i class="fa-solid fa-bars fa-2xl"></i>
      <h2>Menü</h2>
    </h5>
    <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
  </div>
  <div class="offcanvas-body  text-center">
    <div class="card card-body">
      <div class="accordion" id="accordionExample">
        <?php
        $menu_array1 = array(
          array("admin_MenuProcess", "Menü İşlemleri"),
          array("admin_EducatorInsert", "Eğitmen İşlemleri"),
          array("admin_educationProcess", "Ders İşlemleri"),
          array("admin_AboutProcess", "Hakkımızda İşlemler"),
          array("admin_EducatorInsert", "Örnek2 İşlemleri"),
          array("admin_EducatorInsert", "Örnek3 İşlemleri")
        );

        foreach ($menu_array1 as $array1) {
          $link = $array1[0] . '.php'; // İlk öğe yönlendirme veya işlem adını içerir
          $menuName = $array1[1]; // İkinci öğe menü adını içerir

          echo '<div class="accordion-item">';
          echo '<h3 class="accordion-header mt-2 mb-2">';
          echo '<a href="' . $link . '"><i class="fa-solid fa-pen fa-sm"></i>' . $menuName . '</a>';
          echo '</h3>';
          echo '</div>';
        }

        ?>
      </div>
    </div>
    <form class="input-group" method="post" action="admin_MenuProcess.php">
      <button type="submit" name="cikis" class="submit-btn mt-4 pe-3 bg-danger inputOval"><i class="fa-solid fa-right-from-bracket fa-2xl me-3 mt-3 mb-3 ms-3"></i>ÇIKIŞ</button>
    </form>
  </div>
</div>