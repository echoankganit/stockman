<?php
    include('../includes/sessiononly.php');
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $cbid = mysqli_real_escape_string($db, $_POST['vcashbookid']);
        
        $sql1 = "SELECT * FROM `ssf_cashbook` WHERE cbid='$cbid'";
        $result1 = mysqli_query($db, $sql1) or die(mysqli_error($db));
    }
    while ($row1 = mysqli_fetch_array($result1,MYSQLI_ASSOC)){
        $cbpid = $row1["cbpid"];
        $sql2 = "SELECT * FROM `ssf_party` WHERE pid='$cbpid'";
        $result2 = mysqli_query($db, $sql2) or die(mysqli_error($db));
        $row2 = mysqli_fetch_array($result2,MYSQLI_ASSOC);
        echo '<form>
        <p class="h3">Cashbook Entry Details</p>
        <div class="form-group">
            <label for="vcbid">Cashbook ID</label>
            <input type="text" class="form-control" id="vcbid" name="vcbid" value= "'.$row1["cbid"].'" disabled>
        </div>
        <div class="form-row">
            <div class="form-group col-lg-6 col-md-6 col-sm-12 col-xs-12">
                <label for="vcbdate">Entry Date</label>
                <input type="text" class="form-control" id="vcbdate" name="vcbdate" value= "'.$row1["cbdate"].'" disabled>
            </div>
            <div class="form-group col-lg-6 col-md-6 col-sm-12 col-xs-12">
                <label for="vcbamount">Amount</label>
                <input type="text" class="form-control" id="vcbamount" name="vcbamount" value= "'.$row1["cbamount"].'" disabled>
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-lg-6 col-md-6 col-sm-12 col-xs-12">
                <label for="vcbreceivedby">Received By</label>
                <input type="text" class="form-control" id="vcbreceivedby" name="vcbreceivedby" value= "'.$row1["cbreceivedby"].'" disabled>
            </div>
            <div class="form-group col-lg-6 col-md-6 col-sm-12 col-xs-12">
                <label for="vcbentry">Entry</label>
                <input type="text" class="form-control" id="vcbentry" name="vcbentry" value= "'.$row1["cbentry"].'" disabled>
            </div>
        </div>
        <div class="form-group">
            <label for="vcblocation">Location</label>
            <textarea class="form-control" id="vcblocation" name="vcblocation" rows="3" readonly>'.htmlspecialchars($row1["cblocation"]).'</textarea>
        </div>

        <hr>
        <h2>Linked Party Details</h2>
        <div class="form-group">
            <label for="cbpcategory">Party Category</label>
            <input type="text" class="form-control" id="cbpcategory" name="cbpcategory" value= "'.$row2["pcategory"].'" disabled>
        </div>
        <div class="form-row">
            <div class="form-group col-lg-6 col-md-6 col-sm-12 col-xs-12">
                <label for="cbpid">Party ID</label>
                <input type="text" class="form-control" id="cbpid" name="cbpid" value= "'.$row1["cbpid"].'" disabled>
            </div>  
            <div class="form-group col-lg-6 col-md-6 col-sm-12 col-xs-12">
                <label for="cbpname">Party Name</label>
                <input type="text" class="form-control" id="cbpname" name="cbpname" value= "'.$row1["cbpname"].'" disabled>
            </div>
        </div>        
    </form>';
    }
?>