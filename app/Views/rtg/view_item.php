<?= $this->extend('basecore/basemain');?>
<?= $this->section('pageconten')?>
<style>

</style>

<div class="flash-data" data-flashdata="<?= session()->getFlashdata('flashdata');?>"></div>

<!-- <script src="https://kit.fontawesome.com/fd8462dc4d.js" crossorigin="anonymous"></script> -->
<link rel="stylesheet" href="<?= base_url();?>/assets/vendors/iconly/bold.css">
<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-2 order-md-1 order-last">
                <h3>Ready To Go</h3>
                <p class="text-subtitle text-muted">RTG Proses.</p>
            </div>
            <div class="col-12 col-md-8 order-md-1 order-first">
                <div class="row">
                    <div class="col-6 col-lg-2 col-md-1 mx-auto" type="button" data-bs-toggle="modal"
                        data-bs-target="#rstaticBackdrop">
                        <div class="card col-12 col-lg-12 col-md-12">
                            <div class="card-body px-1 py-4-5">
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="stats-icon purple">
                                            <i class="iconly-boldTicket"></i>
                                        </div>
                                    </div>
                                    <div class="col-md-9">
                                        <h6 class="text-muted font-semibold">Release</h6>
                                        <h6 class="font-extrabold mb-0"><?= $releasedata ?></h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-6 col-lg-2 col-md-1 mx-auto" type="button" data-bs-toggle="modal"
                        data-bs-target="#mstaticBackdrop">
                        <div class="card col-12 col-lg-12 col-md-12">
                            <div class="card-body px-1 py-4-5">
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="stats-icon orange">
                                            <i class="iconly-boldWork"></i>
                                        </div>
                                    </div>
                                    <div class="col-md-9">
                                        <h6 class="text-muted font-semibold">M.Place
                                        </h6>
                                        <h6 class="font-extrabold mb-0"><?= $marketplacedata ?>
                                        </h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-6 col-lg-2 col-md-1 mx-auto" type="button" data-bs-toggle="modal"
                        data-bs-target="#dstaticBackdrop">
                        <div class="card col-12 col-lg-12 col-md-12">
                            <div class="card-body px-1 py-4-5">
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="stats-icon red">
                                            <i class="iconly-boldDiscount"></i>
                                        </div>
                                    </div>
                                    <div class="col-md-9">
                                        <h6 class="text-muted font-semibold">Disc
                                            MP</h6>
                                        <h6 class="font-extrabold mb-0"><?= $discdata ?></h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-6 col-lg-2 col-md-6 mx-auto" type="button" data-bs-toggle="modal"
                        data-bs-target="#staticBackdrop">
                        <div class="card col-12 col-lg-12 col-md-12">
                            <div class="card-body px-1 py-4-5">
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="stats-icon yellow">
                                            <i class="iconly-boldAdd-User"></i>
                                        </div>
                                    </div>
                                    <div class="col-md-9">
                                        <h6 class="text-muted font-semibold">Sunsan</h6>
                                        <h6 class="font-extrabold mb-0"><?= $sunsandata ?></h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-6 col-lg-2 col-md-1 mx-auto" type="button" data-bs-toggle="modal"
                        data-bs-target="#shpstaticBackdrop">
                        <div class="card col-12 col-lg-12 col-md-12">
                            <div class="card-body px-1 py-4-5">
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="stats-icon green">
                                            <i class="iconly-boldTick-Square"></i>
                                        </div>
                                    </div>
                                    <div class="col-md-9">
                                        <h6 class="text-muted font-semibold">S.
                                            Item</h6>
                                        <h6 class="font-extrabold mb-0"><?= $shippingdata ?></h6>
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
                        <li class="breadcrumb-item active" aria-current="page">Ready To Go
                        </li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <div class="col-12 col-md-8 order-md-2 mx-auto">
        <section class="section">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Shipping Item Panel</h4>
                    <hr>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4">
                            <script>
                            function validasi_data_holding_temp() {
                                var container = document.getElementById("RQ2_KodeKontainer").value;
                                var kategori = document.getElementById("SHP_Kategori").value;

                                //release
                                if (kategori == "Release") {
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
                                        document.getElementById('KodeBatch').removeAttribute('readonly');
                                        document.getElementById('SHP_QTY').removeAttribute('readonly');
                                        document.getElementById('SHP_Customer').removeAttribute('readonly');
                                        document.getElementById('SHP_Expedition2').removeAttribute('readonly');
                                        document.getElementById("KodeBatch").focus();
                                    }
                                    <?php endforeach; ?>
                                }

                                //marketplace
                                if (kategori == "Marketplace") {
                                    <?php $tambahmp = 0?>
                                    <?php $tambah_logmp = 0?>
                                    <?php foreach($mp_datas as $holdmp): ?>
                                    <?php $tambahmp++;?>
                                    <?php $tambah_logmp++;?>
                                    if (container == "<?php echo $holdmp['M_Kontainer'];?>") {
                                        $("#info_data<?php echo $tambahmp++;?>").text(
                                            "[<?= $holdmp['M_NamaProduk']?>]");
                                        $("#info_data<?php echo $tambahmp++;?>").text("<?= $holdmp['M_QTY']?> pcs");
                                        $("#info_data<?php echo $tambahmp++;?>").text("<?= $holdmp['M_KodeBatch']?>");
                                        document.getElementById('KodeBatch').removeAttribute('readonly');
                                        document.getElementById('SHP_QTY').removeAttribute('readonly');
                                        document.getElementById('SHP_Customer').removeAttribute('readonly');
                                        document.getElementById('SHP_Expedition2').removeAttribute('readonly');
                                        document.getElementById("KodeBatch").focus();
                                    }

                                    <?php endforeach; ?>
                                }


                                //dismp
                                if (kategori == "DiscMP") {
                                    <?php $tambahdmp = 0?>
                                    <?php $tambah_logdmp = 0?>
                                    <?php foreach($dmp_datas as $holddmp): ?>
                                    <?php $tambahdmp++;?>
                                    <?php $tambah_logdmp++;?>
                                    if (container == "<?php echo $holddmp['DMP_Kontainer'];?>") {
                                        $("#info_data<?php echo $tambahdmp++;?>").text(
                                            "[<?= $holddmp['DMP_NamaProduk']?>]");
                                        $("#info_data<?php echo $tambahdmp++;?>").text("<?= $holddmp['DMP_QTY']?> pcs");
                                        $("#info_data<?php echo $tambahdmp++;?>").text(
                                            "<?= $holddmp['DMP_KodeBatch']?>");
                                        document.getElementById('KodeBatch').removeAttribute('readonly');
                                        document.getElementById('SHP_QTY').removeAttribute('readonly');
                                        document.getElementById('SHP_Customer').removeAttribute('readonly');
                                        document.getElementById('SHP_Expedition2').removeAttribute('readonly');
                                        document.getElementById("KodeBatch").focus();
                                    }

                                    <?php endforeach; ?>
                                }

                                //sunsan
                                if (kategori == "Sunsan") {
                                    <?php $tambahsun = 0?>
                                    <?php $tambah_logsun = 0?>
                                    <?php foreach($sun_datas as $holdsun): ?>
                                    <?php $tambahsun++;?>
                                    <?php $tambah_logsun++;?>
                                    if (container == "<?php echo $holdsun['S_Kontainer'];?>") {
                                        $("#info_data<?php echo $tambahsun++;?>").text(
                                            "[<?= $holdsun['S_NamaProduk']?>]");
                                        $("#info_data<?php echo $tambahsun++;?>").text("<?= $holdsun['S_QTY']?> pcs");
                                        $("#info_data<?php echo $tambahsun++;?>").text("<?= $holdsun['S_KodeBatch']?>");
                                        document.getElementById('KodeBatch').removeAttribute('readonly');
                                        document.getElementById('SHP_QTY').removeAttribute('readonly');
                                        document.getElementById('SHP_Customer').removeAttribute('readonly');
                                        document.getElementById('SHP_Expedition2').removeAttribute('readonly');
                                        document.getElementById("KodeBatch").focus();
                                    }

                                    <?php endforeach; ?>
                                }


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
                                <a type="button" class="btn btn-primary btn-sm" href="<?= base_url()?>/rtg_box">Shipping
                                    Box</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-8 order-md-2 mx-auto my-4" style="width: 150px; height: 150px">
                        <div class="col-md-12 my-4">
                            <div class="stats-icon darkblue" style="width: 150px; height: 150px">
                                <i class="iconly-boldWork" style="font-size:500%"></i>
                            </div>
                        </div>
                    </div>
                    <div class="my-2">
                        <h3 class="text-center">Ready To Go</h3>
                        <div class="col-12 col-md-6 order-md-2 mx-auto mt-3">
                            <form method="post" id="postrtgitem" action="<?= site_url('/rtgitemsubmit-form') ?>">
                                <div class="form-group position-relative has-icon-left">
                                    <input type="text" class="form-control text-center" name="SHP_NamaProduk"
                                        id="SHP_NamaProduk" placeholder="Product Name" required readonly>
                                    <div class="form-control-icon">
                                        <i class="iconly-boldHeart"></i>
                                    </div>
                                </div>
                                <div class="form-group position-relative has-icon-left">
                                    <input type="hidden" name="SHP_Datetime" id="SHP_Datetime" value="<?php 
                                                    date_default_timezone_set('Asia/Jakarta');
                                                    echo date ('Y-m-d H:i:s'); 
                                                ?>">
                                </div>
                                <div class="input-group mb-3">
                                    <label class="input-group-text" for="SHP_Kategori">Category</label>
                                    <input type="text" list="Kategori" class="form-select" name="SHP_Kategori"
                                        id="SHP_Kategori" autocomplete="off" oninput="Expedition(),buka()" required>
                                    <datalist id="Kategori">
                                        <option value="Release" id="Release">Release</option>
                                        <option value="Marketplace" id="Marketplace">Marketplace</option>
                                        <option value="DiscMP" id="Disc">DiscMP</option>
                                        <option value="Sunsan" id="Sun">Sunsan</option>
                                    </datalist>
                                </div>
                                <span class="text-muted" id="salah"></span>
                                <div class="form-group position-relative has-icon-left">
                                    <input type="text" class="form-control text-center" name="RQ2_KodeKontainer"
                                        id="RQ2_KodeKontainer" oninput="validasi_data_holding_temp()"
                                        placeholder="Code Container" readonly required>
                                    <div class="form-control-icon">
                                        <i class="iconly-boldTicket"></i>
                                    </div>
                                </div>
                                <div class="form-group position-relative has-icon-left">
                                    <input type="text" class="form-control text-center" name="SHP_KodeBatch"
                                        id="KodeBatch" oninput="enable(),namaproduk()" placeholder="Batch Code" readonly
                                        required>
                                    <div class="form-control-icon">
                                        <i class="iconly-boldScan"></i>
                                    </div>
                                </div>
                                <div class="input-group mb-3">
                                    <label class="input-group-text" for="SHP_QTY">QTY</label>
                                    <input type="number" min="1" class="form-control text-center" id="SHP_QTY"
                                        name="SHP_QTY" value="1" placeholder="1" readonly required>

                                </div>
                                <div class="form-group position-relative has-icon-left">
                                    <input type="text" class="form-control text-center" id="SHP_Customer"
                                        name="SHP_Customer" placeholder="Customer" required readonly>
                                    <div class="form-control-icon">
                                        <i class="iconly-boldProfile"></i>
                                    </div>
                                </div>
                                <div class="form-group position-relative has-icon-left" id="SHP_Expedition">
                                    <div class="input-group mb-3">
                                        <label class="input-group-text" for="master_expedition">Expedition</label>
                                        <input type="text" list="dataexp" class="form-select" name="SHP_Expedition"
                                            id="SHP_Expedition2" autocomplete="off">
                                        <datalist id="dataexp">
                                            <?php foreach($masterexp as $c){ ?>
                                            <option value="<?php echo $c['me_nama']; ?>">
                                                <?php echo $c['me_kode']; ?>
                                            </option>
                                            <?php } ?>
                                        </datalist>
                                    </div>

                                </div>
                                <!-- <div class="form-group position-relative has-icon-left" id="SHP_Expedition">
                                    <input type="text" class="form-control text-center" id="SHP_Expedition2"
                                        name="SHP_Expedition" placeholder="Expedition" readonly required>
                                    <div class="form-control-icon">
                                        <i class="iconly-boldTicket"></i>
                                    </div>
                                </div> -->
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
                                            <a onclick="reset();" class="btn btn-outline-danger col-12">Clear</a>
                                        </div>
                                        <div class="col">
                                            <button type="submit"
                                                class="btn btn-outline-primary col-12">Process</button>
                                        </div>
                                    </div>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Modal Release -->
        <div class="modal fade" id="rstaticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
            aria-labelledby="rLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-scrollable modal-xl">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="rLabel">RELEASE PRODUCT</h5>
                        <a type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></a>
                    </div>
                    <div class="modal-body">
                        <div class="container my-4"
                            style="border: 1px solid; border-color: #435ebe; border-radius: 25px;  padding-bottom: 25px; padding-left: 50px; padding-right: 50px; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);">
                            <p>
                            <h1 style="text-align:center">Release Product List</h1>
                            </p>
                            <table class="table my-2" id="master_list">
                                <thead>
                                    <tr>
                                        <th style="width: 5%">No</th>
                                        <th>Date</th>
                                        <th>Container</th>
                                        <th>Batch</th>
                                        <th>Produk</th>
                                        <th style="width: 10%">QTY</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $key = 0?>
                                    <?php if($release_datas): ?>
                                    <?php foreach($release_datas as $repair): ?>

                                    <tr>
                                        <td><?= ++$key ?></td>
                                        <td><?php echo date('d-m-Y, H:i:s',strtotime($repair['R_Datetime'])); ?>
                                        </td>
                                        <td><?php echo $repair['R_Kontainer']; ?></td>
                                        <td><?php echo $repair['R_KodeBatch']; ?></td>
                                        <td><?php echo $repair['R_NamaProduk']; ?></td>
                                        <td><?php echo $repair['R_QTY']; ?></td>
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
        <!-- Modal Marketplace -->
        <div class="modal fade" id="mstaticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
            aria-labelledby="mLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-scrollable modal-xl">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="mLabel">MARKETPLACE PRODUCT</h5>
                        <a type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></a>
                    </div>
                    <div class="modal-body">
                        <div class="container my-4"
                            style="border: 1px solid; border-color: #435ebe; border-radius: 25px;  padding-bottom: 25px; padding-left: 50px; padding-right: 50px; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);">
                            <p>
                            <h1 style="text-align:center">Marketplace Product List</h1>
                            </p>
                            <table class="table my-2" id="master_list2">
                                <thead>
                                    <tr>
                                        <th style="width: 5%">No</th>
                                        <th>Date</th>
                                        <th>Container</th>
                                        <th>Batch</th>
                                        <th>Produk</th>
                                        <th style="width: 10%">QTY</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $key = 0?>
                                    <?php if($mp_datas): ?>
                                    <?php foreach($mp_datas as $m): ?>

                                    <tr>
                                        <td><?= ++$key ?></td>
                                        <td><?php echo date('d-m-Y, H:i:s',strtotime($m['M_Datetime'])); ?>
                                        </td>
                                        <td><?php echo $m['M_Kontainer']; ?></td>
                                        <td><?php echo $m['M_KodeBatch']; ?></td>
                                        <td><?php echo $m['M_NamaProduk']; ?></td>
                                        <td><?php echo $m['M_QTY']; ?></td>
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
        <!-- Modal Discmp -->
        <div class="modal fade" id="dstaticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
            aria-labelledby="mLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-scrollable modal-xl">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="mLabel">DISCOUNT MARKETPLACE PRODUCT</h5>
                        <a type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></a>
                    </div>
                    <div class="modal-body">
                        <div class="container my-4"
                            style="border: 1px solid; border-color: #435ebe; border-radius: 25px;  padding-bottom: 25px; padding-left: 50px; padding-right: 50px; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);">
                            <p>
                            <h1 style="text-align:center">Discount Marketplace Product List</h1>
                            </p>
                            <table class="table my-2" id="master_list3">
                                <thead>
                                    <tr>
                                        <th style="width: 5%">No</th>
                                        <th>Date</th>
                                        <th>Container</th>
                                        <th>Batch</th>
                                        <th>Produk</th>
                                        <th style="width: 10%">QTY</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $key = 0?>
                                    <?php if($dmp_datas): ?>
                                    <?php foreach($dmp_datas as $d): ?>

                                    <tr>
                                        <td><?= ++$key ?></td>
                                        <td><?php echo date('d-m-Y, H:i:s',strtotime($d['DMP_Datetime'])); ?>
                                        </td>
                                        <td><?php echo $d['DMP_Kontainer']; ?></td>
                                        <td><?php echo $d['DMP_KodeBatch']; ?></td>
                                        <td><?php echo $d['DMP_NamaProduk']; ?></td>
                                        <td><?php echo $d['DMP_QTY']; ?></td>
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
        <!-- Modal Sunsan -->
        <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
            aria-labelledby="sLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-scrollable modal-xl">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="sLabel">SUNSAN PRODUCT</h5>
                        <a type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></a>
                    </div>
                    <div class="modal-body">
                        <div class="container my-4"
                            style="border: 1px solid; border-color: #435ebe; border-radius: 25px;  padding-bottom: 25px; padding-left: 50px; padding-right: 50px; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);">
                            <p>
                            <h1 style="text-align:center">Sunsan Product List</h1>
                            </p>
                            <table class="table my-2" id="master_list4">
                                <thead>
                                    <tr>
                                        <th style="width: 5%">No</th>
                                        <th>Date</th>
                                        <th>Container</th>
                                        <th>Batch</th>
                                        <th>Produk</th>
                                        <th style="width: 10%">QTY</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $key = 0?>
                                    <?php if($sun_datas): ?>
                                    <?php foreach($sun_datas as $s): ?>

                                    <tr>
                                        <td><?= ++$key ?></td>
                                        <td><?php echo date('d-m-Y, H:i:s',strtotime($s['S_Datetime'])); ?>
                                        </td>
                                        <td><?php echo $s['S_Kontainer']; ?></td>
                                        <td><?php echo $s['S_KodeBatch']; ?></td>
                                        <td><?php echo $s['S_NamaProduk']; ?></td>
                                        <td><?php echo $s['S_QTY']; ?></td>
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

        <!-- Modal Shipping -->
        <div class="modal fade" id="shpstaticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
            aria-labelledby="shpLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-scrollable modal-xl">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="shpLabel">SHIPPING ITEM PRODUCT</h5>
                        <a type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></a>
                    </div>
                    <div class="modal-body">
                        <div class="container my-4"
                            style="border: 1px solid; border-color: #435ebe; border-radius: 25px;  padding-bottom: 25px; padding-left: 50px; padding-right: 50px; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);">
                            <p>
                            <h1 style="text-align:center">Shipping Item List</h1>
                            </p>
                            <table class="table my-2" id="master_list5">
                                <thead>
                                    <tr>
                                        <th style="width: 5%">No</th>
                                        <th style="width: 15%">Date</th>
                                        <th>Category</th>
                                        <th style="width: 15%">Batch Code</th>
                                        <th>Product</th>
                                        <th style="width: 5%">QTY</th>
                                        <th>Customer</th>
                                        <th>Expedition</th>
                                        <th>PIC</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $key = 0?>
                                    <?php if($shippingdatas): ?>
                                    <?php foreach($shippingdatas as $shipping): ?>
                                    <tr>
                                        <td><?= ++$key ?></td>
                                        <td><?php echo date('d-m-Y, H:i:s',strtotime($shipping['SHP_Datetime'])); ?>
                                        </td>
                                        <td><?php echo $shipping['SHP_Kategori']; ?></td>
                                        <td><?php echo $shipping['SHP_KodeBatch']; ?></td>
                                        <td><?php echo $shipping['SHP_NamaProduk']; ?></td>
                                        <td><?php echo $shipping['SHP_QTY']; ?></td>
                                        <td><?php echo $shipping['SHP_Customer']; ?></td>
                                        <td><?php echo $shipping['SHP_Expedition']; ?></td>
                                        <td><?php echo $shipping['SHP_PIC']; ?></td>
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
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.2/jquery.validate.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.2/additional-methods.min.js"></script>
<script src="<?= base_url();?>/assets/alrt/sweetalert2.all.min.js"></script>
<script src="<?= base_url();?>/assets/js/core/qc.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
<script type="text/javascript" src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>

