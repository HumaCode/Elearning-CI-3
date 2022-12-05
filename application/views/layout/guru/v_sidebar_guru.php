<!-- sidebar menu -->
<div id="sidebar-menu" class="main_menu_side hidden-print main_menu ">
    <div class="menu_section">

        <?php
        // ambil data guru by session
        $guruSession = $this->session->userdata('username');
        $guru = $this->db->get_where('tb_guru', ['nip' => $guruSession])->row_array();

        if ($guru['tgl_lahir'] == '0000-00-00') : ?>
            <h3>Lengkapi Profil dulu</h3>
            <ul class="nav side-menu">
                <li>
                    <a href="#"><i class="fa fa-home"></i> Akses Belum diijinkan </a>
                </li>
                <li>
                    <a href="#"><i class="fa fa-book"></i> Akses Belum diijinkan </a>
                </li>
                <li>
                    <a href="#"><i class="fa fa-home"></i> Akses Belum diijinkan </a>
                </li>
            </ul>
        <?php else : ?>
            <h3>Menu Admin</h3>
            <ul class="nav side-menu">
                <li>
                    <a href="<?= base_url('guru') ?>"><i class="fa fa-home"></i> Home </a>
                </li>
                <li>
                    <a href="<?= base_url('guru/kursusSaya') ?>"><i class="fa fa-book"></i> Kursus Saya </a>
                </li>
                <li>
                    <a href="<?= base_url('guru/nilai') ?>"><i class="fa fa-file-o"></i> Nilai </a>
                </li>
            </ul>

        <?php endif; ?>

    </div>

    <div class="menu_section">
        <h3>Lainya</h3>
        <ul class="nav side-menu">

            <li>
                <a href="<?= base_url('guru/profile') ?>"><i class="fa fa-user"></i> Profil </a>
            </li>
            <li>
                <a href="<?= base_url('auth/logout') ?>" data-toggle="modal" data-target=".bs-example-modal-sm"><i class="fa fa-power-off"></i> Logout </a>
            </li>
        </ul>
    </div>

</div>
</div>
</div>