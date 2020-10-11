<?php
    //include("includes\header.php");
    include("includes/bg.php");
    include("includes\connection.php");
    //include('includes/session.php');
    if($_SERVER["REQUEST_METHOD"] == "POST") {
    $ricetype = mysqli_real_escape_string($db, $_POST['ricetype']);
    $ricequality = mysqli_real_escape_string($db, $_POST['ricequality']);
    $ricequantity = mysqli_real_escape_string($db, $_POST['ricequantity']);
    $rsmentry = mysqli_real_escape_string($db, $_POST['rsmentry']);
    if (isset($_POST['rsmsubmit'])){
        $sql = "INSERT INTO `ssf_rsm` (`ricetype`, `ricequality`, `ricequantity`, `rsmentry`) VALUES ('$ricetype','$ricequality','$ricequantity','$rsmentry')";
        $result = mysqli_query($db,$sql);
        $sql1 = "SELECT * FROM `ssf_rsm`";
        $result1 = mysqli_query($db,$sql1);
        $row1 = mysqli_fetch_array($result1,MYSQLI_ASSOC);
        if($row1){
            echo "sucess"."<br>";
        }
    }

    if (isset($_POST['available'])){
        $sql2 = "SELECT SUM(ricequantity) AS sumrqi FROM `ssf_rsm` WHERE `ricetype`='$ricetype' AND `ricequality`='$ricequality' AND `rsmentry`='in'";
        $sql3 = "SELECT SUM(ricequantity) AS sumrqo FROM `ssf_rsm` WHERE `ricetype`='$ricetype' AND `ricequality`='$ricequality' AND `rsmentry`='out'";
        $result2 = mysqli_query($db,$sql2);
        $result3 = mysqli_query($db,$sql3);
        $row2 = mysqli_fetch_assoc($result2); 
        $row3 = mysqli_fetch_assoc($result3);
        $rowin = $row2['sumrqi'];
        $rowout = $row3['sumrqo'];
        $rowtotal = $rowin-$rowout;
        echo "IN = ".$row2['sumrqi']."<br>";
        echo "OUT = ".$row3['sumrqo']."<br>";
        echo "LEFT = ".$rowtotal;
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
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/design.css">
    <title>Login</title>
</head>
<body>
<div class="d-flex justify-content-center">
    <p class="h1">Rice Management Stock</p>
</div>
    <div class="container col-4">
        <form method="POST" action="">
            <div class="form-group">
                <label for="ricetype">Rice Type</label>
                <select class="form-control" id="ricetype1" name="ricetype">
                <option value="Loose">Loose</option>
                <option value="A">A</option>
                <option value="B">B</option>
                <option value="C">C</option>
                <option value="D">D</option>
                <option value="E">E</option>
                </select>
            </div>
            <div class="form-group">
                <label for="ricequality">Quality</label>
                <select class="form-control" id="qualitytype1" name="ricequality">
                <option value="Quality A">Quality A</option>
                <option value="Qual B">Quality B</option>
                <option value="Basmati">Basmati</option>
                </select>
            </div>
            <div class="form-group">
                <label for="ricequantity">Quantity</label>
                <select class="form-control" id="quantity1" name="ricequantity">
                <option value="1">1 KG</option>
                <option value="5">5 KG</option>
                <option value="10">10 KG</option>
                <option value="15">15 KG</option>
                <option value="20">20 KG</option>
                <option value="50">50 KG</option>
                </select>
            </div>
            <div>Entry</div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="rsmentry" id="rsmin" value="in" checked>
                <label class="form-check-label" for="rsmin">
                    In
                </label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="rsmentry" id="rsmout" value="out">
                <label class="form-check-label" for="rsmout">
                    Out
                </label>
            </div>
            <div class="d-flex justify-content-center mt-3">
                <button type="submit" class="btn btn-primary mr-3" name="rsmsubmit">Submit</button>
                <button type="cancel" onclick='window.location="dashboard.php";return false;' class="btn btn-secondary mr-3">Cancel</button>
                <button type="submit" class="btn btn-primary" name="available">Available</button>
            </div>
        </form>
    </div>
    <?php include("includes/footer.php");?>
</body>
</html>