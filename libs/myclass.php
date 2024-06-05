<?php
class sqlProcess
{
    function __construct()
    {
        try {
            $db=new PDO("mysql:host=localhost; dbname=peopleboxprdb; charset=utf8",'root','');
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }
    function siralammodal_ForDelete($exampleModal, $butonName)
    {
    echo '<div class="modal fade" id="' . $exampleModal . '" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">UYARI..!</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        Silmek istediğinize emin misiniz?
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="submit-btn bg-danger inputOval" data-bs-dismiss="modal">Kapat</button>
                        <button type="submit" name="' . $butonName . '" class="submit-btn bg-danger inputOval">Sil</button>
                    </div>
                </div>
            </div>
        </div>';
    }
    function loginControl($post, $query, $name, $mail, $pass, $who)
    {
        if (isset($_POST[$post])) {
            $username = $_POST[$name];
            $password = $_POST[$pass];
            $email = $_POST[$mail];
            global $db;
            $kullanici_sor = $db->prepare($query);
            if($who == 'admin'){
                $kullanici_sor->execute([$username]);
            }else{
                $kullanici_sor->execute([$username, $email]);
            }
            $say = $kullanici_sor->fetch(PDO::FETCH_ASSOC);
            $password_correct = password_verify($password, $say['password']);

            if ($say && $password_correct) {
                
                $_SESSION["username"] = $username;

                if ($who == 'admin') {
                    $_SESSION["LoggedIn"] = true;
                } else {
                    $_SESSION["LoggedIn1"] = true;
                    echo '<script>alert("Giriş başarılı.");</script>';
                    goAndComeBack("index.php", 0.1, 1);
                }
            } else {
                $_SESSION["LoggedIn"] = false;
                echo '<script>alert("Kullanıcı adı veya şifre hatalı.");</script>';
                goAndComeBack(0, 0.1);
                exit;
            }
        }
    }
    function sqlsorgu($requestQuery, $query, $params, $choos = 0, $query2, $params2)
    {
        if (isset($_POST[$requestQuery])) {
            global $db, $params, $kayitSayisi;
            $name = $params[0];
            $mail = $params[1];
            $pass = $params[2];
            
            if (strlen($name) < 4) {
                echo '<script>alert("Kullanıcı Adı en az 4 karakter olmalı.");</script>';
                return; 
            }
            if (strlen($pass) < 6) {
                echo '<script>alert("Şifre en az 6 karakter olmalı.");</script>';
                return; 
            }
            
            if (strpos($mail, '@') === false) {
                echo '<script>alert("Geçerli bir mail adresi giriniz.");</script>';
                return;
            }
            // Şifreyi hashle
            $hashed_pass = password_hash($pass, PASSWORD_BCRYPT);
            // $params array'inde şifreyi güncelle
            $params[2] = $hashed_pass;

            if ($choos != 0) {
                //alttaki 3 satır ile verilen params2 ile verilen verinin kaçtane olduğunu sorgu ile aratıyor.
                $sorgu = $db->prepare($query2);
                $guncelle = $sorgu->execute(($params2));
                $kayitSayisi = $sorgu->fetchColumn();
                if ($kayitSayisi == 0) {
                    $sorgu = $db->prepare($query);
                    $guncelle = $sorgu->execute(($params));
                    echo '<script>alert("işlem Başarılı.");</script>';
                }else{
                    echo '<script>alert("Bu kişi zaten kayıtlı.");</script>';
                }
            } else if($choos == 0){
                $sorgu = $db->prepare($query);
                $guncelle = $sorgu->execute(($params));
                echo '<script>alert("işlem Başarılı.");</script>';
            }
            else{
                echo '<script>alert("Bir hata oluştu, tekrar kontrol edin.");</script>';
            }
            
        }
    }
    function sqlsorgu2($requestQuery, $query, $params, $choos = 0, $query2, $params2)
    {
        if (isset($_POST[$requestQuery])) {
            global $db, $params, $kayitSayisi;
            if ($choos != 0) {
                //alttaki 3 satır ile verilen params2 ile verilen verinin kaçtane olduğunu sorgu ile aratıyor.
                $sorgu = $db->prepare($query2);
                $guncelle = $sorgu->execute(($params2));
                $kayitSayisi = $sorgu->fetchColumn();
                if ($kayitSayisi == 0) {
                    $sorgu = $db->prepare($query);
                    $guncelle = $sorgu->execute(($params));
                }
            } else {
                $sorgu = $db->prepare($query);
                $guncelle = $sorgu->execute(($params));
            }
            if ($guncelle) {
                echo '<script>alert("işlem Başarılı.");</script>';
            } else {
                echo '<script>alert("Bir hata oluştu, tekrar kontrol edin.");</script>';
            }
        }
    }
}
