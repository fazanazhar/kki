<?= $this->extend('basecore/basemain');?>
<?= $this->section('pageconten')?>
<link rel="stylesheet" href="<?= base_url();?>/assets/vendors/iconly/bold.css">
<div class="page-heading">
    <h3>DASHBOARD</h3>
</div>
<div class="page-content">
    <section class="row">
        <div class="col-12 col-md-12 col-lg-12">
            <div class="row">
                <div class="mx-auto row">
                    <div class="col-6 col-lg-2 col-md-6 mx-auto">
                        <div class="card col-12 col-lg-12 col-md-12">
                            <div class="card-body px-3 py-4-5">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="stats-icon blue">
                                            <i class="iconly-boldHome"></i>
                                        </div>
                                    </div>
                                    <div class="col-md-8">
                                        <h6 class="text-muted font-semibold"><a
                                                href="<?= base_url()?>/holding">Holding</a></h6>
                                        <h6 class="font-extrabold mb-0"><?= $holdingdata ?></h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-6 col-lg-2 col-md-6 mx-auto">
                        <div class="card col-12 col-lg-12 col-md-12">
                            <div class="card-body px-3 py-4-5">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="stats-icon orange">
                                            <i class="iconly-boldWork"></i>
                                        </div>
                                    </div>
                                    <div class="col-md-8">
                                        <h6 class="text-muted font-semibold"><a
                                                href="<?= base_url()?>/marketplace">MP</a></h6>
                                        <h6 class="font-extrabold mb-0"><?= $marketplacedata ?></h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-6 col-lg-2 col-md-6 mx-auto">
                        <div class="card col-12 col-lg-12 col-md-12">
                            <div class="card-body px-3 py-4-5">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="stats-icon red">
                                            <i class="iconly-boldDiscount"></i>
                                        </div>
                                    </div>
                                    <div class="col-md-8">
                                        <h6 class="text-muted font-semibold"><a href="<?= base_url()?>/discmp">Disc
                                                MP</a></h6>
                                        <h6 class="font-extrabold mb-0"><?= $discdata ?></h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-6 col-lg-2 col-md-6 mx-auto">
                        <div class="card col-12 col-lg-12 col-md-12">
                            <div class="card-body px-3 py-4-5">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="stats-icon yellow">
                                            <i class="iconly-boldAdd-User"></i>
                                        </div>
                                    </div>
                                    <div class="col-md-8">
                                        <h6 class="text-muted font-semibold"><a href="<?= base_url()?>/sunsan">Sun
                                                San</a></h6>
                                        <h6 class="font-extrabold mb-0"><?= $sunsandata ?></h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-6 col-lg-2 col-md-6 mx-auto">
                        <div class="card col-12 col-lg-12 col-md-12">
                            <div class="card-body px-3 py-4-5">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="stats-icon green">
                                            <i class="iconly-boldBookmark"></i>
                                        </div>
                                    </div>
                                    <div class="col-md-8">
                                        <h6 class="text-muted font-semibold"><a
                                                href="<?= base_url()?>/repair">Repair</a></h6>
                                        <h6 class="font-extrabold mb-0"><?= $repairdata?></h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-6 col-lg-2 col-md-6 mx-auto">
                        <div class="card col-12 col-lg-12 col-md-12">
                            <div class="card-body px-3 py-4-5">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="stats-icon grey">
                                            <i class="iconly-boldDelete"></i>
                                        </div>
                                    </div>
                                    <div class="col-md-8">
                                        <h6 class="text-muted font-semibold"><a
                                                href="<?= base_url()?>/destroy">Destroy</a></h6>
                                        <h6 class="font-extrabold mb-0"><?= $destroydata?></h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 col-lg-9">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Monitoring Product/Year</h4>
                        </div>
                        <div class="card-body">
                            <div id="chart-Month-visit"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12 col-xl-12">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title">Activity Production</h5>
                        </div>
                        <div class="card-body">
                            <ul class="nav nav-tabs" id="myTab" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <a class="nav-link active" id="Day-tab" data-bs-toggle="tab" href="#Day" role="tab"
                                        aria-controls="Day" aria-selected="true">Day</a>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <a class="nav-link" id="Month-tab" data-bs-toggle="tab" href="#Month" role="tab"
                                        aria-controls="Month" aria-selected="false">Month</a>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <a class="nav-link" id="Year-tab" data-bs-toggle="tab" href="#Year" role="tab"
                                        aria-controls="Year" aria-selected="false">Year</a>
                                </li>
                            </ul>
                            <div class="tab-content" id="myTabContent">
                                <div class="tab-pane fade show active" id="Day" role="tabpanel"
                                    aria-labelledby="Day-tab">
                                    <div class="table-responsive">
                                        <table class="table table-hover table-lg">
                                            <thead>
                                                <tr>
                                                    <th>No</th>
                                                    <th>Category</th>
                                                    <th>Qty</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php

                                                                        use phpDocumentor\Reflection\Types\Null_;

 $this->db = db_connect();
                                              $builderloop = $this->db->table("master_barang");
                                              $builderloop->select("*");
                                              $gets = $builderloop->get();
                                              $no=0;
                                              foreach ($gets->getResult() as $get) {
                                                  $builder0 = $this->db->table('`data_produksi`');
                                                  $builder0->select('*,SUM(`P_QTY`) as total');
                                                  $builder0->where('P_NamaProduk', "$get->mbr_produk");
                                                  $builder0->where('YEAR(P_Datetime)', 'YEAR(CURDATE())', FALSE);
                                                  $builder0->where('MONTH(`P_Datetime`)', 'MONTH(CURDATE())', FALSE);
                                                  $builder0->where('DAY(`P_Datetime`)', 'DAY(CURDATE())', FALSE);
                                                  $builder0->where('P_Status', "QC-Accepted"); 
                                                  $builder0->groupBy('DAY(`P_Datetime`)');
                                                  $query0 = $builder0->get();
                                                  foreach ($query0->getResult() as $row0) { $no++;?>
                                                <tr>
                                                    <td class="col-3">
                                                        <div class="d-flex align-items-center">
                                                            <div class="avatar avatar-md">
                                                                <!-- <img src="assets/images/faces/5.jpg"> -->
                                                            </div>
                                                            <p class="font-bold ms-3 mb-0"><?= $no;?></p>
                                                        </div>
                                                    </td>
                                                    <td class="col-auto">
                                                        <p class=" mb-0"><?= $row0->P_NamaProduk;?></p>
                                                    </td>
                                                    <td class="col-auto">
                                                        <p class=" mb-0"><?= $row0->total;?></p>
                                                    </td>
                                                </tr>
                                                <?php }};?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="Month" role="tabpanel" aria-labelledby="Month-tab">
                                    <div class="table-responsive">
                                        <table class="table table-hover table-lg">
                                            <thead>
                                                <tr>
                                                    <th>No</th>
                                                    <th>Category</th>
                                                    <th>Qty</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php $this->db = db_connect();
                                              $builderloop = $this->db->table("master_barang");
                                              $builderloop->select("*");
                                              $gets = $builderloop->get();
                                              $no=0;
                                              foreach ($gets->getResult() as $get) {
                                                  $builder1 = $this->db->table('`data_produksi`');
                                                  $builder1->select('*,SUM(`P_QTY`) as total');
                                                  $builder1->where('P_NamaProduk', "$get->mbr_produk");
                                                  $builder1->where('YEAR(P_Datetime)', 'YEAR(CURDATE())', FALSE);
                                                  $builder1->where('MONTH(`P_Datetime`)', 'MONTH(CURDATE())', FALSE);
                                                  $builder1->where('P_Status', "QC-Accepted"); 
                                                  $builder1->groupBy('MONTH(`P_Datetime`)');
                                                  $query1 = $builder1->get();
                                                  foreach ($query1->getResult() as $row) {;?>
                                                <tr>
                                                    <td class="col-3">
                                                        <div class="d-flex align-items-center">
                                                            <div class="avatar avatar-md">
                                                                <!-- <img src="assets/images/faces/5.jpg"> -->
                                                            </div>
                                                            <p class="font-bold ms-3 mb-0"><?php echo ++$no;?></p>
                                                        </div>
                                                    </td>
                                                    <td class="col-auto">
                                                        <p class=" mb-0"><?= $row->P_NamaProduk;?></p>
                                                    </td>
                                                    <td class="col-auto">
                                                        <p class=" mb-0"><?= $row->total;?></p>
                                                    </td>
                                                </tr>
                                                <?php }};?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="Year" role="tabpanel" aria-labelledby="Year-tab">
                                    <div class="table-responsive">
                                        <table class="table table-hover table-lg">
                                            <thead>
                                                <tr>
                                                    <th>No</th>
                                                    <th>Category</th>
                                                    <th>Qty</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php $this->db = db_connect();
                                              $builderloop = $this->db->table("master_barang");
                                              $builderloop->select("*");
                                              $gets = $builderloop->get();
                                              $no=0;
                                              foreach ($gets->getResult() as $get) {
                                                  $builder2 = $this->db->table('`data_produksi`');
                                                  $builder2->select('*,SUM(`P_QTY`) as total');
                                                  $builder2->where('P_NamaProduk', "$get->mbr_produk");
                                                  $builder2->where('YEAR(P_Datetime)', 'YEAR(CURDATE())', FALSE);
                                                  $builder2->where('P_Status', "QC-Accepted"); 
                                                  $builder2->groupBy('YEAR(`P_Datetime`)');
                                                  $query2 = $builder2->get();
                                                  foreach ($query2->getResult() as $row2) { $no++?>
                                                <tr>
                                                    <td class="col-3">
                                                        <div class="d-flex align-items-center">
                                                            <div class="avatar avatar-md">
                                                                <!-- <img src="assets/images/faces/5.jpg"> -->
                                                            </div>
                                                            <p class="font-bold ms-3 mb-0"><?= $no;?></p>
                                                        </div>
                                                    </td>
                                                    <td class="col-auto">
                                                        <p class=" mb-0"><?= $row2->P_NamaProduk;?></p>
                                                    </td>
                                                    <td class="col-auto">
                                                        <p class=" mb-0"><?= $row2->total;?></p>
                                                    </td>
                                                </tr>
                                                <?php }};?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 col-lg-3">
            <div class="card">
                <div class="card-header">
                    <h4>Packing</h4>
                </div>
                <div class="card-content pb-4">
                    <div class="recent-message d-flex px-4 py-3">
                        <div class="avatar avatar-lg">
                            <div class="stats-icon purple">
                                <i class="iconly-boldTicket"></i>
                            </div>
                            <!-- <img src="assets/images/faces/4.jpg"> -->
                        </div>
                        <div class="name ms-4">
                            <h5 class="mb-1"><a href="<?= base_url()?>/dataop">On Progress</a></h5>
                            <h6 class="font-extrabold mb-0"><?= $onprogressdata ?></h6>
                        </div>
                    </div>
                    <div class="recent-message d-flex px-4 py-3">
                        <div class="avatar avatar-lg">
                            <div class="stats-icon black">
                                <i class="iconly-boldTick-Square"></i>
                            </div>
                            <!-- <img src="assets/images/faces/5.jpg"> -->
                        </div>
                        <div class="name ms-4">
                            <h5 class="mb-1"><a href="<?= base_url()?>/datartg">Ready to Go</a></h5>
                            <h6 class="font-extrabold mb-0"><?= $shippingdata ?></h6>
                        </div>
                    </div>
                    <!-- <div class="px-4">
                        <button class='btn btn-block btn-xl btn-light-primary font-bold mt-3'> View Details</button>
                    </div> -->
                </div>
            </div>
            <div class="card">
                <div class="card-header">
                    <h4>Sale/Month</h4>
                </div>
                <div class="card-body">
                    <!-- <div id="chart-visitors-Month"></div> -->
                </div>
            </div>

            <div class="card">
                <div class="card-header">
                    <h5 class="card-title" type="button"
                        onclick=" window.open('<?= base_url()?>/shippingall','_blank')">Sale Activity</h5>
                </div>
                <div class="card-body">
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <a class="nav-link active" id="Years-tab" data-bs-toggle="tab" href="#Years" role="tab"
                                aria-controls="Years" aria-selected="false">Year</a>
                        </li>
                        <li class="nav-item" role="presentation">
                            <a class="nav-link" id="Months-tab" data-bs-toggle="tab" href="#Months" role="tab"
                                aria-controls="Months" aria-selected="false">Month</a>
                        </li>
                    </ul>
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="Years" role="tabpanel" aria-labelledby="Years-tab">
                            <div id="chart_saleyear"></div>
                        </div>
                        <div class="tab-pane fade" id="Months" role="tabpanel" aria-labelledby="Months-tab">
                            <div id="chart-visitors-Month"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<script src="<?= base_url();?>/assets/vendors/apexcharts/apexcharts.js"></script>
