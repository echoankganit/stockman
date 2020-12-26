<?php
    include('../includes/sessiononly.php');
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $stid = mysqli_real_escape_string($db, $_POST['vstid']);

        $sql1 = "SELECT * FROM `ssf_stitching` WHERE stid='$stid'";
        $result1 = mysqli_query($db, $sql1) or die(mysqli_error($db));
    }
    while ($row1 = mysqli_fetch_array($result1,MYSQLI_ASSOC)){
    echo '<form>
        <h3>Stitching Entry Details</h3>
        <div class="form-group">
            <label for="vstid">Stitching ID</label>
            <input type="text" class="form-control" id="vstid" name="vstid" value= "'.$row1["stid"].'" disabled>
        </div>
        <div class="form-row">
            <div class="form-group col-lg-6 col-md-6 col-sm-12 col-xs-12">
                <label for="vstdate">Entry Date</label>
                <input type="text" class="form-control" id="vstdate" name="vstdate" value= "'.$row1["stdate"].'" disabled>
            </div>
            <div class="form-group col-lg-6 col-md-6 col-sm-12 col-xs-12">
                <label for="vstunits">Units</label>
                <input type="text" class="form-control" id="vstunits" name="vstunits" value= "'.$row1["stunits"].'" disabled>
            </div>
        </div>
        <div class="form-group">
            <label for="vstlocation">Location</label>
            <textarea class="form-control" id="vstlocation" name="vstlocation" rows="3" disabled>'.$row1["stlocation"].'</textarea>
        </div>

        <hr>
        <h3>Linked Contractor Details</h3>
        
        <div class="form-row">
            <div class="form-group col-lg-6 col-md-6 col-sm-12 col-xs-12">
                <label for="vstcontid">Contractor ID</label>
                <input type="text" class="form-control" id="vstcontid" name="vstcontid" value= "'.$row1["stcontid"].'" disabled>
            </div>
            <div class="form-group col-lg-6 col-md-6 col-sm-12 col-xs-12">
                <label for="vstcontname">Contractor Name</label>
                <input type="text" class="form-control" id="vstcontname" name="vstcontname" value= "'.$row1["stcontname"].'" disabled>
            </div>
        </div>        
    </form>';
    }
?>