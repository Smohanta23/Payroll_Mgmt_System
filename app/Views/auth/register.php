<?= $this->extend('layouts/login_base') ?>

<?= $this->section('content') ?>
<div class="col-lg-6 col-md-8 col-sm-10 col-xs-12">
    <div class="card rounded-0">
        <div class="card-header">
            <div class="card-title h4 mb-0 text-center">Create New Account</div>
        </div>
        <div class="card-body">
            <div class="container-fluid">
                <form action="<?= base_url('register') ?>" method="POST">
                    <?php if($session->getFlashdata('error')): ?>
                        <div class="alert alert-danger rounded-0">
                            <?= $session->getFlashdata('error') ?>
                        </div>
                    <?php endif; ?>
                    <?php if($session->getFlashdata('success')): ?>
                        <div class="alert alert-success rounded-0">
                            <?= $session->getFlashdata('success') ?>
                        </div>
                    <?php endif; ?>
                    <div class="mb-3">
                        <label for="email" class="control-label">Name</label>
                        <div class="input-group rounded-0">
                            <input type="text" class="form-control rounded-0" id="name" name="name" autofocus placeholder="John Smith" value="<?= !empty($data->getPost('name')) ? $data->getPost('name') : '' ?>" required="required">
                            <div class="input-group-text bg-light bg-gradient rounded-0"><i class="fa fa-user"></i></div>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="control-label">Email</label>
                        <div class="input-group rounded-0">
                            <input type="email" class="form-control rounded-0" id="email" name="email" placeholder="jsmith@mail.com" value="<?= !empty($data->getPost('email')) ? $data->getPost('email') : '' ?>" required="required">
                            <div class="input-group-text bg-light bg-gradient rounded-0"><i class="fa fa-at"></i></div>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="control-label">Password</label>
                        <div class="input-group rounded-0">
                            <input type="password" class="form-control rounded-0" id="password" name="password" placeholder="**********" required="required">
                            <div class="input-group-text bg-light bg-gradient rounded-0"><i class="fa fa-key"></i></div>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="control-label">Confirm Password</label>
                        <div class="input-group rounded-0">
                            <input type="password" class="form-control rounded-0" id="cpassword" name="cpassword" placeholder="**********" required="required">
                            <div class="input-group-text bg-light bg-gradient rounded-0"><i class="fa fa-key"></i></div>
                        </div>
                    </div>
                    <div class="d-grid gap-1">
                        <button class="btn rounded-0 btn-primary bg-gradient">Register</button>
                    </div>
                    <div class="mb-3">
                        <div class="text-center">
                            <a href="<?= base_url('/') ?>" class="text-decoration-none fw-bold">Already have an Account?</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>