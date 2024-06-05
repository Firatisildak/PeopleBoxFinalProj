<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
	<link rel="stylesheet" href="./css/login_style.css">
	<script src="https://kit.fontawesome.com/0761d8fd00.js" crossorigin="anonymous"></script>
	<script src="https://unpkg.com/@popperjs/core@2.10.1/dist/umd/popper.min.js"></script>
</head>

<body>
	<div class="main">
		<div class="form-box">
			<div class="button-box">
				<div id="btn"></div><!--bu divi kullanmamın sebebi butonlar ile sayfalar arası geçişi sağlamak.-->
			</div>
			<div class="social-icons">
				<a href="#"><i class="fa-brands fa-facebook social mt-5"></i></a>
				<a href="https://www.linkedin.com/in/f%C4%B1rat-i%C5%9F%C4%B1ldak-608176250/"><i class="fa-brands fa-linkedin social  mt-5"></i></a>
				<a href="#"><i class="fa-brands fa-github social  mt-5"></i></a>
			</div>
			<form id="Login" class="input-group" action="admin_MenuProcess.php" method="post"><!--method="post" eğer bu kısmı böyle vermezsem veritabanı bağlantısında post özelliğine kod yazamam.-->
				<input type="text" name="name" class="input-field" placeholder="Kullanıcı Adı" required><!--required kodu boş geçilemez anlamına geliyor.-->
				<input type="password" name="pass" class="input-field" placeholder="Şifre Gir" required>
				<a href="#">Şifremi Unuttum</a>
				<button type="submit" name="girisAdmin" class="submit-btn">Giriş</button><!--burada verdiğimiz çok önemli bu ismi veri tabanı bağlantısında giris butonunun tıklanma özelliğine yazıyoruz.-->
			</form>
		</div>
	</div>
</body>

</html>