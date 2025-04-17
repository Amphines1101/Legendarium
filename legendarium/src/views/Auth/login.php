<?php
ob_start();
?>
<section class="vh-100">
  <div class="container-fluid">
    <div class="row">
      <div class="col-sm-6 text-black">

        <div class="d-flex align-items-center h-custom-2 px-5 ms-xl-4 mt-5 pt-5 pt-xl-0 mt-xl-n5">

          <form action="/login/" method="post" style="width: 23rem;">

            <h3 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px;">Log in</h3>

            <!-- Champ Username -->
            <div data-mdb-input-init class="form-outline mb-4">
              <input type="text" name="username" id="form2Example18" class="form-control form-control-lg" value="<?php echo htmlspecialchars(old('username')); ?>" />
              <label class="form-label" for="form2Example18">Username</label>
              <span class="error"><?php echo error("username"); ?></span>
            </div>

            <!-- Champ Password -->
            <div data-mdb-input-init class="form-outline mb-4">
              <input type="password" name="password" id="inputPassword" class="form-control form-control-lg" value="<?php echo htmlspecialchars(old('password')); ?>" />
              <label class="form-label" for="inputPassword">Password</label>
              <span class="error"><?php echo error("password"); ?></span>
            </div>

            <!-- Bouton de connexion -->
            <div class="pt-1 mb-4">
              <button data-mdb-button-init data-mdb-ripple-init class="btn btn-info btn-lg btn-block" type="submit" name="button">Login</button>
            </div>

            <!-- Message d'erreur général -->
            <span class="error"><?php echo error("message"); ?></span>

            <!-- Lien vers la page d'inscription -->
            <p>Don't have an account? <a href="/register" class="link-info">Register here</a></p>

          </form>

        </div>

      </div>
      <div class="col-sm-6 px-0 d-none d-sm-block">
        <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-login-form/img3.webp"
          alt="Login image" class="w-100 vh-100" style="object-fit: cover; object-position: left;">
      </div>
    </div>
  </div>
</section>


<script>
var btnPass = document.getElementById("btnPassword");
var inputPass = document.getElementById("inputPassword");
btnPass.onclick = function() {
    if (inputPass.type === "password") {
        inputPass.type = "text";
    } else {
        inputPass.type = "password";
    }
};
</script>

<?php

$content = ob_get_clean();
require VIEWS . 'layout.php';
