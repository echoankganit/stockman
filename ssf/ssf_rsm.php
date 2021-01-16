<?php
ob_start();
    include("../includes/session.php");
    include("../includes/allfunctions.php");
    
    /* $pname = partyname();
    $rsmpcategory = partycategory(); */
    $pidname = partyidname();
    
    if($_SERVER["REQUEST_METHOD"] == "POST") {
        $rsmricetype = mysqli_real_escape_string($db, $_POST['rsmricetype']);
        $rsmriceweight = mysqli_real_escape_string($db, $_POST['rsmriceweight']);
        $rsmunits = mysqli_real_escape_string($db, $_POST['rsmunits']);
        $rsmentry = mysqli_real_escape_string($db, $_POST['rsmentry']);
        /* $rsmpcategory = mysqli_real_escape_string($db, $_POST['rsmpcategory']); 
        $pname = partyname(); */
        $pidname = partyidname();
        if (isset($_POST['available'])){
            //$pname = partyname();
            $sql2 = "SELECT SUM(rsmriceweight*rsmunits) AS sumrqi FROM `ssf_rsm` WHERE `rsmricetype`='$rsmricetype' AND `rsmriceweight`='$rsmriceweight' AND `rsmentry`='in'";
            $sql3 = "SELECT SUM(rsmriceweight*rsmunits) AS sumrqo FROM `ssf_rsm` WHERE `rsmricetype`='$rsmricetype' AND `rsmriceweight`='$rsmriceweight' AND `rsmentry`='out'";
    
            $result2 = mysqli_query($db,$sql2) or die(mysqli_error($db));
            $result3 = mysqli_query($db,$sql3) or die(mysqli_error($db));
            $row2 = mysqli_fetch_assoc($result2); 
            $row3 = mysqli_fetch_assoc($result3);
            $rowin = $row2['sumrqi'];
            $rowout = $row3['sumrqo'];
            $rowtotal = $rowin-$rowout;
            //echo'<div class="container">
            /* <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>'; */
            //echo 'Page will refresh after 5 sec automatically';
            //echo '</div></div>';
            echo'<div class="container">
            <div class="alert alert-success alert-dismissible fade show" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>';
            if($rowin==0)
                echo $rsmricetype." ".$rsmriceweight." KG in = 0 KG Total <br>";
            else
                echo $rsmricetype." ".$rsmriceweight." KG in = ".$rowin." KG Total and have ".$rowin/$rsmriceweight." bag(s). <br>";
            if($rowout==0)
                echo $rsmricetype." ".$rsmriceweight." KG out = 0 KG Total <br>";
            else
                echo $rsmricetype." ".$rsmriceweight." KG out = ".$rowout." KG Total and have ".$rowout/$rsmriceweight." bag(s). <br>";
            echo "<strong>Available Stock = ".$rowtotal." KG Total and have ".$rowtotal/$rsmriceweight." bag(s).</strong>";
            echo '</div></div>';
            //header("refresh: 5");
        }
        else {
            $rsmpidname = mysqli_real_escape_string($db, $_POST['rsmpdetails']);
            $array =  explode('-', $rsmpidname);
            if (isset($_POST['rsmsubmit'])){
                $sql = "INSERT INTO `ssf_rsm` (`rsmricetype`, `rsmriceweight`, `rsmunits`, `rsmentry`, `rsmpid`, `rsmpname`) VALUES ('$rsmricetype','$rsmriceweight','$rsmunits','$rsmentry','$array[0]','$array[1]')";
                /* $pname = partyname();
                $rsmpcategory = partycategory(); */
                $pidname = partyidname();
                $result = mysqli_query($db,$sql) or die(mysqli_error($db));
                $sql1 = "SELECT * FROM `ssf_rsm` ORDER BY `rsmid` DESC LIMIT 1";

                //implode(',',$pname);
                /*To get the greatest id:
                SELECT MAX(id) FROM mytable
                Then to get the row:
                SELECT * FROM mytable WHERE id = ???*/
                /*Or, you could do it all in one query:
                SELECT * FROM mytable ORDER BY id DESC LIMIT 1*/
                $result1 = mysqli_query($db,$sql1) or die(mysqli_error($db));
                $row1 = mysqli_fetch_array($result1,MYSQLI_ASSOC);
                $totalweight=$rsmriceweight*$rsmunits;
                if($result){
                    echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
                    (Entry No.: '.$row1['rsmid'].') <strong>'.$rsmriceweight.' KG x '.$rsmunits.' units = '.$totalweight.' KG '.$rsmentry.'</strong> Under '.$rsmricetype.' to '.$row1['rsmpname'].'
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>';
                }
            }
        }
        /* else {
            echo 'Page Refresh after 3 sec <br>';
            echo 'Choose Party Category and then again submit the form.';
            header("refresh: 3");
        } */
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
    <!--https://www.tutorialrepublic.com/faq/populate-state-dropdown-based-on-selection-in-country-dropdown-using-jquery.php#:~:text=Answer%3A%20Use%20the%20jQuery%20ajax,while%20filling%20the%20registration%20form.-->
    
    <!-- <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
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
    </script> -->

    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js" integrity="sha512-2ImtlRlf2VVmiGZsjm9bEyhjGW4dU7B6TNwh/hx/iSByxNENtj3WVE6o/9Lj4TJeVXPi4bnOIMXFIJJAeufa0A==" crossorigin="anonymous"></script>
    
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
    <?php echo("<title>$rsm[0] $page_title</title>"); ?>
</head>
<body class="d-flex flex-column">
    <div class="flex-grow-1 flex-shrink-0">
        <div class="d-flex justify-content-center">
            <p class="h3 bg-light px-4 py-2" style="border-radius: 25px"><?php echo strtoupper($rsm[0]); ?></p>
        </div>
        <div class="container col-4">
            <form method="POST" action="">
                <div class="form-group">
                    <label for="rsmricetype">Rice Type</label>
                    <select class="form-control" id="rsmricetype1" name="rsmricetype">
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
                    <label for="rsmriceweight">weight</label>
                    <select class="form-control" id="weight1" name="rsmriceweight">
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
                    <div class="form-group col-lg-6 col-md-6 col-sm-12 col-xs-12">
                        <label for="rsmunits">Units</label>
                        <input type="number" class="form-control" id="rsmunits" name="rsmunits" min="1" value="1">
                    </div>
                    <div class="form-group col-lg-6 col-md-6 col-sm-12 col-xs-12">
                        <div class="ml-5">Entry</div>
                        <div class="form-check form-check-inline py-2 ml-5">
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
               <!--  <div class="form-group">
                    <label for="rsmpcategory">Party Catgory</label>
                    <select class="partycategory form-control" id="partycategory" name="rsmpcategory">
                    <option value='Select'>Select</option>
                    <?php foreach($rsmpcategory as $item){
                        //echo "<option value='$item'>$item</option>";
                    }?>
                    </select>
                </div> -->
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
                <!-- <div id="partyname">

                </div> -->
                <div class="form-group">
                    <label for="rsmpdetails">Party Details</label>
                    <select class="rsmpdetails form-control" id="rsmpdetails" name="rsmpdetails">
                        <!--<option value='Select'>Select</option>;-->
                        <?php foreach($pidname as $detail){
                            echo "<option value='$detail'>$detail</option>";
                        }?>
                    </select>
                </div>
                <div class="d-flex justify-content-center mt-3">
                    <button type="submit" class="btn btn-primary mr-3" name="rsmsubmit" id="rsmsubmit">Submit</button>
                    <input type="button" class="btn btn-danger mr-3" value="Back" onclick="history.back(-1)" />
                    <button type="home" onclick='window.location="ssf_contents.php";return false;' class="btn btn-secondary mr-3">Home</button>
                    <button type="submit" class="btn btn-primary" name="available">Available</button>
                </div>
            </form>
            <div class="d-flex justify-content-center my-3">
                <a class="btn btn-info" target="_blank" href="<?php echo $rsm[3]; ?>" role="button"><?php echo $rsm[2]; ?></a>
            </div>
        </div>
    </div>
    <form method="GET" action="ssf_view_rs.php">
        <div class="row bg-secondary">
            <div class="col">
                    <div class="form-group">
                        <label for="rsmricetypeview">Rice Type</label>
                        <select class="form-control" id="rsmricetypeview" name="rsmricet">
                        <option value="Loose">Loose</option>
                        <option value="A">A</option>
                        <option value="B">B</option>
                        <option value="C">C</option>
                        <option value="D">D</option>
                        <option value="E">E</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary" name="rsmricetypeview">View</button>
                </form>
            </div>
            <div class="col">
                    <div class="form-group">
                        <label for="rsmriceweight">weight</label>
                        <select class="form-control" id="rsmriceweightview" name="rsmricew">
                        <option value="1">1 KG</option>
                        <option value="5">5 KG</option>
                        <option value="10">10 KG</option>
                        <option value="15">15 KG</option>
                        <option value="20">20 KG</option>
                        <option value="50">50 KG</option>
                        <option value="60">60 KG</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary" name="rsmriceweightview">View</button>
                </form>
            </div>
            <div class="col">
            
            </div>
        </div>
    </form>
    <script>
        if ( window.history.replaceState ) {
        window.history.replaceState( null, null, window.location.href );
        }
    </script>
    <script>
        $(document).ready(function(){
            // Initialize select2
            $("#rsmpdetails").select2();
        });
    </script>
</body>
</html>