<?php
include '../lib/config.php';
include '../lib/function.php';
include '../models/login_model.php';
$page = null;
$page = (isset($_GET['page'])) ? $_GET['page'] : "list";
$title = ucfirst("login");

switch ($page) {
	
	
	case 'form':

			//inisialisasi
			$row = new stdClass();

			$row->user_login = false;
			$row->user_password = false;
			
			$action = "login.php?page=login";
		

		include '../views/login/form.php';
		
	break;

	case 'login':

		extract($_POST);

		$i_login = get_isset($i_login);
		$i_password = get_isset($i_password);
		$i_password = md5($i_password);

		$query = select_login($i_login, $i_password);
		$query_user = select_user($i_login, $i_password);

		if($query > 0 ){
			//login sukses
			$_SESSION['login'] = 1;
			$_SESSION['user_id'] = $query_user->user_id;
			$_SESSION['user_type_id'] = $query_user->user_type_id;
			/*
			if($_SESSION['user_type_id'] == 1 || $_SESSION['user_type_id'] == 3){
				header("Location: transaction.php?page=list");
			}else{
				header('Location: report_detail.php?page=list');
			}*/


			
			header("Location: order.php");
			
			echo $_SESSION['user_type_id'];
			
		}else{
			//login gagal
			header('Location: ../login.php?err=1');
		}

		
		
	break;

}

?>

