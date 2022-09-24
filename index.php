<!--
=========================================================
* Argon Dashboard - v1.2.0
=========================================================
* Product Page: https://www.creative-tim.com/product/argon-dashboard


* Copyright  Creative Tim (http://www.creative-tim.com)
* Coded by www.creative-tim.com



=========================================================
* The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.
-->
<?php
require_once 'PHP/App/init.php';
require_once 'PHP/Data.php';

if ( !isset($_SESSION["login"]) ) {
	header("Location: login1.php");
	exit;
}

?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="Start your development with a Dashboard for Bootstrap 4.">
  <meta name="author" content="Creative Tim">
  <title>Dashboard Anggota</title>
  <!-- Favicon -->
  <link rel="icon" href="assets/img/brand/favicon.png" type="image/png">
  <!-- Fonts -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700">
  <!-- Icons -->
  <link rel="stylesheet" href="assets/vendor/nucleo/css/nucleo.css" type="text/css">
  <link rel="stylesheet" href="assets/vendor/@fortawesome/fontawesome-free/css/all.min.css" type="text/css">
  <!-- Page plugins -->
  <!-- Argon CSS -->
  <link rel="stylesheet" href="assets/css/argon.css?v=1.2.0" type="text/css">
</head>
</head>

<body>
  <!-- Sidenav -->
  <nav class="sidenav navbar navbar-vertical  fixed-left  navbar-expand-xs navbar-light bg-white" id="sidenav-main">
    <div class="scrollbar-inner">
      <!-- Brand -->
      <div class="sidenav-header  align-items-center">
        <a class="navbar-brand text-info" href="index.php" style="font-weight: bold;">
          <i class="fas fa-book-reader"></i> | Library
        </a>
      </div>
      <div class="navbar-inner">
        <!-- Collapse -->
        <div class="collapse navbar-collapse" id="sidenav-collapse-main">
          <!-- Nav items -->
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link" href="index.php">
                <i class="ni ni-tv-2 text-primary"></i>
                <span class="nav-link-text">Dashboard</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="profile.php">
                <i class="ni ni-single-02 text-yellow"></i>
                <span class="nav-link-text">Profile</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="" data-toggle="modal" data-target="#logoutModal">
                <i class="ni ni-key-25 text-orange"></i>
                <span class="nav-link-text">Logout</span>
              </a>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </nav>
  <!-- Main content -->
  <div class="main-content" id="panel">
    <!-- Topnav -->
    <nav class="navbar navbar-top navbar-expand navbar-dark bg-gradient-info border-bottom">
      <div class="container-fluid">
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav align-items-center  ml-md-auto ">
            <li class="nav-item dropdown">
              <a class="nav-link pr-0" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <div class="media align-items-center">
                  <div class="media-body  ml-2  d-none d-lg-block">
                    <span class="mb-0 text-sm  font-weight-bold"><?= $_SESSION['name'] ?></span>
                  </div>
                </div>
              </a>
              <div class="dropdown-menu  dropdown-menu-right ">
                <div class="dropdown-header noti-title">
                  <h6 class="text-overflow m-0">Welcome!</h6>
                </div>
                <a href="profile.php" class="dropdown-item">
                  <i class="ni ni-single-02"></i>
                  <span>My profile</span>
                </a>
                <div class="dropdown-divider"></div>
                <a href="" class="dropdown-item" data-toggle="modal" data-target="#logoutModal">
                  <i class="ni ni-user-run"></i>
                  <span>Logout</span>
                </a>
              </div>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    <!-- Header -->
    <div class="header bg-gradient-info pb-6">
      <div class="container-fluid">
        <div class="header-body">
          <div class="row align-items-center py-4">
            <div class="col-lg-6 col-7">
              <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                  <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i></a></li>
                  <li class="breadcrumb-item"><a href="#">Dashboards</a></li>
                </ol>
              </nav>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Page content -->
    <div class="container-fluid mt--6">
      <div class="row">
        <div class="col">
          <div class="card">
            <!-- Card header -->
            <div class="card-header border-0">
              <h3 class="mb-0">Book list</h3>
            </div>
            <!-- Light table -->
            <div class="table-responsive">
              <table class="table align-items-center table-flush">
                <thead class="thead-light">
                  <tr>
                    <th scope="col" class="sort" data-sort="name">TItle</th>
                    <th scope="col" class="sort" data-sort="budget">Author</th>
                    <th scope="col" class="sort" data-sort="year">Year</th>
                    <th scope="col" class="sort" data-sort="type">Type</th>
                    <th scope="col" class="sort" data-sort="status">Status</th>
                    <th scope="col" class="sort" data-sort="action">Action</th>
                    <th scope="col"></th>
                  </tr>
                </thead>
                <tbody class="list">
                <?php $count = 0; ?>
                <?php foreach($koneksiBuku as $value): ?>
                  <tr>
                    <th scope="row">
                      <div class="media align-items-center"> 
                        <div class="media-body">
                          <span class="name mb-0 text-sm"><?= $value['judul'] ?></span>
                        </div>
                      </div>
                    </th>
                    <td class="budget">
                      <?= $value['pengarang'] ?>
                    </td>
                    <td>
                      <span class="badge badge-dot mr-4">
                        <?= $value['tahun'] ?>
                      </span>
                    </td>
                    <td>
                      <div class="d-flex align-items-center">
                        <?= $value['tipe'] ?>
                      </div>
                    </td>
                    <?php if($value['status'] === 'ready'): ?>  
                    <td>
                      <span class="badge badge-dot mr-4">
                        <i class="bg-success"></i>
                        <span class="status"><?= $value['status'] ?></span>  
                      </span>
                    </td>
                    <td>
                        <a id="submit" class="btn btn-info" href="" data-toggle="modal" data-target="#exampleModal<?= $count; ?>">Borrow</a>
                    </td>
                    <?php else: ?>
                    <td>
                      <span class="badge badge-dot mr-4">
                        <i class="bg-danger"></i>
                        <span class="status"><?= $value['status'] ?></span>  
                      </span>
                    </td>
                    <td>
                        <a class="btn btn-danger" href="" data-toggle="modal" data-target="#exampleModal">Borrow</a>
                    </td>
                    <?php endif; ?>
                  </tr>

                  <!-- Modal notfication -->
                  <div class="modal fade" id="exampleModal<?= $count; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                      <div class="modal-content">
                        <div class="modal-header bg-info">
                          <i class="fas fa-bell mr-2 text-white"></i>
                          <h5 class="modal-title text-white" id="exampleModalLabel">Notification</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span clsas="text-white" aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body text-center" id="modal_body">Anda akan meminjam buku <?= $value['judul'] ?></div>
                        <div class="modal-footer">
                          <a type="submit" class="btn btn-info"  href="index.php?borrow=<?= $value['id_buku']; ?>">Yes</a>
                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Back</button>
                        </div>
                      </div>
                    </div>
                  </div>
                  <!-- End modal notification -->

                <?php $count++; ?>
                <?php endforeach; ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
      <!-- Footer -->
      <footer class="footer pt-0">
        <div class="row align-items-center justify-content-lg-between">
          <div class="col-lg-6">
            <div class="copyright text-center  text-lg-left  text-muted">
              <?= $date; ?>
            </div>
          </div>
          <div class="col-lg-6">
            <ul class="nav nav-footer justify-content-center justify-content-lg-end">
              <li class="nav-item text-muted">
                <a href="about.php" class="nav-link">About Us</a>
              </li>
            </ul>
          </div>
        </div>
      </footer>
    </div>
  </div>

  <!-- Modal notfication -->
  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header bg-danger">
          <i class="fas fa-bell mr-2 text-white"></i>
          <h5 class="modal-title text-white" id="exampleModalLabel">Notification</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span class="text-white" aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body text-center" id="modal_body">Buku tidak tersedia / sedang dipinjam</div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Back</button>
        </div>
      </div>
    </div>
  </div>
  <!-- End modal notification -->

  <!-- Modal notfication logout -->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header bg-danger">
          <i class="fas fa-bell mr-2 text-white"></i>
          <h5 class="modal-title text-white" id="exampleModalLabel">Notification</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span class="text-white" aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body text-center" id="modal_body">Yakin ingin logout ?</div>
        <div class="modal-footer">
          <a type="submit" class="btn btn-info"  href="logout.php">Yes</a>
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Back</button>
        </div>
      </div>
    </div>
  </div>
  <!-- End modal notification -->

  <!-- Argon Scripts -->
  <!-- Core -->
  <script src="assets/vendor/jquery/dist/jquery.min.js"></script>
  <script src="assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/js-cookie/js.cookie.js"></script>
  <script src="assets/vendor/jquery.scrollbar/jquery.scrollbar.min.js"></script>
  <script src="assets/vendor/jquery-scroll-lock/dist/jquery-scrollLock.min.js"></script>
  <!-- Optional JS -->
  <script src="assets/vendor/chart.js/dist/Chart.min.js"></script>
  <script src="assets/vendor/chart.js/dist/Chart.extension.js"></script>
  <!-- Argon JS -->
  <script src="assets/js/argon.js?v=1.2.0"></script>
</body>

</html>
