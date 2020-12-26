<?php
    ob_start();
    include('../includes/session.php');

    if(isset($_POST['deletedata'])){
        $maid = mysqli_real_escape_string($db, $_POST['dmaid']);

        $query = "DELETE FROM `ssf_majdoori` WHERE maid='$maid'";
        $query_run = mysqli_query($db, $query) or die(mysqli_error($db));
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