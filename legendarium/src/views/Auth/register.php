<?php
ob_start();
?>

<section class="vh-100">
  <div class="container-fluid">
    <div class="row">
      <div class="col-sm-6 text-black">

        <div class="px-5 ms-xl-4">
          <i class="fas fa-crow fa-2x me-3 pt-5 mt-xl-4" style="color: #709085;"></i>
          <span class="h1 fw-bold mb-0">Logo</span>
        </div>

        <div class="d-flex align-items-center h-custom-2 px-5 ms-xl-4 mt-5 pt-5 pt-xl-0 mt-xl-n5">

          <form action="/register/" method="post" style="width: 23rem;">

            <h3 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px;">S'inscrire</h3>

            <!-- Champ pseudo -->
            <div class="form-outline mb-4">
              <input type="text" id="form2Example18" name="username" value="<?php echo isset($_SESSION['old']['username']) ? htmlspecialchars($_SESSION['old']['username']) : ''; ?>" class="form-control form-control-lg" />
              <label class="form-label" for="form2Example18">Pseudo</label>
              <?php if (isset($_SESSION["error"]['username'])): ?>
                <div class="error" style="color: red;"><?php echo $_SESSION["error"]['username']; ?></div>
              <?php endif; ?>
            </div>

            <!-- Champ mot de passe -->
            <div class="form-outline mb-4">
              <input type="password" id="inputPassword" name="password" value="<?php echo isset($_SESSION['old']['password']) ? htmlspecialchars($_SESSION['old']['password']) : ''; ?>" class="form-control form-control-lg" />
              <label class="form-label" for="inputPassword">Mot de passe</label>
              <?php if (isset($_SESSION["error"]['password'])): ?>
                <div class="error" style="color: red;"><?php echo $_SESSION["error"]['password']; ?></div>
              <?php endif; ?>
            </div>

            <!-- Champ confirmation mot de passe -->
            <div class="form-outline mb-4">
              <input type="password" id="inputPasswordConfirm" name="passwordConfirm" value="<?php echo isset($_SESSION['old']['passwordConfirm']) ? htmlspecialchars($_SESSION['old']['passwordConfirm']) : ''; ?>" class="form-control form-control-lg" />
              <label class="form-label" for="inputPasswordConfirm">Confirmer le mot de passe</label>
              <?php if (isset($_SESSION["error"]['passwordConfirm'])): ?>
                <div class="error" style="color: red;"><?php echo $_SESSION["error"]['passwordConfirm']; ?></div>
              <?php endif; ?>
            </div>

            <!-- Bouton de soumission -->
            <div class="pt-1 mb-4">
              <button data-mdb-button-init data-mdb-ripple-init class="btn btn-info btn-lg btn-block" type="submit" name="button">S'inscrire</button>
            </div>

            <!-- Lien vers la page de login -->
            <p>Déjà un compte ? <a href="/login" class="link-info">Se connecter ici</a></p>

          </form>

        </div>

      </div>

      <!-- Image (optionnelle) -->
      <div class="col-sm-6 px-0 d-none d-sm-block">
        <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-login-form/img3.webp" alt="Image d'inscription" class="w-100 vh-100" style="object-fit: cover; object-position: left;">
      </div>

    </div>
  </div>
</section>

<?php 
// Supprimer les anciennes données après affichage
unset($_SESSION['old']); 
unset($_SESSION['error']);
?>



<script>
  // Fonction pour afficher/masquer le mot de passe
  function togglePasswordVisibility(buttonId, inputId) {
    var btn = document.getElementById(buttonId);
    var input = document.getElementById(inputId);
    
    if (btn && input) { // Vérifie si les éléments existent avant de les utiliser
      btn.onclick = function() {
        if (input.type === "password") {
          input.type = "text";
        } else {
          input.type = "password";
        }
      };
    }
  }

  // Appliquer la fonction aux deux champs de mot de passe
  togglePasswordVisibility("btnPassword", "inputPassword");
  togglePasswordVisibility("btnPasswordConfirm", "inputPasswordConfirm");

  // Vérification que les mots de passe correspondent avant la soumission
  var form = document.querySelector("form"); // Récupère le formulaire
  if (form) {
    form.onsubmit = function(event) {
      var password = document.getElementById("inputPassword").value;
      var passwordConfirm = document.getElementById("inputPasswordConfirm").value;
      
      // Si les mots de passe ne correspondent, on empêche la soumission et on affiche un message d'erreur
      if (password !== passwordConfirm) {
        event.preventDefault(); // Empêche la soumission du formulaire
        alert("Les mots de passe ne correspondent pas. Veuillez vérifier.");
      }
    };
  }
</script>



<?php

$content = ob_get_clean();
require VIEWS . 'layout.php';
