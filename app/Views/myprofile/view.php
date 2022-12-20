<?= $this->extend('basecore/basemain');?>
<?= $this->section('pageconten')?>
<div class="flash-data" data-flashdata="<?= session()->getFlashdata('flashdata');?>"></div>
<link rel="stylesheet" href="<?= base_url();?>/assets/vendors/iconly/bold.css">
<!-- <script src="https://kit.fontawesome.com/fd8462dc4d.js" crossorigin="anonymous"></script> -->
<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-2 order-md-1 order-last">
                <h3>MY Profile</h3>
                <p class="text-subtitle text-muted">Data Profile.</p>
            </div>
            <div class="col-12 col-md-6 order-md-1 order-first">
                <div class="row">

                </div>
            </div>
            <div class="col-12 col-md-4 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?= base_url()?>/">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Profile
                        </li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <div class="col-10 mx-auto">
        <section class="section">
            <div class="container py-5">
                <div class="row">
                    <div class="col-lg-4">
                        <div class="card mb-4 ">
                            <div class="card-body text-center">
                                <div class="avatar avatar-xl bg-primary mt-4 me-8">
                                    <span class="avatar-content"><?php  $data = user()->username;    
                                                                        $whatIWant = substr($data, strpos($data, " ") + 1);
                                                                        $akhir = substr($whatIWant,0,1);
                                                                        $awal = substr($data,0,1);
                                                                        echo $awal;echo $akhir; ?>
                                    </span>
                                </div>
                                <h5 class="my-3"><?= user()->fullname; ?></h5>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-8">
                        <div class="card mb-4">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-sm-3">
                                        <p class="mb-0">User Name</p>
                                    </div>
                                    <div class="col-sm-9">
                                        <p class="text-muted mb-0"><?= user()->username; ?></p>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <p class="mb-0">Email</p>
                                    </div>
                                    <div class="col-sm-9">
                                        <p class="text-muted mb-0"><?= user()->email; ?></p>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <p class="mb-0">Role</p>
                                    </div>
                                    <div class="col-sm-9">
                                        <p class="text-muted mb-0"><?= user()->role; ?></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.2/jquery.validate.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.2/additional-methods.min.js"></script>
<script src="<?= base_url();?>/assets/alrt/sweetalert2.all.min.js"></script>
<script type="text/javascript" src="<?= base_url();?>/assets/js/JsBarcode.all.min.js"></script>
<?= $this->endSection();?>