<?php
    ob_start();
    include('../includes/session.php');
    if(isset($_POST['updatedata'])){
        $kid = mysqli_real_escape_string($db, $_POST['ekid']);

        $kdate = mysqli_real_escape_string($db, $_POST['ekdate']);
        $kunits = mysqli_real_escape_string($db, $_POST['ekunits']);
        $kentry = mysqli_real_escape_string($db, $_POST['ekentry']);

        $khushbooid = mysqli_real_escape_string($db, $_POST['ekhushbooid']);
        $pid = mysqli_real_escape_string($db, $_POST['epid']);
        
        /*$pcategory = mysqli_real_escape_string($db, $_POST['epcategory']);
        $pname = mysqli_real_escape_string($db, $_POST['epname']);
        $array =  explode('-', $pname);*/

        $query = "SELECT * FROM `ssf_new_khushboo` WHERE `khushid`='$khushbooid'";
        $result = mysqli_query($db, $query);
        $row = mysqli_fetch_array($result,MYSQLI_ASSOC);

        $query1 = "SELECT * FROM `ssf_party` WHERE `partyid`='$pid'";
        $result1 = mysqli_query($db, $query1);
        $row1 = mysqli_fetch_array($result1,MYSQLI_ASSOC);

        //$query = "UPDATE `ssf_new_khushboo` SET khushname='$khushname', khushquality='$khushquality', WHERE khushid='$khushid' ";
        $query2 = "UPDATE `ssf_khushboo` SET `khushbooid`='$khushbooid',`khushbooname`='$row[khushname]',`khushbooquality`='$row[khushquality]',`pcategory`='$row1[pcategory]', `pid`='$pid', `pname`='$row1[pname]',`kdate`='$kdate',`kunits`='$kunits',`kentry`='$kentry' WHERE `kid`='$kid'";
        $result2 = mysqli_query($db, $query2);

        if($result2){
            echo "<script type=\"text/javascript\">alert('Updated')</script>";
            header("Location:../ssf/ssf_khushboo_view.php");
        }
        else{
            echo '<script> alert("Not updated") </script>';
        }
    }
    ob_end_flush();
?>