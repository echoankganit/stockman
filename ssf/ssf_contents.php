<?php
    include("../includes/session.php");
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" integrity="sha384-gfdkjb5BdAXd+lj+gudLWI+BXq4IuLW5IT+brZEZsLFm++aCMlF1V92rMkPaX4PP" crossorigin="anonymous">
    <link rel="stylesheet" href="../includes/css/design.css">
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
    <?php echo("<title>Contents$page_title</title>"); ?>
  </head>
  <body>
    <div class="d-flex justify-content-center mb-3">
        <p class="h2 bg-light px-5 py-2" style="border-radius: 25px"><?php echo strtoupper($comp1[0]); ?></p>
    </div>
    <div class="container">
        <div class="row justify-content-md-center">
            <div class="col-4">
              <a type="button" name="rsm" href="<?php echo $rsm[1]; ?>" class="btn btn-lg btn-danger form-control"><?php echo $rsm[0]; ?></a>
            </div>
            <div class="col-4">
              <a type="button" name="rsm" href="<?php echo $partyreg[1]; ?>" class="btn btn-lg text-white btn-dark form-control"><?php echo $partyreg[0]; ?></a>
            </div>
        </div>
        <div class="row justify-content-md-center mt-3">
            <div class="col-4">
              <a type="button" name="rsm" href="<?php echo $empattendance[1]; ?>" class="btn btn-lg btn-danger form-control"><?php echo $empattendance[0]; ?></a>
            </div>
            <div class="col-4">
              <a type="button" name="rsm" href="<?php echo $empreg[1]; ?>" class="btn btn-lg text-white btn-dark form-control"><?php echo $empreg[0]; ?></a>
            </div>
        </div>
        <div class="row justify-content-md-center mt-3">
            <div class="col-4">
              <a type="button" name="rsm" href="<?php echo $cashbook[1]; ?>" class="btn btn-lg btn-success form-control"><?php echo $cashbook[0]; ?></a>
            </div>
            <div class="col-4">
              <a type="button" name="rsm" href="<?php echo $contreg[1]; ?>" class="btn btn-lg text-white btn-dark form-control"><?php echo $contreg[0]; ?></a>
            </div>
        </div>
        <div class="row justify-content-md-center mt-3">
            <div class="col-4">
              <a type="button" name="rsm" href="<?php echo $bankbook[1]; ?>" class="btn btn-lg btn-success form-control"><?php echo $bankbook[0]; ?></a>
            </div>
            <div class="col-4">
              <a type="button" name="rsm" href="<?php echo $nkreg[1]; ?>" class="btn btn-lg text-white btn-dark form-control"><?php echo $nkreg[0]; ?></a>
            </div>
        </div>
        <div class="row justify-content-md-center mt-3">
            <div class="col-4">
              <a type="button" name="rsm" href="<?php echo $khushboo[1]; ?>" class="btn btn-lg btn-warning form-control"><?php echo $khushboo[0]; ?></a>
            </div>
            <div class="col-4">
              <a type="button" name="rsm" href="<?php echo $viewpartycbbb[1]; ?>" class="btn btn-lg btn-primary form-control"><?php echo $viewpartycbbb[0]; ?></a>
            </div>
        </div>
        <div class="row justify-content-md-center mt-3">
            <div class="col-4">
              <a type="button" name="rsm" href="<?php echo $stitching[1]; ?>" class="btn btn-lg btn-warning form-control"><?php echo $stitching[0]; ?></a>
            </div>
            <div class="col-4">
              <a type="button" name="rsm" href="<?php echo $viewcontb[1]; ?>" class="btn btn-lg btn-primary form-control"><?php echo $viewcontb[0]; ?></a>
            </div>
        </div>
        <div class="row justify-content-md-center mt-3">
            <div class="col-4">
              <a type="button" name="rsm" href="<?php echo $majdoori[1]; ?>" class="btn btn-lg btn-warning form-control"><?php echo $majdoori[0]; ?></a>
            </div>
            <div class="col-4">
              <a type="button" name="rsm" href="<?php echo $invoiceform[1]; ?>" class="btn btn-lg btn-primary form-control disabled"><?php echo $invoiceform[0].' (Generate PDF)'; ?></a>
            </div>
        </div>
    </div>
</body>
</html>