<?php
    include('../includes/session.php');

    if($_SERVER["REQUEST_METHOD"] == "POST") {
        $contname = mysqli_real_escape_string($db, $_POST['contname']);
        $contaddress = mysqli_real_escape_string($db, $_POST['contaddress']);
        $contppp = mysqli_real_escape_string($db, $_POST['contppp']);
        $contdate = mysqli_real_escape_string($db, $_POST['contdate']);
        if (isset($_POST['contsubmit'])){
            $sql = "INSERT INTO `ssf_contractor` (`contname`, `contaddress`, `contppp`, `contdate`) VALUES ('$contname','$contaddress', '$contppp', '$contdate')";
            $result = mysqli_query($db,$sql);
            $sql1 = "SELECT * FROM `ssf_contractor` ORDER BY `contid` DESC LIMIT 1";
            $result1 = mysqli_query($db,$sql1);
            $row1 = mysqli_fetch_array($result1,MYSQLI_ASSOC);
            if($result){
                echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
                (Contractor Unique ID: '.$row1['contid'].') <br>Contractor Name: <strong>'.$contname.'</strong><br>Contractor Address: <strong>'.$contaddress.'</strong><br>Date: <strong>'.$row1['contdate'].'</strong><br>Price per Piece: <strong>'.$row1['contppp'].'</strong>
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
    <?php echo("<title>Contractor Registration$page_title</title>"); ?>
</head>
<body class="d-flex flex-column">
    <div class="flex-grow-1 flex-shrink-0">
        <div class="d-flex justify-content-center">
            <p class="h1"><?php echo $contreg[0]; ?></p>
        </div>
        <div class="container col-4">
            <form method="POST" action="">
                <div class="form-group">
                    <label for="contname">Contractor Name</label>
                    <input type="text" class="form-control" id="contname" name="contname" required>
                </div>
                <div class="form-group">
                    <label for="contaddress">Contractor Address</label>
                    <input type="text" class="form-control" id="contaddress" name="contaddress" required>
                </div>
                <div class="form-group">
                    <label for="contppp">Price per Piece</label>
                    <input type="number" class="form-control" id="contppp" name="contppp" min=0 required>
                </div>
                <div class="form-group">
                    <label for="contdate">Date of Registration</label>
                    <input type="date" class="form-control" id="contdate" name="contdate" value="<?php echo date('Y-m-d') ?>" required>
                </div>
                <div class="d-flex justify-content-center mt-3">
                    <button type="submit" class="btn btn-primary mr-3" name="contsubmit">Submit</button>
                    <input type="button" class="btn btn-danger mr-3" value="Back" onclick="history.back(-1)" />
                    <button type="home" onclick='window.location="ssf_contents.php";return false;' class="btn btn-secondary mr-3">Home</button>
                </div>
            </form>
        </div>
    </div>
    <div class="row bg-secondary">
        <div class="col-lg-4 col-md-4 col-sm-6 col-xs-6">
            <form method="GET" action="ssf_contractor_view.php">
                <button type="submit" class="btn btn-primary" name="ssfcontview">View Contractors</button>
            </form>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-6 col-xs-6">
        b
        </div>
        <div class="col-lg-4 col-md-4 col-sm-6 col-xs-6">
        c
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