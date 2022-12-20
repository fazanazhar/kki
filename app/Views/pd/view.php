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
    <?= $this->extend('basecore/basemain');?> <?= $this->section('pageconten')?>
    <div class="flash-data" data-flashdata="<?= session()->getFlashdata('flashdata');?>"></div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="
	<?= base_url();?>/assets/vendors/iconly/bold.css">
</head>

<body>

    <form id="add_create">
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
                                                        onclick=" window.open('<?= base_url()?>/data_pd','_blank')"
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
                                        <li><a class="dropdown-item" href="<?= base_url();?>/my_profile">
                                                <i class="icon-mid bi bi-person me-2"></i> My Profile</a></li>
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
                                    <p class="text-subtitle text-muted">Data Production.</p>
                                </div>
                                <div class="col-12 col-md-8 order-md-1 order-first"></div>
                                <div class="col-12 col-md-2 order-md-2 order-first">
                                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                                        <ol class="breadcrumb">
                                            <li class="breadcrumb-item">
                                                <a href="<?= base_url()?>/">Dashboard </a>
                                            </li>
                                            <li class="breadcrumb-item active" aria-current="page">Production</li>
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
                                                <h4 class="card-title">Production Panel</h4>
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
                                                <a type="button" class="btn btn-primary"
                                                    onclick=" window.open('<?= base_url()?>/data_pd','_blank')">Detail
                                                    Data </a>
                                            </div>
                                            <div class="col">
                                                <div class="col-12 d-flex justify-content-end">
                                                    <a type="submit" id="store"
                                                        href="<?= base_url()?>/produksisubmit-form"
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
                                            <div class="col-12 col-md-6 order-md-2 mx-auto mt-3">
                                                <div class="form-group position-relative has-icon-left">
                                                    <input type="text" class="form-control text-center"
                                                        name="P_NamaProduk" id="P_NamaProduk" placeholder="Product Name"
                                                        required readonly>
                                                    <div class="form-control-icon">
                                                        <i class="iconly-boldHeart"></i>
                                                    </div>
                                                </div>
                                                <div class="form-group position-relative has-icon-left">
                                                    <input type="text" class="form-control text-center"
                                                        name="P_KodeKontainer" id="P_KodeKontainer"
                                                        oninput="validasi_data_holding_temp()"
                                                        value="<?php if ($get_kontainer_produksi){echo $get_kontainer_produksi;} ?>"
                                                        placeholder="Code Container" autofocus required>
                                                    <div class="form-control-icon">
                                                        <i class="iconly-boldTicket"></i>
                                                    </div>
                                                </div>
                                                <div class="form-group position-relative has-icon-left">
                                                    <input type="text" class="form-control text-center" id="P_KodeBatch"
                                                        oninput="validasi_data_holding_temp(),box(),buka()"
                                                        onchange="buka()" name="P_KodeBatch" placeholder="Batch Code"
                                                        required>
                                                    <div class="form-control-icon">
                                                        <i class="iconly-boldScan"></i>
                                                    </div>
                                                </div>

                                                <div class="form-group position-relative has-icon-left">
                                                    <input type="hidden" name="P_Datetime" id="P_Datetime" value="<?php 
                                                    date_default_timezone_set('Asia/Jakarta');
                                                    echo date ('Y-m-d H:i:s'); 
                                                ?>">
                                                </div>
                                                <div class="form-group position-relative has-icon-left">
                                                    <input type="hidden" name="K_Datetime" id="K_Datetime"
                                                        value="<?php date_default_timezone_set('Asia/Jakarta'); echo date ('Y-m-d H:i:s');?>">
                                                </div>
                                                <div class="form-group position-relative has-icon-left">
                                                    <div class="input-group mb-3">
                                                        <label class="input-group-text" for="P_QTY">QTY</label>
                                                        <input type="number" min="1" name="P_QTY" id="P_QTY"
                                                            class="form-control text-center" value="1" placeholder="1">
                                                    </div>

                                                </div>
                                                <div class="form-group position-relative has-icon-left">
                                                    <input type="text" name="P_PIC" class="form-control text-center"
                                                        id="P_PIC" value="<?= user()->username; ?>"
                                                        placeholder="Operator" readonly>
                                                    <input type="hidden" name="P_Status" id="P_Status" value="Waiting">
                                                    <input type="hidden" name="P_Report" id="P_Report" value="Waiting">
                                                    <div class="form-control-icon">
                                                        <i class="iconly-boldProfile"></i>
                                                    </div>
                                                </div>
                                                <div class="form-group position-relative has-icon-left">
                                                    <div class="row" id="buttonadd" hidden>
                                                        <div class="col">
                                                            <a class="btn btn-outline-primary col-12"
                                                                onclick="buttonstore(),add()">Add
                                                                Data</a>
                                                        </div>
                                                        <div class="col">
                                                            <a onclick="reset();"
                                                                class="btn btn-outline-danger col-12">Clear</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <table class="table"
                                                style="width: 100% !important; display: flex; overflow-x: auto;"
                                                id="tablep">
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
                            </section>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>

    <script src="<?= base_url();?>/assets/vendors/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    <script src="<?= base_url();?>/assets/js/bootstrap.bundle.min.js"></script>
    <script src="<?= base_url();?>/assets/js/main.js"></script>
    <script src="<?= base_url();?>/assets/alrt/sweetalert2.all.min.js"></script>
    <script src="<?= base_url();?>/assets/js/core/produksi.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
    <script type="text/javascript" src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="<?= base_url();?>/assets/js/JsBarcode.all.min.js"></script>
    <script type="text/javascript">
    window.onload = function() {
        reload_table();
        locksave();
        reset();
        var input = document.getElementById("P_KodeKontainer").focus();
    }

    function reload_table() {
        $.ajax({
            url: "<?php echo site_url('data_produksi')?>",
            beforSend: function(f) {
                $('#tablep').html('Load Data.')
            },
            success: function(data) {
                $('#tablep').html(data)
                validasi_data_holding_temp()
            }
        });
    }

    $(document).ready(function() {
        $('#master_list').DataTable();

    });

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


    function buka() {
        document.getElementById('buttonadd').removeAttribute('hidden', 'hidden');
    }

    function validasi_data_holding_temp() {
        var container = document.getElementById("P_KodeKontainer").value;
        <?php foreach($release_datas as $hold): ?>
        if (container == "<?php echo $hold['P_KodeKontainer'];?>") {

            document.getElementById("P_KodeKontainer").setAttribute('readonly',
                'readonly');
            document.getElementById("P_KodeBatch").focus();

        }
        <?php endforeach; ?>

    }

    function reset() {
        document.getElementById("P_KodeBatch").focus();
        document.getElementById("P_KodeBatch").value = '';
        document.getElementById("P_QTY").value = '1';
    }

    function box() {
        var valuebatch = document.getElementById("P_KodeBatch").value;
        var valuecontainer = document.getElementById("P_KodeKontainer").value;
        var valueqty = document.getElementById("P_QTY").value;
        var valuebatch = valuebatch.toString().substr(6, 3);

        if (valuecontainer == "") {
            document.getElementById("btn_insert").disabled = false;
        } else {
            document.getElementById('P_QTY').removeAttribute('readonly');
        }

        <?php if ($masterbarang): ?>
        <?php $a=0;?>
        <?php foreach ($masterbarang as $produksi): ?>
        <?php $a++?>
        var ban<?= $a;?> = "<?php echo $produksi["mbr_kode"]; ?>";
        var c = "<?= $produksi["mbr_produk"] ?>";
        if (valuebatch == ban<?= $a;?>) {

            document.getElementById("P_NamaProduk").value = c;
            document.getElementById("btn_insert").disabled = false;
        }
        <?php endforeach; ?>
        <?php endif; ?>


    }

    function closenotifdone() {
        var url;
        $.ajax({
            url: "<?php echo site_url('closenotifp')?>",
            type: "POST",
            data: $('#add_create').serialize(),
            success: function(data) {
                reload_table();
            }
        });
    }

    function closenotifreport() {
        var url;
        $.ajax({
            url: "<?php echo site_url('closenotifpreport')?>",
            type: "POST",
            data: $('#add_create').serialize(),
            success: function(data) {
                reload_table();
            }
        });
    }

    function add() {
        var url;
        $.ajax({
            url: "<?php echo site_url('add_produksi')?>",
            type: "POST",
            data: $('#add_create').serialize(),
            success: function(data) {
                reset();
                reload_table();
                document.getElementById('buttonadd').setAttribute('hidden', 'hidden');
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
                url: "<?php echo base_url(); ?>/delcek_produksi",
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
            url: "<?php echo site_url('del_produksi')?>",
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
            url: "<?php echo site_url('del_produksi')?>",
            type: "POST",
            data: "P_No=" + P_No,
            success: function(data) {
                reload_table();
            }
        });
    }
    document.onkeyup = function(e) {
        var e = e || window.event;
        if (e.altKey && e.which == 49) {
            document.getElementById("P_KodeKontainer").value = '';
            document.getElementById("P_KodeKontainer").focus();
            return false;
        }
        if (e.altKey && e.which == 50) {
            document.getElementById("P_KodeBatch").value = '';
            document.getElementById("P_KodeBatch").focus();
            return false;
        }
        if (e.altKey && e.which == 51) {
            document.getElementById("P_QTY").value = '';
            document.getElementById("P_QTY").focus();
            return false;
        }
    }
    document.addEventListener("keydown", function(event) {
        if (event.keyCode === 13) {
            if (document.getElementById("P_KodeKontainer").value != "" &&
                document.getElementById("P_KodeBatch").value != "" &&
                document.getElementById("P_NamaProduk").value != "" &&
                document.getElementById("P_QTY").value != "") {
                add();
                buttonstore();
                return
            }
        }
        if (event.keyCode === 115) {

            document.getElementById("store").click();
            return

        }
    })
    </script>

</body>


</html>