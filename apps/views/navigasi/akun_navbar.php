<!-- Start Nav -->
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <?php if ($data['Path'] === 'login') {
            echo ("<li class='breadcrumb-item active' aria-current='page'>Login</li>");
            echo ("<li class='breadcrumb-item active' aria-current='page'><a href=" . BASEURL . '/peserta ' . ">Daftar</a></li>");
        } else {
            echo ("<li class='breadcrumb-item active' aria-current='page'><a href=" . BASEURL . '/akun ' . ">Login</a></li>");
            echo ("<li class='breadcrumb-item active' aria-current='page'>Daftar</li>");
        } ?>
    </ol>
</nav>
<!-- End Nav -->