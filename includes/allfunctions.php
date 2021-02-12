<?php
function partyidname(){
    global $db;
    $pidname = array();
    $resulta = mysqli_query($db,"SELECT * FROM `ssf_party`");
    while ($rowa = mysqli_fetch_array($resulta, MYSQLI_ASSOC)) {
        $pidname[] = $rowa['pid']."-".$rowa['pname'];
        // OR 
        // $array1[] = $row[1];
    }
    return $pidname;
}

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
        $khush[] = $rowa['nkid']."-".$rowa['nkname']."-".$rowa['nkquality'];
        // OR 
        // $array1[] = $row[1];
    }
    return $khush;
}


function loginout(){
    global $db;
    if($rownum==1){
        return 0;
    }
    else
        return history.back(-1);
}
?>



<?php
function convert_number_to_words($number) {

$hyphen      = '-';
$conjunction = ' and ';
$separator   = ', ';
$negative    = 'negative ';
$decimal     = ' point ';
$dictionary  = array(
    0                   => 'zero',
    1                   => 'one',
    2                   => 'two',
    3                   => 'three',
    4                   => 'four',
    5                   => 'five',
    6                   => 'six',
    7                   => 'seven',
    8                   => 'eight',
    9                   => 'nine',
    10                  => 'ten',
    11                  => 'eleven',
    12                  => 'twelve',
    13                  => 'thirteen',
    14                  => 'fourteen',
    15                  => 'fifteen',
    16                  => 'sixteen',
    17                  => 'seventeen',
    18                  => 'eighteen',
    19                  => 'nineteen',
    20                  => 'twenty',
    30                  => 'thirty',
    40                  => 'fourty',
    50                  => 'fifty',
    60                  => 'sixty',
    70                  => 'seventy',
    80                  => 'eighty',
    90                  => 'ninety',
    100                 => 'hundred',
    1000                => 'thousand',
    100000             => 'lakh',
    10000000          => 'crore'
);

if (!is_numeric($number)) {
    return false;
}

if (($number >= 0 && (int) $number < 0) || (int) $number < 0 - PHP_INT_MAX) {
    // overflow
    trigger_error(
        'convert_number_to_words only accepts numbers between -' . PHP_INT_MAX . ' and ' . PHP_INT_MAX,
        E_USER_WARNING
    );
    return false;
}

if ($number < 0) {
    return $negative . $this->convert_number_to_words(abs($number));
}

$string = $fraction = null;

if (strpos($number, '.') !== false) {
    list($number, $fraction) = explode('.', $number);
}

switch (true) {
    case $number < 21:
        $string = $dictionary[$number];
        break;
    case $number < 100:
        $tens   = ((int) ($number / 10)) * 10;
        $units  = $number % 10;
        $string = $dictionary[$tens];
        if ($units) {
            $string .= $hyphen . $dictionary[$units];
        }
        break;
    case $number < 1000:
        $hundreds  = $number / 100;
        $remainder = $number % 100;
        $string = $dictionary[$hundreds] . ' ' . $dictionary[100];
        if ($remainder) {
            $string .= $conjunction . $this->convert_number_to_words($remainder);
        }
        break;
    case $number < 100000:
        $thousands   = ((int) ($number / 1000));
        $remainder = $number % 1000;

        $thousands = $this->convert_number_to_words($thousands);

        $string .= $thousands . ' ' . $dictionary[1000];
        if ($remainder) {
            $string .= $separator . $this->convert_number_to_words($remainder);
        }
        break;
    case $number < 10000000:
        $lakhs   = ((int) ($number / 100000));
        $remainder = $number % 100000;

        $lakhs = $this->convert_number_to_words($lakhs);

        $string = $lakhs . ' ' . $dictionary[100000];
        if ($remainder) {
            $string .= $separator . $this->convert_number_to_words($remainder);
        }
        break;
    case $number < 1000000000:
        $crores   = ((int) ($number / 10000000));
        $remainder = $number % 10000000;

        $crores = $this->convert_number_to_words($crores);

        $string = $crores . ' ' . $dictionary[10000000];
        if ($remainder) {
            $string .= $separator . $this->convert_number_to_words($remainder);
        }
        break;
    default:
        $baseUnit = pow(1000, floor(log($number, 1000)));
        $numBaseUnits = (int) ($number / $baseUnit);
        $remainder = $number % $baseUnit;
        $string = $this->convert_number_to_words($numBaseUnits) . ' ' . $dictionary[$baseUnit];
        if ($remainder) {
            $string .= $remainder < 100 ? $conjunction : $separator;
            $string .= $this->convert_number_to_words($remainder);
        }
        break;
}

if (null !== $fraction && is_numeric($fraction)) {
    $string .= $decimal;
    $words = array();
    foreach (str_split((string) $fraction) as $number) {
        $words[] = $dictionary[$number];
    }
    $string .= implode(' ', $words);
}

return $string;
}
?>