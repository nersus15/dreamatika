<?php
if ($data['isRead']) : ?>
    <div class="col-sm-5"><?= flasher::flash(); ?></div>
    <div class="card" style="width: 20rem;">
        <img src="<?= BASEURL . '/asset/img/profile/' . $_SESSION['user_data']['image'] ?>" class="card-img-top" alt="...">
        <div class="card-body">
            <h5 class="card-title"><?= $_SESSION['user_data']['nama']; ?></h5>
            <p class="card-text">id: <?= $_SESSION['user_data']['id']; ?></p>
            <p class="card-text">email: <?= $_SESSION['user_data']['email']; ?></p>
            <p class="card-text">role: <?= $_SESSION['user_data']['role_id']; ?></p>
            <p class="card-text">Password: <?= $_SESSION['user_data']['password']; ?></p>
            <a href="<?= BASEURL . '/user/editprofile'; ?>" class="btn btn-primary">edit profile</a>
        </div>
    </div>
<?php else : ?>
    <div class="col-sm-5"><?= flasher::flash(); ?></div>
    <form class="col-sm-5" action="<?= BASEURL . '/user/applychange' ?>" enctype="multipart/form-data" method="POST">
        <label for="email">Email</label>
        <input class="form-control form-control-user" type="email" name="email" id="email" value="<?= $_SESSION['user_data']['email']; ?>">
        <br>
        <label for="username">Username</label>
        <input class="form-control form-control-user" type="text" name="username" id="username" value="<?= $_SESSION['user_data']['nama']; ?>">
        <br>
        <label for="password">Password</label>
        <input class="form-control form-control-user" type="text" value="<?= $_SESSION['user_data']['password'] ?>" name="password" id="password">
        <br>
        <label for="password">Confirm Password</label>
        <input class="form-control form-control-user" type="text" value="<?= $_SESSION['user_data']['password'] ?>" name="password2" id="password">
        <img style="margin-top:20px;width:100px; height:auto" src="<?= BASEURL . '/asset/img/profile/' . $_SESSION['user_data']['image'] ?>" class="card-img-top" alt="...">
        <br>
        <label for="image">Upload foto profile</label>
        <input type="file" name="image" id=" image ">
        <p>Max: 2.5 MB</p>
        <button class=" btn btn-primary btn-user  btn-block" type="submit">Save Change</button>
    </form>
<?php endif ?>