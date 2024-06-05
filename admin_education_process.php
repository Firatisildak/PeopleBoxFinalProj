<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="packets/bootstrap/bootstrap.css">
    <title>Document</title>
    <?php
    session_start();
    include("views/admin_panel/admin_head.php");
    include("libs/functions/database_connection.php");
    include("libs/functions/user_all_func.php");
    include("libs/myclass.php");

    if ($_SESSION["LoggedIn"] == true) {
        //Alt satırdaki kod parçası bizim seçtiğimiz geçici dosyayı bizim belirlediğimiz $hedef_dizin = "img/"; konumuna kalıcı olar kayıt etmeyi sağlayan bir kod parçasıdır.
        if (isset($_FILES["dosya"])) {
            $dosya = $_FILES["dosya"]["tmp_name"];
            $yeniad = $_FILES["dosya"]["name"];
            $hedef_dizin = "img/education_Img/";
            $hedef_yol = $hedef_dizin . $yeniad;
            move_uploaded_file($dosya, $hedef_yol);
        }
        if (isset($_FILES["dosya2"])) {
            $dosya = $_FILES["dosya2"]["tmp_name"];
            $yeniad = $_FILES["dosya2"]["name"];
            $hedef_dizin = "img/education_Img/";
            $hedef_yol = $hedef_dizin . $yeniad;
            move_uploaded_file($dosya, $hedef_yol);
        }
        // alttaki if ve else if yapısı ile eğitimci ekleme silme ve güncelleme işlemi yapan fonksiyonu çağırıyorum.
        $educationSql = new sqlProcess();
        if (isset($_POST['educationSave'])) {
            $education_Id = $_POST["education_id"];
            $education_img = $_POST["education_img"]; //educator_name bu bizim iput ismimizdir.
            $education_title = $_POST["education_title"];
            $education_write = $_POST["education_write"];
            $educator_Id=$_POST["educator_id"];

            $params = [$education_img, $education_title, $education_write, $educator_Id];
            $params2 = [$education_img];
            $educationSql->sqlsorgu2('educationSave', 'INSERT INTO cardlesson (cardLessonImg, cardLessonTitle, cardLessonWrite, educatorId) VALUES (?, ?, ?, ?)', $params, 1, 'SELECT COUNT(*) FROM cardlesson WHERE cardLessonImg = ?', $params2);
        } else if (isset($_POST['educationDelete']) || isset($_POST['educationUpdate'])) {
            $education_Id = $_POST["education_id_seconds"];
            $education_img = $_POST["education_img_seconds"]; //educator_name bu bizim iput ismimizdir.
            $education_title = $_POST["education_title_seconds"];
            $education_write = $_POST["education_write_seconds"];
            $educator_Id=$_POST["educator_id_seconds"];
            $params = [$education_img, $education_title, $education_write,  $educator_Id, $education_Id];
            $educationSql->sqlsorgu2('educationUpdate', 'UPDATE cardlesson SET cardLessonImg=?, cardLessonTitle=?, cardLessonWrite=?, educatorId=? WHERE  cardLessonID=?', $params, 0, 0, 0);
            $educationSql->sqlsorgu2('educationDelete', 'Delete from cardlesson WHERE cardLessonImg=? And cardLessonTitle=? And cardLessonWrite=? AND educatorId=? AND cardLessonID=?', $params, 0, 0, 0);
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
    <h2 class="text-center text-primary">Eğitim İşlemleri</h2>
    <h3 class="offset-md-10"><i class="fa-solid fa-user fa-lg me-3"></i><?php echo $_SESSION["username"] ?></h3>
    <div class="container rowColor border inputOval mt-5 pb-3">
        <form class="input-group" action="admin_education_process.php" method="post" enctype="multipart/form-data">
            <div class="row">
                <div class="col-md-12 mt-3">
                    <div class="modal fade" id="saveEducationModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">KAYIT İŞLEMLERİ</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <input type="text" name="education_id" class="input-field inputOval mb-3 me-4 ps-4" placeholder="İd bölümü veri girilemez" readonly><!--readonly kodu ile sadece veri görünür ama veri girilemez.-->
                                    <input type="text" name="education_title" class="input-field inputOval mb-3 ps-4" placeholder="Eğitim başlığı">
                                    <input type="text" name="education_img" id="education_imgid" class="input-field inputOval mb-3 ps-4" placeholder="Eğitim Görseli">
                                    <input type="text" name="educator_id" class="input-field inputOval mb-3 ps-4" placeholder="Eğitimci İd'si">
                                    <!--Alttaki 3 satır bizim dosya düklemek için kullandığımız kodlar.devamı bu sayfanın en başında yer alıyor.-->
                                    <input type="file" name="dosya" id="fileInput" style="display: none;">
                                    <button type="button" class="mb-3 ms-4" onclick="document.getElementById('fileInput').click()">Görsel Seç</button>
                                    <script>
                                        function updateFileName(input) {
                                            // Seçilen dosyanın adını güncelleyen fonksiyon
                                            var fileName = input.value.split('\\').pop();
                                            document.getElementById('education_imgid').value = fileName;
                                        }
                                        document.getElementById('fileInput').addEventListener('change', function() {
                                            // Dosya seçildiğinde otomatik olarak formu gönderen fonksiyon
                                            updateFileName(this);
                                            document.getElementById('form').submit();
                                        });
                                    </script>
                                    <textarea rows="4" cols="50" type="text" name="education_write" class="input-field inputOval mb-3 me-4 ps-4" placeholder="Eğitim Hakkında"></textarea>
                                </div>
                                <div class="modal-footer">
                                    <button type="submit" class="submit-btn bg-danger inputOval" data-bs-dismiss="modal">Kapat</button>
                                    <button type="submit" name="educationSave" class="submit-btn btn-success inputOval">Yeni Kayıt için tıklayın.</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <button type="button" name="educationSave" class="inputOval btn-success" data-bs-toggle="modal" data-bs-target="#saveEducationModal">Yeni eğitimci kayıt işlemi için buraya tıklayın.</button></td>
                    <!--Alttaki kod parçası güncelleme işlemi için yazılmış bir modal yapısıdır.-->
                    <div class="modal fade" id="updateEducationModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">UYARI..!</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <input type="text" name="education_id_seconds" id="educationIdInput" class="input-field inputOval mb-3 me-4 ps-4" placeholder="İd bölümü veri girilemez" readonly><!--readonly kodu ile sadece veri görünür ama veri girilemez.-->
                                    <input type="text" name="education_title_seconds" id="educationTitleInput" class="input-field inputOval mb-3 ps-4" placeholder="Eğitim başlığı">
                                    <input type="text" name="education_img_seconds" id="educationImgInput" class="input-field inputOval mb-3 ps-4" placeholder="Eğitim Görseli">
                                    <input type="text" name="educator_id_seconds" id="educatorIdInput" class="input-field inputOval mb-3 ps-4" placeholder="Eğitimci İd'si">
                                    <!--ALt satır bizim yeni resim eklemek için kullandığımız buton yapısı-->
                                    <input type="file" name="dosya2" id="fileInput2" style="display: none;">
                                    <button type="button" class="mb-3 ms-4" onclick="document.getElementById('fileInput2').click()">Görsel Değiştir</button>
                                    <script>
                                        function updateFileName2(input) {
                                            // Seçilen dosyanın adını güncelleyen fonksiyon
                                            var fileName2 = input.value.split('\\').pop();
                                            document.getElementById('educationImgInput').value = fileName2;
                                        }
                                        document.getElementById('fileInput2').addEventListener('change', function() {
                                            // Dosya seçildiğinde otomatik olarak formu gönderen fonksiyon
                                            updateFileName2(this);
                                            document.getElementById('form').submit();
                                        });
                                    </script>
                                    <textarea rows="4" cols="50" type="text" name="education_write_seconds" id="educationWriteInput" class="input-field inputOval mb-3 me-4 ps-4" placeholder="Eğitim Hakkında"></textarea>
                                </div>
                                <div class="modal-footer">
                                    <button type="submit" class="submit-btn bg-danger inputOval" data-bs-dismiss="modal">Kapat</button>
                                    <button type="submit" name="educationUpdate" class="submit-btn btn-success inputOval">Değişiklikleri kaydet.</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php
                    //alttaki kod parçası bizim menülerimize modal yani uyarı mesajı veren bir fonksiyonu çağırıp oradaki değişiklikleri kaydet butonuna silme ve güncellem özelliklerini veriyor.
                    $educatorDelete = new sqlProcess();
                    $educatorDelete->siralammodal_ForDelete('deleteEducationModal', 'educationDelete');
                    ?>
                </div>
            </div>
        </form>
        <div class="row">
            <div class="col-md-12 mt-5">
                <table class="table table-hover" id="educationTableView">
                    <thead>
                        <tr>
                            <th scope="col">id</th>
                            <th scope="col">Eğitim Görseli</th>
                            <th scope="col">Eğitim Başlığı</th>
                            <th scope="col">Eğitim Hakkında</th>
                            <th scope="col">Eğitimci İd'si</th>
                            <th scope="col">İşlemler</th>
                        </tr>
                    </thead>
                    <?php
                    include("libs/functions/database_connection.php");
                    $menuItems = array();
                    //Alt'daki kod parçası bizim menüdeki kayıtlı verilerimizi getiriyor ve bu kodları bir foreach yapısı ile menülerin kayıt olduğu nav bar kısmındaki ilgili koda getiriyor.
                    $result = $db->query("SELECT * FROM cardlesson");
                    if ($result->rowCount() > 0) {
                        while ($row = $result->fetch(PDO::FETCH_ASSOC)) { //fetch(PDO::FETCH_ASSOC) yöntemi, sonuç kümesinden bir satırı alır ve bu satırı bir dizi olarak döndürür.
                            $menuItem = array("id" => $row["cardLessonID"], "img" => $row["cardLessonImg"], "title" => $row["cardLessonTitle"], "write" => $row["cardLessonWrite"], "educator_id" => $row["educatorId"]); //Döngü gövdesi kısmını özelleştirebilirsiniz. Bu bölümde, $row dizisinin herhangi bir özelliğini kullanabilirsiniz. Örneğin, $row['column_name'] şeklinde bir sütun adını kullanarak belirli bir sütundaki verilere erişebilirsiniz.
                            $menuItems[] = $menuItem; // Diziye her adımda bir öğe eklenir
                        }
                    } else {
                        echo "Veritabanında hiç veri bulunamadı.";
                    }

                    foreach ($menuItems as $item) {
                        echo ' <tbody>';
                        echo ' <tr>';
                        echo '<th scope="row">' . $item['id'] . '</th>';
                        echo '<td>' . $item['img'] . '</td>';
                        echo '<td>' . $item['title'] . '</td>';
                        echo '<td>' . $item['write'] . '</td>';
                        echo '<td>' . $item['educator_id'] . '</td>';
                        echo '<td><button type="button" name="educatorUpdate" class="bg-primary text-white inputOval" data-bs-toggle="modal" data-bs-target="#updateEducationModal">Güncelleme</button></td>';
                        echo '<td><button type="button" name="educationDelete" class="bg-danger text-white inputOval" data-bs-toggle="modal" data-bs-target="#deleteEducationModal">Silme</button></td>';
                        echo ' <tr>';
                        echo ' <tbody>';
                    }
                    ?>
                </table>
            </div>
        </div>
    </div>
    <script>
        const table1 = document.getElementById('educationTableView');
        const tableRows1 = table1.querySelectorAll('tbody tr');
        tableRows1.forEach(row => {
            row.addEventListener('click', () => {
                const educationid = row.cells[0].textContent;
                const educationimg = row.cells[1].textContent;
                const educationtitle = row.cells[2].textContent;
                const educationwrite = row.cells[3].textContent;
                const educatorid=row.cells[4].textContent;

                document.getElementById('educationIdInput').value = educationid;
                document.getElementById('educationImgInput').value = educationimg;
                document.getElementById('educationTitleInput').value = educationtitle;
                document.getElementById('educationWriteInput').value = educationwrite;
                document.getElementById('educatorIdInput').value=educatorid;
            });
        });
    </script>
    <script src="packets/bootstrap/bootstrap.js"></script>
</body>

</html>