<?php
function get_land_code(){
	$query = mysql_query("select land_code from counters");
	$result = mysql_fetch_array($query);
	$code = ($result['land_code']) ? $result['land_code'] + 1 : 1;
	
	if(strlen($code) == 1){
		$code = "0000".$code;
	}else if(strlen($code) == 2){
		$code = "000".$code;
	}else if(strlen($code) == 3){
		$code = "00".$code;
	}else if(strlen($code) == 4){
		$code = "0".$code;
	}
	
	return "HT".$code;
}
function edit_land_code(){
	mysql_query("update counters set land_code = land_code + 1");
}
function get_land_area($land_id){
	$query = mysql_query("select sum(farmer_land_area) as jumlah from farmer_lands where land_id = '$land_id'");
	$row = mysql_fetch_object($query);
	$result = ($row->jumlah) ? $row->jumlah : 0;
	return $result;
}
function format_rupiah($angka){
  $rupiah=number_format($angka,0,',','.');
  return $rupiah;
}
function get_event_code(){
	$query = mysql_query("select event_code from config");
	$row = mysql_fetch_object($query);
	$result = $row->event_code + 1;
	return $result;
}
function new_date(){
	$new_date = date("Y-m-d H:m:s");
	return $new_date;
}

function get_header($title = ""){
	include '../views/layout/header.php';
}

function get_header2($title = ""){
	include '../views/layout/header2.php';
}

function get_footer($query_find = 0){
	include '../views/layout/footer.php';
}

function get_isset($data){
	$result = (isset($data)) ? $data : null;
	return $result;
}

function format_date($date){
	if($date == "0000-00-00"){
		return "-";
	}else{
		$date = explode("-", $date);
		$new_date = $date[2]."/".$date[1]."/".$date[0];
	
		return $new_date;
	}

}
function get_hour($data){
	$data = explode(" ", $data);
	$hour = $data[1];
	$h = explode(":", $hour);
	$new_hour = $h[0].":".$h[1];
	return $new_hour;
}
function format_back_date($date){

	$date = explode("/", $date);
	$back_date =  $date[2]."-".$date[1]."-".$date[0];

	return $back_date;

}
function format_back_date2($date){

	$date = explode("/", $date);
	if($date[0] < 10){
		$date[0] = '0'.$date[0];
	}

	if($date[1] < 10){
		$date[1] = '0'.$date[1];
	}
	$back_date =  $date[2]."-".$date[0]."-".$date[1];

	return $back_date;

}
function format_back_date3($date){

	$date = explode("-", $date);
	$back_date =  $date[2]."-".$date[1]."-".$date[0];

	return $back_date;

}
function format_back_date4($date){

	$date = explode("-", $date);
	$back_date =  $date[2]."/".$date[1]."/".$date[0];

	return $back_date;

}
function format_back_date_upload($date){

	$date = explode("/", $date);
	$back_date =  $date[2]."-".$date[0]."-".$date[1];

	return $back_date;

}

function cek_type_file($tipe_file){
	   $hasil = 0; //false 
	   $tipe  = $tipe_file;
	   if (($tipe == "application/vnd.openxmlformats-officedocument.spreadsheetml.sheet") or ($tipe == "application/vnd.ms-excel") ) {
		  $hasil = 1; //true
	   }
	   
	   return $hasil;
}
function format_date_xl($date_xl){
	$month=array('Jan'=>'01','Feb'=>'02','Mar'=>'03','Apr'=>'04','May'=>'05','Jun'=>'06','Jul'=>'07','Aug'=>'08','Sep'=>'09','Oct'=>'10','Nov'=>'11','Dec'=>'12');
	$date_xl = explode("-", $date_xl);
	$back_date =  $date_xl[2]."-".$month[$date_xl[1]]."-".$date_xl[0];
	
	return $back_date;
}

function get_user_data(){
	$query_user = mysql_query("select * from users where user_id = '".$_SESSION['user_id']."'");
	$row_user = mysql_fetch_object($query_user);

	$name = ucfirst($row_user->user_name);

	switch($row_user->user_type_id){
		case 1: $type = "Admin"; break;
		case 2: $type = "Sales "; break;
		
	}
	
	$user_img = $row_user->user_img;

	return array($name, $type, $user_img);
}

function create_report($title) {
				$format =			header("Pragma: public");
									header("Expires: 0");
									header("Cache-Control : must-revalidate, post-check=0, pre-check=0");
									header("Content-type: application/force-download");
								    header("Content-type: application/octet-stream");
									header("Content-type: application/download");
								    header("Content-Disposition: attachment; filename=$title.xls");
								    header("Content-transfer-encoding: binary");
									
return $format;
}

function tool_format_number($data){
	$data = number_format($data, 0, ",", '.');
	$data = "<div style='text-align:right'>".$data."</div>";
	return $data;
}
function tool_format_number_report($data){
	$data = number_format($data, 2);
	$data = "<div style='text-align:right; font-size:26px;'>".$data."</div>";
	return $data;
}

function get_house_price($data){
	$data = number_format($data, 2);
	$data = "<div style='text-align:right; font-size:26px;'>".$data."</div>";
	return $data;
}

function format_report($data){
	$data = "<div style='text-align:right; font-size:26px;'>".$data."</div>";
	return $data;
}

function get_rupiah($nilai, $pecahan = 0) { 
	return number_format($nilai, $pecahan, ',', '.'); 
}

function show_message($message, $link){
	?>
    <script type="text/javascript">
    alert("<?= $message ?>");
	window.location = "<?= $link ?>";
    </script>
    <?php
	
}

function get_abjad($data){
	$abjad = array("","a","b","c","d","e","f","g","h","i","j","k","l","m","n","o","p","q","r","s","t","u","v","w","x","y","z");
	return $abjad[$data];
}

function get_abjad_besar($data){
	$abjad = array("","a","b","c","d","e","f","g","h","i","j","k","l","m","n","o","p","q","r","s","t","u","v","w","x","y","z");
	
	return strtoupper($abjad[$data]);
}

function get_urutan($parent_id, $number){
	$query = mysql_query("select count(vps_id) as result from village_profile_structures where vps_parent_id = '$parent_id' and vps_number < '$number'");
	$row = mysql_fetch_array($query);
	
	return $row['result'] + 1;
}

?>