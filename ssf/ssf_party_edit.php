<?php
    ob_start();
    include('../includes/session.php');
    if(isset($_POST['updatedata']))
    {   
        $partyid = $_POST['epid'];
        $pname = $_POST['epname'];
        $paddress = $_POST['epaddress'];
        $pgstin = $_POST['epgstin'];
        $pcategory = $_POST['epcategory'];

        $query = "UPDATE `ssf_party` SET pname='$pname', paddress='$paddress', pgstin='$pgstin', pcategory='$pcategory' WHERE partyid='$partyid'  ";
        $query_run = mysqli_query($db, $query);

        if($query_run){
            echo "<script type=\"text/javascript\">alert('Updated')</script>";
            header("Location:../ssf/ssf_party_view.php");
        }
        else{
            echo '<script> alert("Data Not Updated"); </script>';
        }
    }
    ob_end_flush();
?>