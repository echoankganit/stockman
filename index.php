<?php
/* https://www.tutorialspoint.com/php/php_mysql_login.htm */
   include("includes/bg.php");
   include("includes/connection.php");
   session_start();
   $error ="";
   $err1 ="";
   if($_SERVER["REQUEST_METHOD"] == "POST") {
      // username and password sent from form 
      $myusername = mysqli_real_escape_string($db,$_POST['username']);
      $mypassword = mysqli_real_escape_string($db,$_POST['password']);
      if (isset($_POST['ssf_login'])){ 
         $sql = "SELECT * FROM admin WHERE username = '$myusername' and passcode = '$mypassword'";
         $result = mysqli_query($db,$sql);
         /* https://www.php.net/manual/en/mysqli-result.fetch-array.php */
         $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
         //$active = $row['active'];
         
         $count = mysqli_num_rows($result);
         // If result matched $myusername and $mypassword, table row must be 1 row
         if($count == 1) {
            //session_register("myusername");
            $_SESSION['login_user'] = $myusername;
            header("location: ssf/ssf_contents.php");
         }
         else {
            $error = "Invalid Login ID or PW";
         }
      }
      else if (isset($_POST['svf_login'])){ 
         $sql = "SELECT * FROM admin WHERE username = '$myusername' and passcode = '$mypassword'";
         $result = mysqli_query($db2,$sql);
         /* https://www.php.net/manual/en/mysqli-result.fetch-array.php */
         $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
         //$active = $row['active'];
         
         $count = mysqli_num_rows($result);
         // If result matched $myusername and $mypassword, table row must be 1 row
         if($count == 1) {
            //session_register("myusername");
            $_SESSION['login_user'] = $myusername;
            header("location: svf/svf_contents.php");
         }
         else {
            $err1 = "Invalid Login ID or PW";
         }
      }
   }
?>
<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <!-- copied from site https://bootsnipp.com/snippets/3522X login form
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script> -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" integrity="sha384-gfdkjb5BdAXd+lj+gudLWI+BXq4IuLW5IT+brZEZsLFm++aCMlF1V92rMkPaX4PP" crossorigin="anonymous">
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="includes/css/design.css">
    <style type="text/css">
      body {
         background-image:url(images/background/bg.jpg);
      }
   </style>
   <?php echo("<title>Login | Stock Management System</title>"); ?>
</head>
<body>
<div class="container h-100">
   <div class="row d-flex justify-content-center">
      <div class="col-6 d-flex justify-content-center">
         <h3>Sri Sri Foods</h3>
      </div>
      <div class="col-6 d-flex justify-content-center">
         <h3>Shree Vardhman Foods</h3>
      </div>
   </div>
   <div class="row d-flex justify-content-center h-100">
      <div class="col">
         <div class="container h-100">
            <div class="d-flex justify-content-center h-100">
               <div class="user_card">
                  <div class="d-flex justify-content-center">
                     <div class="brand_logo_container">
                        <img src="images/anthem-logo.png" class="brand_logo" alt="Logo">
                     </div>
                  </div>
                  <div class="d-flex justify-content-center form_container">
                     <form action="" method="POST">
                        <div class="input-group mb-3">
                           <div class="input-group-append">
                              <span class="input-group-text"><i class="fas fa-user"></i></span>
                           </div>
                           <input type="text" name="username" class="form-control input_user" placeholder="Username">
                        </div>
                        <div class="input-group mb-3">
                           <div class="input-group-append">
                              <span class="input-group-text"><i class="fas fa-key"></i></span>
                           </div>
                           <input type="password" name="password" class="form-control input_pass" placeholder="Password">
                        </div>
                        <!--<div class="form-group">
                           <div class="custom-control custom-checkbox">
                              <input type="checkbox" class="custom-control-input" id="customControlInline">
                              <label class="custom-control-label" for="customControlInline">Remember me</label>
                           </div>
                        </div>-->
                        <div class="d-flex justify-content-center mt-5 login_container">
                           <input type="submit" value="Login" name="ssf_login" class="btn login_btn">
                        </div>
                     </form>
                  </div>
                  <div style = "font-size:15px; color:#cc0000; margin-top:10px"><?php echo $error; ?></div>
                  <!-- <div class="mt-4">
                     <div class="d-flex justify-content-center links">
                        Don't have an account? <a href="#" class="ml-2">Sign Up</a>
                     </div>
                     <div class="d-flex justify-content-center links">
                        <a href="#">Forgot your password?</a>
                     </div>
                  </div> -->
               </div>
            </div>
         </div>
      </div>
      <div class="col">
         <div class="container h-100">
            <div class="d-flex justify-content-center h-100">
               <div class="user_card">
                  <div class="d-flex justify-content-center">
                     <div class="brand_logo_container">
                        <img src="images/anthem-logo.png" class="brand_logo" alt="Logo">
                     </div>
                  </div>
                  <div class="d-flex justify-content-center form_container">
                     <form action="" method="POST">
                        <div class="input-group mb-3">
                           <div class="input-group-append">
                              <span class="input-group-text"><i class="fas fa-user"></i></span>
                           </div>
                           <input type="text" name="username" class="form-control input_user" placeholder="Username">
                        </div>
                        <div class="input-group mb-3">
                           <div class="input-group-append">
                              <span class="input-group-text"><i class="fas fa-key"></i></span>
                           </div>
                           <input type="password" name="password" class="form-control input_pass" placeholder="Password">
                        </div>
                        <!--<div class="form-group">
                           <div class="custom-control custom-checkbox">
                              <input type="checkbox" class="custom-control-input" id="customControlInline">
                              <label class="custom-control-label" for="customControlInline">Remember me</label>
                           </div>
                        </div>-->
                        <div class="d-flex justify-content-center mt-5 login_container">
                           <input type="submit" value="Login" name="svf_login" class="btn login_btn">
                        </div>
                     </form>
                  </div>
                  <div style = "font-size:15px; color:#cc0000; margin-top:10px"><?php echo $err1; ?></div>
                  <!-- <div class="mt-4">
                     <div class="d-flex justify-content-center links">
                        Don't have an account? <a href="#" class="ml-2">Sign Up</a>
                     </div>
                     <div class="d-flex justify-content-center links">
                        <a href="#">Forgot your password?</a>
                     </div>
                  </div> -->
               </div>
            </div>
         </div>
      </div>
   </div>
</div>   
<?php include("includes/footer.php"); ?>
</body>
</html>