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
                <h3>Packing</h3>
                <p class="text-subtitle text-muted">Packing Proses.</p>
            </div>
            <div class="col-12 col-md-8 order-md-1 order-first"></div>
            <div class="col-12 col-md-2 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="<?= base_url()?>/">Dashboard </a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Packing</li>
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
                            <h4 class="card-title">Warehouse Panel</h4>
                        </div>
                        <div class="col">
                            <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end"
                                type="button" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item">Release Holding</li>
                                    <li class="breadcrumb-item active" aria-current="page">
                                        <?= $releasedata?>
                                    </li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                    <hr>
                </div>
                <div class="card-body">
                    <form id="postpacking">
                        <div class="row">
                            <div class="col-md-4">
                                <a type="button" class="btn btn-primary"
                                    onclick=" window.open('<?= base_url()?>/data_packing','_blank')">Detail Data </a>
                                <script>
                                function validasi_data_holding_temp() {
                                    var container = document.getElementById("RQ2_KodeKontainer").value;

                                    <?php $tambah = 0?>
                                    <?php $tambah_log = 0?>
                                    <?php foreach($release_datas as $hold): ?>
                                    <?php $tambah++;?>
                                    <?php $tambah_log++;?>
                                    if (container == "<?php echo $hold['R_Kontainer'];?>") {
                                        $("#info_data<?php echo $tambah++;?>").text(
                                            "[<?= $hold['R_NamaProduk']?>]");
                                        $("#info_data<?php echo $tambah++;?>").text("<?= $hold['R_QTY']?> pcs");
                                        $("#info_data<?php echo $tambah++;?>").text("<?= $hold['R_KodeBatch']?>");
                                        document.getElementById("RQ2_KodeKontainer").setAttribute('readonly',
                                            'readonly');
                                        document.getElementById('K_Kodebatch').removeAttribute('readonly');
                                        document.getElementById('tpacking_tipebox').disabled = false;
                                        // document.getElementById('K_KodeDus').removeAttribute('readonly');
                                        document.getElementById('K_QTY').removeAttribute('readonly');
                                        document.getElementById('adj').removeAttribute('readonly');
                                        document.getElementById("tpacking_tipebox").focus();

                                    }
                                    <?php endforeach; ?>

                                }
                                </script>
                                <div style="width: 80%">
                                    <?php for($banding = 1; $banding <= $tambah; $banding++): ?>
                                    <span class="text-muted" id="info_data<?php echo $banding?>"></span>

                                    <?php endfor; ?>
                                </div>
                            </div>
                            <div class="col">
                                <div class="col-12 d-flex justify-content-end">
                                    <a type="submit" id="store" href="<?= base_url()?>/pindahpacking"
                                        class="btn btn-primary mx-2" hidden>Save</a>
                                    <a onclick="window.location.reload();" class="btn btn-danger">Reset</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-8 order-md-2 mx-auto my-4" style="width: 150px; height: 150px">
                            <div class="col-md-12 my-4">
                                <div class="stats-icon darkblue" style="width: 150px; height: 150px">
                                    <i class="iconly-boldDocument" style="font-size:500%"></i>
                                </div>
                            </div>
                        </div>
                        <div class="my-2">
                            <h3 class="text-center">Scan Product</h3>
                            <div class="col-12 col-md-6 order-md-2 mx-auto mt-3">
                                <div class="form-group position-relative has-icon-left">
                                    <input type="text" class="form-control text-center" name="RQ2_KodeKontainer"
                                        id="RQ2_KodeKontainer" oninput="validasi_data_holding_temp()"
                                        value="<?php if ($get_kontainer_packing){echo $get_kontainer_packing;} ?>"
                                        placeholder="Code Container" autofocus required>
                                    <div class="form-control-icon">
                                        <i class="iconly-boldTicket"></i>
                                    </div>
                                </div>
                                <div class="input-group mb-3">
                                    <label class="input-group-text" for="tpacking_tipebox">Type Box</label>
                                    <input type="text" list="tipebox" class="form-select" name="tpacking_tipebox"
                                        id="tpacking_tipebox" onchange="box()" autocomplete="off" disabled>
                                    <datalist id="tipebox">
                                        <?php foreach($tipebox as $b){ ?>
                                        <option value="<?php echo $b['mb_kode']; ?>"><?php echo $b['mb_nama']; ?>
                                        </option>
                                        <?php } ?>
                                    </datalist>
                                </div>

                                <span class="text-muted" id="salah"></span>
                                <input type="text" class="form-control text-center" name="K_NamaProduk"
                                    id="K_NamaProduk" placeholder="Product Name" hidden required>
                                <div class="form-group position-relative has-icon-left">
                                    <input type="text" class="form-control text-center" name="K_Kodebatch"
                                        id="K_Kodebatch" oninput="enable(),box(),namaproduk()" placeholder="Batch Code"
                                        required readonly>
                                    <div class="form-control-icon">
                                        <i class="iconly-boldScan"></i>
                                    </div>
                                </div>

                                <div class="form-group position-relative has-icon-left">
                                    <input type="text" class="form-control text-center" name="adj" id="adj"
                                        placeholder="Variable" oninput="box()" readonly required>
                                    <div class="form-control-icon">
                                        <i class="iconly-boldScan"></i>
                                    </div>
                                </div>
                                <div class="form-group position-relative has-icon-left">
                                    <input type="hidden" name="K_Datetime" id="K_Datetime"
                                        value="<?php date_default_timezone_set('Asia/Jakarta'); echo date ('Y-m-d H:i:s');?>">
                                </div>
                                <div class="input-group mb-3">
                                    <label class="input-group-text" for="K_QTY">QTY</label>
                                    <input type="number" min="1" class="form-control text-center" name="K_QTY"
                                        id="K_QTY" placeholder="1" value="1" required readonly>
                                </div>
                                <div class="row">
                                    <div class="col-md-9">
                                        <div class="form-group position-relative has-icon-left">
                                            <input type="text" class="form-control text-center" name="K_KodeDus"
                                                id="K_KodeDus" placeholder="Code Box" required readonly>
                                            <div class="form-control-icon">
                                                <i class="iconly-boldScan"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <a class="btn btn-outline-success" id="kosong" data-bs-toggle="modal"
                                                onclick="generatebarcode()" data-bs-target="#exampleModalCenter"
                                                style="margin-left:8px;">Barcode</a>
                                        </div>
                                    </div>
                                    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog"
                                        aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered modal-dialog-centered modal-dialog-scrollable"
                                            role="document">
                                            <div class="modal-content">
                                                <div class="modal-header bg-primary">
                                                    <h5 class="modal-title text-white" id="exampleModalCenterTitle">
                                                        Barcode Box Code </h5>
                                                    <a type="button" class="close" data-bs-dismiss="modal"
                                                        aria-label="Close">
                                                        <i data-feather="x"></i>
                                                    </a>
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
                                                    <a type="button" class="btn btn-light-secondary"
                                                        data-bs-dismiss="modal">
                                                        <i class="bx bx-x d-block d-sm-none"></i>
                                                        <span class="d-none d-sm-block">Close</span>
                                                    </a>
                                                    <a type="button" class="btn btn-primary ml-1">
                                                        <i class="bx bx-check d-block d-sm-none"></i>
                                                        <span class="d-none d-sm-block print"
                                                            onclick="myApp.printDiv()">Print</span>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group position-relative has-icon-left">
                                    <input type="text" class="form-control text-center" name="K_PIC" id="K_PIC"
                                        value="<?= user()->username; ?>" placeholder="<?= user()->username; ?>"
                                        readonly>
                                    <div class="form-control-icon">
                                        <i class="iconly-boldProfile"></i>
                                    </div>
                                </div>
                                <div class="form-group position-relative has-icon-left">
                                    <div class="row" id="buttonadd" hidden>
                                        <div class="col">
                                            <a class="btn btn-outline-primary col-12" onclick="buttonstore(),add()">Add
                                                Data</a>
                                        </div>
                                        <div class="col">
                                            <a onclick="reset();" class="btn btn-outline-danger col-12">Clear</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <table class="table" id="packingtable"></table>
                        </div>
                    </form>
                </div>
            </div>
            <!-- Modal -->
            <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
                aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-scrollable modal-xl">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="staticBackdropLabel">DATA HOLDING</h5>
                            <a type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></a>
                        </div>
                        <div class="modal-body">
                            <div class="container my-4"
                                style="border: 1px solid; border-color: #435ebe; border-radius: 25px;  padding-bottom: 25px; padding-left: 50px; padding-right: 50px; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);">
                                <p>
                                <h1 style="text-align:center">Holding List</h1>
                                </p>
                                <div class="d-flex justify-content-end my-2">
                                </div>
                                <table class="table my-2" id="master_list">
                                    <thead>
                                        <tr>
                                            <th style="width: 5%">No</th>
                                            <th style="width: 20%">Date</th>
                                            <th>Container</th>
                                            <th>Batch</th>
                                            <th>Produk</th>
                                            <th style="width: 10%">QTY</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $key = 0?>
                                        <?php if($release_datas): ?>
                                        <?php foreach($release_datas as $produksi): ?>

                                        <tr>
                                            <td><?= ++$key ?></td>
                                            <td><?php echo date('d-m-Y, H:i:s',strtotime($produksi['R_Datetime'])); ?>
                                            </td>
                                            <td><?php echo $produksi['R_Kontainer']; ?></td>
                                            <td><?php echo $produksi['R_KodeBatch']; ?></td>
                                            <td><?php echo $produksi['R_NamaProduk']; ?></td>
                                            <td><?php echo $produksi['R_QTY']; ?></td>

                                        </tr>
                                        <?php endforeach; ?>
                                        <?php endif; ?>


                                    </tbody>
                                </table>
                            </div>
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


