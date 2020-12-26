<?php
    include('../includes/sessiononly.php');
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $rsmid = mysqli_real_escape_string($db, $_POST['vrsmid']);

        $sql1 = "SELECT * FROM `ssf_rsm` WHERE `rsmid`='$rsmid'";
        $result1 = mysqli_query($db, $sql1) or die(mysqli_error($db));
    }
    while ($row1 = mysqli_fetch_array($result1,MYSQLI_ASSOC)){
        $rsmpid = $row1["rsmpid"];
        $sql2 = "SELECT * FROM `ssf_party` WHERE pid='$rsmpid'";
        $result2 = mysqli_query($db, $sql2) or die(mysqli_error($db));
        $row2 = mysqli_fetch_array($result2,MYSQLI_ASSOC);
        echo '<form>
        <h2>Rice Stock Details</h2>
        <div class="form-group">
            <label for="vrsmid">RSM ID</label>
            <input type="text" class="form-control" id="vrsmid" name="vrsmid" value= "'.$row1["rsmid"].'" disabled>
        </div>
        <div class="form-row">
            <div class="form-group col-lg-6 col-md-6 col-sm-12 col-xs-12">
                <label for="vrsmricetype">Rice Type</label>
                <input type="text" class="form-control" id="vrsmricetype" name="vrsmricetype" value= "'.$row1["rsmricetype"].'" disabled>
            </div>
            <div class="form-group col-lg-6 col-md-6 col-sm-12 col-xs-12">
                <label for="vrsmriceweight">Rice Weight</label>
                <input type="text" class="form-control" id="vrsmriceweight" name="vrsmriceweight" value= "'.$row1["rsmriceweight"].' KG" disabled>
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-lg-6 col-md-6 col-sm-12 col-xs-12">
                <label for="vrsmunits">Units</label>
                <input type="text" class="form-control" id="vrsmunits" name="vrsmunits" value= "'.$row1["rsmunits"].'" disabled>
            </div>
            <div class="form-group col-lg-6 col-md-6 col-sm-12 col-xs-12">
                <label for="vrsmentry">Entry</label>
                <input type="text" class="form-control" id="vrsmentry" name="vrsmentry" value= "'.$row1["rsmentry"].'" disabled>
            </div>
        </div>
        <hr>
        <h2>Linked Party Details</h2>
        <div class="form-group">
            <label for="vrsmpcategory">Party Category</label>
            <input type="text" class="form-control" id="vrsmpcategory" name="vrsmpcategory" value= "'.$row2["pcategory"].'" disabled>
        </div>
        <div class="form-row">
            <div class="form-group col-lg-6 col-md-6 col-sm-12 col-xs-12">
                <label for="vrsmpid">Party ID</label>
                <input type="text" class="form-control" id="vrsmpid" name="vrsmpid" value= "'.$row1["rsmpid"].'" disabled>
            </div>  
            <div class="form-group col-lg-6 col-md-6 col-sm-12 col-xs-12">
                <label for="vrsmpname">Party Name</label>
                <input type="text" class="form-control" id="vrsmpname" name="vrsmpname" value= "'.$row1["rsmpname"].'" disabled>
            </div>
        </div>        
    </form>';
    }
?>