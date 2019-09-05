<body class="bg-gradient-primary">

    <div class="container">


        <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
                <div class="col-xm">
                    <div class="p-5">
                        <div class="text-center">
                            <h1 class="h4 text-gray-900 mb-4">Create New Account!</h1>
                        </div>
                        <form class="user" method="POST" action="<?= BASEURL . '/user/register'; ?>">
                            <div class="form-group row">
                                <div class="col-sm">
                                    <input type="text" class="form-control form-control" name="FullName" id="FirstName" required placeholder="Full Name">
                                </div>
                            </div>
                            <div class="form-group">
                                <input type="email" class="form-control form-control" name="Email" id="InputEmail" required placeholder="Email Address">
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                    <input type="password" class="form-control form-control" name="Password" id="InputPassword" required placeholder="Password">
                                </div>
                                <div class="col-sm-6">
                                    <input type="password" class="form-control form-control" name="Password2" id="RepeatPassword" required placeholder="Repeat Password">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="Role">Pilih Role untuk Akun ini</label>
                                <select name="role" id="Role" class="form-control form-control">
                                    <?php
                                    foreach ($data['role'] as $role) : ?>
                                        <option value="<?= $role['id']; ?>"><?= $role['role']; ?></option>
                                    <?php endforeach ?>
                                </select>
                            </div>
                            <button type="submit" class="btn btn-primary btn-user btn-block">
                                Register Account
                            </button>
                            <hr>
                            <div><?= flasher::flash(); ?></div>
                        </form>
                    </div>
                </div>
            </div>
        </div>


    </div>