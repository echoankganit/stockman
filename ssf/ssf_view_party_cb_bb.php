<?php
    include('../includes/session.php');
    include("../includes/allfunctions.php");

    $pidname = partyidname();
    $rownumcb = 0;
    $rownumbb = 0;

    if (isset($_POST['vpcbbb'])){
        $vpcbbbdetails = mysqli_real_escape_string($db, $_POST['vpcbbbdetails']);
        $array =  explode('-', $vpcbbbdetails);
        if (isset($_POST['vpcbbb'])){
            $sqlcb = "SELECT * FROM `ssf_cashbook` WHERE `cbpid`='$array[0]'";
            $sqlbb = "SELECT * FROM `ssf_bankbook` WHERE `bbpid`='$array[0]'";
            $resultcb = mysqli_query($db,$sqlcb);
            $resultbb = mysqli_query($db,$sqlbb);
            $rownumcb = mysqli_num_rows($resultcb);
            $rownumbb = mysqli_num_rows($resultbb);
           
            //$row1 = mysqli_fetch_assoc($result);
            //$row1 = mysqli_fetch_array($result,MYSQLI_ASSOC);
            $sql1cb = "SELECT SUM(cbamount) AS sumcbin FROM `ssf_cashbook` WHERE `cbpid`='$array[0]' AND `cbentry`='in'";
            $result1cb = mysqli_query($db,$sql1cb);
            $row1cb = mysqli_fetch_assoc($result1cb); 

            $sql2cb = "SELECT SUM(cbamount) AS sumcbout FROM `ssf_cashbook` WHERE `cbpid`='$array[0]' AND `cbentry`='out'";
            $result2cb = mysqli_query($db,$sql2cb);
            $row2cb = mysqli_fetch_assoc($result2cb);

            $sql1bb = "SELECT SUM(bbamount) AS sumbbin FROM `ssf_bankbook` WHERE `bbpid`='$array[0]' AND `bbentry`='in'";
            $result1bb = mysqli_query($db,$sql1bb);
            $row1bb = mysqli_fetch_assoc($result1bb); 

            $sql2bb = "SELECT SUM(bbamount) AS sumbbout FROM `ssf_bankbook` WHERE`bbpid`='$array[0]' AND `bbentry`='out'";
            $result2bb = mysqli_query($db,$sql2bb);
            $row2bb = mysqli_fetch_assoc($result2bb);

            $rowcbin = $row1cb['sumcbin'];
            $rowcbout = $row2cb['sumcbout'];
            $rowbbin = $row1bb['sumbbin'];
            $rowbbout = $row2bb['sumbbout'];

            $rowtotal = $rowcbin+$rowbbin-$rowcbout-$rowbbout;
            echo $rowtotal;
            //echo "142344241";
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
    <!-- CSS for party category search in select item -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" integrity="sha512-nMNlpuaDPrqlEls3IX/Q56H36qvBASwb3ipuo3MxeWbsQB1881ox0cRv7UPTgBlriqoynt35KjEwgGUeUXIPnw==" crossorigin="anonymous" />
    <link rel="stylesheet" href="../includes/css/design.css">
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js" integrity="sha512-2ImtlRlf2VVmiGZsjm9bEyhjGW4dU7B6TNwh/hx/iSByxNENtj3WVE6o/9Lj4TJeVXPi4bnOIMXFIJJAeufa0A==" crossorigin="anonymous"></script>
    <?php echo("<title>$viewpartycbbb[0] $page_title</title>"); ?>
</head>
<body class="d-flex flex-column">
    <form method="POST" action="">
        <div class="form-group">
            <label for="vpcbbbdetails">Party Details</label>
            <select class="vpcbbbdetails form-control" id="vpcbbbdetails" name="vpcbbbdetails">
                <!--<option value='Select'>Select</option>;-->
                <?php foreach($pidname as $detail){
                    echo "<option value='$detail'>$detail</option>";
                }?>
            </select>
        </div>
        <button type="submit" class="btn btn-primary" name="vpcbbb">View</button>
    </form>
    <h1>Cashbook</h1>
    <?php
    if($rownumcb){
        echo $rownumcb.' results found<br>';
        //echo $row['pcategory'].'<br>';
        //echo $row['pname'].'<br>'; 
        echo '<table class="table table-hover">
        <thead>
            <tr>
            <th scope="col">Serial Number</th>
            <th scope="col">Date</th>
            <th scope="col">Amount</th>
            <th scope="col">Received By</th>
            <th scope="col">Location</th>
            <th scope="col">Entry</th>
            </tr>
        </thead>';
        while($row = mysqli_fetch_array($resultcb,MYSQLI_ASSOC)){
            echo'<tbody>
                <tr>
                <th scope="row">'.$row['cbid'].'</th>
                <td>'.$row['cbdate'].'</td>
                <td>'.$row['cbamount'].'</td>
                <td>'.$row['cbreceivedby'].'</td>
                <td>'.$row['cblocation'].'</td>
                <td>'.$row['cbentry'].'</td>
                </tr>
            </tbody>';
        }
        echo '</table>';
    }
    else{
        echo 'No records found';
    }
    ?>

    <h1>Bank Book</h1>
    <?php
    if($rownumbb){
        echo $rownumbb.' results found<br>';
        //echo $row['pcategory'].'<br>';
        //echo $row['pname'].'<br>'; 
        echo '<table class="table table-hover">
        <thead>
            <tr>
            <th scope="col">Serial Number</th>
            <th scope="col">Date</th>
            <th scope="col">Amount</th>
            <th scope="col">Received By</th>
            <th scope="col">Location</th>
            <th scope="col">Entry</th>
            </tr>
        </thead>';
        while($rowb = mysqli_fetch_array($resultbb,MYSQLI_ASSOC)){
            echo'<tbody>
                <tr>
                <th scope="row">'.$rowb['bbid'].'</th>
                <td>'.$rowb['bbdate'].'</td>
                <td>'.$rowb['bbamount'].'</td>
                <td>'.$rowb['bbreceivedby'].'</td>
                <td>'.$rowb['bblocation'].'</td>
                <td>'.$rowb['bbentry'].'</td>
                </tr>
            </tbody>';
        }
        echo '</table>';
    }
    else{
        echo 'No records found';
    }
    ?>
    <div class="d-flex justify-content-center mt-3">
        <input type="button" class="btn btn-danger mr-3" value="Back" onclick="history.back(-1)" />
        <button type="home" onclick='window.location="ssf_contents.php";return false;' class="btn btn-secondary mr-3">Home</button>
    </div>
    <script>
        $(document).ready(function(){
            // Initialize select2
            $("#vpcbbbdetails").select2();
        });
    </script>
</body>
</html>