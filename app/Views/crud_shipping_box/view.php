<?= $this->extend('basecore/basemain');?>
<?= $this->section('pageconten')?>
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
<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>READY TO GO</h3>
                <p class="text-subtitle text-muted">Shipping Box</p>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?= base_url()?>/">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Shipping Box List
                        </li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <section class="section">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Shipping Box List</h4>
            </div>
            <div class="card-body">
                <div class="container my-4"
                    style="border: 1px solid; border-color: #435ebe; border-radius: 25px;  padding-bottom: 25px; padding-left: 50px; padding-right: 50px; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);">
                    <p>
                    <h1 style="text-align:center">SHIPPING BOX</h1>
                    </p>
                    <div class="d-flex justify-content-end my-2">
                    </div>
                    <?php
                    if(isset($_SESSION['msg'])){
                        echo $_SESSION['msg'];
                    }
                    ?>

                    <form method="post" id="aa" action="" target="_blank">
                        <table class="table my-2" id="master_list">
                            <thead>
                                <tr>
                                    <th style="width: 5%">No</th>
                                    <th style="width: 15%">Date</th>
                                    <th style="width: 15%">Box Code</th>
                                    <th style="width: 5%">QTY</th>
                                    <th>Customer</th>
                                    <th>Expedition</th>
                                    <th>PIC</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $key = 0?>
                                <?php if($shippingboxdatas): ?>
                                <?php foreach($shippingboxdatas as $shipping): ?>
                                <tr>
                                    <td><?= ++$key ?></td>
                                    <td><?php echo date('d-m-Y, H:i:s',strtotime($shipping['SHP_Datetime'])); ?></td>
                                    <td><?php echo $shipping['SHP_KodeDus']; ?></td>
                                    <td><?php echo $shipping['SHP_QTY']; ?></td>
                                    <td><?php echo $shipping['SHP_Customer']; ?></td>
                                    <td><?php echo $shipping['SHP_Expedition']; ?></td>
                                    <td><?php echo $shipping['SHP_PIC']; ?></td>
                                    <td>
                                        <!-- <a href="#" class="btn btn-outline-primary">Detail</a> -->
                                        <button type="button" class="btn btn-outline-primary" id="test"
                                            onclick="copy(),add()" name="<?php echo $shipping['SHP_KodeDus']; ?>"
                                            data-bs-toggle="modal" data-bs-target="#editmodal">Detail</button>

                                        <!-- <button class="btn btn-primary" name="{{_id}}" id="addme">add me</button> -->

                                    </td>
                                </tr>
                                <?php endforeach; ?>
                                <?php endif; ?>
                            </tbody>
                        </table>

                        <input type="text" class="form-control text-center" id="SHP_KodeDus" name="SHP_KodeDus"
                            placeholder="Box Code" hidden required>
                    </form>
                </div>
            </div>
        </div>
    </section>
</div>

<!-- Modal Edit-->
<div class="modal fade" id="editmodal" tabindex="-1" aria-labelledby="edit_modal" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="edit_modal">DETAIL DATA BOX</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="container">
                    <table class="table" id="detail_list"></table>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
            </form>
        </div>
        <!-- Akhir Modal Edit-->

    </div>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
    <script type="text/javascript" src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <script>
    $(document).ready(function() {
        $('#master_list').DataTable({
            scrollX: 100000,
            paging: true,
        });
    });

    function copy() {
        var buttonName = event.target.name;
        // var kodebox_copy = document.getElementById("test").value;
        console.log(buttonName);
        document.getElementById("SHP_KodeDus").value = buttonName;
    }

    window.onload = function() {
        reload_table();
    }

    function reload_table() {
        $.ajax({
            url: "<?php echo site_url('detail_boxfinal')?>",
            beforSend: function(f) {
                $('#detail_list').html('Load Data.')
            },
            success: function(data) {
                $('#detail_list').html(data)
            }
        });
        // var a= $('#wms').html(data);
        // console.log(a);
    }

    function add() {
        var url;
        $.ajax({
            url: "<?php echo site_url('detail_boxfinal')?>",
            type: "POST",
            data: $('#aa').serialize(),
            success: function(data) {
                $('#detail_list').html(data)
            },
            error: function() {
                alert("There was an error submitting comment");
            }
        });
    }
    </script>
    <?= $this->endSection();?>