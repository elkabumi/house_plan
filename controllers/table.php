<?php
include '../lib/config.php';
include '../lib/function.php';
include '../models/table_model.php';
$page = null;
$page = (isset($_GET['page'])) ? $_GET['page'] : "list";
$title = ucfirst("table");

$_SESSION['menu_active'] = 4;

switch ($page) {
	case 'list':
		
		$first_building_id = get_first_building_id();
		$building_id = (isset($_GET['building_id'])) ? $_GET['building_id'] : $first_building_id; 
		$building_name = get_building_name($building_id);
		$building_img = get_building_img($building_id);
		//get_header2($title);
		
		//$query = select();
		$action_room = "table.php?page=save_room";
		$action_table = "table.php?page=save_table&building_id=$building_id";
		$action_logout = "logout.php";
		
		//$building_next();
		//$building_prev();

		include '../views/table/list.php';
		//get_footer();
	break;
	
	case 'save_table_location':

		$id=$_GET['id'];
		$data_x=$_GET['data_x'];
		$data_y=$_GET['data_y'];
		$data_top = $_GET['data_top'];
		
		save_table_location($id, $data_x, $data_y, $data_top);
		
	
	break;
	
	case 'save_table':
		extract($_POST);
		
		$building_id = $_GET['building_id'];
		$i_name = get_isset($i_name);
		$i_price = get_isset($i_price);
		$i_tt_id = get_isset($i_tt_id);
		
		$data = "'',
					'$i_tt_id', 
					'$i_name',
					'200', 
					'200',
					'$i_price',
					'0'
			";
			
			//echo $data;

			save_table($data);
			
		
		header("location: table.php?building_id=$building_id");
	break;
	
	
	
	
}

?>