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
    <link rel="stylesheet" href="<?= base_url();?>/jins/product.css">
    <link rel="stylesheet" href="<?= base_url();?>/assets/vendors/iconly/bold.css">
    <div class="flash-datae" data-flashdatae="<?= session()->getFlashdata('flashdata_error');?>"></div>
</head>
<style>
.dataTables_scrollHeadInner {
    width: 100% !important;

}

.dataTables_scrollHeadInner table {
    width: 100% !important;
}

.table {
    width: 100% !important;
}
</style>

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

                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                            data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                            aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
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
                                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButton">
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
                                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                                <strong><?php echo $produksi['P_KodeBatch'];?></strong> product
                                                don't match.
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
                            <div class="col-12 col-md-6 order-md-1 order-last">
                                <h3>PRODUCTION</h3>
                                <p class="text-subtitle text-muted">Detail Data Production</p>
                            </div>
                            <div class="col-12 col-md-6 order-md-2 order-first">
                                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="<?= base_url()?>/">Dashboard</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">Product List
                                        </li>
                                    </ol>
                                </nav>
                            </div>
                        </div>
                    </div>
                    <section class="section">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Product List</h4>
                            </div>
                            <div class="card-body">
                                <div class="container my-4"
                                    style="border: 1px solid; border-color: #435ebe; border-radius: 25px;  padding-bottom: 25px; padding-left: 50px; padding-right: 50px; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);">
                                    <p>
                                    <h1 style="text-align:center">DATA PRODUCTION</h1>
                                    </p>
                                    <?php
                    if(isset($_SESSION['msg'])){
                        echo $_SESSION['msg'];
                    }
                    ?>
                                    <table class="table my-2" id="master_list">
                                        <thead>
                                            <tr>
                                                <th style="width: 5%">No</th>
                                                <th style="width: 20%">Date</th>
                                                <th>Batch</th>
                                                <th>Produk</th>
                                                <th style="width: 10%">QTY</th>
                                                <th style="width: 13%">Status</th>
                                                <th>Report</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $key = 0?>
                                            <?php if($produksidatas): ?>
                                            <?php foreach($produksidatas as $produksi): ?>

                                            <tr>
                                                <td><?= ++$key ?></td>
                                                <td><?php echo date('d-m-Y, H:i:s',strtotime($produksi['P_Datetime'])); ?>
                                                </td>
                                                <td><?php echo $produksi['P_KodeBatch']; ?></td>
                                                <td><?php echo $produksi['P_NamaProduk']; ?></td>
                                                <td><?php echo $produksi['P_QTY']; ?></td>
                                                <td><?php echo $produksi['P_Status']; ?></td>
                                                <?php if (in_groups('administrator')):?>
                                                <td>

                                                    <?php 
                                                // $a = $produksi['P_Report'];
                                                $b = $produksi['P_Status'];
                                                if ($b != "QC-Accepted"){ ?>
                                                    <a type="button" class="notification" data-bs-toggle="modal"
                                                        data-bs-target="#editmodal<?php echo $produksi['P_No']; ?>">
                                                        <span>Detail</span>
                                                        <?php 
                                                        $a = $produksi['P_Status'];
                                                        if ($a == "Dont Match" ): ?>
                                                        <span id="not" class="badge">!</span>
                                                        <?php endif; ?>
                                                    </a>
                                                    <?php }else {?>
                                                    <svg width="40px" height="40px" xmlns="http://www.w3.org/2000/svg"
                                                        viewBox="0 0 512 512">
                                                        <path
                                                            d="M470.6 105.4c12.5 12.5 12.5 32.8 0 45.3l-256 256c-12.5 12.5-32.8 12.5-45.3 0l-128-128c-12.5-12.5-12.5-32.8 0-45.3s32.8-12.5 45.3 0L192 338.7 425.4 105.4c12.5-12.5 32.8-12.5 45.3 0z" />
                                                    </svg>
                                                    <?php } ?>
                                                </td>
                                                <?php endif?>

                                                <td>
                                                    <?php if (in_groups('administrator')):?>
                                                    <?php 
                                                        $b = $produksi['P_Status'];
                                                        if ($b != "QC-Accepted" ): ?>
                                                    <button type="button" class="btn btn-outline-primary"
                                                        data-bs-toggle="modal"
                                                        data-bs-target="#editmodall<?php echo $produksi['P_No']; ?>">Edit</button>

                                                    <a href="<?php echo base_url('masterdeleteproduksi/'.$produksi['P_No']);?>"
                                                        class="
                                                        btn btn-outline-danger">Delete</a>
                                                    <?php endif; ?>
                                                    <?php endif ?>
                                                </td>
                                            </tr>
                                            <?php endforeach; ?>
                                            <?php endif; ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </section>

                    <!-- Modal Detail-->
                    <?php $key = 0?>
                    <?php if($produksidatatemps): ?>
                    <?php foreach($produksidatatemps as $produksi): ?>
                    <div class="modal fade" id="editmodal<?php echo $produksi['P_No']; ?>" tabindex="-1"
                        aria-labelledby="edit_modal" aria-hidden="true">
                        <form method="post" id="edit_modal" name="edit_modal" action="<?= site_url('/pdupdate') ?>">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="edit_modal">Report Qty Production</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="container">
                                            <p>
                                            <h1>Report Qty Production</h1>
                                            </p>
                                            <div class="row">
                                                <div class="col-2">
                                                </div>
                                                <div class="col-8">
                                                    <input type="hidden" name="P_No" id="P_No"
                                                        value="<?php echo $produksi['P_No']; ?>">
                                                    <div class="mb-3 row">
                                                        <label class="col-sm-4 col-form-label">Date</label>
                                                        <label class="col-sm-1 col-form-label">:</label>
                                                        <div class="col-sm-7">
                                                            <input type="text" readonly name="P_Datetime"
                                                                class="form-control"
                                                                value="<?php echo $produksi['P_Datetime']; ?>">
                                                        </div>
                                                    </div>
                                                    <div class="mb-3 row">
                                                        <label class="col-sm-4 col-form-label">Container Code</label>
                                                        <label class="col-sm-1 col-form-label">:</label>
                                                        <div class="col-sm-7">
                                                            <input type="text" name="P_KodeKontainer"
                                                                class="form-control"
                                                                value="<?php echo $produksi['P_KodeKontainer']; ?>"
                                                                readonly>
                                                        </div>
                                                    </div>
                                                    <div class="mb-3 row">
                                                        <label class="col-sm-4 col-form-label">Batch Code</label>
                                                        <label class="col-sm-1 col-form-label">:</label>
                                                        <div class="col-sm-7">
                                                            <input type="text" name="P_KodeBatch" class="form-control"
                                                                value="<?php echo $produksi['P_KodeBatch']; ?>"
                                                                readonly>
                                                        </div>
                                                    </div>
                                                    <div class="mb-3 row">
                                                        <label class="col-sm-4 col-form-label">Product</label>
                                                        <label class="col-sm-1 col-form-label">:</label>
                                                        <div class="col-sm-7">
                                                            <input type="text" name="P_NamaProduk" class="form-control"
                                                                value="<?php echo $produksi['P_NamaProduk']; ?>"
                                                                readonly>
                                                        </div>
                                                    </div>
                                                    <div class="mb-3 row">
                                                        <label class="col-sm-4 col-form-label">Production (Qty)</label>
                                                        <label class="col-sm-1 col-form-label">:</label>
                                                        <div class="col-sm-7">
                                                            <input type="text" name="P_QTY" id="P_QTY"
                                                                class="form-control"
                                                                value="<?php echo $produksi['P_QTY']; ?>" readonly>
                                                        </div>
                                                    </div>
                                                    <div class="mb-3 row">
                                                        <label class="col-sm-4 col-form-label">QC (Qty)</label>
                                                        <label class="col-sm-1 col-form-label">:</label>
                                                        <div class="col-sm-7">
                                                            <input type="text" name="P_QC_QTY" id="P_QC_QTY"
                                                                class="form-control"
                                                                value="<?php echo $produksi['P_QC_QTY']; ?>" readonly>
                                                        </div>
                                                    </div>
                                                    <div class="mb-3 row">
                                                        <label class="col-sm-4 col-form-label">Difference Amount</label>
                                                        <label class="col-sm-1 col-form-label">:</label>
                                                        <div class="col-sm-7">
                                                            <input type="text" class="form-control" id="totalqty" value="<?php 
                                                            $a = $produksi['P_QTY'];
                                                            $b = $produksi['P_QC_QTY'];
                                                            $jumlah= $a - $b;
                                                            echo"$jumlah";
                                                            ?>" readonly>
                                                        </div>
                                                    </div>
                                                    <div class="mb-3 row">
                                                        <label class="col-sm-4 col-form-label">Reporter</label>
                                                        <label class="col-sm-1 col-form-label">:</label>
                                                        <div class="col-sm-7">
                                                            <input type="text" name="P_PIC" class="form-control"
                                                                value="<?php echo $produksi['P_PIC']; ?>" readonly>
                                                        </div>
                                                    </div>
                                                    <input type="hidden" name="P_Status" id="P_Status"
                                                        value="<?php echo $produksi['P_Status']; ?>">
                                                    <div class="mb-3 row" id="aa">
                                                        <label class="col-sm-4 col-form-label">Status</label>
                                                        <label class="col-sm-1 col-form-label">:</label>
                                                        <div class="col-sm-7">
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="radio"
                                                                    name="P_Report" id="approve" value="Approved"
                                                                    disable>
                                                                <label class="form-check-label"
                                                                    for="flexRadioDefault1">Approved</label>
                                                            </div>
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="radio"
                                                                    name="P_Report" value="Not Approved">
                                                                <label class="form-check-label"
                                                                    for="flexRadioDefault2">Not Approved</label>
                                                            </div>
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="radio"
                                                                    name="P_Report" value="Waiting">
                                                                <label class="form-check-label"
                                                                    for="flexRadioDefault2">Waiting</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <hr>
                                                    <p>
                                                    <h3 style="text-align:center; color:gray;">
                                                        <?php echo $produksi['P_Report']; ?></h3>
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-2"></div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary">Save Changes</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <?php endforeach; ?>
                    <?php endif; ?>
                    <!-- Akhir Modal Detail-->

                    <!-- Modal Edit-->
                    <?php $key = 0?>
                    <?php if($produksidatatemps): ?>
                    <?php foreach($produksidatatemps as $produksi): ?>
                    <div class="modal fade" id="editmodall<?php echo $produksi['P_No']; ?>" tabindex="-1"
                        aria-labelledby="edit_modal" aria-hidden="true">
                        <form method="post" id="edit_modal" name="edit_modal" action="<?= site_url('/pd_update') ?>">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="edit_modal">EDIT DATA PRODUCTION</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="container">
                                            <div class="row">
                                                <div class="col-2"></div>
                                                <div class="col-8">
                                                    <input type="hidden" name="P_No" id="P_No"
                                                        value="<?php echo $produksi['P_No']; ?>">
                                                    <div class="form-group">
                                                        <label>Kode Batch</label>
                                                        <input type="text" name="P_KodeBatch" class="form-control"
                                                            value="<?php echo $produksi['P_KodeBatch']; ?>">
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Kode Kontainer</label>
                                                        <input type="text" name="P_KodeKontainer" class="form-control"
                                                            value="<?php echo $produksi['P_KodeKontainer']; ?>">
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Produk</label>
                                                        <input type="text" name="P_NamaProduk" class="form-control"
                                                            value="<?php echo $produksi['P_NamaProduk']; ?>">
                                                    </div>
                                                    <div class="form-group">
                                                        <label>QTY</label>
                                                        <input type="text" name="P_QTY" class="form-control"
                                                            value="<?php echo $produksi['P_QTY']; ?>">
                                                    </div>
                                                </div>
                                                <div class="col-2"></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary">Save changes</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <?php endforeach; ?>
                    <?php endif; ?>
                    <!-- Akhir Modal Edit-->
                </div>
            </div>
        </div>
    </div>
    <script src="<?= base_url();?>/assets/vendors/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    <script src="<?= base_url();?>/assets/js/bootstrap.bundle.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
    <script type="text/javascript" src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <script src="<?= base_url();?>/assets/js/main.js"></script>
    <script src="<?= base_url();?>/assets/alrt/sweetalert2.all.min.js"></script>
    <script>
    $(document).ready(function() {
        $('#master_list').DataTable({
            scrollX: 100000,
            paging: true,
        });
    });
    const flashDataerror = $('.flash-datae').data('flashdatae');
    console.log(flashDataerror);
    if (flashDataerror) {
        Swal.fire({
            title: 'UPDATE QTY',
            allowOutsideClick: false,
            allowEscapeKey: false,
            showCancelButton: false,
            showConfirmButton: false,
            html: '<h5 class="text-subtitle text-muted">Data saved successfully</h5>' +
                '<p>Please fill in the latest qty!</p>' +
                '<form method="post" id="postdontmatch" action="<?php echo base_url()?>/detail_pd_update">' +
                '<input type="text" class="form-control text-center my-2" name="pd_container" id="pd_container" placeholder="Production Container" required>' +
                '<input type="text" class="form-control text-center my-2" name="batch_code" id="batch_code" placeholder="Batch Code" required>' +
                '<input type="text" class="form-control text-center my-2" name="p_qty" id="p_qty" placeholder="QTY Product" required>' +
                '<button type="submit" class="btn btn-primary ml-1">Submit</button>' +
                '</form>',
            icon: 'success'
        }).then(function() {
            // window.location.href = "qc_produk";
        })
    };
    </script>
</body>


</html>