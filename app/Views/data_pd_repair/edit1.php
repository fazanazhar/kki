<!DOCTYPE html>
<html>

<head>
    <title>Report Qty Production Repair</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css">
    <style>
    .error {
        display: block;
        padding-top: 5px;
        font-size: 14px;
        color: red;
    }
    </style>
</head>

<body>
    <div class="container">
        <p>
        <h1>Report Qty Production Repair</h1>
        </p>
        <div class="row">
            <div class="col-2"></div>
            <div class="col-8">
                <form method="post" id="update_detail" name="update_detail" action="<?= site_url('/pdrepairupdate') ?>">
                    <input type="hidden" name="P_No" id="P_No" value="<?php echo $detail_report_obj['P_No']; ?>">
                    <div class="mb-3 row">
                        <label class="col-sm-4 col-form-label">Date</label>
                        <label class="col-sm-1 col-form-label">:</label>
                        <div class="col-sm-7">
                            <input type="text" readonly name="P_Datetime" class="form-control"
                                value="<?php echo $detail_report_obj['P_Datetime']; ?>">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label class="col-sm-4 col-form-label">Container Code</label>
                        <label class="col-sm-1 col-form-label">:</label>
                        <div class="col-sm-7">
                            <input type="text" name="P_KodeKontainer" class="form-control"
                                value="<?php echo $detail_report_obj['P_KodeKontainer']; ?>" readonly>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label class="col-sm-4 col-form-label">Batch Code</label>
                        <label class="col-sm-1 col-form-label">:</label>
                        <div class="col-sm-7">
                            <input type="text" name="P_KodeBatch" class="form-control"
                                value="<?php echo $detail_report_obj['P_KodeBatch']; ?>" readonly>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label class="col-sm-4 col-form-label">Product</label>
                        <label class="col-sm-1 col-form-label">:</label>
                        <div class="col-sm-7">
                            <input type="text" name="P_NamaProduk" class="form-control"
                                value="<?php echo $detail_report_obj['P_NamaProduk']; ?>" readonly>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label class="col-sm-4 col-form-label">Production (Qty)</label>
                        <label class="col-sm-1 col-form-label">:</label>
                        <div class="col-sm-7">
                            <input type="text" name="P_QTY" class="form-control"
                                value="<?php echo $detail_report_obj['P_QTY']; ?>">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label class="col-sm-4 col-form-label">QC (Qty)</label>
                        <label class="col-sm-1 col-form-label">:</label>
                        <div class="col-sm-7">
                            <input type="text" name="P_QC_QTY" class="form-control"
                                value="<?php echo $detail_report_obj['P_QC_QTY']; ?>">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label class="col-sm-4 col-form-label">Difference Amount</label>
                        <label class="col-sm-1 col-form-label">:</label>
                        <div class="col-sm-7">
                            <input type="text" class="form-control" value="<?php 
                  $a = $detail_report_obj['P_QTY'];
                  $b = $detail_report_obj['P_QC_QTY'];
                  $jumlah= $a - $b;
                  echo"-$jumlah";
                  ?>">

                            <!-- <input type="text" name="" class="form-control" value="" readonly> -->
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label class="col-sm-4 col-form-label">Reporter</label>
                        <label class="col-sm-1 col-form-label">:</label>
                        <div class="col-sm-7">
                            <input type="text" name="P_PIC" class="form-control"
                                value="<?php echo $detail_report_obj['P_PIC']; ?>" readonly>
                        </div>
                    </div>
                    <input type="hidden" name="P_Status" id="P_Status"
                        value="<?php echo $detail_report_obj['P_Status']; ?>">
                    <div class="mb-3 row">
                        <label class="col-sm-4 col-form-label">Status</label>
                        <label class="col-sm-1 col-form-label">:</label>
                        <div class="col-sm-7">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="P_Report" value="Approved">
                                <label class="form-check-label" for="flexRadioDefault1">Approved</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="P_Report" value="Not Approved">
                                <label class="form-check-label" for="flexRadioDefault2">Not Approved</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="P_Report" value="Pending">
                                <label class="form-check-label" for="flexRadioDefault2">Pending</label>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <p>
                    <h3 style="text-align:center; color:gray;"><?php echo $detail_report_obj['P_Report']; ?></h3>
                    </p>
                    <div class="mb-3 row">
                        <div class="col-12 col-md-10">
                        </div>
                        <div class="col-12 col-md-1">
                            <button type="button" class="btn btn-secondary"
                                onclick="location.href='<?= base_url()?>/data_pd_repair'">Close</button>
                        </div>
                        <div class="col-12 col-md-1">
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-2"></div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.2/jquery.validate.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.2/additional-methods.min.js"></script>
    <script>

    </script>
</body>

</html