<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
<script type="text/javascript" src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
<script type="text/javascript">
$(document).ready(function() {
    $('#master_list').DataTable();

});
window.onload = function() {
    reload_table();
    locksave();
    reset();
    lock_kontainer();
    var input = document.getElementById("RQ2_KodeKontainer").focus();

}

function reload_table() {
    $.ajax({
        url: "<?php echo site_url('data_tempacking')?>",
        beforSend: function(f) {
            $('#packingtable').html('Load Data.')
            document.getElementById("tpacking_tipebox").focus();
        },
        success: function(data) {
            $('#packingtable').html(data)
            document.getElementById("tpacking_tipebox").focus();
        }
    });
    // var a= $('#wms').html(data);
    // console.log(a);
    validasi_data_holding_temp();
}

function lock_kontainer() {
    var cek = document.getElementById("RQ2_KodeKontainer").value;
    if (cek == "") {
        document.getElementById("RQ2_KodeKontainer").removeAttribute('readonly',
            'readonly');
    } else {
        document.getElementById("RQ2_KodeKontainer").setAttribute('readonly',
            'readonly');
    }

}

function buttonstore() {

    document.getElementById('store').removeAttribute('hidden', 'hidden');
}

function locksave() {
    var cek = "";
    <?php if ($data_tabels):?>
    <?php foreach ($data_tabels as $c): ?>
    cek = "<?php echo $c["K_Kodebatch"];?>";
    <?php endforeach; ?>
    <?php endif;?>
    if (cek != "") {
        document.getElementById('store').removeAttribute('hidden', 'hidden');
    } else {
        document.getElementById('store').setAttribute('hidden', 'hidden');
    }

}

