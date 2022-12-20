<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (is_file(SYSTEMPATH . 'Config/Routes.php')) {
    require SYSTEMPATH . 'Config/Routes.php';
}

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
// The Auto Routing (Legacy) is very dangerous. It is easy to create vulnerable apps
// where controller filters or CSRF protection are bypassed.
// If you don't want to define all routes, please use the Auto Routing (Improved).
// Set `$autoRoutesImproved` to true in `app/Config/Feature.php` and set the following to true.
//$routes->setAutoRoute(false);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'dashboard::index');
$routes->get('my_profile', 'profile::index');
$routes->get('dataop', 'dashboard::praop');

$routes->get('datartg', 'dashboard::prartg');
$routes->get('project', 'project::index');
$routes->get('project/(:any)', 'project::viewproject/$1');
$routes->add('project', 'project::create');

$routes->get('masterdata', 'crud_master::index',['filter' => 'role:administrator']);
$routes->get('masterdataform', 'crud_master::create',['filter' => 'role:administrator']);
$routes->post('submit-form', 'crud_master::store',['filter' => 'role:administrator']);
$routes->get('masterdelete/(:num)', 'crud_master::masterdelete/$1',['filter' => 'role:administrator']);
$routes->post('masterupdate', 'crud_master::update',['filter' => 'role:administrator']);

$routes->get('masterdatapelanggan', 'crud_masterpelanggan::index',['filter' => 'role:administrator']);
$routes->get('masterdatapelangganadd', 'crud_masterpelanggan::create',['filter' => 'role:administrator']);
$routes->post('masterdatapelanggansubmit-form', 'crud_masterpelanggan::store',['filter' => 'role:administrator']);
$routes->post('masterupdatepelanggan', 'crud_masterpelanggan::update',['filter' => 'role:administrator']);

$routes->post('closenotif', 'qualitycontrol::updatestatus',['filter' => 'role:administrator,qc']);
$routes->post('closenotifnapp', 'qualitycontrol::updatestatusnapp',['filter' => 'role:administrator,qc']);
$routes->get('validasi', 'qualitycontrol::validasi'   ,['filter' => 'role:administrator,qc']);
$routes->get('qc_produk', 'qualitycontrol::praqc'   ,['filter' => 'role:administrator,qc']);
$routes->get('qc_produk_v', 'qualitycontrol::index' ,['filter' => 'role:administrator,qc']);
$routes->post('qc_produk_update', 'qualitycontrol::matchingupdate'  ,['filter' => 'role:administrator,qc']);
$routes->post('qc_produk_c', 'qualitycontrol::acc'  ,['filter' => 'role:administrator,qc']);
$routes->get('qc_produk_c', 'qualitycontrol::acc'  ,['filter' => 'role:administrator,qc']);
$routes->get('qc_produk_r', 'qualitycontrol::report',['filter' => 'role:administrator,qc']);
$routes->get('data', 'qualitycontrol::table_data'   ,['filter' => 'role:administrator,qc']);
$routes->post('add', 'qualitycontrol::min'          ,['filter' => 'role:administrator,qc']);
$routes->post('del', 'qualitycontrol::delete'       ,['filter' => 'role:administrator,qc']);
$routes->post('delcek', 'qualitycontrol::delete_cek',['filter' => 'role:administrator,qc']);
$routes->get('pindah', 'qualitycontrol::store'      ,['filter' => 'role:administrator,qc']);
// $routes->post('pindah', 'qualitycontrol::store'      ,['filter' => 'role:administrator,qc']);

$routes->get('packing', 'Packing::index'             ,['filter' => 'role:administrator,warehouse']);
$routes->get('data_tempacking', 'Packing::table_data',['filter' => 'role:administrator,warehouse']);
$routes->get('pindahpacking', 'Packing::store'       ,['filter' => 'role:administrator,warehouse']);
$routes->post('pindahpacking', 'Packing::store'      ,['filter' => 'role:administrator,warehouse']);
$routes->post('add_packing', 'Packing::min'          ,['filter' => 'role:administrator,warehouse']);
$routes->post('del_packing', 'Packing::delete'       ,['filter' => 'role:administrator,warehouse']);
$routes->post('delcek_packing', 'Packing::delete_cek',['filter' => 'role:administrator,warehouse']);
$routes->get('data_packing', 'data_packing::index'   );
$routes->post('data_packing_updateadmin', 'data_packing::updateadmin',['filter' => 'role:administrator']);

