<?php
include '../lib/config.php';
include '../lib/function.php';
include '../models/master_table_model.php';
$page = null;
$page = (isset($_GET['page'])) ? $_GET['page'] : "list";
$title = ucfirst("List Rumah");

$_SESSION['menu_active'] = 1;

switch ($page) {
	case 'list':
		get_header($title);
		
		$query = select();
		$add_button = "master_table.php?page=form";

		include '../views/master_table/list.php';
		get_footer();
	break;
	
	case 'form':
		get_header();

		$close_button = "master_table.php?page=list";
		$query_tt = select_tt();

		$id = (isset($_GET['id'])) ? $_GET['id'] : null;
		if($id){

			$row = read_id($id);
		
			$action = "master_table.php?page=edit&id=$id";
		} else{
			
			//inisialisasi
			$row = new stdClass();
	
			$row->table_name = false;
			$row->table_price = false;
			$row->tt_id = false;
			
			$action = "master_table.php?page=save";
		}

		include '../views/master_table/form.php';
		get_footer();
	break;
	
	case 'form_payment':
		
		get_header();
		
		$title = ucfirst("Payment");


		$close_button = "master_table.php?page=list";
		$query_seller = select_seller();
		
		$id = (isset($_GET['id'])) ? $_GET['id'] : null;
		
		if($id){

			$row = read_id($id);
			
			$get_payment = get_payment($id);
			
			if($get_payment){
				$row_buyer = read_payment_id($id);
				$row_buyer->payment_date = format_date($row_buyer->payment_date);
				$action = "master_table.php?page=edit_payment&id=$id";
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
			
				$action = "master_table.php?page=save_payment&id=$id";
			}
		}	
		
		$email_button = "master_table.php?page=send_email&id=$id";
		
		include '../views/master_table/form_payment.php';
		get_footer();
	break;

	case 'save':
	
		extract($_POST);

		$i_name = get_isset($i_name);
		$i_price = get_isset($i_price);
		$i_tt_id = get_isset($i_tt_id);
		
		$data = "'',
					'$i_tt_id', 
					'$i_name',
					'100', 
					'100',
					'$i_price',
					'0'
			";
			
			//echo $data;

			create($data);
		
			header("Location: master_table.php?page=list&did=1");
		
		
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
		$i_price = get_isset($i_price);
		
		if($i_payment_method == 1){
			$i_payment_dp = 0;
			$i_payment_tenor = 0;
			$i_payment_margin = 0;
			$i_payment_angsuran = 0;
		}else{
			$i_payment_dp = get_isset($i_payment_dp);
			$i_payment_tenor = get_isset($i_payment_tenor);
			$i_payment_margin = get_isset($i_payment_margin);
			$i_payment_angsuran = get_isset($i_payment_angsuran);
		}
		
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
					'$i_price',
					'$i_payment_dp',
					'$i_payment_tenor',
					'$i_payment_margin',
					'$i_payment_angsuran',
					'',
					''
			";
			
		$data_table = "table_status = '1'";
			
			//echo $data;

			$create_payment = create_payment($data);
			if($i_payment_method == 2){
				create_payment_detail($create_payment, $i_payment_tenor, $i_payment_angsuran);
			}
			update($data_table, $id);
		
			header("Location: master_table.php?page=list&did=4");
		
		
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
		
			header("Location: master_table.php?page=list&did=4");

		

	break;

	case 'edit':

		extract($_POST);

		$id = get_isset($_GET['id']);
		$i_name = get_isset($i_name);
		$i_price = get_isset($i_price);
		$i_tt_id = get_isset($i_tt_id);
		
					$data = " table_name = '$i_name', 
							tt_id = '$i_tt_id',
							table_price = '$i_price'
					";
			
			update($data, $id);
			
			header('Location: master_table.php?page=list&did=2');

		

	break;

	case 'delete':

		$id = get_isset($_GET['id']);	

		delete($id);

		header('Location: master_table.php?page=list&did=3');

	break;
	
	case 'send_email':

		$id = get_isset($_GET['id']);	

			
			require_once "Mail.php";
			$subject = "Test mail PHP";
			  $body = "Test email dengan PHP dan GMAIL !!!";
			  //mail($to, $subject, $body,$headers);
			  //ganti baris ini dengan email yang dituju
			  $to = "candra@elkabumi.com";
			//ganti dengan emailmu /email resmi website
			  $from = "candradwiprasetyo@gmail.com";
			  $host = "ssl://smtp.gmail.com";
			  $port = "465";
			  //emailmu untuk login k gmail
			  $username = "candradwiprasetyo@gmail.com";
			   
			  //passwordmu waktu login gmail
			  $password = "cm3l0n pc";
			 
			$headers = array('From' => $from, 'To' => $to,
			'Subject' => $subject);
			$smtp = Mail::factory('smtp', array('host' => $host,
			 'port' => $port, 'auth' => true,
			 'username' => $username, 'password' => $password));
			 
			  $mail = $smtp -> send($to, $headers, $body);
			 
			if (PEAR::isError($mail)) {
			echo("<p> Email Gagal dikirim" . $mail -> getMessage() . "</p>");
			}else{
			echo "Email berhasil di kirim ";
			}

		

	break;
}

?>