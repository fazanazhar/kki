<?= $this->extend('basecore/basemain');?>
<?= $this->section('pageconten')?>
<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Master Data Customer</h3>
                <p class="text-subtitle text-muted">Master Data Customer.</p>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?= base_url()?>/">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Master Data Customer
                        </li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <section class="section">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">List Master Data Customer </h4>
            </div>
            <div class="card-body">
                <div class="container my-4"
                    style="border: 1px solid; border-color: #435ebe; border-radius: 25px;  padding-bottom: 25px; padding-left: 50px; padding-right: 50px; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);">
                    <p>
                    <h1 style="text-align:center">MASTER DATA CUSTOMER</h1>
                    </p>
                    <div class="d-flex justify-content-end my-2">
                        <button type="button" class="btn btn-success btn-sm my-1" data-bs-toggle="modal"
                            data-bs-target="#adddata">
                            Add Data Customer
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
                                <th>Customer</th>
                                <th>Category</th>
                                <th style="width: 25%">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $key = 0?>
                            <?php if($masterdatas): ?>
                            <?php foreach($masterdatas as $master): ?>
                            <tr>
                                <td><?= ++$key ?></td>
                                <td><?php echo $master['mp_nama']; ?></td>
                                <td><?php echo $master['mp_kategori']; ?></td>
                                <td>
                                    <button type="button" class="btn btn-outline-primary" data-bs-toggle="modal"
                                        data-bs-target="#editmodal<?php echo $master['mp_id']; ?>">Edit</button>
                                    <a onclick="location.href='<?php echo base_url('/delete/deletemasterpelanggan.php?mp_id='.$master['mp_id']);?>'"
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


    <!-- Modal Add-->
    <div class="modal fade" id="adddata" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <form method="post" id="add_create" name="add_create"
            action="<?= site_url('/masterdatapelanggansubmit-form') ?>">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">ADD DATA CUSTOMER</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="container">
                            <div class="row">
                                <div class="col-2"></div>
                                <div class="col-8">
                                    <div class="form-group">
                                        <label style="color:#435ebe;">Customer</label>
                                        <input type="text" name="mp_nama" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label style="color:#435ebe;">Category</label>
                                        <input type="text" name="mp_kategori" class="form-control">
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
    <?php if($masterdatas): ?>
    <?php foreach($masterdatas as $master): ?>
    <div class="modal fade" id="editmodal<?php echo $master['mp_id']; ?>" tabindex="-1" aria-labelledby="edit_modal"
        aria-hidden="true">
        <form method="post" id="edit_modal" name="edit_modal" action="<?= site_url('/masterupdatepelanggan') ?>">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="edit_modal">EDIT DATA CUSTOMER</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="container">
                            <div class="row">
                                <div class="col-2"></div>
                                <div class="col-8">
                                    <input type="hidden" name="mp_id" id="mp_id"
                                        value="<?php echo $master['mp_id']; ?>">
                                    <div class="form-group">
                                        <label>Customer</label>
                                        <input type="text" name="mp_nama" class="form-control"
                                            value="<?php echo $master['mp_nama']; ?>">
                                    </div>
                                    <div class="form-group">
                                        <label>Category</label>
                                        <input type="text" name="mp_kategori" class="form-control"
                                            value="<?php echo $master['mp_kategori']; ?>">
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