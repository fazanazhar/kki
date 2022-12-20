<link rel="stylesheet" href="<?= base_url();?>/assets/css/bootstrap.css">

<link rel="stylesheet" href="<?= base_url();?>/assets/vendors/perfect-scrollbar/perfect-scrollbar.css">
<link rel="stylesheet" href="<?= base_url();?>/assets/vendors/bootstrap-icons/bootstrap-icons.css">
<link rel="stylesheet" href="<?= base_url();?>/assets/css/app.css">
<link rel="shortcut icon" href="<?= base_url();?>/assets/images/favicon.svg" type="image/x-icon">
<div class="col-12 mx-auto">
    <div class="card-body">
        <div class="container my-4"
            style="border: 0.5px solid; border-color: #435ebe; border-radius: 9px;  padding-bottom: 25px; padding-left: 50px; padding-right: 50px; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.1), 0 6px 20px 0 rgba(0, 0, 0, 0.18);">
            <div class="d-flex justify-content-end my-2">
            </div>
            <table class="table my-2" id="detail_list">
                <thead>
                    <tr>
                        <th style="width: 5%">No</th>
                        <th style="width: 20%">Date</th>
                        <th>Box</th>
                        <th>Batch</th>
                        <th>Produk</th>
                        <th style="width: 10%">QTY</th>
                        <th>Customer</th>
                        <th>Expedition</th>
                        <th>Kategori</th>
                        <th style="width: 13%">PIC</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($packingdatas as $key => $value): ?>
                    <tr>
                        <td><?= $key +1?></td>
                        <td><?=$value->FSHP_Datetime?></td>
                        <td><?=$value->FSHP_KodeDus?></td>
                        <td><?=$value->FSHP_KodeBatch?></td>
                        <td><?=$value->FSHP_NamaProduk?></td>
                        <td><?=$value->FSHP_QTY?></td>
                        <td><?=$value->FSHP_Customer?></td>
                        <td><?=$value->FSHP_Expedition?></td>
                        <td><?=$value->FSHP_Kategori?></td>
                        <td><?=$value->FSHP_PIC?></td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
</div>