<?php
    ob_start();
    include('../includes/session.php');

    if(isset($_POST['deletedata'])){
        $pid = mysqli_real_escape_string($db, $_POST['dpid']);
        
        $query = "DELETE FROM `ssf_party` WHERE pid='$pid'";
        $query_run = mysqli_query($db, $query) or die(mysqli_error($db));
        if($query_run){
            echo '<script> alert("Data Deleted"); </script>';
            header("Location:../ssf/ssf_party_view.php");
        }
        else{
            echo '<script> alert("Data Not Deleted"); </script>';
        }
    }
    ob_end_flush();
?>