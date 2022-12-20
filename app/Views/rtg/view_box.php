<?= $this->extend('basecore/basemain');?> <?= $this->section('pageconten')?> <style></style>
<!-- <script src="https://kit.fontawesome.com/fd8462dc4d.js" crossorigin="anonymous"></script> -->

<div class="flash-data" data-flashdata="<?= session()->getFlashdata('flashdata');?>"></div>
<link rel="stylesheet" href="
	<?= base_url();?>/assets/vendors/iconly/bold.css">
<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-4 order-md-1 order-last">
                <h3>Ready To Go</h3>
                <p class="text-subtitle text-muted">RTG Proses.</p>
            </div>
            <div class="col-12 col-md-8 order-md-1 order-first">
                <div class="row">
                    <div class="col-6 col-lg-3 col-md-3 mx-4" type="button"
                        onclick=" window.open('<?= base_url()?>/shippingbox','_blank')">
                        <div class="card">
                            <div class="card-body px-1 py-4-5">
                                <div class="row">
                                    <div class="col-md-2">
                                        <div class="stats-icon green">
                                            <i class="iconly-boldTick-Square"></i>
                                        </div>
                                    </div>
                                    <div class="col-md-9">
                                        <h6 class="text-muted font-semibold">Shipping Box</h6>
                                        <h6 class="font-extrabold mb-0"> <?= $shippingdata ?> </h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-6 col-lg-3 col-md-3 mx-4" type="button" data-bs-toggle="modal"
                        data-bs-target="#staticBackdrop">
                        <div class="card">
                            <div class="card-body px-1 py-4-5">
                                <div class="row">
                                    <div class="col-md-2">
                                        <div class="stats-icon purple">
                                            <i class="iconly-boldTicket"></i>
                                        </div>
                                    </div>
                                    <div class="col-md-9">
                                        <h6 class="text-muted font-semibold">Packing Data</h6>
                                        <h6 class="font-extrabold mb-0"> <?= $packingdata ?> </h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-4 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="
									<?= base_url()?>/">Dashboard </a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Ready To Go </li>
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
                        <h4 class="card-title col-4">Shipping Box Panel</h4>
                    </div>
                    <hr>
                </div>
                <div class="card-body">



                    <div class="row">
                        <div class="col-12 d-flex justify-content-end">
                            <a type="button" class="btn btn-primary btn-sm" href="<?= base_url()?>/rtg_item">Shipping
                                Item </a>
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


                            <form method="post" id="aa" action="">

                                <span class="text-muted" id="salah"></span>
                                <div class="form-group position-relative has-icon-left">
                                    <div class="row">
                                        <div class="col-10">
                                            <div class="card-title col-11 d-flex justify-content-start">
                                                <input type="text" class="form-control text-center" id="SHP_KodeDus"
                                                    name="SHP_KodeDus" oninput="copy(),enable()" placeholder="Box Code"
                                                    required>
                                            </div>
                                        </div>
                                        <div class="col-2">
                                            <div class="card-title col-12 d-flex justify-content-end">
                                                <!-- <a href="#" class="btn btn-outline-primary">Detail</a> -->
                                                <!-- <a   type="button" class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#detailmodal" >Detail</a> -->
                                                <!-- <a type="submit" class="btn btn-outline-primary" id="yuks" >Detail</a> -->

                                                <a class="btn btn-outline-primary" onclick="add()">Detail</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-control-icon">
                                        <i class="iconly-boldTicket"></i>
                                    </div>
                                </div>
                            </form>
                            <form method="post" id="postrtgbox" action="<?= site_url('/rtgboxsubmit-form') ?>">
                                <div class="form-group position-relative has-icon-left">
                                    <input type="text" class="form-control text-center" id="SHP_KodeDus2"
                                        name="SHP_KodeDus2" placeholder="Box Code" Hidden required>
                                    <input type="hidden" name="SHP_Datetime" id="SHP_Datetime" value="<?php 
                                                    date_default_timezone_set('Asia/Jakarta');
                                                    echo date ('Y-m-d H:i:s'); 
                                                ?>" required>
                                </div>
                                <div class="input-group mb-3" Hidden>
                                    <label class="input-group-text" for="SHP_QTY">QTY</label>
                                    <input type="number" min="1" class="form-control text-center" name="SHP_QTY"
                                        placeholder="1" value="1" required>
                                </div>
                                <div class="form-group position-relative has-icon-left">
                                    <div class="input-group mb-3">
                                        <label class="input-group-text" for="master_barang">Customer</label>
                                        <input type="text" list="datacus" class="form-select" name="SHP_Customer"
                                            id="SHP_Customer" autocomplete="off" required>
                                        <datalist id="datacus">
                                            <?php foreach($mastercus as $b){ ?>
                                            <option value="<?php echo $b['mp_nama']; ?>">
                                                <?php echo $b['mp_kategori']; ?>
                                            </option>
                                            <?php } ?>
                                        </datalist>
                                    </div>

                                </div>
                                <div class="form-group position-relative has-icon-left">
                                    <div class="input-group mb-3">
                                        <label class="input-group-text" for="master_expedition">Expedition</label>
                                        <input type="text" list="dataexp" class="form-select" name="SHP_Expedition"
                                            id="SHP_Expedition" autocomplete="off" required>
                                        <datalist id="dataexp">
                                            <?php foreach($masterexp as $c){ ?>
                                            <option value="<?php echo $c['me_nama']; ?>">
                                                <?php echo $c['me_kode']; ?>
                                            </option>
                                            <?php } ?>
                                        </datalist>
                                    </div>

                                </div>

                                <div class="form-group position-relative has-icon-left">
                                    <input type="text" class="form-control text-center" name="SHP_PIC"
                                        value="<?= user()->username; ?>" placeholder="<?= user()->username; ?>"
                                        readonly>
                                    <div class="form-control-icon">
                                        <i class="iconly-boldProfile"></i>
                                    </div>
                                </div>
                                <div class="form-group position-relative has-icon-left">
                                    <div class="row" id="buttonadd" hidden>
                                        <div class="col">
                                            <a onclick="window.location.reload();"
                                                class="btn btn-outline-danger col-12">Reset</a>
                                        </div>
                                        <div class="col">
                                            <button type="submit"
                                                class="btn btn-outline-primary col-12">Process</button>
                                        </div>
                                    </div>
                                </div>
                        </div>
                        <table class="table" id="detail_list"></table>
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
                            <h5 class="modal-title" id="staticBackdropLabel">Packing Data</h5>
                            <a type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></a>
                        </div>
                        <div class="modal-body">
                            <div class="container my-4"
                                style="border: 1px solid; border-color: #435ebe; border-radius: 25px;  padding-bottom: 25px; padding-left: 50px; padding-right: 50px; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);">
                                <p>
                                <h1 style="text-align:center">List Packing</h1>
                                </p>
                                <table class="table my-2" id="master_list">
                                    <thead>
                                        <tr>
                                            <th style="width: 5%">No</th>
                                            <th>Date</th>
                                            <th>Box Code</th>
                                            <th>Batch</th>
                                            <th>Produk</th>
                                            <th style="width: 10%">QTY</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $key = 0?>
                                        <?php if($packing_datas): ?>
                                        <?php foreach($packing_datas as $repair): ?>

                                        <tr>
                                            <td><?= ++$key ?></td>
                                            <td><?php echo date('d-m-Y, H:i:s',strtotime($repair['K_Datetime'])); ?>
                                            </td>
                                            <td><?php echo $repair['K_KodeDus']; ?></td>
                                            <td><?php echo $repair['K_Kodebatch']; ?></td>
                                            <td><?php echo $repair['K_NamaProduk']; ?></td>
                                            <td><?php echo $repair['K_QTY']; ?></td>
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

