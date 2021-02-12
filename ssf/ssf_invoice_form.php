<?php
    ob_start();
    include('../includes/session.php');

    if($_SERVER["REQUEST_METHOD"] == "POST") {
        $indate = mysqli_real_escape_string($db, $_POST['indate']);
        $invehnum = mysqli_real_escape_string($db, $_POST['invehnum']);
        $inrecname = mysqli_real_escape_string($db, $_POST['inrecname']);
        $inrecaddress = mysqli_real_escape_string($db, $_POST['inrecaddress']);
        $instate = mysqli_real_escape_string($db, $_POST['instate']);
        $incode = mysqli_real_escape_string($db, $_POST['incode']);
        $inbroker = mysqli_real_escape_string($db, $_POST['inbroker']);
        //$sdoc=implode (", ",$_POST['sdoc']);}
        $sno = mysqli_real_escape_string($db, implode(": ",$_POST['sno']));
        $indesc = mysqli_real_escape_string($db, implode(": ",$_POST['indesc']));
        $inaccode = mysqli_real_escape_string($db, implode(": ",$_POST['inaccode']));
        $inbags = mysqli_real_escape_string($db, implode(": ",$_POST['inbags']));
        $inweight = mysqli_real_escape_string($db, implode(": ",$_POST['inweight']));
        $inrate = mysqli_real_escape_string($db, implode(": ",$_POST['inrate']));
        if (isset($_POST['insubmit'])){
            $sql = "INSERT INTO `ssf_invoice` (`indate`, `invehnum`, `inrecname`, `inrecaddress`, `instate`, `incode`, `inbroker`, `sno`, `indesc`, `inaccode`, `inbags`, `inweight`, `inrate`) VALUES ('$indate', '$invehnum', '$inrecname', '$inrecaddress', '$instate', '$incode', '$inbroker', '$sno', '$indesc', '$inaccode', '$inbags', '$inweight', '$inrate')";
            $result = mysqli_query($db,$sql) or die(mysqli_error($db));

            $sql1 = "SELECT * FROM `ssf_invoice` ORDER BY `innum` DESC LIMIT 1";
            $result1 = mysqli_query($db,$sql1) or die(mysqli_error($db));
            $row1 = mysqli_fetch_array($result1,MYSQLI_ASSOC);
            if($result){
                echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
                Invoice Num: <strong>'.$row1['innum'].'</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>';
            }
            else{
                echo "There is something wrong. Contact Admin.";
            }
        }
    }
    ob_end_flush();
?>
<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <!-- Font Awesome CSS -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" integrity="sha384-gfdkjb5BdAXd+lj+gudLWI+BXq4IuLW5IT+brZEZsLFm++aCMlF1V92rMkPaX4PP" crossorigin="anonymous">
    <!-- Mine CSS -->
    <link rel="stylesheet" href="../includes/css/design.css">

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
    <SCRIPT language="javascript">
        function add() {

            //Create an input type dynamically.
            var injsdesc = document.createElement("input");
            var injsaccode = document.createElement("input");
            var injsbags = document.createElement("input");
            var injsweight = document.createElement("input");
            var injsrate = document.createElement("input");
            var jsdesc = "Prod Desc";
            //Assign different attributes to the element.
            
            injsdesc.setAttribute("type", "text");
            injsdesc.setAttribute("id", "injsdesc");
            injsdesc.setAttribute("name", "injsdesc");
            injsdesc.className = 'form-control';

            injsaccode.setAttribute("type", "number");
            injsaccode.setAttribute("id", "injsaccode");
            injsaccode.setAttribute("name", "injsaccode");
            injsaccode.setAttribute("step", "01");
            injsaccode.setAttribute("min", "01");
            injsaccode.className = 'form-control';

            injsbags.setAttribute("type", "number");
            injsbags.setAttribute("id", "injsbags");
            injsbags.setAttribute("name", "injsbags");
            injsbags.setAttribute("step", "01");
            injsbags.setAttribute("min", "01");
            injsbags.className = 'form-control';

            injsweight.setAttribute("type", "number");
            injsweight.setAttribute("id", "injsweight");
            injsweight.setAttribute("name", "injsweight");
            injsweight.setAttribute("step", "0.001");
            injsweight.setAttribute("min", "1");
            injsweight.className = 'form-control';

            injsrate.setAttribute("type", "number");
            injsrate.setAttribute("id", "injsrate");
            injsrate.setAttribute("name", "injsrate");
            injsrate.setAttribute("step", "0.01");
            injsrate.setAttribute("min", "1");
            injsrate.className = 'form-control';

            var foo = document.getElementById("fooBar");

            //Append the element in page (in span).
            //document.getElementById("fooBar").write("Product Description");
            foo.appendChild(injsdesc);
            //document.getElementById("fooBar").write("Product Description 1 ");
            foo.appendChild(injsaccode);
            foo.appendChild(injsbags);
            foo.appendChild(injsweight);
            foo.appendChild(injsrate);
        }
    </SCRIPT>
    <?php echo("<title>$invoiceform[0] $page_title</title>"); ?>
