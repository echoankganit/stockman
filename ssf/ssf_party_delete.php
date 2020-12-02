<?php
    ob_start();
    include('../includes/session.php');

    if(isset($_POST['deletedata'])){
        $partyid = $_POST['dpid'];
        $query = "DELETE FROM `ssf_party` WHERE partyid='$partyid'";
        $query_run = mysqli_query($db, $query);
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