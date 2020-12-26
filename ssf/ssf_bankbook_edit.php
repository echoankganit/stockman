<?php
    ob_start();
    include('../includes/session.php');
    if(isset($_POST['updatedata'])){
        $bbid = mysqli_real_escape_string($db, $_POST['ebbid']);
       /*  $bbpurpose = mysqli_real_escape_string($db, $_POST['ebbpurpose']);
        $bbsource = mysqli_real_escape_string($db, $_POST['ebbsource']); */
        $bbdate = mysqli_real_escape_string($db, $_POST['ebbdate']);
        $bbamount = mysqli_real_escape_string($db, $_POST['ebbamount']);
        $bbreceivedby = mysqli_real_escape_string($db, $_POST['ebbreceivedby']);
        $ebbentry = mysqli_real_escape_string($db, $_POST['ebbentry']);
        $bblocation = mysqli_real_escape_string($db, $_POST['ebblocation']);
        $bbpid = mysqli_real_escape_string($db, $_POST['ebbpid']);
        /*$pcategory = mysqli_real_escape_string($db, $_POST['epcategory']);
        $pname = mysqli_real_escape_string($db, $_POST['epname']);
        $array =  explode('-', $pname);*/

        $query = "SELECT * FROM `ssf_party` WHERE pid='$bbpid'";
        $result = mysqli_query($db, $query) or die(mysqli_error($db));
        $row = mysqli_fetch_array($result,MYSQLI_ASSOC);

        //$query = "UPDATE `ssf_new_khushboo` SET khushname='$khushname', khushquality='$khushquality', WHERE khushid='$khushid' ";
        $q1 = "UPDATE `ssf_bankbook` SET `bbdate`='$bbdate', `bbamount`='$bbamount', `bbreceivedby`='$bbreceivedby', `bbentry`='$ebbentry', `bblocation`='$bblocation', `bbpid`='$bbpid', `bbpname`='$row[pname]' WHERE `bbid`='$bbid'";
        $query_run = mysqli_query($db, $q1) or die(mysqli_error($db));;

        if($query_run){
            echo "<script type=\"text/javascript\">alert('Updated')</script>";
            header("Location:../ssf/ssf_bankbook_view.php");
        }
        else{
            echo '<script> alert("Not updated") </script>';
        }
    }
    ob_end_flush();
?>