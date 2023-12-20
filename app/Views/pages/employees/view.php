<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>
<div class="card rounded-0">
    <div class="card-header">
        <div class="d-flex w-100 justify-content-between">
            <div class="col-auto">
                <div class="card-title h4 mb-0 fw-bolder">Employee Details</div>
            </div>
            <div class="col-auto">
                <a href="<?= base_url('Main/employees') ?>" class="btn btn btn-light bg-gradient border rounded-0"><i class="fa fa-angle-left"></i> Back to List</a>
            </div>
        </div>
    </div>
    <div class="card-body">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                    <div class="lh-1">
                        <dl class="d-flex w-100">
                            <dt class="col-auto">Employee Code:</dt>
                            <dd class="col-auto flex-shrink-1 flex-grow-1 px-2"><?= $details['code'] ?></dd>
                        </dl>
                        <dl class="d-flex w-100">
                            <dt class="col-auto">Name:</dt>
                            <dd class="col-auto flex-shrink-1 flex-grow-1 px-2"><?= $details['name'] ?></dd>
                        </dl>
                        <dl class="d-flex w-100">
                            <dt class="col-auto">Gender:</dt>
                            <dd class="col-auto flex-shrink-1 flex-grow-1 px-2"><?= $details['gender'] ?></dd>
                        </dl>
                        <dl class="d-flex w-100">
                            <dt class="col-auto">Birthday:</dt>
                            <dd class="col-auto flex-shrink-1 flex-grow-1 px-2"><?= date("F d, Y", strtotime($details['dob'])) ?></dd>
                        </dl>
                        <dl class="d-flex w-100">
                            <dt class="col-auto">Email:</dt>
                            <dd class="col-auto flex-shrink-1 flex-grow-1 px-2"><?= $details['email'] ?></dd>
                        </dl>
                </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                    <div class="lh-1">
                        <dl class="d-flex w-100">
                            <dt class="col-auto">Department:</dt>
                            <dd class="col-auto flex-shrink-1 flex-grow-1 px-2"><?= $details['department'] ?></dd>
                        </dl>
                        <dl class="d-flex w-100">
                            <dt class="col-auto">Designation:</dt>
                            <dd class="col-auto flex-shrink-1 flex-grow-1 px-2"><?= $details['designation'] ?></dd>
                        </dl>
                        <dl class="d-flex w-100">
                            <dt class="col-auto">Date Hired:</dt>
                            <dd class="col-auto flex-shrink-1 flex-grow-1 px-2"><?= date("F d, Y", strtotime($details['date_hired'])) ?></dd>
                        </dl>
                        <dl class="d-flex w-100">
                            <dt class="col-auto">Salary:</dt>
                            <dd class="col-auto flex-shrink-1 flex-grow-1 px-2"><?= number_format($details['salary'], 2) ?></dd>
                        </dl>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                    <div class="lh-1">
                        <dl class="d-flex w-100">
                            <dt class="col-auto">Added Date/Time:</dt>
                            <dd class="col-auto flex-shrink-1 flex-grow-1 px-2"><?= date("F d, Y h:i A", strtotime($details['created_at'])) ?></dd>
                        </dl>
                        <dl class="d-flex w-100">
                            <dt class="col-auto">Status:</dt>
                            <dd class="col-auto flex-shrink-1 flex-grow-1 px-2"><?= $details['status'] == 1 ? '<span class="badge bg-primary rounded-pill px-3 bg-gradient">Active</span>' : '<span class="badge bg-danger rounded-pill px-3 bg-gradient">Inactive</span>' ?></dd>
                        </dl>
                    </div>
                </div>
            </div>
            <hr>
            <div class="text-center">
                <a href="<?= base_url('Main/employee_edit/'.$details['id']) ?>" class="btn btn-sm rounded-0 btn-primary bg-gradient"><i class="fa fa-edit"></i> Edit</a>
                <a href="<?= base_url('Main/employee_delete/'.$details['id']) ?>" class="btn btn-sm rounded-0 btn-danger bg-gradient" onclick="if(confirm('Are you sure to delete <?= $details['code'] ?> - <?= $details['name'] ?> from list?') !== true) event.preventDefault()"><i class="fa fa-trash"></i> Delete</a>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>