<?= $this->extend('basecore/basemain');?> <?= $this->section('pageconten')?>
<div class="flash-data" data-flashdata="<?= session()->getFlashdata('flashdata');?>"></div>

<!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.css" integrity="sha512-HHsOC+h3najWR7OKiGZtfhFIEzg5VRIPde0kB0bG2QRidTQqf+sbfcxCTB16AcFB93xMjnBIKE29/MjdzXE+qw==" crossorigin="anonymous" referrerpolicy="no-referrer" /> -->
<!-- <script src="https://kit.fontawesome.com/fd8462dc4d.js" crossorigin="anonymous"></script> -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="
	<?= base_url();?>/assets/vendors/iconly/bold.css">
<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-2 order-md-1 order-last">
                <h3>Barcode</h3>
                <p class="text-subtitle text-muted">Generate Barcode.</p>
            </div>
            <div class="col-12 col-md-8 order-md-1 order-first"></div>
            <div class="col-12 col-md-2 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="<?= base_url()?>/">Dashboard </a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Barcode</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <div class="col-12 col-md-8 order-md-2 mx-auto">
        <section class="section">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col">
                            <h4 class="card-title col-4">Barcode Panel</h4>
                        </div>
                        <div class="col">
                            <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end"
                                type="button" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item">Barcode Tab</li>
                                    <li class="breadcrumb-item active" aria-current="page">Dashboard
                                    </li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                    <hr>
                </div>
                <div class="card-body">
                    <div class="col-12 col-md-8 order-md-2 mx-auto my-4" style="width: 150px; height: 150px">
                        <div class="col-md-12 my-4">
                            <div class="stats-icon darkblue" style="width: 150px; height: 150px">
                                <i class="iconly-boldDocument" style="font-size:500%"></i>
                            </div>
                        </div>
                    </div>
                    <div class="my-2">
                        <h3 class="text-center">Generate Barcode</h3>
                        <div class="col-12 col-md-6 order-md-2 mx-auto mt-3">
                            <div class="row">
                                <div class="col-md-9">
                                    <div class="input-group mb-3">
                                        <label class="input-group-text" for="master_supplier">Master Supplier</label>
                                        <input type="text" list="datasup" class="form-select" name="master_supplier"
                                            id="master_supplier" onchange="batch()" autocomplete="off">
                                        <datalist id="datasup">
                                            <?php foreach($mastersupplier as $s){ ?>
                                            <option value="<?php echo $s['ms_kode']; ?>"><?php echo $s['ms_nama']; ?>
                                            </option>
                                            <?php } ?>
                                        </datalist>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <a class="btn btn-outline-success" id="kosong" data-bs-toggle="modal"
                                            onclick="generatebarcodesup()" data-bs-target="#modalsupplier"
                                            style="margin-left:8px;">Barcode</a>
                                    </div>
                                </div>
                                <div class="modal fade" id="modalsupplier" tabindex="-1" role="dialog"
                                    aria-labelledby="modalsupplierTitle" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered modal-dialog-centered modal-dialog-scrollable"
                                        role="document">
                                        <div class="modal-content">
                                            <div class="modal-header bg-primary">
                                                <h5 class="modal-title text-white" id="modalsupplierTitle">
                                                    Barcode Supplier Code </h5>
                                                <button type="button" class="close" data-bs-dismiss="modal"
                                                    aria-label="Close">
                                                    <i data-feather="x"></i>
                                                </button>
                                            </div>
                                            <div class="modal-body-wrapper">
                                                <div class="modal-body">
                                                    <div class="d-flex justify-content-center">
                                                        <div class="col-8 col-md-12 order-md-2 my-4">
                                                            <div class="d-flex justify-content-center">
                                                                <div id="barcodesup" class="barcodesup">
                                                                    <svg id="barcode1"></svg>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-light-secondary"
                                                    data-bs-dismiss="modal">
                                                    <i class="bx bx-x d-block d-sm-none"></i>
                                                    <span class="d-none d-sm-block">Close</span>
                                                </button>
                                                <button type="button" class="btn btn-primary ml-1">
                                                    <i class="bx bx-check d-block d-sm-none"></i>
                                                    <span class="d-none d-sm-block print"
                                                        onclick="sup.printsup()">Print</span>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-9">
                                    <div class="input-group mb-3">
                                        <label class="input-group-text" for="master_barang">Master Product</label>
                                        <input type="text" list="databarang" class="form-select" name="master_barang"
                                            id="master_barang" onchange="batch()" autocomplete="off">
                                        <datalist id="databarang">
                                            <?php foreach($masterbarang as $b){ ?>
                                            <option value="<?php echo $b['mbr_kode']; ?>"><?php echo $b['mbr_nama']; ?>
                                            </option>
                                            <?php } ?>
                                        </datalist>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <a class="btn btn-outline-success" id="kosong" data-bs-toggle="modal"
                                            onclick="generatebarcodebarang()" data-bs-target="#modalbarang"
                                            style="margin-left:8px;">Barcode</a>
                                    </div>
                                </div>
                                <div class="modal fade" id="modalbarang" tabindex="-1" role="dialog"
                                    aria-labelledby="modalbarangTitle" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered modal-dialog-centered modal-dialog-scrollable"
                                        role="document">
                                        <div class="modal-content">
                                            <div class="modal-header bg-primary">
                                                <h5 class="modal-title text-white" id="modalbarangTitle">
                                                    Barcode Product Code </h5>
                                                <button type="button" class="close" data-bs-dismiss="modal"
                                                    aria-label="Close">
                                                    <i data-feather="x"></i>
                                                </button>
                                            </div>
                                            <div class="modal-body-wrapper">
                                                <div class="modal-body">
                                                    <div class="d-flex justify-content-center">
                                                        <div class="col-8 col-md-12 order-md-2 my-4">
                                                            <div class="d-flex justify-content-center">
                                                                <div id="barcodebarang" class="barcodebarang">
                                                                    <svg id="barcode2"></svg>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-light-secondary"
                                                    data-bs-dismiss="modal">
                                                    <i class="bx bx-x d-block d-sm-none"></i>
                                                    <span class="d-none d-sm-block">Close</span>
                                                </button>
                                                <button type="button" class="btn btn-primary ml-1">
                                                    <i class="bx bx-check d-block d-sm-none"></i>
                                                    <span class="d-none d-sm-block print"
                                                        onclick="barang.printbarang()">Print</span>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group position-relative has-icon-left">
                                <input type="text" class="form-control text-center" name="adj" id="adj"
                                    placeholder="Variable" oninput="batch()" required>
                                <div class="form-control-icon">
                                    <i class="iconly-boldScan"></i>
                                </div>
                            </div>
                            <div class="form-group position-relative has-icon-left">
                                <input type="text" class="form-control text-center" name="batchcode" id="batchcode"
                                    placeholder="Batch Code" required>
                                <div class="form-control-icon">
                                    <i class="iconly-boldScan"></i>
                                </div>
                            </div>
                            <div class="form-group position-relative has-icon-left">
                                <div class="row">
                                    <div class="col">
                                        <a onclick="reset();" class="btn btn-danger col-12">Clear All</a>
                                    </div>
                                    <div class="col">
                                        <a class="btn btn-primary col-12" id="kosong" data-bs-toggle="modal"
                                            onclick="generatebarcode()" data-bs-target="#exampleModalCenter">Barcode</a>
                                    </div>
                                </div>
                            </div>
                            <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog"
                                aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered modal-dialog-centered modal-dialog-scrollable"
                                    role="document">
                                    <div class="modal-content">
                                        <div class="modal-header bg-primary">
                                            <h5 class="modal-title text-white" id="exampleModalCenterTitle">
                                                Barcode Batch Code </h5>
                                            <button type="button" class="close" data-bs-dismiss="modal"
                                                aria-label="Close">
                                                <i data-feather="x"></i>
                                            </button>
                                        </div>
                                        <div class="modal-body-wrapper">
                                            <div class="modal-body">
                                                <div class="d-flex justify-content-center">
                                                    <div class="col-8 col-md-12 order-md-2 my-4">
                                                        <div class="d-flex justify-content-center">
                                                            <div id="barcodea" class="barcode">
                                                                <svg id="barcode"></svg>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-light-secondary"
                                                data-bs-dismiss="modal">
                                                <i class="bx bx-x d-block d-sm-none"></i>
                                                <span class="d-none d-sm-block">Close</span>
                                            </button>
                                            <button type="button" class="btn btn-primary ml-1">
                                                <i class="bx bx-check d-block d-sm-none"></i>
                                                <span class="d-none d-sm-block print"
                                                    onclick="myApp.printDiv()">Print</span>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Modal -->
            <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
                aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-scrollable modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="staticBackdropLabel">BARCODE TAB</h5>
                            <a type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></a>
                        </div>
                        <div class="modal-body">

                            <img style="max-width:35%" src="<?= base_url()?>/assets/images/logo/image.png"
                                class="rounded mx-auto d-block" alt="Barcode Tab">
                            <!-- <img style="max-width:150%" src="<?= base_url()?>/assets/images/logo/image.png"> -->

                        </div>
                    </div>
                </div>
            </div>
            <!-- akhir modal -->
        </section>
    </div>