$routes->get('rtg_item', 'readytogo::indexitem',['filter' => 'role:administrator,warehouse']);
$routes->get('rtg_box', 'readytogo::indexbox',['filter' => 'role:administrator,warehouse']);
$routes->get('rtg', 'readytogo::prartg',['filter' => 'role:administrator,warehouse']);
$routes->post('detail_box', 'readytogo::manggilIdYeuh',['filter' => 'role:administrator,warehouse']);
$routes->get('detail_box', 'readytogo::manggilIdYeuh',['filter' => 'role:administrator,warehouse']);
$routes->post('rtgboxsubmit-form', 'readytogo::storebox',['filter' => 'role:administrator,warehouse']);
$routes->post('rtgitemsubmit-form', 'readytogo::minitem',['filter' => 'role:administrator,warehouse']);
$routes->get('rtgitemsubmit-form', 'readytogo::minitem',['filter' => 'role:administrator,warehouse']);

$routes->get('masterdatabox', 'Crud_masterbox::index',['filter' => 'role:administrator']);
$routes->get('masterboxadd', 'Crud_masterbox::create',['filter' => 'role:administrator']);
$routes->post('masterboxsubmit-form', 'Crud_masterbox::store',['filter' => 'role:administrator']);
$routes->post('masterupdatebox', 'Crud_masterbox::update',['filter' => 'role:administrator']);

$routes->get('shippingall', 'Crud_shippingall::index');
$routes->post('shipping_updateadmin', 'Crud_shippingall::updateadmin',['filter' => 'role:administrator']);

$routes->get('masterdataexp', 'Crud_masterexp::index',['filter' => 'role:administrator']);
$routes->get('masterexpadd', 'Crud_masterexp::create',['filter' => 'role:administrator']);
$routes->post('masterexpsubmit-form', 'Crud_masterexp::store',['filter' => 'role:administrator']);
$routes->post('masterupdateexp', 'Crud_masterexp::update',['filter' => 'role:administrator']);

$routes->get('masterdatakontainer', 'Crud_masterkontainer::index',['filter' => 'role:administrator']);
$routes->get('masterkontaineradd', 'Crud_masterkontainer::create',['filter' => 'role:administrator']);
$routes->post('masterkontainersubmit-form', 'Crud_masterkontainer::store',['filter' => 'role:administrator']);
$routes->post('masterupdatekontainer', 'Crud_masterkontainer::update',['filter' => 'role:administrator']);

$routes->get('masterdatasup', 'Crud_mastersup::index',['filter' => 'role:administrator']);
$routes->get('mastersupadd', 'Crud_mastersup::create',['filter' => 'role:administrator']);
$routes->post('mastersupsubmit-form', 'Crud_mastersup::store',['filter' => 'role:administrator']);
$routes->post('masterupdatesup', 'Crud_mastersup::update',['filter' => 'role:administrator']);

$routes->get('holding', 'crud_holding::index');
$routes->post('holding_update', 'crud_holding::updateadmin');

$routes->get('sunsan', 'crud_sunsan::index');
$routes->post('sunsan_updateadmin', 'crud_sunsan::updateadmin',['filter' => 'role:administrator']);

$routes->get('discmp', 'crud_discmp::index');
$routes->post('discmp_updateadmin', 'crud_discmp::updateadmin',['filter' => 'role:administrator']);

$routes->get('repair', 'crud_repair::index');
$routes->get('repair_updateadmin', 'crud_repair::updateadmin',['filter' => 'role:administrator']);

$routes->get('release', 'crud_release::index');
$routes->post('release_updateadmin', 'crud_release::updateadmin',['filter' => 'role:administrator']);

$routes->get('marketplace', 'crud_marketplace::index');
$routes->post('marketplace_updateadmin', 'crud_marketplace::updateadmin',['filter' => 'role:administrator']);

$routes->get('retain', 'crud_retain::index');
$routes->post('retain_updateadmin', 'crud_retain::updateadmin',['filter' => 'role:administrator']);

$routes->get('destroy', 'crud_destroy::index');
$routes->post('destroy_updateadmin', 'crud_destroy::updateadmin',['filter' => 'role:administrator']);