<script>
$(document).ready(function() {
    $('#master_list').DataTable();
    $('#master_list2').DataTable();
    $('#master_list3').DataTable();
    $('#master_list4').DataTable();
    $('#master_list5').DataTable();

});
window.onload = function() {
    var input = document.getElementById("SHP_Kategori").focus();
}

function Expedition() {
    var valuebatch = document.getElementById("SHP_Kategori").value;
    if (valuebatch == "Sunsan") {
        document.getElementById("SHP_Expedition").style.display = "none";
        document.getElementById("SHP_Expedition2").value = "-";
    } else {
        document.getElementById("SHP_Expedition").style.display = "";
        document.getElementById("SHP_Expedition2").value = "";
    }
}

function reset() {
    document.getElementById("KodeBatch").value = '';
    document.getElementById("SHP_QTY").value = '1';
    document.getElementById("SHP_Customer").value = '';
    document.getElementById("SHP_Expedition2").value = '';
    document.getElementById("KodeBatch").focus();
}

function buka() {
    document.getElementById('RQ2_KodeKontainer').removeAttribute('readonly');
}

function enable() {
    var kontainer = document.getElementById("RQ2_KodeKontainer").value;
    var batch = document.getElementById("KodeBatch").value;
    var kategori = document.getElementById("SHP_Kategori").value;

    //release
    if (kategori == "Release") {
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
        <?php endif; ?>
    }


    //marketplace
    if (kategori == "Marketplace") {
        <?php if ($mp_datas): ?>
        <?php $amp=0; foreach ($mp_datas as $batchmp): $amp++; ?>

        var isi_kontainermp<?= $amp?> = "<?php echo $batchmp["M_Kontainer"]; ?>";
        var isi_batchmp<?= $amp?> = "<?php echo $batchmp["M_KodeBatch"]; ?>";

        if (kontainer == isi_kontainermp<?= $amp?>) {
            if (batch == isi_batchmp<?= $amp?>) {
                document.getElementById('buttonadd').removeAttribute('hidden', 'hidden');
                $("#salah").text("");
                return
            }
        }
        <?php endforeach; ?>
        if (batch != isi_batchmp<?= $amp?>) {
            document.getElementById('buttonadd').setAttribute('hidden', 'hidden');
            $("#salah").text("Batch Code Not Found");
        }
        <?php endif; ?>
    }


    //dismp
    if (kategori == "DiscMP") {
        <?php if ($dmp_datas): ?>
        <?php $admp=0; foreach ($dmp_datas as $batchdmp): $admp++; ?>

        var isi_kontainerdmp<?= $admp?> = "<?php echo $batchdmp["DMP_Kontainer"]; ?>";
        var isi_batchdmp<?= $admp?> = "<?php echo $batchdmp["DMP_KodeBatch"]; ?>";

        if (kontainer == isi_kontainerdmp<?= $a?>) {
            if (batch == isi_batchdmp<?= $admp?>) {
                document.getElementById('buttonadd').removeAttribute('hidden', 'hidden');
                $("#salah").text("");
                return
            }
        }
        <?php endforeach; ?>
        if (batch != isi_batchdmp<?= $admp?>) {
            document.getElementById('buttonadd').setAttribute('hidden', 'hidden');
            $("#salah").text("Batch Code Not Found");
        }
        <?php endif; ?>
    }


    //sunsan
    if (kategori == "Sunsan") {
        <?php if ($sun_datas): ?>
        <?php $asun=0; foreach ($sun_datas as $batchsun): $asun++; ?>

        var isi_kontainersun<?= $asun?> = "<?php echo $batchsun["S_Kontainer"]; ?>";
        var isi_batchsun<?= $asun?> = "<?php echo $batchsun["S_KodeBatch"]; ?>";

        if (kontainer == isi_kontainersun<?= $a?>) {
            if (batch == isi_batchsun<?= $asun?>) {
                document.getElementById('buttonadd').removeAttribute('hidden', 'hidden');
                $("#salah").text("");
                return
            }
        }
        <?php endforeach; ?>
        if (batch != isi_batchsun<?= $asun?>) {
            document.getElementById('buttonadd').setAttribute('hidden', 'hidden');
            $("#salah").text("Batch Code Not Found");
        }
        <?php endif; ?>
    }


}

