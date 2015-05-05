<?php
include '../lib/config.php';
include '../lib/function.php';
include '../models/angsuran_model.php';
$page = null;
$page = (isset($_GET['page'])) ? $_GET['page'] : "list";
$title = ucfirst("List Rumah");

$_SESSION['menu_active'] = 1;

switch ($page) {
	case 'list':
		get_header($title);
		
		$query = select();
		$add_button = "angsuran.php?page=form";

		include '../views/angsuran/list.php';
		get_footer();
	break;
	
	
	
	case 'form_payment':
		
		get_header();
		
		$title = ucfirst("Payment");

		
		$close_button = "angsuran.php?page=list";
		$query_seller = select_seller();
		
		$id = (isset($_GET['id'])) ? $_GET['id'] : null;
		
		$query_angsuran = select_angsuran($id);
		
		if($id){

			$row = read_id($id);
			
			$get_payment = get_payment($id);
			
			if($get_payment){
				$row_buyer = read_payment_id($id);
				$row_buyer->payment_date = format_date($row_buyer->payment_date);
				$action = "angsuran.php?page=edit_payment&id=$id";
			}else{
				//inisialisasi
				$row_buyer = new stdClass();
				
				$row_buyer->seller_id = false;
				$row_buyer->payment_method = 1;
				$row_buyer->buyer_name = false;
				$row_buyer->buyer_phone = false;
				$row_buyer->buyer_address = false;
				$row_buyer->buyer_email = false;
				$row_buyer->buyer_office_address = false;
				$row_buyer->payment_dp = 0;
				$row_buyer->payment_date = format_date(date("Y-m-d"));
				$row_buyer->payment_margin = 0;
				$row_buyer->payment_angsuran = 0;
			
				$action = "angsuran.php?page=save_payment&id=$id";
			}
		}	
		
		$add_angsuran = "angsuran.php?page=add_angsuran&id=$id";
		
		$get_angsuran_terbayar = get_rupiah(get_angsuran_terbayar($id));
		$get_angsuran_sisa = get_rupiah(get_angsuran_sisa($id));
		
		
		include '../views/angsuran/form_payment.php';
		include '../views/angsuran/list_payment.php';
		get_footer();
	break;

	case 'add_angsuran':
		
		get_header();
		
		$title = ucfirst("Bayar Angsuran");

		$id = (isset($_GET['id'])) ? $_GET['id'] : null;
		
		$get_angsuran_id = get_new_angsuran($id);
		
		$close_button = "angsuran.php?page=form_payment&id=$id";
		$action = "angsuran.php?page=save_angsuran&id=$get_angsuran_id&table_id=$id";
		
		$row = read_new_angsuran($get_angsuran_id);
		
		include '../views/angsuran/add_angsuran.php';
		get_footer();
	break;
	
	case 'save_angsuran':
	

		$id = (isset($_GET['id'])) ? $_GET['id'] : null;
		$table_id = (isset($_GET['table_id'])) ? $_GET['table_id'] : null;
		
		$data = "pd_status = '1'
			";
			
			//echo $data;

			save_angsuran($data, $id);
		
			header("Location: angsuran.php?page=form_payment&id=$table_id&did=1");
		
		
	break;

}

?>