</head>
<body class="d-flex flex-column">
    <div class="flex-grow-1 flex-shrink-0">
        <div class="d-flex justify-content-center">
            <p class="h2 bg-light px-4 py-2" style="border-radius: 25px"><?php echo strtoupper($invoiceform[0]); ?></p>
        </div>
        <div class="container">
            <form method="POST" action="">
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label for="indate">Date</label>
                            <input type="date" class="form-control" id="indate" name="indate" value="<?php echo date('Y-m-d') ?>">
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label for="invehnum">Vehicle Number</label>
                            <input type="text" class="form-control" id="invehnum" name="invehnum">
                        </div>
                    </div>
                </div>
                Details of Receiver
                <div class="form-group">
                    <label for="inrecname">Name</label>
                    <input type="text" class="form-control" id="inrecname" name="inrecname">
                </div>
                <div class="form-group">
                    <label for="inrecaddress">Address</label>
                    <textarea class="form-control" id="inrecaddress" rows="3" name="inrecaddress"></textarea>
                </div>
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label for="instate">State</label>
                            <input type="text" class="form-control" id="instate" name="instate">
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label for="incode">Code</label>
                            <input type="number" class="form-control" id="incode" step="01" min="01" name="incode">
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="inbroker">Broker</label>
                    <input type="text" class="form-control" id="inbroker" name="inbroker">
                </div>
                <!-- <div class="form-group bg-danger text-white">
                    <label for="numofprod">Number of Products?</label>
                    <input type="text" class="form-control" id="numofprod" name="numofprod">
                </div> -->
                <?php 
                    for($counter = 1; $counter <= 5; $counter++){
                        echo'<div class="form-row">
                    <div class="form-group col-1">
                        <label for="sno">S. No.</label>
                        <input type="text" class="form-control" id="sno" name="sno[]">
                    </div>
                    <div class="form-group col-3">
                        <label for="indesc[]">Product Description '.$counter.'</label>
                        <input type="text" class="form-control" id="indesc" name="indesc[]">
                    </div>
                    <div class="form-group col-2">
                        <label for="inaccode[]">AC Code</label>
                        <input type="number" class="form-control" id="inaccode" step="01" min="01" name="inaccode[]">
                    </div>
                    <div class="form-group col-2">
                        <label for="inbags[]">Bags</label>
                        <input type="number" class="form-control" id="inbags" step="01" min="01" name="inbags[]">
                    </div>
                    <div class="form-group col-2">
                        <label for="inweight[]">Weight (KGs)</label>
                        <input type="number" class="form-control" id="inweight" step="0.001" min="1" name="inweight[]">
                    </div>
                    <div class="form-group col-2">
                        <label for="inrate[]">Rate</label>
                        <input type="number" class="form-control" id="inrate" step="0.01" min="1" name="inrate[]">
                    </div>
                </div>';
                    }
                ?>
                <!-- <div class="form-row">
                    <div class="form-group col-2.1">
                        <label for="indesc">Product Description</label>
                        <input type="text" class="form-control" id="indesc" name="indesc">
                    </div>
                    <div class="form-group col-2.1">
                        <label for="inaccode">AC Code</label>
                        <input type="number" class="form-control" id="inaccode" step="01" min="01" name="inaccode">
                    </div>
                    <div class="form-group col-2.1">
                        <label for="inbags">Bags</label>
                        <input type="number" class="form-control" id="inbags" step="01" min="01" name="inbags">
                    </div>
                    <div class="form-group col-2.1">
                        <label for="inweight">Weight (KGs)</label>
                        <input type="number" class="form-control" id="inweight" step="0.001" min="1" name="inweight">
                    </div>
                    <div class="form-group col-2.1">
                        <label for="inrate">Rate</label>
                        <input type="number" class="form-control" id="inrate" step="0.01" min="1" name="inrate">
                    </div>
                </div> -->
                <INPUT type="button" value="Add" disabled onclick="add()"/>
                <div class="form-group" id="fooBar">
                
                </div>
                <div class="d-flex justify-content-center mt-3">
                    <button type="submit" class="btn btn-primary mr-3" name="insubmit">Submit</button>
                    <input type="button" class="btn btn-danger mr-3" value="Back" onclick="history.back(-1)" />
                    <button type="home" onclick='window.location="ssf_contents.php";return false;' class="btn btn-secondary mr-3">Home</button>
                    <a class="btn btn-info" target="_blank" href="<?php echo $invoiceform[3]; ?>" role="button"><?php echo $invoiceform[2]; ?></a>
                    <!--<button type="submit" class="btn btn-primary" name="available">Available</button>-->
                </div>
            </form>
        </div>
    </div>
    <script>
        if ( window.history.replaceState ) {
        window.history.replaceState( null, null, window.location.href );
        }
    </script>
</body>
</html>