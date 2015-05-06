<?php
include '../lib/config.php';
include '../lib/function.php';
include '../models/progres_model.php';
$page = null;
$page = (isset($_GET['page'])) ? $_GET['page'] : "list";
$title = ucfirst("List Rumah");

$_SESSION['menu_active'] = 1;

switch ($page) {
	case 'list':
		get_header($title);
		
		$query = select();
		$add_button = "progres.php?page=form";

		include '../views/progres/list.php';
		get_footer();
	break;
		
	case 'form_payment':
		
		get_header();
		
		$title = ucfirst("Payment");


		$close_button = "progres.php?page=list";
		$query_seller = select_seller();
		
		$id = (isset($_GET['id'])) ? $_GET['id'] : null;
		
		if($id){

			$row = read_id($id);
			
			$get_payment = get_payment($id);
			
			if($get_payment){
				$row_buyer = read_payment_id($id);
				$row_buyer->payment_date = format_date($row_buyer->payment_date);
				$action = "progres.php?page=edit_payment&id=$id";
			}else{
				//inisialisasi
				$row_buyer = new stdClass();
				
				$row_buyer->seller_id = false;
				$row_buyer->payment_method = false;
				$row_buyer->buyer_name = false;
				$row_buyer->buyer_phone = false;
				$row_buyer->buyer_address = false;
				$row_buyer->buyer_email = false;
				$row_buyer->buyer_office_address = false;
				$row_buyer->payment_dp = 0;
				$row_buyer->payment_date = format_date(date("Y-m-d"));
			
				$action = "progres.php?page=save_payment&id=$id";
			}
		}	
		
		include '../views/progres/form.php';
		get_footer();
	break;
	
	case 'form_progres':
		get_header();
		
		$id = (isset($_GET['id'])) ? $_GET['id'] : null;
		$p_id = (isset($_GET['p_id'])) ? $_GET['p_id'] : null;
		
		$close_button = "progres.php?page=form_payment&id=$id";
		$query_progres = read_progres();

		
		if($p_id){
			$title = ucfirst("Form Edit Progres");

			$row = select_progres_id($p_id);
		//echo $title;
			$action = "progres.php?page=edit_progres&id=$id&p_id=$p_id";
		} else{
			$title = ucfirst("Form Input Progres");

			//inisialisasi
			$row = new stdClass();
			
			$row->table_progres_id = false;
			$row->table_progres_date 	 = date("Y-m-d");
			
			//echo $title;
			$action = "progres.php?page=save_progres&id=$id";
		}

		include '../views/progres/form_progres.php';
		get_footer();
	break;
	
	case 'save_payment':
	
		extract($_POST);

		$id = (isset($_GET['id'])) ? $_GET['id'] : null;
		$i_payment_method = get_isset($i_payment_method);
		$i_buyer_name = get_isset($i_buyer_name);
		$i_buyer_phone = get_isset($i_buyer_phone);
		$i_buyer_address = get_isset($i_buyer_address);
		$i_buyer_email = get_isset($i_buyer_email);
		$i_buyer_office_address = get_isset($i_buyer_office_address);
		$i_seller_id = get_isset($i_seller_id);
		$date = date("Y-m-d");
		$i_payment_dp = get_isset($i_payment_dp);
		
		$data = "'',
					'$id', 
					'$i_seller_id',
					'$i_payment_method',
					'$i_buyer_name', 
					'$i_buyer_phone',
					'$i_buyer_address',
					'$i_buyer_email',
					'$i_buyer_office_address',
					'$date',
					'$i_payment_dp'
			";
			
		$data_table = "table_status = '1'";
			
			//echo $data;

			create_payment($data);
			update($data_table, $id);
		
			header("Location: progres.php?page=list&did=4");
		
		
	break;
	
	case 'save_progres':
	
		extract($_POST);

		$i_progres_date = format_back_date(get_isset($i_progres_date));
		$i_progres_id = get_isset($i_progres_id);
		$i_description = get_isset($i_description);
		//echo $i_progres_date;
		
		$path = "../img/progres/";
		$i_img_tmp = $_FILES['i_img']['tmp_name'];
		$i_img = ($_FILES['i_img']['name']) ? $_FILES['i_img']['name'] : "";
		$i_img = str_replace(" ","",$i_img);
		
		$date = ($_FILES['i_img']['name']) ? date("Ymdhms")."_" : "";
		
		$id = (isset($_GET['id'])) ? $_GET['id'] : null;
		
		$data = "'',
				'$i_progres_date',
				'$i_progres_id',
				'".$date.$i_img."',
				'$i_description',
				'$id'
			";
			echo $data;
		create_progres($data);
		if($i_img){
				move_uploaded_file($i_img_tmp, $path.$date.$i_img);
			}
		header("Location: progres.php?page=form_payment&did=1&id=$id");
		
		
	break;

	case 'edit_payment':

		extract($_POST);

		$id = (isset($_GET['id'])) ? $_GET['id'] : null;
		$i_payment_method = get_isset($i_payment_method);
		$i_buyer_name = get_isset($i_buyer_name);
		$i_buyer_phone = get_isset($i_buyer_phone);
		$i_buyer_address = get_isset($i_buyer_address);
		$i_buyer_email = get_isset($i_buyer_email);
		$i_buyer_office_address = get_isset($i_buyer_office_address);
		$i_seller_id = get_isset($i_seller_id);
		$date = date("Y-m-d");
		$i_payment_dp = get_isset($i_payment_dp);
		
		$data = "
					seller_id = '$i_seller_id',
					payment_method = '$i_payment_method',
					buyer_name = '$i_buyer_name', 
					buyer_phone = '$i_buyer_phone',
					buyer_address = '$i_buyer_address',
					buyer_email = '$i_buyer_email',
					buyer_office_address = '$i_buyer_office_address',
					payment_date = '$date',
					payment_dp = '$i_payment_dp'
			";
			
		$data_table = "table_status = '1'";
			
			//echo $data;

			update_payment($data, $id);
			update($data_table, $id);
		
			header("Location: progres.php?page=list&did=4");

		

	break;
	
	case 'edit_progres':

		extract($_POST);
		$id = get_isset($_GET['id']);
		//$i_number = get_isset($i_number);
		$i_progres_date = format_back_date(get_isset($i_progres_date));
		$i_progres_id = get_isset($i_progres_id);
		$i_description = get_isset($i_description);
		//echo $i_progres_date;
		
		$path = "../img/progres/";
		$i_img_tmp = $_FILES['i_img']['tmp_name'];
		$i_img = ($_FILES['i_img']['name']) ? $_FILES['i_img']['name'] : "";
		$i_img = str_replace(" ","",$i_img);
		
		$date = ($_FILES['i_img']['name']) ? date("Ymdhms")."_" : "";
		
		$p_id = (isset($_GET['p_id'])) ? $_GET['p_id'] : null;
			if($i_img){
				
			
				if(move_uploaded_file($i_img_tmp, $path.$date.$i_img)){
					$get_img_old = get_img_old($id);
					if($get_img_old){
						unlink("../img/progres/" .$get_img_old);
					}
					
					$data = "table_progres_id = '$p_id',
							table_progres_date = '$i_progres_date',
							progres_id = '$i_progres_id',
							table_progres_img = '".$date.$i_img."',
							table_progres_dercription = '$i_description',
							table_id = '$id'
							";
				}
			
			
			}else{
		$data = "table_progres_id = '$p_id',
				table_progres_date = '$i_progres_date',
				progres_id = '$i_progres_id',
				table_progres_dercription = '$i_description',
				table_id = '$id'
			";
			}
		//echo $data;
		//$update2 = 	"land_area = land_area  + ".$i_luas."";
		update_progres($data,$p_id);
		
		//update("lands", $update2,"land_id",$id);	
		header("Location: progres.php?page=form_payment&did=2&id=$id");

	break;

	case 'delete':

		$id = get_isset($_GET['id']);	

		delete($id);

		header('Location: progres.php?page=list&did=3');

	break;
	
	case 'delete_progres':

		$id = get_isset($_GET['id']);
			
		$p_id = (isset($_GET['p_id'])) ? $_GET['p_id'] : null;
		
		$get_img_old = get_img_old($p_id);
					if($get_img_old){
						unlink("../img/progres/" . $get_img_old);
					}		
		
		delete_progres($p_id);

			
		header("Location: progres.php?page=form_payment&did=2&id=$id");

	break;
}

?>