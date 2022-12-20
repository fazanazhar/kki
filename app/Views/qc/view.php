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

<form id="qc_produksi" name="qc_produksi">

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
                                                if ($a == "Approved" & $b == "Approved" ): ?>
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
                                            <h6 class="dropdown-header">Hello, <?= user()->username; ?>!</h6>
                                        </li>
                                        <li><a class="dropdown-item" href="<?= base_url('/logout');?>"><i
                                                    class="icon-mid bi bi-box-arrow-left me-2"></i>Logout</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </nav>
                </header>
                <div id="main-content">

                    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.css" integrity="sha512-HHsOC+h3najWR7OKiGZtfhFIEzg5VRIPde0kB0bG2QRidTQqf+sbfcxCTB16AcFB93xMjnBIKE29/MjdzXE+qw==" crossorigin="anonymous" referrerpolicy="no-referrer" /> -->
                    <!-- <script src="https://kit.fontawesome.com/fd8462dc4d.js" crossorigin="anonymous"></script> -->
                    <link rel="stylesheet" href="<?= base_url();?>/assets/vendors/iconly/bold.css">
                    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css"> -->
                    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
                    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
                    <div class="page-heading">
                        <div class="page-title">
                            <div class="row">
                                <div class="col-12 col-md-2 order-md-1 order-last">
                                    <h3>Quality Control</h3>
                                    <p class="text-subtitle text-muted">Panel Qc.</p>
                                </div>
                                <div class="col-12 col-md-8 order-md-1 order-first">
                                    <div class="row ">
                                        <div class="row justify-content-md-center">
                                            <div class="col-6 col-lg-3 col-md-6 mx-2" type="button"
                                                data-bs-toggle="modal" data-bs-target="#hstaticBackdrop">
                                                <div class="card col-12 col-lg-12 col-md-12">
                                                    <div class="card-body px-3 py-4-5">
                                                        <div class="row">
                                                            <div class="col-md-2">
                                                                <div class="stats-icon blue">
                                                                    <i class="iconly-boldHome"></i>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-8">
                                                                <h6 class="text-muted font-semibold">Holding</h6>
                                                                <h6 class="font-extrabold mb-0"><?= $holdingdata ?></h6>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-6 col-lg-3 col-md-6 mx-2" type="button"
                                                data-bs-toggle="modal" data-bs-target="#mstaticBackdrop">
                                                <div class="card col-12 col-lg-12 col-md-12">
                                                    <div class="card-body px-3 py-4-5">
                                                        <div class="row">
                                                            <div class="col-md-2">
                                                                <div class="stats-icon orange">
                                                                    <i class="iconly-boldWork"></i>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-10">
                                                                <h6 class="text-muted font-semibold">Marketplace
                                                                </h6>
                                                                <h6 class="font-extrabold mb-0"><?= $marketplacedata ?>
                                                                </h6>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-6 col-lg-2 col-md-1 mx-auto" type="button"
                                                data-bs-toggle="modal" data-bs-target="#dmpstaticBackdrop">
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
                                                                <h6 class="text-muted font-semibold">Sun San</h6>
                                                                <h6 class="font-extrabold mb-0"><?= $sunsandata ?></h6>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-6 col-lg-2 col-md-6 mx-auto" type="button"
                                                data-bs-toggle="modal" data-bs-target="#rprstaticBackdrop">
                                                <div class="card col-12 col-lg-12 col-md-12">
                                                    <div class="card-body px-1 py-4-5">
                                                        <div class="row">
                                                            <div class="col-md-3">
                                                                <div class="stats-icon green">
                                                                    <i class="iconly-boldSwap"></i>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-9">
                                                                <h6 class="text-muted font-semibold">Repair</h6>
                                                                <h6 class="font-extrabold mb-0"><?= $repairdata?></h6>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-6 col-lg-2 col-md-6 mx-auto" type="button"
                                                data-bs-toggle="modal" data-bs-target="#rtnstaticBackdrop">
                                                <div class="card col-12 col-lg-12 col-md-12">
                                                    <div class="card-body px-1 py-4-5">
                                                        <div class="row">
                                                            <div class="col-md-3">
                                                                <div class="stats-icon purple">
                                                                    <i class="iconly-boldBookmark"></i>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-9">
                                                                <h6 class="text-muted font-semibold">Retain</h6>
                                                                <h6 class="font-extrabold mb-0"><?= $retainrdata?></h6>
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
                                                                    <i class="iconly-boldDelete"></i>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-9">
                                                                <h6 class="text-muted font-semibold">Destroy</h6>
                                                                <h6 class="font-extrabold mb-0"><?= $destroydata?></h6>
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
                                            <li class="breadcrumb-item active" aria-current="page">Quality Control
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
                                        <div class="row">
                                            <div class="col">
                                                <h4 class="card-title">Quality Control Panel</h4>
                                            </div>
                                            <div class="col">
                                                <nav aria-label="breadcrumb"
                                                    class="breadcrumb-header float-start float-lg-end" type="button"
                                                    data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                                                    <ol class="breadcrumb">
                                                        <li class="breadcrumb-item">Production</li>
                                                        <li class="breadcrumb-item active" aria-current="page">
                                                            <?= $pdtempdata?>
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
                                                <input type="text" class="form-control text-center"
                                                    oninput="validasi_data_holding_temp(),copy()" id="P_KodeKontainer"
                                                    name="P_KodeKontainer"
                                                    value="<?php if ($get_container){echo $get_container;} ?>"
                                                    placeholder="Code Container Production" required>
                                                <script>
                                                function validasi_data_holding_temp() {
                                                    var container = document.getElementById("P_KodeKontainer").value;

                                                    <?php $tambah = 0?>
                                                    <?php $tambah_log = 0?>
                                                    <?php foreach($p_kon as $hold): ?>
                                                    <?php $tambah++;?>
                                                    <?php $tambah_log++;?>
                                                    if (container == "<?php echo $hold['P_KodeKontainer'];?>") {
                                                        $("#info_data<?php echo $tambah++;?>").text(
                                                            "[<?= $hold['P_NamaProduk']?>]");
                                                        $("#info_data<?php echo $tambah++;?>").text(
                                                            "<?= $hold['P_QTY']?> pcs");
                                                        $("#info_data<?php echo $tambah++;?>").text(
                                                            "<?= $hold['P_KodeBatch']?>");
                                                        document.getElementById("P_KodeKontainer").setAttribute(
                                                            'readonly',
                                                            'readonly');
                                                        document.getElementById('Q1_KodeBatch').removeAttribute(
                                                            'readonly');
                                                        document.getElementById('Q1_KodeKontainer').removeAttribute(
                                                            'readonly');
                                                        document.getElementById('Q1_Kategori').disabled = false;
                                                        document.getElementById('Q1_QTY').removeAttribute('readonly');
                                                        document.getElementById("Q1_KodeBatch").focus();
                                                    }
                                                    <?php endforeach; ?>

                                                }
                                                </script>
                                                <div style="width: 85%">
                                                    <?php for($banding = 1; $banding <= $tambah; $banding++): ?>
                                                    <span class="text-muted" id="info_data<?php echo $banding?>"></span>

                                                    <?php endfor; ?>
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="col-12 d-flex justify-content-end">
                                                    <a type="submit" id="store" href="<?= base_url()?>/pindah"
                                                        class="btn btn-primary mx-2" hidden>Save</a>
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
                                                        name="Q1_NamaProduk" id="Q1_NamaProduk"
                                                        placeholder="Product Name" required readonly>
                                                    <div class="form-control-icon">
                                                        <i class="iconly-boldHeart"></i>
                                                    </div>
                                                </div>
                                                <span class="text-muted" id="salah"></span>
                                                <div class="form-group position-relative has-icon-left">
                                                    <input type="text" class="form-control text-center"
                                                        id="Q1_KodeBatch" name="Q1_KodeBatch"
                                                        oninput="enable(),namaproduk()" placeholder="Batch Code"
                                                        required readonly>
                                                    <div class="form-control-icon">
                                                        <i class="iconly-boldScan"></i>
                                                    </div>
                                                </div>
                                                <div class="input-group mb-3">
                                                    <label class="input-group-text" for="Category">Category</label>
                                                    <input type="text" list="Kategori" class="form-select"
                                                        name="Q1_Kategori" id="Q1_Kategori" oninput="enable();"
                                                        autocomplete="off" disabled required>
                                                    <datalist id="Kategori">
                                                        <option value="Holding">
                                                        <option value="Marketplace">
                                                        <option value="DiscMP">
                                                        <option value="Sunsan">
                                                        <option value="Repair">
                                                        <option value="Retain">
                                                        <option value="Destroy">
                                                    </datalist>
                                                </div>
                                                <div class="form-group position-relative has-icon-left">
                                                    <input type="text" class="form-control text-center"
                                                        name="Q1_KodeKontainer" id="Q1_KodeKontainer"
                                                        placeholder="Location Continer" oninput="enable();" required
                                                        readonly>
                                                    <div class="form-control-icon">
                                                        <i class="iconly-boldScan"></i>
                                                    </div>
                                                </div>
                                                <div class="form-group position-relative has-icon-left">
                                                    <input type="hidden" name="Q1T_Datetime" id="Q1T_Datetime"
                                                        value="<?php date_default_timezone_set('Asia/Jakarta'); echo date ('Y-m-d H:i:s');?>">
                                                </div>
                                                <div class="input-group mb-3">
                                                    <label class="input-group-text" for="Q1_QTY">QTY</label>
                                                    <input type="number" min="1" class="form-control text-center"
                                                        name="Q1_QTY" id="Q1_QTY" value="1" placeholder="1" readonly>
                                                </div>
                                                <div class="form-group position-relative has-icon-left">
                                                    <input type="text" name="Q1_PIC" class="form-control text-center"
                                                        id="Q1_PIC" value="<?= user()->username; ?>"
                                                        placeholder="<?= user()->username; ?>" readonly>
                                                    <div class="form-control-icon">
                                                        <i class="iconly-boldProfile"></i>
                                                    </div>
                                                </div>
                                                <div class="form-group position-relative has-icon-left">
                                                    <div class="row" id="buttonadd" hidden>
                                                        <div class="col">
                                                            <a class="btn btn-outline-primary col-12" id="adddata"
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
                                            <table class="table" style="display: flex; overflow-x: auto;" id="wms">
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <!-- Modal -->
                                <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static"
                                    data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel"
                                    aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-scrollable modal-xl">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="staticBackdropLabel">DATA PRODUCTION</h5>
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
                                                    <table class="table my-2" id="master_list">
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
                                                            <?php if($p_kon): ?>
                                                            <?php foreach($p_kon as $produksi): ?>

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
                                                    <table class="table my-2" id="master_list2">
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
                                                    <table class="table my-2" id="master_list3">
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
                                                    <table class="table my-2" id="master_list5">
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
                                <div class="modal fade" id="rprstaticBackdrop" data-bs-backdrop="static"
                                    data-bs-keyboard="false" tabindex="-1" aria-labelledby="rprstaticBackdropLabel"
                                    aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-scrollable modal-xl">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="rprstaticBackdropLabel">REPAIR PRODUCT
                                                </h5>
                                                <a type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></a>
                                            </div>
                                            <div class="modal-body">
                                                <div class="container my-4"
                                                    style="border: 1px solid; border-color: #435ebe; border-radius: 25px;  padding-bottom: 25px; padding-left: 50px; padding-right: 50px; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);">
                                                    <p>
                                                    <h1 style="text-align:center">Repair Product List</h1>
                                                    </p>
                                                    <div class="d-flex justify-content-end my-2">
                                                    </div>
                                                    <table class="table my-2" id="master_list6">
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
                                <!-- Modal Retain-->
                                <div class="modal fade" id="rtnstaticBackdrop" data-bs-backdrop="static"
                                    data-bs-keyboard="false" tabindex="-1" aria-labelledby="rtnstaticBackdropLabel"
                                    aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-scrollable modal-xl">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="rtnstaticBackdropLabel">RETAIN PRODUCT
                                                </h5>
                                                <a type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></a>
                                            </div>
                                            <div class="modal-body">
                                                <div class="container my-4"
                                                    style="border: 1px solid; border-color: #435ebe; border-radius: 25px;  padding-bottom: 25px; padding-left: 50px; padding-right: 50px; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);">
                                                    <p>
                                                    <h1 style="text-align:center">Retain Product List</h1>
                                                    </p>
                                                    <div class="d-flex justify-content-end my-2">
                                                    </div>
                                                    <table class="table my-2" id="master_list7">
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
                                                            <?php if($retaindatas): ?>
                                                            <?php foreach($retaindatas as $retain): ?>
                                                            <tr>
                                                                <td><?= ++$key ?></td>
                                                                <td><?php echo date('d-m-Y, H:i:s',strtotime($retain['RTN_Datetime'])); ?>
                                                                </td>
                                                                <td><?php echo $retain['RTN_KodeKontainer']; ?></td>
                                                                <td><?php echo $retain['RTN_KodeBatch']; ?></td>
                                                                <td><?php echo $retain['RTN_NamaProduk']; ?></td>
                                                                <td><?php echo $retain['RTN_QTY']; ?></td>
                                                                <td><?php echo $retain['RTN_PIC']; ?></td>
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
                                <!-- Akhir Modal Retain-->
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
                                                    <table class="table my-2" id="master_list8">
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
<script type="text/javascript" src="<?= base_url();?>/assets/js/JsBarcode.all.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
<script type="text/javascript" src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
<script type="text/javascript">
$(document).ready(function() {
    $('#master_list').DataTable();
    $('#master_list2').DataTable();
    $('#master_list3').DataTable();
    $('#master_list4').DataTable();
    $('#master_list5').DataTable();
    $('#master_list6').DataTable();
    $('#master_list7').DataTable();
    $('#master_list8').DataTable();

});
window.onload = function() {
    reload_table();
    locksave();
    reset();
    var input = document.getElementById("P_KodeKontainer").focus();

    $('#qc_produksi').on('keyup keypress', function(e) {
        var keyCode = e.keyCode || e.which;
        if (keyCode === 13) {
            e.preventDefault();
            return false;
        }
    });


}

