<?php
    //include("includes\header.php");
    include("../includes/bg.php");
    include("../includes/connection.php");
    //include('includes/session.php');
    include("../includes/allfunctions.php");
    $pname = partyname();
    $pcategory = partycategory();
    $rownum = 0;
    $rownumb = 0;

    if($_SERVER["REQUEST_METHOD"] == "POST") {
        $pcategory = mysqli_real_escape_string($db, $_POST['pcategory']);
        $pname = partyname();
        if($pcategory!='Select'){
            $pname = mysqli_real_escape_string($db, $_POST['pname']);
            $array =  explode('-', $pname);
            if (isset($_POST['cbpartyview'])){
                $sql = "SELECT * FROM `ssf_cashbook` WHERE `pcategory`='$pcategory' AND `pname`='$array[1]'";
                $sqlb = "SELECT * FROM `ssf_bankbook` WHERE `pcategory`='$pcategory' AND `pname`='$array[1]'";
                $result = mysqli_query($db,$sql);
                $resultb = mysqli_query($db,$sqlb);
                $rownum = mysqli_num_rows($result);
                $rownumb = mysqli_num_rows($resultb);
                //$row1 = mysqli_fetch_assoc($result);
                //$row1 = mysqli_fetch_array($result,MYSQLI_ASSOC);
                $sql2 = "SELECT SUM(amount) AS sumain FROM `ssf_cashbook` WHERE `pcategory`='$pcategory' AND `pname`='$array[1]' AND `amountentry`='in'";
                $sql3 = "SELECT SUM(amount) AS sumaout FROM `ssf_cashbook` WHERE `pcategory`='$pcategory' AND `pname`='$array[1]' AND `amountentry`='out'";
                $sql2b = "SELECT SUM(amount) AS sumbin FROM `ssf_bankbook` WHERE `pcategory`='$pcategory' AND `pname`='$array[1]' AND `amountentry`='in'";
                $sql3b = "SELECT SUM(amount) AS sumbout FROM `ssf_bankbook` WHERE `pcategory`='$pcategory' AND `pname`='$array[1]' AND `amountentry`='out'";

                $result2 = mysqli_query($db,$sql2);
                $result3 = mysqli_query($db,$sql3);
                $result2b = mysqli_query($db,$sql2b);
                $result3b = mysqli_query($db,$sql3b);
                $row2 = mysqli_fetch_assoc($result2); 
                $row3 = mysqli_fetch_assoc($result3);
                $row2b = mysqli_fetch_assoc($result2b); 
                $row3b = mysqli_fetch_assoc($result3b);
                $rowin = $row2['sumain'];
                $rowout = $row3['sumaout'];
                $rowinb = $row2b['sumbin'];
                $rowoutb = $row3b['sumbout'];
                $rowtotal = $rowin+$rowinb-$rowout-$rowoutb;
                echo $rowtotal;
                $pname = partyname();
                $pcategory = partycategory();
            }
        }
        else{
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
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/js/bootstrap.bundle.min.js"></script>
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
    <?php echo("<title>Party Wise Cash Book View$page_title</title>"); ?>
</head>
<body class="d-flex flex-column">
    <form method="POST" action="">
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
        <button type="submit" class="btn btn-primary" name="cbpartyview">View</button>
    </form>
    <h1>Cashbook</h1>
    <?php
    if($rownum){
        echo $rownum.' results found<br>';
        //echo $row['pcategory'].'<br>';
        //echo $row['pname'].'<br>'; 
        echo '<table class="table table-hover">
        <thead>
            <tr>
            <th scope="col">Serial Number</th>
            <th scope="col">Purpose</th>
            <th scope="col">Source</th>
            <th scope="col">Date</th>
            <th scope="col">Amount</th>
            <th scope="col">Received By</th>
            <th scope="col">Location</th>
            <th scope="col">Entry</th>
            </tr>
        </thead>';
        while($row = mysqli_fetch_array($result,MYSQLI_ASSOC)){
            echo'<tbody>
                <tr>
                <th scope="row">'.$row['cbnum'].'</th>
                <td>'.$row['purpose'].'</td>
                <td>'.$row['source'].'</td>
                <td>'.$row['cbdate'].'</td>
                <td>'.$row['amount'].'</td>
                <td>'.$row['receivedby'].'</td>
                <td>'.$row['location'].'</td>
                <td>'.$row['amountentry'].'</td>
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
    if($rownumb){
        echo $rownumb.' results found<br>';
        //echo $row['pcategory'].'<br>';
        //echo $row['pname'].'<br>'; 
        echo '<table class="table table-hover">
        <thead>
            <tr>
            <th scope="col">Serial Number</th>
            <th scope="col">Purpose</th>
            <th scope="col">Source</th>
            <th scope="col">Date</th>
            <th scope="col">Amount</th>
            <th scope="col">Received By</th>
            <th scope="col">Location</th>
            <th scope="col">Entry</th>
            </tr>
        </thead>';
        while($rowb = mysqli_fetch_array($resultb,MYSQLI_ASSOC)){
            echo'<tbody>
                <tr>
                <th scope="row">'.$rowb['bbnum'].'</th>
                <td>'.$rowb['purpose'].'</td>
                <td>'.$rowb['source'].'</td>
                <td>'.$rowb['bbdate'].'</td>
                <td>'.$rowb['amount'].'</td>
                <td>'.$rowb['receivedby'].'</td>
                <td>'.$rowb['location'].'</td>
                <td>'.$rowb['amountentry'].'</td>
                </tr>
            </tbody>';
        }
        echo '</table>';
    }
    else{
        echo 'No records found';
    }
    ?>
    <input type="button" class="btn btn-danger mr-3" value="Back" onclick="history.back(-1)" />
    <button type="home" onclick='window.location="ssf_contents.php";return false;' class="btn btn-secondary mr-3">Home</button>
    <?php include("../includes/footer.php");?>
</body>
</html>