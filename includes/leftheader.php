<!-- Vertical navbar -->
<div class="vertical-nav bg-white" id="sidebar">
    <div class="py-4 px-3 mb-4 bg-light">
    <div class="media d-flex align-items-center"><img src="https://res.cloudinary.com/mhmd/image/upload/v1556074849/avatar-1_tcnd60.png" alt="..." width="65" class="mr-3 rounded-circle img-thumbnail shadow-sm">
      <div class="media-body">
        <h4 class="m-0"><?php echo $login_session; ?></h4>
        <p class="font-weight-light text-muted mb-0">Administrator</p>
        <a class="font-weight-light mb-0" href="../includes/logout.php" type="button">Logout</a>
      </div>
    </div>
  </div>

  <p class="text-gray font-weight-bold text-uppercase px-3 small pb-4 mb-0">Main</p>

  <ul class="nav flex-column bg-white mb-0">
    <li class="nav-item">
      <a href="ssf_contents.php" class="nav-link text-dark font-italic bg-light">
                <i class="fa fa-th-large mr-3 text-primary fa-fw"></i>
                Contents
            </a>
    </li>
    <li class="nav-item">
      <a href="ssf_rsm.php" class="nav-link text-dark font-italic">
                <i class="fa fa-address-card mr-3 text-primary fa-fw"></i>
                Rice Stock Management
            </a>
    </li>
    <li class="nav-item">
      <a href="#" class="nav-link text-dark font-italic">
                <i class="fa fa-cubes mr-3 text-primary fa-fw"></i>
                Services
            </a>
    </li>
    <li class="nav-item">
      <a href="#" class="nav-link text-dark font-italic">
                <i class="fa fa-picture-o mr-3 text-primary fa-fw"></i>
                Gallery
            </a>
    </li>
  </ul>

  <p class="text-gray font-weight-bold text-uppercase px-3 small py-4 mb-0">Charts</p>

  <ul class="nav flex-column bg-white mb-0">
    <li class="nav-item">
      <a href="#" class="nav-link text-dark font-italic">
                <i class="fa fa-area-chart mr-3 text-primary fa-fw"></i>
                Area charts
            </a>
    </li>
    <li class="nav-item">
      <a href="#" class="nav-link text-dark font-italic">
                <i class="fa fa-bar-chart mr-3 text-primary fa-fw"></i>
                Bar charts
            </a>
    </li>
    <li class="nav-item">
      <a href="#" class="nav-link text-dark font-italic">
                <i class="fa fa-pie-chart mr-3 text-primary fa-fw"></i>
                Pie charts
            </a>
    </li>
    <li class="nav-item">
      <a href="#" class="nav-link text-dark font-italic">
                <i class="fa fa-line-chart mr-3 text-primary fa-fw"></i>
                Line charts
            </a>
    </li>
  </ul>
</div>
<!-- End vertical navbar -->


<!-- Page content holder -->
<div class="page-content pt-3" id="content">
  <!-- Toggle button -->
  <div class="pl-2">
    <button id="sidebarCollapse" type="button" class="btn btn-light bg-white rounded-pill shadow-sm px-4 mb-4"><i class="fa fa-bars mr-2"></i><small class="text-uppercase font-weight-bold">Toggle</small></button>
</div>

  <!-- Demo content -->

<!-- End demo content -->