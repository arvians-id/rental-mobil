<section id="wrapper">
    <div class="login-register">
        <div class="login-box card shadow-sm">
            <div class="card-body">
                <form method="post">
                    <h3 class="box-title m-b-20">Buat Akun</h3>
                    <div class="form-group">
                        <label>Username</label>
                        <div class="col-xs-12">
                            <input class="form-control <?= form_error('username') ? 'border-danger' : '' ?>" name="username" value="<?= set_value('username') ?>" type="text">
                            <small class="text-danger"><?= form_error('username') ?></small>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Password</label>
                        <div class="input-group">
                            <input class="form-control <?= form_error('password') ? 'border-danger' : '' ?>" name="password" type="password">
                            <div class="input-group-append">
                                <a type="button" id="showPassword" class="input-group-text bg-transparent"><i class="fas fa-eye-slash"></i></a>
                            </div>
                        </div>
                        <small class="text-danger"><?= form_error('password') ?></small>
                    </div>
                    <div class="form-group">
                        <label>Ulangi Password</label>
                        <div class="input-group">
                            <input class="form-control <?= form_error('rpassword') ? 'border-danger' : '' ?>" name="rpassword" type="password">
                            <div class="input-group-append">
                                <a type="button" id="showRepeatPassword" class="input-group-text bg-transparent"><i class="fas fa-eye-slash"></i></a>
                            </div>
                        </div>
                        <small class="text-danger"><?= form_error('rpassword') ?></small>
                    </div>
                    <div class="form-group text-center">
                        <div class="col-xs-12 p-b-20">
                            <button class="btn btn-block btn-md btn-info" type="submit">Buat Akun</button>
                        </div>
                    </div>
                    <div class="form-group text-center">
                        <div class="col-xs-12 text-center">
                            Sudah punya akun? <a href="<?= base_url('auth') ?>" class="text-info m-l-5"><b>Login</b></a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
<script src="/template/adminwrap/assets/node_modules/jquery/jquery.min.js"></script>
<script>
    const idShowPassword = document.querySelector('#showPassword');
    const idShowRPassword = document.querySelector('#showRepeatPassword');
    const inputPassword = document.querySelector('[name="password"]');
    const inputRPassword = document.querySelector('[name="rpassword"]');

    // Show Hide Password
    const resetPassword = () => {
        inputPassword.setAttribute('type', 'password');
        idShowPassword.innerHTML = '<i class="fas fa-eye-slash"></i>';
        inputRPassword.setAttribute('type', 'password');
        idShowRPassword.innerHTML = '<i class="fas fa-eye-slash"></i>';
    }
    const showPassword = (show, idPassword) => {
        if (idPassword.getAttribute('type') == 'password') {
            idPassword.setAttribute('type', 'text');
            show.innerHTML = '<i class="fas fa-eye"></i>';
        } else {
            idPassword.setAttribute('type', 'password');
            show.innerHTML = '<i class="fas fa-eye-slash"></i>';
        }
    }
    idShowPassword.addEventListener('click', function() {
        showPassword(this, inputPassword);
    })
    idShowRPassword.addEventListener('click', function() {
        showPassword(this, inputRPassword);
    })
</script>