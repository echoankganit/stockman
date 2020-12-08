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
            <div class="col content-col-3">
                <div class="btn-group-vertical">
                    <form action="ssf_rsm.php" method="GET">
                        <button type="submit" name="rsm" class="btn btn-lg btn-danger">Rice Stock Management</button>
                    </form>
                    <form action="ssf_attendance.php" method="GET">
                        <button type="submit" name="attendance" class="btn btn-lg btn-danger">Employee Attendance</button>
                    </form>
                    <form action="ssf_cashbook.php" method="GET">
                        <button type="submit" name="cashbook" class="btn btn-lg btn-success">Cash Book</button>
                    </form>
                    <form action="ssf_bankbook.php" method="GET">
                        <button type="submit" name="bankbook" class="btn btn-lg btn-success">Bank Book</button>
                    </form>
                    <form action="ssf_khushboo.php" method="GET">
                        <button type="submit" name="khushboo" class="btn btn-lg btn-warning">Khushboo</button>
                    </form>
                    <form action="ssf_stitching.php" method="GET">
                        <button type="submit" name="stitching" class="btn btn-lg btn-warning">Stitching</button>
                    </form>
                    <form action="ssf_majdoori.php" method="GET">
                        <button type="submit" name="majdoori" class="btn btn-lg btn-warning">Majdoori</button>
                    </form>
                </div>
            </div>
            <div class="col content-col-3">
                <div class="btn-group-vertical">
                    <form action="ssf_party.php" method="GET">
                        <button type="submit" name="party" class="btn btn-lg text-white btn-dark">Party Registration</button>
                    </form>
                    <form action="ssf_employee.php" method="GET">
                        <button type="submit" name="employee" class="btn btn-lg text-white btn-dark">Employee Registration</button>
                    </form>
                    <form action="ssf_contractor.php" method="GET">
                        <button type="submit" name="contractor" class="btn btn-lg text-white btn-dark">Contractor Registration</button>
                    </form>
                    <form action="ssf_new_khushboo.php" method="GET">
                        <button type="submit" name="khushboo" class="btn btn-lg text-white btn-dark">Add New Khushboo</button>
                    </form>
                    <form action="ssf_invoice_form.php" method="POST">
                        <button type="submit" name="invoice" class="btn btn-lg text-black btn-light" disabled>Invoice (Generate PDF)</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <?php include("../includes/footer.php");?>
</body>
</html>