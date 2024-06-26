<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
	<?php
	session_start();
	include("libs/myclass.php");
	include("libs/functions/user_all_func.php");
	include("libs/functions/database_connection.php");
	$userProcess = new sqlProcess();
	
	$userProcess->loginControl('giris', 'SELECT * FROM login WHERE (name=? OR mail=?)', 'name', 'name','pass', 'user');

	if ($_SESSION["LoggedIn1"] == true) {
		goAndComeBack("index.php", 0, 1);
	}else{
		if (isset($_POST['kayit'])) {
			//alttaki kod parçası bizim kullanıcımızın kayıt işlemi için kullanılır.
			$username = $_POST['username'];
			$mail = $_POST["mail"];
			$password = $_POST['password'];
			$params = [$username, $mail, $password];
			$params2 = [$username,$mail];
			$userProcess->sqlsorgu('kayit', 'INSERT INTO login (name, mail, password) VALUES (?, ?, ?)', $params, 1, 'SELECT COUNT(*) FROM login WHERE name=? or mail = ?', $params2);
		}
	}
	
	?>
	<link rel="stylesheet" href="./css/login_style.css">
	<script src="https://kit.fontawesome.com/0761d8fd00.js" crossorigin="anonymous"></script>
	<script src="https://unpkg.com/@popperjs/core@2.10.1/dist/umd/popper.min.js"></script>
</head>
<style>
        .error-message {
            color: red;
            display: none;
        }
    </style>
<body>
	<div class="main">
		<div class="form-box">
			<div class="button-box">
				<div id="btn"></div><!--bu divi kullanmamın sebebi butonlar ile sayfalar arası geçişi sağlamak.-->
				<button type="button" class="toggle-btn" onclick="login()">Giriş</button>
				<button type="button" class="toggle-btn" onclick="register()">Kayıt Ol</button>
			</div>
			<div class="social-icons">
				<a href="#"><i class="fa-brands fa-facebook social mb-4"></i></a>
				<a href="https://www.linkedin.com/in/f%C4%B1rat-i%C5%9F%C4%B1ldak-608176250/"><i class="fa-brands fa-linkedin social  mb-4"></i></a>
				<a href="#"><i class="fa-brands fa-github social  mb-4"></i></a>
			</div>
			<form id="Login" class="input-group" action="login_index.php" method="post"><!--method="post" eğer bu kısmı böyle vermezsem veritabanı bağlantısında post özelliğine kod yazamam.-->
				<input type="text" name="name" class="input-field" placeholder="Kullanıcı adı veya Mail adresi" required><!--required kodu boş geçilemez anlamına geliyor.-->
				<input type="password" name="pass" class="input-field" placeholder="Şifre Gir" required>
				<a href="#">Şifremi Unuttum</a>
				<button type="submit" name="giris" class="submit-btn">Giriş</button><!--burada verdiğimiz çok önemli bu ismi veri tabanı bağlantısında giris butonunun tıklanma özelliğine yazıyoruz.-->
			</form>
			<form id="Register" class="input-group" action="login_index.php" method="post"><!--Yani, bu kodda "sql_islem.php" değeri, form verilerinin sunucuda işlenmesi için yönlendirilecek olan betik dosyasını belirtir. Bu dosya, kullanıcının girdiği form verilerini alacak, işleyecek ve veritabanı işlemleri gibi gerekli işlemleri gerçekleştirecektir.-->
				<input type="text" name="username" id="username" class="input-field" placeholder="Kullanıcı Adı" required>
				<span id="name-error" class="error-message">Kullanıcı Adı en az 4 karakter olmalı.</span>
				<input type="password" name="password" id="password" class="input-field" placeholder="Şifre Gir" required>
				<span id="pass-error" class="error-message">Şifre Adı en az 6 karakter olmalı.</span>
				<input type="text" name="mail" id="mail" class="input-field" placeholder="Mail Gir" required>
				<span id="mail-error" class="error-message">Geçerli bir mail adresi giriniz.</span>
				<button type="submit" name="kayit" class="submit-btn">Kayıt Ol</button>
			</form>
		</div>
	</div>
	<?php
	include("libs/functions/javascript_code.php");
	?>
</body>

</html>