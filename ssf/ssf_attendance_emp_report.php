<?php
    include('../includes/session.php');
    if (isset($_GET['viewempatt'])){
        $empattid = mysqli_real_escape_string($db, $_GET['empattid']);
        $empattname = mysqli_real_escape_string($db, $_GET['empattname']);
        $iempattdate = mysqli_real_escape_string($db, $_GET['iempattdate']);
        $fempattdate = mysqli_real_escape_string($db, $_GET['fempattdate']);

        $query = "SELECT * FROM ssf_att WHERE attdate BETWEEN '$iempattdate' AND '$fempattdate' AND attempid=$empattid";
        $result = mysqli_query($db, $query) or die(mysqli_error($db));
        $row = mysqli_fetch_array($result,MYSQLI_ASSOC);

        $resultp = mysqli_query($db, "SELECT * FROM ssf_att WHERE attdate BETWEEN '$iempattdate' AND '$fempattdate' AND attempid=$empattid AND attempstatus='Present'") or die(mysqli_error($db));
        $rownump = mysqli_num_rows($resultp);

        $resulta = mysqli_query($db, "SELECT * FROM ssf_att WHERE attdate BETWEEN '$iempattdate' AND '$fempattdate' AND attempid=$empattid AND attempstatus='Absent'") or die(mysqli_error($db));
        $rownuma = mysqli_num_rows($resulta);

        $resulto = mysqli_query($db, "SELECT * FROM ssf_att WHERE attdate BETWEEN '$iempattdate' AND '$fempattdate' AND attempid=$empattid AND attempstatus='On Leave'") or die(mysqli_error($db));
        $rownumo = mysqli_num_rows($resulto);

        $resulth = mysqli_query($db, "SELECT * FROM ssf_att WHERE attdate BETWEEN '$iempattdate' AND '$fempattdate' AND attempid=$empattid AND attempstatus='Half Day'") or die(mysqli_error($db));
        $rownumh = mysqli_num_rows($resulth);

        $resultholiday = mysqli_query($db, "SELECT * FROM ssf_att WHERE attdate BETWEEN '$iempattdate' AND '$fempattdate' AND attempid=$empattid AND attempstatus='Holiday'") or die(mysqli_error($db));
        $rownumholiday = mysqli_num_rows($resultholiday);

        $resulttotal = $rownump + $rownuma + $rownumo + $rownumh + $rownumholiday;
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
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.22/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="../includes/css/design.css">
    <!-- Optional JavaScript -->
    
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>

    <!-- <script src="https://code.jquery.com/jquery-3.5.1.js"></script> -->
    <script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>

    <?php echo("<title>$empattendance[4]$page_title</title>"); ?>
</head>
<body class="d-flex flex-column">
    <div class="flex-grow-1 flex-shrink-0">
        <div class="d-flex justify-content-center">
            <p class="h2 bg-light px-4 py-2" style="border-radius: 25px"><?php echo strtoupper($empattendance[4]); ?></p>
        </div>
    </div>
    <div class="container">
        <table id="example" class="display" style="width:100%">
            <thead>
                <tr class="bg-dark text-white">
                    <th>Date</th>
                    <th><?php echo $empattid.' - '.$empattname; ?></th>
                </tr>
            </thead>
            <tbody>
                <?php 
                    foreach($result as $rowa){
                        echo'<tr class="bg-light">
                        <td>'.$rowa['attdate'].'</td>
                        <td>'.$rowa['attempstatus'].'</td>
                        </tr>';
                    }
                ?>
            </tbody>
        </table>
    </div>
    <div class="row mx-2">
        <div class="col myroundedcorner bg-success p-5 mx-2"><p class="h3 text-center">Present Count</p><p class="h2 text-center"><?php echo $rownump; ?></p></div>
        <div class="col myroundedcorner bg-danger p-5 mx-2"><p class="h3 text-center">Absent Count</p><p class="h2 text-center"><?php echo $rownuma; ?></p></div>
        <div class="col myroundedcorner bg-warning p-5 mx-2"><p class="h3 text-center">Half Day Count</p><p class="h2 text-center"><?php echo $rownumh; ?></p></div>
        <div class="col myroundedcorner bg-info p-5 mx-2"><p class="h3 text-center">On Leave Count</p><p class="h2 text-center"><?php echo $rownumo; ?></p></div>
        <div class="col myroundedcorner bg-dark p-5 mx-2"><p class="h3 text-center text-white">Holiday Count</p><p class="h2 text-center text-white"><?php echo $rownumholiday ?></p></div>
    </div>
    <div class="row mx-2">
        <div class="col myroundedborder bg-white mt-3 mx-2 py-2"><p class="h3 text-center text-dark">Total Count</p><p class="h2 text-center text-dark"><?php echo $resulttotal ?></p></div>
    </div>
    <script>
       $(document).ready(function() {
            $('#example').DataTable( {
                "paging":   false,
                "ordering": false,
                "info":     true
            } );
        } );
    </script>
</body>
</html>