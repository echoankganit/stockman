<?php
    include('../includes/sessiononly.php');
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $khushid = mysqli_real_escape_string($db, $_POST['vkhushid']);
        $sql1 = "SELECT * FROM `ssf_new_khushboo` WHERE khushid='$khushid'";
        $result1 = mysqli_query($db, $sql1);
    }
    while ($row1 = mysqli_fetch_array($result1,MYSQLI_ASSOC)){
    echo '<form>
        <div class="form-group">
            <label for="vkhushid">khushboo ID</label>
            <input type="text" class="form-control" id="vkhushid" name="vkhushid" value= "'.$row1["khushid"].'" disabled>
        </div>
        <div class="form-group">
            <label for="vkhushname">Khushboo Name</label>
            <input type="text" class="form-control" id="vkhushname" name="vkhushname" value= "'.$row1["khushname"].'" disabled>
        </div>
        <div class="form-group">
            <label for="vkhushquality">Khushboo Quality</label>
            <input type="text" class="form-control" id="vkhushquality" name="vkhushquality" value= "'.$row1["khushquality"].'" disabled>
        </div>
    </form>';
    }
?>