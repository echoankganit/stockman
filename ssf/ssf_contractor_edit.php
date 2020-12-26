<?php
    ob_start();
    include('../includes/session.php');
    if(isset($_POST['updatedata']))
    {   
        $contid = mysqli_real_escape_string($db, $_POST['econtid']);
        $contname = mysqli_real_escape_string($db, $_POST['econtname']);
        $contaddress = mysqli_real_escape_string($db, $_POST['econtaddress']);
        $contppp = mysqli_real_escape_string($db, $_POST['econtppp']);
        $contdate = mysqli_real_escape_string($db, $_POST['econtdate']);

        $query = "UPDATE `ssf_contractor` SET contname='$contname', contaddress='$contaddress', contdate='$contdate', contppp='$contppp' WHERE contid='$contid' ";
        $query_run = mysqli_query($db, $query) or die(mysqli_error($db));

        if($query_run){
            echo "<script type=\"text/javascript\">alert('Updated')</script>";
            header("Location:../ssf/ssf_contractor_view.php");
        }
        else{
            echo '<script> alert("Data Not Updated"); </script>';
        }
    }
    ob_end_flush();
?>