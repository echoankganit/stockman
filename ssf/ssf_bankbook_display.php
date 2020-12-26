<?php
    include('../includes/sessiononly.php');
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $bbid = mysqli_real_escape_string($db, $_POST['vbankbookid']);
        
        $sql1 = "SELECT * FROM `ssf_bankbook` WHERE bbid='$bbid'";
        $result1 = mysqli_query($db, $sql1) or die(mysqli_error($db));
    }
    while ($row1 = mysqli_fetch_array($result1,MYSQLI_ASSOC)){
        $bbpid = $row1["bbpid"];
        $sql2 = "SELECT * FROM `ssf_party` WHERE pid='$bbpid'";
        $result2 = mysqli_query($db, $sql2) or die(mysqli_error($db));
        $row2 = mysqli_fetch_array($result2,MYSQLI_ASSOC);
        echo '<form>
        <p class="h3">Cashbook Entry Details</p>
        <div class="form-group">
            <label for="vbbid">Cashbook ID</label>
            <input type="text" class="form-control" id="vbbid" name="vbbid" value= "'.$row1["bbid"].'" disabled>
        </div>
        <div class="form-row">
            <div class="form-group col-lg-6 col-md-6 col-sm-12 col-xs-12">
                <label for="vbbdate">Entry Date</label>
                <input type="text" class="form-control" id="vbbdate" name="vbbdate" value= "'.$row1["bbdate"].'" disabled>
            </div>
            <div class="form-group col-lg-6 col-md-6 col-sm-12 col-xs-12">
                <label for="vbbamount">Amount</label>
                <input type="text" class="form-control" id="vbbamount" name="vbbamount" value= "'.$row1["bbamount"].'" disabled>
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-lg-6 col-md-6 col-sm-12 col-xs-12">
                <label for="vbbreceivedby">Received By</label>
                <input type="text" class="form-control" id="vbbreceivedby" name="vbbreceivedby" value= "'.$row1["bbreceivedby"].'" disabled>
            </div>
            <div class="form-group col-lg-6 col-md-6 col-sm-12 col-xs-12">
                <label for="vbbentry">Entry</label>
                <input type="text" class="form-control" id="vbbentry" name="vbbentry" value= "'.$row1["bbentry"].'" disabled>
            </div>
        </div>
        <div class="form-group">
            <label for="vbblocation">Location</label>
            <textarea class="form-control" id="vbblocation" name="vbblocation" rows="3" readonly>'.htmlspecialchars($row1["bblocation"]).'</textarea>
        </div>

        <hr>
        <h2>Linked Party Details</h2>
        <div class="form-group">
            <label for="bbpcategory">Party Category</label>
            <input type="text" class="form-control" id="bbpcategory" name="bbpcategory" value= "'.$row2["pcategory"].'" disabled>
        </div>
        <div class="form-row">
            <div class="form-group col-lg-6 col-md-6 col-sm-12 col-xs-12">
                <label for="bbpid">Party ID</label>
                <input type="text" class="form-control" id="bbpid" name="bbpid" value= "'.$row1["bbpid"].'" disabled>
            </div>  
            <div class="form-group col-lg-6 col-md-6 col-sm-12 col-xs-12">
                <label for="bbpname">Party Name</label>
                <input type="text" class="form-control" id="bbpname" name="bbpname" value= "'.$row1["bbpname"].'" disabled>
            </div>
        </div>        
    </form>';
    }
?>