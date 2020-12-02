<?php
    //include("includes\header.php");
    include("../includes/bg.php");
    include("../includes/connection.php");
    include("../includes/allfunctions.php");
    //include('includes/session.php');
    $pname = partyname();
    $pcategory = partycategory();

    if($_SERVER["REQUEST_METHOD"] == "POST") {
        $purpose = mysqli_real_escape_string($db, $_POST['purpose']);
        $source = mysqli_real_escape_string($db, $_POST['source']);
        $cbdate = mysqli_real_escape_string($db, $_POST['cbdate']);
        $amount = mysqli_real_escape_string($db, $_POST['amount']);
        $receivedby = mysqli_real_escape_string($db, $_POST['receivedby']);
        $amountentry = mysqli_real_escape_string($db, $_POST['amountentry']);
        $location = mysqli_real_escape_string($db, $_POST['location']);
        $pcategory = mysqli_real_escape_string($db, $_POST['pcategory']);
        $pname = partyname();
        if($pcategory!='Select'){
            $pname = mysqli_real_escape_string($db, $_POST['pname']);
            $array =  explode('-', $pname);
            if (isset($_POST['cbsubmit'])){
                $sql = "INSERT INTO `ssf_cashbook` (`purpose`, `source`, `cbdate`, `amount`, `receivedby`, `amountentry`, `location`, `pcategory`, `pname`) VALUES ('$purpose','$source','$cbdate','$amount','$receivedby','$amountentry','$location','$pcategory','$array[1]')";
                $pname = partyname();
                $pcategory = partycategory();
                $result = mysqli_query($db,$sql);
                //$sql1 = "SELECT * FROM `ssf_cashbook`";
                //$result1 = mysqli_query($db,$sql1);
                //$row1 = mysqli_fetch_array($result1,MYSQLI_ASSOC);
                if($result){
                    echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
                    Successfull
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>';
                }
            }
        }
        else {
            echo 'Choose Party Category then again submit the form. (This page will refresh automatically in 3 seconds)';
            header("refresh: 3");
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
    <link rel="stylesheet" href="../includes/css/design.css">
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script>
        $(document).ready(function(){
            $("select.partycategory").change(function(){
                var selectedPcategory = $(".partycategory option:selected").val();
                $.ajax({
                    type: "POST",
                    url: "../includes/process-request.php",
                    data: { partycategory : selectedPcategory } 
                }).done(function(data){
                    $("#partyname").html(data);
                });
            });
        });
    </script>
    <?php echo("<title>Cash Book$page_title</title>"); ?>
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
                            <input type="date" class="form-control" id="cbdate" name="cbdate" value="<?php echo date('Y-m-d') ?>">
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label for="amount">Amount</label>
                            <input type="number" class="form-control" id="amount" step="0.01" min="0.01" name="amount" required>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label for="receivedby">Received By</label>
                            <input type="text" class="form-control" id="receivedby" name="receivedby" required>
                        </div>
                    </div>
                    <div class="col-6">
                        <div>Amount Entry</div>
                        <div class="form-check form-check-inline py-2">
                            <input class="form-check-input" type="radio" name="amountentry" id="amountin" value="in" checked>
                            <label class="form-check-label" for="amountin">
                                In
                            </label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="amountentry" id="amountout" value="out">
                            <label class="form-check-label" for="amountout">
                                Out
                            </label>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="location">Location</label>
                    <textarea class="form-control" id="location" rows="3" name="location"></textarea>
                </div>
                <div class="form-group">
                    <label for="pcategory">Party Catgory</label>
                    <select class="partycategory form-control" id="partycategory" name="pcategory">
                    <option value='Select'>Select</option>;
                    <?php foreach($pcategory as $item){
                        echo "<option value='$item'>$item</option>";
                    }?>
                    </select>
                </div>
                <div id="partyname">

                </div>
                <div class="d-flex justify-content-center mt-3">
                    <button type="submit" class="btn btn-primary mr-3" name="cbsubmit">Submit</button>
                    <input type="button" class="btn btn-danger mr-3" value="Back" onclick="history.back(-1)" />
                    <button type="home" onclick='window.location="ssf_contents.php";return false;' class="btn btn-secondary mr-3">Home</button>
                    <!--<button type="submit" class="btn btn-primary" name="available">Available</button>-->
                </div>
            </form>
        </div>
    </div>
    <div class="row bg-secondary">
        <div class="col">
            <form method="GET" action="ssf_cashbook_view.php">
                <div class="form-group">
                    <label for="cbmonthview">Date</label>
                    <input type="date" class="form-control" id="cbmonthview" name="cbdate" value="<?php echo date('Y-m-d') ?>">
                </div>
                <button type="submit" class="btn btn-primary" name="cbmonthview">View</button>
            </form>
        </div>
        <div class="col">
            <label for="cbpartyview">Date</label><br>
            <a class="btn btn-primary" href="ssf_party_cbb_view.php" role="button" id="cbpartyview">View by Party</a>
        </div>
        <div class="col">
        3
        </div>
        <div class="col">
        4
        </div>
    </div>
    <?php include("../includes/footer.php");?>
    <script>
        if ( window.history.replaceState ) {
        window.history.replaceState( null, null, window.location.href );
        }
    </script>
</body>
</html>