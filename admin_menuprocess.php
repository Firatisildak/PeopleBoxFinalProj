<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0,user-scalable=0"> <!--user-scalable=0 bu kod ile sitenin mobilde yakınlaşırma ve uzaklaştırmayı önlüyor.-->
    <!--alt satır bizim bootstrap ile olan bağlantımızın css kısmını bağlıyor.-->
    <link rel="stylesheet" href="packets/bootstrap/bootstrap.css">
    <title>Yönetici Anasayfa</title>
    <!--Alt'daki php kod parçası bizim her sayfa için ayrı olan css dosyalarının bağlantı koşullarını burada oluşturuyor.-->
    <?php
    session_start();
    include("libs/functions/database_connection.php");
    include("libs/functions/user_all_func.php");
    include("libs/myclass.php");
    //Alt satırdaki kod parçası bizim adminimizin girişini kontrol etmmemizi sağlıyor.
    $admin = new sqlProcess();
    $admin->__construct();
    $admin->loginControl('girisAdmin', 'SELECT * FROM adminlogin WHERE name=? ', 'name', 'name' ,'pass', 'admin');//girisAdmin=login sayfasındaki buton ismi.

    if ($_SESSION["LoggedIn"] == true) {
        $menuSql = new sqlProcess();
        //alttaki if ve else if yapısı ile menü ekleme silme ve güncelleme işlemi yapan fonksiyonu çağırıyorum.
        if (isset($_POST['menuSave'])) {
            $menu_name = $_POST["menu_name"];
            $menu_url = $_POST['menu_url'];
            $menu_icon = $_POST['menu_icon'];
            $menu_siralama = $_POST['menu_siralama'];

            $params = [$menu_name, $menu_url, $menu_icon, $menu_siralama];
            $params2 = [$menu_name, $menu_url];
            $menuSql->sqlsorgu2('menuSave', 'INSERT INTO menutable (menuName, menuUrl, menuIcon, siralama) VALUES (?, ?, ?, ?)', $params, 1, 'SELECT COUNT(*) FROM menutable WHERE menuName = ? OR menuUrl=?', $params2);
        } else if (isset($_POST['menuUpdate']) || isset($_POST['menuDelete'])) {
            $menu_id = $_POST["menu_id_seconds"];
            $menu_name = $_POST["menu_name_seconds"];
            $menu_url = $_POST["menu_url_seconds"];
            $menu_icon = $_POST["menu_icon_seconds"];
            $menu_siralama = $_POST["menu_siralama_seconds"];
            $params = [$menu_name, $menu_url, $menu_icon, $menu_siralama,  $menu_id];
            $menuSql->sqlsorgu2('menuUpdate', 'UPDATE menutable SET menuName = ?, menuUrl = ?, menuIcon = ?, siralama = ? WHERE id = ?', $params, 0, 0, 0); // bu satır menü güncelleme işlemi yapıyor.
            $menuSql->sqlsorgu2('menuDelete', 'DELETE FROM menutable WHERE menuName=? AND menuUrl=? AND menuIcon=? And siralama=? And id=?', $params, 0, 0, 0); // bu satır menü silme işlemi yapıyor.*/  
        }
    } else {
        goAndComeBack("admin_login.php", 0, 1);
    }
    //aşağıdakiyapı ile 1 saatlik oturum açılıyor.
    logoutAdmin();
    include("views/admin_panel/admin_head.php");
    ?>
    <!--alt satır font awesome ile bağlantıyı sağlıyor-->
    <script src="https://kit.fontawesome.com/0761d8fd00.js" crossorigin="anonymous"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <!--alt satır yazı fontu için seçmiş olduğum kütüphane linki-->
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans&display=swap" rel="stylesheet">
</head>
<style>
    body {
        background-color: #CCCCCC;
    }
</style>

