<!DOCTYPE html>
<html>
<head>
  <title>Holding Product Move</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css">
  <style>
    .error {
      display: block;
      padding-top: 5px;
      font-size: 14px;
      color: red;
    }
  </style>
</head>
<body>
<div class="container">
    <p><h1>Holding Product Move</h1></p>
    <div class="row">
        <div class="col-2"></div>
        <div class="col-8">
            <form method="post" id="update_holding" name="update_holding" action="<?= site_url('/holdingupdate') ?>">
              <input type="hidden" name="No" id="No" value="<?php echo $holding_barang_obj['No']; ?>">
              <div class="form-group">
                <label>Batch</label>
                <input type="text" name="Batch" class="form-control" value="<?php echo $holding_barang_obj['Batch']; ?>">
              </div>
 
              <div class="form-group">
                <label>Product</label>
                <input type="text" name="Kode_Produk" class="form-control" value="<?php echo $holding_barang_obj['Kode_Produk']; ?>">
              </div>

              <div class="form-group">
                <label>QTY</label>
                <input type="text" name="Holding_FG_QTY" class="form-control" value="<?php echo $holding_barang_obj['Holding_FG_QTY']; ?>">
              </div>
 
              <div class="form-group"> <br/>
                <button type="submit" class="btn btn-info btn-block">Save Data</button>
              </div>
            </form>
        </div>
        <div class="col-2"></div>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.2/jquery.validate.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.2/additional-methods.min.js"></script>
<script>
    if ($("#update_holding").length > 0) {
      $("#update_holding").validate({
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
</body>
</html