<div class="upside">
    <?php
    include("libs/functions/user_all_func.php");
    include("views/normal_panel/header.php");
    include("views/normal_panel/navbar.php");
    if ($_SESSION["LoggedIn1"] == true) {
		echo'<h3 class="offset-md-10" style="color: white;"><i class="fa-solid fa-user fa-lg me-3"></i>'.$_SESSION["username"].'</h3>';
	}
    ?>
    <div class="container">
        <div class="row">
            <div class="home-content col-md-4" id="main_Contant">
                <span class="multiple-text text-white"></span>
            </div>
        </div>
    </div>
</div>
<?php
    include("views/normal_panel/about.php");
    include("views/normal_panel/lessoncard.php");
    include("views/normal_panel/educator.php");
    include("views/normal_panel/contact.php");
    include("libs/functions/script_library.php");
    include("libs/functions/javascript_code.php");
?>

</body>

</html>
