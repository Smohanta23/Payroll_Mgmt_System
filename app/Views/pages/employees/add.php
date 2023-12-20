<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>
<div class="card rounded-0">
    <div class="card-header">
        <div class="d-flex w-100 justify-content-between">
            <div class="col-auto">
                <div class="card-title h4 mb-0 fw-bolder">Add New Employee</div>
            </div>
            <div class="col-auto">
                <a href="<?= base_url('Main/employees') ?>" class="btn btn btn-light bg-gradient border rounded-0"><i class="fa fa-angle-left"></i> Back to List</a>
            </div>
        </div>
    </div>
    <div class="card-body">
        <div class="container-fluid">
            <form action="<?= base_url('Main/employee_add') ?>" method="POST">
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
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                        <div class="mb-3">
                            <label for="code" class="control-label">Employee Code</label>
                            <input type="text" class="form-control rounded-0" id="code" name="code" autofocus placeholder="Company ID" value="<?= !empty($request->getPost('code')) ? $request->getPost('code') : '' ?>" required="required">
                        </div>
                        <div class="mb-3">
                            <label for="first_name" class="control-label">First Name</label>
                            <input type="text" class="form-control rounded-0" id="first_name" name="first_name" value="<?= !empty($request->getPost('first_name')) ? $request->getPost('first_name') : '' ?>" required="required">
                        </div>
                        <div class="mb-3">
                            <label for="middle_name" class="control-label">Middle Name</label>
                            <input type="text" class="form-control rounded-0" id="middle_name" name="middle_name"  placeholder="(optional)" value="<?= !empty($request->getPost('middle_name')) ? $request->getPost('middle_name') : '' ?>" >
                        </div>
                        <div class="mb-3">
                            <label for="last_name" class="control-label">Last Name</label>
                            <input type="text" class="form-control rounded-0" id="last_name" name="last_name" value="<?= !empty($request->getPost('last_name')) ? $request->getPost('last_name') : '' ?>" required="required">
                        </div>
                        <div class="mb-3">
                            <label for="dob" class="control-label">Birthday</label>
                            <input type="date" class="form-control rounded-0" id="dob" name="dob" value="<?= !empty($request->getPost('dob')) ? $request->getPost('dob') : '' ?>" required="required">
                        </div>
                        <div class="mb-3">
                            <label for="gender" class="control-label">Gender</label>
                            <select class="form-select rounded-0" id="gender" name="gender" value="<?= !empty($request->getPost('gender')) ? $request->getPost('gender') : '' ?>" required="required">
                                <option <?= !empty($request->getPost('gender')) && $request->getPost('gender') == 'Male' ? 'selected' : '' ?>>Male</option>
                                <option <?= !empty($request->getPost('gender')) && $request->getPost('gender') == 'Female' ? 'selected' : '' ?>>Female</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="email" class="control-label">Email</label>
                            <input type="email" class="form-control rounded-0" id="email" name="email" value="<?= !empty($request->getPost('email')) ? $request->getPost('email') : '' ?>" required="required">
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                        <div class="mb-3">
                            <label for="department_id" class="control-label">Department</label>
                            <select class="form-select rounded-0" id="department_id" name="department_id" value="<?= !empty($request->getPost('department_id')) ? $request->getPost('department_id') : '' ?>" required="required">
                                <option value="" disabled selected></option>
                                <?php foreach($departments as $row): ?>
                                <option value="<?= $row['id'] ?>" <?= !empty($request->getPost('department_id')) && $request->getPost('department_id') == $row['id'] ? 'selected' : '' ?>><?= $row['code'] ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="designation_id" class="control-label">Designation</label>
                            <select class="form-select rounded-0" id="designation_id" name="designation_id" value="<?= !empty($request->getPost('designation_id')) ? $request->getPost('designation_id') : '' ?>" required="required">
                                <option value="" disabled selected></option>
                                <?php foreach($designations as $row): ?>
                                <option value="<?= $row['id'] ?>" <?= !empty($request->getPost('designation_id')) && $request->getPost('designation_id') == $row['id'] ? 'selected' : '' ?>><?= $row['code'] ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="date_hired" class="control-label">Date Hired</label>
                            <input type="date" class="form-control rounded-0" id="date_hired" name="date_hired" value="<?= !empty($request->getPost('date_hired')) ? $request->getPost('date_hired') : '' ?>" required="required">
                        </div>
                        <div class="mb-3">
                            <label for="salary" class="control-label">Salary</label>
                            <input type="number" step="any" class="form-control rounded-0" id="salary" name="salary" value="<?= !empty($request->getPost('salary')) ? $request->getPost('salary') : '' ?>" required="required">
                        </div>
                        <div class="mb-3">
                            <label for="status" class="control-label">Status</label>
                            <select class="form-select rounded-0" id="status" name="status" value="<?= !empty($request->getPost('status')) ? $request->getPost('status') : '' ?>" required="required">
                                <option value="1" <?= !empty($request->getPost('status')) && $request->getPost('status') == '1' ? 'selected' : '' ?>>Active</option>
                                <option value="0" <?= !empty($request->getPost('status')) && $request->getPost('status') == '0' ? 'selected' : '' ?>>Inactive</option>
                            </select>
                        </div>
                    </div>
                </div>
                
                <div class="d-grid gap-1">
                    <button class="btn rounded-0 btn-primary bg-gradient">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>
<?= $this->endSection() ?>
<?= $this->section('custom_js') ?>
<script>
    $(function(){
        $('#department_id, #designation_id').select2({
            placeholder:"Please Select Here",
            width:'100%',
            selectionCssClass:'form-control'
        })
    })
</script>
<?= $this->endSection() ?>