$routes->get('shippingitem', 'crud_shipping::index');
$routes->get('shippingdataform', 'crud_shipping::create',['filter' => 'role:administrator,warehouse']);
$routes->post('shippingsubmit-form', 'crud_shipping::store',['filter' => 'role:administrator,warehouse']);
$routes->post('shippingupdate', 'crud_shipping::update',['filter' => 'role:administrator,warehouse']);
$routes->get('shippingedit/(:num)', 'crud_shipping:singleUser/$1',['filter' => 'role:administrator,warehouse']);
$routes->post('shippingitem_updateadmin', 'crud_shipping::updateadmin',['filter' => 'role:administrator']);

$routes->get('shippingbox', 'crud_shipping_box::index');
$routes->get('shippingboxdataform', 'crud_shipping_box::create',['filter' => 'role:administrator,warehouse']);
$routes->post('shippingboxsubmit-form', 'crud_shipping_box::store',['filter' => 'role:administrator,warehouse']);
$routes->post('shippingboxupdate', 'crud_shipping_box::update',['filter' => 'role:administrator,warehouse']);
$routes->get('shippingboxedit/(:num)', 'crud_shipping_box:singleUser/$1',['filter' => 'role:administrator,warehouse']);
$routes->get('data_shippingbox', 'crud_shipping_box::table_data',['filter' => 'role:administrator,warehouse']);
$routes->post('detail_boxfinal', 'crud_shipping_box::manggilIdYeuh',['filter' => 'role:administrator,warehouse']);
$routes->get('detail_boxfinal', 'crud_shipping_box::manggilIdYeuh',['filter' => 'role:administrator,warehouse']);

$routes->get('pd', 'produksi::index',['filter' => 'role:administrator,production']);
$routes->post('closenotifp', 'produksi::updatestatus',['filter' => 'role:administrator,production']);
$routes->post('closenotifpreport', 'produksi::updatestatusreport',['filter' => 'role:administrator,production']);
$routes->get('data_produksi', 'produksi::table_data',['filter' => 'role:administrator,production']);
$routes->post('add_produksi', 'produksi::save',['filter' => 'role:administrator,production']);
$routes->post('del_produksi', 'produksi::delete',['filter' => 'role:administrator,production']);
$routes->post('delcek_produksi', 'produksi::delete_cek',['filter' => 'role:administrator,production']);
$routes->get('barcode', 'produksi::barcode');
$routes->post('produksisubmit-form', 'produksi::store',['filter' => 'role:administrator,production']);
$routes->get('produksisubmit-form', 'produksi::store',['filter' => 'role:administrator,production']);
$routes->get('data_pd', 'join_produksi::index');
$routes->post('detail_pd_update', 'join_produksi::matchingupdate'  ,['filter' => 'role:administrator,production']);
$routes->post('pdupdate', 'join_produksi::update',['filter' => 'role:administrator,production']);
$routes->get('pdedit/(:num)', 'join_produksi::singleUser/$1',['filter' => 'role:administrator,production']);
$routes->get('masterdeleteproduksi/(:num)', 'join_produksi::masterdelete/$1',['filter' => 'role:administrator']);
$routes->post('pd_update', 'join_produksi::updateadmin',['filter' => 'role:administrator']);



$routes->get('Final_Inspection', 'qc_packing::index',['filter' => 'role:administrator,qc']);
$routes->get('data_finalinsp', 'qc_packing::table_data',['filter' => 'role:administrator,qc']);
$routes->post('add_finalinsp', 'qc_packing::min',['filter' => 'role:administrator,qc']);
$routes->get('move_finalinsp', 'qc_packing::store',['filter' => 'role:administrator,qc']);
$routes->post('del_qcpacking', 'qc_packing::delete',['filter' => 'role:administrator,qc']);
$routes->post('delcek_finalinsp', 'qc_packing::delete_cek',['filter' => 'role:administrator,qc']);

$routes->get('qc_holding', 'qualityholding::index',['filter' => 'role:administrator,qc']);
$routes->get('data_qcholding', 'qualityholding::table_data',['filter' => 'role:administrator,qc']);
$routes->post('add_qcholding', 'qualityholding::min',['filter' => 'role:administrator,qc']);
$routes->get('move_holding', 'qualityholding::store',['filter' => 'role:administrator,qc']);
$routes->post('del_qcholding', 'qualityholding::delete',['filter' => 'role:administrator,qc']);
$routes->post('delcek_qcholding', 'qualityholding::delete_cek',['filter' => 'role:administrator,qc']);

