 <!-- Tambah Modal -->
 <div class="modal fade" id="TambahModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
     <div class="modal-dialog" role="document">
         <div class="modal-content">
             <div class="modal-header">
                 <h5 class="modal-title" id="exampleModalLabel">Tambah Mata Kuliah Baru</h5>
                 <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true">×</span>
                 </button>
             </div>
             <div class="modal-body">
                 <form method="POST" action="<?= BASEURL . '/user/addMatkul' ?>">
                     <div class="form-group row mr-8">
                         <label for="start-date" class="col-sm-5 col-form-label">Nama Mata Kuliah:</label>
                         <div class="col-sm">
                             <input type="text" name="matkul" class="form-control">
                         </div>
                     </div>
                     <div class="form-group row mr-8">
                         <label for="start-date" class="col-sm-5 col-form-label">Semester:</label>
                         <div class="col-sm">
                             <input type="text" name="semester" class="form-control">
                         </div>
                     </div>
                     <div class="form-group row mr-8">
                         <label for="start-date" class="col-sm-5 col-form-label">Jurusan:</label>
                         <div class="col-sm">
                             <input type="text" name="jurusan" class="form-control">
                         </div>
                     </div>
                     <div class="modal-footer">
                         <button class="btn btn-primary" type="submit">Add</button>
                         <button class="btn btn-secondary" type="submit">Cancel</button>
                     </div>
                 </form>
             </div>

         </div>
     </div>
 </div>


 <!-- Content Row -->
 <h1>Mata Kuliah</h1>
 <div class='row'>
     <div class="col-xl-1 mb-4 ml-3">
         <button id="button-tambah" class=" btn btn-primary" href="#" data-toggle="modal" data-target="#TambahModal">Tambah</button>
     </div>
     <div class="col-xl-2 mb-4">
         <a id="button-hapus" class="btn btn-danger" href="#">Hapus Semua</a>
     </div>
 </div>
 <div class="table-responsive col-sm-10">
     <table class="table">
         <tr class="table-primary">
             <th scope="col">Id</th>
             <th scope="col">Nama Mata Kuliah</th>
             <th scope="col">Semester</th>
             <th scope="col">Jurusan</th>
             <th scope="col">Action</th>
         </tr>
         <tr>
             <td>MK001</td>
             <td>SBD</td>
             <td>Semester 2</td>
             <td>Jurusan S1 TI</td>
             <td><a class="btn btn-danger btn-sm" href="">Hapus</a></td>
         </tr>
     </table>
 </div>