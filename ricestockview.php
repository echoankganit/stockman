<?php
    //include("includes\header.php");
    include("includes/bg.php");
    include("includes\connection.php");
    //include('includes/session.php');
    if (isset($_GET['ricetypeview'])){
        $ricet = mysqli_real_escape_string($db, $_GET['ricet']);
        //$sql = "INSERT INTO `ssf_cashbook` (`purpose`, `source`, `cbdate`, `amount`, `receivedby`, `location`) VALUES ('$purpose','$source','$cbdate','$amount','$receivedby','$location')";
        //$result = mysqli_query($db,$sql);
        //echo $cbdate;
        //$sql1 = "SELECT year('$cbdate') AS 'year', month('$cbdate') AS 'month' FROM `ssf_cashbook`";
        $sql = "SELECT * FROM `ssf_rsm` WHERE `ricetype`='$ricet'";
        $result = mysqli_query($db,$sql);
        //$row = mysqli_fetch_assoc($result);
        $rownum = mysqli_num_rows($result);
        //$row = mysqli_fetch_array($result,MYSQLI_ASSOC);
    }
    else if (isset($_GET['riceweightview'])){
        $ricew = mysqli_real_escape_string($db, $_GET['ricew']);
        $sql = "SELECT * FROM `ssf_rsm` WHERE `riceweight`='$ricew'";
        $result = mysqli_query($db,$sql);
        $rownum = mysqli_num_rows($result);
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/js/bootstrap.bundle.min.js"></script>
    <title>Rice Stock View - Stock Management System</title>
</head>
<body class="d-flex flex-column">
    <?php
    if($rownum){
        echo $rownum.' results found';
        echo '<table class="table table-hover">
        <thead>
            <tr>
            <th scope="col">Entry No.</th>
            <th scope="col">Rice Weight</th>
            <th scope="col">Units</th>
            <th scope="col">Entry</th>
            </tr>
        </thead>';
        while($row = mysqli_fetch_assoc($result)){
            echo'<tbody>
                <tr>
                <th scope="row">'.$row['entryrno'].'</th>
                <td>'.$row['riceweight'].'</td>
                <td>'.$row['units'].'</td>
                <td>'.$row['rsmentry'].'</td>
                </tr>
            </tbody>';
        }
        echo '</table>';
    }
    else
        echo 'No records found';
    ?>
    <input type="button" class="btn btn-danger mr-3" value="Back" onclick="history.back(-1)" />
    <button type="home" onclick='window.location="dashboard.php";return false;' class="btn btn-secondary mr-3">Home</button>
</body>
</html>