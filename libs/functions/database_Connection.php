<?php
    try{
        $db=new PDO("mysql:host=localhost; dbname=peopleboxdb; charset=utf8",'root','');
        //echo "veri tabanı bağlantısı başarılı";
    }
    catch(Exception $e){
        echo $e->getMessage();
    }
?>