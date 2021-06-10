<?php
function pdo_connect_mysql() {
    // AJOUTER LE CODE DE CONNECTION ICI

    $username = "root";
    $password = "";

    try {
        $conn = new PDO('mysql:host=localhost;dbname=mon_test;charset=utf8', $username, $password);
        return $conn;

    } catch (PDOException $e) {
        return false;
    }
}


/**
 * function permettant de printer la template de header
 */

function template_header($title) {
  echo <<<EOT
  <!DOCTYPE html>
  <html>
    <head>
      <meta charset="utf-8">
      <title>$title</title>
      <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
      <link href="style.css" rel="stylesheet" type="text/css">
    </head>
    <body>
      <nav class="navtop">
        <div>
          <h1></h1>
          <a href="index.php"><i class="fas fa-home"></i>Home</a>
          <a href="read.php"><i class="fas fa-address-book"></i>List</a>
        </div>
      </nav>
  EOT;
}


/**
 * function permettant de printer la template de footer
 */
function template_footer() {
  $year = date("Y");
  echo <<<EOT
        <footer>
          <p>©$year</p>
        </footer>
      </body>
  </html>
  EOT;
}
?>