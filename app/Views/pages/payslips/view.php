<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>
<div class="card rounded-0">
    <div class="card-header">
        <div class="d-flex w-100 justify-content-between">
            <div class="col-auto">
                <div class="card-title h4 mb-0 fw-bolder">Employee's Payslip</div>
            </div>
            <div class="col-auto">
                <a href="<?= base_url('Main/payslips') ?>" class="btn btn btn-light bg-gradient border rounded-0"><i class="fa fa-angle-left"></i> Back to List</a>
            </div>
        </div>
    </div>
    <div class="card-body">
        <div class="container-fluid" id="printout">
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
                            <dt class="col-auto">Department:</dt>
                            <dd class="col-auto flex-shrink-1 flex-grow-1 px-2"><?= $details['department'] ?></dd>
                        </dl>
                        <dl class="d-flex w-100">
                            <dt class="col-auto">Designation:</dt>
                            <dd class="col-auto flex-shrink-1 flex-grow-1 px-2"><?= $details['designation'] ?></dd>
                        </dl>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                    <div class="lh-1">
                        <dl class="d-flex w-100">
                            <dt class="col-auto">Payroll:</dt>
                            <dd class="col-auto flex-shrink-1 flex-grow-1 px-2"><?= $details['payroll_code']." - ".$details['payroll_name'] ?></dd>
                        </dl>
                        <dl class="d-flex w-100">
                            <dt class="col-auto">Basic Rate/<sup>mo</sup>:</dt>
                            <dd class="col-auto flex-shrink-1 flex-grow-1 px-2"><?= number_format($details['salary'], 2) ?></dd>
                        </dl>
                    </div>
                </div>
            </div>
            <hr>
            <div class="row mb-3">
                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                    <fieldset class="border px-3 py-3 border rounded-0">
                        <legend class="w-auto px-3 mx-3">Earnings</legend>
                        <table class="table table-striped table-bordered">
                            <colgroup>
                                <col width="65%">
                                <col width="35%">
                            </colgroup>
                            <thead>
                                <tr>
                                    <th class="p-1 text-center">Name</th>
                                    <th class="p-1 text-center">Amount</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                $total_earnings = 0;
                                foreach($earnings as $row):
                                $total_earnings += $row['amount'];
                                ?>
                                <tr>
                                    <td class="px-2 py-1 align-middle"><?= $row['name'] ?></td>
                                    <td class="px-2 py-1 text-end align-middle"><?= number_format($row['amount'],2) ?></td>
                                </tr>
                                <?php endforeach; ?>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th class="p-1 text-center">Total Earning</th>
                                    <th class="p-1 text-end"><?= number_format($total_earnings, 2) ?></th>
                                </tr>
                            </tfoot>
                        </table>
                    </fieldset>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                    <fieldset class="border px-3 py-3 border rounded-0">
                        <legend class="w-auto px-3 mx-3">Deductions</legend>
                        <table class="table table-striped table-bordered">
                            <colgroup>
                                <col width="65%">
                                <col width="35%">
                            </colgroup>
                            <thead>
                                <tr>
                                    <th class="p-1 text-center">Name</th>
                                    <th class="p-1 text-center">Amount</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                $total_deductions = 0;
                                foreach($deductions as $row):
                                $total_deductions += $row['amount'];
                                ?>
                                <tr>
                                    <td class="px-2 py-1 align-middle"><?= $row['name'] ?></td>
                                    <td class="px-2 py-1 text-end align-middle"><?= number_format($row['amount'],2) ?></td>
                                </tr>
                                <?php endforeach; ?>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th class="p-1 text-center">Total Deduction</th>
                                    <th class="p-1 text-end"><?= number_format($total_deductions, 2) ?></th>
                                </tr>
                            </tfoot>
                        </table>
                    </fieldset>
                </div>
            </div>
            <hr>
            <div class="row mb-3">
                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                        <dl class="d-flex w-100">
                            <dt class="col-auto">Witholding Tax:</dt>
                            <dd class="col-auto flex-shrink-1 flex-grow-1 px-2"><?= number_format($details['witholding_tax'], 2) ?></dd>
                        </dl>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                        <dl class="d-flex w-100">
                            <dt class="col-auto">Net:</dt>
                            <dd class="col-auto flex-shrink-1 flex-grow-1 px-2"><?= number_format($details['net'], 2) ?></dd>
                        </dl>
                    </div>
                </div>
        </div>
    </div>
    <div class="card-footer text-center">
        <a href="<?= base_url('Main/payslip_delete/'.$details['id']) ?>" class="btn btn-sm rounded-0 btn-danger bg-gradient" onclick="if(confirm('Are you sure to delete payslip?') !== true) event.preventDefault()"><i class="fa fa-trash"></i> Delete</a>
        <button class="btn btn-sm btn-light rounded-0 border" id="print" type="button"><i class="fa fa-print"></i> Print</button>
    </div>
</div>
<?= $this->endSection() ?>
<?= $this->section('custom_js') ?>
<script>
    $(function(){
        $('#print').click(function(){
            var h = $('head').clone()
            var el = $('#printout').clone()

            var nw = window.open("", "_blank", "width="+($(window).width() * .8)+",left="+($(window).width() * .1)+",height="+($(window).height() * .8)+",top="+($(window).height() * .1))
                nw.document.querySelector('head').innerHTML = h.html()
                nw.document.querySelector('body').innerHTML = el.html()
                nw.document.close()
                setTimeout(() => {
                    nw.print()
                    setTimeout(() => {
                        nw.close()
                    }, 200);
                }, 300);
        })
    })
</script>
<?= $this->endSection() ?>