<?php if (isset($data['jadwal'])) : ?>
    <br><br>
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Reset Modal -->
        <div class="modal fade" id="HapusModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Reset Jadwal Pendaftaran ?</h5>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">Pilih tombol "Hapus" Untuk me Reset Jadwal Pendaftaran yang sudah disetting</div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                        <a class="btn btn-danger on" href="<?= BASEURL . '/admin/deletejadwal' ?>">Reset</a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Content Row -->
        <div class="row">
            <div class="col-xl-1 col-md-6 mb-4">
                <button name='on' id="button" class="on btn btn-primary" href="#" data-toggle="modal" data-target="#HapusModal"> Reset</button>
            </div>
            <hr>
        </div>
        <form action="<?= BASEURL . '/user/setJadwal' ?>" method="POST">
            <div class="form-group row">
                <label for="start-date" class="col-sm-2 col-form-label">Start Day:</label>
                <div class="col-xsm">
                    <input disabled type="date" name="start_day" class="form-control datepicker a" id="start-date" value="<?= date('d/m/Y', strtotime($data['jadwal']['jadwal']['start_date'])); ?>">
                </div>
            </div>
            <div class="form-group row">
                <label for="day/gelombang" class="col-sm-2 col-form-label">Day/ Gelombang: </label>
                <div class="col-xsm">
                    <input disabled type="number" min="1" name="day_in_gelombang" class="form-control a" id="day/gelombang" placeholder="<?= $data['rule'][0]['value']; ?> ">
                </div>
            </div>
            <div class="form-group row">
                <label for="jeda" class="col-sm-2 col-form-label">Jeda/ Gelombang: </label>
                <div class="col-xsm">
                    <input disabled type="number" min="1" name="jeda" class="form-control a" id="jeda" placeholder="<?= $data['rule'][1]['value']; ?> ">
                </div>
            </div>

            <div style="float:left" class="form-group row">
                <div class="col-sm-10">
                    <button disabled type="button" id="cancel" onclick="clearText()" class="a btn btn-danger cancel">Cancel</button>
                </div>
            </div>
            <div class="form-group row">
                <div class="col-sm-10">
                    <button disabled type="submit" class="btn btn-primary a">Set</button>
                </div>
            </div>
            <div class="col-lg-6">
                <?php flasher::flash(); ?>
            </div>
        </form>
        <hr>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
<?php else : ?>
    <br><br>
    <!-- Begin Page Content -->
    <div class="container-fluid">
        <!-- Content Row -->
        <div class="row">
            <div class="col-xl-1 col-md-6 mb-4">
                <button name='on' id="button" disabled class="on btn btn-primary" href="#" data-toggle="modal" data-target="#HapusModal"> Reset</button>
            </div>
            <hr>
        </div>
        <form action="<?= BASEURL . '/user/setJadwal' ?>" method="POST">
            <div class="form-group row">
                <label for="start-date" class="col-sm-2 col-form-label">Start Day:</label>
                <div class="col-xsm">
                    <input type="date" name="start_day" class="form-control datepicker a" id="start-date" placeholder="example: <?= date('d-m-Y', time()); ?>">
                </div>
            </div>
            <div class="form-group row">
                <label for="day/gelombang" class="col-sm-2 col-form-label">Day/ Gelombang: </label>
                <div class="col-xsm">
                    <input type="number" min="1" name="day_in_gelombang" class="form-control a" id="day/gelombang" placeholder="example: 7">
                </div>
            </div>
            <div class="form-group row">
                <label for="jeda" class="col-sm-2 col-form-label">Jeda/ Gelombang: </label>
                <div class="col-xsm">
                    <input type="number" min="1" name="jeda" class="form-control a" id="jeda" placeholder="example: 1">

                </div>
            </div>

            <div style="float:left" class="form-group row">
                <div class="col-sm-10">
                    <button type="button" id="cancel" onclick="clearText()" class="a btn btn-danger cancel">Cancel</button>
                </div>
            </div>
            <div class="form-group row">
                <div class="col-sm-10">
                    <button type="submit" class="btn btn-primary a">Set</button>
                </div>
            </div>
            <div class="col-lg-6">
                <?php flasher::flash(); ?>
            </div>
        </form>
        <hr>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
<?php endif ?>