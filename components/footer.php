<!-- footer area start  -->
<footer>
  <div class="footer-top">
    <div class="container">
      <div class="row">
        <div class="col-md-8 offset-md-2">
            <div class="footer-top-content text-center text-white">
              <h2>We are fall in love & getting married</h2>
              <div class="foot-couple d-flex align-items-center justify-content-center py-3">
                <h1>Christin</h1>
                <img src="<?=settings()['homepage'] ?>assets/images/fot.png" alt="">
                <h1>Thomas</h1>
              </div>
              <ul class="fot-menu">
                <li><a href="">Home</a></li>
                <li><a href="">Home</a></li>
                <li><a href="">Home</a></li>
                <li><a href="">Home</a></li>
                <li><a href="">Home</a></li>
                <li><a href="">Home</a></li>
              </ul>
            </div>
        </div>
      </div>
    </div>
  </div>
  <div class="footer-bottom d-flex align-items-center justify-content-center">
    <p class="text-center">© 2020 Nuptial. All Rights Reserved.</p>
  </div>
</footer>
<!-- footer area End -->


<script src="<?= settings()['homepage'] ?>assets/js/bootstrap.bundle.min.js"></script>
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