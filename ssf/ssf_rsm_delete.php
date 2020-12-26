<?php
    ob_start();
    include('../includes/session.php');

    if(isset($_POST['deletedata'])){
        $rsmid = mysqli_real_escape_string($db, $_POST['drsmid']);

        $query = "DELETE FROM `ssf_rsm` WHERE rsmid='$rsmid'";
        $query_run = mysqli_query($db, $query) or die(mysqli_error($db));
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