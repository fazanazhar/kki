<?= $this->extend('basecore/basemain');?>
<?= $this->section('pageconten')?>
<style>
.dataTables_scrollHeadInner {
    width: 100% !important;

}

.dataTables_scrollHeadInner table {
    width: 100% !important;
}

.table {
    width: 100% !important;
}
</style>
<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Master Data Container</h3>
                <p class="text-subtitle text-muted">Master Data Container.</p>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?= base_url()?>/">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Master Data Container
                        </li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <section class="section">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">List Master Data Container </h4>
            </div>
            <div class="card-body">
                <div class="container my-4"
                    style="border: 1px solid; border-color: #435ebe; border-radius: 25px;  padding-bottom: 25px; padding-left: 50px; padding-right: 50px; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);">
                    <p>
                    <h1 style="text-align:center">MASTER DATA CONTAINER</h1>
                    </p>
                    <div class="d-flex justify-content-end my-2">
                        <button type="button" class="btn btn-success btn-sm my-1" data-bs-toggle="modal"
                            data-bs-target="#adddata">
                            Add Data Container
                        </button>
                    </div>
                    <?php
                    if(isset($_SESSION['msg'])){
                        echo $_SESSION['msg'];
                    }
                    ?>
                    <table class="table my-2" id="master_list">
                        <thead>
                            <tr>
                                <th style="width: 5%">No</th>
                                <th>Container Code</th>
                                <th>Description</th>
                                <th>MAX QTY</th>
                                <th style="width: 25%">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $key = 0?>
                            <?php if($masterdatakontainers): ?>
                            <?php foreach($masterdatakontainers as $masterkontainer): ?>
                            <tr>
                                <td><?= ++$key ?></td>
                                <td><?php echo $masterkontainer['mk_kode']; ?></td>
                                <td><?php echo $masterkontainer['mk_keterangan']; ?></td>
                                <td><?php echo $masterkontainer['mk_maxqty']; ?></td>
                                <td>
                                    <a class="btn btn-outline-success" id="kosong" data-bs-toggle="modal"
                                        onclick="generatebarcode()"
                                        data-bs-target="#generatebarcode<?php echo $masterkontainer['mk_kode']; ?>"
                                        style="margin-left:8px;">Barcode</a>
                                    <a type="button" class="btn btn-outline-primary" data-bs-toggle="modal"
                                        data-bs-target="#editmodal<?php echo $masterkontainer['mk_id']; ?>">Edit</a>
                                    <a onclick="location.href='<?php echo base_url('/delete/deletemasterkontainer.php?mk_id='.$masterkontainer['mk_id']);?>'"
                                        class="btn btn-outline-danger">Delete</a>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
    <!-- Modal Add -->
    <div class="modal fade" id="adddata" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <form method="post" id="add_create" name="add_create" action="<?= site_url('/masterkontainersubmit-form') ?>">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">ADD DATA CONTAINER</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="container">
                            <div class="row">
                                <div class="col-2"></div>
                                <div class="col-8">
                                    <div class="form-group">
                                        <label style="color:#435ebe;">Container Code</label>
                                        <input type="text" name="mk_kode" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label style="color:#435ebe;">Description</label>
                                        <input type="text" name="mk_keterangan" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label style="color:#435ebe;">Max QTY</label>
                                        <input type="text" name="mk_maxqty" class="form-control">
                                    </div>
                                </div>
                                <div class="col-2"></div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
    <!-- Akhir Modal Add-->



    <!-- Modal Edit-->
    <?php $key = 0?>
    <?php if($masterdatakontainers): ?>
    <?php foreach($masterdatakontainers as $master): ?>
    <div class="modal fade" id="editmodal<?php echo $master['mk_id']; ?>" tabindex="-1" aria-labelledby="edit_modal"
        aria-hidden="true">
        <form method="post" id="edit_modal" name="edit_modal" action="<?= site_url('/masterupdatekontainer') ?>">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="edit_modal">EDIT DATA CONTAINER</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="container">
                            <div class="row">
                                <div class="col-2"></div>
                                <div class="col-8">
                                    <input type="hidden" name="mk_id" id="mk_id"
                                        value="<?php echo $master['mk_id']; ?>">
                                    <div class="form-group">
                                        <label>Container Code</label>
                                        <input type="text" name="mk_kode" class="form-control"
                                            value="<?php echo $master['mk_kode']; ?>">
                                    </div>
                                    <div class="form-group">
                                        <label>Description</label>
                                        <input type="text" name="mk_keterangan" class="form-control"
                                            value="<?php echo $master['mk_keterangan']; ?>">
                                    </div>
                                    <div class="form-group">
                                        <label>Max QTY</label>
                                        <input type="text" name="mk_maxqty" class="form-control"
                                            value="<?php echo $master['mk_maxqty']; ?>">
                                    </div>
                                </div>
                                <div class="col-2"></div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
    <?php endforeach; ?>
    <?php endif; ?>
    <!-- Akhir Modal Edit-->

    <!-- Modal Barcode -->
    <?php if($masterdatakontainers): ?>
    <?php foreach($masterdatakontainers as $masterkontainer): ?>
    <div class="modal fade" id="generatebarcode<?php echo $masterkontainer['mk_kode']; ?>" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-centered modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-header bg-primary">
                    <h5 class="modal-title text-white" id="exampleModalCenterTitle">Barcode Container Code</h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <i data-feather="x"></i>
                    </button>
                </div>
                <div class="modal-body-wrapper">
                    <div class="modal-body">
                        <div class="d-flex justify-content-center">
                            <div class="col-8 col-md-12 order-md-2 my-4">
                                <div class="d-flex justify-content-center">
                                    <div id="barcodea" class="barcode">
                                        <svg id="barcode<?php echo $masterkontainer['mk_kode']; ?>"></svg>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light-secondary" data-bs-dismiss="modal">
                        <i class="bx bx-x d-block d-sm-none"></i>
                        <span class="d-none d-sm-block">Close</span>
                    </button>
                    <button type="button" class="btn btn-primary ml-1">
                        <i class="bx bx-check d-block d-sm-none"></i>
                        <span class="d-none d-sm-block print" onclick="myApp.printDiv()">Print</span>
                    </button>
                </div>
            </div>
        </div>
    </div>
    <?php endforeach; ?>
    <?php endif; ?>
    <!-- Akhir Modal Barcode-->


