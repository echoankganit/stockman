<?php
    include('../includes/sessiononly.php');
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $entryrno = mysqli_real_escape_string($db, $_POST['vrsmid']);
        $sql1 = "SELECT * FROM `ssf_rsm` WHERE entryrno='$entryrno'";
        $result1 = mysqli_query($db, $sql1);
    }
    while ($row1 = mysqli_fetch_array($result1,MYSQLI_ASSOC)){
    echo '<form>
        <h2>Rice Stock Details</h2>
        <div class="form-group">
            <label for="vrsmid">RSM ID</label>
            <input type="text" class="form-control" id="vrsmid" name="vrsmid" value= "'.$row1["entryrno"].'" disabled>
        </div>
        <div class="form-row">
            <div class="form-group col-lg-6 col-md-6 col-sm-12 col-xs-12">
                <label for="vricetype">Rice Type</label>
                <input type="text" class="form-control" id="vricetype" name="vricetype" value= "'.$row1["ricetype"].'" disabled>
            </div>
            <div class="form-group col-lg-6 col-md-6 col-sm-12 col-xs-12">
                <label for="vriceweight">Rice Weight</label>
                <input type="text" class="form-control" id="vriceweight" name="vriceweight" value= "'.$row1["riceweight"].'" disabled>
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-lg-6 col-md-6 col-sm-12 col-xs-12">
                <label for="vunits">Units</label>
                <input type="text" class="form-control" id="vunits" name="vunits" value= "'.$row1["units"].'" disabled>
            </div>
            <div class="form-group col-lg-6 col-md-6 col-sm-12 col-xs-12">
                <label for="vrsmentry">Entry</label>
                <input type="text" class="form-control" id="vrsmentry" name="vrsmentry" value= "'.$row1["rsmentry"].'" disabled>
            </div>
        </div>
        <hr>
        <h2>Linked Party Details</h2>
        <div class="form-group">
            <label for="vpcategory">Party Category</label>
            <input type="text" class="form-control" id="vpcategory" name="vpcategory" value= "'.$row1["pcategory"].'" disabled>
        </div>
        <div class="form-row">
            <div class="form-group col-lg-6 col-md-6 col-sm-12 col-xs-12">
                <label for="vpid">Party ID</label>
                <input type="text" class="form-control" id="vpid" name="vpid" value= "'.$row1["pid"].'" disabled>
            </div>  
            <div class="form-group col-lg-6 col-md-6 col-sm-12 col-xs-12">
                <label for="vpname">Party Name</label>
                <input type="text" class="form-control" id="vpname" name="vpname" value= "'.$row1["pname"].'" disabled>
            </div>
        </div>        
    </form>';
    }
?>