<?php
include '../lib/config.php';
include '../lib/function.php';
include '../models/table_type_model.php';
$page = null;
$page = (isset($_GET['page'])) ? $_GET['page'] : "list";
$title = ucwords("Tipe Rumah");

$_SESSION['menu_active'] = 1;

switch ($page) {
	case 'list':
		get_header($title);
		
		$query = select();
		$add_button = "table_type.php?page=form";

		include '../views/table_type/list.php';
		get_footer();
	break;
	
	case 'form':
		get_header();

		$close_button = "table_type.php?page=list";
		
		$id = (isset($_GET['id'])) ? $_GET['id'] : null;
		$query_tb = select_table_block();
		
		if($id){

			$row = read_id($id);
		
			$action = "table_type.php?page=edit&id=$id";
		} else{
			
			//inisialisasi
			$row = new stdClass();
	
			$row->tt_name = false;
			$row->tb_id = false;
			$row->tt_img = false;
			
			$action = "table_type.php?page=save";
		}

		include '../views/table_type/form.php';
		get_footer();
	break;

	case 'save':
	
		extract($_POST);

		$i_name = get_isset($i_name);
		$i_tb_id = get_isset($i_tb_id);
		
		
		$path = "../img/table_type/";
		$i_img_tmp = $_FILES['i_img']['tmp_name'];
		$i_img = ($_FILES['i_img']['name']) ? $_FILES['i_img']['name'] : "";
		
		$date = ($_FILES['i_img']['name']) ? date("Ymdhms")."_" : "";
		
		$data = "'',
					'$i_name',
					'$i_tb_id',
					'".$date.$i_img."'
					
			";
			
			//echo $data;

			create($data);
			if($i_img){
				move_uploaded_file($i_img_tmp, $path.$date.$i_img);
			}
			 
			header("Location: table_type.php?page=list&did=1");
		
		
	break;

	case 'edit':

		extract($_POST);

		$id = get_isset($_GET['id']);
		$i_name = get_isset($i_name);
		$i_tb_id = get_isset($i_tb_id);
		
		
		$path = "../img/table_type/";
		$i_img_tmp = $_FILES['i_img']['tmp_name'];
		$i_img = ($_FILES['i_img']['name']) ? $_FILES['i_img']['name'] : "";
		
		$date = ($_FILES['i_img']['name']) ? date("Ymdhms")."_" : "";
		
		if($i_img){
				
			
				if(move_uploaded_file($i_img_tmp, $path.$date.$i_img)){
					$get_img_old = get_img_old($id);
					if($get_img_old){
						unlink("../img/table_type/" .$get_img_old);
					}
					
					$data = "tt_name = '$i_name',
							tb_id = '$i_tb_id',
							tt_img = '$date$i_img'

					";
				}
			
			
			}else{
				$data = "tt_name = '$i_name',
							tb_id = '$i_tb_id'
					";
			}
			
		update($data, $id);
			
		header('Location: table_type.php?page=list&did=2');

		

	break;

	case 'delete':

		$id = get_isset($_GET['id']);	
		
		$get_img_old = get_img_old($id);
					if($get_img_old){
						unlink("../img/table_type/" . $get_img_old);
					}

		delete($id);

		header('Location: table_type.php?page=list&did=3');

	break;
}

?>