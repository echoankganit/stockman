<?php
    include('../includes/sessiononly.php');
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $nkid = mysqli_real_escape_string($db, $_POST['vnkid']);

        $sql1 = "SELECT * FROM `ssf_new_khushboo` WHERE nkid='$nkid'";
        $result1 = mysqli_query($db, $sql1) or die(mysqli_error($db));
    }
    while ($row1 = mysqli_fetch_array($result1,MYSQLI_ASSOC)){
    echo '<form>
        <div class="form-group">
            <label for="vnkid">khushboo ID</label>
            <input type="text" class="form-control" id="vnkid" name="vnkid" value= "'.$row1["nkid"].'" disabled>
        </div>
        <div class="form-group">
            <label for="vnkname">Khushboo Name</label>
            <input type="text" class="form-control" id="vnkname" name="vnkname" value= "'.$row1["nkname"].'" disabled>
        </div>
        <div class="form-group">
            <label for="vnkquality">Khushboo Quality</label>
            <input type="text" class="form-control" id="vnkquality" name="vnkquality" value= "'.$row1["nkquality"].'" disabled>
        </div>
    </form>';
    }
?>