function enable() {
    var kontainer = document.getElementById("RQ2_KodeKontainer").value;
    var batch = document.getElementById("K_Kodebatch").value;
    <?php if ($release_datas): ?>
    <?php $a=0; foreach ($release_datas as $batch): $a++; ?>
    var isi_kontainer<?= $a?> = "<?php echo $batch["R_Kontainer"]; ?>";
    var isi_batch<?= $a?> = "<?php echo $batch["R_KodeBatch"]; ?>";
    if (kontainer == isi_kontainer<?= $a?>) {
        if (batch == isi_batch<?= $a?>) {
            document.getElementById('buttonadd').removeAttribute('hidden', 'hidden');
            $("#salah").text("");
            return
        }
    }
    <?php endforeach; ?>
    if (batch != isi_batch<?= $a?>) {
        document.getElementById('buttonadd').setAttribute('hidden', 'hidden');
        $("#salah").text("Batch Code Not Found");
    }
    if (batch == "") {
        document.getElementById('buttonadd').setAttribute('hidden', 'hidden');
        $("#salah").text("");
        return
    }
    <?php endif; ?>
}

function copy2() {
    var kontainer_copy = document.getElementById("RQ2_KodeKontainer").value;
    console.log(kontainer_copy);
    document.getElementById("RQ2_KodeKontainer2").value = kontainer_copy;
}

function namaproduk() {
    var valuebatch = document.getElementById("K_Kodebatch").value;
    var valuebatch = valuebatch.toString().substr(6, 3);
    <?php if($masterbarang): ?>
    <?php foreach($masterbarang as $produksi): ?>
    if (valuebatch == "<?php echo $produksi['mbr_kode'];?>") {
        document.getElementById("K_NamaProduk").value = "<?= $produksi['mbr_produk'];?>";

    }
    if (valuebatch == "") {
        document.getElementById("K_NamaProduk").value = "";
    }
    <?php endforeach; ?>
    <?php endif; ?>
}

function reset() {
    // document.getElementById("postpacking").reset();
    document.getElementById("K_Kodebatch").value = '';
    document.getElementById("tpacking_tipebox").value = '';
    document.getElementById("adj").value = '';
    document.getElementById("K_KodeDus").value = '';
    document.getElementById("K_QTY").value = '1';
    document.getElementById("tpacking_tipebox").focus();
}

