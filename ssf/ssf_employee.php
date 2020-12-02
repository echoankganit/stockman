<?php
    include('../includes/session.php');
    if($_SERVER["REQUEST_METHOD"] == "POST") {
        $empname = mysqli_real_escape_string($db, $_POST['empname']);
        $empaddress = mysqli_real_escape_string($db, $_POST['empaddress']);
        $empdate = mysqli_real_escape_string($db, $_POST['empdate']);
        if (isset($_POST['empsubmit'])){
            $sql = "INSERT INTO `ssf_employee` (`empname`, `empaddress`, `empdate`) VALUES ('$empname','$empaddress', '$empdate')";
            $result = mysqli_query($db,$sql);
            $sql1 = "SELECT * FROM `ssf_employee` ORDER BY `empid` DESC LIMIT 1";
            $result1 = mysqli_query($db,$sql1);
            $row1 = mysqli_fetch_array($result1,MYSQLI_ASSOC);
            if($result){
                echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
                (Employee Unique ID: '.$row1['empid'].') <br>Employee Name: <strong>'.$empname.'</strong><br>Employee Address: <strong>'.$empaddress.'</strong><br>Date: <strong>'.$row1['empdate'].'</strong><br>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>';
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
    <?php echo("<title>Employee Registration$page_title</title>"); ?>
</head>
<body class="d-flex flex-column">
    <div class="flex-grow-1 flex-shrink-0">
        <div class="d-flex justify-content-center">
            <p class="h1"><?php echo $empreg[0]; ?></p>
        </div>
        <div class="container col-4">
            <form method="POST" action="">
                <div class="form-group">
                    <label for="empname">Employee Name</label>
                    <input type="text" class="form-control" id="empname" name="empname" required>
                </div>
                <div class="form-group">
                    <label for="empaddress">Employee Address</label>
                    <input type="text" class="form-control" id="empaddress" name="empaddress" required>
                </div>
                <div class="form-group">
                    <label for="empdate">Date of Registration</label>
                    <input type="date" class="form-control" id="empdate" name="empdate" value="<?php echo date('Y-m-d') ?>" required>
                </div>
                <div class="d-flex justify-content-center mt-3">
                    <button type="submit" class="btn btn-primary mr-3" name="empsubmit">Submit</button>
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