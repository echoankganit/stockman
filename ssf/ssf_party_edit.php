<?php
    ob_start();
    include('../includes/session.php');
    if(isset($_POST['updatedata']))
    {   
        $pid = mysqli_real_escape_string($db, $_POST['epid']);
        $pname = mysqli_real_escape_string($db, $_POST['epname']);
        $paddress = mysqli_real_escape_string($db, $_POST['epaddress']);
        $pgstin = mysqli_real_escape_string($db, $_POST['epgstin']);
        $pcategory = mysqli_real_escape_string($db, $_POST['epcategory']);

        $query = "UPDATE `ssf_party` SET pname='$pname', paddress='$paddress', pgstin='$pgstin', pcategory='$pcategory' WHERE pid='$pid'";
        $query_run = mysqli_query($db, $query) or die(mysqli_error($db));

        if($query_run){
            echo "<script type=\"text/javascript\">alert('Updated')</script>";
            header("Location:../ssf/ssf_party_view.php");
        }
        else{
            echo '<script> alert("Data not updated"); </script>';
        }
    }
    ob_end_flush();
?>