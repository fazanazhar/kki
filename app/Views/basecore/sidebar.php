<div id="sidebar" class="">
    <div class="sidebar-wrapper active">
        <div class="sidebar-header">
            <div class="d-flex justify-content-between">
                <div class="logo" style="width: 250px; height: 30px;">
                    <a style="margin-right: 10px" href="<?= base_url();?>/"><img
                            src="<?= base_url();?>/assets/images/logo/logo.png" alt="Logo" srcset=""
                            style="width: 80px; height: 40px;"></a>
                    <a><img src="<?= base_url();?>/assets/images/logo/startup.png"
                            style="width: 130px; height: 40px;"></a>
                </div>
                <div class="toggler">
                    <a href="#" class="sidebar-hide d-xl-none d-block"><i class="bi bi-x bi-middle"></i></a>
                </div>
            </div>
        </div>
        <div class="sidebar-menu">
            <ul class="menu">
                <li class="sidebar-title">Menu</li>

                <li class="sidebar-item active">
                    <a href="<?= base_url();?>/" <?= uri_string() == 'Dashboard' ? 'active':'' ?> class='sidebar-link'>
                        <i class="bi bi-grid-fill"></i>
                        <span>Dashboard</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a href="<?= base_url();?>/barcode" class='sidebar-link'>
                        <i class="bi bi-grid-fill"></i>
                        <span>Generate Barcode</span>
                    </a>
                </li>
                <?php if (in_groups('administrator')):?>
                <li class="sidebar-item  has-sub">
                    <a href="#" class='sidebar-link'>
                        <i class="iconly-boldLock"></i>
                        <span>Master Data</span>
                    </a>
                    <ul class="submenu ">
                        <li class="submenu-item ">
                            <a href="<?= base_url();?>/masterdata">Product</a>
                        </li>
                        <li class="submenu-item ">
                            <a href="<?= base_url();?>/masterdatapelanggan">Customer</a>
                        </li>
                        <li class="submenu-item ">
                            <a href="<?= base_url();?>/masterdatasup">Supplier</a>
                        </li>
                        <li class="submenu-item ">
                            <a href="<?= base_url();?>/masterdatabox">Box</a>
                        </li>
                        <li class="submenu-item ">
                            <a href="<?= base_url();?>/masterdatakontainer">Container</a>
                        </li>
                        <li class="submenu-item ">
                            <a href="<?= base_url();?>/masterdataexp">Expedition</a>
                        </li>
                    </ul>
                </li>
                <?php endif;?>
                <?php if (in_groups('production','administrator')):?>
                <li class="sidebar-item  has-sub">
                    <a href="#" class='sidebar-link'>
                        <i class="iconly-boldUpload"></i>
                        <span>Production</span>
                    </a>
                    <ul class="submenu ">
                        <li class="submenu-item ">
                            <a href="<?= base_url();?>/pd">Product</a>
                        </li>
                        <li class="submenu-item ">
                            <a href="<?= base_url();?>/qc_repair_produksi">Repair</a>
                        </li>
                    </ul>
                </li>
                <?php endif;?>
                <?php if (in_groups('qc','administrator')):?>
                <li class="sidebar-item  has-sub">
                    <a href="#" class='sidebar-link'>
                        <i class="iconly-boldSearch"></i>
                        <span>Quality Control</span>
                    </a>
                    <ul class="submenu ">
                        <li class="submenu-item ">
                            <a href="<?= base_url();?>/validasi">Validation</a>
                        </li>
                        <li class="submenu-item ">
                            <a href="<?= base_url();?>/qc_produk_v">Product</a>
                        </li>
                        <li class="submenu-item ">
                            <a href="<?= base_url();?>/qc_holding">Holding</a>
                        </li>
                        <li class="submenu-item ">
                            <a href="<?= base_url();?>/Final_Inspection">Final Inspection</a>
                        </li>
                        <li class="submenu-item ">
                            <a href="<?= base_url();?>/qc_repair_v">Repair</a>
                        </li>
                    </ul>
                </li>
                <?php endif;?>
                <?php if (in_groups('warehouse','administrator')):?>
                <li class="sidebar-item has-sub">
                    <a href="#" class='sidebar-link'>
                        <i class="iconly-boldTick-Square"></i>
                        <span>Warehouse</span>
                    </a>
                    <ul class="submenu ">
                        <li class="submenu-item ">
                            <a href="<?= base_url();?>/packing_holding">Holding</a>
                        </li>
                        <li class="submenu-item ">
                            <a href="<?= base_url();?>/packing">Packing</a>
                        </li>
                        <li class="submenu-item ">
                            <a href="<?= base_url();?>/rtg">Ready To Go</a>
                        </li>
                    </ul>
                </li>
                <?php endif;?>
                <li class="sidebar-item has-sub">
                    <a href="#" class='sidebar-link'>
                        <i class="bi bi-stack"></i>
                        <span>Data List</span>
                    </a>
                    <ul class="submenu ">
                        <li class="submenu-item ">
                            <a href="<?= base_url();?>/data_pd">Production</a>
                        </li>
                        <li class="submenu-item ">
                            <a href="<?= base_url();?>/data_pd_repair">Production Repair</a>
                        </li>
                        <li class="submenu-item ">
                            <a href="<?= base_url();?>/holding">Holding</a>
                        </li>
                        <li class="submenu-item ">
                            <a href="<?= base_url();?>/reject_holding">Reject Holding</a>
                        </li>
                        <li class="submenu-item ">
                            <a href="<?= base_url();?>/marketplace">Marketplace</a>
                        </li>
                        <li class="submenu-item ">
                            <a href="<?= base_url();?>/discmp">DiscMP</a>
                        </li>
                        <li class="submenu-item ">
                            <a href="<?= base_url();?>/sunsan">Sunsan</a>
                        </li>
                        <li class="submenu-item ">
                            <a href="<?= base_url();?>/repair">Repair</a>
                        </li>
                        <li class="submenu-item ">
                            <a href="<?= base_url();?>/retain">Retain</a>
                        </li>
                        <li class="submenu-item ">
                            <a href="<?= base_url();?>/destroy">Destroy</a>
                        </li>
                        <li class="submenu-item ">
                            <a href="<?= base_url();?>/release">Release</a>
                        </li>
                        <li class="submenu-item ">
                            <a href="<?= base_url();?>/data_packing">Packing Box</a>
                        </li>
                        <li class="submenu-item ">
                            <a href="<?= base_url();?>/shippingitem">Shipping Item</a>
                        </li>
                        <li class="submenu-item ">
                            <a href="<?= base_url();?>/shippingbox">Shipping Box</a>
                        </li>
                        <li class="submenu-item ">
                            <a href="<?= base_url();?>/shippingall">Shipping All</a>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
        <button class="sidebar-toggler btn x"><i data-feather="x"></i></button>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<script>

</script>