function namaproduk() {
    var valuebatch = document.getElementById("KodeBatch").value;
    var valuebatch = valuebatch.toString().substr(6, 3);
    <?php if($masterbarang): ?>
    <?php foreach($masterbarang as $produksi): ?>

    if (valuebatch == "<?php echo $produksi['mbr_kode'];?>") {
        document.getElementById("SHP_NamaProduk").value = "<?= $produksi['mbr_produk'];?>";
    }
    <?php endforeach; ?>
    <?php endif; ?>

}
document.onkeyup = function(e) {
    var e = e || window.event;
    if (e.altKey && e.which == 49) {
        document.getElementById("SHP_Kategori").value = '';
        document.getElementById("SHP_Kategori").focus();
        return false;
    }
    if (e.altKey && e.which == 50) {
        document.getElementById("RQ2_KodeKontainer").value = '';
        document.getElementById("RQ2_KodeKontainer").focus();
        return false;
    }
    if (e.altKey && e.which == 51) {
        document.getElementById("KodeBatch").value = '';
        document.getElementById("KodeBatch").focus();
        return false;
    }
    if (e.altKey && e.which == 52) {
        document.getElementById("SHP_QTY").value = '';
        document.getElementById("SHP_QTY").focus();
        return false;
    }
    if (e.altKey && e.which == 53) {
        document.getElementById("SHP_Customer").value = '';
        document.getElementById("SHP_Customer").focus();
        return false;
    }
    if (e.altKey && e.which == 54) {
        document.getElementById("SHP_Expedition2").value = '';
        document.getElementById("SHP_Expedition2").focus();
        return false;
    }
}
</script>
<?= $this->endSection();?>