<?php
    ob_start();
    include('../includes/session.php');
    if(isset($_POST['updatedata'])){
        $rsmid = mysqli_real_escape_string($db, $_POST['ersmid']);
        $rsmricetype = mysqli_real_escape_string($db, $_POST['ersmricetype']);
        $rsmriceweight = mysqli_real_escape_string($db, $_POST['ersmriceweight']);
        $rsmunits = mysqli_real_escape_string($db, $_POST['ersmunits']);
        $rsmentry = mysqli_real_escape_string($db, $_POST['ersmentry']);
        $rsmpid = mysqli_real_escape_string($db, $_POST['ersmpid']);
        /*$pcategory = mysqli_real_escape_string($db, $_POST['epcategory']);
        $pname = mysqli_real_escape_string($db, $_POST['epname']);
        $array =  explode('-', $pname);*/

        $query = "SELECT * FROM `ssf_party` WHERE pid='$rsmpid'";
        $result = mysqli_query($db, $query) or die(mysqli_error($db));
        $row = mysqli_fetch_array($result,MYSQLI_ASSOC);

        $q1 = "UPDATE `ssf_rsm` SET `rsmricetype`='$rsmricetype',`rsmriceweight`='$rsmriceweight',`rsmunits`='$rsmunits',`rsmentry`='$rsmentry', `rsmpid`='$rsmpid', `rsmpname`='$row[pname]' WHERE `rsmid`='$rsmid'";
        $query_run = mysqli_query($db, $q1) or die(mysqli_error($db));

        if($query_run){
            echo "<script type=\"text/javascript\">alert('Updated')</script>";
            header("Location:../ssf/ssf_rsm_view.php");
        }
        else{
            echo '<script> alert("Not updated") </script>';
        }
    }
    ob_end_flush();
?>