<body>
    <h2 class="text-center text-primary">Menü İşlemleri</h2>
    <link rel="stylesheet" href="css/education_style.css">
    <h3 class="offset-md-10"><i class="fa-solid fa-user fa-lg me-3"></i><?php echo $_SESSION["username"] ?></h3>
    <div class="container rowColor border inputOval mt-5 pb-3">
        <form id="Login" class="input-group" action="admin_menuprocess.php" method="post">
            <div class="row">
                <div class="col-md-12 mt-3">
                    <!--Alttaki kod parçası güncelleme işlemi için yazılmış bir modal yapısıdır.-->
                    <div class="modal fade" id="saveModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">KAYIT İŞLEMLERİ</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <input type="text" name="menu_id" class="input-field inputOval mb-3 me-4 ps-4" placeholder="İd bölümü veri girilemez" readonly><!--readonly kodu ile sadece veri görünür ama veri girilemez.-->
                                    <input type="text" name="menu_name" class="input-field inputOval mb-3 ps-4" placeholder="Menü ismi">
                                    <input type="text" name="menu_url" class="input-field inputOval mb-3 mb-3 me-4 ps-4" placeholder="Menü Url">
                                    <input type="text" name="menu_icon" class="input-field inputOval mb-3 ps-4" placeholder="Menü İkon">
                                    <input type="text" name="menu_siralama" class="input-field inputOval mb-3 me-4 ps-4" placeholder="Menü Sıralama">
                                </div>
                                <div class="modal-footer">
                                    <button type="submit" class="submit-btn bg-danger inputOval" data-bs-dismiss="modal">Kapat</button>
                                    <button type="submit" name="menuSave" class="submit-btn btn-success inputOval">Yeni Kayıt için tıklayın.</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal fade" id="updateModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">UYARI..!</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <input type="text" name="menu_id_seconds" id="menuIdInput" class="input-field inputOval mb-3 me-4 ps-4" placeholder="İd bölümü veri girilemez" readonly>
                                    <input type="text" name="menu_name_seconds" id="menuNameInput" class="input-field inputOval mb-3 ps-4" placeholder="Menü ismi">
                                    <input type="text" name="menu_url_seconds" id="menuUrlInput" class="input-field inputOval mb-3 me-4 ps-4" placeholder="Menü Url">
                                    <input type="text" name="menu_icon_seconds" id="menuIconInput" class="input-field inputOval mb-3 ps-4" placeholder="Menü İkon">
                                    <input type="number" id="menuSiralamaInput" name="menu_siralama_seconds" class="inputOval ps-4">
                                </div>
                                <div class="modal-footer">
                                    <button type="submit" class="submit-btn bg-danger inputOval" data-bs-dismiss="modal">Kapat</button>
                                    <button type="submit" name="menuUpdate" class="submit-btn btn-success inputOval">Değiklikleri kaydet.</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 mt-3">
                    <button type="button" name="menuSave" class="inputOval btn-success" data-bs-toggle="modal" data-bs-target="#saveModal">Yeni menü kayıt işlemi için buraya tıklayın.</button></td>
                    <?php
                    //alttaki kod parçası bizim menülerimize modal yani uyarı mesajı veren bir fonksiyonu çağırıp oradaki değişiklikleri kaydet butonuna silme ve güncellem özelliklerini veriyor.
                    // Modalı oluşturan fonksiyonu çağırın.
                    $menuDelete = new sqlProcess();
                    $menuDelete->siralammodal_ForDelete('deleteModal', 'menuDelete');
                    ?>
                </div>
            </div>
        </form>
        <div class="row">
            <div class="col-md-12 border mt-5">
                <table class="table table-hover" id="menuTableView">
                    <thead>
                        <tr>
                            <th scope="col">id</th>
                            <th scope="col">Menü Adı</th>
                            <th scope="col">Menü Url</th>
                            <th scope="col">Menü İkon</th>
                            <th scope="col">Menü Sırası</th>
                            <th scope="col">İşlemler</th>
                        </tr>
                    </thead>
                    <?php
                    $menuItems = array();
                    //Alt'daki kod parçası bizim menüdeki verilerimizi getiriyor.
                    $result = $db->query("SELECT * FROM menutable ORDER BY siralama ASC");
                    if ($result->rowCount() > 0) {
                        while ($row = $result->fetch(PDO::FETCH_ASSOC)) { //fetch(PDO::FETCH_ASSOC) yöntemi, sonuç kümesinden bir satırı alır ve bu satırı bir dizi olarak döndürür.
                            $menuItem = array("id" => $row["id"], "menuName" => $row["menuName"], "menuUrl" => $row["menuUrl"], "menuIcon" => $row["menuIcon"], "siralama" => $row["siralama"]); //Döngü gövdesi kısmını özelleştirebilirsiniz. Bu bölümde, $row dizisinin herhangi bir özelliğini kullanabilirsiniz. Örneğin, $row['column_name'] şeklinde bir sütun adını kullanarak belirli bir sütundaki verilere erişebilirsiniz.
                            $menuItems[] = $menuItem; // Diziye her adımda bir öğe eklenir
                        }
                    } else {
                        echo "Veritabanında hiç veri bulunamadı.";
                    }

                    foreach ($menuItems as $item) {
                        echo ' <tbody>';
                        echo ' <tr>';
                        echo '<th scope="row">' . $item['id'] . '</th>';
                        echo '<td>' . $item['menuName'] . '</td>';
                        echo '<td>' . $item['menuUrl'] . '</td>';
                        echo '<td>' . $item['menuIcon'] . '</td>';
                        echo '<td>' . $item['siralama'] . '</td>';
                        echo '<td><button type="button" name="menuUpdate" class="bg-primary inputOval text-white" data-bs-toggle="modal" data-bs-target="#updateModal">Güncelleme</button></td>';
                        echo '<td><button type="button" name="menuDelete" class="bg-danger inputOval text-white" data-bs-toggle="modal" data-bs-target="#deleteModal">Silme</button></td>';
                        echo ' <tr>';
                        echo ' <tbody>';
                    }
                    ?>
                </table>
            </div>
        </div>
    </div>
    <script src="packets/bootstrap/bootstrap.js"></script>
    <script>
        //Alt' daki kod parçası bizim tablodaki tıkladığımız veriyi inputların içine getiriyor.
        // Tablodaki satırları seçmek için tüm tablo satırlarını alırız
        // Tabloyu seçmek için tablonun ID numarasını kullanırız
        const table = document.getElementById('menuTableView');

        //Bunun için querySelectorAll yöntemi kullanılır ve tbody tr seçicisiyle tablonun tbody etiketi içerisindeki tüm tr (satır) elementleri seçilir.
        const tableRows = table.querySelectorAll('tbody tr');

        // Her satırın tıklanabilir olmasını sağlarız
        tableRows.forEach(row => {
            row.addEventListener('click', () => { // Her bir satır için addEventListener işlevi çağrılır ve 'click' olayı için bir olay dinleyicisi tanımlanır. Yani, herhangi bir satır tıklanırsa bu olay tetiklenecektir.
                // Seçili satırın verilerini alırız
                const menuId = row.cells[0].textContent; //row.cells[0] ifadesi, tıklanan satırın hücrelerinin bir dizisi olan cells özelliğine erişir. 
                const menuName = row.cells[1].textContent; //textContent özelliği ise hücrenin içeriğine erişmek için kullanılır.
                const menuUrl = row.cells[2].textContent;
                const menuIcon = row.cells[3].textContent;
                const menuSiralama = row.cells[4].textContent;

                // Input alanlarına verileri yerleştiririz
                document.getElementById('menuIdInput').value = menuId;
                document.getElementById('menuNameInput').value = menuName;
                document.getElementById('menuUrlInput').value = menuUrl;
                document.getElementById('menuIconInput').value = menuIcon;
                document.getElementById('menuSiralamaInput').value = menuSiralama;
            });
        });
    </script>
</body>

</html>