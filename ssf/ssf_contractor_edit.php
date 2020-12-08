<?php
    ob_start();
    include('../includes/session.php');
    if(isset($_POST['updatedata']))
    {   
        $contid = $_POST['econtid'];
        $contname = $_POST['econtname'];
        $contaddress = $_POST['econtaddress'];
        $contppp = $_POST['econtppp'];
        $contdate = $_POST['econtdate'];

        $query = "UPDATE `ssf_contractor` SET contname='$contname', contaddress='$contaddress', contdate='$contdate', contppp='$contppp' WHERE contid='$contid' ";
        $query_run = mysqli_query($db, $query);

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