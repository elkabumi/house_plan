<?php
include '../lib/config.php';
include '../lib/function.php';
include '../models/order_model.php';
$page = null;
$page = (isset($_GET['page'])) ? $_GET['page'] : "list";
$title = ucfirst("Order");

$_SESSION['menu_active'] = 2;

switch ($page) {
	case 'list':
		
		$first_building_id = get_first_building_id();
		$building_id = (isset($_GET['building_id'])) ? $_GET['building_id'] : $first_building_id; 
		$building_name = get_building_name($building_id);
		$building_img = get_building_img($building_id);
		//get_header2($title);
		
		//$query = select();
		$action_room = "order.php?page=save_room";
		$action_table = "order.php?page=save_table&building_id=$building_id";
		$action_logout = "logout.php";
		
		//$building_next();
		//$building_prev();

		include '../views/order/list.php';
		//get_footer();
	break;
	
	case 'save_table_location':

		$id=$_GET['id'];
		$data_x=$_GET['data_x'];
		$data_y=$_GET['data_y'];
		
		save_table_location($id, $data_x, $data_y);
		
	
	break;
	
	case 'save_room':
		$room_name = $_POST['i_room_name'];
		$data = "'','".$room_name."'";
		save_room($data);
		header('location: order.php');
	break;
	
	case 'save_table':
		$building_id = $_GET['building_id'];
		$table_name = $_POST['i_table_name'];
		$data = "'',
				'$building_id',
				'".$table_name."',
				'200',
				'200'
				";
		save_table($data);
		header("location: order.php?building_id=$building_id");
	break;
	
	
	
}

?>