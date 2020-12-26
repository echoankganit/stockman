<?php
    ob_start();
    include('../includes/session.php');

    if(isset($_POST['deletedata'])){
        $kid = mysqli_real_escape_string($db, $_POST['dkid']);

        $query = "DELETE FROM `ssf_khushboo` WHERE kid='$kid'";
        $query_run = mysqli_query($db, $query) or die(mysqli_error($db));
        if($query_run){
            echo '<script> alert("Data Deleted"); </script>';
            header("Location:../ssf/ssf_khushboo_view.php");
        }
        else{
            echo '<script> alert("Data Not Deleted"); </script>';
        }
    }
    ob_end_flush();
?>