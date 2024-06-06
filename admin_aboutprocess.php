<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--alt satır bizim bootstrap ile olan bağlantımızın css kısmını bağlıyor.-->
    <link rel="stylesheet" href="packets/bootstrap/bootstrap.css">
    <title>Document</title>
    <?php
    session_start();
    include("views/admin_panel/admin_head.php");
    include("libs/functions/database_connection.php");
    include("libs/functions/user_all_func.php");
    include("libs/myclass.php");

    if ($_SESSION["LoggedIn"] == true) {
        // alttaki if ve else if yapısı ile eğitimci ekleme silme ve güncelleme işlemi yapan fonksiyonu çağırıyorum.
        $educatorSql = new sqlProcess();
        if (isset($_POST['aboutSave'])) {
            $about_Id = $_POST["about_id"];
            $about_text = $_POST["about_text"]; //educator_name bu bizim input ismimizdir.

            $params = [$about_text];
            $params2 = [$about_Id];
            $educatorSql->sqlsorgu2('aboutSave', 'INSERT INTO about(aboutText) VALUES (?)', $params, 1, 'SELECT COUNT(*) FROM about WHERE aboutID = ?', $params2);
        } else if (isset($_POST['aboutDelete']) || isset($_POST['aboutUpdate'])) {
            $about_Id = $_POST["about_id_seconds"];
            $about_text = $_POST["about_text_seconds"]; //educator_name bu bizim buton ismimizdir.
            $params = [$about_text, $about_Id];
            $educatorSql->sqlsorgu2('aboutUpdate', 'UPDATE about SET aboutText=? WHERE  aboutID=?', $params, 0, 0, 0);
            $educatorSql->sqlsorgu2('aboutDelete', 'Delete from about WHERE aboutText=? AND aboutID=?', $params, 0, 0, 0);
        }
    } else {
        goAndComeBack("admin_Login.php", 0, 1);
    }
    //aşağıdakiyapı ile 1 saatlik oturum açılıyor.
    logoutAdmin();
    ?>
    <link rel="stylesheet" href="css/education_style.css">
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
</head>

