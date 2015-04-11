<?php
include '../lib/config.php';
include '../lib/function.php';
include '../models/partner_model.php';
$page = null;
$page = (isset($_GET['page'])) ? $_GET['page'] : "list";
$title = ucwords("Sales ");

$_SESSION['menu_active'] = 1;

switch ($page) {
	case 'list':
		get_header($title);
		
		$query = select();
		$add_button = "partner.php?page=form";

		include '../views/partner/list.php';
		get_footer();
	break;
	
	case 'form':
		get_header();

		$close_button = "partner.php?page=list";
		
		$id = (isset($_GET['id'])) ? $_GET['id'] : null;
		if($id){

			$row = read_id($id);
		
			$action = "partner.php?page=edit&id=$id";
		} else{
			
			//inisialisasi
			$row = new stdClass();
	
			$row->seller_name = false;
			$row->seller_phone = false;
			$row->seller_address = false;
			
			$action = "partner.php?page=save";
		}

		include '../views/partner/form.php';
		get_footer();
	break;

	case 'save':
	
		extract($_POST);

		$i_name = get_isset($i_name);
		$i_phone = get_isset($i_phone);
		$i_address = get_isset($i_address);
		
		$data = "'',
					
					'$i_name',
					'$i_phone',
					'$i_address'
					
			";
			
			//echo $data;

			create($data);
		
			header("Location: partner.php?page=list&did=1");
		
		
	break;

	case 'edit':

		extract($_POST);

		$id = get_isset($_GET['id']);
		$i_name = get_isset($i_name);
		$i_phone = get_isset($i_phone);
		$i_address = get_isset($i_address);
		
					$data = " seller_name = '$i_name',
								seller_phone = '$i_phone',
								seller_address = '$i_address' 
					";
			
			update($data, $id);
			
			header('Location: partner.php?page=list&did=2');

		

	break;

	case 'delete':

		$id = get_isset($_GET['id']);	

		delete($id);

		header('Location: partner.php?page=list&did=3');

	break;
}

?>