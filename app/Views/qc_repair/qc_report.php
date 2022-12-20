<?= $this->extend('basecore/basemain');?>
<?= $this->section('pageconten')?>
<!-- <script src="https://kit.fontawesome.com/fd8462dc4d.js" crossorigin="anonymous"></script> -->
<link rel="stylesheet" href="<?= base_url();?>/assets/vendors/iconly/bold.css">
<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-10 order-md-1 order-last">
                <h3>Quality Control Repair</h3>
                <p class="text-subtitle text-muted">Panel Qc Repair.</p>
            </div>
            <div class="col-12 col-md-2 order-md-1 order-last">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?= base_url()?>/">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Quality Control Repair
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
        <div class="flash-data" data-flashdata="<?= session()->getFlashdata('flashdata');?>"></div>
        <div class="modal-dialog modal-dialog-centered modal-dialog-centered modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-header bg-primary">
                    <h5 class="modal-title text-white" id="exampleModalCenterTitle">Data No Match</h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <i data-feather="x"></i>
                    </button>
                </div>
                <div class="modal-body-wrapper">
                    <form method="post" id="postpacking" action="<?php echo base_url()?>/qc_repair_c">
                        <div class="modal-body">
                            <div class="d-flex justify-content-center">
                                <div class="col-10 col-md-10 mt-3">
                                    <div class="form-group position-relative has-icon-left">
                                        <input type="text" class="form-control text-center" name="packing_operator"
                                            id="packing_operator" value="<?= user()->username; ?>" readonly>
                                        <div class="form-control-icon">
                                            <i class="fa-solid fa-user"></i>
                                        </div>
                                    </div>
                                    <div class="form-group with-title mb-2">
                                        <textarea class="form-control" name="text_r" rows="5"></textarea>
                                        <label>Report message</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="sumbit" class="btn btn-primary ml-1">Validate</button>
                    </form>
                    <a href="<?php echo base_url()?>/" class="btn btn-outline-secondary ml-1">back</a>
                </div>
            </div>
        </div>
    </div>
    <script src="<?= base_url();?>/assets/alrt/sweetalert2.all.min.js"></script>
    <script src="<?= base_url();?>/assets/js/core/pra_qc_repair.js"></script>
    <?= $this->endSection();?>