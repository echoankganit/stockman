<?php
    include('../includes/sessiononly.php');
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $empid = mysqli_real_escape_string($db, $_POST['vempid']);

        $sql1 = "SELECT * FROM `ssf_employee` WHERE empid='$empid'";
        $result1 = mysqli_query($db, $sql1) or die(mysqli_error($db));
    }
    while ($row1 = mysqli_fetch_array($result1,MYSQLI_ASSOC)){
    echo '<form>
        <div class="form-group">
            <label for="vempid">Employee ID</label>
            <input type="text" class="form-control" name="vempid" id="vempid" value= "'.$row1["empid"].'" disabled>
            </div>
            <div class="form-group">
                <label for="vempname">Employee Name</label>
                <input type="text" class="form-control" id="vempname" name="vempname" value= "'.$row1["empname"].'" disabled>
            </div>
            <div class="form-group">
                <label for="vempaddress">Employee Address</label>
                <textarea class="form-control" id="vempaddress" name="vempaddress" rows="3" readonly>'.htmlspecialchars($row1["empaddress"]).'</textarea>
            </div>
            <div class="form-group">
                <label for="vempdate">Date of Registration</label>
                <input type="date" class="form-control" id="vempdate" name="vempdate" value= "'.$row1["empdate"].'" disabled>
            </div>
        </div>
    </form>';
    }
?>