<?php 
session_start();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/style.css">

</head>
<body>

<nav class="navbar  navbar-light bg-light">
  <a class="navbar-brand" href="#">Outech</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
    <div class="navbar-nav">
      <a class="nav-link active" href="outech.php">Home <span class="sr-only">(current)</span></a>
     <?php if(isset($_SESSION['userid'])){?>

      <a class="nav-link" href="#"><?php echo $_SESSION['userid'] ?></a>
      <a class="nav-link" href="includes/logout.inc.php">Logout</a>

      <?php 
      }else{

      
    ?>
     <a class="nav-link" href="#">Sign Up</a>
      <a class="nav-link" href="#">Login</a>

      <?php
      }
      ?>
    
     
    </div>
  </div>
</nav>