<?php
    ob_start();
    include('../includes/session.php');
    if(isset($_POST['updatedata'])){
        $cbid = mysqli_real_escape_string($db, $_POST['ecbid']);
        /* $cbpurpose = mysqli_real_escape_string($db, $_POST['ecbpurpose']);
        $cbsource = mysqli_real_escape_string($db, $_POST['ecbsource']); */
        $cbdate = mysqli_real_escape_string($db, $_POST['ecbdate']);
        $cbamount = mysqli_real_escape_string($db, $_POST['ecbamount']);
        $cbreceivedby = mysqli_real_escape_string($db, $_POST['ecbreceivedby']);
        $ecbentry = mysqli_real_escape_string($db, $_POST['ecbentry']);
        $cblocation = mysqli_real_escape_string($db, $_POST['ecblocation']);
        $cbpid = mysqli_real_escape_string($db, $_POST['ecbpid']);
        /*$pcategory = mysqli_real_escape_string($db, $_POST['epcategory']);
        $pname = mysqli_real_escape_string($db, $_POST['epname']);
        $array =  explode('-', $pname);*/

        $query = "SELECT * FROM `ssf_party` WHERE pid='$cbpid'";
        $result = mysqli_query($db, $query) or die(mysqli_error($db));
        $row = mysqli_fetch_array($result,MYSQLI_ASSOC);

        //$query = "UPDATE `ssf_new_khushboo` SET khushname='$khushname', khushquality='$khushquality', WHERE khushid='$khushid' ";
        $q1 = "UPDATE `ssf_cashbook` SET `cbdate`='$cbdate', `cbamount`='$cbamount', `cbreceivedby`='$cbreceivedby', `cbentry`='$ecbentry', `cblocation`='$cblocation', `cbpid`='$cbpid', `cbpname`='$row[pname]' WHERE `cbid`='$cbid'";
        $query_run = mysqli_query($db, $q1) or die(mysqli_error($db));;

        if($query_run){
            echo "<script type=\"text/javascript\">alert('Updated')</script>";
            header("Location:../ssf/ssf_cashbook_view.php");
        }
        else{
            echo '<script> alert("Not updated") </script>';
        }
    }
    ob_end_flush();
?>