</div>

<script src="<?= base_url();?>/assets/alrt/sweetalert2.all.min.js"></script>
<script src="<?= base_url();?>/assets/js/core/qc.js"></script>
<script type="text/javascript" src="<?= base_url();?>/assets/js/JsBarcode.all.min.js"></script>
<script type="text/javascript">
window.onload = function() {
    reset();
    var input = document.getElementById("batchcode").focus();

}

function batch() {
    var valuesup = document.getElementById("master_supplier").value;
    var valueprod = document.getElementById("master_barang").value;
    var adj = document.getElementById("adj").value;
    var today = new Date();
    var dd = String(today.getDate()).padStart(2, '0');
    var mm = String(today.getMonth() + 1).padStart(2, '0'); //January is 0!
    var yyyy = today.getFullYear();
    var yyyy = yyyy.toString().substr(-2);
    month = mm
    today = dd + yyyy;
    document.getElementById("batchcode").value = valuesup + today + valueprod + month + adj;
}


function reset() {
    // document.getElementById("postpacking").reset();
    document.getElementById("batchcode").value = '';
    document.getElementById("master_barang").value = '';
    document.getElementById("adj").value = '';
    document.getElementById("master_supplier").value = '';
    document.getElementById("batchcode").focus();
}


function generatebarcode() {
    var valuebarcode = document.getElementById("batchcode").value;
    JsBarcode("#barcode", valuebarcode, {
        format: "CODE128",
        lineColor: "#000000",
        width: 2,
        height: 45,
        displayValue: true
    });
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

function generatebarcodebarang() {
    var valuebarcode = document.getElementById("master_barang").value;
    JsBarcode("#barcode2", valuebarcode, {
        format: "CODE128",
        lineColor: "#000000",
        width: 2,
        height: 45,
        displayValue: true
    });
}



var barang = new function() {
    this.printbarang = function() {
        // Store DIV contents in the variable.
        var div = document.getElementById('barcodebarang');
        // Create a window object.
        // Open the window. Its a popup window.
        var win = window.open('', '', 'height=700,width=700');
        // Write contents in the new window.
        win.document.write(div.outerHTML);
        win.document.close();
        win.print(); // Finally, print the contents.
    }
}

function generatebarcodesup() {
    var valuebarcode = document.getElementById("master_supplier").value;
    JsBarcode("#barcode1", valuebarcode, {
        format: "CODE128",
        lineColor: "#000000",
        width: 2,
        height: 45,
        displayValue: true
    });
}



var sup = new function() {
    this.printsup = function() {
        // Store DIV contents in the variable.
        var div = document.getElementById('barcodesup');
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
<?= $this->endSection() ?>