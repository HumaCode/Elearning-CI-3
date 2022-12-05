<?php

// beri proteksi halaman untuk admin, diambil dari library(user_login.)
$this->user_login->proteksi_halaman();

require_once('v_head.php');
require_once('admin/v_header_admin.php');
require_once('admin/v_sidebar_admin.php');
require_once('v_topbar.php');
require_once('v_content.php');
require_once('v_footer.php');
