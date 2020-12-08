<?php
    ob_start();
    include('../includes/session.php');

    if(isset($_POST['deletedata'])){
        $entryrno = $_POST['drsmid'];
        $query = "DELETE FROM `ssf_rsm` WHERE entryrno='$entryrno'";
        $query_run = mysqli_query($db, $query);
        if($query_run){
            echo '<script> alert("Data Deleted"); </script>';
            header("Location:../ssf/ssf_rsm_view.php");
        }
        else{
            echo '<script> alert("Data Not Deleted"); </script>';
        }
    }
    ob_end_flush();
?>