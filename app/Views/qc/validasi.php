<?= $this->extend('basecore/basemain');?>
<?= $this->section('pageconten')?>
<link rel="stylesheet" href="<?= base_url();?>/assets/vendors/iconly/bold.css">
<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-10 order-md-1 order-last">
                <h3>Quality Control</h3>
                <p class="text-subtitle text-muted">Panel Qc.</p>
            </div>
            <div class="col-12 col-md-2 order-md-1 order-last">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?= base_url()?>/">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Quality Control
                        </li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <div class="modal d-block"
        style="position: fixed; top: 0; left: 0; z-index: 1040; width: 100vw; height: 100vh; background-color: rgba(0, 0, 0, 0.4); backdrop-filter: blur(3px);"
        id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-centered modal-dialog-scrollable" role="document">
            <!-- <div class="modal-dialog"> -->
            <div class="modal-content">
                <div class="modal-header bg-primary">
                    <h5 class="modal-title text-white" id="exampleModalCenterTitle">Validation Quantity Product - QC
                    </h5>
                    <a href="<?php echo base_url()?>/" type="button" class="btn-close btn-close-white"
                        aria-label="Close"></a>
                </div>
                <div class="modal-body">
                    <div class="container">
                        <div class="row align-items-start">
                            <div class="col">
                                Please select the type of product for validation!
                            </div>
                        </div>
                        <div class="row align-items-center">
                            <div class="col">
                                <br><br>
                            </div>
                        </div>
                        <div class="row align-items-end">
                            <div class="col">
                                <a href="<?= base_url()?>/qc_produk" type="button" class="btn btn-block rtg col-12"
                                    style="height:50px"><i class="iconly-boldBookmark"></i> PRODUCTION</a>
                            </div>
                            <div class="col">
                                <a href="<?= base_url()?>/qc_repair" type="button" class="btn btn-block rtgkedua col-12"
                                    style="height:50px"><i class="iconly-boldAdd-User"></i> REPAIR </a>
                            </div>
                        </div>
                    </div>
                </div>


                <!-- <div class="modal-footer">
               
            </div> -->
            </div>
        </div>
    </div>
    <script src="<?= base_url();?>/assets/alrt/sweetalert2.all.min.js"></script>
    <script src="<?= base_url();?>/assets/js/core/pra_qc_produksi.js"></script>
    <?= $this->endSection();?>