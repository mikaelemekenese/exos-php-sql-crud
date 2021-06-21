<?php
  include 'functions_custom.php';

  $pdo = pdo_connect_mysql();
  
  define('LOGIN','');
  define('PASSWORD','');
  $errorMessage = '';
 
  if(!empty($_POST)) {

    if(!empty($_POST['nom_utilisateur']) && !empty($_POST['mdp'])) {

      if($_POST['nom_utilisateur'] !== LOGIN) {
        $errorMessage = 'Mauvais nom d\'utilisateur !';

      } elseif($_POST['mdp'] !== PASSWORD) {
        $errorMessage = 'Mauvais mot de passe !';

      } else {
        session_start();
        $_SESSION['nom_utilisateur'] = LOGIN
        header('Location: admin-login.php');
        exit();
      }
    } else {
      $errorMessage = 'Veuillez inscrire vos identifiants svp !';
    }
  }
?>

<?php echo template_header('Livre/Read'); ?>

    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
      <fieldset>
        <legend>Identifiez-vous</legend>
        <?php
          // Rencontre-t-on une erreur ?
          if(!empty($errorMessage)) 
          {
            echo '<p>', htmlspecialchars($errorMessage) ,'</p>';
          }
        ?>
       <p>
          <label for="login">Login :</label> 
          <input type="text" name="login" id="login" value="" />
        </p>
        <p>
          <label for="password">Password :</label> 
          <input type="password" name="password" id="password" value="" /> 
          <input type="submit" name="submit" value="Se logguer" />
        </p>
      </fieldset>
    </form>

<?php echo template_footer(); ?>

