<?= $this->extend('basecore/basemain');?>
<?= $this->section('pageconten')?>
<link rel="stylesheet" href="<?= base_url();?>/assets/vendors/iconly/bold.css">
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
                <h3>DISCOUNT MARKETPLACE</h3>
                <p class="text-subtitle text-muted">QC Discount MarketPlace Product</p>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?= base_url()?>/">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Discount MarketPlace List
                        </li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <section class="section">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Discount Market Place Product List</h4>
            </div>
            <div class="card-body">
                <div class="container my-4"
                    style="border: 1px solid; border-color: #435ebe; border-radius: 25px;  padding-bottom: 25px; padding-left: 50px; padding-right: 50px; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);">
                    <p>
                    <h1 style="text-align:center">DISCOUNT MARKETPLACE PRODUCT</h1>
                    </p>
                    <div class="d-flex justify-content-end my-2">
                        <!-- <a href="<?php echo site_url('/discmpdataform') ?>" class="btn btn-outline-success my-1">Add Product</a> -->
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
                                <th style="width: 15%">Date</th>
                                <th style="width: 15%">Container Code</th>
                                <th style="width: 15%">Batch</th>
                                <th>Product</th>
                                <th style="width: 10%">QTY</th>
                                <th style="width: 10%">PIC</th>
                                <?php if (in_groups('administrator')):?>
                                <th style="width: 10%">Action</th>
                                <?php endif?>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $key = 0?>
                            <?php if($discmpdatas): ?>
                            <?php foreach($discmpdatas as $discmp): ?>
                            <tr>
                                <td><?= ++$key ?></td>
                                <td><?php echo date('d-m-Y, H:i:s',strtotime($discmp['DMP_Datetime'])); ?></td>
                                <td><?php echo $discmp['DMP_Kontainer']; ?></td>
                                <td><?php echo $discmp['DMP_KodeBatch']; ?></td>
                                <td><?php echo $discmp['DMP_NamaProduk']; ?></td>
                                <td><?php echo $discmp['DMP_QTY']; ?></td>
                                <td><?php echo $discmp['DMP_PIC']; ?></td>
                                <?php if (in_groups('administrator')):?>
                                <td>
                                    <button type="button" class="btn btn-outline-primary" data-bs-toggle="modal"
                                        data-bs-target="#editmodall<?php echo $discmp['DMP_No']; ?>">Edit</button>
                                </td>
                                <?php endif ?>
                            </tr>
                            <?php endforeach; ?>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!-- Modal Edit-->
        <?php $key = 0?>
        <?php if($discmpdatas): ?>
        <?php foreach($discmpdatas as $discmp): ?>
        <div class="modal fade" id="editmodall<?php echo $discmp['DMP_No']; ?>" tabindex="-1"
            aria-labelledby="edit_modal" aria-hidden="true">
            <form method="post" id="edit_modal" name="edit_modal" action="<?= site_url('/discmp_updateadmin') ?>">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="edit_modal">EDIT DATA PRODUCTION</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="container">
                                <div class="row">
                                    <div class="col-2"></div>
                                    <div class="col-8">
                                        <input type="hidden" name="DMP_No" id="DMP_No"
                                            value="<?php echo $discmp['DMP_No']; ?>">
                                        <div class="form-group">
                                            <label>Kode Kontainer</label>
                                            <input type="text" name="DMP_Kontainer" class="form-control"
                                                value="<?php echo $discmp['DMP_Kontainer']; ?>">
                                        </div>
                                        <div class="form-group">
                                            <label>Batch</label>
                                            <input type="text" name="DMP_KodeBatch" class="form-control"
                                                value="<?php echo $discmp['DMP_KodeBatch']; ?>">
                                        </div>
                                        <div class="form-group">
                                            <label>Produk</label>
                                            <input type="text" name="DMP_NamaProduk" class="form-control"
                                                value="<?php echo $discmp['DMP_NamaProduk']; ?>">
                                        </div>
                                        <div class="form-group">
                                            <label>QTY</label>
                                            <input type="text" name="DMP_QTY" class="form-control"
                                                value="<?php echo $discmp['DMP_QTY']; ?>">
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
    </section>
</div>
</div>
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