<header>
    <nav class="navbar navbar-expand navbar-light ">
        <div class="container-fluid">
            <a haref="" class="burger-btn d-block">
                <i class="bi bi-justify fs-3"></i>
            </a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">

                    <li class="nav-item dropdown me-3">
                        <a class="nav-link active dropdown-toggle" href="#" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            <i class='bi bi-bell bi-sub fs-4 text-gray-600'></i>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButton">
                            <li>
                                <h6 class="dropdown-header">Notifications</h6>
                            </li>
                            <li><a class="dropdown-item">No notification available</a></li>
                        </ul>
                    </li>
                </ul>
                <div class="dropdown">
                    <a href="#" data-bs-toggle="dropdown" aria-expanded="false">
                        <div class="user-menu d-flex">
                            <div class="user-name text-end me-3">
                                <h6 class="mb-0 text-gray-600"><?= user()->username; ?></h6>
                                <p class="mb-0 text-sm text-gray-600"><?= user()->role; ?></p>
                            </div>
                            <div class="user-img d-flex align-items-center">
                                <div class="avatar avatar-md bg-primary me-8">
                                    <span class="avatar-content"><?php  $data = user()->username;    
                                                                        $whatIWant = substr($data, strpos($data, " ") + 1);
                                                                        $akhir = substr($whatIWant,0,1);
                                                                        $awal = substr($data,0,1);
                                                                        echo $awal;echo $akhir; ?>
                                    </span>
                                </div>
                                <!-- <div class="avatar avatar-xl me-3">
                                    <img src="assets/images/faces/3.jpg" alt="" srcset="">
                                </div> -->
                            </div>
                        </div>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButton">
                        <li>
                            <h6 class="dropdown-header">Hello, <?= user()->username; ?>!</h6>
                        </li>
                        <li><a class="dropdown-item" href="<?= base_url();?>/my_profile"><i
                                    class="icon-mid bi bi-person me-2"></i> My
                                Profile</a></li>
                        <hr>
                        <li><a class="dropdown-item" href="<?= base_url('/logout');?>"><i
                                    class="icon-mid bi bi-box-arrow-left me-2"></i>Logout</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>
</header>