function reset2() {
    document.getElementById('buttonadd').setAttribute('hidden', 'hidden');
    // document.getElementById("postpacking").reset();
    document.getElementById("K_Kodebatch").value = '';
    document.getElementById("tpacking_tipebox").value = '';
    document.getElementById("adj").value = '';
    document.getElementById("K_KodeDus").value = '';
    document.getElementById("K_QTY").value = '1';
    document.getElementById("tpacking_tipebox").focus();
}

function add() {
    var url;
    $.ajax({
        url: "<?php echo site_url('add_packing')?>",
        type: "POST",
        data: $('#postpacking').serialize(),
        success: function(data) {
            reset2();
            reload_table();
            // location.reload();
        }
    });
}

function del_check() {
    var checkbox = $('.delete_checkbox:checked');
    if (checkbox.length > 0) {
        var checkbox_value = [];
        $(checkbox).each(function() {
            checkbox_value.push($(this).val());
        });
        console.log(checkbox_value);
        $.ajax({
            url: "<?php echo base_url(); ?>/delcek_packing",
            method: "POST",
            data: {
                checkbox_value: checkbox_value
            },
            success: function() {
                $('.removeRow').fadeOut(1500);
            }
        })
    } else {
        alert('Select atleast one records');
    }
    reload_table();
    // location.reload();
}

function deletee(K_No, K_Kodebatch, RQ2_KodeKontainer, K_QTY) {
    var url;
    $.ajax({
        url: "<?php echo site_url('del_packing')?>",
        type: "POST",
        dataType: 'json',
        data: { //sesuaikan dengan tabel data yang bawah
            K_No: K_No,
            K_Kodebatch: K_Kodebatch,
            RQ2_KodeKontainer: RQ2_KodeKontainer,
            K_QTY: K_QTY
        },
    });
    reload_table();
    // location.reload();
}

function generatebarcode() {
    var valuebarcode = document.getElementById("K_KodeDus").value;
    JsBarcode("#barcode", valuebarcode, {
        format: "CODE128",
        lineColor: "#000000",
        width: 2,
        height: 45,
        displayValue: true
    });
}

function box() {
    var valuebox = document.getElementById("tpacking_tipebox").value;
    var valuebatch = document.getElementById("K_Kodebatch").value;
    valuebatch = valuebatch.toString().substr(6, 3);
    var today = new Date();
    var dd = String(today.getDate()).padStart(2, '0');
    var mm = String(today.getMonth() + 1).padStart(2, '0'); //January is 0!
    var yyyy = today.getFullYear();
    var yyyy = yyyy.toString().substr(-2);
    today = yyyy + mm + dd;
    var adj = document.getElementById("adj").value;
    text = "-"
    document.getElementById("K_KodeDus").value = valuebox + today + valuebatch + text + adj;

    <?php if($masterbarang): ?>
    <?php foreach($masterbarang as $produksi): ?>
    // if (valuebatch == <?php echo $produksi['mbr_kode'];?>) {
    //     document.getElementById("K_NamaProduk").value = "<?= $produksi['mbr_produk'];?>";
    // }

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
document.onkeyup = function(e) {
    var e = e || window.event;
    if (e.altKey && e.which == 49) {
        document.getElementById("RQ2_KodeKontainer").value = '';
        document.getElementById("RQ2_KodeKontainer").focus();
        return false;
    }
    if (e.altKey && e.which == 50) {
        document.getElementById("tpacking_tipebox").value = '';
        document.getElementById("tpacking_tipebox").focus();
        return false;
    }
    if (e.altKey && e.which == 51) {
        document.getElementById("K_Kodebatch").value = '';
        document.getElementById("K_Kodebatch").focus();
        return false;
    }
    if (e.altKey && e.which == 52) {
        document.getElementById("adj").value = '';
        document.getElementById("adj").focus();
        return false;
    }
    if (e.altKey && e.which == 53) {
        document.getElementById("K_QTY").value = '';
        document.getElementById("K_QTY").focus();
        return false;
    }
}
document.addEventListener("keydown", function(event) {
    if (event.keyCode === 13) {
        if (document.getElementById("tpacking_tipebox").value != "" &&
            document.getElementById("K_Kodebatch").value != "" &&
            document.getElementById("adj").value != "" &&
            document.getElementById("K_QTY").value != "" &&
            document.getElementById("K_KodeDus").value != "") {
            add();
            buttonstore();
            return
        }
    }
})
</script>

<?= $this->endSection() ?>