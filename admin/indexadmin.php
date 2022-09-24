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
require_once '../PHP/App/init.php';
require_once '../PHP/Data.php';

if ( !isset($_SESSION["loginadmin"]) ) {
	header("Location: loginadmin.php");
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
  <title>Dashboard Admin</title>
  <!-- Favicon -->
  <link rel="icon" href="../assets/img/brand/favicon.png" type="image/png">
  <!-- Fonts -->
  <link rel="stylesheet" href="../https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700">
  <!-- Icons -->
  <link rel="stylesheet" href="../assets/vendor/nucleo/css/nucleo.css" type="text/css">
  <link rel="stylesheet" href="../assets/vendor/@fortawesome/fontawesome-free/css/all.min.css" type="text/css">
  <!-- Page plugins -->
  <!-- Argon CSS -->
  <link rel="stylesheet" href="../assets/css/argon.css?v=1.2.0" type="text/css">
</head>

<body>
  <!-- Sidenav -->
  <nav class="sidenav navbar navbar-vertical  fixed-left  navbar-expand-xs navbar-light bg-white" id="sidenav-main">
    <div class="scrollbar-inner">
      <!-- Brand -->
      <div class="sidenav-header  align-items-center">
        <a class="navbar-brand text-info" href="indexadmin.php" style="font-weight: bold;">
          <i class="fas fa-book-reader"></i> | Library
        </a>
      </div>
      <div class="navbar-inner">
        <!-- Collapse -->
        <div class="collapse navbar-collapse" id="sidenav-collapse-main">
          <!-- Nav items -->
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link" href="indexadmin.php">
                <i class="ni ni-tv-2 text-primary"></i>
                <span class="nav-link-text">Dashboard</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="tambahbuku.php">
              <i class="fas fa-book"></i>
                <span class="nav-link-text">Tambah Buku</span>
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
                    <span class="mb-0 text-sm  font-weight-bold">Administrator</span>
                  </div>
                </div>
              </a>
              <div class="dropdown-menu  dropdown-menu-right ">
                <div class="dropdown-header noti-title">
                  <h6 class="text-overflow m-0">Welcome!</h6>
                </div>
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
              <h6 class="h2 text-white d-inline-block mb-0">Laman Admin</h6>
              <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                  <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i></a></li>
                  <li class="breadcrumb-item"><a href="#">Dashboards</a></li>
                  <li class="breadcrumb-item active" aria-current="page"></li>
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
              <h3 class="mb-0">Data Buku</h3>
            </div>
            <!-- Light table -->
            <div class="table-responsive">
              <table class="table align-items-center table-flush">
                <thead class="thead-light">
                  <tr>
                    <th scope="col" class="sort" data-sort="name">Judul</th>
                    <th scope="col" class="sort" data-sort="budget">Pengarang</th>
                    <th scope="col" class="sort" data-sort="year">Tahun</th>
                    <th scope="col" class="sort" data-sort="type">Tipe</th>
                    <th scope="col" class="sort" data-sort="status">Status</th>
                  </tr>
                </thead>
                <tbody class="list">
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
                    <?php else: ?>
                    <td>
                      <span class="badge badge-dot mr-4">
                        <i class="bg-danger"></i>
                        <span class="status"><?= $value['status'] ?></span>
                      </span>
                    </td>
                    <?php endif; ?>
                  </tr>
                  <?php endforeach; ?>
                </tbody>
              </table>
            </div>
          </div>
  
          <div class="card">
            <!-- Card header -->
            <div class="card-header border-0 mt-5">
            <h3 class="mb-0">Data Anggota</h3>
            </div>
            <!-- Light Table -->
            <div class="table-responsive">
              <table class="table align-items-center table-flush">
                <thead class="thead-light">
                  <tr>
                    <th scope="col" class="sort" data-sort="name">Nama</th>
                    <th scope="col" class="sort" data-sort="budget">Email</th>
                    <th scope="col" class="sort" data-sort="budget">Action</th>
                  </tr>
                </thead>
                <tbody class="list">
                <?php foreach($koneksi as $value): ?>
                  <tr>
                    <th scope="row">
                      <div class="media align-items-center"> 
                        <div class="media-body">
                          <span class="name mb-0 text-sm"><?= $value['nama'] ?></span>
                        </div>
                      </div>
                    </th>
                    <td class="budget">
                      <?= $value['email'] ?>
                    </td>
                    <td>
                      <a class="btn btn-info" href="indexadmin.php?idAktivity=<?= $value['nama']; ?>">View activity</a>
                    </td>
                  </tr>
                  <?php endforeach; ?>
                </tbody>
              </table>
            </div>
          </div>

          <?php if(isset($_GET['idAktivity'])) :
            $nameAktivity = $_GET['idAktivity'];
            $koneksiActivityAdmin = $mysqli->read("SELECT * FROM activity$nameAktivity");
            
          ?>
          <div class="card">
            <!-- Card header -->
            <div class="card-header border-0 mt-5">
            <h3 class="mb-0">Data aktivitas <?= $nameAktivity ?></h3>
            </div>
            <!-- Light Table -->
            <div class="table-responsive">
              <table class="table align-items-center table-flush">
                <thead class="thead-light">
                  <tr>
                    <th scope="col" class="sort" data-sort="name">Title</th>
                    <th scope="col" class="sort" data-sort="budget">Borrowed</th>
                    <th scope="col" class="sort" data-sort="year">Loan period</th>
                    <th scope="col" class="sort" data-sort="type">Returned</th>
                    <th scope="col" class="sort" data-sort="status">Notes</th>
                    <th scope="col"></th>
                  </tr>
                </thead>
                <tbody class="list">
                <?php foreach($koneksiActivityAdmin as $value): ?>
                  <tr>
                    <th scope="row">
                      <div class="media align-items-center"> 
                        <div class="media-body">
                          <span class="name mb-0 text-sm"><?= $value['title'] ?></span>
                        </div>
                      </div>
                    </th>
                    <td class="budget">
                    <?= $value['borrowed'] ?>
                    </td>
                    <td>
                      <span class="badge badge-dot mr-4">
                      <?= $value['loan_period'] ?>
                      </span>
                    </td>
                    <td>
                      <div class="d-flex align-items-center">
                      <?= $value['returned'] ?>
                      </div>
                    </td>
                    <?php if($value['notes'] === 'on progress'): ?>  
                    <td>
                      <span class="badge badge-dot mr-1">
                        <i class="bg-primary"></i>
                        <span class="status"><?= $value['notes'] ?></span>
                      </span>
                    </td>
                    <?php else: ?>
                    <td>
                      <span class="badge badge-dot mr-1">
                        <i class="bg-success"></i>
                        <span class="status"><?= $value['notes'] ?></span>
                      </span>
                    </td>
                    <?php endif; ?>
                  </tr>
                  <tr>
                  <?php endforeach; ?>
                </tbody>
              </table>
            </div>
          </div>
          <?php endif; ?>
        </div>
      </div>
      <!-- Footer -->
      <footer class="footer pt-0">
        <div class="row align-items-center justify-content-lg-between">
          <div class="col-lg-6">
            <div class="copyright text-center  text-lg-left  text-muted">
              &copy; 2021 <a href="" class="font-weight-bold ml-1" >Squid PBO</a>
            </div>
          </div>
          <div class="col-lg-6">
            <ul class="nav nav-footer justify-content-center justify-content-lg-end">
              <li class="nav-item">
                <a href="aboutadmin.php" class="nav-link">About Us</a>
              </li>
            </ul>
          </div>
        </div>
      </footer>
    </div>
  </div>

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
          <a type="submit" class="btn btn-info"  href="logoutadmin.php">Yes</a>
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Back</button>
        </div>
      </div>
    </div>
  </div>
  <!-- End modal notification -->
  <!-- Argon Scripts -->
  <!-- Core -->
  <script src="../assets/vendor/jquery/dist/jquery.min.js"></script>
  <script src="../assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
  <script src="../assets/vendor/js-cookie/js.cookie.js"></script>
  <script src="../assets/vendor/jquery.scrollbar/jquery.scrollbar.min.js"></script>
  <script src="../assets/vendor/jquery-scroll-lock/dist/jquery-scrollLock.min.js"></script>
  <!-- Optional JS -->
  <script src="../assets/vendor/chart.js/dist/Chart.min.js"></script>
  <script src="../assets/vendor/chart.js/dist/Chart.extension.js"></script>
  <!-- Argon JS -->
  <script src="../assets/js/argon.js?v=1.2.0"></script>
</body>

</html>
