<?php
    ob_start();
    include('../includes/session.php');

    if(isset($_POST['deletedata'])){
        $maid = $_POST['dmaid'];
        $query = "DELETE FROM `ssf_majdoori` WHERE maid='$maid'";
        $query_run = mysqli_query($db, $query);
        if($query_run){
            echo '<script> alert("Data Deleted"); </script>';
            header("Location:../ssf/ssf_majdoori_view.php");
        }
        else{
            echo '<script> alert("Data Not Deleted"); </script>';
        }
    }
    ob_end_flush();
?>