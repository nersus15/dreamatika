<script src="<?= BASEPATH . '/asset/vendor/jquery/jquery.js' ?>"></script>
<script src="<?= BASEPATH . '/asset/vendor/jquery-easing/jquery.easing.js' ?>"></script>
<script src="<?= BASEPATH . '/asset/vendor/bootstrap/js/bootstrap.js' ?>"></script>
<script src="<?= BASEPATH . '/asset/vendor/fontawesome/js/all.js' ?>"></script>
<script src="<?= BASEPATH . '/asset/js/popper.min.js' ?>"></script>
<script src="<?= BASEPATH . '/asset/js/sb-admin-2.js' ?>"></script>
<script src="<?= BASEPATH . '/asset/js/script.js' ?>"></script>

<?php if (isset($data['jadwal'])) : ?>
    <script>
        <?= $data['script']; ?>
        <?= $data['script2']; ?>
    </script>
    <script>
        var date = document.getElementById('start-date');
        var day = document.getElementById('day/gelombang');
        var jeda = document.getElementById('jeda');
        date.value = "<?= date('d/m/Y', strtotime($data['jadwal']['jadwal']['start_date'])); ?>";
        day.placeholder = "<?= $data['rule'][0]['value']; ?> ";
        jeda.placeholder = "<?= $data['rule'][1]['value']; ?> ";
    </script>

<?php endif ?>
</body>

</html>