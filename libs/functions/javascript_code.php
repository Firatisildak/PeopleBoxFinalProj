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