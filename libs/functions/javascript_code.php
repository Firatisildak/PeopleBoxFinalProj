<script>
  /*==============================scroll reveal============== */

  ScrollReveal({ //Bu bölümdeki bütün kodlar bizim yazılarımızın ve fotomuzun sağdan soladan gelmesini sağlıyor.
    reset: true,
    distance: '80px',
    duration: 2000,
    delay: 200
  });

  ScrollReveal().reveal('.home-content p', {
    origin: 'right'
  });
  ScrollReveal().reveal('.home-content h1', {
    origin: 'left'
  });
</script>
<script>
  /*==============================typed js============== */
  const typed = new Typed('.multiple-text', {
    strings: ['<i class="fa-solid fa-code"></i>Geleceği Bizimle Kodla', 'Fırat Akademi'],
    typeSpeed: 100,
    backSpeed: 100,
    backDelay: 100,
    loop: true
  });
</script>
<script>
   /*==============================login_index.php listener============== */
  document.addEventListener('DOMContentLoaded', function() {
    var nameInput = document.getElementById('username');
    var passInput = document.getElementById('password');
    var mailInput = document.getElementById('mail');
    var nameError = document.getElementById('name-error');
    var passError = document.getElementById('pass-error');
    var mailError = document.getElementById('mail-error');

    nameInput.addEventListener('input', function() {
      if (nameInput.value.length < 4) {
        nameError.style.display = 'inline';
      } else {
        nameError.style.display = 'none';
      }
    });
    passInput.addEventListener('input', function() {
      if (passInput.value.length < 6) {
        passError.style.display = 'inline';
      } else {
        passError.style.display = 'none';
      }
    });

    mailInput.addEventListener('input', function() {
      if (mailInput.value.indexOf('@') === -1) {
        mailError.style.display = 'inline';
      } else {
        mailError.style.display = 'none';
      }
    });
  });
</script>
<script>
     /*==============================login_index.php script============== */
  var x = document.getElementById("Login");
  var y = document.getElementById("Register");
  var z = document.getElementById("btn");

  function register() {
    x.style.left = "-400px";
    y.style.left = "50px";
    z.style.left = "110px";
  }

  function login() {
    x.style.left = "50px";
    y.style.left = "450px";
    z.style.left = "0px";
  }
</script>