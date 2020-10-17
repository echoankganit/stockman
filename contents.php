<?php
    //include("includes\header.php");
    include("includes/bg.php");
    include("includes\connection.php");
    //include('includes/session.php');
    $comp=" ";
    if (isset($_GET['company'])){
        $comp = mysqli_real_escape_string($db,$_GET['comp']);
    }
    if (isset($_GET['company1'])){
        $comp = mysqli_real_escape_string($db,$_GET['comp']);
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
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/design.css">
    <title>Contents - Stock Management System</title>
  </head>
  <body>
    <div class="d-flex align-items-center min-vh-100">
        <div class="container">
            <div class="row justify-content-md-center">
                <div class="col content-col-3">
                    <div class="btn-group-vertical">
                        <?php
                            if($comp=='ssf'){
                                echo '<form action="ssf_rsm.php" method="GET">
                                    <button type="submit" name="rsm" class="btn btn-lg btn-primary">Rice Stock Management</button>
                                </form>';
                                echo '<form action="ssf_cashbook.php" method="GET">
                                    <button type="submit" name="cashbook" class="btn btn-lg btn-success">Cash Book</button>
                                </form>';
                            }
                            else{
                                echo '<form action="svf_rsm.php" method="GET">
                                    <button type="submit" name="rsm" class="btn btn-lg btn-primary">Rice Stock Management</button>
                                </form>';
                                echo '<form action="svf_cashbook.php" method="GET">
                                    <button type="submit" name="cashbook" class="btn btn-lg btn-success">Cah Book</button>
                                </form>';
                            }
                        ?>
                        <button type="button" class="btn btn-lg btn-dark mb-2" disabled>Product Management</button>
                        <button type="button" class="btn btn-lg btn-dark mb-2" disabled>Button 3</button>
                        <button type="button" class="btn btn-lg btn-dark mb-2" disabled>Button 4</button>
                        <button type="button" class="btn btn-lg btn-dark mb-2" disabled>Button 5</button>
                    </div>
                </div>
                <div class="col content-col-3">
                    <div class="btn-group-vertical">
                        <button type="button" class="btn btn-lg btn-dark mb-2" disabled>Button 3</button>
                        <button type="button" class="btn btn-lg btn-dark mb-2" disabled>Button 4</button>
                        <button type="button" class="btn btn-lg btn-dark mb-2" disabled>Button 5</button>
                        <button type="button" class="btn btn-lg btn-dark mb-2" disabled>Button 3</button>
                        <button type="button" class="btn btn-lg btn-dark mb-2" disabled>Button 4</button>
                    </div>
                </div>
            </div>
            <div class="row justify-content-md-center">
                <input type="button" class="btn btn-danger" value="Back" onclick="history.back(-1)" />
            </div>
        </div>
    </div>
    <?php include("includes/footer.php");?>
</body>
</html>