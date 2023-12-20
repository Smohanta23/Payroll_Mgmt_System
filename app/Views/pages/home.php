<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>
<div class="card rounded-0">
    <div class="card-body">
    <h1 class="fw-bold">Welcome!, <?= $session->get('login_name') ?>.....</h1>
    </div>
</div>
<hr>
<div class="row">
    <div class="col-lg-3 col-md-6 col-sm-12 col-xs-12 pb-3">
        <div class="card rounded-0 shadow border-top-0 border-bottom-0 border-end-0 border-start-3 border-success" style="border-left-width: 5px;">
            <div class="card-body">
                <div class="container-fluid py-3">
                    <h5 class="fw-bolder">Departments</h5>
                    <h6 class="fw-bolder text-end"><?= number_format($departments) ?></h6>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-6 col-sm-12 col-xs-12 pb-3">
        <div class="card rounded-0 shadow border-top-0 border-bottom-0 border-end-0 border-start-3 border-danger" style="border-left-width: 5px;">
            <div class="card-body">
                <div class="container-fluid py-3">
                    <h5 class="fw-bolder">Designations</h5>
                    <h6 class="fw-bolder text-end"><?= number_format($designations) ?></h6>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-6 col-sm-12 col-xs-12 pb-3">
        <div class="card rounded-0 shadow border-top-0 border-bottom-0 border-end-0 border-start-3 border-primary" style="border-left-width: 5px;">
            <div class="card-body">
                <div class="container-fluid py-3">
                    <h5 class="fw-bolder">Employees</h5>
                    <h6 class="fw-bolder text-end"><?= number_format($employees) ?></h6>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-6 col-sm-12 col-xs-12 pb-3">
        <div class="card rounded-0 shadow border-top-0 border-bottom-0 border-end-0 border-start-3 border-dark" style="border-left-width: 5px;">
            <div class="card-body">
                <div class="container-fluid py-3">
                    <h5 class="fw-bolder">Payrolls</h5>
                    <h6 class="fw-bolder text-end"><?= number_format($payrolls) ?></h6>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>