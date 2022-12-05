<!-- sidebar menu -->
<div id="sidebar-menu" class="main_menu_side hidden-print main_menu ">
    <div class="menu_section">
        <h3>Menu Admin</h3>
        <ul class="nav side-menu">
            <li>
                <a href="<?= base_url('administrator') ?>"><i class="fa fa-home"></i> Home </a>
            </li>
            <li><a><i class="fa fa-edit"></i> Manajemen User<span class="fa fa-chevron-down"></span></a>
                <ul class="nav child_menu">
                    <li><a href="<?= base_url('administrator/guru') ?>">Daftar Guru</a></li>
                    <li><a href="<?= base_url('administrator/siswa') ?>">Daftar Siswa</a></li>
                    <li><a href="<?= base_url('administrator/user') ?>">Semua User</a></li>
                </ul>
            </li>
            <li>
                <a href="<?= base_url('administrator/mapel') ?>"><i class="fa fa-book"></i>Daftar Mapel </a>
            </li>
            <li>
                <a href="<?= base_url('administrator/kelas') ?>"><i class="fa fa-certificate"></i> Kelas </a>
            </li>

            <li>
                <a href="<?= base_url('administrator/kursus') ?>"><i class="fa fa-graduation-cap"></i> Kursus </a>
            </li>

        </ul>
    </div>
    <div class="menu_section">
        <h3>Lainya</h3>
        <ul class="nav side-menu">

            <li>
                <a href="<?= base_url('auth/logout') ?>" data-toggle="modal" data-target=".bs-example-modal-sm"><i class="fa fa-sun-o"></i> Logout </a>
            </li>
        </ul>
    </div>

</div>
</div>
</div>