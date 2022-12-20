<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title?></title>

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?= base_url();?>/assets/css/bootstrap.css">
    <div class="flash-data" data-flashdata="<?= session()->getFlashdata('flashdata');?>"></div>
    <link rel="stylesheet" href="<?= base_url();?>/assets/vendors/iconly/bold.css">
    <link rel="stylesheet" href="<?= base_url();?>/assets/vendors/perfect-scrollbar/perfect-scrollbar.css">
    <link rel="stylesheet" href="<?= base_url();?>/assets/vendors/bootstrap-icons/bootstrap-icons.css">
    <link rel="stylesheet" href="<?= base_url();?>/assets/css/app.css">
    <link rel="shortcut icon" href="<?= base_url();?>/assets/images/favicon.svg" type="image/x-icon">
</head>

<body>

    <form id="repair_store">
        <div id="app">
            <?= $this->include('basecore/sidebar');?>
            <div id="main" class='layout-navbar'>
                <header>
                    <nav class="navbar navbar-expand navbar-light ">
                        <div class="container-fluid">
                            <a haref="" class="burger-btn d-block">
                                <i class="bi bi-justify fs-3"></i>
                            </a>

                            <a class="navbar-toggler" type="button" data-bs-toggle="collapse"
                                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                                aria-expanded="false" aria-label="Toggle navigation">
                                <span class="navbar-toggler-icon"></span>
                            </a>
                            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                                    <li class="nav-item dropdown me-3">
                                        <a class="nav-link active dropdown-toggle" href="#" data-bs-toggle="dropdown"
                                            aria-expanded="false">
                                            <i class='bi bi-bell bi-sub fs-4 text-gray-600'>

                                            </i>

                                            <?php foreach($produksidatas as $produksi): ?>
                                            <?php 
                                                $c = $produksi['P_Report'];
                                                if ($c == "Dont Match" ): ?>
                                            <span
                                                class="position-absolute top-40 start-40 translate-middle badge rounded-pill bg-danger">
                                                !
                                                <span class="visually-hidden">unread messages</span>
                                            </span>
                                            <?php endif; ?>
                                            <?php endforeach; ?>



                                        </a>
                                        <ul class="dropdown-menu dropdown-menu-end"
                                            aria-labelledby="dropdownMenuButton">
                                            <li>
                                                <h6 class="dropdown-header">Notifications</h6>
                                            </li>

                                            <li>
                                                <?php $key = 0?>
                                                <?php if($produksidatas): ?>
                                                <?php foreach($produksidatas as $produksi): ?>
                                                <?php $key++;?>
                                                <?php 
                                                $b = $produksi['P_Status'];
                                                if ($b == "Dont Match" ): ?>
                                                <div class="alert alert-danger alert-dismissible fade show"
                                                    role="alert">
                                                    <strong><?php echo $produksi['P_KodeBatch'];?></strong> product
                                                    don't match.
                                                    <a type="button" class="btn-close" data-bs-dismiss="alert"
                                                        onclick=" window.open('<?= base_url()?>/data_pd_repair','_blank')"
                                                        aria-label="Close"></a>
                                                </div>
                                                <?php endif; ?>
                                                <?php endforeach; ?>
                                                <?php endif; ?>
                                            </li>

                                        </ul>
                                    </li>
                                </ul>
                                <div class="dropdown">
                                    <a href="#" data-bs-toggle="dropdown" aria-expanded="false">
                                        <div class="user-menu d-flex">
                                            <div class="user-name text-end me-3">
                                                <h6 class="mb-0 text-gray-600"><?= user()->username; ?></h6>
                                                <p class="mb-0 text-sm text-gray-600"><?= user()->role; ?></p>
                                            </div>
                                            <div class="user-img d-flex align-items-center">
                                                <div class="avatar avatar-md bg-primary me-8">
                                                    <span class="avatar-content"><?php  $data = user()->username;    
                                                                        $whatIWant = substr($data, strpos($data, " ") + 1);
                                                                        $akhir = substr($whatIWant,0,1);
                                                                        $awal = substr($data,0,1);
                                                                        echo $awal;echo $akhir; ?>
                                                    </span>
                                                </div>

                                                <!-- <div class="avatar avatar-xl me-3">
                                                    <img src="assets/images/faces/3.jpg" alt="" srcset="">
                                                </div> -->
                                            </div>
                                        </div>
                                    </a>
                                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButton">
                                        <li>
                                            <h6 class="dropdown-header">Hello, <?= user()->username; ?>!</h6>
                                        </li>
                                        <li><a class="dropdown-item" href="<?= base_url();?>/my_profile"><i
                                                    class="icon-mid bi bi-person me-2"></i> My
                                                Profile</a></li>
                                        <hr>
                                        <li><a class="dropdown-item" href="<?= base_url('/logout');?>"><i
                                                    class="icon-mid bi bi-box-arrow-left me-2"></i>Logout</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </nav>
                </header>
                <div id="main-content">
                    <div class="page-heading">
                        <div class="page-title">
                            <div class="row">
                                <div class="col-12 col-md-2 order-md-1 order-last">
                                    <h3>Production</h3>
                                    <p class="text-subtitle text-muted">Data Repair.</p>
                                </div>
                                <div class="col-12 col-md-8 order-md-1 order-first">
                                    <div class="row ">
                                        <div class="row justify-content-md-center">
                                            <div class="col-6 col-lg-3 col-md-6 mx-2" type="button"
                                                data-bs-toggle="modal" data-bs-target="#rstaticBackdrop">
                                                <div class="card col-12 col-lg-12 col-md-12">
                                                    <div class="card-body px-3 py-4-5">
                                                        <div class="row">
                                                            <div class="col-md-1">
                                                                <div class="stats-icon yellow">
                                                                    <i class="iconly-boldAdd-User"></i>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-10">
                                                                <h6 class="text-muted font-semibold">Production Repair
                                                                </h6>
                                                                <h6 class="font-extrabold mb-0"><?= $repairp ?></h6>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-6 col-lg-3 col-md-6 mx-2" type="button"
                                                data-bs-toggle="modal" data-bs-target="#staticBackdroprepair">
                                                <div class="card col-12 col-lg-12 col-md-12">
                                                    <div class="card-body px-3 py-4-5">
                                                        <div class="row">
                                                            <div class="col-md-2">
                                                                <div class="stats-icon green">
                                                                    <i class="iconly-boldSwap"></i>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-8">
                                                                <h6 class="text-muted font-semibold">Repair Data</h6>
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
                                            <li class="breadcrumb-item active" aria-current="page">Repair
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
                                        <h4 class="card-title">Panel Repair</h4>
                                        <hr>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <a type="button" class="btn btn-primary"
                                                    onclick=" window.open('<?= base_url()?>/data_pd_repair','_blank')">Detail
                                                    Data</a>
                                            </div>
                                            <div class="col">
                                                <div class="col-12 d-flex justify-content-end">
                                                    <a type="submit" id="store"
                                                        href="<?= base_url()?>/qc_repair_produksi-form"
                                                        class="btn btn-primary mx-2" hidden>Save</a>
                                                    <a onclick="window.location.reload();"
                                                        class="btn btn-danger">Reset</a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-8 order-md-2 mx-auto mx-12"
                                            style="width: 150px; height: 150px">
                                            <div class="col-md-12 my-4">
                                                <div class="stats-icon darkblue" style="width: 150px; height: 150px">
                                                    <i class="iconly-boldDocument" style="font-size:500%"></i>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="my-2">
                                            <h3 class="text-center">Scan Product</h3>
                                            <div class="col-12 col-md-5 order-md-2 mx-auto mt-3">
                                                <?= csrf_field(); ?>
                                                <div class="form-group position-relative has-icon-left">
                                                    <input type="text" class="form-control text-center"
                                                        name="T_NamaProduk" id="T_NamaProduk" placeholder="Product Name"
                                                        required readonly>
                                                    <div class="form-control-icon">
                                                        <i class="iconly-boldHeart"></i>
                                                    </div>
                                                </div>
                                                <div class="form-group position-relative has-icon-left">
                                                    <input type="text" class="form-control text-center"
                                                        id="T_KodeKontainer" oninput="box();" name="T_KodeKontainer"
                                                        oninput="validasi_data_holding_temp()"
                                                        value="<?php if ($get_kontainer_produksi){echo $get_kontainer_produksi;} ?>"
                                                        placeholder="Code Container" required>
                                                    <div class="form-control-icon">
                                                        <i class="iconly-boldScan"></i>
                                                    </div>
                                                </div>
                                                <span class="text-muted" id="warning"></span>
                                                <div class="form-group position-relative has-icon-left">
                                                    <input type="text" class="form-control text-center" id="T_KodeBatch"
                                                        oninput="box(); validasi();" name="T_KodeBatch"
                                                        placeholder="Batch Code" required>
                                                    <div class="form-control-icon">
                                                        <i class="iconly-boldScan"></i>
                                                    </div>
                                                </div>
                                                <div class="form-group position-relative has-icon-left">
                                                    <input type="hidden" name="T_Datetime" id="T_Datetime" value="<?php 
                                                    date_default_timezone_set('Asia/Jakarta');
                                                    echo date ('Y-m-d H:i:s'); 
                                                ?>">
                                                </div>
                                                <span class="text-muted" id="warning_qty"></span>
                                                <div class="form-group position-relative has-icon-left">
                                                    <div class="input-group mb-3">
                                                        <label class="input-group-text" for="T_QTY">QTY</label>
                                                        <input type="number" min="1" oninput="validasi();" name="T_QTY"
                                                            id="T_QTY" class="form-control text-center" value="1"
                                                            oninput="cek_qty()" placeholder="1">
                                                    </div>

                                                </div>
                                                <div class="form-group position-relative has-icon-left">
                                                    <input type="text" name="T_PIC" class="form-control text-center"
                                                        id="T_PIC" value="<?= user()->username; ?>"
                                                        placeholder="Operator" readonly>
                                                    <div class="form-control-icon">
                                                        <i class="iconly-boldProfile"></i>
                                                    </div>
                                                </div>
                                                <div class="form-group position-relative has-icon-left">
                                                    <div class="row" id="btn_insert" hidden>
                                                        <div class="col">
                                                            <a class="btn btn-outline-primary col-12" id="btn_insert"
                                                                onclick="buttonstore(),add()">Add
                                                                Data</a>
                                                        </div>
                                                        <div class="col">
                                                            <a onclick="reset();"
                                                                class="btn btn-outline-danger col-12">Clear</a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <input type="hidden" name="T_Status" id="T_Status" value="Waiting">
                                                <input type="hidden" name="T_Report" id="T_Report" value="Waiting">


                                            </div>
                                            <table class="table"
                                                style="display: flex; flex-direction: column; overflow-x: auto;"
                                                id="tablepr"></table>
                                        </div>
                                    </div>
                                    <!-- Modal -->
                                    <div class="modal fade" id="staticBackdroprepair" data-bs-backdrop="static"
                                        data-bs-keyboard="false" tabindex="-1"
                                        aria-labelledby="repairstaticBackdropLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-scrollable modal-xl">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="repairstaticBackdropLabel">Repack Data
                                                    </h5>
                                                    <a type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></a>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="container my-4"
                                                        style="border: 1px solid; border-color: #435ebe; border-radius: 25px;  padding-bottom: 25px; padding-left: 50px; padding-right: 50px; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);">
                                                        <p>
                                                        <h1 style="text-align:center">List Repair</h1>
                                                        </p>
                                                        <div class="d-flex justify-content-end my-2">
                                                            <!-- <a href="<?php echo site_url('/holdingdataform') ?>" class="btn btn-outline-success  my-1">Add Product</a> -->
                                                        </div>
                                                        <table class="table my-2" id="master_list">
                                                            <thead>
                                                                <tr>
                                                                    <th style="width: 5%">No</th>
                                                                    <th>Date</th>
                                                                    <th style="width: 5%">Container</th>
                                                                    <th>Batch</th>
                                                                    <th>Produk</th>
                                                                    <th style="width: 5%">QTY</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <?php $key = 0?>
                                                                <?php if($repair_temp): ?>
                                                                <?php foreach($repair_temp as $repair): ?>

                                                                <tr>
                                                                    <td><?= ++$key ?></td>
                                                                    <td><?php echo date('d-m-Y, H:i:s',strtotime($repair['RPR_Datetime'])); ?>
                                                                    </td>
                                                                    <td><?php echo $repair['R_KodeKontainer']; ?></td>
                                                                    <td><?php echo $repair['RPR_KodeBatch']; ?></td>
                                                                    <td><?php echo $repair['RPR_NamaProduk']; ?></td>
                                                                    <td><?php echo $repair['RPR_QTY']; ?></td>
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
                                    <!-- Modal -->
                                    <div class="modal fade" id="rstaticBackdrop" data-bs-backdrop="static"
                                        data-bs-keyboard="false" tabindex="-1" aria-labelledby="rstaticBackdropLabel"
                                        aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-scrollable modal-xl">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="rstaticBackdropLabel">DATA PRODUCTION
                                                    </h5>
                                                    <a type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></a>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="container my-4"
                                                        style="border: 1px solid; border-color: #435ebe; border-radius: 25px;  padding-bottom: 25px; padding-left: 50px; padding-right: 50px; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);">
                                                        <p>
                                                        <h1 style="text-align:center">Product List</h1>
                                                        </p>
                                                        <div class="d-flex justify-content-end my-2">
                                                        </div>
                                                        <table class="table my-2" id="master_list2">
                                                            <thead>
                                                                <tr>
                                                                    <th style="width: 5%">No</th>
                                                                    <th style="width: 20%">Date</th>
                                                                    <th>Container</th>
                                                                    <th>Batch</th>
                                                                    <th>Produk</th>
                                                                    <th style="width: 10%">QTY</th>
                                                                    <th style="width: 13%">Status</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <?php $key = 0?>
                                                                <?php if($produksidatatemps): ?>
                                                                <?php foreach($produksidatatemps as $produksi): ?>

                                                                <tr>
                                                                    <td><?= ++$key ?></td>
                                                                    <td><?php echo date('d-m-Y, H:i:s',strtotime($produksi['P_Datetime'])); ?>
                                                                    </td>
                                                                    <td><?php echo $produksi['P_KodeKontainer']; ?></td>
                                                                    <td><?php echo $produksi['P_KodeBatch']; ?></td>
                                                                    <td><?php echo $produksi['P_NamaProduk']; ?></td>
                                                                    <td><?php echo $produksi['P_QTY']; ?></td>
                                                                    <td><?php echo $produksi['P_Status']; ?></td>

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
                            </section>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
    <script src="<?= base_url();?>/assets/vendors/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    <script src="<?= base_url();?>/assets/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.2/jquery.validate.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.2/additional-methods.min.js"></script>
    <script src="<?= base_url();?>/assets/alrt/sweetalert2.all.min.js"></script>
    <script src="<?= base_url();?>/assets/js/core/produksirepair.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
    <script type="text/javascript" src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="<?= base_url();?>/assets/js/JsBarcode.all.min.js"></script>
    <script src="<?= base_url();?>/assets/js/main.js"></script>
    <script>
    window.onload = function() {
        reload_table();
        locksave();
        reset();
        var input = document.getElementById("T_KodeKontainer").focus();
    }

    function reload_table() {
        $.ajax({
            url: "<?php echo site_url('data_produksirepair')?>",
            beforSend: function(f) {
                $('#tablepr').html('Load Data.')
            },
            success: function(data) {
                $('#tablepr').html(data)
                validasi_data_holding_temp()
            }
        });
    }


    function locksave() {
        var cek = "";
        <?php if ($data_tabels):?>
        <?php foreach ($data_tabels as $c): ?>
        cek = "<?php echo $c["P_KodeBatch"];?>";
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

    function validasi_data_holding_temp() {
        var container = document.getElementById("T_KodeKontainer").value;
        <?php foreach($release_datas as $hold): ?>
        if (container == "<?php echo $hold['P_KodeKontainer'];?>") {

            document.getElementById("T_KodeKontainer").setAttribute('readonly',
                'readonly');

            document.getElementById("T_KodeBatch").focus();

        }
        <?php endforeach; ?>

    }

    function closenotifdone() {
        var url;
        $.ajax({
            url: "<?php echo site_url('closenotifrp')?>",
            type: "POST",
            data: $('#repair_store').serialize(),
            success: function(data) {
                reload_table();
            }
        });
    }

    function closenotifreport() {
        var url;
        $.ajax({
            url: "<?php echo site_url('closenotifrpreport')?>",
            type: "POST",
            data: $('#repair_store').serialize(),
            success: function(data) {
                reload_table();
            }
        });
    }

    function reset() {
        document.getElementById("T_KodeBatch").focus();
        document.getElementById("T_KodeBatch").value = '';
        document.getElementById("T_QTY").value = '1';
    }

    function add() {
        var url;
        $.ajax({
            url: "<?php echo site_url('add_produksirepair')?>",
            type: "POST",
            data: $('#repair_store').serialize(),
            success: function(data) {
                reset();
                reload_table();
                document.getElementById("btn_insert").setAttribute('hidden', 'hidden');
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
                url: "<?php echo base_url(); ?>/delcek_produksirepair",
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

    function deletee(P_No, P_KodeBatch, P_KodeKontainer, P_QTY) {
        var url;
        $.ajax({
            url: "<?php echo site_url('del_produksirepair')?>",
            type: "POST",
            dataType: 'json',
            data: { //sesuaikan dengan tabel data yang bawah
                P_No: P_No,
                P_KodeBatch: P_KodeBatch,
                P_KodeKontainer: P_KodeKontainer,
                P_QTY: P_QTY
            },
        });
        reload_table();
    }

    function deleteeeee(P_No) {
        var url;
        $.ajax({
            url: "<?php echo site_url('del_produksirepair')?>",
            type: "POST",
            data: "P_No=" + P_No,
            success: function(data) {
                reload_table();
            }
        });
    }

    $(document).ready(function() {
        $('#master_list').DataTable();
        $('#master_list2').DataTable();

    });

    function box() {
        var valuebatch = document.getElementById("T_KodeBatch").value;
        var valuecontainer = document.getElementById("T_KodeKontainer").value;
        var valueqty = document.getElementById("T_QTY").value;
        var valuebatch = valuebatch.toString().substr(6, 3);

        if (valuecontainer == "") {
            // document.getElementById("btn_insert").disabled = false;        
            document.getElementById('btn_insert').removeAttribute('hidden', 'hidden');
        } else {
            document.getElementById('T_QTY').removeAttribute('readonly');
        }

        <?php if ($masterbarang): ?>
        <?php $a=0;?>
        <?php foreach ($masterbarang as $produksi): ?>
        <?php $a++?>
        var ban<?= $a;?> = "<?php echo $produksi["mbr_kode"]; ?>";
        var c = "<?= $produksi["mbr_produk"] ?>";
        if (valuebatch == ban<?= $a;?>) {

            document.getElementById("T_NamaProduk").value = c;
            // document.getElementById("btn_insert").disabled = false;
            document.getElementById('btn_insert').removeAttribute('hidden', 'hidden');

            return
        } else {
            document.getElementById("T_NamaProduk").value = "";
            document.getElementById('btn_insert').setAttribute('hidden', 'hidden');
            // document.getElementById("btn_insert").disabled = true;
        }
        <?php endforeach; ?>
        <?php endif; ?>


    }

    function validasi() {
        var get_batc = document.getElementById("T_KodeBatch").value;
        var get_batch = get_batc.toString().substr(0, 10);
        var get_qty = document.getElementById("T_QTY").value;
        var get_max = document.getElementById("T_QTY");
        <?php foreach ($repair_temp as $temp) {?>
        var batch = "<?= $temp['RPR_KodeBatch']?>";
        var batch2 = batch.substring(0, 10);
        console.log(batch2);
        console.log(get_batch);
        var qty = "<?= $temp['RPR_QTY']?>";

        if (get_batch == batch2) {
            $("#warning").text("");
            get_max.max = qty;
            document.getElementById("btn_insert").removeAttribute('hidden', 'hidden');
            return;
        } else {
            $("#warning").text("Item Not Found");
            document.getElementById("btn_insert").setAttribute('hidden', 'hidden');
        }
        <?php }?>
    }
    document.onkeyup = function(e) {
        var e = e || window.event;
        if (e.altKey && e.which == 49) {
            document.getElementById("T_KodeKontainer").value = '';
            document.getElementById("T_KodeKontainer").focus();
            return false;
        }
        if (e.altKey && e.which == 50) {
            document.getElementById("T_KodeBatch").value = '';
            document.getElementById("T_KodeBatch").focus();
            return false;
        }
        if (e.altKey && e.which == 51) {
            document.getElementById("T_QTY").value = '';
            document.getElementById("T_QTY").focus();
            return false;
        }
    }
    document.addEventListener("keydown", function(event) {
        if (event.keyCode === 13) {
            if (document.getElementById("T_KodeKontainer").value != "" &&
                document.getElementById("T_KodeBatch").value != "" &&
                document.getElementById("T_NamaProduk").value != "" &&
                document.getElementById("T_QTY").value != "") {
                add();
                buttonstore();
                return
            }
        }
    })
    </script>
</body>


</html>