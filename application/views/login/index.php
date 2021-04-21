<section id="wrapper">
    <div class="login-register">
        <div class="login-box card shadow-sm">
            <div class="card-body">
                <form method="post">
                    <h3 class="box-title m-b-20">Masuk</h3>
                    <?php if ($this->session->flashdata('success')) : ?>
                        <div class="alert alert-success mt-2" role="alert">
                            <?= $this->session->flashdata('success'); ?>
                        </div>
                    <?php elseif ($this->session->flashdata('error')) : ?>
                        <div class="alert alert-danger mt-2" role="alert">
                            <?= $this->session->flashdata('error'); ?>
                        </div>
                    <?php endif; ?>
                    <div class="form-group">
                        <label>Username</label>
                        <div class="col-xs-12">
                            <input class="form-control <?= form_error('username') ? 'border-danger' : '' ?>" value="<?= set_value('username') ?>" name="username" type="text">
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
                    <div class="form-group text-center">
                        <div class="col-xs-12 p-b-20">
                            <button class="btn btn-block btn-md btn-info" type="submit">Masuk</button>
                        </div>
                    </div>
                    <div class="form-group text-center">
                        <div class="col-xs-12 text-center">
                            Belum punya akun? <a href="<?= base_url('auth/registrasi') ?>" class="text-info m-l-5"><b>Registrasi</b></a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
<script src="<?= base_url() ?>assets/template/adminwrap/assets/node_modules/jquery/jquery.min.js"></script>
<script>
    const inputPassword = document.querySelector('[name="password"]');
    // Show Hide Password
    const resetPassword = () => {
        inputPassword.setAttribute('type', 'password');
        document.querySelector('#showPassword').innerHTML = '<i class="fas fa-eye-slash"></i>';
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
    document.querySelector('#showPassword').addEventListener('click', function() {
        showPassword(this, inputPassword);
    })
</script>