function locksave() {
    var cek = "";
    <?php if ($data_tabels):?>
    <?php foreach ($data_tabels as $c): ?>
    cek = "<?php echo $c["Q1_KodeBatch"];?>";
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
    var kontainer = document.getElementById("P_KodeKontainer").value;
    var batch = document.getElementById("Q1_KodeBatch").value;
    var banding = "QC-Accepted";
    <?php $a=0; foreach ($p_kon as $batch): $a++; ?>


    var isi_kontainer<?= $a?> = "<?php echo $batch["P_KodeKontainer"]; ?>";
    var isi_batch<?= $a?> = "<?php echo $batch["P_KodeBatch"]; ?>";
    var isi_status<?= $a?> = "<?php echo $batch["P_Status"]; ?>";

    if (kontainer == isi_kontainer<?= $a?>) {
        if (batch == isi_batch<?= $a?> && banding == isi_status<?= $a?>) {
            if (document.getElementById("Q1_NamaProduk").value != "" &&
                document.getElementById("Q1_KodeBatch").value != "" &&
                document.getElementById("Q1_Kategori").value != "" &&
                document.getElementById("Q1_KodeKontainer").value != "") {
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
    if (batch != isi_batch<?= $a?>) {
        document.getElementById('buttonadd').setAttribute('hidden', 'hidden');
        $("#salah").text("Batch Code Not Found");
        return
    }
}

function reload_table() {
    $.ajax({
        url: "<?php echo site_url('data')?>",
        beforSend: function(f) {
            $('#wms').html('Load Data.')
        },
        success: function(data) {
            $('#wms').html(data)
        }
    });
    validasi_data_holding_temp()
}

function reset() {
    document.getElementById("qc_produksi").reset();
    document.getElementById("Q1_KodeBatch").focus();
    document.getElementById("Q1_KodeBatch").value = '';
    document.getElementById("Q1_KodeKontainer").value = '';
    document.getElementById("Q1_Kategori").value = '';
    document.getElementById("Q1_QTY").value = '1';
}

function reset2() {
    document.getElementById("Q1_KodeBatch").focus();
    document.getElementById('buttonadd').setAttribute('hidden', 'hidden');
    document.getElementById("Q1_KodeBatch").value = '';
    document.getElementById("Q1_KodeKontainer").value = '';
    document.getElementById("Q1_Kategori").value = '';
    document.getElementById("Q1_QTY").value = '1';
}

function add() {
    var url;
    $.ajax({
        url: "<?php echo site_url('add')?>",
        type: "POST",
        data: $('#qc_produksi').serialize(),
        success: function(data) {
            reset2();
            reload_table();
        }
    });
}

function closenotif() {
    var url;
    $.ajax({
        url: "<?php echo site_url('closenotif')?>",
        type: "POST",
        data: $('#qc_produksi').serialize(),
        success: function(data) {
            reload_table();
        }
    });
}

function closenotifnapp() {
    var url;
    $.ajax({
        url: "<?php echo site_url('closenotifnapp')?>",
        type: "POST",
        data: $('#qc_produksi').serialize(),
        success: function(data) {
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
            url: "<?php echo base_url(); ?>/delcek",
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

function deletee(Q1_No, Q1_KodeBatch, P_KodeKontainer, Q1_QTY) {
    var url;
    $.ajax({
        url: "<?php echo site_url('del')?>",
        type: "POST",
        dataType: 'json',
        data: { //sesuaikan dengan tabel data yang bawah
            Q1_No: Q1_No,
            Q1_KodeBatch: Q1_KodeBatch,
            P_KodeKontainer: P_KodeKontainer,
            Q1_QTY: Q1_QTY
        },
    });
    reload_table();
}

function deleteeeee(Q1_No) {
    var url;
    $.ajax({
        url: "<?php echo site_url('del')?>",
        type: "POST",
        data: "Q1_No=" + Q1_No,
        success: function(data) {
            reload_table();
        }
    });
}


function copy() {
    var p_kode_copy = document.getElementById("P_KodeKontainer").value;
    console.log(p_kode_copy);
    document.getElementById("P_KodeKontainer2").value = p_kode_copy;
}

function copyconfirm() {
    var buttonName = event.target.name;
    console.log(buttonName);
    document.getElementById("confirm").value = buttonName;
}


function namaproduk() {
    var valuebatch = document.getElementById("Q1_KodeBatch").value;
    var valuebatch = valuebatch.toString().substr(6, 3);
    <?php if($masterbarang): ?>
    <?php foreach($masterbarang as $produksi): ?>

    if (valuebatch == "<?php echo $produksi['mbr_kode'];?>") {
        document.getElementById("Q1_NamaProduk").value = "<?= $produksi['mbr_produk'];?>";
        document.getElementById('btn_insert').disabled = false;
    }
    <?php endforeach; ?>
    <?php endif; ?>

}

document.onkeyup = function(e) {
    var e = e || window.event;
    if (e.altKey && e.which == 49) {
        document.getElementById("Q1_KodeBatch").value = '';
        document.getElementById("Q1_KodeBatch").focus();
        return false;
    }
    if (e.altKey && e.which == 50) {
        document.getElementById("Q1_Kategori").value = '';
        document.getElementById("Q1_Kategori").focus();
        return false;
    }
    if (e.altKey && e.which == 51) {
        document.getElementById("Q1_KodeKontainer").value = '';
        document.getElementById("Q1_KodeKontainer").focus();
        return false;
    }
    if (e.altKey && e.which == 52) {
        document.getElementById("Q1_QTY").value = '';
        document.getElementById("Q1_QTY").focus();
        return false;
    }
}
document.addEventListener("keydown", function(event) {
    if (event.keyCode === 13) {
        if (document.getElementById("Q1_NamaProduk").value != "" &&
            document.getElementById("Q1_KodeBatch").value != "" &&
            document.getElementById("Q1_Kategori").value != "" &&
            document.getElementById("Q1_KodeKontainer").value != "") {
            add();
            buttonstore();
            return
        }
    }
})
</script>
</div>
</div>
</div>
<script src="<?= base_url();?>/assets/vendors/perfect-scrollbar/perfect-scrollbar.min.js"></script>
<script src="<?= base_url();?>/assets/js/bootstrap.bundle.min.js"></script>

<script src="<?= base_url();?>/assets/js/main.js"></script>
</body>


</html>