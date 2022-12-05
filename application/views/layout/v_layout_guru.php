<?php

// beri proteksi halaman untuk admin, diambil dari library(user_login.)
$this->user_login->proteksi_halaman();

require_once('v_head.php');
require_once('guru/v_header_guru.php');
require_once('guru/v_sidebar_guru.php');
require_once('v_topbar.php');
require_once('v_content.php');
require_once('v_footer.php');
