<?php
    ob_start();
    include('../includes/session.php');
    include("../includes/allfunctions.php");

    $pidname = partyidname();

    if($_SERVER["REQUEST_METHOD"] == "POST") {
        /* $cbpurpose = mysqli_real_escape_string($db, $_POST['cbpurpose']);
        $cbsource = mysqli_real_escape_string($db, $_POST['cbsource']); */
        $cbdate = mysqli_real_escape_string($db, $_POST['cbdate']);
        $cbamount = mysqli_real_escape_string($db, $_POST['cbamount']);
        $cbreceivedby = mysqli_real_escape_string($db, $_POST['cbreceivedby']);
        $cbentry = mysqli_real_escape_string($db, $_POST['cbentry']);
        $cblocation = mysqli_real_escape_string($db, $_POST['cblocation']);
        //$cbpcategory = mysqli_real_escape_string($db, $_POST['cbpcategory']);
        //$pidname = partyidname();
        $pidname = mysqli_real_escape_string($db, $_POST['cbpdetails']);
        $array =  explode('-', $pidname);
        if (isset($_POST['cbsubmit'])){
            $sql = "INSERT INTO `ssf_cashbook` (`cbdate`, `cbamount`, `cbreceivedby`, `cbentry`, `cblocation`, `cbpid`, `cbpname`) VALUES ('$cbdate','$cbamount','$cbreceivedby','$cbentry','$cblocation', '$array[0]', '$array[1]')";
            $pidname = partyidname();
            $result = mysqli_query($db,$sql) or die(mysqli_error($db));

            $sql1 = "SELECT * FROM `ssf_cashbook` ORDER BY `cbid` DESC LIMIT 1";
            $result1 = mysqli_query($db,$sql1) or die(mysqli_error($db));
            $row1 = mysqli_fetch_array($result1,MYSQLI_ASSOC);
            if($result){
                echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
                Cashbook Entry Unique ID: <strong>'.$row1['cbid'].'</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>';
            }
            else{
                echo "There is something wrong. Contact Admin.";
            }
        }
    }
    ob_end_flush();
?>
<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <!-- Font Awesome CSS -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" integrity="sha384-gfdkjb5BdAXd+lj+gudLWI+BXq4IuLW5IT+brZEZsLFm++aCMlF1V92rMkPaX4PP" crossorigin="anonymous">
    <!-- CSS for party category search in select item -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" integrity="sha512-nMNlpuaDPrqlEls3IX/Q56H36qvBASwb3ipuo3MxeWbsQB1881ox0cRv7UPTgBlriqoynt35KjEwgGUeUXIPnw==" crossorigin="anonymous" />
    <!-- Mine CSS -->
    <link rel="stylesheet" href="../includes/css/design.css">

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js" integrity="sha512-2ImtlRlf2VVmiGZsjm9bEyhjGW4dU7B6TNwh/hx/iSByxNENtj3WVE6o/9Lj4TJeVXPi4bnOIMXFIJJAeufa0A==" crossorigin="anonymous"></script>
    <?php echo("<title>$cashbook[0] $page_title</title>"); ?>
</head>
<body class="d-flex flex-column">
    <div class="flex-grow-1 flex-shrink-0">
        <div class="d-flex justify-content-center">
            <p class="h2 bg-light px-4 py-2" style="border-radius: 25px"><?php echo strtoupper($cashbook[0]); ?></p>
        </div>
        <div class="container col-4">
            <form method="POST" action="">
               <!--  <div class="form-group">
                    <label for="cbpurpose">Purpose</label>
                    <input type="text" class="form-control" id="cbpurpose" name="cbpurpose" required>
                </div>
                <div class="form-group">
                    <label for="cbsource">Source</label>
                    <input type="text" class="form-control" id="cbsource" name="cbsource" required>
                </div> -->
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label for="cbdate">Date</label>
                            <input type="date" class="form-control" id="cbdate" name="cbdate" value="<?php echo date('Y-m-d') ?>">
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label for="cbamount">Amount</label>
                            <input type="number" class="form-control" id="cbamount" step="0.01" min="0.01" name="cbamount" required>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label for="cbreceivedby">Received By</label>
                            <input type="text" class="form-control" id="cbreceivedby" name="cbreceivedby" required>
                        </div>
                    </div>
                    <div class="col-6">
                        <div>Amount Entry</div>
                        <div class="form-check form-check-inline py-2">
                            <input class="form-check-input" type="radio" name="cbentry" id="amountin" value="in" checked>
                            <label class="form-check-label" for="amountin">
                                In
                            </label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="cbentry" id="amountout" value="out">
                            <label class="form-check-label" for="amountout">
                                Out
                            </label>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="cblocation">Location</label>
                    <textarea class="form-control" id="cblocation" rows="3" name="cblocation"></textarea>
                </div>
                <div class="form-group">
                    <label for="cbpdetails">Party Details</label>
                    <select class="cbpdetails form-control" id="cbpdetails" name="cbpdetails">
                        <!--<option value='Select'>Select</option>;-->
                        <?php foreach($pidname as $detail){
                            echo "<option value='$detail'>$detail</option>";
                        }?>
                    </select>
                </div>
                <div class="d-flex justify-content-center mt-3">
                    <button type="submit" class="btn btn-primary mr-3" name="cbsubmit">Submit</button>
                    <input type="button" class="btn btn-danger mr-3" value="Back" onclick="history.back(-1)" />
                    <button type="home" onclick='window.location="ssf_contents.php";return false;' class="btn btn-secondary mr-3">Home</button>
                    <a class="btn btn-info" target="_blank" href="<?php echo $cashbook[3]; ?>" role="button"><?php echo $cashbook[2]; ?></a>
                    <!--<button type="submit" class="btn btn-primary" name="available">Available</button>-->
                </div>
            </form>
        </div>
    </div>
    <!-- <div class="row bg-secondary">
        <div class="col">
            <form method="GET" action="ssf_cashbook_view.php">
                <div class="form-group">
                    <label for="cbmonthview">Date</label>
                    <input type="date" class="form-control" id="cbmonthview" name="cbdate" value="<?php //echo date('Y-m-d') ?>">
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
    </div> -->
    <script>
        if ( window.history.replaceState ) {
        window.history.replaceState( null, null, window.location.href );
        }
    </script>
    <script>
        $(document).ready(function(){
            // Initialize select2
            $("#cbpdetails").select2();
        });
    </script>
</body>
</html>