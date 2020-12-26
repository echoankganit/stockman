<?php
    ob_start();
    include('../includes/session.php');
    if(isset($_POST['updatedata']))
    {   
        $empid = mysqli_real_escape_string($db, $_POST['eempid']);
        $empname = mysqli_real_escape_string($db, $_POST['eempname']);
        $empaddress = mysqli_real_escape_string($db, $_POST['eempaddress']);
        $empdate = mysqli_real_escape_string($db, $_POST['eempdate']);

        $query = "UPDATE `ssf_employee` SET empname='$empname', empaddress='$empaddress', empdate='$empdate' WHERE empid='$empid' ";
        $query_run = mysqli_query($db, $query) or die(mysqli_error($db));

        if($query_run){
            echo "<script type=\"text/javascript\">alert('Updated')</script>";
                header("Location:../ssf/ssf_employee_view.php");
        }
        else{
            echo '<script> alert("Data Not Updated"); </script>';
        }
    }
    ob_end_flush();
?>