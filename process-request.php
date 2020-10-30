<?php
//https://www.tutorialrepublic.com/faq/populate-state-dropdown-based-on-selection-in-country-dropdown-using-jquery.php#:~:text=Answer%3A%20Use%20the%20jQuery%20ajax,while%20filling%20the%20registration%20form.
/*if(isset($_POST["country"])){
    // Capture selected country
    $country = $_POST["country"];
     
    // Define country and city array
    $countryArr = array(
                    "usa" => array("New Yourk", "Los Angeles", "California"),
                    "india" => array("Mumbai", "New Delhi", "Bangalore"),
                    "uk" => array("London", "Manchester", "Liverpool")
                );
     
    // Display city dropdown based on country name
    if($country !== 'Select'){
        echo "<label>City:</label>";
        echo "<select>";
        foreach($countryArr[$country] as $value){
            echo "<option>". $value . "</option>";
        }
        echo "</select>";
    } 
}*/
?>
<?php
//include("includes\header.php");
include("includes/connection.php");
//include('includes/session.php');
if(isset($_POST["partycategory"])){
    $partycategory = $_POST["partycategory"];
    function partyname(){
        global $db, $partycategory;
        $pname = array();
        $resulta = mysqli_query($db,"SELECT * FROM `ssf_party` WHERE `pcategory`='$partycategory'");
        while ($rowa = mysqli_fetch_array($resulta, MYSQLI_ASSOC)) {
            $pname[] = $rowa['pname'];
            // OR 
            // $array1[] = $row[1];
        }
        return $pname;
    }

    $pname = partyname();
    if($partycategory !== 'Select'){
    echo'<div class="form-group">
        <label for="pname">Party Name</label>
        <select class="partyname form-control" id="partyname" name="pname">';
        foreach($pname as $value){
            echo "<option value='$value'>$value</option>";
        }
        echo'</select>
    </div>';
    }
    /*echo "<label>City:</label>";
    echo "<select>";
    foreach($partycategoryArr[$partycategory] as $value){
        echo "<option>". $value . "</option>";
    }
    echo "</select>";*/
}
?>