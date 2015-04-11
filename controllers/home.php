<?php
include '../lib/config.php';
include '../lib/function.php';
include '../models/user_model.php';
$page = null;
$page = (isset($_GET['page'])) ? $_GET['page'] : "list";
$title = ucfirst("Home");

switch ($page) {
	case 'list':
		get_header($title);
		include '../views/layout/home.php';
		get_footer();
	break;
	
}

?>