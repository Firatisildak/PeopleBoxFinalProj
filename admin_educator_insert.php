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
        //Alt satırdaki kod parçası bizim seçtiğimiz geçici dosyayı bizim belirlediğimiz $hedef_dizin = "img/"; konumuna kalıcı olar kayıt etmeyi sağlayan bir kod parçasıdır.
        if (isset($_FILES["dosya"])) {
            $dosya = $_FILES["dosya"]["tmp_name"];
            $yeniad = $_FILES["dosya"]["name"];
            $hedef_dizin = "img/educator_Img/";
            $hedef_yol = $hedef_dizin . $yeniad;
            move_uploaded_file($dosya, $hedef_yol);
        }
        if (isset($_FILES["dosya2"])) {
            $dosya = $_FILES["dosya2"]["tmp_name"];
            $yeniad = $_FILES["dosya2"]["name"];
            $hedef_dizin = "img/educator_Img/";
            $hedef_yol = $hedef_dizin . $yeniad;
            move_uploaded_file($dosya, $hedef_yol);
        }
        // alttaki if ve else if yapısı ile eğitimci ekleme silme ve güncelleme işlemi yapan fonksiyonu çağırıyorum.
        $educatorSql = new sqlProcess();
        if (isset($_POST['educatorSave'])) {
            $educator_Id = $_POST["educator_id"];
            $educator_nameSurname = $_POST["educator_name"]; //educator_name bu bizim iput ismimizdir.
            $educator_imgLink = $_POST["educator_img"];
            $educator_aboutWrite = $_POST["educator_about"];
            $educator_faceLink = $_POST["educator_facebook"];
            $educator_linkedinLink = $_POST["educator_linkedin"];
            $educator_githubLink = $_POST["educator_github"];

            $params = [$educator_nameSurname, $educator_imgLink, $educator_aboutWrite, $educator_faceLink, $educator_linkedinLink, $educator_githubLink];
            $params2 = [$educator_nameSurname];
            $educatorSql->sqlsorgu2('educatorSave', 'INSERT INTO educator_table (nameSurname, imgLink, aboutWrite, faceLink, linkedinLink, githubLink) VALUES (?, ?, ?, ?, ?, ?)', $params, 1, 'SELECT COUNT(*) FROM educator_table WHERE nameSurname = ?', $params2);
        } else if (isset($_POST['educatorDelete']) || isset($_POST['educatorUpdate'])) {
            $educator_Id = $_POST["educator_id_seconds"];
            $educator_nameSurname = $_POST["educator_name_seconds"]; //educator_name bu bizim buton ismimizdir.
            $educator_imgLink = $_POST["educator_img_seconds"];
            $educator_aboutWrite = $_POST["educator_about_seconds"];
            $educator_faceLink = $_POST["educator_facebook_seconds"];
            $educator_linkedinLink = $_POST["educator_linkedin_seconds"];
            $educator_githubLink = $_POST["educator_github_seconds"];
            $params = [$educator_nameSurname, $educator_imgLink, $educator_aboutWrite, $educator_faceLink, $educator_linkedinLink, $educator_githubLink, $educator_Id];
            $educatorSql->sqlsorgu2('educatorUpdate', 'UPDATE educator_table SET nameSurname=?, imgLink=?, aboutWrite=?, faceLink=?, linkedinLink=?, githubLink=? WHERE  educatorId=?', $params, 0, 0, 0);
            $educatorSql->sqlsorgu2('educatorDelete', 'Delete from educator_table WHERE nameSurname=? And imgLink=? And aboutWrite=? And faceLink=? And linkedinLink=? And githubLink=? AND educatorId=?', $params, 0, 0, 0);
        }
    } else {
        goAndComeBack("admin_login.php", 0, 1);
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
    <h2 class="text-center text-primary">Eğitimci İşlemleri</h2>
    <h3 class="offset-md-10"><i class="fa-solid fa-user fa-lg me-3"></i><?php echo $_SESSION["username"] ?></h3>
    <div class="container rowColor border inputOval mt-5 pb-3">
        <form class="input-group" action="admin_educator_insert.php" method="post" enctype="multipart/form-data">
            <div class="row">
                <div class="col-md-12 mt-3">
                    <div class="modal fade" id="saveEducatorModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">KAYIT İŞLEMLERİ</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <input type="text" name="educator_id" class="input-field inputOval mb-3 me-4 ps-4" placeholder="İd bölümü veri girilemez" readonly><!--readonly kodu ile sadece veri görünür ama veri girilemez.-->
                                    <input type="text" name="educator_name" class="input-field inputOval mb-3 ps-4" placeholder="Eğitimci ismi">
                                    <input type="text" name="educator_img" id="educator_imgid" class="input-field inputOval mb-3 ps-4" placeholder="Eğitimci Görseli">
                                    <!--Alttaki 3 satır bizim dosya düklemek için kullandığımız kodlar.devamı bu sayfanın en başında yer alıyor.-->
                                    <input type="file" name="dosya" id="fileInput" style="display: none;">
                                    <button type="button" class="mb-3 ms-4" onclick="document.getElementById('fileInput').click()">Görsel Seç</button>
                                    <script>
                                        function updateFileName(input) {
                                            // Seçilen dosyanın adını güncelleyen fonksiyon
                                            var fileName = input.value.split('\\').pop();
                                            document.getElementById('educator_imgid').value = fileName;
                                        }
                                        document.getElementById('fileInput').addEventListener('change', function() {
                                            // Dosya seçildiğinde otomatik olarak formu gönderen fonksiyon
                                            updateFileName(this);
                                            document.getElementById('form').submit();
                                        });
                                    </script>
                                    <input type="text" name="educator_about" class="input-field inputOval mb-3 me-4 ps-4" placeholder="Eğitimci Hakkında">
                                    <input type="text" name="educator_facebook" class="input-field inputOval mb-3 ps-4" placeholder="Eğitimci Facebook">
                                    <input type="text" name="educator_linkedin" class="input-field inputOval mb-3 me-4 ps-4" placeholder="Eğitimci Linkedin">
                                    <input type="text" name="educator_github" class="input-field  inputOval mb-3 ps-4" placeholder="Eğitimci Github">
                                </div>
                                <div class="modal-footer">
                                    <button type="submit" class="submit-btn bg-danger inputOval" data-bs-dismiss="modal">Kapat</button>
                                    <button type="submit" name="educatorSave" class="submit-btn btn-success inputOval">Yeni Kayıt için tıklayın.</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <button type="button" name="educatorSave" class="inputOval btn-success" data-bs-toggle="modal" data-bs-target="#saveEducatorModal">Yeni eğitimci kayıt işlemi için buraya tıklayın.</button></td>
                    <!--Alttaki kod parçası güncelleme işlemi için yazılmış bir modal yapısıdır.-->
                    <div class="modal fade" id="updateEducatorModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">UYARI..!</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <input type="text" name="educator_id_seconds" id="educatorIdInput" class="input-field inputOval mb-3 me-4 ps-4" placeholder="İd bölümü veri girilemez" readonly><!--readonly kodu ile sadece veri görünür ama veri girilemez.-->
                                    <input type="text" name="educator_name_seconds" id="educatorNameInput" class="input-field inputOval mb-3 ps-4" placeholder="Eğitimci ismi">
                                    <input type="text" name="educator_img_seconds" id="educatorImgInput" class="input-field inputOval mb-3 ps-4" placeholder="Eğitimci Görseli">
                                    <!--ALt satır bizim yeni resim eklemek için kullandığımız buton yapısı-->
                                    <input type="file" name="dosya2" id="fileInput2" style="display: none;">
                                    <button type="button" class="mb-3 ms-4" onclick="document.getElementById('fileInput2').click()">Görsel Değiştir</button>
                                    <script>
                                        function updateFileName2(input) {
                                            // Seçilen dosyanın adını güncelleyen fonksiyon
                                            var fileName2 = input.value.split('\\').pop();
                                            document.getElementById('educatorImgInput').value = fileName2;
                                        }
                                        document.getElementById('fileInput2').addEventListener('change', function() {
                                            // Dosya seçildiğinde otomatik olarak formu gönderen fonksiyon
                                            updateFileName2(this);
                                            document.getElementById('form').submit();
                                        });
                                    </script>
                                    <input type="text" name="educator_about_seconds" id="educatorAboutInput" class="input-field inputOval mb-3 me-4 ps-4" placeholder="Eğitimci Hakkında">
                                    <input type="text" name="educator_facebook_seconds" id="educatorFacebookInput" class="input-field inputOval mb-3 ps-4" placeholder="Eğitimci Facebook">
                                    <input type="text" name="educator_linkedin_seconds" id="educatorLinkedinInput" class="input-field inputOval mb-3 me-4 ps-4" placeholder="Eğitimci Linkedin">
                                    <input type="text" name="educator_github_seconds" id="educatorGithubInput" class="input-field inputOval mb-3 ps-4" placeholder="Eğitimci Github">
                                </div>
                                <div class="modal-footer">
                                    <button type="submit" class="submit-btn bg-danger inputOval" data-bs-dismiss="modal">Kapat</button>
                                    <button type="submit" name="educatorUpdate" class="submit-btn btn-success inputOval">Değiklikleri kaydet.</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php
                    //alttaki kod parçası bizim menülerimize modal yani uyarı mesajı veren bir fonksiyonu çağırıp oradaki değişiklikleri kaydet butonuna silme ve güncellem özelliklerini veriyor.
                    $educatorDelete = new sqlProcess();
                    $educatorDelete->siralammodal_ForDelete('deleteEducatorModal', 'educatorDelete');
                    ?>
                </div>
            </div>
        </form>
        <div class="row">
            <div class="col-md-12 mt-5">
                <table class="table table-hover" id="educatorTableView">
                    <thead>
                        <tr>
                            <th scope="col">id</th>
                            <th scope="col">Ad Soyad</th>
                            <th scope="col">Görsel Linki</th>
                            <th scope="col">Eğitmen Hakkında</th>
                            <th scope="col">İşlemler</th>
                        </tr>
                    </thead>
                    <?php
                    include("libs/functions/database_connection.php");
                    $menuItems = array();
                    //Alt'daki kod parçası bizim menüdeki kayıtlı verilerimizi getiriyor ve bu kodları bir foreach yapısı ile menülerin kayıt olduğu nav bar kısmındaki ilgili koda getiriyor.
                    $result = $db->query("SELECT * FROM educator_table");
                    if ($result->rowCount() > 0) {
                        while ($row = $result->fetch(PDO::FETCH_ASSOC)) { //fetch(PDO::FETCH_ASSOC) yöntemi, sonuç kümesinden bir satırı alır ve bu satırı bir dizi olarak döndürür.
                            $menuItem = array("id" => $row["educatorId"], "img" => $row["imgLink"], "name" => $row["nameSurname"], "text" => $row["aboutWrite"], "facebook" => $row["faceLink"], "linkedin" => $row["linkedinLink"], "github" => $row["githubLink"]); //Döngü gövdesi kısmını özelleştirebilirsiniz. Bu bölümde, $row dizisinin herhangi bir özelliğini kullanabilirsiniz. Örneğin, $row['column_name'] şeklinde bir sütun adını kullanarak belirli bir sütundaki verilere erişebilirsiniz.
                            $menuItems[] = $menuItem; // Diziye her adımda bir öğe eklenir
                        }
                    } else {
                        echo "Veritabanında hiç veri bulunamadı.";
                    }

                    foreach ($menuItems as $item) {
                        echo ' <tbody>';
                        echo ' <tr>';
                        echo '<th scope="row">' . $item['id'] . '</th>';
                        echo '<td>' . $item['name'] . '</td>';
                        echo '<td>' . $item['img'] . '</td>';
                        echo '<td>' . $item['text'] . '</td>';
                        echo '<td style="display: none;">' . $item['facebook'] . '</td>'; //bu ve altındaki 2 satırı tabloya yolluyorum görünmesini istemiyorum verileri burdan inputların içine çekiyorum.
                        echo '<td style="display: none;">' . $item['linkedin'] . '</td>';
                        echo '<td style="display: none;">' . $item['github'] . '</td>';
                        echo '<td><button type="button" name="educatorUpdate" class="bg-primary text-white inputOval" data-bs-toggle="modal" data-bs-target="#updateEducatorModal">Güncelleme</button></td>';
                        echo '<td><button type="button" name="educatorDelete" class="bg-danger text-white inputOval" data-bs-toggle="modal" data-bs-target="#deleteEducatorModal">Silme</button></td>';
                        echo ' <tr>';
                        echo ' <tbody>';
                    }
                    ?>
                </table>
            </div>
        </div>
    </div>
    <script>
        const table1 = document.getElementById('educatorTableView');
        const tableRows1 = table1.querySelectorAll('tbody tr');
        tableRows1.forEach(row => {
            row.addEventListener('click', () => {
                const educatorid = row.cells[0].textContent;
                const educatorname = row.cells[1].textContent;
                const educatorimg = row.cells[2].textContent;
                const educatorabout = row.cells[3].textContent;
                const educatorface = row.cells[4].textContent;
                const educatorlinkedin = row.cells[5].textContent;
                const educatorgithub = row.cells[6].textContent;

                document.getElementById('educatorIdInput').value = educatorid;
                document.getElementById('educatorNameInput').value = educatorname;
                document.getElementById('educatorImgInput').value = educatorimg;
                document.getElementById('educatorAboutInput').value = educatorabout;
                document.getElementById('educatorFacebookInput').value = educatorface;
                document.getElementById('educatorLinkedinInput').value = educatorlinkedin;
                document.getElementById('educatorGithubInput').value = educatorgithub;
            });
        });
    </script>
    <script src="packets/bootstrap/bootstrap.js"></script>
</body>

</html>