<?php
    ob_start();
    include('../includes/session.php');
    if(isset($_POST['updatedata']))
    {   
        $empid = $_POST['eempid'];
        $empname = $_POST['eempname'];
        $empaddress = $_POST['eempaddress'];
        $empdate = $_POST['eempdate'];

        $query = "UPDATE `ssf_employee` SET empname='$empname', empaddress='$empaddress', empdate='$empdate' WHERE empid='$empid' ";
        $query_run = mysqli_query($db, $query);

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