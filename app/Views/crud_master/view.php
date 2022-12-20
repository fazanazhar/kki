<?= $this->extend('basecore/basemain');?>
<?= $this->section('pageconten')?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jscolor/2.0.4/jscolor.js"></script>
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



canvas.cus {

    margin: 1px 0px;
    border-radius: 13px;
    border: none;
}

#card {
    background: rgba(224, 229, 227, 1);
    margin-top: 16px;
    margin-left: auto;
    margin-right: auto;
    border: none;
    padding: 10px;
    border-radius: 13px;
    text-align: center;
    width: 254px;
    box-shadow: -2px -2px 8px 5px rgba(255, 255, 255, 0.95), 2px 2px 10px -1px rgba(0, 0, 0, 0.56), inset 11px 9px 14px -4px rgba(255, 255, 255, 0.38);
}

#card img.cus {
    border-radius: 3px;
}

#copy {
    padding: 5px;
    border-radius: 13px;
    border: none;
    width: 69px;
    outline: none;
    cursor: pointer;
    background-color: var(--colorMain);
    box-shadow: inset 20px 28px 50px -30px rgba(255, 255, 255, 0.87), 6px 6px 25px -2px rgba(56, 56, 56, 0.41), -2px -2px 4px 2px rgba(255, 255, 255, 0.95);
    transition: 100ms;
}

#copy:active {
    box-shadow: inset 20px 28px 50px -30px rgba(5, 5, 5, 0.1), 6px 6px 25px -2px rgba(56, 56, 56, 0.41), -2px -2px 4px 2px rgba(255, 255, 255, 0.95);
}

#text {
    background-color: var(--colorMain);
    border-radius: 13px;
    border: none;
    outline: none;
    padding: 5px;
}

#text::selection {

    background: transparent;
}

button.cus {
    padding: 4.5px;
    display: block;
    border-radius: 13px;
    border: none;
    width: 275px;
    margin-top: 3px;
    height: 40px;
    background-color: rgb(38, 0, 199);
    margin-left: auto;
    margin-right: auto;
    background-color: var(--colorMain);
}

#pop {
    background-color: red;
    width: 200px;
    background-color: var(--colorMain);
    color: white;
    margin-left: calc(50% - 100px);
    text-align: center;
    border-radius: 13px;
    margin-top: 26px;
    padding: 10px;
    box-shadow: inset 20px 28px 50px -30px rgba(255, 255, 255, 0.87), 6px 6px 25px -2px rgba(56, 56, 56, 0.41), -8px -9px 15px 1px rgba(255, 255, 255, 1);
}

.pop {
    transform: translateY(20px);
    opacity: 0;
}

.active {
    transition: 500ms;
    transform: translateY(0px);
    opacity: 100%;
}

#content {
    margin-top: 20px;
}

#dfj {
    box-shadow: 5px 5px 5px -2px;
}

#cur {
    pointer-events: none;
    width: 20px;
    position: absolute;
    margin: auto;
    display: block;
    left: 385px;
    top: 100px;

}

