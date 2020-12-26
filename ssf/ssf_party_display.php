<?php
    include('../includes/sessiononly.php');
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $pid = mysqli_real_escape_string($db, $_POST['pid']);

        $sql1 = "SELECT * FROM `ssf_party` WHERE pid='$pid'";
        $result1 = mysqli_query($db, $sql1) or die(mysqli_error($db));
    }
    while ($row1 = mysqli_fetch_array($result1,MYSQLI_ASSOC)){
    echo '<form>
        <div class="form-group">
            <label for="pname">Party ID</label>
            <input type="text" class="form-control" name="vpid" id="vpid" value= "'.$row1["pid"].'" disabled>
        </div>
        <div class="form-group">
            <label for="pname">Party Name</label>
            <input type="text" class="form-control" id="vpname" name="vpname" value="'.$row1["pname"].'" disabled>
        </div>
        <div class="form-group">
            <label for="paddress">Party Address</label>
            <textarea class="form-control" id="vpaddress" name="vpaddress" readonly>'.htmlspecialchars($row1["paddress"]).'</textarea>
        </div>
        <div class="form-group">
            <label for="pgstin">GSTIN</label>
            <input type="text" class="form-control" id="vpgstin" name="vpgstin" value="'.$row1["pgstin"].'" disabled>
        </div>
        <div class="form-group">
            <label for="pcategory">Party Category</label>
            <input type="text" class="form-control" id="vpcategory" name="vpcategory" value="'.$row1["pcategory"].'" disabled>
        </div>
    </form>';
    }
?>