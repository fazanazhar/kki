<?= $this->extend('basecore/basemain');?>
<?= $this->section('pageconten')?>
<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Holding Product</h3>
                <p class="text-subtitle text-muted">Holding Product.</p>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?= base_url()?>/">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Holding Product
                        </li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <section class="section">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Holding Product List</h4>
            </div>
            <div class="card-body">
                <div class="container my-4" style="border: 1px solid; border-color: #435ebe;  border-radius: 25px;  padding-bottom: 25px; padding-left: 50px; padding-right: 50px; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);">
                    <p><h1 class="mb-4" style="text-align:center; color:#435ebe;" >ADD HOLDING PRODUCT</h1></p>
                    <div class="container">
                        <div class="row">
                            <div class="col-2"></div>
                            <div class="col-8">
                                <form method="post" id="add_create" name="add_create" action="<?= site_url('/holdingsubmit-form') ?>">
                                <?= csrf_field(); ?>
                                <input type="hidden" name="Tanggal_Holding" value="<?php echo date("d-m-Y"); ?>">
                                <div class="form-group">
                                    <label style="color:#435ebe;">Batch</label>
                                    <input type="text" name="Batch" class="form-control" autofocus>
                                </div>
                                <div class="form-group">
                                    <label style="color:#435ebe;">Product</label>
                                    <input type="text" name="Kode_Produk" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label style="color:#435ebe;">QTY</label>
                                    <input type="text" name="Holding_FG_QTY" class="form-control">
                                </div>
                                <div class="form-group d-flex justify-content-end mt-4"><br/>
                                    <button type="submit" class="btn btn-outline-primary mx-2">Add Product</button>
                                    <a href="<?= base_url()?>/holding"class="btn btn-outline-danger">Cancel</a>
                                </div>
                                </form>
                            </div>
                            <div class="col-2"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.2/jquery.validate.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.2/additional-methods.min.js"></script>
<script>
    if ($("#add_create").length > 0) {
      $("#add_create").validate({
        rules: {
          name: {
            required: true,
          },
          email: {
            required: true,
            maxlength: 60,
            email: true,
          },
        },
        messages: {
          name: {
            required: "Name is required.",
          },
          email: {
            required: "Email is required.",
            email: "It does not seem to be a valid email.",
            maxlength: "The email should be or equal to 60 chars.",
          },
        },
      })
    }
  </script>
<?= $this->endSection();?>