</div>
<style>
.dataTables_scrollHeadInner {
    width: 100% !important;

}

.dataTables_scrollHeadInner table {
    width: 100% !important;
}

.table {
    width: 100% !important;
}
</style>
<script type="text/javascript" src="<?= base_url();?>/assets/js/JsBarcode.all.min.js"></script>
<script>
function generatebarcode() {
    <?php if($masterdatakontainers): ?>
    <?php foreach($masterdatakontainers as $masterkontainer): ?>
    JsBarcode("#barcode<?php echo $masterkontainer['mk_kode']; ?>", '<?php echo $masterkontainer['mk_kode']; ?>', {
        format: "CODE128",
        lineColor: "#000000",
        width: 2,
        height: 50,
        displayValue: true
    });
    <?php endforeach; ?>
    <?php endif; ?>
}


var myApp = new function() {
    this.printDiv = function() {
        // Store DIV contents in the variable.
        var div = document.getElementById('barcodea');

        // Create a window object.
        // Open the window. Its a popup window.
        var win = window.open('', '', 'height=700,width=700');

        // Write contents in the new window.
        win.document.write(div.outerHTML);
        win.document.close();
        win.print(); // Finally, print the contents.
    }
}
</script>


<script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
<script type="text/javascript" src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
<script>
$(document).ready(function() {
    $('#master_list').DataTable({
        scrollX: 100000,
        paging: true,
    });
});
</script>
<?= $this->endSection();?>