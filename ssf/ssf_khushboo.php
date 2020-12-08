<?php
ob_start();
    include('../includes/session.php');
    include("../includes/allfunctions.php");
    
    $khush = khush();
    $pcategory = partycategory();
    $pname = partyname();

    if($_SERVER["REQUEST_METHOD"] == "POST") {
        $kdetails = mysqli_real_escape_string($db, $_POST['kdetails']);
        $pcategory = mysqli_real_escape_string($db, $_POST['pcategory']);
        $kdate  = mysqli_real_escape_string($db, $_POST['kdate']);
        $kunits = mysqli_real_escape_string($db, $_POST['kunits']);
        $kentry = mysqli_real_escape_string($db, $_POST['kentry']);
        $array =  explode('-', $kdetails);
        $khush = khush();
        $pname = partyname();
        if($pcategory!='Select'){
            $pname = mysqli_real_escape_string($db, $_POST['pname']);
            $array1 =  explode('-', $pname);
            if (isset($_POST['ksubmit'])){
                //$sql = "INSERT INTO `ssf_stitching` (`stdate`, `stunits`, `stcontractor`) VALUES ('$stdate','$stunits','$stcontractor')";
                $sql = "INSERT INTO `ssf_khushboo` (`khushbooid`, `khushbooname`, `khushbooquality`, `pcategory`, `pid`, `pname`, `kdate`, `kunits`, `kentry`) VALUES ('$array[0]', '$array[1]', '$array[2]', '$pcategory', '$array1[0]', '$array1[1]', '$kdate', '$kunits', '$kentry')";
                $result = mysqli_query($db,$sql);

                $sql1 = "SELECT * FROM `ssf_khushboo` ORDER BY `kid` DESC LIMIT 1";
                $result1 = mysqli_query($db,$sql1) or die(mysqli_error($db));
                $row1 = mysqli_fetch_array($result1,MYSQLI_ASSOC);
                if($result){
                    echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
                    (Khushboo Entry Unique ID: <strong>'.$row1['kid'].'</strong>) <br>Khushboo Product Details: <strong>'.$row1['khushbooid'].'-'.$row1['khushbooname'].'-'.$row1['khushbooquality'].'</strong> <br>Linked Party Details: <strong>'.$row1['pcategory'].'-'.$row1['pid'].'-'.$row1['pname'].'</strong> <br>Entry Date: <strong>'.$kdate.'</strong><br>Units: <strong>'.$kunits.'</strong><br>Entry: <strong>'.$kentry.'</strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                    </div>';
                    echo 'Page will refresh automatically after 3 sec';
                    header("refresh: 3");
                }
            }
        }
        else {
            echo 'Choose Party Category then again submit the form. (This page will refresh automatically in 3 seconds)';
            header("refresh: 3");
        }
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js" integrity="sha512-2ImtlRlf2VVmiGZsjm9bEyhjGW4dU7B6TNwh/hx/iSByxNENtj3WVE6o/9Lj4TJeVXPi4bnOIMXFIJJAeufa0A==" crossorigin="anonymous"></script>
    <?php echo("<title>$khushboo[0] $page_title</title>"); ?>
</head>
<body class="d-flex flex-column">
    <div class="flex-grow-1 flex-shrink-0">
        <div class="d-flex justify-content-center">
            <p class="h3 bg-light px-4 py-2" style="border-radius: 25px"><?php echo strtoupper($khushboo[0]); ?></p>
        </div>
        <div class="container col-4">
            <form method="POST" action="">
                <div class="form-group">
                    <label for="kdetails">Khushboo Details</label>
                    <select class="form-control" id="kdetails" name="kdetails">
                        <!--<option value='Select'>Select</option>;-->
                        <?php foreach($khush as $detail){
                            echo "<option value='$detail'>$detail</option>";
                        }?>
                    </select>
                </div>
                <div class="form-row">
                    <div class="form-group col-lg-5 col-md-5 col-sm-12 col-xs-12">
                        <label for="kdate">Date</label>
                        <input type="date" class="form-control" id="kdate" name="kdate" value="<?php echo date('Y-m-d') ?>">
                    </div>
                    <div class="form-group col-lg-3 col-md-4 col-sm-12 col-xs-12">
                        <label for="kunits">Units</label>
                        <input type="number" class="form-control" min=1 value=1 id="kunits" name="kunits" required>
                    </div>
                    <div class="form-group col-lg-4 col-md-3 col-sm-12 col-xs-12">
                        <div>Entry</div>
                        <div class="form-check form-check-inline py-2">
                            <input class="form-check-input" type="radio" name="kentry" id="kin" value="in" checked>
                            <label class="form-check-label" for="rsmin">
                                In
                            </label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="kentry" id="kout" value="out">
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
                <div id="partyname">

                </div>
                
                <div class="d-flex justify-content-center mt-3">
                    <button type="submit" class="btn btn-primary mr-3" name="ksubmit">Submit</button>
                    <input type="button" class="btn btn-danger mr-3" value="Back" onclick="history.back(-1)" />
                    <button type="home" onclick='window.location="ssf_contents.php";return false;' class="btn btn-secondary mr-3">Home</button>
                    <a class="btn btn-info" target="_blank" href="<?php echo $khushboo[3]; ?>" role="button"><?php echo $khushboo[2]; ?></a>
                    <!--<button type="submit" class="btn btn-primary" name="available">Available</button>-->
                </div>
            </form>
        </div>
    </div>
    <script>
        if ( window.history.replaceState ) {
        window.history.replaceState( null, null, window.location.href );
        }
    </script>
    <script>
        $(document).ready(function(){
            // Initialize select2
            $("#partycategory").select2();
        });
    </script>
</body>
</html>