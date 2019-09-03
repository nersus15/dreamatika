<h4 style="margin-left:1%">Filter:</h4 style="margin-left:1%">
<div style="display:flex; padding:0 1rem">
    <!-- Filter By User -->
    <?php if ($_SESSION['user_data']['role_id'] == 1) : ?>
        <div style="margin:0 1rem" class="form-group-sm">
            <label style="margin-left: 3%" for="user">Username:</label>
            <select class="form-control" onchange="filterLog()" name="id" id="user">
                <option value='semua' selected>Semua</option>
                <option value='<?= $_SESSION['user_data']['id']; ?>'><?= $_SESSION['user_data']['nama']; ?></option>
                <?php
                    $this->DB = new database;
                    $query = "SELECT id, email, nama from user where role_id != 1";
                    $this->DB->query($query);
                    $this->DB->execute();
                    $usernames = $this->DB->resultSet();
                    foreach ($usernames as $username) : ?>
                    <option id="username" value="<?= $username['id']; ?>"><?= $username['nama']; ?></option>
                <?php endforeach ?>
            </select>
        </div>
    <?php else : ?>
        <div style="margin:0 1rem" class="form-group-sm">
            <label style="margin-left: 3%" for="user">Username:</label>
            <select disabled class="form-control" onchange="filterLog()" name="id" id="user">
                <option value='<?= $_SESSION['user_data']['id']; ?>' selected><?= $_SESSION['user_data']['nama']; ?></option>
            </select>
        </div>
    <?php endif ?>
    <!-- ... -->

    <!-- Filter By Tanggal -->
    <div style="margin:0 1rem" class="form-group-sm">
        <label for="tgl">Tanggal:</label>
        <input onchange="filterLog()" id="tgl" class="datepicker form-control" type="date">
    </div>
    <!-- ... -->
</div>

<!-- Menampilkan Daftar Log -->
<div id="log">
    <table style="margin-left: 3%;" class="table-hover table-default" cellpadding="5" cellspacing="0">
        <tr class="bg-light  text-center">
            <th>Tanggal</th>
            <th>Waktu</th>
            <th>Aksi</th>
            <th>Username</th>
        </tr>
        <?php

        foreach ($data['log'] as $log) : ?>
            <tr>
                <td><?= $log['tgl']; ?></td>
                <td><?= date('h:i:s', $log['time']); ?></td>
                <td><?= $log['aksi']; ?></td>
                <td><?= $log['user']; ?></td>
            </tr>
        <?php endforeach ?>
    </table>
</div>
</div>

<!-- Script JavaScript untuk filter log -->
<script>
    function filterLog() {
        var container = document.getElementById('log');
        var userId = document.getElementById('user');
        var tgl = document.getElementById('tgl');
        if (tgl.value == '') {
            tgl = "semua";
        } else {
            tgl = tgl.value;

        }
        userId = userId.value;
        var ajax = new XMLHttpRequest();
        ajax.onreadystatechange = function() {
            if (ajax.readyState == 4 && ajax.status == 200) {
                container.innerHTML = ajax.responseText;
            }
        }
        ajax.open('GET', '<?= BASEURL . ' / user / filterLog / ' ?>' + userId + '/' + tgl, true);
        ajax.send();
    }
</script>