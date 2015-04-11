<?php
include '../lib/config.php';
include '../lib/function.php';
include '../models/table_block_model.php';
$page = null;
$page = (isset($_GET['page'])) ? $_GET['page'] : "list";
$title = ucwords("Blok");

$_SESSION['menu_active'] = 1;

switch ($page) {
	case 'list':
		get_header($title);
		
		$query = select();
		$add_button = "table_block.php?page=form";

		include '../views/table_block/list.php';
		get_footer();
	break;
	
	case 'form':
		get_header();

		$close_button = "table_block.php?page=list";
		
		$id = (isset($_GET['id'])) ? $_GET['id'] : null;
		$query_building = select_building();
		
		if($id){

			$row = read_id($id);
		
			$action = "table_block.php?page=edit&id=$id";
		} else{
			
			//inisialisasi
			$row = new stdClass();
	
			$row->tb_name = false;
			$row->building_id = false;
			
			$action = "table_block.php?page=save";
		}

		include '../views/table_block/form.php';
		get_footer();
	break;

	case 'save':
	
		extract($_POST);

		$i_name = get_isset($i_name);
		$i_building_id = get_isset($i_building_id);
		
		$data = "'',
					
					'$i_name',
					'$i_building_id'
					
			";
			
			//echo $data;

			create($data);
		
			header("Location: table_block.php?page=list&did=1");
		
		
	break;

	case 'edit':

		extract($_POST);

		$id = get_isset($_GET['id']);
		$i_name = get_isset($i_name);
		$i_building_id = get_isset($i_building_id);
		
					$data = " tb_name = '$i_name',
							  building_id = '$i_building_id'
					";
			
		update($data, $id);
			
		header('Location: table_block.php?page=list&did=2');

		

	break;

	case 'delete':

		$id = get_isset($_GET['id']);	

		delete($id);

		header('Location: table_block.php?page=list&did=3');

	break;
}

?>