$routes->get('packing_holding', 'packingholding::index',['filter' => 'role:administrator,warehouse']);
$routes->get('data_pcholding', 'packingholding::table_data',['filter' => 'role:administrator,warehouse']);
$routes->post('add_pcholding', 'packingholding::min',['filter' => 'role:administrator,warehouse']);
$routes->get('move_pcholding', 'packingholding::store',['filter' => 'role:administrator,warehouse']);
$routes->post('del_pcholding', 'packingholding::delete',['filter' => 'role:administrator,warehouse']);
$routes->post('delcek_pcholding', 'packingholding::delete_cek',['filter' => 'role:administrator,warehouse']);


$routes->get('reject_holding', 'Crud_reject::index');
$routes->post('reject_updateadmin', 'Crud_reject::updateadmin');

$routes->post('closenotifrepair', 'qualityrepair::updatestatus',['filter' => 'role:administrator,qc']);
$routes->get('qc_repair', 'qualityrepair::praqc',['filter' => 'role:administrator,qc']);
$routes->get('qc_repair_v', 'qualityrepair::index',['filter' => 'role:administrator,qc']);
$routes->post('qc_repair_update', 'qualityrepair::matchingupdaterepair',['filter' => 'role:administrator,qc']);
$routes->post('qc_repair_c', 'qualityrepair::acc',['filter' => 'role:administrator,qc']);
$routes->get('qc_repair_r', 'qualityrepair::report',['filter' => 'role:administrator,qc']);
$routes->get('data_repairqc', 'qualityrepair::table_data',['filter' => 'role:administrator,qc']);
$routes->get('move_qcrepair', 'qualityrepair::store',['filter' => 'role:administrator,qc']);
$routes->post('add_qcrepair', 'qualityrepair::min',['filter' => 'role:administrator,qc']);
$routes->post('del_qcrepair', 'qualityrepair::delete',['filter' => 'role:administrator,qc']);
$routes->post('delcek_qcrepair', 'qualityrepair::delete_cek',['filter' => 'role:administrator,qc']);

$routes->get('qc_repair_produksi', 'Repair_produksi::index',['filter' => 'role:administrator,production']);
$routes->post('closenotifrp', 'Repair_produksi::updatestatus',['filter' => 'role:administrator,production']);
$routes->post('closenotifrpreport', 'Repair_produksi::updatestatusreport',['filter' => 'role:administrator,production']);
$routes->post('qc_repair_produksi-form', 'Repair_produksi::store',['filter' => 'role:administrator,production']);
$routes->get('qc_repair_produksi-form', 'Repair_produksi::store',['filter' => 'role:administrator,production']);
$routes->get('data_pd_repair', 'join_produksi_repair::index');
$routes->post('detailrp_pd_update', 'join_produksi_repair::matchingupdate'  ,['filter' => 'role:administrator,production']);
$routes->post('pdrepairupdate', 'join_produksi_repair::update',['filter' => 'role:administrator,production']);
$routes->post('pdrepair_update', 'join_produksi_repair::updateadmin',['filter' => 'role:administrator,production']);
$routes->get('pdrepairedit/(:num)', 'join_produksi_repair::singleUser/$1',['filter' => 'role:administrator,production']);
$routes->get('masterdeleteproduksirepair/(:num)', 'join_produksi_repair::masterdelete/$1',['filter' => 'role:administrator']);

$routes->get('data_produksirepair', 'Repair_produksi::table_data',['filter' => 'role:administrator,production']);
$routes->post('add_produksirepair', 'Repair_produksi::min',['filter' => 'role:administrator,production']);
// $routes->get('add_produksirepair', 'Repair_produksi::min',['filter' => 'role:administrator,production']);
$routes->post('del_produksirepair', 'Repair_produksi::delete',['filter' => 'role:administrator,production']);
$routes->post('delcek_produksirepair', 'Repair_produksi::delete_cek',['filter' => 'role:administrator,production']);


$routes->get('test', 'Test::index');



/*
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (is_file(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}