<!-- <script src="<?= base_url();?>/assets/js/pages/dashboard.js"></script> -->
<script>
var optionsMonthVisit = {
    annotations: {
        position: 'back'
    },
    dataLabels: {
        enabled: false,
    },

    chart: {
        type: 'bar',
        height: 300
    },
    fill: {
        opacity: 1
    },
    plotOptions: {
        bar: {
            endingShape: "rounded"
        }
    },
    series: [
        <?php foreach($produk_all as $produk ){?> {
            name: '<?= $produk['mbr_produk'];?>',
            color: '<?= $produk['basecolor'];?>',
            data: [<?= $produk['D1'];?>, <?= $produk['D2'];?>, <?= $produk['D3'];?>, <?= $produk['D4'];?>,
                <?= $produk['D5'];?>, <?= $produk['D6'];?>, <?= $produk['D7'];?>, <?= $produk['D8'];?>,
                <?= $produk['D9'];?>, <?= $produk['D10'];?>, <?= $produk['D11'];?>, <?= $produk['D12'];?>,
            ],
        },
        <?php };?>
    ],
    xaxis: {
        categories: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
    },
}
let optionsVisitorsMonth = {

    series: [
        <?php 
$this->db = db_connect();
$builderloop1 = $this->db->table("master_barang");
$builderloop1->select("*");
$gets1 = $builderloop1->get();
foreach ($gets1->getResult() as $get1) {
$this->db = db_connect();

    $buildera = $this->db->table("(SELECT `FSHP_NamaProduk`, SUM(FSHP_QTY) as cnt FROM final_detail_shippingbox
	WHERE `FSHP_NamaProduk`='$get1->mbr_produk' AND YEAR(FSHP_Datetime) = YEAR(CURDATE()) AND MONTH(`FSHP_Datetime`) = MONTH(CURDATE())
	GROUP BY MONTH(`FSHP_Datetime`)
  UNION
  	SELECT `SHP_NamaProduk`, SUM(SHP_QTY) FROM final_shipping
    WHERE `SHP_NamaProduk`='$get1->mbr_produk' AND YEAR(SHP_Datetime) = YEAR(CURDATE()) AND MONTH(`SHP_Datetime`) = MONTH(CURDATE())
	GROUP BY MONTH(`SHP_Datetime`)) tmp");
$buildera->select('`FSHP_NamaProduk`,sum(cnt) as total');
$querya=$buildera->get(); ?><?php foreach($querya->getResult() as $produka ){?> '<?php $cek =$produka->total; if ($cek != '' || $cek != Null){ echo $produka->total;}?>',
        <?php }};?>
    ],
    labels: [
        <?php 
$this->db = db_connect();
$builderloop1 = $this->db->table("master_barang");
$builderloop1->select("*");
$gets1 = $builderloop1->get();
foreach ($gets1->getResult() as $get1) {
$this->db = db_connect();

    $buildera = $this->db->table("(SELECT `FSHP_NamaProduk`, SUM(FSHP_QTY) as cnt FROM final_detail_shippingbox
	WHERE `FSHP_NamaProduk`='$get1->mbr_produk' AND YEAR(FSHP_Datetime) = YEAR(CURDATE()) AND MONTH(`FSHP_Datetime`) = MONTH(CURDATE())
	GROUP BY MONTH(`FSHP_Datetime`)
  UNION
  	SELECT `SHP_NamaProduk`, SUM(SHP_QTY) FROM final_shipping
    WHERE `SHP_NamaProduk`='$get1->mbr_produk' AND YEAR(SHP_Datetime) = YEAR(CURDATE()) AND MONTH(`SHP_Datetime`) = MONTH(CURDATE())
	GROUP BY MONTH(`SHP_Datetime`)) tmp");
$buildera->select('`FSHP_NamaProduk`,sum(cnt) as total');
$querya=$buildera->get(); ?><?php foreach($querya->getResult() as $produka ){?> '<?php $cek =$produka->FSHP_NamaProduk; if ($cek != ''){ echo $produka->FSHP_NamaProduk;}?>',
        <?php  }};?>
    ],
    colors: [<?php foreach($produk_all as $produk ){?> '<?= $produk['basecolor'];?>', <?php };?>],
    chart: {
        type: 'donut',
        width: '100%',
        height: '350px'
    },
    dataLabels: {
        enabled: false,
    },
    legend: {
        position: 'bottom'
    },
    plotOptions: {
        pie: {
            donut: {
                size: '30%'
            }
        }
    }
}
let saleyear = {

    series: [<?php 
$this->db = db_connect();
$builderloop1 = $this->db->table("master_barang");
$builderloop1->select("*");
$gets1 = $builderloop1->get();
foreach ($gets1->getResult() as $get1) {
$this->db = db_connect();

    $buildera = $this->db->table("(SELECT `FSHP_NamaProduk`, SUM(FSHP_QTY) as cnt FROM final_detail_shippingbox
	WHERE `FSHP_NamaProduk`='$get1->mbr_produk' AND YEAR(FSHP_Datetime) = YEAR(CURDATE())
	GROUP BY MONTH(`FSHP_Datetime`)
  UNION
  	SELECT `SHP_NamaProduk`, SUM(SHP_QTY) FROM final_shipping
    WHERE `SHP_NamaProduk`='$get1->mbr_produk' AND YEAR(SHP_Datetime) = YEAR(CURDATE())
	GROUP BY MONTH(`SHP_Datetime`)) tmp");
$buildera->select('`FSHP_NamaProduk`,sum(cnt) as total');
$querya=$buildera->get(); ?><?php foreach($querya->getResult() as $produka ){?> '<?= $produka->total;?>',
        <?php }};?>
    ],
    labels: [<?php 
$this->db = db_connect();
$builderloop1 = $this->db->table("master_barang");
$builderloop1->select("*");
$gets1 = $builderloop1->get();
foreach ($gets1->getResult() as $get1) {
$this->db = db_connect();

    $buildera = $this->db->table("(SELECT `FSHP_NamaProduk`, SUM(FSHP_QTY) as cnt FROM final_detail_shippingbox
	WHERE `FSHP_NamaProduk`='$get1->mbr_produk' AND YEAR(FSHP_Datetime) = YEAR(CURDATE()) AND MONTH(`FSHP_Datetime`) = MONTH(CURDATE())
	GROUP BY MONTH(`FSHP_Datetime`)
  UNION
  	SELECT `SHP_NamaProduk`, SUM(SHP_QTY) FROM final_shipping
    WHERE `SHP_NamaProduk`='$get1->mbr_produk' AND YEAR(SHP_Datetime) = YEAR(CURDATE()) AND MONTH(`SHP_Datetime`) = MONTH(CURDATE())
	GROUP BY MONTH(`SHP_Datetime`)) tmp");
$buildera->select('`FSHP_NamaProduk`,sum(cnt) as total');
$querya=$buildera->get(); ?><?php foreach($querya->getResult() as $produka ){?> '<?= $produka->FSHP_NamaProduk;?>',
        <?php  }};?>
    ],
    colors: [<?php foreach($produk_all as $produk ){?> '<?= $produk['basecolor'];?>', <?php };?>],
    chart: {
        type: 'donut',
        width: '100%',
        height: '350px'
    },
    dataLabels: {
        enabled: false,
    },
    legend: {
        position: 'bottom'
    },
    plotOptions: {
        pie: {
            donut: {
                size: '30%'
            }
        }
    }
}




var chartMonthVisit = new ApexCharts(document.querySelector("#chart-Month-visit"), optionsMonthVisit);
var chartVisitorsMonth = new ApexCharts(document.getElementById('chart-visitors-Month'), optionsVisitorsMonth);
var chartsaleyear = new ApexCharts(document.getElementById('chart_saleyear'), saleyear);


chartMonthVisit.render();
chartVisitorsMonth.render();
chartsaleyear.render();
</script>
<?= $this->endSection();?>