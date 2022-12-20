<?= $this->extend('basecore/basemain');?>
<?= $this->section('pageconten')?>
<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>PROJECT</h3>
                <p class="text-subtitle text-muted">Project Management.</p>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?= base_url()?>/">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Project
                        </li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <section class="section">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Project List</h4>
            </div>
            <div class="card-body">

                <div class="table-responsive">
                    <table class="table table-hover table-lg">
                        <thead>
                            <tr>
                                <th>no</th>
                                <th>Project Name</th>
                                <th>Status</th>
                                <th>Progres</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($projects as $key => $project) : ?>
                                <tr>
                                <td class="col-sm-1"><?= ++$key ?></td>
                                <td class="col-3">
                                    <div class="d-flex align-items-center">
                                        <div class="avatar avatar-md">
                                            <img src="assets/images/faces/5.jpg">
                                        </div>
                                        <div>
                                            <p class="font-bold ms-3 mb-0"><?= $project['project_name']?></p>
                                            <p class=" ms-3 mb-0" style="font-size: 12px"><?= $project['project_customer']?></p>
                                        </div>
                                    </div>
                                </td>
                                <td class="col-auto">
                                    <div class="d-flex align-items-center">
                                    <?php if ($project['project_status'] == "on progres"):$hasil = "dot_red";
                                      elseif ($project['project_status'] == "finish"):$hasil = "dot_green";
                                      elseif ($project['project_status'] == "hold"):$hasil = "dot_yellow";
                                    endif;?>
                                    <span class="<?= $hasil?>"></span>
                                        <p id="status" class=" mb-0"><?= $project['project_status']?></p>
                                    </div>
                                </td>
                                <td>
                                    <p class="font-bold mb-0"><?= $project['project_progres']?>%</p>
                                </td>
                                <td class="col-sm-1">
                                    <a href="<?= base_url('contact/delete/'.$project['id']) ?>" class="btn btn-primary" onclick="return">View</a>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
</div>
<?= $this->endSection();?>