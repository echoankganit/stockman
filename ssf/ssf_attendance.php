<?php
ob_start();
    include('../includes/session.php');
    include("../includes/allfunctions.php");

    $resulta = mysqli_query($db,"SELECT * FROM `ssf_employee`") or die(mysqli_error($db));

    $blocknone ='none';
    if (isset($_GET['attdatesubmit'])){
        $varattdate = mysqli_real_escape_string($db, $_GET['attdate']);

        $attrowdates = array();
        $datescheck = mysqli_query($db, "SELECT `attdate` FROM `ssf_att`") or die(mysqli_error($db));
        while($row= mysqli_fetch_array($datescheck,MYSQLI_ASSOC)){
            $attrowdates[] = $row['attdate'];
        }
        $c=0;
        foreach($attrowdates as $value){
            if($value == $varattdate){
                echo 'If you see this error then there are several reasons. Either you choose the date which is already filled. Or you have submit the attendance just.';
                $blocknone = 'none'; 
                break;
            }
            else{
                $blocknone = 'block';
            }
        }
    }

    $empids = array();
    while($rowa = mysqli_fetch_array($resulta, MYSQLI_ASSOC)){
        $empids[] = $rowa['empid'];
    }

    if (isset($_POST['attsubmit'])){
        //$attdate = mysqli_real_escape_string($db, $_POST['attdate']);

        for($x=0; $x<count($empids); $x++){
            if(!empty($_POST['empattradio'.$empids[$x]])){
                $empattstatus[] = $_POST['empattradio'.$empids[$x]];
            }
        }

        $query = 'INSERT INTO `ssf_att` (`attdate`, `attempid`, `attempstatus`) VALUES ';
        $query_parts = array();
        for($x=0; $x<count($empids); $x++){
            $query_parts[] = "('".$varattdate."',". $empids[$x] . ", '" . $empattstatus[$x] . "')";
        }
        $sql = $query .= implode(',', $query_parts);

        $result = mysqli_query($db,$sql) or die(mysqli_error($db));

        $sql1 = "SELECT * FROM `ssf_att` ORDER BY `attid` DESC LIMIT 1";
        $result1 = mysqli_query($db,$sql1) or die(mysqli_error($db));
        $row1 = mysqli_fetch_array($result1,MYSQLI_ASSOC);
        if($result){
            echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
            (Attendace Unique ID: '.$row1['attid'].') added to Date: '.$row1['attdate'].'
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>';
        header("refresh: 3; url = ../ssf/ssf_attendance.php");
        }
    }

    if (isset($_POST['attdateholiday'])){
        $holidaydate = $varattdate;
        $holiday = "holiday";
        $query = 'INSERT INTO `ssf_att` (`attdate`, `attempid`, `attempstatus`) VALUES ';
        $query_parts = array();
        for($x=0; $x<count($empids); $x++){
            $query_parts[] = "('".$holidaydate."',". $empids[$x] . ", '" . $holiday . "')";
        }
        $sql = $query .= implode(',', $query_parts);

        $result = mysqli_query($db,$sql) or die(mysqli_error($db));

        $sql1 = "SELECT * FROM `ssf_att` ORDER BY `attid` DESC LIMIT 1";
        $result1 = mysqli_query($db,$sql1) or die(mysqli_error($db));
        $row1 = mysqli_fetch_array($result1,MYSQLI_ASSOC);
        if($result){
            echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
            (Attendace Unique ID: '.$row1['attid'].') added to Date: '.$row1['attdate'].'
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>';
        header("refresh: 3; url = ../ssf/ssf_attendance.php");
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
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" integrity="sha384-gfdkjb5BdAXd+lj+gudLWI+BXq4IuLW5IT+brZEZsLFm++aCMlF1V92rMkPaX4PP" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.22/css/jquery.dataTables.min.css">

    <link rel="stylesheet" href="../includes/css/design.css">

    <style>
    .form-check-inline {
        border-radius: 10px;
    }
    </style>
    <!-- Optional JavaScript -->
    
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>

    <!-- <script src="https://code.jquery.com/jquery-3.5.1.js"></script> -->
    <script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>

    <?php echo("<title>$empattendance[0]$page_title</title>"); ?>
</head>
<body class="d-flex flex-column">
    <div class="flex-grow-1 flex-shrink-0">
        <div class="d-flex justify-content-center">
            <p class="h2 bg-light px-4 py-2" style="border-radius: 25px"><?php echo strtoupper($empattendance[0]); ?></p>
        </div>
        <div class="container">
            <form method="GET" action="">
                <div class="form-row">
                    <div class="form-group col-2">
                        <input type="date" class="form-control" id="attdate" name="attdate" value="<?php echo $varattdate; ?>" required>
                    </div>
                    <div class="form-group col">
                        <button type="submit" class="btn btn-primary" name="attdatesubmit" value="datesubmit">Submit</button>
                    </div>
                    <div class="col-4"></div>
                    <div class="form-group col">
                        <a class="btn btn-info" target="_blank" href="<?php echo $empattendance[3]; ?>" role="button"><?php echo $empattendance[2]; ?></a>
                    </div>
                </div>
            </form>
            <form method="POST" action="">
                <div style="display:<?php echo $blocknone; ?>">
                    <button type="submit" class="btn btn-danger" name="attdateholiday" value="dateholiday">Holiday</button>
                    <table id="example" class="display" style="width:100%">
                        <thead>
                            <tr class="bg-dark text-white">
                                <th>EMP. ID</th>
                                <th>EMP. Name</th>
                                <th>Present/Absent</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $i = array(1,2,3,4); 
                                foreach($resulta as $row){
                                    echo'<tr class="bg-light">
                                    <td>'.$row['empid'].'</td>
                                    <td>'.$row['empname'].'</td>
                                    <td><div class="form-check form-check-inline bg-success p-2 text-white">
                                        <input class="form-check-input" type="radio" name="empattradio'.$row['empid'].'" value="Present" id="empattradio'.$row['empid'].'-'.$i[0].'" checked>
                                        <label class="form-check-label" for="empattradio'.$row['empid'].'-'.$i[0].'">Present</label>
                                    </div>
                                    <div class="form-check form-check-inline bg-danger p-2 text-white">
                                        <input class="form-check-input" type="radio" name="empattradio'.$row['empid'].'" value="Absent" id="empattradio'.$row['empid'].'-'.$i[1].'">
                                        <label class="form-check-label" for="empattradio'.$row['empid'].'-'.$i[1].'">Absent</label>
                                    </div>
                                    <div class="form-check form-check-inline bg-warning p-2">
                                        <input class="form-check-input" type="radio" name="empattradio'.$row['empid'].'" value="On Leave" id="empattradio'.$row['empid'].'-'.$i[2].'">
                                        <label class="form-check-label" for="empattradio'.$row['empid'].'-'.$i[2].'">On Leave</label>
                                    </div>
                                    <div class="form-check form-check-inline bg-info p-2 text-white">
                                        <input class="form-check-input" type="radio" name="empattradio'.$row['empid'].'" value="Half Day" id="empattradio'.$row['empid'].'-'.$i[3].'">
                                        <label class="form-check-label" for="empattradio'.$row['empid'].'-'.$i[3].'">Half Day</label>
                                    </div>
                                    </td>
                                    </tr>';
                                }
                            ?>
                        </tbody>
                    </table>
                    <div class="d-flex justify-content-center mt-3">
                        <button type="submit" class="btn btn-primary mr-3" name="attsubmit">Submit</button>
                        <input type="button" class="btn btn-danger mr-3" value="Back" onclick="history.back(-1)" />
                        <button type="home" onclick='window.location="ssf_contents.php";return false;' class="btn btn-secondary mr-3">Home</button>
                    </div>
                </div>             
            </form>
        </div>
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
    <script>
        if ( window.history.replaceState ) {
            window.history.replaceState( null, null, window.location.href );
        }
    </script>
</body>
</html>