<?php
include '../lib/config.php';
include '../lib/function.php';
include '../models/time_schedule_model.php';
$page = null;
$page = (isset($_GET['page'])) ? $_GET['page'] : "list";
$title = ucfirst("Time Schedule");

$_SESSION['menu_active'] = 1;

switch ($page) {
	case 'list':
		get_header($title);
		
		$query = select();
		$add_button = "time_schedule.php?page=form";

		include '../views/time_schedule/list.php';
		get_footer();
	break;
	
	
	
	case 'form_upload':
		
		get_header();
		
		$title = ucfirst("Upload Time Schedule");
	
		$close_button = "time_schedule.php?page=list";
		
		$id = (isset($_GET['id'])) ? $_GET['id'] : null;
		
		if($id){
			
			$row = read_id($id);
			
			$action = "time_schedule.php?page=save_time_schedule&id=$id";
			
		}	
		
	
		include '../views/time_schedule/form_upload.php';
		
		get_footer();
	break;

	
	case 'save_time_schedule':
	

		$id = (isset($_GET['id'])) ? $_GET['id'] : null;
		
		$path = "../file/time_schedule/";
		$i_file_tmp = $_FILES['i_file']['tmp_name'];
		$i_file = ($_FILES['i_file']['name']) ? $_FILES['i_file']['name'] : "";
		
		$date = ($_FILES['i_file']['name']) ? date("Ymdhms")."_" : "";
		
		if($i_file){
				
			
				if(move_uploaded_file($i_file_tmp, $path.$date.$i_file)){
					$get_file_old = get_file_old($id);
					if($get_file_old){
						unlink("../file/time_schedule/" .$get_file_old);
					}
					
					$data = "payment_time_schedule = '$date$i_file'";
				}
			
			
		}
			
		upload($data, $id);
			
		header('Location: time_schedule.php?page=list&did=1');
		
		
	break;

}

?>