<?php
    include('../includes/sessiononly.php');
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $kid = mysqli_real_escape_string($db, $_POST['vkid']);
        $sql1 = "SELECT * FROM `ssf_khushboo` WHERE kid='$kid'";
        $result1 = mysqli_query($db, $sql1);
    }
    while ($row1 = mysqli_fetch_array($result1,MYSQLI_ASSOC)){
        echo '<form>
        <p class="h3">Khushboo Entry Details</p>
        <div class="form-group">
            <label for="vkid">K ID</label>
            <input type="text" class="form-control" id="vkid" name="vkid" value= "'.$row1["kid"].'" disabled>
        </div>
        <div class="form-row">
            <div class="form-group col-lg-4 col-md-4 col-sm-12 col-xs-12">
                <label for="vkdate">Entry Date</label>
                <input type="text" class="form-control" id="vkdate" name="vkdate" value= "'.$row1["kdate"].'" disabled>
            </div>
            <div class="form-group col-lg-4 col-md-4 col-sm-12 col-xs-12">
                <label for="vkunits">Units</label>
                <input type="text" class="form-control" id="vkunits" name="vkunits" value= "'.$row1["kunits"].'" disabled>
            </div>
            <div class="form-group col-lg-4 col-md-4 col-sm-12 col-xs-12">
                <label for="vkentry">Entry</label>
                <input type="text" class="form-control" id="vkentry" name="vkentry" value= "'.$row1["kentry"].'" disabled>
            </div>
        </div>
       
        <hr>
        <p class="h3">Linked Khushboo Details</p>
        <div class="form-group">
            <label for="vkhushbooid">Khushboo ID</label>
            <input type="text" class="form-control" id="vkhushbooid" name="vkhushbooid" value= "'.$row1["khushbooid"].'" disabled>
        </div>
        <div class="form-row">
            <div class="form-group col-lg-6 col-md-6 col-sm-12 col-xs-12">
                <label for="vkhushbooname">Khushboo Name</label>
                <input type="text" class="form-control" id="vkhushbooname" name="vkhushbooname" value= "'.$row1["khushbooname"].'" disabled>
            </div>  
            <div class="form-group col-lg-6 col-md-6 col-sm-12 col-xs-12">
                <label for="vkhushbooquality">Khushboo Quality</label>
                <input type="text" class="form-control" id="vkhushbooquality" name="vkhushbooquality" value= "'.$row1["khushbooquality"].'" disabled>
            </div>
        </div>        

        <hr>
        <p class="h3">Linked Party Details</p>
        <div class="form-group">
            <label for="vpcategory">Party Category</label>
            <input type="text" class="form-control" id="vpcategory" name="vpcategory" value= "'.$row1["pcategory"].'" disabled>
        </div>
        <div class="form-row">
            <div class="form-group col-lg-6 col-md-6 col-sm-12 col-xs-12">
                <label for="vpid">Party ID</label>
                <input type="text" class="form-control" id="vpid" name="vpid" value= "'.$row1["pid"].'" disabled>
            </div>  
            <div class="form-group col-lg-6 col-md-6 col-sm-12 col-xs-12">
                <label for="vpname">Party Name</label>
                <input type="text" class="form-control" id="vpname" name="vpname" value= "'.$row1["pname"].'" disabled>
            </div>
        </div>        
        </form>';
    }
?>