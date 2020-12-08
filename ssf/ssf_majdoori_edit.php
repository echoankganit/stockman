<?php
    ob_start();
    include('../includes/session.php');
    if(isset($_POST['updatedata'])){
        $maid = mysqli_real_escape_string($db, $_POST['emaid']);
        $madate = mysqli_real_escape_string($db, $_POST['emadate']);
        $maunits = mysqli_real_escape_string($db, $_POST['emaunits']);
        $malocation = mysqli_real_escape_string($db, $_POST['emalocation']);
        $macontid = mysqli_real_escape_string($db, $_POST['emacontid1']);

        /*$pcategory = mysqli_real_escape_string($db, $_POST['epcategory']);
        $pname = mysqli_real_escape_string($db, $_POST['epname']);
        $array =  explode('-', $pname);*/

        $query = "SELECT * FROM `ssf_contractor` WHERE contid='$macontid'";
        $result = mysqli_query($db, $query);
        $row = mysqli_fetch_array($result,MYSQLI_ASSOC);

        //$query = "UPDATE `ssf_new_khushboo` SET khushname='$khushname', khushquality='$khushquality', WHERE khushid='$khushid' ";
        $q1 = "UPDATE `ssf_majdoori` SET `maid`='$maid',`madate`='$madate',`maunits`='$maunits',`malocation`='$malocation',`macontid`='$macontid',`macontname`='$row[contname]' WHERE `maid`='$maid'";
        $query_run = mysqli_query($db, $q1);

        if($query_run){
            echo "<script type=\"text/javascript\">alert('Updated')</script>";
            header("Location:../ssf/ssf_majdoori_view.php");
        }
        else{
            echo '<script> alert("Not updated") </script>';
        }
    }
    ob_end_flush();
?>