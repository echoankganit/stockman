<?php
    ob_start();
    include('../includes/session.php');
    if(isset($_POST['updatedata']))
    {   
        $nkid = mysqli_real_escape_string($db, $_POST['enkid']);
        $nkname = mysqli_real_escape_string($db, $_POST['enkname']);
        $nkquality = mysqli_real_escape_string($db, $_POST['enkquality']);

        //$query = "UPDATE `ssf_new_khushboo` SET khushname='$khushname', khushquality='$khushquality', WHERE khushid='$khushid' ";
        $q1 = "UPDATE `ssf_new_khushboo` SET `nkname`='$nkname', `nkquality`='$nkquality' WHERE `nkid`='$nkid'";
        $query_run = mysqli_query($db, $q1) or die(mysqli_error($db));

        if($query_run){
            echo "<script type=\"text/javascript\">alert('Updated')</script>";
            header("Location:../ssf/ssf_new_khush_view.php");
        }
        else{
            echo '<script> alert("'.$nkid.''.$nkname.''.$nkquality.'"); </script>';
        }
    }
    ob_end_flush();
?>