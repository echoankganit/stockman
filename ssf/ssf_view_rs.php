<?php
    include('../includes/session.php');

    if (isset($_GET['rsmricetypeview'])){
        $ricet = mysqli_real_escape_string($db, $_GET['rsmricet']);
        //$sql = "INSERT INTO `ssf_cashbook` (`purpose`, `source`, `cbdate`, `amount`, `receivedby`, `location`) VALUES ('$purpose','$source','$cbdate','$amount','$receivedby','$location')";
        //$result = mysqli_query($db,$sql);
        //echo $cbdate;
        //$sql1 = "SELECT year('$cbdate') AS 'year', month('$cbdate') AS 'month' FROM `ssf_cashbook`";
        $sql = "SELECT * FROM `ssf_rsm` WHERE `rsmricetype`='$ricet'";
        $result = mysqli_query($db,$sql) or die(mysqli_error($db));
        //$row = mysqli_fetch_assoc($result);
        $rownum = mysqli_num_rows($result);
        //$row = mysqli_fetch_array($result,MYSQLI_ASSOC);
    }
    if (isset($_GET['rsmriceweightview'])){
        $ricew = mysqli_real_escape_string($db, $_GET['rsmricew']);
        $sql = "SELECT * FROM `ssf_rsm` WHERE `rsmriceweight`='$ricew'";
        $result = mysqli_query($db,$sql) or die(mysqli_error($db));
        $rownum = mysqli_num_rows($result);
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
    
    <?php echo("<title>$page_title</title>"); ?>
</head>
<body class="d-flex flex-column">
    <div class="mx-4">
        <?php
        if($rownum){
            echo $rownum; ?> result(s) found.
            <table id="example" class="table table-striped table-bordered" style="width:100%">
                <thead>
                <tr class="bg-dark text-white">
                        <th scope="col">RSM ID</th>
                        <th scope="col">Rice Type</th>
                        <th scope="col">Rice Weight</th>
                        <th scope="col">Units</th>
                        <th scope="col">Entry</th>
                        <th scope="col">Party ID</th>
                    </tr>
                </thead>
                <tbody>
                <?php while($row = mysqli_fetch_array($result,MYSQLI_ASSOC)){ 
                    echo'<tr class="bg-light">
                        <th scope="row">'.$row['rsmid'].'</th>
                        <td>'.$row['rsmricetype'].'</td>
                        <td>'.$row['rsmriceweight'].'</td>
                        <td>'.$row['rsmunits'].'</td>
                        <td>'.$row['rsmentry'].'</td>
                        <td>'.$row['rsmpid'].'</td>
                        </tr>';
                    } ?>
            </tbody>
            </table>
        <?php }
        else
            echo 'No records found';
        ?>
    </div>
    <div class="d-flex justify-content-center mt-3">
        <input type="button" class="btn btn-danger mr-3" value="Back" onclick="history.back(-1)" />
        <button type="home" onclick='window.location="ssf_contents.php";return false;' class="btn btn-secondary mr-3">Home</button>
    </div>

    <script>
        $(document).ready(function() {
            $('#example').DataTable();
        } );
    </script>
</body>
</html>