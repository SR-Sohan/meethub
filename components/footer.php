<!-- footer area start  -->
<footer>
  <div class="footer-top">
    <div class="container">
      <div class="row">
        <div class="col-md-8 offset-md-2">
            <div class="footer-top-content text-center text-white">
              <h2 data-aos="flip-left" data-aos-duration="1500">We are fall in love & getting married</h2>
              <div class="foot-couple d-flex align-items-center justify-content-center py-3">
                <h1 data-aos="fade-right">Christin</h1>
                <img data-aos="fade-up" src="<?=settings()['homepage'] ?>assets/images/fot.png" alt="">
                <h1 data-aos="fade-left">Thomas</h1>
              </div>
              <ul class="fot-menu">
                <li data-aos="fade-up" data-aos-duration="300"> <a class="nav-link " aria-current="page" href="<?= settings()['homepage'] ?>index.php">Home</a></li>
                <li data-aos="fade-up" data-aos-duration="500"> <a class="nav-link" aria-current="page" href="<?= settings()['homepage'] ?>event.php">Event</a></li>
                <li data-aos="fade-up" data-aos-duration="700"><a class="nav-link" aria-current="page" href="<?= settings()['homepage'] ?>person.php?person=brides">Brides</a></li>
                <li data-aos="fade-up" data-aos-duration="1000"> <a class="nav-link" aria-current="page" href="<?= settings()['homepage'] ?>person.php?person=grooms">Grooms</a></li>
                <li data-aos="fade-up" data-aos-duration="1300"> <a class="nav-link" aria-current="page" href="<?= settings()['homepage'] ?>contact.php">Contact</a></li>
              </ul>
            </div>
        </div>
      </div>
    </div>
  </div>
  <div class="footer-bottom d-flex align-items-center justify-content-center">
    <p class="text-center">© 2023 | ISDB-BISEW</p>
  </div>
</footer>
<!-- footer area End -->


<script src="<?= settings()['homepage'] ?>assets/js/bootstrap.bundle.min.js"></script>
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script src="<?= settings()['homepage'] ?>assets/js/delighters.min.js"></script>
<script src="<?= settings()['homepage'] ?>assets/js/main.js"></script>
<script>
    // Example starter JavaScript for disabling form submissions if there are invalid fields
(() => {
  'use strict'

  // Fetch all the forms we want to apply custom Bootstrap validation styles to
  const forms = document.querySelectorAll('.needs-validation')

  // Loop over them and prevent submission
  Array.from(forms).forEach(form => {
    form.addEventListener('submit', event => {
      if (!form.checkValidity()) {
        event.preventDefault()
        event.stopPropagation()
      }

      form.classList.add('was-validated')
    }, false)
  })
})()
</script>
</body>
</html>