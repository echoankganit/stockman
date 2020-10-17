1) For Sticky bootstrap footer
A) HTML:
https://jsfiddle.net/bootstrapious/pt30uLw2/
https://bootstrapious.com/p/bootstrap-sticky-footer

<body class="d-flex flex-column">
  <div class="flex-grow-1 flex-shrink-0">

  </div>
</body>

B) CSS:
/* Important - set html + body height to 100% */

html,
body {
  height: 100%;
}

/* Demo styling  */

body {
  background: #4568DC;
  background: -webkit-linear-gradient(to right, #B06AB3, #4568DC);
  background: linear-gradient(to right, #B06AB3, #4568DC);
}


C) display details
<?php
        if (isset($_POST['available'])){
            $sql2 = "SELECT SUM(riceweight*units) AS sumrqi FROM `ssf_rsm` WHERE `ricetype`='$ricetype' AND `ricequality`='$ricequality' AND `riceweight`='$riceweight' AND `rsmentry`='in'";
            $sql3 = "SELECT SUM(riceweight*units) AS sumrqo FROM `ssf_rsm` WHERE `ricetype`='$ricetype' AND `ricequality`='$ricequality' AND `riceweight`='$riceweight' AND `rsmentry`='out'";
            $result2 = mysqli_query($db,$sql2);
            $result3 = mysqli_query($db,$sql3);
            $row2 = mysqli_fetch_assoc($result2); 
            $row3 = mysqli_fetch_assoc($result3);
            $rowin = $row2['sumrqi'];
            $rowout = $row3['sumrqo'];
            $rowtotal = $rowin-$rowout;
            echo'<div class="container">
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>';
            if($rowin==0)
                echo $ricetype." ".$ricequality." ".$riceweight." KG in = 0 KG Total".$rowin."<br>";
            else
                echo $ricetype." ".$ricequality." ".$riceweight." KG in = ".$rowin." KG Total and have ".$rowin/$riceweight." bag(s). <br>";
            if($rowout==0)
                echo $ricetype." ".$ricequality." ".$riceweight." KG out = 0 KG Total".$rowout."<br>";
            else
                echo $ricetype." ".$ricequality." ".$riceweight." KG out = ".$rowout." KG Total and have ".$rowout/$riceweight." bag(s). <br>";
            echo "Left in Stock = ".$rowtotal." KG Total and have ".$rowtotal/$riceweight." bag(s).";
            echo '</div>';
        }
        ?>