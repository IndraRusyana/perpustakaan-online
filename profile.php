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
require_once 'php/App/init.php';
require_once 'php/Data.php';

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
  <title>Profil Anggota</title>
  <!-- Favicon -->
  <link rel="icon" href="assets/img/brand/favicon.png" type="image/png">
  <!-- Fonts -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700">
  <!-- Icons -->
  <link rel="stylesheet" href="assets/vendor/nucleo/css/nucleo.css" type="text/css">
  <link rel="stylesheet" href="assets/vendor/@fortawesome/fontawesome-free/css/all.min.css" type="text/css">
  <!-- Argon CSS -->
  <link rel="stylesheet" href="assets/css/argon.css?v=1.2.0" type="text/css">
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
                    <span class="mb-0 text-sm  font-weight-bold"><?= $_SESSION['name']; ?></span>
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
    <div class="header pb-6 d-flex align-items-center" >
      <!-- Mask -->
      <span class="mask bg-gradient-info"></span>
      <!-- Header container -->
      <div class="container-fluid d-flex align-items-center">
        <div class="row">
          <div class="col-lg-7 col-md-10">
            <h1 class="display-2 text-white">Hello <?= $_SESSION['name'] ?></h1>
            <p class="text-white mt-0 mb-5">Selamat datang di laman Profil. Disini anda bisa melihat peminjaman buku yang anda lakukan, serta silakan konfirmasi untuk buku yang telah dikembalikan dengan mengklik tombol "return" dibawah.</p>
          </div>
        </div>
      </div>
    </div>
    <!-- Page content -->
    <div class="container-fluid mt--6">
      <div class="row">
        <div class="col-lg-10 mx-auto">
          <div class="card card-profile">
            <img src="assets/img/theme/img-1-1000x600.jpg" alt="Image placeholder" class="card-img-top">
            <div class="row justify-content-center">
              <div class="col-lg-3 order-lg-2">
                <div class="card-profile-image">
                  <a href="#">
                    <img src="assets/img/theme/user0001.jpg" class="rounded-circle">
                  </a>
                </div>
              </div>
            </div>
            <div class="mt-6 card-body pt-0">
              
              <div class="text-center">
                <h5 class="h3">
                  <?= $_SESSION['name']; ?>
                </h5>
                <div class="h5 font-weight-300">
                  <i class="ni location_pin mr-2"></i><?= $_SESSION['email']; ?>
                </div>
                <div class="card-header border-0">
                  <h3 class="mb-0">Activity</h3>
                </div>
                <!-- table activity -->
                <div class="table-responsive">
                  <table class="table align-items-center table-flush">
                    <thead class="thead-light">
                      <tr>
                        <th scope="col" class="sort" data-sort="name">TItle</th>
                        <th scope="col" class="sort" data-sort="budget">Borrowed</th>
                        <th scope="col" class="sort" data-sort="year">Loan period</th>
                        <th scope="col" class="sort" data-sort="completion">returned</th>
                        <th scope="col" class="sort" data-sort="action">notes</th>
                        <th scope="col" class="sort" data-sort="action">action</th>
                      </tr>
                    </thead>
                    <tbody class="list">
                    <?php $count = 0; ?>
                    <?php foreach($koneksiActivity['$nameTable'] as $value): ?>
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
                        <td>
                          <a class="btn btn-default" href="profile.php?return=<?= $value['title']; ?>" data-toggle="modal" data-target="#exampleModal<?= $count; ?>">Return</a>
                        </td>
                        <?php else: ?>
                        <td>
                          <span class="badge badge-dot mr-1">
                            <i class="bg-success"></i>
                            <span class="status"><?= $value['notes'] ?></span>
                          </span>
                        </td>
                        <td>
                          <a class="btn btn-success" href="" data-toggle="modal" data-target="#exampleModal">Returned</a>
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
                                <span class="text-white" aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <div class="modal-body" id="modal_body">Anda akan mengembalikan buku <?= $value['title'] ?></div>
                            <div class="modal-footer">
                              <a type="submit" class="btn btn-info"  href="profile.php?return=<?= $value['title']; ?>">Yes</a>
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
              <li class="nav-item">
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
        <div class="modal-header bg-info">
          <i class="fas fa-bell mr-2 text-white"></i>
          <h5 class="modal-title text-white" id="exampleModalLabel">Notification</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span class="text-white" aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body text-center" id="modal_body">Buku sudah dikembalikan</div>
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
  <!-- Argon JS -->
  <script src="assets/js/argon.js?v=1.2.0"></script>
</body>

</html>