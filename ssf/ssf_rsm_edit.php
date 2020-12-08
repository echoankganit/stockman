<?php
    ob_start();
    include('../includes/session.php');
    if(isset($_POST['updatedata'])){
        $entryrno = mysqli_real_escape_string($db, $_POST['ersmid']);
        $ricetype = mysqli_real_escape_string($db, $_POST['ericetype']);
        $riceweight = mysqli_real_escape_string($db, $_POST['ericeweight']);
        $units = mysqli_real_escape_string($db, $_POST['eunits']);
        $rsmentry = mysqli_real_escape_string($db, $_POST['ersmentry']);
        $pid = mysqli_real_escape_string($db, $_POST['epid1']);
        /*$pcategory = mysqli_real_escape_string($db, $_POST['epcategory']);
        $pname = mysqli_real_escape_string($db, $_POST['epname']);
        $array =  explode('-', $pname);*/

        $query = "SELECT * FROM `ssf_party` WHERE partyid='$pid'";
        $result = mysqli_query($db, $query);
        $row = mysqli_fetch_array($result,MYSQLI_ASSOC);

        //$query = "UPDATE `ssf_new_khushboo` SET khushname='$khushname', khushquality='$khushquality', WHERE khushid='$khushid' ";
        $q1 = "UPDATE `ssf_rsm` SET `ricetype`='$ricetype',`riceweight`='$riceweight',`units`='$units',`rsmentry`='$rsmentry', `pcategory`='$row[pcategory]', `pid`='$pid', `pname`='$row[pname]' WHERE `entryrno`='$entryrno'";
        $query_run = mysqli_query($db, $q1);

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