<link rel="stylesheet" href="<?= base_url();?>/assets/css/bootstrap.css">

<link rel="stylesheet" href="<?= base_url();?>/assets/vendors/perfect-scrollbar/perfect-scrollbar.css">
<link rel="stylesheet" href="<?= base_url();?>/assets/vendors/bootstrap-icons/bootstrap-icons.css">
<link rel="stylesheet" href="<?= base_url();?>/assets/css/app.css">
<link rel="shortcut icon" href="<?= base_url();?>/assets/images/favicon.svg" type="image/x-icon">
<div class="col-9 mx-auto">
    <div class="card-body">
        <div class="container my-4"
            style="border: 0.5px solid; border-color: #435ebe; border-radius: 9px;  padding-bottom: 25px; padding-left: 15px; padding-right: 15px; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.1), 0 6px 20px 0 rgba(0, 0, 0, 0.18);">
            <table class="table my-2 d-flex flex-column" id="detail_list">
                <tbody style="overflow-x: auto; white-space: nowrap;">
                    <tr>

                        <th style="width: 5%">No</th>
                        <th style="width: 20%">Date</th>
                        <th>Box</th>
                        <th>Batch</th>
                        <th>Produk</th>
                        <th style="width: 10%">QTY</th>
                        <th style="width: 13%">PIC</th>
                    </tr>
                    <?php foreach($packingdatas as $key => $value): ?>
                    <tr>
                        <td><?= $key +1?></td>
                        <td><?=$value->K_Datetime?></td>
                        <td><?=$value->K_KodeDus?></td>
                        <td><?=$value->K_Kodebatch?></td>
                        <td><?=$value->K_NamaProduk?></td>
                        <td><?=$value->K_QTY?></td>
                        <td><?=$value->K_PIC?></td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
</div>