<?php
    ob_start();
    include('../includes/session.php');
    if(isset($_POST['updatedata'])){
        $stid = mysqli_real_escape_string($db, $_POST['estid']);
        $stdate = mysqli_real_escape_string($db, $_POST['estdate']);
        $stunits = mysqli_real_escape_string($db, $_POST['estunits']);
        $stlocation = mysqli_real_escape_string($db, $_POST['estlocation']);
        $stcontid = mysqli_real_escape_string($db, $_POST['estcontid1']);

        /*$pcategory = mysqli_real_escape_string($db, $_POST['epcategory']);
        $pname = mysqli_real_escape_string($db, $_POST['epname']);
        $array =  explode('-', $pname);*/

        $query = "SELECT * FROM `ssf_contractor` WHERE contid='$stcontid'";
        $result = mysqli_query($db, $query) or die(mysqli_error($db));
        $row = mysqli_fetch_array($result,MYSQLI_ASSOC);

        //$query = "UPDATE `ssf_new_khushboo` SET khushname='$khushname', khushquality='$khushquality', WHERE khushid='$khushid' ";
        $q1 = "UPDATE `ssf_stitching` SET `stdate`='$stdate',`stunits`='$stunits',`stlocation`='$stlocation',`stcontid`='$stcontid',`stcontname`='$row[contname]' WHERE `stid`='$stid'";
        $query_run = mysqli_query($db, $q1) or die(mysqli_error($db));

        if($query_run){
            echo "<script type=\"text/javascript\">alert('Updated')</script>";
            header("Location:../ssf/ssf_stitching_view.php");
        }
        else{
            echo '<script> alert("Not updated") </script>';
        }
    }
    ob_end_flush();
?>