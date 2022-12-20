<?= $this->extend('basecore/basemain');?>
<?= $this->section('pageconten')?>
<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>HOLDING</h3>
                <p class="text-subtitle text-muted">QC Finish Good Product</p>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?= base_url()?>/">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Holding List
                        </li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <section class="section">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Holding Product List</h4>
            </div>
            <div class="card-body">
                <div class="container my-4"
                    style="border: 1px solid; border-color: #435ebe; border-radius: 25px;  padding-bottom: 25px; padding-left: 50px; padding-right: 50px; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);">
                    <p>
                    <h1 style="text-align:center">HOLDING PRODUCT</h1>
                    </p>
                    <div class="d-flex justify-content-end my-2">
                        <!-- <a href="<?php echo site_url('/holdingdataform') ?>" class="btn btn-outline-success  my-1">Add Product</a> -->
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
                                <th style="width: 20%">Date</th>
                                <th>Batch</th>
                                <th>Produk</th>
                                <th style="width: 10%">QTY</th>
                                <th style="width: 10%">Time</th>
                                <th style="width: 13%">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $key = 0?>
                            <?php if($holdingdatas): ?>
                            <?php foreach($holdingdatas as $holding): ?>

                            <tr>
                                <td><?= ++$key ?></td>
                                <td><?php echo date('d-m-Y, H:i:s',strtotime($holding['Tanggal_Holding'])); ?></td>
                                <td><?php echo $holding['Batch']; ?></td>
                                <td><?php echo $holding['Kode_Produk']; ?></td>
                                <td><?php echo $holding['Holding_FG_QTY']; ?></td>
                                <td>
                                    <?php 
                                $tgl1 = date('d-m-Y'); 
                                $tgl3 = strtotime($tgl1);
                                $tgl2 = strtotime($holding['Tanggal_Holding']);
                                $jarak = $tgl3 - $tgl2;
                                $hari = $jarak / 60 / 60 / 24;
                                echo $hari;
                                echo (" days");
                                ?>
                                </td>
                                <td>
                                    <a href="<?php echo base_url('holdingedit/'.$holding['No']);?>"
                                        class="btn btn-outline-primary">Move</a>
                                    <!-- <a onclick="location.href='<?php echo base_url('/deleteqc/deleteholding.php?No='.$holding['No']);?>'" class="btn btn-outline-danger">Delete</a> -->
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
</div>
</div>
<script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
<script type="text/javascript" src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
<script>
$(document).ready(function() {
    $('#master_list').DataTable();
});
</script>
<?= $this->endSection();?>