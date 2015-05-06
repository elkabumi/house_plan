<?php
include '../lib/config.php';
include '../lib/function.php';
include '../models/rab_model.php';
$page = null;
$page = (isset($_GET['page'])) ? $_GET['page'] : "list";
$title = ucfirst("RAB");

$_SESSION['menu_active'] = 1;

switch ($page) {
	case 'list':
		get_header($title);
		
		$query = select();
		$add_button = "rab.php?page=form";

		include '../views/rab/list.php';
		get_footer();
	break;
	
	
	
	case 'form_upload':
		
		get_header();
		
		$title = ucfirst("Upload RAB");
	
		$close_button = "rab.php?page=list";
		
		$id = (isset($_GET['id'])) ? $_GET['id'] : null;
		
		if($id){
			
			$row = read_id($id);
			
			$action = "rab.php?page=save_rab&id=$id";
			
		}	
		
	
		include '../views/rab/form_upload.php';
		
		get_footer();
	break;

	
	case 'save_rab':
	

		$id = (isset($_GET['id'])) ? $_GET['id'] : null;
		
		$path = "../file/rab/";
		$i_file_tmp = $_FILES['i_file']['tmp_name'];
		$i_file = ($_FILES['i_file']['name']) ? $_FILES['i_file']['name'] : "";
		
		$date = ($_FILES['i_file']['name']) ? date("Ymdhms")."_" : "";
		
		if($i_file){
				
			
				if(move_uploaded_file($i_file_tmp, $path.$date.$i_file)){
					$get_file_old = get_file_old($id);
					if($get_file_old){
						unlink("../file/rab/" .$get_file_old);
					}
					
					$data = "payment_rab = '$date$i_file'";
				}
			
			
		}
			
		upload($data, $id);
			
		header('Location: rab.php?page=list&did=1');
		
		
	break;

}

?>