<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
<script type="text/javascript" src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
<script type="text/javascript">
$(document).ready(function() {
    $('#master_list').DataTable();

});
window.onload = function() {
    reload_table();
    var input = document.getElementById("SHP_KodeDus").focus();
}

$(document).on('click', '.yuks', function() {
    $('#bismillah').modal('show');
    resetPassword();
});

function reload_table() {
    $.ajax({
        url: "<?php echo site_url('detail_box')?>",
        beforSend: function(f) {
            $('#detail_list').html('Load Data.')
        },
        success: function(data) {
            $('#detail_list').html(data)
        }
    });
    // var a= $('#wms').html(data);
    // console.log(a);
}

function enable() {
    var batch = document.getElementById("SHP_KodeDus").value;
    <?php if ($packing_datas): ?>
    <?php $a=0; foreach ($packing_datas as $batch): $a++; ?>
    var isi_batch<?= $a?> = "<?php echo $batch["K_KodeDus"]; ?>";
    if (batch == isi_batch<?= $a?>) {
        document.getElementById('buttonadd').removeAttribute('hidden', 'hidden');
        $("#salah").text("");
        return
    }
    <?php endforeach; ?>
    if (batch != isi_batch<?= $a?>) {
        document.getElementById('buttonadd').setAttribute('hidden', 'hidden');
        $("#salah").text("Batch Code Not Found");
    }
    <?php endif; ?>
}

function copy() {
    var kodebox_copy = document.getElementById("SHP_KodeDus").value;
    console.log(kodebox_copy);
    document.getElementById("SHP_KodeDus2").value = kodebox_copy;
}

function add() {
    var url;
    $.ajax({
        url: "<?php echo site_url('detail_box')?>",
        type: "POST",
        data: $('#aa').serialize(),
        success: function(data) {
            $('#detail_list').html(data)
        },
        error: function() {
            alert("There was an error submitting comment");
        }
    });
}
document.onkeyup = function(e) {
    var e = e || window.event;
    if (e.altKey && e.which == 49) {
        document.getElementById("SHP_KodeDus").value = '';
        document.getElementById("SHP_KodeDus").focus();
        return false;
    }
    if (e.altKey && e.which == 50) {
        document.getElementById("SHP_Customer").value = '';
        document.getElementById("SHP_Customer").focus();
        return false;
    }
    if (e.altKey && e.which == 51) {
        document.getElementById("SHP_Expedition").value = '';
        document.getElementById("SHP_Expedition").focus();
        return false;
    }
}
</script>
<?= $this->endSection();?>