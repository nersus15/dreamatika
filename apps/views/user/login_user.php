<!-- Start -->
<div class=" d-flex justify-content-center">
    <h6>Gelombang 1 Telah Berakhir</h6>
</div>
<div class="  d-flex justify-content-center">
    <h6>Hitung Mundur Berakhirnya Gelombang 2 --> 12:30:9</h6>
</div>
<!-- End -->

<!-- Start -->
<div class="container mx-auto " style="margin-top: 100px">
    <div class="row align-items-center justify-content-center h-100 align-content-center">
        <div class="col w-320px">
            <img src="<?= BASEURL . '/asset/logo/dreamatika_ellipse.png' ?>" alt="" width="60px" height="60px">
            <h1 class="h3 font-weight-bold merriweather mt-3 p-1 signin">Sign In</h1>
            <form action="<?= BASEURL . '/akun/login' ?>" method="POST">
                <div class="row mt-4">
                    <div class="col-auto ">
                        <div class="input-group mb-2">
                            <div class="input-group-prepend">
                                <div class="input-group-text"> <i class="fas fa-user"></i></div>
                            </div>
                            <input type="email" name='email' class="form-control" style="width: 250px" id="inlineFormInputGroup" placeholder="Email">
                        </div>
                    </div>
                </div>
                <div class="row mt-2">
                    <div class="col-auto ">
                        <div class="input-group mb-2">
                            <div class="input-group-prepend">
                                <div class="input-group-text"> <i class="fas fa-unlock-alt"></i></div>
                            </div>
                            <input type="password" name='password' class="form-control" style="width: 250px" id="inlineFormInputGroup" placeholder="Password / Nim">
                        </div>
                    </div>
                </div>
                <div class="row mt-5">
                    <div><?= flasher::flash(); ?></div>
                    <div class="col">
                        <button type="submit" class="btn btn-primary btn-block active text-white" style="width: 285px">Login Akun Saya
                        </button>
                    </div>
                </div>


            </form>
        </div>
    </div>
    <!-- End -->