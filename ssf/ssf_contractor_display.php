<?php
    include('../includes/sessiononly.php');
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $contid = mysqli_real_escape_string($db, $_POST['vcontid']);
        
        $sql1 = "SELECT * FROM `ssf_contractor` WHERE contid='$contid'";
        $result1 = mysqli_query($db, $sql1) or die(mysqli_error($db));
    }
    while ($row1 = mysqli_fetch_array($result1,MYSQLI_ASSOC)){
    echo '<form>
        <div class="form-group">
            <label for="vcontid">Contractor ID</label>
            <input type="text" class="form-control" name="vcontid" id="vcontid" value= "'.$row1["contid"].'" disabled>
            </div>
            <div class="form-group">
                <label for="vcontname">Contractor Name</label>
                <input type="text" class="form-control" id="vcontname" name="vcontname" value= "'.$row1["contname"].'" disabled>
            </div>
            <div class="form-group">
                <label for="vcontaddress">Contractor Address</label>
                <textarea class="form-control" id="vcontaddress" name="vcontaddress" rows="3" readonly>'.htmlspecialchars($row1["contaddress"]).'</textarea>
            </div>
            <div class="form-row">
                <div class="form-group col-lg-6 col-md-6 col-sm-12 col-xs-12">
                    <label for="vcontppp">Price per Piece</label>
                    <input type="text" class="form-control" id="vcontppp" name="vcontppp" value= "'.$row1["contppp"].'" disabled>
                </div>
                <div class="form-group col-lg-6 col-md-6 col-sm-12 col-xs-12">
                    <label for="vcontdate">Date of Registration</label>
                    <input type="date" class="form-control" id="vcontdate" name="vcontdate" value= "'.$row1["contdate"].'" disabled>
                </div>
            </div>
        </div>
    </form>';
    }
?>