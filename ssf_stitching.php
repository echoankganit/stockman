<?php
    //include("includes\header.php");
    include("includes/bg.php");
    include("includes\connection.php");
    include("includes\allfunctions.php");
    //include('includes/session.php');
    $cont = cont();

    if($_SERVER["REQUEST_METHOD"] == "POST") {
        $stdate  = mysqli_real_escape_string($db, $_POST['stdate']);
        $stunits = mysqli_real_escape_string($db, $_POST['stunits']);
        $stcontractor = mysqli_real_escape_string($db, $_POST['stcontractor']);
        $array =  explode('-', $stcontractor);
        $cont = cont();
        /*if($stcontractor!='Select'){*/
            if (isset($_POST['stsubmit'])){
                //$sql = "INSERT INTO `ssf_stitching` (`stdate`, `stunits`, `stcontractor`) VALUES ('$stdate','$stunits','$stcontractor')";
                $sql = "INSERT INTO `ssf_stitching` (`stdate`, `stunits`, `stcontid`, `stcontname`) VALUES ('$stdate','$stunits','$array[0]','$array[1]')";
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
        /*}
        else {
            echo 'Choose Party Category then again submit the form. (This page will refresh automatically in 3 seconds)';
            header("refresh: 3");
        }*/
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
    <title>Stitching - Sri Sri Foods</title>
</head>
<body class="d-flex flex-column">
    <div class="flex-grow-1 flex-shrink-0">
        <div class="d-flex justify-content-center">
            <p class="h1">STITCHING</p>
        </div>
        <div class="container col-4">
            <form method="POST" action="">
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label for="stdate">Date</label>
                            <input type="date" class="form-control" id="stdate" name="stdate" value="<?php echo date('Y-m-d') ?>">
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label for="stunits">Units</label>
                            <input type="number" class="form-control" min=1 value=1 id="stunits" name="stunits" required>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="stcontractor">Contractor Name</label>
                    <select class="form-control" id="stcontractor" name="stcontractor">
                        <!--<option value='Select'>Select</option>;-->
                        <?php foreach($cont as $name){
                            echo "<option value='$name'>$name</option>";
                        }?>
                    </select>
                </div>
                <div class="d-flex justify-content-center mt-3">
                    <button type="submit" class="btn btn-primary mr-3" name="stsubmit">Submit</button>
                    <input type="button" class="btn btn-danger mr-3" value="Back" onclick="history.back(-1)" />
                    <button type="home" onclick='window.location="dashboard.php";return false;' class="btn btn-secondary mr-3">Home</button>
                    <!--<button type="submit" class="btn btn-primary" name="available">Available</button>-->
                </div>
            </form>
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