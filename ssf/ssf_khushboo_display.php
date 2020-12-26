<?php
    include('../includes/sessiononly.php');
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $kid = mysqli_real_escape_string($db, $_POST['vkid']);

        $sql1 = "SELECT * FROM `ssf_khushboo` WHERE kid='$kid'";
        $result1 = mysqli_query($db, $sql1) or die(mysqli_error($db));
    }
    while ($row1 = mysqli_fetch_array($result1,MYSQLI_ASSOC)){
        $kpidhere = $row1["kpid"];
        $sql2 = "SELECT * FROM `ssf_party` WHERE pid='$kpidhere'";
        $result2 = mysqli_query($db, $sql2) or die(mysqli_error($db));
        $row2 = mysqli_fetch_array($result2,MYSQLI_ASSOC);
        echo '<form>
        <p class="h3">Khushboo Entry Details</p>
        <div class="form-group">
            <label for="vkid">K ID</label>
            <input type="text" class="form-control" id="vkid" name="vkid" value= "'.$row1["kid"].'" disabled>
        </div>
        <div class="form-group">
            <label for="vkweight">Weight</label>
            <input type="text" class="form-control" id="vkweight" name="vkweight" value= "'.$row1["kweight"].' KG" disabled>
        </div>
        <div class="form-row">
            <div class="form-group col-lg-6 col-md-6 col-sm-12 col-xs-12">
                <label for="vkdate">Entry Date</label>
                <input type="text" class="form-control" id="vkdate" name="vkdate" value= "'.$row1["kdate"].'" disabled>
            </div>
            <div class="form-group col-lg-6 col-md-6 col-sm-12 col-xs-12">
                <label for="vkentry">Entry</label>
                <input type="text" class="form-control" id="vkentry" name="vkentry" value= "'.$row1["kentry"].'" disabled>
            </div>
        </div>
       
        <hr>
        <p class="h3">Linked Khushboo Details</p>
        <div class="form-group">
            <label for="vknkid">Khushboo ID</label>
            <input type="text" class="form-control" id="vknkid" name="vknkid" value= "'.$row1["knkid"].'" disabled>
        </div>
        <div class="form-row">
            <div class="form-group col-lg-6 col-md-6 col-sm-12 col-xs-12">
                <label for="vknkname">Khushboo Name</label>
                <input type="text" class="form-control" id="vknkname" name="vknkname" value= "'.$row1["knkname"].'" disabled>
            </div>  
            <div class="form-group col-lg-6 col-md-6 col-sm-12 col-xs-12">
                <label for="vknkquality">Khushboo Quality</label>
                <input type="text" class="form-control" id="vknkquality" name="vknkquality" value= "'.$row1["knkquality"].'" disabled>
            </div>
        </div>        

        <hr>
        <p class="h3">Linked Party Details</p>
        <div class="form-group">
            <label for="vkpcategory">Party Category</label>
            <input type="text" class="form-control" id="vkpcategory" name="vkpcategory" value= "'.$row2["pcategory"].'" disabled>
        </div>
        <div class="form-row">
            <div class="form-group col-lg-6 col-md-6 col-sm-12 col-xs-12">
                <label for="vkpid">Party ID</label>
                <input type="text" class="form-control" id="vkpid" name="vk pid" value= "'.$row1["kpid"].'" disabled>
            </div>  
            <div class="form-group col-lg-6 col-md-6 col-sm-12 col-xs-12">
                <label for="vkpname">Party Name</label>
                <input type="text" class="form-control" id="vkpname" name="vkpname" value= "'.$row1["kpname"].'" disabled>
            </div>
        </div>        
        </form>';
    }
?>