<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title?></title>

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?= base_url();?>/assets/css/bootstrap.css">

    <link rel="stylesheet" href="<?= base_url();?>/assets/vendors/perfect-scrollbar/perfect-scrollbar.css">
    <link rel="stylesheet" href="<?= base_url();?>/assets/vendors/bootstrap-icons/bootstrap-icons.css">
    <link rel="stylesheet" href="<?= base_url();?>/assets/css/app.css">
    <link rel="shortcut icon" href="<?= base_url();?>/assets/images/favicon.svg" type="image/x-icon">
</head>

<form id="qc_repair" name="qc_repair">

    <body>
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
                                            $b = $produksi['P_Report'];
                                            $a = $produksi['P_Status'];
                                                if ($a == "Approved" & $b == "Approved"  ): ?>
                                            <span
                                                class="position-absolute top-40 start-40 translate-middle badge rounded-pill bg-danger">
                                                !
                                                <span class="visually-hidden">unread messages</span>
                                            </span>
                                            <?php endif; ?>
                                            <?php endforeach; ?>

                                            <?php foreach($produksidatas as $produksi2): ?>
                                            <?php 
                                            $b2 = $produksi2['P_Report'];
                                            $a2 = $produksi2['P_Status'];
                                                if ($a2 == "Not Approved" & $b2 == "Not Approved"): ?>
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
                                            $a = $produksi['P_Status'];
                                            $b = $produksi['P_Report'];
                                            if ($a == "Approved" & $b == "Approved"): ?>
                                                <div class="alert alert-success alert-dismissible fade show"
                                                    role="alert">
                                                    <strong><?php echo $produksi['P_KodeBatch'];?></strong> your request
                                                    has been approved.
                                                    <input type="text" class="form-control text-center" id="confirmno"
                                                        name="confirmno" placeholder="no"
                                                        value="<?php echo $produksi['P_No'];?>" hidden required>
                                                    <input type="text" class="form-control text-center"
                                                        id="confirmbatch" name="confirmbatch" placeholder="batch"
                                                        value="<?php echo $produksi['P_KodeBatch'];?>" hidden required>
                                                    <a type="button" class="btn-close" data-bs-dismiss="alert"
                                                        onclick="closenotif()" name="Confirmed" aria-label="Close"></a>
                                                </div>
                                                <?php endif; ?>
                                                <?php endforeach; ?>
                                                <?php endif; ?>

                                            </li>
                                            <li>
                                                <?php $key = 0?>
                                                <?php if($produksidatas): ?>
                                                <?php foreach($produksidatas as $produksi): ?>
                                                <?php $key++;?>



                                                <?php 
                                            $b = $produksi['P_Report'];
                                            $a = $produksi['P_Status'];
                                            if ($a == "Not Approved" & $b == "Not Approved"): ?>
                                                <div class="alert alert-danger alert-dismissible fade show"
                                                    role="alert">
                                                    <strong><?php echo $produksi['P_KodeBatch'];?></strong> your request
                                                    has been not approved.
                                                    <input type="text" class="form-control text-center"
                                                        id="confirmnonapp" name="confirmnonapp" placeholder="no"
                                                        value="<?php echo $produksi['P_No'];?>" hidden required>
                                                    <input type="text" class="form-control text-center"
                                                        id="confirmbatchnapp" name="confirmbatchnapp"
                                                        placeholder="batch"
                                                        value="<?php echo $produksi['P_KodeBatch'];?>" hidden required>
                                                    <a type="button" class="btn-close" data-bs-dismiss="alert"
                                                        onclick="closenotifnapp()" name="Confirmed"
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
                                            <h6 class="dropdown-header">Hello, <?= user()->username; ?>!
                                            </h6>
                                        </li>
                                        <li><a class="dropdown-item" href="<?= base_url('/logout');?>"><i
                                                    class="icon-mid bi bi-box-arrow-left me-2"></i>Logout</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </nav>
                </header>
                <div id="main-content">
                    <link rel="stylesheet" href="<?= base_url();?>/assets/vendors/iconly/bold.css">
                    <div class="page-heading">
                        <div class="page-title">
                            <div class="row">
                                <div class="col-12 col-md-2 order-md-1 order-last">
                                    <h3>Quality Control Repair</h3>
                                    <p class="text-subtitle text-muted">Panel Qc Repair</p>
                                </div>
                                <div class="col-12 col-md-8 order-md-1 order-first">
                                    <div class="row ">
                                        <div class="col-6 col-lg-2 col-md-6 mx-2" type="button" data-bs-toggle="modal"
                                            data-bs-target="#hstaticBackdrop">
                                            <div class="card col-12 col-lg-12 col-md-12">
                                                <div class="card-body px-1 py-4-5">
                                                    <div class="row">
                                                        <div class="col-md-3">
                                                            <div class="stats-icon green">
                                                                <i class="iconly-boldShow"></i>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-9">
                                                            <h6 class="text-muted font-semibold">Holding
                                                            </h6>
                                                            <h6 class="font-extrabold mb-0">
                                                                <?= $holdingdata ?>
                                                            </h6>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-6 col-lg-2 col-md-6 mx-2" type="button" data-bs-toggle="modal"
                                            data-bs-target="#mstaticBackdrop">
                                            <div class="card col-12 col-lg-12 col-md-12">
                                                <div class="card-body px-1 py-4-5">
                                                    <div class="row">
                                                        <div class="col-md-3">
                                                            <div class="stats-icon orange">
                                                                <i class="iconly-boldShow"></i>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-9">
                                                            <h6 class="text-muted font-semibold">MP
                                                            </h6>
                                                            <h6 class="font-extrabold mb-0">
                                                                <?= $marketplacedata ?></h6>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-6 col-lg-2 col-md-1 mx-auto" type="button"
                                            data-bs-toggle="modal" data-bs-target="#dmpstaticBackdrop">
                                            <div class="card col-12 col-lg-12 col-md-12">
                                                <div class="card-body px-1 py-4-5">
                                                    <div class="row">
                                                        <div class="col-md-3">
                                                            <div class="stats-icon red">
                                                                <i class="iconly-boldProfile"></i>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-9">
                                                            <h6 class="text-muted font-semibold">Disc
                                                                MP</h6>
                                                            <h6 class="font-extrabold mb-0"><?= $discdata ?>
                                                            </h6>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-6 col-lg-2 col-md-6 mx-auto" type="button"
                                            data-bs-toggle="modal" data-bs-target="#sstaticBackdrop">
                                            <div class="card col-12 col-lg-12 col-md-12">
                                                <div class="card-body px-1 py-4-5">
                                                    <div class="row">
                                                        <div class="col-md-3">
                                                            <div class="stats-icon yellow">
                                                                <i class="iconly-boldAdd-User"></i>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-9">
                                                            <h6 class="text-muted font-semibold">Sun
                                                                San</h6>
                                                            <h6 class="font-extrabold mb-0">
                                                                <?= $sunsandata ?>
                                                            </h6>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-6 col-lg-2 col-md-6 mx-auto" type="button"
                                            data-bs-toggle="modal" data-bs-target="#dtstaticBackdrop">
                                            <div class="card col-12 col-lg-12 col-md-12">
                                                <div class="card-body px-1 py-4-5">
                                                    <div class="row">
                                                        <div class="col-md-3">
                                                            <div class="stats-icon grey">
                                                                <i class="iconly-boldBookmark"></i>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-9">
                                                            <h6 class="text-muted font-semibold">Destroy
                                                            </h6>
                                                            <h6 class="font-extrabold mb-0">
                                                                <?= $destroydata?>
                                                            </h6>
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
                                            <li class="breadcrumb-item active" aria-current="page">Quality
                                                Control</li>
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
                                                <nav aria-label="breadcrumb"
                                                    class="breadcrumb-header float-start float-lg-end" type="button"
                                                    data-bs-toggle="modal" data-bs-target="#repairstaticBackdrop">
                                                    <ol class="breadcrumb">
                                                        <li class="breadcrumb-item">Product Repair</li>
                                                        <li class="breadcrumb-item active" aria-current="page">
                                                            <?= $pdrtempdata?>
                                                        </li>
                                                    </ol>
                                                </nav>
                                            </div>
                                        </div>
                                        <hr>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <input type="text" class="form-control" name="R_KodeKontainer"
                                                    id="R_KodeKontainer"
                                                    value="<?php if ($get_container){echo $get_container;} ?>"
                                                    placeholder="Code Container Production"
                                                    oninput="validasi_data_holding_temp()" required>
                                                <script>
                                                function validasi_data_holding_temp() {
                                                    var container = document.getElementById(
                                                        "R_KodeKontainer").value;

                                                    <?php $tambah = 0?>
                                                    <?php $tambah_log = 0?>
                                                    <?php foreach($produk_temp as $hold): ?>
                                                    <?php $tambah++;?>
                                                    <?php $tambah_log++;?>
                                                    if (container ==
                                                        "<?php echo $hold['P_KodeKontainer'];?>") {
                                                        $("#info_data<?php echo $tambah++;?>").text(
                                                            "[<?= $hold['P_NamaProduk']?>]");
                                                        $("#info_data<?php echo $tambah++;?>").text(
                                                            "<?= $hold['P_QTY']?> pcs");
                                                        $("#info_data<?php echo $tambah++;?>").text(
                                                            "<?= $hold['P_KodeBatch']?>");
                                                        document.getElementById("R_KodeKontainer")
                                                            .setAttribute('readonly',
                                                                'readonly');
                                                        document.getElementById('Q1T_KodeBatch')
                                                            .removeAttribute('readonly');
                                                        document.getElementById('Q1T_KodeKontainer')
                                                            .removeAttribute('readonly');
                                                        document.getElementById('Q1T_Kategori').disabled =
                                                            false;
                                                        document.getElementById('Q1T_QTY').removeAttribute(
                                                            'readonly');
                                                        document.getElementById("Q1T_KodeBatch").focus();
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
                                                        href="<?= base_url()?>/move_qcrepair" hidden>Save</a>
                                                    <a onclick="window.location.reload();"
                                                        class="btn btn-danger">Reset</a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-8 order-md-2 mx-auto my-4"
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
                                                <div class="form-group position-relative has-icon-left">
                                                    <input type="text" class="form-control text-center"
                                                        name="Q1T_NamaProduk" id="Q1T_NamaProduk"
                                                        placeholder="Product Name" required readonly>
                                                    <div class="form-control-icon">
                                                        <i class="iconly-boldHeart"></i>
                                                    </div>
                                                </div>
                                                <span class="text-muted" id="salah"></span>
                                                <div class="form-group position-relative has-icon-left">
                                                    <input type="text" class="form-control text-center"
                                                        name="Q1T_KodeBatch" id="Q1T_KodeBatch"
                                                        oninput="enable(),namaproduk()" placeholder="Batch Code"
                                                        required readonly>
                                                    <div class="form-control-icon">
                                                        <i class="iconly-boldScan"></i>
                                                    </div>
                                                </div>
                                                <div class="input-group mb-3">
                                                    <label class="input-group-text" for="Category">Category</label>
                                                    <input type="text" list="Categoryku" class="form-select"
                                                        name="Q1T_Kategori" id="Q1T_Kategori" autocomplete="off"
                                                        disabled>
                                                    <datalist id="Categoryku">
                                                        <option value="Holding" id="Holding">Holding
                                                        </option>
                                                        <option value="Marketplace" id="Marketplace">
                                                            Marketplace</option>
                                                        <option value="DiscMP" id="Disc">DiscMP</option>
                                                        <option value="Sunsan" id="Sun">Sunsan</option>
                                                        <option value="Destroy" id="Destroy">Destroy
                                                        </option>
                                                    </datalist>
                                                </div>
                                                <div class="form-group position-relative has-icon-left">
                                                    <input type="text" class="form-control text-center"
                                                        name="Q1T_KodeKontainer" id="Q1T_KodeKontainer"
                                                        placeholder="Location Container" required readonly>
                                                    <div class="form-control-icon">
                                                        <i class="iconly-boldScan"></i>
                                                    </div>
                                                </div>
                                                <div class="form-group position-relative has-icon-left">
                                                    <input type="hidden" name="Q1T_Datetime" id="Q1T_Datetime"
                                                        value="<?php date_default_timezone_set('Asia/Jakarta'); echo date ('Y-m-d H:i:s');?>">
                                                </div>
                                                <div class="input-group mb-3">
                                                    <label class="input-group-text" for="Q1T_QTY">QTY</label>
                                                    <input type="number" min="1" class="form-control text-center"
                                                        name="Q1T_QTY" id="Q1T_QTY" placeholder="1" value="1" readonly>
                                                </div>
                                                <div class="form-group position-relative has-icon-left">
                                                    <input type="text" name="Q1T_PIC" class="form-control text-center"
                                                        id="Q1T_PIC" value="<?= user()->username; ?>"
                                                        placeholder="<?= user()->username; ?>" readonly>
                                                    <div class="form-control-icon">
                                                        <i class="iconly-boldProfile"></i>
                                                    </div>
                                                </div>
                                                <div class="form-group position-relative has-icon-left">
                                                    <div class="row" id="buttonadd" hidden>
                                                        <div class="col">
                                                            <a class="btn btn-outline-primary col-12"
                                                                onclick="add(),buttonstore()">Add
                                                                Data</a>
                                                        </div>
                                                        <div class="col">
                                                            <a onclick="reset();"
                                                                class="btn btn-outline-danger col-12">Clear</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <table class="table" id="repairqctable"></table>
                                        </div>
                                    </div>
                                </div>
                                <!-- Modal -->
                                <div class="modal fade" id="repairstaticBackdrop" data-bs-backdrop="static"
                                    data-bs-keyboard="false" tabindex="-1" aria-labelledby="repairstaticBackdropLabel"
                                    aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-scrollable modal-xl">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="repairstaticBackdropLabel">DATA
                                                    PRODUCTION REPAIR</h5>
                                                <a type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></a>
                                            </div>
                                            <div class="modal-body">
                                                <div class="container my-4"
                                                    style="border: 1px solid; border-color: #435ebe; border-radius: 25px;  padding-bottom: 25px; padding-left: 50px; padding-right: 50px; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);">
                                                    <p>
                                                    <h1 style="text-align:center">Product Repair List</h1>
                                                    </p>
                                                    <div class="d-flex justify-content-end my-2">
                                                    </div>
                                                    <table class="table my-2" id="master_list7">
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
                                                            <?php if($produk_temp): ?>
                                                            <?php foreach($produk_temp as $produksi): ?>

                                                            <tr>
                                                                <td><?= ++$key ?></td>
                                                                <td><?php echo date('d-m-Y, H:i:s',strtotime($produksi['P_Datetime'])); ?>
                                                                </td>
                                                                <td><?php echo $produksi['P_KodeKontainer']; ?>
                                                                </td>
                                                                <td><?php echo $produksi['P_KodeBatch']; ?>
                                                                </td>
                                                                <td><?php echo $produksi['P_NamaProduk']; ?>
                                                                </td>
                                                                <td><?php echo $produksi['P_QTY']; ?></td>
                                                                <td><?php echo $produksi['P_Status']; ?>
                                                                </td>

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
                                <!-- Modal Holding-->
                                <div class="modal fade" id="hstaticBackdrop" data-bs-backdrop="static"
                                    data-bs-keyboard="false" tabindex="-1" aria-labelledby="hstaticBackdropLabel"
                                    aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-scrollable modal-xl">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="hstaticBackdropLabel">HOLDING PRODUCT</h5>
                                                <a type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></a>
                                            </div>
                                            <div class="modal-body">
                                                <div class="container my-4"
                                                    style="border: 1px solid; border-color: #435ebe; border-radius: 25px;  padding-bottom: 25px; padding-left: 50px; padding-right: 50px; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);">
                                                    <p>
                                                    <h1 style="text-align:center">Holding Product List</h1>
                                                    </p>
                                                    <div class="d-flex justify-content-end my-2">
                                                    </div>
                                                    <table class="table my-2" id="master_list6">
                                                        <thead>
                                                            <tr>
                                                                <th style="width: 5%">No</th>
                                                                <th style="width: 20%">Date</th>
                                                                <th>Kontainer</th>
                                                                <th>Batch</th>
                                                                <th>Produk</th>
                                                                <th style="width: 10%">QTY</th>
                                                                <th style="width: 10%">Time</th>
                                                                <th style="width: 10%">PIC</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php $key = 0?>
                                                            <?php if($holdingdatas): ?>
                                                            <?php foreach($holdingdatas as $holding): ?>

                                                            <tr>
                                                                <td><?= ++$key ?></td>
                                                                <td><?php echo date('d-m-Y, H:i:s',strtotime($holding['H_Datetime'])); ?>
                                                                </td>
                                                                <td><?php echo $holding['RQ1_KodeKontainer']; ?></td>
                                                                <td><?php echo $holding['H_KodeBatch']; ?></td>
                                                                <td><?php echo $holding['H_NamaProduk']; ?></td>
                                                                <td><?php echo $holding['H_QTY']; ?></td>
                                                                <td>
                                                                    <?php                                 
                                                                    date_default_timezone_set('Asia/Jakarta');
                                                                    $tgl1 = date('d-m-Y'); 
                                                                    $tgl3 = strtotime($tgl1);
                                                                    $tgl2 = date('d-m-Y',strtotime($holding['H_Datetime'])); 
                                                                    $tgl4 = strtotime($tgl2);
                                                                    $tgl2 = strtotime($holding['H_Datetime']);
                                                                    $jarak = $tgl3 - $tgl4;
                                                                    $hari = $jarak / 60 / 60 / 24;
                                                                    echo $hari;
                                                                    echo (" days");
                                                                    ?>
                                                                </td>
                                                                <td><?php echo $holding['H_PIC']; ?></td>
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
                                <!-- Akhir Modal Holding-->
                                <!-- Modal MP-->
                                <div class="modal fade" id="mstaticBackdrop" data-bs-backdrop="static"
                                    data-bs-keyboard="false" tabindex="-1" aria-labelledby="mstaticBackdropLabel"
                                    aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-scrollable modal-xl">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="mstaticBackdropLabel">MARKETPLACE PRODUCT
                                                </h5>
                                                <a type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></a>
                                            </div>
                                            <div class="modal-body">
                                                <div class="container my-4"
                                                    style="border: 1px solid; border-color: #435ebe; border-radius: 25px;  padding-bottom: 25px; padding-left: 50px; padding-right: 50px; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);">
                                                    <p>
                                                    <h1 style="text-align:center">Marketplace Product List</h1>
                                                    </p>
                                                    <div class="d-flex justify-content-end my-2">
                                                    </div>
                                                    <table class="table my-2" id="master_list5">
                                                        <thead>
                                                            <tr>
                                                                <th style="width: 5%">No</th>
                                                                <th style="width: 15%">Date</th>
                                                                <th style="width: 15%">Container Code</th>
                                                                <th style="width: 15%">Batch Code</th>
                                                                <th>Product</th>
                                                                <th style="width: 15%">QTY Total</th>
                                                                <th style="width: 15%">PIC</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php $key = 0?>
                                                            <?php if($marketplacedatas): ?>
                                                            <?php foreach($marketplacedatas as $marketplace): ?>
                                                            <tr>
                                                                <td><?= ++$key ?></td>
                                                                <td><?php echo date('d-m-Y, H:i:s',strtotime($marketplace['M_Datetime'])); ?>
                                                                </td>
                                                                <td><?php echo $marketplace['M_Kontainer']; ?></td>
                                                                <td><?php echo $marketplace['M_KodeBatch']; ?></td>
                                                                <td><?php echo $marketplace['M_NamaProduk']; ?></td>
                                                                <td><?php echo $marketplace['M_QTY']; ?></td>
                                                                <td><?php echo $marketplace['M_PIC']; ?></td>
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
                                <!-- Akhir Modal MP-->
                                <!-- Modal DMP-->
                                <div class="modal fade" id="dmpstaticBackdrop" data-bs-backdrop="static"
                                    data-bs-keyboard="false" tabindex="-1" aria-labelledby="dmpstaticBackdropLabel"
                                    aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-scrollable modal-xl">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="dmpstaticBackdropLabel">DISCOUNT MARKETPLACE
                                                    PRODUCT
                                                </h5>
                                                <a type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></a>
                                            </div>
                                            <div class="modal-body">
                                                <div class="container my-4"
                                                    style="border: 1px solid; border-color: #435ebe; border-radius: 25px;  padding-bottom: 25px; padding-left: 50px; padding-right: 50px; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);">
                                                    <p>
                                                    <h1 style="text-align:center">Discount Marketplace Product List</h1>
                                                    </p>
                                                    <div class="d-flex justify-content-end my-2">
                                                    </div>
                                                    <table class="table my-2" id="master_list4">
                                                        <thead>
                                                            <tr>
                                                                <th style="width: 5%">No</th>
                                                                <th style="width: 15%">Date</th>
                                                                <th style="width: 15%">Container Code</th>
                                                                <th style="width: 15%">Batch</th>
                                                                <th>Product</th>
                                                                <th style="width: 10%">QTY</th>
                                                                <th style="width: 10%">PIC</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php $key = 0?>
                                                            <?php if($discmpdatas): ?>
                                                            <?php foreach($discmpdatas as $discmp): ?>
                                                            <tr>
                                                                <td><?= ++$key ?></td>
                                                                <td><?php echo date('d-m-Y, H:i:s',strtotime($discmp['DMP_Datetime'])); ?>
                                                                </td>
                                                                <td><?php echo $discmp['DMP_Kontainer']; ?></td>
                                                                <td><?php echo $discmp['DMP_KodeBatch']; ?></td>
                                                                <td><?php echo $discmp['DMP_NamaProduk']; ?></td>
                                                                <td><?php echo $discmp['DMP_QTY']; ?></td>
                                                                <td><?php echo $discmp['DMP_PIC']; ?></td>

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
                                <!-- Akhir Modal DMP-->
                                <!-- Modal Sunsan-->
                                <div class="modal fade" id="sstaticBackdrop" data-bs-backdrop="static"
                                    data-bs-keyboard="false" tabindex="-1" aria-labelledby="sstaticBackdropLabel"
                                    aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-scrollable modal-xl">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="sstaticBackdropLabel">SUNSAN PRODUCT
                                                </h5>
                                                <a type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></a>
                                            </div>
                                            <div class="modal-body">
                                                <div class="container my-4"
                                                    style="border: 1px solid; border-color: #435ebe; border-radius: 25px;  padding-bottom: 25px; padding-left: 50px; padding-right: 50px; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);">
                                                    <p>
                                                    <h1 style="text-align:center">Sunsan Product List</h1>
                                                    </p>
                                                    <div class="d-flex justify-content-end my-2">
                                                    </div>
                                                    <table class="table my-2" id="master_list3">
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
                                <!-- Modal Destroy-->
                                <div class="modal fade" id="dtstaticBackdrop" data-bs-backdrop="static"
                                    data-bs-keyboard="false" tabindex="-1" aria-labelledby="dtstaticBackdropLabel"
                                    aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-scrollable modal-xl">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="dtstaticBackdropLabel">DESTROY PRODUCT
                                                </h5>
                                                <a type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></a>
                                            </div>
                                            <div class="modal-body">
                                                <div class="container my-4"
                                                    style="border: 1px solid; border-color: #435ebe; border-radius: 25px;  padding-bottom: 25px; padding-left: 50px; padding-right: 50px; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);">
                                                    <p>
                                                    <h1 style="text-align:center">Destroy Product List</h1>
                                                    </p>
                                                    <div class="d-flex justify-content-end my-2">
                                                    </div>
                                                    <table class="table my-2" id="master_list2">
                                                        <thead>
                                                            <tr>
                                                                <th style="width: 5%">No</th>
                                                                <th style="width: 15%">Date</th>
                                                                <th style="width: 15%">Batch Code</th>
                                                                <th>Product</th>
                                                                <th style="width: 15%">QTY Total</th>
                                                                <th style="width: 15%">PIC</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php $key = 0?>
                                                            <?php if($destroydatas): ?>
                                                            <?php foreach($destroydatas as $destroy): ?>
                                                            <tr>
                                                                <td><?= ++$key ?></td>
                                                                <td><?php echo date('d-m-Y, H:i:s',strtotime($destroy['D_Datetime'])); ?>
                                                                </td>
                                                                <td><?php echo $destroy['D_KodeBatch']; ?></td>
                                                                <td><?php echo $destroy['D_NamaProduk']; ?></td>
                                                                <td><?php echo $destroy['D_QTY']; ?></td>
                                                                <td><?php echo $destroy['D_PIC']; ?></td>
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
                                <!-- Akhir Modal Destroy-->
                            </section>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</form>

<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
<script type="text/javascript" src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
<script type="text/javascript">
$(document).ready(function() {
    $('#master_list4').DataTable();
    $('#master_list5').DataTable();
    $('#master_list6').DataTable();
    $('#master_list7').DataTable();
    $('#master_list').DataTable();
    $('#master_list2').DataTable();
    $('#master_list3').DataTable();

});
window.onload = function() {
    reload_table();
    locksave();
    reset();
    var input = document.getElementById("R_KodeKontainer").focus();
}


function reload_table() {
    $.ajax({
        url: "<?php echo site_url('data_repairqc')?>",
        beforSend: function(f) {
            $('#repairqctable').html('Load Data.')
        },
        success: function(data) {
            $('#repairqctable').html(data)
        }
    });
    validasi_data_holding_temp();
}

function locksave() {
    var cek = "";
    <?php if ($data_tabels):?>
    <?php foreach ($data_tabels as $c): ?>
    cek = "<?php echo $c["Q1T_KodeBatch"];?>";
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
    var kontainer = document.getElementById("R_KodeKontainer").value;
    var batch = document.getElementById("Q1T_KodeBatch").value;
    var banding = "QC-Accepted";
    <?php if ($produk_temp): ?>
    <?php $a=0; foreach ($produk_temp as $batch): $a++; ?>

    var isi_kontainer<?= $a?> = "<?php echo $batch["P_KodeKontainer"]; ?>";
    var isi_batch<?= $a?> = "<?php echo $batch["P_KodeBatch"]; ?>";
    var isi_status<?= $a?> = "<?php echo $batch["P_Status"]; ?>";

    if (kontainer == isi_kontainer<?= $a?> && banding == isi_status<?= $a?>) {
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


function closenotif() {
    var url;
    $.ajax({
        url: "<?php echo site_url('closenotifrepair')?>",
        type: "POST",
        data: $('#qc_repair').serialize(),
        success: function(data) {
            reload_table();
        }
    });
}

function namaproduk() {
    var valuebatch = document.getElementById("Q1T_KodeBatch").value;
    var valuebatch = valuebatch.toString().substr(6, 3);
    <?php if($masterbarang): ?>
    <?php foreach($masterbarang as $produksi): ?>

    if (valuebatch == "<?php echo $produksi['mbr_kode'];?>") {
        document.getElementById("Q1T_NamaProduk").value = "<?= $produksi['mbr_produk'];?>";
        document.getElementById('btn_insert').disabled = false;
    }
    <?php endforeach; ?>
    <?php endif; ?>

}

function reset() {
    document.getElementById("qc_repair").reset();
    document.getElementById("Q1T_KodeBatch").focus();
    document.getElementById("Q1T_KodeBatch").value = '';
    document.getElementById("Q1T_KodeKontainer").value = '';
    document.getElementById("Q1T_Kategori").value = '';
    document.getElementById("Q1T_QTY").value = '1';
}

function reset2() {
    document.getElementById('buttonadd').setAttribute('hidden', 'hidden');
    document.getElementById("Q1T_KodeBatch").focus();
    document.getElementById("Q1T_KodeBatch").value = '';
    document.getElementById("Q1T_KodeKontainer").value = '';
    document.getElementById("Q1T_Kategori").value = '';
    document.getElementById("Q1T_QTY").value = '1';
}

function add() {
    var url;
    $.ajax({
        url: "<?php echo site_url('add_qcrepair')?>",
        type: "POST",
        data: $('#qc_repair').serialize(),
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
            url: "<?php echo base_url(); ?>/delcek_qcrepair",
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

function deletee(Q1T_No, Q1T_KodeBatch, R_KodeKontainer, Q1T_QTY) {
    var url;
    $.ajax({
        url: "<?php echo site_url('del_qcrepair')?>",
        type: "POST",
        dataType: 'json',
        data: { //sesuaikan dengan tabel data yang bawah
            Q1T_No: Q1T_No,
            Q1T_KodeBatch: Q1T_KodeBatch,
            R_KodeKontainer: R_KodeKontainer,
            Q1T_QTY: Q1T_QTY
        },
    });
    reload_table();
}

function deleteeeee(Q1T_No) {
    var url;
    $.ajax({
        url: "<?php echo site_url('del_qcrepair')?>",
        type: "POST",
        data: "Q1T_No=" + Q1T_No,
        success: function(data) {
            reload_table();
        }
    });
}
document.onkeyup = function(e) {
    var e = e || window.event;
    if (e.altKey && e.which == 49) {
        document.getElementById("Q1T_KodeBatch").value = '';
        document.getElementById("Q1T_KodeBatch").focus();
        return false;
    }
    if (e.altKey && e.which == 50) {
        document.getElementById("Q1T_Kategori").value = '';
        document.getElementById("Q1T_Kategori").focus();
        return false;
    }
    if (e.altKey && e.which == 51) {
        document.getElementById("Q1T_KodeKontainer").value = '';
        document.getElementById("Q1T_KodeKontainer").focus();
        return false;
    }
    if (e.altKey && e.which == 52) {
        document.getElementById("Q1T_QTY").value = '';
        document.getElementById("Q1T_QTY").focus();
        return false;
    }
}
</script>
</div>
</div>
</div>
<script src="<?= base_url();?>/assets/vendors/perfect-scrollbar/perfect-scrollbar.min.js"></script>
<script src="<?= base_url();?>/assets/js/bootstrap.bundle.min.js"></script>

<script src="<?= base_url();?>/assets/js/main.js"></script>
</body>


</html>