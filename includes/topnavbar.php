<!--Navbar -->
<div class="bg-primary mb-5">
<nav class="container navbar navbar-expand-lg navbar-dark sticky-top">
  <a class="navbar-brand" href="<?php echo $comp1[1]; ?>"><?php echo $comp1[0] ?></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent-333"
    aria-controls="navbarSupportedContent-333" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarSupportedContent-333">
    <ul class="navbar-nav mr-auto" id="mynav">
      <!--<li class="nav-item active">
        <a class="nav-link" href="<?php //echo $home; ?>">Home
          <span class="sr-only">(current)</span>
        </a>
      </li>-->
      <li class="nav-item">
        <a class="nav-link bg-danger text-white" href="<?php echo $rsm[1]; ?>"><?php echo $rsm[0]; ?></a>
      </li>
      <li class="nav-item">
        <a class="nav-link bg-danger text-white" href="<?php echo $empattendance[1]; ?>"><?php echo $empattendance[0]; ?></a>
      </li>
      <li class="nav-item dropdown bg-white">
        <a class="nav-link dropdown-toggle text-dark mx-3" id="navbarDropdownMenuLink-333" data-toggle="dropdown"
          aria-haspopup="true" aria-expanded="false">Entry</a>
        <div class="dropdown-menu dropdown-default" aria-labelledby="navbarDropdownMenuLink-333">
          <div class="dropdown-header text-dark" style="background-color: rgba(3, 169, 244, 0.3)">Khata</div>
          <a class="dropdown-item text-dark" style="background-color: rgba(76, 175, 80, 0.7)" href="<?php echo $cashbook[1]; ?>"><?php echo $cashbook[0]; ?></a>
          <a class="dropdown-item text-dark" style="background-color: rgba(76, 175, 80, 0.7)" href="<?php echo $bankbook[1]; ?>"><?php echo $bankbook[0]; ?></a>
          <div class="dropdown-header text-dark" style="background-color: rgba(3, 169, 244, 0.3)">Misc</div>
          <a class="dropdown-item" style="background-color: rgba(255, 235, 59, 0.7)" href="<?php echo $khushboo[1]; ?>"><?php echo $khushboo[0]; ?></a>
          <a class="dropdown-item" style="background-color: rgba(255, 235, 59, 0.7)" href="<?php echo $stitching[1]; ?>"><?php echo $stitching[0]; ?></a>
          <a class="dropdown-item" style="background-color: rgba(255, 235, 59, 0.7)" href="<?php echo $majdoori[1]; ?>"><?php echo $majdoori[0]; ?></a>
        </div>
      </li>
      <li class="nav-item dropdown bg-dark">
        <a class="nav-link dropdown-toggle mx-2" id="navbarDropdownMenuLink-333" data-toggle="dropdown"
          aria-haspopup="true" aria-expanded="false">Registration</a>
        <div class="dropdown-menu dropdown-default" aria-labelledby="navbarDropdownMenuLink-333">
          <div class="dropdown-header text-dark" style="background-color: rgba(3, 169, 244, 0.3)">Party</div>
          <a class="dropdown-item" href="<?php echo $partyreg[1]; ?>"><?php echo $partyreg[0]; ?></a>
          <a class="dropdown-item" href="<?php echo $partyreg[3]; ?>"><?php echo $partyreg[2]; ?></a>
          <div class="dropdown-header text-dark" style="background-color: rgba(3, 169, 244, 0.3)">Employee</div>
          <a class="dropdown-item" href="<?php echo $empreg[1]; ?>"><?php echo $empreg[0]; ?></a>
          <a class="dropdown-item" href="<?php echo $empreg[3]; ?>"><?php echo $empreg[2]; ?></a>
          <div class="dropdown-header text-dark" style="background-color: rgba(3, 169, 244, 0.3)">Contractor</div>
          <a class="dropdown-item" href="<?php echo $contreg[1]; ?>"><?php echo $contreg[0]; ?></a>
          <a class="dropdown-item" href="<?php echo $contreg[3]; ?>"><?php echo $contreg[2]; ?></a>
          <div class="dropdown-header text-dark" style="background-color: rgba(3, 169, 244, 0.3)">Khushboo</div>
          <a class="dropdown-item" href="<?php echo $nkreg[1]; ?>"><?php echo $nkreg[0]; ?></a>
          <a class="dropdown-item" href="<?php echo $nkreg[3]; ?>"><?php echo $nkreg[2]; ?></a>
        </div>
      </li>
     
    </ul>
    <ul class="navbar-nav ml-auto nav-flex-icons">
      <li class="nav-item">
        <a class="nav-link waves-effect waves-light">
          <i class="fab fa-twitter"></i>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link waves-effect waves-light">
          <i class="fab fa-google-plus-g"></i>
        </a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink-333" data-toggle="dropdown"
          aria-haspopup="true" aria-expanded="false">
          <i class="fas fa-user"></i>
        </a>
        <div class="dropdown-menu dropdown-menu-right dropdown-default"
          aria-labelledby="navbarDropdownMenuLink-333">
          <a class="dropdown-item" href="<?php echo $logout[1]; ?>"><?php echo $logout[0]; ?></a>
        </div>
      </li>
    </ul>
  </div>
</nav>
</div>
<!--/.Navbar -->