<body>
    <h2 class="text-center text-primary">Hakkımızda İşlemleri</h2>
    <h3 class="offset-md-10"><i class="fa-solid fa-user fa-lg me-3"></i><?php echo $_SESSION["username"] ?></h3>
    <div class="container rowColor border inputOval mt-5 pb-3">
        <form class="input-group" action="admin_AboutProcess.php" method="post" enctype="multipart/form-data">
            <div class="row">
                <div class="col-md-12 mt-3">
                    <div class="modal fade" id="saveAboutModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">KAYIT İŞLEMLERİ</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <input type="text" name="about_id" class="input-field inputOval mb-3 me-4 ps-4" placeholder="İd bölümü veri girilemez" readonly><!--readonly kodu ile sadece veri görünür ama veri girilemez.-->
                                    <textarea type="text" rows="4" cols="50" name="about_text" class="input-field inputOval mb-3 ps-4" placeholder="Hakkımızda yazısı"></textarea>
                                </div>
                                <div class="modal-footer">
                                    <button type="submit" class="submit-btn bg-danger inputOval" data-bs-dismiss="modal">Kapat</button>
                                    <button type="submit" name="aboutSave" class="submit-btn btn-success inputOval">Yeni Kayıt için tıklayın.</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <button type="button" name="aboutSave" class="inputOval btn-success" data-bs-toggle="modal" data-bs-target="#saveAboutModal">Yeni Hakkımızda yazısı kayıt işlemi için buraya tıklayın.</button></td>
                    <!--Alttaki kod parçası güncelleme işlemi için yazılmış bir modal yapısıdır.-->
                    <div class="modal fade" id="updateAboutModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">UYARI..!</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <input type="text" name="about_id_seconds" id="aboutIdInput" class="input-field inputOval mb-3 me-4 ps-4" placeholder="İd bölümü veri girilemez" readonly><!--readonly kodu ile sadece veri görünür ama veri girilemez.-->
                                    <textarea type="text" rows="4" cols="50" id="aboutTextInput" name="about_text_seconds" class="input-field inputOval mb-3 ps-4" placeholder="Hakkımızda yazısı"></textarea>
                                </div>
                                <div class="modal-footer">
                                    <button type="submit" class="submit-btn bg-danger inputOval" data-bs-dismiss="modal">Kapat</button>
                                    <button type="submit" name="aboutUpdate" class="submit-btn btn-success inputOval">Değişiklikleri kaydet.</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php
                    //alttaki kod parçası bizim menülerimize modal yani uyarı mesajı veren bir fonksiyonu çağırıp oradaki değişiklikleri kaydet butonuna silme ve güncellem özelliklerini veriyor.
                    $aboutDelete = new sqlProcess();
                    $aboutDelete->siralammodal_ForDelete('deleteAboutModal', 'aboutDelete');
                    ?>
                </div>
            </div>
        </form>
        <div class="row">
            <div class="col-md-12 mt-5">
                <table class="table table-hover" id="aboutTableView">
                    <thead>
                        <tr>
                            <th scope="col">id</th>
                            <th scope="col">Text</th>
                        </tr>
                    </thead>
                    <?php
                     include("libs/functions/database_connection.php");
                    $menuItems = array();
                    //Alt'daki kod parçası bizim menüdeki kayıtlı verilerimizi getiriyor ve bu kodları bir foreach yapısı ile menülerin kayıt olduğu nav bar kısmındaki ilgili koda getiriyor.
                    $result = $db->query("SELECT * FROM about");
                    if ($result->rowCount() > 0) {
                        while ($row = $result->fetch(PDO::FETCH_ASSOC)) { //fetch(PDO::FETCH_ASSOC) yöntemi, sonuç kümesinden bir satırı alır ve bu satırı bir dizi olarak döndürür.
                            $menuItem = array("id" => $row["aboutID"],"text" => $row["aboutText"]); //Döngü gövdesi kısmını özelleştirebilirsiniz. Bu bölümde, $row dizisinin herhangi bir özelliğini kullanabilirsiniz. Örneğin, $row['column_name'] şeklinde bir sütun adını kullanarak belirli bir sütundaki verilere erişebilirsiniz.
                            $menuItems[] = $menuItem; // Diziye her adımda bir öğe eklenir
                        }
                    } else {
                        echo "Veritabanında hiç veri bulunamadı.";
                    }

                    foreach ($menuItems as $item) {
                        echo ' <tbody>';
                        echo ' <tr>';
                        echo '<th scope="row">' . $item['id'] . '</th>';
                        echo '<td>' . $item['text'] . '</td>';
                        echo '<td><button type="button" name="aboutUpdate" class="bg-primary text-white inputOval" data-bs-toggle="modal" data-bs-target="#updateAboutModal">Güncelleme</button></td>';
                        echo '<td><button type="button" name="aboutDelete" class="bg-danger text-white inputOval" data-bs-toggle="modal" data-bs-target="#deleteAboutModal">Silme</button></td>';
                        echo ' <tr>';
                        echo ' <tbody>';
                    }
                    ?>
                </table>
            </div>
        </div>
    </div>
    <script>
        const table1 = document.getElementById('aboutTableView');
        const tableRows1 = table1.querySelectorAll('tbody tr');
        tableRows1.forEach(row => {
            row.addEventListener('click', () => {
                const aboutid = row.cells[0].textContent;
                const aboutText = row.cells[1].textContent;

                document.getElementById('aboutIdInput').value = aboutid;
                document.getElementById('aboutTextInput').value = aboutText;
            });
        });
    </script>
    <script src="packets/bootstrap/bootstrap.js"></script>
</body>

</html>