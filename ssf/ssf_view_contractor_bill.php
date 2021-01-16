<?php
    include('../includes/session.php');
    include("../includes/allfunctions.php");

    $cidname = cont();
    $rowtotalunits = 0;
    $ppp = 0;
    $rowtotalin = 0;
    $rowtotalout = 0;
    $rownumma = 0;
    $rownumst = 0;
    $details = '';

    if (isset($_POST['vcb'])){
        $vcbdetails = mysqli_real_escape_string($db, $_POST['vcbdetails']);
        $array =  explode('-', $vcbdetails);
        if (isset($_POST['vcb'])){
            $sqlma = "SELECT * FROM `ssf_majdoori` WHERE `macontid`='$array[0]'";
            $sqlst = "SELECT * FROM `ssf_stitching` WHERE `stcontid`='$array[0]'";
            $resultma = mysqli_query($db,$sqlma) or die(mysqli_error($db));
            $resultst = mysqli_query($db,$sqlst) or die(mysqli_error($db));
            $rownumma = mysqli_num_rows($resultma);
            $rownumst = mysqli_num_rows($resultst);
           
            //$row1 = mysqli_fetch_assoc($result);
            //$row1 = mysqli_fetch_array($result,MYSQLI_ASSOC);
            $sql1ma = "SELECT SUM(maunits) AS summain FROM `ssf_majdoori` WHERE `macontid`='$array[0]'";
            $result1ma = mysqli_query($db,$sql1ma) or die(mysqli_error($db));
            $row1ma = mysqli_fetch_assoc($result1ma);
            
            $sql1st = "SELECT SUM(stunits) AS sumstin FROM `ssf_stitching` WHERE `stcontid`='$array[0]'";
            $result1st = mysqli_query($db,$sql1st) or die(mysqli_error($db));
            $row1st = mysqli_fetch_assoc($result1st);

            $sqlppp = "SELECT contppp FROM `ssf_contractor` WHERE `contid`='$array[0]'";
            $resultppp = mysqli_query($db,$sqlppp) or die(mysqli_error($db));
            $rowppp = mysqli_fetch_assoc($resultppp);

            $rowmain = $row1ma['summain'];
            $rowstin = $row1st['sumstin'];
            $ppp = $rowppp['contppp'];
            $rowtotalunits = $rowmain+$rowstin;
            //echo $rowtotal." * ".$rowppp['contppp']." = ".$rowtotalunits*$ppp;
            $details = '<div class="container alert alert-warning alert-dismissible fade show" role="alert">
                    Contrator ID: <strong>'.$array[0].'</strong><br>Name: <strong>'.$array[1].'</strong> <br>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>';
        }
    }
?>
<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.23/css/dataTables.bootstrap4.min.css">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" integrity="sha384-gfdkjb5BdAXd+lj+gudLWI+BXq4IuLW5IT+brZEZsLFm++aCMlF1V92rMkPaX4PP" crossorigin="anonymous">
    <!-- CSS for party category search in select item -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" integrity="sha512-nMNlpuaDPrqlEls3IX/Q56H36qvBASwb3ipuo3MxeWbsQB1881ox0cRv7UPTgBlriqoynt35KjEwgGUeUXIPnw==" crossorigin="anonymous" />
    <link rel="stylesheet" href="../includes/css/design.css">
    <!-- Optional JavaScript -->
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.23/js/dataTables.bootstrap4.min.js"></script>
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <!-- <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script> -->
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js" integrity="sha512-2ImtlRlf2VVmiGZsjm9bEyhjGW4dU7B6TNwh/hx/iSByxNENtj3WVE6o/9Lj4TJeVXPi4bnOIMXFIJJAeufa0A==" crossorigin="anonymous"></script>

    <?php echo("<title>$viewcontb[0] $page_title</title>"); ?>
