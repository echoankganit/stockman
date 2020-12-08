<?php
    include('../includes/sessiononly.php');
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $maid = mysqli_real_escape_string($db, $_POST['vmaid']);
        $sql1 = "SELECT * FROM `ssf_majdoori` WHERE maid='$maid'";
        $result1 = mysqli_query($db, $sql1);
    }
    while ($row1 = mysqli_fetch_array($result1,MYSQLI_ASSOC)){
    echo '<form>
        <h3>Majoori Entry Details</h3>
        <div class="form-group">
            <label for="vmaid">Majdoori ID</label>
            <input type="text" class="form-control" id="vmaid" name="vmaid" value= "'.$row1["maid"].'" disabled>
        </div>
        <div class="form-row">
            <div class="form-group col-lg-6 col-md-6 col-sm-12 col-xs-12">
                <label for="vmadate">Entry Date</label>
                <input type="text" class="form-control" id="vmadate" name="vmadate" value= "'.$row1["madate"].'" disabled>
            </div>
            <div class="form-group col-lg-6 col-md-6 col-sm-12 col-xs-12">
                <label for="vmaunits">Units</label>
                <input type="text" class="form-control" id="vmaunits" name="vmaunits" value= "'.$row1["maunits"].'" disabled>
            </div>
        </div>
        <div class="form-group">
            <label for="vmalocation">Location</label>
            <input type="text" class="form-control" id="vmalocation" name="vmalocation" value= "'.$row1["malocation"].'" disabled>
        </div>

        <hr>
        <h3>Linked Contractor Details</h3>
        
        <div class="form-row">
            <div class="form-group col-lg-6 col-md-6 col-sm-12 col-xs-12">
                <label for="vmacontid">Contractor ID</label>
                <input type="text" class="form-control" id="vmacontid" name="vmacontid" value= "'.$row1["macontid"].'" disabled>
            </div>
            <div class="form-group col-lg-6 col-md-6 col-sm-12 col-xs-12">
                <label for="vmacontname">Contractor Name</label>
                <input type="text" class="form-control" id="vmacontname" name="vmacontname" value= "'.$row1["macontname"].'" disabled>
            </div>
        </div>        
    </form>';
    }
?>