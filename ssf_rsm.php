<?php
    //include("includes\header.php");
    include("includes/bg.php");
    include("includes/connection.php");
    include("includes\allfunctions.php");
    //include('includes/session.php');
    
    $pname = partyname();
    $pcategory = partycategory();
    
    if($_SERVER["REQUEST_METHOD"] == "POST") {
        $ricetype = mysqli_real_escape_string($db, $_POST['ricetype']);
        $riceweight = mysqli_real_escape_string($db, $_POST['riceweight']);
        $units = mysqli_real_escape_string($db, $_POST['units']);
        $rsmentry = mysqli_real_escape_string($db, $_POST['rsmentry']);
        $pcategory = mysqli_real_escape_string($db, $_POST['pcategory']);
        $pname = partyname();
        if($pcategory!='Select'){
            $pname = mysqli_real_escape_string($db, $_POST['pname']);

            if (isset($_POST['rsmsubmit'])){
                $sql = "INSERT INTO `ssf_rsm` (`ricetype`, `riceweight`, `units`, `rsmentry`, `pname`, `pcategory`) VALUES ('$ricetype','$riceweight','$units','$rsmentry','$pname','$pcategory')";
                $pname = partyname();
                $pcategory = partycategory();
                $result = mysqli_query($db,$sql);
                $sql1 = "SELECT * FROM `ssf_rsm` ORDER BY `entryrno` DESC LIMIT 1";

                //implode(',',$pname);
                /*To get the greatest id:
                SELECT MAX(id) FROM mytable
                Then to get the row:
                SELECT * FROM mytable WHERE id = ???*/
                /*Or, you could do it all in one query:
                SELECT * FROM mytable ORDER BY id DESC LIMIT 1*/
                $result1 = mysqli_query($db,$sql1);
                $row1 = mysqli_fetch_array($result1,MYSQLI_ASSOC);
                $totalweight=$riceweight*$units;
                if($result){
                    echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
                    (Entry No.: '.$row1['entryrno'].') <strong>'.$riceweight.' KG x '.$units.' units = '.$totalweight.' KG '.$rsmentry.'</strong> Under '.$ricetype.' to '.$row1['pname'].'
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
    <link rel="stylesheet" href="css/design.css">
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
    <!--https://www.tutorialrepublic.com/faq/populate-state-dropdown-based-on-selection-in-country-dropdown-using-jquery.php#:~:text=Answer%3A%20Use%20the%20jQuery%20ajax,while%20filling%20the%20registration%20form.-->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script>
        $(document).ready(function(){
            $("select.partycategory").change(function(){
                var selectedPcategory = $(".partycategory option:selected").val();
                $.ajax({
                    type: "POST",
                    url: "process-request.php",
                    data: { partycategory : selectedPcategory } 
                }).done(function(data){
                    $("#partyname").html(data);
                });
            });
        });
    </script>
    <!--<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script>
    $(document).ready(function(){
        $("select.country").change(function(){
            var selectedCountry = $(".country option:selected").val();
            $.ajax({
                type: "POST",
                url: "process-request.php",
                data: { country : selectedCountry } 
            }).done(function(data){
                $("#response").html(data);
            });
        });
    });
    </script>-->
    <title>Rice Stock Management - Sri Sri Foods</title>
</head>
<body class="d-flex flex-column">
    <div class="flex-grow-1 flex-shrink-0">
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
                <!--<div class="form-group">
                    <label for="ricequality">Quality</label>
                    <select class="form-control" id="qualitytype1" name="ricequality">
                    <option value="Quality A">Quality A</option>
                    <option value="Quality B">Quality B</option>
                    <option value="Basmati">Basmati</option>
                    </select>
                </div>-->
                <div class="form-group">
                    <label for="riceweight">weight</label>
                    <select class="form-control" id="weight1" name="riceweight">
                    <option value="1">1 KG</option>
                    <option value="5">5 KG</option>
                    <option value="10">10 KG</option>
                    <option value="15">15 KG</option>
                    <option value="20">20 KG</option>
                    <option value="50">50 KG</option>
                    <option value="60">60 KG</option>
                    </select>
                </div>
                <div class="form-row">
                    <div class="form-group col-6">
                        <label for="units">Units</label>
                        <input type="number" class="form-control col-6" id="units" name="units" min="1" value="1">
                    </div>
                    <div class="form-group col-6">
                        <div>Entry</div>
                        <div class="form-check form-check-inline py-2">
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
                    </div>
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
                <!--<div class="form-group">
                    <label for="pname">Party Name</label>
                    <select class="partyname form-control" id="partyname" name="pname">
                    <?php foreach($pname as $item){
                        //echo "<option value='$item'>$item</option>";
                    }?>
                    </select>
                </div>-->
                <!--<div>
                        <table>
                        <tr>
                            <td>
                                <label>Country:</label>
                                <select class="partycategory">
                                    <option>Select</option>
                                    <option value="Bank Accounts">United States</option>
                                    <option value="india">India</option>
                                    <option value="uk">United Kingdom</option>
                                </select>
                            </td>
                            <td id="response">-->
                                <!--Response will be inserted here
                            </td>
                        </tr>
                    </table>
                </div>-->
                <div id="partyname">

                </div>
                <div class="d-flex justify-content-center mt-3">
                    <button type="submit" class="btn btn-primary mr-3" name="rsmsubmit" id="rsmsubmit">Submit</button>
                    <input type="button" class="btn btn-danger mr-3" value="Back" onclick="history.back(-1)" />
                    <button type="home" onclick='window.location="dashboard.php";return false;' class="btn btn-secondary mr-3">Home</button>
                    <button type="submit" class="btn btn-primary" name="available">Available</button>
                </div>
            </form>
        </div>
        <?php
        if (isset($_POST['available'])){
            //$pname = partyname();
            $sql2 = "SELECT SUM(riceweight*units) AS sumrqi FROM `ssf_rsm` WHERE `ricetype`='$ricetype' AND `riceweight`='$riceweight' AND `rsmentry`='in'";
            $sql3 = "SELECT SUM(riceweight*units) AS sumrqo FROM `ssf_rsm` WHERE `ricetype`='$ricetype' AND `riceweight`='$riceweight' AND `rsmentry`='out'";

            $result2 = mysqli_query($db,$sql2);
            $result3 = mysqli_query($db,$sql3);
            $row2 = mysqli_fetch_assoc($result2); 
            $row3 = mysqli_fetch_assoc($result3);
            $rowin = $row2['sumrqi'];
            $rowout = $row3['sumrqo'];
            $rowtotal = $rowin-$rowout;
            echo'<div class="container">
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>';
            echo 'Please Refresh this page before making new entry.';
            echo '</div></div>';
            echo'<div class="container">
            <div class="alert alert-success alert-dismissible fade show" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>';
            if($rowin==0)
                echo $ricetype." ".$riceweight." KG in = 0 KG Total <br>";
            else
                echo $ricetype." ".$riceweight." KG in = ".$rowin." KG Total and have ".$rowin/$riceweight." bag(s). <br>";
            if($rowout==0)
                echo $ricetype." ".$riceweight." KG out = 0 KG Total <br>";
            else
                echo $ricetype." ".$riceweight." KG out = ".$rowout." KG Total and have ".$rowout/$riceweight." bag(s). <br>";
            echo "<strong>Available Stock = ".$rowtotal." KG Total and have ".$rowtotal/$riceweight." bag(s).</strong>";
            echo '</div>';
        }
        ?>
    </div>
    <div class="row bg-secondary">
        <div class="col">
            <form method="GET" action="ricestockview.php">
                <div class="form-group">
                    <label for="ricetypeview">Rice Type</label>
                    <select class="form-control" id="ricetypeview" name="ricet">
                    <option value="Loose">Loose</option>
                    <option value="A">A</option>
                    <option value="B">B</option>
                    <option value="C">C</option>
                    <option value="D">D</option>
                    <option value="E">E</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary" name="ricetypeview">View</button>
            </form>
        </div>
        <div class="col">
            <form method="GET" action="ricestockview.php">
                <div class="form-group">
                    <label for="riceweight">weight</label>
                    <select class="form-control" id="riceweightview" name="ricew">
                    <option value="1">1 KG</option>
                    <option value="5">5 KG</option>
                    <option value="10">10 KG</option>
                    <option value="15">15 KG</option>
                    <option value="20">20 KG</option>
                    <option value="50">50 KG</option>
                    <option value="60">60 KG</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary" name="riceweightview">View</button>
            </form>
        </div>
        <div class="col">
        3
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