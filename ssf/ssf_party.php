<?php
    include('../includes/session.php');

    if($_SERVER["REQUEST_METHOD"] == "POST") {
        //$partyid = mysqli_real_escape_string($db, $_POST['partyid']);
        $pname = mysqli_real_escape_string($db, $_POST['pname']);
        $paddress = mysqli_real_escape_string($db, $_POST['paddress']);
        $pgstin = mysqli_real_escape_string($db, $_POST['pgstin']);
        $pcategory = mysqli_real_escape_string($db, $_POST['pcategory']);
        if (isset($_POST['psubmit'])){
            $sql = "INSERT INTO `ssf_party` (`pname`, `paddress`, `pgstin`, `pcategory`) VALUES ('$pname','$paddress','$pgstin', '$pcategory')";
            $result = mysqli_query($db,$sql);
            $sql1 = "SELECT * FROM `ssf_party` ORDER BY `partyid` DESC LIMIT 1";
            $result1 = mysqli_query($db,$sql1);
            $row1 = mysqli_fetch_array($result1,MYSQLI_ASSOC);
            if($result){
                echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
                (Party Unique ID: '.$row1['partyid'].') <br>Name: <strong>'.$pname.'</strong><br>Address: <strong>'.$paddress.'</strong><br>GSTIN: <strong>'.$pgstin.'</strong><br>Category: <strong>'.$pcategory.'</strong>
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
    <link rel="stylesheet" href="../includes/css/design.css">
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
    <?php echo("<title>Party Registration $page_title</title>"); ?>
</head>
<body class="d-flex flex-column">
    <div class="flex-grow-1 flex-shrink-0">
        <div class="d-flex justify-content-center">
            <p class="h1"><?php echo $partyreg[0]; ?></p>
        </div>
        <div class="container col-4">
            <form method="POST" action="">
                <div class="form-group">
                    <label for="pname">Party Name</label>
                    <input type="text" class="form-control" id="pname" name="pname" required>
                </div>
                <div class="form-group">
                    <label for="paddress">Party Address</label>
                    <input type="text" class="form-control" id="paddress" name="paddress">
                </div>
                <div class="form-group">
                    <label for="pgstin">GSTIN</label>
                    <input type="text" class="form-control" id="pgstin" name="pgstin">
                </div>
                <div class="form-group">
                    <label for="pcategory">Party Category</label>
                    <select class="form-control" id="pcategory" name="pcategory">
                    <?php foreach($pcategories as $item){
                        echo "<option value='$item'>$item</option>";
                    }?>
                    </select>
                </div>
                <div class="d-flex justify-content-center flex-row mt-3">
                    <button type="submit" class="btn btn-primary mr-3" name="psubmit">Submit</button>
                    <input type="button" class="btn btn-danger mr-3" value="Back" onclick="history.back(-1)" />
                    <button type="home" onclick='window.location="ssf_contents.php";return false;' class="btn btn-secondary mr-3">Home</button>
                    <a class="btn btn-info" target="_blank" href="<?php echo $partyview[1]; ?>" role="button"><?php echo $partyview[0]; ?></a>
                    <!--<button type="submit" class="btn btn-primary" name="available">Available</button>-->
                </div>
                <!--<div class="container">
                    <div class="row no-gutters justify-content-center">
                        <div class="col"><button type="submit" class="btn btn-primary mr-3" name="psubmit">Submit</button></div>
                        <div class="col px-0"><button type="back" name="back" class="btn btn-danger mr-3" onclick="history.back(-1)">Back</button></div>
                        <div class="col px-0"><button type="home" onclick='window.location="ssf_contents.php";return false;' class="btn btn-secondary mr-3">Home</button></div>
                    </div>
                </div>-->
            </form>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row bg-secondary">
            <div class="col-lg-4 col-md-4 col-sm-6 col-xs-6">
                <h2>View by party</h2>
                <a class="btn btn-primary" href="ssf_party_cbb_view.php" role="button">View by Party</a>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-6 col-xs-6">
            3
            </div>
            <div class="col-lg-4 col-md-4 col-sm-6 col-xs-6">
            4
            </div>
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