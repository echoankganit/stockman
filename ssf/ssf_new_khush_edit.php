<?php
    ob_start();
    include('../includes/session.php');
    if(isset($_POST['updatedata']))
    {   
        $khushid = $_POST['ekhushid'];
        $khushname = $_POST['ekhushname'];
        $khushquality = $_POST['ekhushquality'];

        //$query = "UPDATE `ssf_new_khushboo` SET khushname='$khushname', khushquality='$khushquality', WHERE khushid='$khushid' ";
        $q1 = "UPDATE `ssf_new_khushboo` SET `khushname`='$khushname', `khushquality`='$khushquality' WHERE `khushid`='$khushid'";
        $query_run = mysqli_query($db, $q1);

        if($query_run){
            echo "<script type=\"text/javascript\">alert('Updated')</script>";
            header("Location:../ssf/ssf_new_khush_view.php");
        }
        else{
            echo '<script> alert("'.$khushid.''.$khushname.''.$khushquality.'"); </script>';
        }
    }
    ob_end_flush();
?>