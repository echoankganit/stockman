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
                        <form action="ssf_rsm.php" method="GET">
                            <button type="submit" name="rsm" class="btn btn-lg btn-primary">Rice Stock Management</button>
                        </form>
                        <form action="ssf_attendance.php" method="GET">
                            <button type="submit" name="attendance" class="btn btn-lg btn-success">Employee Attendance</button>
                        </form>
                        <form action="ssf_cashbook.php" method="GET">
                            <button type="submit" name="cashbook" class="btn btn-lg btn-success">Cash Book</button>
                        </form>
                        <form action="ssf_bankbook.php" method="GET">
                            <button type="submit" name="bankbook" class="btn btn-lg btn-success">Bank Book</button>
                        </form>
                        <form action="ssf_khushboo.php" method="GET">
                            <button type="submit" name="khushboo" class="btn btn-lg btn-success">Khushboo</button>
                        </form>
                        <form action="ssf_stitching.php" method="GET">
                            <button type="submit" name="stitching" class="btn btn-lg btn-success">Stitching</button>
                        </form>
                        <form action="ssf_majduri.php" method="GET">
                            <button type="submit" name="majduri" class="btn btn-lg btn-success">Majduri</button>
                        </form>
                    </div>
                </div>
                <div class="col content-col-3">
                    <div class="btn-group-vertical">
                        <form action="ssf_party.php" method="GET">
                            <button type="submit" name="party" class="btn btn-lg btn-success">Party Registration</button>
                        </form>
                        <form action="ssf_employee.php" method="GET">
                            <button type="submit" name="employee" class="btn btn-lg btn-success">Employee Registration</button>
                        </form>
                        <form action="ssf_contractor.php" method="GET">
                            <button type="submit" name="contractor" class="btn btn-lg btn-success">Contractor Registration</button>
                        </form>
                        <form action="ssf_new_khushboo.php" method="GET">
                            <button type="submit" name="khushboo" class="btn btn-lg btn-success">Add New Khushboo</button>
                        </form>
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