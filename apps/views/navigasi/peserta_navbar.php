 <!-- Start navbar -->
 <nav class="navbar navbar-expand-lg navbar-dark fixed-top">
     <div class="container">
         <a class="navbar-brand " style="margin-right: 100px" href="#">
             <img src="img/logo/u.png" alt="" width="40" height="40">
         </a>
         <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
             <span class="navbar-toggler-icon"></span>
         </button>
         <div class="collapse navbar-collapse" id="navbarNav">
             <ul class="navbar-nav text-uppercase">
                 <li class="nav-item active">
                     <a class="nav-link" href="#">Home</a>
                 </li>
                 <li class="nav-item">
                     <a class="nav-link" href="#instruktur">Instruktor</a>
                 </li>
                 <li class="nav-item">
                     <a class="nav-link" href="#">Overview</a>
                 </li>
                 <li class="nav-item">
                     <a class="nav-link " href="#">Benefit</a>
                 </li>
                 <li class="nav-item">
                     <a class="nav-link " href="#">Testimonials</a>
                 </li>
                 <li class="nav-item">
                     <a class="nav-link " href="#">Galery</a>
                 </li>
                 <!-- <button type="button" class="btn btn-outline-light" data-toggle="modal" data-target="#daftar">Ubah
                     Mata Kuliah</button> -->

             </ul>
             <ul class="navbar-nav ml-auto">
                 <div class="topbar-divider d-none d-sm-block"></div>

                 <!-- Nav Item - User Information -->
                 <li class="nav-item dropdown no-arrow">
                     <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                         <?php if (isset($data['akun'])) : ?>
                             <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?= $data['akun']['nama']; ?></span>
                             <img style="width:15%" class="img-profile rounded-circle" src="<?= BASEPATH . '/asset/img/profile/' . $data['akun']['image'] ?>">
                         <?php else : ?>
                             <span class="mr-2 d-none d-lg-inline text-gray-600 small"></span>
                             <img style="width:15%" class="img-profile rounded-circle" src="<?= BASEPATH . '/asset/img/profile/default.jpg' ?>">
                         <?php endif ?>
                     </a>
                     <!-- Dropdown - User Information -->
                     <?php if (isset($data['akun'])) : ?>
                         <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                             <a class="dropdown-item" href="<?= BASEURL . '/user/profile' ?>">
                                 <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                 Profile
                             </a>
                             <a class="dropdown-item" href="">
                                 <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                                 Activity Log
                             </a>
                             <div class="dropdown-divider"></div>
                             <a class="dropdown-item" data-toggle="modal" data-target="#logoutModal" href="#">
                                 <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                 Logout
                             </a>
                         </div>
                     <?php else : ?>
                         <div class="dropdown-menu dropdown-menu shadow animated--grow-in" aria-labelledby="userDropdown">
                             <a class="dropdown-item" href="<?= BASEURL . '/akun' ?>">
                                 <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                 Login
                             </a>

                         </div>
                     <?php endif ?>
                 </li>
             </ul>
         </div>
     </div>
 </nav>
 <!-- end Navbar -->