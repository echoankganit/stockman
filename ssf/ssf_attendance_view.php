<?php
    include('../includes/session.php');
    include("../includes/allfunctions.php");
    $resulta = mysqli_query($db,"SELECT * FROM `ssf_employee`") or die(mysqli_error($db));

    if($_SERVER["REQUEST_METHOD"] == "POST") {
        $empids = array();
        $empnames = array();
        
        while($rowa = mysqli_fetch_array($resulta, MYSQLI_ASSOC)){
            $empids[] = $rowa['empid'];
            $empnames[] = $rowa['empname'];
        }
        if (isset($_POST['attsubmit'])){
            $attdate = mysqli_real_escape_string($db, $_POST['attdate']);
            if(!empty($_POST['empatt'])){
                $empatt=implode (";",$_POST['empatt']);
            }
            else {
                $empatt= "All are Absent";
            }
            
            $rowdates = array();
            $datescheck = mysqli_query($db, "SELECT `attdate` FROM `ssf_att`");
            while($rowdate = mysqli_fetch_array($datescheck,MYSQLI_ASSOC)){
                $rowdates[] = $rowdate['attdate'];
            }
            $c=0;
            foreach($rowdates as $rowd){
                if($rowd == $attdate){
                    echo 'please choose another date. If you want to edit attendance of particular day. Please go to Edit Option.';
                    $c=$c+1;
                    break;
                }
            }
            if($c==0){
                $sql = "INSERT INTO `ssf_att` (`attdate`, `empatt`) VALUES ('$attdate','$empatt')";
                $result = mysqli_query($db,$sql);
                $sql1 = "SELECT * FROM `ssf_att` ORDER BY `empattid` DESC LIMIT 1";
                $result1 = mysqli_query($db,$sql1);
                $row1 = mysqli_fetch_array($result1,MYSQLI_ASSOC);
                if($result){
                    echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
                    (Attendace Unique ID: '.$row1['empattid'].') added to Date: '.$row1['attdate'].'
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>';
                }
            }
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

    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.22/css/jquery.dataTables.min.css">

    <link rel="stylesheet" href="../includes/css/design.css">
    <!-- Optional JavaScript -->
    
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>

    <!-- <script src="https://code.jquery.com/jquery-3.5.1.js"></script> -->
    <script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>

    <?php echo("<title>$empattendance[2]$page_title</title>"); ?>
</head>
<body class="d-flex flex-column">
    <!-- Date picker for particular attendance -->
    <div class="modal fade" id="empattmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Choose Dates for Particular Attendance</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="ssf_empatt_report.php" method="POST">
                    <div class="modal-body">
                        <div class="form-row">
                            <div class="form-group col">
                                <label for="empattid">Employee ID</label>
                                <input type="text" class="form-control" id="empattid" name="empattid" readonly>
                            </div>
                            <div class="form-group col">
                                <label for="empattname">Employee Name</label>
                                <input type="text" class="form-control" id="empattname" name="empattname" readonly>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col">
                                    <label for="iempattdate">Initial Date</label>
                                    <input type="date" class="form-control" id="iempattdate" name="iempattdate" value="<?php echo date('Y-m-d') ?>">
                            </div>
                            <div class="form-group col">
                                    <label for="fempattdate">Final Date</label>
                                    <input type="date" class="form-control" id="fempattdate" name="fempattdate" value="<?php echo date('Y-m-d') ?>">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" name="viewempatt" class="btn btn-success" disabled>View</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="flex-grow-1 flex-shrink-0">
        <div class="d-flex justify-content-center">
            <p class="h2 bg-light px-4 py-2" style="border-radius: 25px"><?php echo strtoupper($empattendance[2]); ?></p>
        </div>
        <div class="container">
            <form method="POST" action="">
                <div class="row container bg-light py-3">
                    <div class="col-lg-5 bg-info py-2">
                            <label for="attdate">Initial Date</label>
                            <input type="date" class="form-control" id="attdate" name="attdate" value="<?php echo date('Y-m-d') ?>">
                    </div>
                    <div class="col-lg-5 bg-info py-2">
                            <label for="attdate">Final Date</label>
                            <input type="date" class="form-control" id="attdate" name="attdate" value="<?php echo date('Y-m-d') ?>">
                    </div>
                    <div class="col-lg-2 py-2 mt-4 pl-5">
                        <a type="submit" class="btn btn-primary mr-3 disabled" name="attsubmit">Get Attendance</a>
                    </div>
                </div>
                <div class="py-3">
                </div>
                <table id="example" class="display" style="width:100%">
                    <thead>
                        <tr class="bg-dark text-white">
                            <th>EMP. ID</th>
                            <th>EMP. Name</th>
                            <th>Attendance Report</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                            foreach($resulta as $row){
                                echo'<tr class="bg-light">
                                <td>'.$row['empid'].'</td>
                                <td>'.$row['empname'].'</td>
                                <td><a class="btn btn-info viewempatt" href="#">Report</a></td>
                                </tr>';
                            }
                        ?>
                    </tbody>
                </table>
                <div class="d-flex justify-content-center mt-3">
                    <input type="button" class="btn btn-danger mr-3" value="Back" onclick="history.back(-1)" />
                    <button type="home" onclick='window.location="ssf_contents.php";return false;' class="btn btn-secondary mr-3">Home</button>
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
        $(document).ready(function () {
            $('#example').on('click', '.viewempatt', function () {
                $('#empattmodal').modal('show');
                $tr = $(this).closest('tr');
                var data = $tr.children("td").map(function () {
                    return $(this).text();
                }).get();
                console.log(data);
                $('#empattid').val(data[0]);
                $('#empattname').val(data[1]);
            });
        });
    </script>

    <script>
        if ( window.history.replaceState ) {
            window.history.replaceState( null, null, window.location.href );
        }
    </script>
</body>
</html>