canvas:hover+#cur {
    display: block;
    user-select: none;
}
</style>
<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Master Data Product</h3>
                <p class="text-subtitle text-muted">Master Data Product.</p>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?= base_url()?>/">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Master Data Product
                        </li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <section class="section">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Master Data Product List</h4>
            </div>
            <div class="card-body" style="max-width: 100%;">
                <div class="container my-4 "
                    style="border: 1px solid; border-color: #435ebe; border-radius: 25px;  padding-bottom: 25px; padding-left: 50px; padding-right: 50px; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);">
                    <h1 class="my-4" style="text-align:center">MASTER DATA PRODUCT</h1>
                    <div class="d-flex justify-content-end my-2">
                        <button type="button" class="btn btn-success btn-sm my-1" data-bs-toggle="modal"
                            data-bs-target=".bd-example-modal-xl">
                            Add Data Product
                        </button>
                    </div>
                    <table class="table my-2" style="width: auto;" id="master_list">
                        <thead>
                            <tr>
                                <th class="text-center">No</th>
                                <th class="text-center">Product Code</th>
                                <th class="text-center">Product Name</th>
                                <th class="text-center">Description</th>
                                <th class="text-center">Base Color</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $key = 0?>
                            <?php if($masterdatas): ?>
                            <?php foreach($masterdatas as $master): ?>
                            <tr>
                                <td><?= ++$key ?></td>
                                <td><?php echo $master['mbr_kode']; ?></td>
                                <td><?php echo $master['mbr_produk']; ?></td>
                                <td><?php echo $master['mbr_nama']; ?></td>
                                <td><input disabled class="text-center text-white mx-auto" type="text"
                                        style=" border-radius: 13px;  border: none; outline: none; background-color:<?php echo $master['basecolor']; ?>;"
                                        value=" <?php echo $master['basecolor']; ?>">
                                </td>
                                <td>
                                    <button type="button" class="btn btn-outline-primary" data-bs-toggle="modal"
                                        data-bs-target="#editmodal<?php echo $master['mbr_id']; ?>">Edit</button>
                                    <a onclick="location.href='<?php echo base_url('/delete/deletemasterproduk.php?mbr_id='.$master['mbr_id']);?>'"
                                        class="btn btn-outline-danger">Delete</a>
                            </tr>
                            <?php endforeach; ?>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
    <!-- Modal Add-->
    <div class="modal fade bd-example-modal-xl" id="adddata" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <form method="post" id="add_create" name="add_create" action="<?= site_url('/submit-form') ?>">
            <div class="modal-dialog modal-xl">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">ADD DATA PRODUCT</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="container">
                            <div class="row">
                                <div class="col-2"></div>
                                <div class="col-4" style="margin-top: 10px;">
                                    <div class="form-group">
                                        <label style="color:#435ebe;">Product Code</label>
                                        <input type="text" name="mbr_kode" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label style="color:#435ebe;">Product Name</label>
                                        <input type="text" name="mbr_produk" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label style="color:#435ebe;">Description</label>
                                        <input type="text" name="mbr_nama" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <div id="content">
                                            <label style="color:#435ebe;">Base Color : </label><br /><br />
                                            <input class="text-center text-white" type="text" name="warna" id="text"
                                                value="rgb(208,0,44)">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="form-group">
                                        <div id="card">
                                            <div id="fgh">
                                                <canvas calss="cus" id="colorCanvas" class="color-canvas" width="250"
                                                    height="250"></canvas>
                                            </div>
                                        </div>
                                        <style id="vars">
                                        :root {
                                            --colorMain: rgb(200, 0, 55);
                                        }
                                        </style>
                                        <div id="pop" class="pop ">copied</div>


                                    </div>
                                </div>
                                <div calss="col-2"></div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
    <!-- Akhir Modal Add-->

    <!-- Modal Edit-->
    <?php $key = 0?>
    <?php if($masterdatas): ?>
    <?php foreach($masterdatas as $master): ?>
    <div class="modal fade" id="editmodal<?php echo $master['mbr_id']; ?>" tabindex="-1" aria-labelledby="edit_modal"
        aria-hidden="true">
        <form method="post" id="edit_modal" name="edit_modal" action="<?= site_url('/masterupdate') ?>">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="edit_modal">EDIT DATA PRODUCT</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="container">
                            <div class="row">
                                <div class="col-2"></div>
                                <div class="col-8">
                                    <input type="hidden" name="mbr_id" id="mbr_id"
                                        value="<?php echo $master['mbr_id']; ?>">
                                    <div class="form-group">
                                        <label>Product Code</label>
                                        <input type="text" name="mbr_kode" class="form-control"
                                            value="<?php echo $master['mbr_kode']; ?>">
                                    </div>
                                    <div class="form-group">
                                        <label>Product Name</label>
                                        <input type="text" name="mbr_produk" class="form-control"
                                            value="<?php echo $master['mbr_produk']; ?>">
                                    </div>
                                    <div class="form-group">
                                        <label>Description</label>
                                        <input type="text" name="mbr_nama" class="form-control"
                                            value="<?php echo $master['mbr_nama']; ?>">
                                    </div>
                                    <div class="form-group">
                                        <label>Description</label><br /><br />
                                        <input oninput="warna_auto();" class="text-center mx-auto" type="text"
                                            id="warnaa" name="warnabaru"
                                            style=" border-radius: 13px; border: none; outline: none; background-color:<?php echo $master['basecolor']; ?>;"
                                            value=" <?php echo $master['basecolor']; ?>">
                                        <script>
                                        function warna_auto() {
                                            var warnabaru = document.getElementById("warnaa").value;
                                            console.log(warnabaru);
                                            document.getElementById("warnaa").setAttribute("style",
                                                'background-color: ' +
                                                warnabaru + ';');
                                        }
                                        </script>
                                    </div>
                                </div>
                                <div calss="col-2"></div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
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

var canvasEl = document.getElementById("colorCanvas")
var canvasContext = canvasEl.getContext('2d');


function initColorPicker() {

    canvasContext.clearRect(0, 0, canvasEl.width, canvasEl.height);
    image = new Image(250, 250);
    image.onload = () => canvasContext.drawImage(image, 0, 0, image.width, image.height);
    image.src =
        "data:image/jpeg;base64,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"
}
canvasEl.onmousedown = function(mouseEvent) {

    var imgData = canvasContext.getImageData(mouseEvent.offsetX, mouseEvent.offsetY, 1, 1);
    var rgba = imgData.data;
    let color = "rgb(" + rgba[0] + "," + rgba[1] + "," + rgba[2] + ")"
    inner(color)
}

function print(msg) {
    console.log(msg)
}
initColorPicker()

function inner(color) {
    document.getElementById("text").value = color
    document.getElementById("text").style.backgroundColor = color
    document.getElementById('vars').innerHTML = ` :root{
      --colorMain:${color};
   }`
}
</script>
<?= $this->endSection();?>