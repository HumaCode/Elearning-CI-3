<?php

$session = $this->session->userdata('status');
if ($session == 'Administrator') {
    $href = base_url('administrator/profile');
} else if ($session == 'Guru') {
    $href = base_url('guru/profile');
} else if ($session == 'Siswa') {
    $href = base_url('siswa/profile');
}

?>

<!-- top navigation -->
<div class="top_nav">
    <div class="nav_menu">
        <div class="nav toggle">
            <a id="menu_toggle"><i class="fa fa-bars"></i></a>
        </div>
        <nav class="nav navbar-nav">
            <ul class=" navbar-right">
                <li class="nav-item dropdown open" style="padding-left: 15px;">
                    <a href="javascript:;" class="user-profile dropdown-toggle" aria-haspopup="true" id="navbarDropdown" data-toggle="dropdown" aria-expanded="false">
                        <img src="<?= base_url('assets/img/user/') . $user['foto']; ?>" alt=""><?= $user['nama'] ?>
                    </a>
                    <div class="dropdown-menu dropdown-usermenu pull-right" aria-labelledby="navbarDropdown">
                        <?php if ($session == 'Administrator') : ?>

                            <a class="dropdown-item" href="<?= base_url('administrator/setting') ?>"> Setting</a>
                            <a class="dropdown-item" href="<?= $href ?>"> Profile</a>
                        <?php else : ?>
                            <a class="dropdown-item" href="<?= $href ?>"> Profile</a>
                        <?php endif; ?>
                        <a class="dropdown-item" href="<?= base_url('auth/logout') ?>"><i class="fa fa-sign-out pull-right"></i> Log Out</a>
                    </div>
                </li>

                <li role="presentation" class="nav-item dropdown open">
                    <a href="javascript:;" class="dropdown-toggle info-number" id="navbarDropdown1" data-toggle="dropdown" aria-expanded="false">
                        <i class="fa fa-envelope-o"></i>
                        <span class="badge bg-green">6</span>
                    </a>
                    <ul class="dropdown-menu list-unstyled msg_list" role="menu" aria-labelledby="navbarDropdown1">
                        <li class="nav-item">
                            <a class="dropdown-item">
                                <span class="image"><img src="<?= base_url() ?>assets/vendor/gentelella-master/production/images/img.jpg" alt="Profile Image" /></span>
                                <span>
                                    <span>John Smith</span>
                                    <span class="time">3 mins ago</span>
                                </span>
                                <span class="message">
                                    Film festivals used to be do-or-die moments for movie makers. They were where...
                                </span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="dropdown-item">
                                <span class="image"><img src="<?= base_url() ?>assets/vendor/gentelella-master/production/images/img.jpg" alt="Profile Image" /></span>
                                <span>
                                    <span>John Smith</span>
                                    <span class="time">3 mins ago</span>
                                </span>
                                <span class="message">
                                    Film festivals used to be do-or-die moments for movie makers. They were where...
                                </span>
                            </a>
                        </li>

                        <li class="nav-item">
                            <div class="text-center">
                                <a href="<?= base_url('chat') ?>" class="dropdown-item">
                                    <strong>Lihat Semua</strong>
                                    <i class="fa fa-angle-right"></i>
                                </a>
                            </div>
                        </li>
                    </ul>
                </li>
            </ul>
        </nav>
    </div>
</div>
<!-- /top navigation -->