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
	
	case 'save_payment':
		
		$i_payment = $_POST['i_payment'];
		$i_change = $_POST['i_change'];
	
		$table_id = $_GET['table_id'];
		$building_id = $_GET['building_id'];
		
		$data_total = get_data_total($table_id);
		
		
		if($i_payment < $data_total){
			header("location: payment.php?table_id=$table_id&building_id=$building_id&err=1");
		}else{
		
		$query =  mysql_query("select * 
								from transactions_tmp a
								where a.table_id = '$table_id'
								");
		while($row = mysql_fetch_array($query)){
			$data = "'',
					'$table_id',
					'".$row['transaction_date']."', 
					'".$data_total."',
					'".$i_payment."',
					'".$i_change."'
			";
			create_config("transactions", $data);
			$transaction_id = mysql_insert_id();
			
			$query_detail =  mysql_query("select * 
								from transaction_tmp_details a
								where a.transaction_id = '".$row['transaction_id']."'
								");
			while($row_detail = mysql_fetch_array($query_detail)){
				$data_detail = "'',
									'$transaction_id',
									'".$row_detail['menu_id']."',
									'".$row_detail['transaction_detail_original_price']."',
									'".$row_detail['transaction_detail_margin_price']."',
									'".$row_detail['transaction_detail_price']."',
									'".$row_detail['transaction_detail_qty']."',
									'".$row_detail['transaction_detail_total']."'
									";
					create_config("transaction_details", $data_detail);
			}
			
			delete_tmp($table_id);
			
		}
		
		//include '../views/order/print.php';
		
		header("location: print.php?transaction_id=$transaction_id");
		}
		
		
	break;
	
	case 'cancel_order':
		$table_id = $_GET['table_id'];
		$building_id = $_GET['building_id'];
		
		
		cancel_order($table_id);
		header("location: order.php?building_id=$building_id");
	break;
	
	
}

?>