</head>
<body class="d-flex flex-column">
    <div class="d-flex justify-content-center">
        <p class="h3 bg-light px-4 py-2" style="border-radius: 25px"><?php echo strtoupper($viewcontb[0]); ?></p>
    </div>
    <div class="container col-3">
        <form method="POST" action="">
            <div class="form-group">
                <label for="vcbdetails">Contractor Details</label>
                <select class="vcbdetails form-control" id="vcbdetails" name="vcbdetails">
                    <!--<option value='Select'>Select</option>;-->
                    <?php foreach($cidname as $detail){
                        echo "<option value='$detail'>$detail</option>";
                    }?>
                </select>
            </div>
            <button type="submit" class="btn btn-primary" name="vcb">View</button>
        </form>
    </div>
    <div class="mx-4">
        <?php echo $details; ?>
        <p class="h2">Majdoori</p>
        <?php
        if($rownumma){
            echo $rownumma; ?> result(s) found.
            <table id="example" class="table table-striped table-bordered" style="width:100%">
                <thead>
                    <tr class="bg-dark text-white">
                        <th scope="col">Majdoori ID</th>
                        <th scope="col">Date</th>
                        <th scope="col">Units</th>
                        <th scope="col">Location</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr class="bg-dark text-white">
                        <th scope="col"></th>
                        <th scope="col"></th>
                        <th scope="col"><?php echo $rowmain; ?></th>
                        <th scope="col"></th>
                    </tr>
                </tfoot>
                <tbody>
                <?php while($row = mysqli_fetch_array($resultma,MYSQLI_ASSOC)){
                    echo'<tr class="bg-light">
                        <th scope="row">'.$row['maid'].'</th>
                        <td>'.$row['madate'].'</td>
                        <td>'.$row['maunits'].'</td>
                        <td>'.$row['malocation'].'</td>
                        </tr>'; } ?>
                </tbody>
            </table>
        <?php }
        else{
            echo 'No records found';
        }
        ?>

        <p class="h2">Stiching</p>
        <?php
        if($rownumst){
            echo $rownumst; ?> result(s) found.
            <table id="example1" class="table table-striped table-bordered" style="width:100%">
                <thead>
                    <tr class="bg-dark text-white">
                        <th scope="col">Stitching ID</th>
                        <th scope="col">Date</th>
                        <th scope="col">Units</th>
                        <th scope="col">Location</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr class="bg-dark text-white">
                        <th scope="col"></th>
                        <th scope="col"></th>
                        <th scope="col"><?php echo $rowstin; ?></th>
                        <th scope="col"></th>
                    </tr>
                </tfoot>
                <tbody>
                <?php while($rowb = mysqli_fetch_array($resultst,MYSQLI_ASSOC)){
                    echo'<tr class="bg-light">
                        <th scope="row">'.$rowb['stid'].'</th>
                        <td>'.$rowb['stdate'].'</td>
                        <td>'.$rowb['stunits'].'</td>
                        <td>'.$rowb['stlocation'].'</td>
                        </tr>';
                }?>
                </tbody>
            </table>
        <?php }
        else{
            echo 'No records found';
        }
        ?>
    </div>

    <div class="row mx-2 mt-3">
        <div class="col myroundedcorner bg-success p-1 mx-2"><p class="h3 text-center">Total Units</p><p class="h2 text-center"><?php echo $rowtotalunits; ?></p></div>
        <div class="col myroundedcorner bg-danger p-1 mx-2"><p class="h3 text-center">Price Per Unit</p><p class="h2 text-center"><?php echo $ppp; ?></p></div>
        <div class="col myroundedcorner bg-warning p-1 mx-2"><p class="h3 text-center">Amount</p><p class="h2 text-center"><?php echo $rowtotalunits*$ppp; ?></p></div>
    </div>

    <div class="d-flex justify-content-center mt-3">
        <input type="button" class="btn btn-danger mr-3" value="Back" onclick="history.back(-1)" />
        <button type="home" onclick='window.location="ssf_contents.php";return false;' class="btn btn-secondary mr-3">Home</button>
    </div>

    <script>
        $(document).ready(function() {
            $('#example').DataTable();
            $('#example1').DataTable();
        } );
    </script>
    <script>
        $(document).ready(function(){
            // Initialize select2
            $("#vcbdetails").select2();
        });
    </script>
</body>
</html>