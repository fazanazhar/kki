<?= $this->extend('basecore/basemain');?>
<?= $this->section('pageconten')?>
<!-- <script src="https://kit.fontawesome.com/fd8462dc4d.js" crossorigin="anonymous"></script> -->
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
        <div class="flash-data" data-flashdata="<?= session()->getFlashdata('flashdata');?>"></div>
        <div class="flash-datae" data-flashdatae="<?= session()->getFlashdata('flashdata_error');?>"></div>
        <div class="flash-datan" data-flashdatan="<?= session()->getFlashdata('flashdata_not');?>"></div>
        <div class="modal-dialog modal-dialog-centered modal-dialog-centered modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-header bg-primary">
                    <h5 class="modal-title text-white" id="exampleModalCenterTitle">Validation Product Quantity</h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <i data-feather="x"></i>
                    </button>
                </div>
                <div class="modal-body-wrapper">
                    <form method="post" id="postpacking" action="<?php echo base_url()?>/qc_produk_c">
                        <div class="modal-body">
                            <div class="d-flex justify-content-center">
                                <div class="d-flex justify-content-center">
                                    <div class="col-14 col-lg-14 col-md-14 mx-auto mt-3">
                                        <div class="form-group position-relative has-icon-left">
                                            <input type="text" class="form-control text-center" id="Containercode"
                                                name="P_KodeKontainer" placeholder="Container code" required autofocus>
                                            <div class="form-control-icon">
                                                <i class="fa-solid fa-box-open"></i>
                                            </div>
                                        </div>
                                        <div class="form-group position-relative has-icon-left">
                                            <input type="text" class="form-control text-center" id="master_batch"
                                                name="P_KodeBatch" placeholder="Batch Code" required autofocus>
                                            <div class="form-control-icon">
                                                <i class="fa-solid fa-code"></i>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-16">
                                                <div class="form-group position-relative has-icon-left">
                                                    <input type="number" id="jumlah" min="1"
                                                        class="form-control text-center" name="P_QTY" placeholder="1"
                                                        value="1">
                                                    <div class="form-control-icon">
                                                        <i class="fa-solid fa-keyboard"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group position-relative has-icon-left">
                                            <input type="text" class="form-control text-center" name="packing_operator"
                                                value="<?= user()->username; ?>" readonly>
                                            <div class="form-control-icon">
                                                <i class="fa-solid fa-user"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary ml-1">Validate</button>
                    </form>
                    <a href="<?php echo base_url()?>/validasi" class="btn btn-outline-secondary ml-1">back</a>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="<?= base_url();?>/assets/alrt/sweetalert2.all.min.js"></script>
<script src="<?= base_url();?>/assets/js/core/pra_qc_produksi.js"></script>
<script>
document.onkeyup = function(e) {
    var e = e || window.event;
    if (e.altKey && e.which == 49) {
        document.getElementById("Containercode").value = '';
        document.getElementById("Containercode").focus();
        return false;
    }
    if (e.altKey && e.which == 50) {
        document.getElementById("master_batch").value = '';
        document.getElementById("master_batch").focus();
        return false;
    }
    if (e.altKey && e.which == 51) {
        document.getElementById("jumlah").value = '';
        document.getElementById("jumlah").focus();
        return false;
    }
}
const flashDataerror = $('.flash-datae').data('flashdatae');
console.log(flashDataerror);
if (flashDataerror) {
    Swal.fire({
        title: ' Data Does Not Match',
        allowOutsideClick: false,
        allowEscapeKey: false,
        showCancelButton: false,
        showConfirmButton: false,
        html: '<h5 class="text-subtitle text-muted">The data Is automatically reported to SPV</h5>' +
            '<p>please move item to don`t match container</p>' +
            '<form method="post" id="postdontmatch" action="<?php echo base_url()?>/qc_produk_update">' +
            '<input type="text" class="form-control text-center my-2" name="pd_container" id="pd_container" placeholder="Production Container" required>' +
            '<input type="text" class="form-control text-center my-2" name="batch_code" id="batch_code" placeholder="Batch Code" required>' +
            '<input type="text" class="form-control text-center my-2" name="matching" id="matching" placeholder="Don`t match Container" required>' +
            '<button type="submit" class="btn btn-primary ml-1">Report</button>' +
            '</form>',
        icon: 'error'
    }).then(function() {
        // window.location.href = "qc_produk";
    })
};
</script>
<?= $this->endSection();?>