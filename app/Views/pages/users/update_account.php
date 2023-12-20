<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>
<div class="card rounded-0">
    <div class="card-header">
        <div class="col-auto">
            <div class="card-title h4 mb-0 fw-bolder">Update Account Details</div>
        </div>
    </div>
    <div class="card-body">
        <div class="container-fluid">
            <form action="<?= base_url('update_user') ?>" method="POST">
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
                        <input type="text" class="form-control rounded-0" id="name" name="name" autofocus placeholder="John Smith" value="<?= !empty($user['name']) ? $user['name'] : '' ?>" required="required">
                        <div class="input-group-text bg-light bg-gradient rounded-0"><i class="fa fa-user"></i></div>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="email" class="control-label">Email</label>
                    <div class="input-group rounded-0">
                        <input type="email" class="form-control rounded-0" id="email" name="email" placeholder="jsmith@mail.com" value="<?= !empty($user['email']) ? $user['email'] : '' ?>" required="required">
                        <div class="input-group-text bg-light bg-gradient rounded-0"><i class="fa fa-at"></i></div>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="password" class="control-label">New Password</label>
                    <div class="input-group rounded-0">
                        <input type="password" class="form-control rounded-0" id="password" name="password" placeholder="**********">
                        <div class="input-group-text bg-light bg-gradient rounded-0"><i class="fa fa-key"></i></div>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="password" class="control-label">Confirm New Password</label>
                    <div class="input-group rounded-0">
                        <input type="password" class="form-control rounded-0" id="cpassword" name="cpassword" placeholder="**********">
                        <div class="input-group-text bg-light bg-gradient rounded-0"><i class="fa fa-key"></i></div>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="password" class="control-label">Current Password</label>
                    <div class="input-group rounded-0">
                        <input type="password" class="form-control rounded-0" id="current_password" name="current_password" placeholder="**********" required>
                        <div class="input-group-text bg-light bg-gradient rounded-0"><i class="fa fa-key"></i></div>
                    </div>
                </div>
                <div class="d-grid gap-1">
                    <button class="btn rounded-0 btn-primary bg-gradient">Update</button>
                </div>
            </form>
        </div>
    </div>
</div>
<?= $this->endSection() ?>