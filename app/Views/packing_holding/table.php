<link rel="stylesheet" href="<?= base_url();?>/assets/css/bootstrap.css">
<link rel="stylesheet" href="<?= base_url();?>/assets/vendors/perfect-scrollbar/perfect-scrollbar.css">
<link rel="stylesheet" href="<?= base_url();?>/assets/vendors/bootstrap-icons/bootstrap-icons.css">
<link rel="stylesheet" href="<?= base_url();?>/assets/css/app.css">
<link rel="shortcut icon" href="<?= base_url();?>/assets/images/favicon.svg" type="image/x-icon">
<div class="col-9 mx-auto">
    <div class="card-body">
        <div class="container my-4"
            style="border: 0.5px solid; border-color: #435ebe; border-radius: 9px;  padding-bottom: 25px; padding-left: 15px; padding-right: 15px; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.1), 0 6px 20px 0 rgba(0, 0, 0, 0.18);">
            <table class="table my-2 d-flex flex-column" id="packholdingtable">
                <tbody style="overflow-x: auto; white-space: nowrap;">
                    <tr>
                        <th width="5%"></th>
                        <th style="width: 5%">No</th>
                        <th>Container</th>
                        <th>Batch</th>
                        <th>Product</th>
                        <th style="width: 20%">Category</th>
                        <th style="width: 10%">QTY</th>
                        <th style="width: 20%">Action</th>
                    </tr>
                    <?php $no=0; foreach ($data_tabels as $data_t) { $no++;?>
                    <tr>
                        <td class="text-center"><input type="checkbox" class="delete_checkbox"
                                value="<?php echo $data_t['P2_No'];?> " />
                        </td>
                        <td><?php echo $no;?></td>
                        <td><?php echo $data_t['P2_KodeKontainer']?></td>
                        <td><?php echo $data_t['P2_KodeBatch']?></td>
                        <td><?php echo $data_t['P2_NamaProduk']?></td>
                        <td><?php echo $data_t['P2_Kategori']?></td>
                        <td><?php echo $data_t['P2_QTY']?></td>
                        <td>
                            <a class="btn btn-outline-danger btn-sm text-center"
                                onclick="deletee(<?php echo $data_t['P2_No'];?> , '<?php echo $data_t['P2_KodeBatch']?>', '<?php echo strval($data_t['RQ1_KodeKontainer'])?>', <?php echo $data_t['P2_QTY']?>)">Delete</a>
                        </td>
                    </tr>
                    <?php } ?>
                    <tr>
                        <th class="text-center">↳
                        </th>
                        <th>
                            <input style="margin-top: 10px;" type="checkbox" id="checkAll">
                        </th>
                        <th>check all
                        </th>
                        <th>
                            <div id="select_count">
                        </th>
                        <th>
                        </th>
                        <th>
                        </th>
                        <th>
                        </th>
                        <th width="3%">
                            <a type="button" name="cekdel" id="cekdel" onclick="del_check();"
                                class="btn btn-danger btn-sm">Delete</a>
                        </th>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
</div>
<script>
$("#checkAll").click(function() {
    $('input:checkbox').not(this).prop('checked', this.checked);
});
</script>