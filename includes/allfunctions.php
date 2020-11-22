<?php
function partyname(){
    global $db;
    $pname = array();
    $resulta = mysqli_query($db,"SELECT * FROM `ssf_party`");
    while ($rowa = mysqli_fetch_array($resulta, MYSQLI_ASSOC)) {
        $pname[] = $rowa['pname'];
        // OR 
        // $array1[] = $row[1];
    }
    return $pname;
}

function partycategory(){
    global $db;
    $pcategory = array();
    $resulta = mysqli_query($db,"SELECT DISTINCT(pcategory) AS `pcategory` FROM `ssf_party` GROUP BY `pname`, `pcategory`");
    while ($rowa = mysqli_fetch_array($resulta, MYSQLI_ASSOC)) {
        $pcategory[] = $rowa['pcategory'];
        // OR 
        // $array1[] = $row[1];
    }
    return $pcategory;
}

function cont(){
    global $db;
    $stcontractor = array();
    $resulta = mysqli_query($db,"SELECT * FROM `ssf_contractor`");
    while ($rowa = mysqli_fetch_array($resulta, MYSQLI_ASSOC)) {
        $stcontractor[] = $rowa['contid']."-".$rowa['contname'];
        // OR 
        // $array1[] = $row[1];
    }
    return $stcontractor;
}


function khush(){
    global $db;
    $khush = array();
    $resulta = mysqli_query($db,"SELECT * FROM `ssf_new_khushboo`");
    while ($rowa = mysqli_fetch_array($resulta, MYSQLI_ASSOC)) {
        $khush[] = $rowa['khushid']."-".$rowa['khushname']."-".$rowa['khushquality'];
        // OR 
        // $array1[] = $row[1];
    }
    return $khush;
}
?>