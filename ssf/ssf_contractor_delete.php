<?php
    ob_start();
    include('../includes/session.php');

    if(isset($_POST['deletedata'])){
        $contid = $_POST['dcontid'];
        $query = "DELETE FROM `ssf_contractor` WHERE contid='$contid'";
        $query_run = mysqli_query($db, $query);
        if($query_run){
            echo '<script> alert("Data Deleted"); </script>';
            header("Location:../ssf/ssf_contractor_view.php");
        }
        else{
            echo '<script> alert("Data Not Deleted"); </script>';
        }
    }
    ob_end_flush();
?>