<nav class="navbar navbar-expand-lg nav-bg"><!--yandaki nav-bg classı bizim navbarın rengini css kısmında değiştirmemiz için kullandığımız bir classtır. -->
    <div class="container">
        <img id="logoSize" src="views/img/benimLogo.png" alt="logo">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!--ms-auto bu kısım menüyü ortalıyor.-->
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                <?php
                $menuItems = array();
                //Alt'daki kod parçası bizim menüdeki kayıtlı verilerimizi getiriyor ve bu kodları bir foreach yapısı ile menülerin kayıt olduğu nav bar kısmındaki ilgili koda getiriyor.
                $result = $db->query("SELECT * FROM menutable ORDER BY siralama ASC");
                if ($result->rowCount() > 0) { //$result->rowCount() ifadesi, $result adlı sonuç kümesindeki satır sayısını döndüren bir yöntem çağrısıdır. Bu ifade, sonuç kümesindeki satır sayısını kontrol etmek için kullanılır.
                    while ($row = $result->fetch(PDO::FETCH_ASSOC)) { //fetch(PDO::FETCH_ASSOC) yöntemi, sonuç kümesinden bir satırı alır ve bu satırı bir dizi olarak döndürür.
                        $menuItem = array("link" => $row["menuUrl"], "icon" => $row["menuIcon"], "text" => $row["menuName"]); //Döngü gövdesi kısmını özelleştirebilirsiniz. Bu bölümde, $row dizisinin herhangi bir özelliğini kullanabilirsiniz. Örneğin, $row['column_name'] şeklinde bir sütun adını kullanarak belirli bir sütundaki verilere erişebilirsiniz.
                        $menuItems[] = $menuItem; // Diziye her adımda bir öğe eklenir
                    }
                } else {
                    echo "Veritabanında hiç veri bulunamadı.";
                }

                //alt'taki kod bloğu bizim array yapısında kullandığımız foreach yapısı bizim her bir $menuItems her seferinde $item değişkenine atayıp veritabaındaki veri kadar işlem yapıyor.
                foreach ($menuItems as $item) {
                    echo'<li class="nav-item d-flex">
                            <a class="nav-link active" aria-current="page" href="' . $item['link'] . '">
                            <i ' . $item['icon'] . '></i>' . $item['text'] . '</a>
                            <span class="brace">|</span>
                        </li>';
                }
                ?>
            </ul>
        </div>
    </div>
</nav>