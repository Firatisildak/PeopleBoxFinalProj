<?php
    try{
        //PDO sınıfının constructor'ında, veritabanı sunucusunun adresi (localhost), veritabanı adı (db), karakter seti (utf8), kullanıcı adı (root) ve şifre ('') gibi bilgiler yer alır. Bu bilgiler, veritabanı sunucusuna bağlanmak için gereklidir.
        $db=new PDO("mysql:host=localhost; dbname=db; charset=utf8",'root','');
        //echo "veri tabanı bağlantısı başarılı";
    }
    catch(Exception $e){
        echo $e->getMessage();
    }
?>