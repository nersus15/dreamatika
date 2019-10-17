<section class=" bg-light" style="margin-top:70px">
    <div class="container">
        <div class="row ">
            <div class="dreamatika-text col-md-6 mt-5">
                <h6>DREAMATIKA BIMBELNYA <br>
                    ANAK INFORMATIKA <br>
                    DALAM 1 SEMESTE</h6>
                <small>Kelas bimbel lengkap mulai dari research sampai bisa ngoding
                    dan memiliki <br> materi-materi yang ada di kampus , mempermudah
                    mahasiswa untuk menaikan <br> nilai akadamik maupun non akademik</small>
            </div>
            <div class="dreamatika-text col-md-6">
                <img src="<?= BASEPATH . '/asset/img/background/Mask Group 26.png' ?>" alt="">
            </div>
        </div>
        <div>
            <a href="">
                <img src="<?= BASEPATH . '/asset/img/background/Group 112.png" al' ?>t=""><br><br>
            </a>
        </div>
    </div>
</section>

<!-- end -->

<!-- start -->
<div class=" container-fluid " style=" margin-top: 70px" id="instruktur">
                <div class="row">
                    <div class="col-md-5 ml-5">
                        <img src="<?= BASEPATH . '/asset/img/background/Mask Group 39.png' ?>" alt="">
                    </div>
                    <div class="col">
                        <h4 style="margin-top: 15px">INSTRUKTUR BIMBEL</h4>
                        <small>Ini adalah instruktur yang akan menemani kalian belajar
                            di bimbel ini.</small>

                        <div class="row mt-4">
                            <div class="row">
                                <div class="col">
                                    <img src="img/designer/1.png" alt="">
                                    <p class="ml-3">Hendri Jayadi</p>
                                </div>
                                <div class="col">
                                    <img src="img/designer/1.png" alt="">
                                    <p class="ml-3">Fathurrahman</>
                                </div>
                                <div class="col">
                                    <img src="img/designer/1.png" alt="">
                                    <p class="ml-4">Rudy Tabuti</p>
                                </div>
                                <div class="col">
                                    <img src="img/designer/1.png" alt="">
                                    <p class="ml-4">Rudy Tabuti</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        </div>
        <!-- end -->

        <!-- Ubah mata kuliahStart -->
        <div class="modal fade" id="daftar" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">Ubah Mata Kuliah</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form class="form-signin" role="form" method="POST" action="?tampil=registrasi_proses">
                            <div class="text-center mb-4">
                                <p class="mb-3 font-weight-normal">Batas Pengubahan Mata Kuliah Sampai Tanggal 19 juni 2020
                                </p>
                            </div>


                            <div class="form-group">
                                <label for="inputemail">Mata Kuliah 1</label>
                                <select id="inputState" class="form-control">
                                    <option selected>Mata Kuliah</option>
                                    <option>Java</option>
                                    <option>Jaringan Lanjut</option>
                                    <option>Sistem Basis Data</option>
                                    <option>Pemrograman Web Dasar</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="inputState">Mata Kuliah 2</label>
                                <select id="inputState" class="form-control">
                                    <option selected>Mata Kuliah</option>
                                    <option>Java</option>
                                    <option>Jaringan Lanjut</option>
                                    <option>Sistem Basis Data</option>
                                    <option>Pemrograman Web Dasar</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="inputState">Masukan Nim</label>
                                <input type="password" class="form-control" style="width: 250px" id="inlineFormInputGroup" placeholder=" Nim">
                            </div>

                            <button type="submit" name="submit" class="btn btn-md btn-primary btn-block mt-2">
                                Ubah Mata Kuliah
                            </button>
                            <p class="mt-5 mb-3 text-muted text-center">&copy; <small>Dreamatika Dev</small>
                                <script>
                                    document.write(new Date().getFullYear());
                                </script>
                            </p>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- Ubah mata kuliah end -->