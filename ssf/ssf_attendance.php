<?php
    //include("includes\header.php");
    include("../includes/bg.php");
    include("../includes/connection.php");
    //include('includes/session.php');
    if($_SERVER["REQUEST_METHOD"] == "GET") {
        $empids = array();
        $empnames = array();
        $resulta = mysqli_query($db,"SELECT * FROM `ssf_employee`");
        while($rowa = mysqli_fetch_array($resulta, MYSQLI_ASSOC)){
            $empids[] = $rowa['empid'];
            $empnames[] = $rowa['empname'];
        }
        if (isset($_GET['attsubmit'])){
            $attdate = mysqli_real_escape_string($db, $_GET['attdate']);
            if(!empty($_GET['empatt'])){
                $empatt=implode (", ",$_GET['empatt']);
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
    <link rel="stylesheet" href="../includes/css/design.css">
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
    <?php echo("<title>Employee Attendance$page_title</title>"); ?>
</head>
<body class="d-flex flex-column">
    <div class="flex-grow-1 flex-shrink-0">
        <div class="d-flex justify-content-center">
            <p class="h1">Employee Attendance</p>
        </div>
        <div class="container col-4">
            <form method="GET" action="">
                <div class="form-group">
                    <label for="attdate">Attendance Date</label>
                    <input type="date" class="form-control" id="attdate" name="attdate" value="<?php echo date('Y-m-d') ?>">
                </div>
                <div class="form-check">
                    <?php foreach($empids as $index => $value){
                    echo '<input class="form-check-input" type="checkbox" value="'.$empids[$index].'-'.$empnames[$index].'" id="empatt" name="empatt[]">
                    <label class="form-check-label" for="'.$empids[$index].'-'.$empnames[$index].'">'.$empids[$index].'-'.$empnames[$index].'</label><br>';
                    }?>
                </div>
                <div class="d-flex justify-content-center mt-3">
                    <button type="submit" class="btn btn-primary mr-3" name="attsubmit">Submit</button>
                    <input type="button" class="btn btn-danger mr-3" value="Back" onclick="history.back(-1)" />
                    <button type="home" onclick='window.location="ssf_contents.php";return false;' class="btn btn-secondary mr-3">Home</button>
                </div>
            </form>
        </div>
    </div>
    <?php include("../includes/footer.php");?>
    <script>
        if ( window.history.replaceState ) {
        window.history.replaceState( null, null, window.location.href );
        }
    </script>
</body>
</html>