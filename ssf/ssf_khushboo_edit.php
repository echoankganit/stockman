<?php
    ob_start();
    include('../includes/session.php');
    if(isset($_POST['updatedata'])){
        $kid = mysqli_real_escape_string($db, $_POST['ekid']);
       
        $kweight = mysqli_real_escape_string($db, $_POST['ekweight']);
        //$kunits = mysqli_real_escape_string($db, $_POST['ekunits']);
        $kdate = mysqli_real_escape_string($db, $_POST['ekdate']);
        $kentry = mysqli_real_escape_string($db, $_POST['ekentry']);
        $knkid = mysqli_real_escape_string($db, $_POST['eknkid']);
        $kpid = mysqli_real_escape_string($db, $_POST['ekpid']);
        
        /*$pcategory = mysqli_real_escape_string($db, $_POST['epcategory']);
        $pname = mysqli_real_escape_string($db, $_POST['epname']);
        $array =  explode('-', $pname);*/

        $query = "SELECT * FROM `ssf_new_khushboo` WHERE `nkid`='$knkid'";
        $result = mysqli_query($db, $query) or die(mysqli_error($db));
        $row = mysqli_fetch_array($result,MYSQLI_ASSOC);

        $query1 = "SELECT * FROM `ssf_party` WHERE `pid`='$kpid'";
        $result1 = mysqli_query($db, $query1) or die(mysqli_error($db));
        $row1 = mysqli_fetch_array($result1,MYSQLI_ASSOC);

        //$query = "UPDATE `ssf_new_khushboo` SET khushname='$khushname', khushquality='$khushquality', WHERE khushid='$khushid' ";
        $query2 = "UPDATE `ssf_khushboo` SET `knkid`='$knkid',`knkname`='$row[nkname]',`knkquality`='$row[nkquality]', `kpid`='$kpid', `kpname`='$row1[pname]', `kweight`='$kweight', `kdate`='$kdate',`kentry`='$kentry' WHERE `kid`='$kid'";
        $result2 = mysqli_query($db, $query2) or die(mysqli_error($db));

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