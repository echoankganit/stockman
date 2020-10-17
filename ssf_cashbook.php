<?php
    //include("includes\header.php");
    include("includes/bg.php");
    include("includes\connection.php");
    //include('includes/session.php');
    if($_SERVER["REQUEST_METHOD"] == "POST") {
        $purpose = mysqli_real_escape_string($db, $_POST['purpose']);
        $source = mysqli_real_escape_string($db, $_POST['source']);
        $cbdate = mysqli_real_escape_string($db, $_POST['cbdate']);
        $amount = mysqli_real_escape_string($db, $_POST['amount']);
        $receivedby = mysqli_real_escape_string($db, $_POST['receivedby']);
        $location = mysqli_real_escape_string($db, $_POST['location']);
        if (isset($_POST['cbsubmit'])){
            $sql = "INSERT INTO `ssf_cashbook` (`purpose`, `source`, `cbdate`, `amount`, `receivedby`, `location`) VALUES ('$purpose','$source','$cbdate','$amount','$receivedby','$location')";
            $result = mysqli_query($db,$sql);
            //$sql1 = "SELECT * FROM `ssf_cashbook`";
            //$result1 = mysqli_query($db,$sql1);
            //$row1 = mysqli_fetch_array($result1,MYSQLI_ASSOC);
            if($result){
                /*echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
                <strong>'.$cbdate.' KG x '.$amount.' amount = '.$totalweight.' KG '.$receivedby.'</strong> Under '.$purpose.' '.$source.'*/
                echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
                Successfull
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>';
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
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" integrity="sha384-gfdkjb5BdAXd+lj+gudLWI+BXq4IuLW5IT+brZEZsLFm++aCMlF1V92rMkPaX4PP" crossorigin="anonymous">
    <link rel="stylesheet" href="css/design.css">
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
    <title>Cashbook - Sri Sri Foods</title>
</head>
<body class="d-flex flex-column">
    <div class="flex-grow-1 flex-shrink-0">
        <div class="d-flex justify-content-center">
            <p class="h1">CASH BOOK</p>
        </div>
        <div class="container col-4">
            <form method="POST" action="">
                <div class="form-group">
                    <label for="purpose">Purpose</label>
                    <input type="text" class="form-control" id="purpose" name="purpose" required>
                </div>
                <div class="form-group">
                    <label for="source">Source</label>
                    <input type="text" class="form-control" id="source" name="source" required>
                </div>
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label for="cbdate">Date</label>
                            <input type="date" class="form-control" id="cbdate" name="cbdate" required>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label for="amount">Amount</label>
                            <input type="number" class="form-control" id="amount" step="0.01" min="0.01" name="amount" required>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="receivedby">Received By</label>
                    <input type="text" class="form-control" id="receivedby" name="receivedby" required>
                </div>
                <div class="form-group">
                    <label for="location">Location</label>
                    <textarea class="form-control" id="location" rows="3" name="location"></textarea>
                </div>
                <div class="d-flex justify-content-center mt-3">
                    <button type="submit" class="btn btn-primary mr-3" name="cbsubmit">Submit</button>
                    <input type="button" class="btn btn-danger mr-3" value="Back" onclick="history.back(-1)" />
                    <button type="home" onclick='window.location="dashboard.php";return false;' class="btn btn-secondary mr-3">Home</button>
                    <!--<button type="submit" class="btn btn-primary" name="available">Available</button>-->
                </div>
            </form>
        </div>
    </div>
    <div class="row bg-secondary">
        <div class="col">
            <form method="GET" action="cashbookview.php">
            <div class="form-group">
                <label for="cbmonthview">Date</label>
                <input type="date" class="form-control" id="cbmonthview" name="cbdate" required>
            </div>
            <button type="submit" class="btn btn-primary" name="cbmonthview">View</button>
            </form>
        </div>
        <div class="col">
        2
        </div>
        <div class="col">
        3
        </div>
        <div class="col">
        4
        </div>
    </div>
    <?php include("includes/footer.php");?>
    <script>
        if ( window.history.replaceState ) {
        window.history.replaceState( null, null, window.location.href );
        }
    </script>
</body>
</html>