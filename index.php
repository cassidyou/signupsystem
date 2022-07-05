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

<nav class="navbar  navbar-expand-sm navbar-light bg-light">
  <a class="navbar-brand" href="#">Outech</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
    <div class="navbar-nav">
      <a class="nav-link" href="outech.php">Home <span class="sr-only">(current)</span></a>
     <?php if(isset($_SESSION['useruid'])){?>

      <a class="nav-link" href="#"><?php echo $_SESSION['useruid'] ?></a>
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



<style>
       body{
    margin: 0;
    padding: 0;
    
}

form{
    /* border: 1px solid black; */
    padding: 30px;
    border-radius: 10px;
    box-shadow: 0 0 8px 4px rgba(0,0,0,0.125);
}
    </style>

<div class="container">
    <div class="row my-5">
        <div class="col-sm-2"></div>
        <div class="col-sm-8">
        <div class="row">
           
            <div class="col-12">

                <form method="POST" action="includes/signup.inc.php"  class="reg-form">
                    <h3 class="text-center">Outech Registration</h3>
                    <h6 class="text-center text-secondary mb-5"><i>Please fill in your legal name</i></h6>

                    
                    
                    <div class="row">
                        <div class="col-sm-12 col-md-12 my-3">
                            <label for="firstname"><b>Username <span class="text-danger">*</span></b></label>
                            <input type="text" name="uid" placeholder="Enter username" class="form-control">
                            
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 my-3">
                        <label for="email"><b>Email <span class="text-danger">*</span></b></label>
                    <input type="text" name="email" placeholder="Enter email" class="form-control">
                    
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12 col-md-6 my-3">
                            <label for="password"><b>Password <span class="text-danger">*</span></b></label>
                            <input type="password" name="pwd" placeholder="Enter password" class="form-control">
                            
                        </div>
                        <div class="col-sm-12 col-md-6 my-3">
                            <label for="confirm_password"><b>Confirm password <span class="text-danger">*</span></b></label>
                            <input type="password" name="pwdrepeat" placeholder="Enter lastname" class="form-control">
                            
                        </div>
                    </div>

                  <div class="row">
                    <div class="col-12 text-center mt-5">
                    <input type="submit" value="Submit" name="submit" class="btn btn-primary">
                    </div>
                  </div>
                   
                </form>
            </div>
            
        </div>
        </div>
        <div class="col-sm-2"></div>
    </div>
</div>
 <br>
 <br><br>

 <div class="container">
    <div class="row my-5">
        <div class="col-sm-2"></div>
        <div class="col-sm-8">
        <div class="row">
           
            <div class="col-12">

                <form method="POST" action="includes/login.inc.php"  class="reg-form">
                    <h3 class="text-center">Outech Login</h3>
                    <h6 class="text-center text-secondary mb-5"><i>Please fill in your detials to login</i></h6>

                    
                  
                    <div class="row">
                        <div class="col-12 my-3">
                        <label for="email"><b>Email <span class="text-danger">*</span></b></label>
                    <input type="text" name="uid" placeholder="Enter email" class="form-control">
                    <small class="text-danger"></small>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12 my-3">
                            <label for="password"><b>Password <span class="text-danger">*</span></b></label>
                            <input type="password" name="pwd" placeholder="Enter password" class="form-control">
                            <small class="text-danger"></small>
                        </div>
                    </div>

                  <div class="row">
                    <div class="col-12 text-center mt-5">
                    <input type="submit" value="Submit" name="submit" class="btn btn-primary">
                    </div>
                  </div>
                   
                </form>
            </div>
            
        </div>
        </div>
        <div class="col-sm-2"></div>
    </div>
</div>


<?php include_once 'footer.php' ?>