   <!-- start -->
   <div class="container mt-5">
       <!-- Mencetak Pesan -->
       <div class="row mt-5">
           <div><?= flasher::flash(); ?></div>
       </div>

       <div class=" row ">
           <form action="<?= BASEURL . '/peserta/register' ?>" method="POST">
               <div class="form-row col ">
                   <div class="form-group col-md-12">
                       <label for="inputnama">Nama</label>
                       <input required type="text" name="nama" class="form-control" id="inputnama" placeholder="Nama">
                   </div>
                   <div class="form-group col-md-12">
                       <label for="inputnim">Nim</label>
                       <input required type="text" name="nim" class="form-control" id="inputtext" placeholder="Nim">
                   </div>
               </div>
               <div class="form-row col ">
                   <label for=""> Jenis Kelamin : </label>
                   <div class="custom-control custom-radio custom-control-inline ml-5">
                       <input type="radio" id="customRadioInline1" name="jenis_kelamin" value="Laki-Laki" class="custom-control-input">
                       <label class="custom-control-label" for="customRadioInline1">Laki-Laki</label>
                   </div>
                   <div class="custom-control custom-radio custom-control-inline">
                       <input type="radio" id="customRadioInline2" name="jenis_kelamin" value="Perempuan" class="custom-control-input">
                       <label class="custom-control-label" for="customRadioInline2">Perempuan</label>
                   </div>
               </div>
               <div class="form-row col">
                   <div class="form-group col-md-8">
                       <label for="inputState">Semester</label>
                       <select name="semester" id="inputState" class="form-control">
                           <option selected>Pilih Semester</option>
                           <option>Semester 1</option>
                           <option>Semester 2</option>
                           <option>Semester 3</option>
                           <option>Semester 4</option>
                           <option>Semester 5</option>
                           <option>Semester 6</option>
                           <option>Semester 7</option>
                       </select>
                   </div>
               </div>
               <div class="form-row col">
                   <div class="form-group col-md-8">
                       <label for="inputState">Jurusan</label>
                       <select name="jurusan" id="inputState" class="form-control">
                           <option selected>Pilih Jurusan</option>
                           <option>S1 Ilmu Komputer</option>
                           <option>S1 DKV</option>
                           <option>D3 MI</option>
                           <option>D3 TI</option>
                           <option>D3 SI</option>
                           <option>D3 RPL</option>

                       </select>
                   </div>
               </div>
               <div class="form-row col">
                   <div class="form-group col-md-12">
                       <label for="inputemail">E-mail</label>
                       <input required name="email" type="email" class="form-control" id="inputemail" placeholder="e-Mail">
                   </div>
                   <div class="form-group col-md-12">
                       <label for="inputState">No.Hp/Wa</label>
                       <input required name="kontak" type="text" class="form-control" id="inputemail" placeholder="No.Hp / Wa">
                   </div>

               </div>
               <div class="form-row col">
                   <div class="form-group col-md-6">
                       <label for="inputemail">Mata Kuliah 1</label>
                       <select name="matkul1" id="inputState" class="form-control">
                           <option selected>Mata Kuliah</option>
                           <?php foreach ($data['matkul'] as $matkul) : ?>
                               <option value="<?= $matkul['id'] ?>"><?= $matkul['nama_matkul'] ?></option>
                           <?php endforeach ?>
                       </select>
                   </div>
                   <div class="form-group col-md-6">
                       <label for="inputState">Mata Kuliah 2</label>
                       <select name="matkul2" id="inputState" class="form-control">
                           <option selected>Mata Kuliah</option>
                           <?php foreach ($data['matkul'] as $matkul) : ?>
                               <option value="<?= $matkul['id'] ?>"><?= $matkul['nama_matkul'] ?></option>
                           <?php endforeach ?>
                       </select>
                   </div>
               </div>
               <div class=" col form-group mt-2">
                   <!-- <a class="btn btn-primary text-white " data-toggle="modal" data-target="#checkoutModal" href="">
                        Daftar Dreamatika
                    </a> -->
                   <button class="btn btn-primary text-white " type="submit">Daftar Dreamatika</button>
               </div>
           </form>
           <div class="row ml-5 col " style="margin-top: 20px">
               <img src="<?= BASEPATH . '/asset/img/background/Group 202.png' ?>" alt="" width="500px" height="500px">
           </div>
       </div>
   </div>
   <!-- End -->

   <!-- Start Modal -->
   <div class="modal fade checkout-modal-success" id="checkoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
       <div class="modal-dialog" role="document">
           <div class="modal-content">
               <div class="modal-body text-center">
                   <img src="img/cart/sukses_checkout.png" class="mb-5">
                   <h3>Daftar Berhasil</h3>
                   <p>Anda akan mendapatkan pemberitahuan
                       <br> dalam beberapa hari</p>
                   <a href="login.html" class="btn btn-outline-dark">
                       Back to Login
                   </a>
               </div>
           </div>
       </div>
   </div>
   <!-- End Modal -->