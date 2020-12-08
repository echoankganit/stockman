<?php
    ob_start();
    include('../includes/session.php');

    if(isset($_POST['deletedata'])){
        $khushid = $_POST['dkhushid'];
        $query = "DELETE FROM `ssf_new_khushboo` WHERE khushid='$khushid'";
        $query_run = mysqli_query($db, $query);
        if($query_run){
            echo '<script> alert("Data Deleted"); </script>';
            header("Location:../ssf/ssf_new_khush_view.php");
        }
        else{
            echo '<script> alert("Data Not Deleted"); </script>';
        }
    }
    ob_end_flush();
?>