<?= $this->extend('basecore/basemain');?>
<?= $this->section('pageconten')?>
<div class="flash-data" data-flashdata="<?= session()->getFlashdata('flashdata');?>"></div>
<!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.css" integrity="sha512-HHsOC+h3najWR7OKiGZtfhFIEzg5VRIPde0kB0bG2QRidTQqf+sbfcxCTB16AcFB93xMjnBIKE29/MjdzXE+qw==" crossorigin="anonymous" referrerpolicy="no-referrer" /> -->
<!-- <script src="https://kit.fontawesome.com/fd8462dc4d.js" crossorigin="anonymous"></script> -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="<?= base_url();?>/assets/vendors/iconly/bold.css">
<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-2 order-md-1 order-last">
                <h3>Reject Holding</h3>
                <p class="text-subtitle text-muted">Panel QC Reject Holding.</p>
            </div>
            <div class="col-12 col-md-8 order-md-1 order-first">
                <div class="row ">
                    <div class="row justify-content-md-center">
                        <div class="col-6 col-lg-3 col-md-6 mx-2" type="button" data-bs-toggle="modal"
                            data-bs-target="#sstaticBackdrop">
                            <div class="card col-12 col-lg-12 col-md-12">
                                <div class="card-body px-3 py-4-5">
                                    <div class="row">
                                        <div class="col-md-2">
                                            <div class="stats-icon yellow">
                                                <i class="iconly-boldAdd-User"></i>
                                            </div>
                                        </div>
                                        <div class="col-md-8">
                                            <h6 class="text-muted font-semibold">Sun San</h6>
                                            <h6 class="font-extrabold mb-0"><?= $sunsandata ?></h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-6 col-lg-3 col-md-6 mx-2" type="button" data-bs-toggle="modal"
                            data-bs-target="#rprstaticBackdrop">
                            <div class="card col-12 col-lg-12 col-md-12">
                                <div class="card-body px-3 py-4-5">
                                    <div class="row">
                                        <div class="col-md-2">
                                            <div class="stats-icon green">
                                                <i class="iconly-boldSwap"></i>
                                            </div>
                                        </div>
                                        <div class="col-md-8">
                                            <h6 class="text-muted font-semibold">Repair</h6>
                                            <h6 class="font-extrabold mb-0"><?= $repairdata ?></h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-2 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?= base_url()?>/">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Quality Control</li>
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
                            <h4 class="card-title">Quality Control Panel</h4>
                        </div>
                        <div class="col">
                            <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end"
                                type="button" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item">Reject Holding</li>
                                    <li class="breadcrumb-item active" aria-current="page">
                                        <?= $rejectdata?>
                                    </li>
                                </ol>
                            </nav>
                        </div>

                    </div>
                    <hr>
                </div>
                <div class="card-body">
                    <form id="qc_holding">
                        <div class="row">
                            <div class="col-md-4">
                                <input type="text" class="form-control" name="P2_KodeKontainer" id="P2_KodeKontainer"
                                    value="<?php if ($get_kontainer_qcholding){echo $get_kontainer_qcholding;} ?>"
                                    placeholder="Code Container Reject Holding" oninput="validasi_data_holding_temp()"
                                    required>
                                <script>
                                function validasi_data_holding_temp() {
                                    var container = document.getElementById("P2_KodeKontainer").value;

                                    <?php $tambah = 0?>
                                    <?php $tambah_log = 0?>
                                    <?php foreach($reject_datas as $hold): ?>
                                    <?php $tambah++;?>
                                    <?php $tambah_log++;?>
                                    if (container == "<?php echo $hold['P2_KodeKontainer'];?>") {
                                        $("#info_data<?php echo $tambah++;?>").text(
                                            "[<?= $hold['RJT_NamaProduk']?>]");
                                        $("#info_data<?php echo $tambah++;?>").text("<?= $hold['RJT_QTY']?> pcs");
                                        $("#info_data<?php echo $tambah++;?>").text("<?= $hold['RJT_KodeBatch']?>");
                                        document.getElementById("P2_KodeKontainer").setAttribute('readonly',
                                            'readonly');
                                        document.getElementById('Q2_KodeBatch').removeAttribute('readonly');
                                        document.getElementById('Q2_KodeKontainer').removeAttribute('readonly');
                                        document.getElementById('Q2_Kategori').disabled = false;
                                        document.getElementById('Q2_QTY').removeAttribute('readonly');
                                        document.getElementById("Q2_KodeBatch").focus();
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
                                    <a type="submit" id="store" class="btn btn-primary mx-2"
                                        href="<?= base_url()?>/move_holding" hidden>Save</a>
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
                            <div class="col-12 col-md-5 order-md-2 mx-auto mt-3">
                                <div class="form-group position-relative has-icon-left">
                                    <input type="text" class="form-control text-center" name="Q2_NamaProduk"
                                        id="Q2_NamaProduk" placeholder="Product Name" required readonly>
                                    <div class="form-control-icon">
                                        <i class="iconly-boldHeart"></i>
                                    </div>
                                </div>
                                <span class="text-muted" id="salah"></span>
                                <div class="form-group position-relative has-icon-left">
                                    <input type="text" class="form-control text-center" name="Q2_KodeBatch"
                                        id="Q2_KodeBatch" oninput="enable(),namaproduk()" placeholder="Batch Code"
                                        required readonly>
                                    <div class="form-control-icon">
                                        <i class="iconly-boldScan"></i>
                                    </div>
                                </div>
                                <div class="input-group mb-3">
                                    <label class="input-group-text" for="Category">Category</label>
                                    <input oninput="enable()" type="text" list="Categoryku" class="form-select"
                                        name="Q2_Kategori" id="Q2_Kategori" autocomplete="off" disabled>
                                    <datalist id="Categoryku">
                                        <option value="Sunsan" id="Sunsan">Sunsan</option>
                                        <option value="Repair" id="Repair">Repair</option>
                                    </datalist>
                                </div>
                                <div class="form-group position-relative has-icon-left">
                                    <input oninput="enable()" type="text" class="form-control text-center"
                                        name="Q2_KodeKontainer" id="Q2_KodeKontainer" placeholder="Container Code"
                                        required readonly>
                                    <div class="form-control-icon">
                                        <i class="iconly-boldScan"></i>
                                    </div>
                                </div>

                                <div class="form-group position-relative has-icon-left">
                                    <input type="hidden" name="Q2_Datetime" id="Q2_Datetime"
                                        value="<?php date_default_timezone_set('Asia/Jakarta'); echo date ('Y-m-d H:i:s');?>">
                                </div>

                                <div class="input-group mb-3">
                                    <label class="input-group-text" for="Q2_QTY">QTY</label>
                                    <input type="number" min="1" class="form-control text-center" name="Q2_QTY"
                                        value="1" id="Q2_QTY" placeholder="1" readonly>
                                </div>
                                <div class="form-group position-relative has-icon-left">
                                    <input type="text" class="form-control text-center" name="Q2_PIC" id="Q2_PIC"
                                        value="<?= user()->username; ?>" placeholder="<?= user()->username; ?>"
                                        readonly>
                                    <div class="form-control-icon">
                                        <i class="iconly-boldProfile"></i>
                                    </div>
                                </div>
                                <div class="form-group position-relative has-icon-left">
                                    <div class="row" id="buttonadd">
                                        <div class="col">
                                            <a class="btn btn-outline-primary col-12" onclick="add(),buttonstore()">Add
                                                Data</a>
                                        </div>
                                        <div class="col">
                                            <a onclick="reset();" class="btn btn-outline-danger col-12">Clear</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <table class="table" id="holdingtable"></table>
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
                            <h5 class="modal-title" id="staticBackdropLabel">DATA REJECT HOLDING</h5>
                            <a type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></a>
                        </div>
                        <div class="modal-body">
                            <div class="container my-4"
                                style="border: 1px solid; border-color: #435ebe; border-radius: 25px;  padding-bottom: 25px; padding-left: 50px; padding-right: 50px; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);">
                                <p>
                                <h1 style="text-align:center">Reject Holding List</h1>
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
                                        <?php if($reject_datas): ?>
                                        <?php foreach($reject_datas as $produksi): ?>

                                        <tr>
                                            <td><?= ++$key ?></td>
                                            <td><?php echo date('d-m-Y, H:i:s',strtotime($produksi['RJT_Datetime'])); ?>
                                            </td>
                                            <td><?php echo $produksi['P2_KodeKontainer']; ?></td>
                                            <td><?php echo $produksi['RJT_KodeBatch']; ?></td>
                                            <td><?php echo $produksi['RJT_NamaProduk']; ?></td>
                                            <td><?php echo $produksi['RJT_QTY']; ?></td>

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
            <!-- Modal Sunsan-->
            <div class="modal fade" id="sstaticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false"
                tabindex="-1" aria-labelledby="sstaticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-scrollable modal-xl">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="sstaticBackdropLabel">SUNSAN PRODUCT
                            </h5>
                            <a type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></a>
                        </div>
                        <div class="modal-body">
                            <div class="container my-4"
                                style="border: 1px solid; border-color: #435ebe; border-radius: 25px;  padding-bottom: 25px; padding-left: 50px; padding-right: 50px; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);">
                                <p>
                                <h1 style="text-align:center">Sunsan Product List</h1>
                                </p>
                                <div class="d-flex justify-content-end my-2">
                                </div>
                                <table class="table my-2" id="master_list2">
                                    <thead>
                                        <tr>
                                            <th style="width: 5%">No</th>
                                            <th style="width: 15%">Date</th>
                                            <th style="width: 15%">Container Code</th>
                                            <th style="width: 15%">Batch</th>
                                            <th>Product</th>
                                            <th style="width: 15%">QTY</th>
                                            <th style="width: 15%">PIC</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $key = 0?>
                                        <?php if($sunsandatas): ?>
                                        <?php foreach($sunsandatas as $sunsan): ?>
                                        <tr>
                                            <td><?= ++$key ?></td>
                                            <td><?php echo date('d-m-Y, H:i:s',strtotime($sunsan['S_Datetime'])); ?>
                                            </td>
                                            <td><?php echo $sunsan['S_Kontainer']; ?></td>
                                            <td><?php echo $sunsan['S_KodeBatch']; ?></td>
                                            <td><?php echo $sunsan['S_NamaProduk']; ?></td>
                                            <td><?php echo $sunsan['S_QTY']; ?></td>
                                            <td><?php echo $sunsan['S_PIC']; ?></td>
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
            <!-- Akhir Modal Sunsan-->
            <!-- Modal Repair-->
            <div class="modal fade" id="rprstaticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false"
                tabindex="-1" aria-labelledby="rprstaticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-scrollable modal-xl">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="rprstaticBackdropLabel">REPAIR PRODUCT
                            </h5>
                            <a type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></a>
                        </div>
                        <div class="modal-body">
                            <div class="container my-4"
                                style="border: 1px solid; border-color: #435ebe; border-radius: 25px;  padding-bottom: 25px; padding-left: 50px; padding-right: 50px; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);">
                                <p>
                                <h1 style="text-align:center">Repair Product List</h1>
                                </p>
                                <div class="d-flex justify-content-end my-2">
                                </div>
                                <table class="table my-2" id="master_list3">
                                    <thead>
                                        <tr>
                                            <th style="width: 5%">No</th>
                                            <th style="width: 15%">Date</th>
                                            <th>Container Code</th>
                                            <th style="width: 15%">Batch Code</th>
                                            <th>Product</th>
                                            <th style="width: 15%">QTY Total</th>
                                            <th style="width: 15%">PIC</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $key = 0?>
                                        <?php if($repairdatas): ?>
                                        <?php foreach($repairdatas as $repair): ?>
                                        <tr>
                                            <td><?= ++$key ?></td>
                                            <td><?php echo date('d-m-Y, H:i:s',strtotime($repair['RPR_Datetime'])); ?>
                                            </td>
                                            <td><?php echo $repair['R_KodeKontainer']; ?></td>
                                            <td><?php echo $repair['RPR_KodeBatch']; ?></td>
                                            <td><?php echo $repair['RPR_NamaProduk']; ?></td>
                                            <td><?php echo $repair['RPR_QTY']; ?></td>
                                            <td><?php echo $repair['RPR_PIC']; ?></td>

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
            <!-- Akhir Modal Repair-->
        </section>
    </div>
</div>

<script src="<?= base_url();?>/assets/alrt/sweetalert2.all.min.js"></script>
<script src="<?= base_url();?>/assets/js/core/qc.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
<script type="text/javascript" src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
<script type="text/javascript">
$(document).ready(function() {
    $('#master_list').DataTable();
    $('#master_list2').DataTable();
    $('#master_list3').DataTable();

});

window.onload = function() {
    reload_table();
    locksave();
    reset();
    var input = document.getElementById("P2_KodeKontainer").focus();
}


function reload_table() {
    $.ajax({
        url: "<?php echo site_url('data_qcholding')?>",
        beforSend: function(f) {
            $('#holdingtable').html('Load Data.')
        },
        success: function(data) {
            $('#holdingtable').html(data)
        }
    });
    validasi_data_holding_temp();
}

function locksave() {
    var cek = "";
    <?php if ($data_tabels):?>
    <?php foreach ($data_tabels as $c): ?>
    cek = "<?php echo $c["Q2_KodeBatch"];?>";
    <?php endforeach; ?>
    <?php endif;?>
    if (cek != "") {
        document.getElementById('store').removeAttribute('hidden', 'hidden');
    } else {
        document.getElementById('store').setAttribute('hidden', 'hidden');
    }
}

function buttonstore() {
    document.getElementById('store').removeAttribute('hidden', 'hidden');

}

function enable() {
    var kontainer = document.getElementById("P2_KodeKontainer").value;
    var batch = document.getElementById("Q2_KodeBatch").value;
    // if ("1" == "1") {
    <?php if ($reject_datas): ?>
    <?php $a=0; foreach ($reject_datas as $batch): $a++; ?>

    var isi_kontainer<?= $a?> = "<?php echo $batch["P2_KodeKontainer"]; ?>";
    var isi_batch<?= $a?> = "<?php echo $batch["RJT_KodeBatch"]; ?>";

    if (kontainer == isi_kontainer<?= $a?>) {
        if (batch == isi_batch<?= $a?>) {
            if (document.getElementById("Q2_NamaProduk").value != "" &&
                document.getElementById("Q2_KodeBatch").value != "" &&
                document.getElementById("Q2_Kategori").value != "" &&
                document.getElementById("Q2_KodeKontainer").value != "") {
                document.getElementById('buttonadd').removeAttribute('hidden', 'hidden');
                return
            } else {
                document.getElementById('buttonadd').setAttribute('hidden', 'hidden');
            }
            $("#salah").text("");
            return
        }
    }
    if (batch == "") {
        document.getElementById('buttonadd').setAttribute('hidden', 'hidden');
        $("#salah").text("");
        return
    }
    <?php endforeach; ?>
    // }
    if (batch != isi_batch<?= $a?>) {
        document.getElementById('buttonadd').setAttribute('hidden', 'hidden');
        $("#salah").text("Batch Code Not Found");
        return
    }

    <?php endif; ?>



}

function namaproduk() {
    var valuebatch = document.getElementById("Q2_KodeBatch").value;
    var valuebatch = valuebatch.toString().substr(6, 3);
    <?php if($masterbarang): ?>
    <?php foreach($masterbarang as $produksi): ?>

    if (valuebatch == "<?php echo $produksi['mbr_kode'];?>") {
        document.getElementById("Q2_NamaProduk").value = "<?= $produksi['mbr_produk'];?>";
        document.getElementById('btn_insert').disabled = false;
    }
    <?php endforeach; ?>
    <?php endif; ?>

}

function reset() {
    document.getElementById('buttonadd').setAttribute('hidden', 'hidden');
    document.getElementById("qc_holding").reset();
    document.getElementById("Q2_KodeBatch").focus();
    document.getElementById("Q2_KodeBatch").value = '';
    document.getElementById("Q2_KodeKontainer").value = '';
    document.getElementById("Q2_Kategori").value = '';
    document.getElementById("Q2_QTY").value = '1';
}

function reset2() {

    document.getElementById('buttonadd').setAttribute('hidden', 'hidden');
    document.getElementById("Q2_KodeBatch").focus();
    document.getElementById("Q2_KodeBatch").value = '';
    document.getElementById("Q2_KodeKontainer").value = '';
    document.getElementById("Q2_Kategori").value = '';
    document.getElementById("Q2_QTY").value = '1';
}

function add() {
    var url;
    $.ajax({
        url: "<?php echo site_url('add_qcholding')?>",
        type: "POST",
        data: $('#qc_holding').serialize(),
        success: function(data) {
            reset2();
            reload_table();
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
            url: "<?php echo base_url(); ?>/delcek_qcholding",
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
}

function deletee(Q2_No, Q2_KodeBatch, P2_KodeKontainer, Q2_QTY) {
    var url;
    $.ajax({
        url: "<?php echo site_url('del_qcholding')?>",
        type: "POST",
        dataType: 'json',
        data: { //sesuaikan dengan tabel data yang bawah
            Q2_No: Q2_No,
            Q2_KodeBatch: Q2_KodeBatch,
            P2_KodeKontainer: P2_KodeKontainer,
            Q2_QTY: Q2_QTY
        },
    });
    reload_table();
}

function deleteeeee(Q2_No) {
    var url;
    $.ajax({
        url: "<?php echo site_url('del_qcholding')?>",
        type: "POST",
        data: "Q2_No=" + Q2_No,
        success: function(data) {
            reload_table();
        }
    });
}
document.onkeyup = function(e) {
    var e = e || window.event;
    if (e.altKey && e.which == 49) {
        document.getElementById("Q2_KodeBatch").value = '';
        document.getElementById("Q2_KodeBatch").focus();
        return false;
    }
    if (e.altKey && e.which == 50) {
        document.getElementById("Q2_Kategori").value = '';
        document.getElementById("Q2_Kategori").focus();
        return false;
    }
    if (e.altKey && e.which == 51) {
        document.getElementById("Q2_KodeKontainer").value = '';
        document.getElementById("Q2_KodeKontainer").focus();
        return false;
    }
    if (e.altKey && e.which == 52) {
        document.getElementById("Q2_QTY").value = '';
        document.getElementById("Q2_QTY").focus();
        return false;
    }
}
document.addEventListener("keydown", function(event) {
    if (event.keyCode === 13) {
        if (document.getElementById("Q2_KodeBatch").value != "" &&
            document.getElementById("Q2_KodeBatch").value != "" &&
            document.getElementById("Q2_Kategori").value != "" &&
            document.getElementById("Q2_KodeKontainer").value != "") {
            add();
            buttonstore();
            return
        }
    }
})
</script>
<?= $this->endSection();?>