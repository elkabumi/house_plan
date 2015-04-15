<?php

function select(){
	$query = mysql_query("select * from tables order by table_id");
	return $query;
}

function select_table($building_id){
	$q3 = mysql_query("select a.* , c.tb_name, b.tt_color
						from tables a
						join table_types b on b.tt_id = a.tt_id
						join table_blocks c on c.tb_id = b.tb_id
						where c.building_id = '".$building_id."' order by a.table_id");
	return $q3;
}

function save_table_location($id, $data_x, $data_y, $data_top){
		$get_margin = (mysql_fetch_array(mysql_query("select * from tables where table_id = '$id' ")));
		$margin_x=($get_margin['data_x']);
		$margin_y=($get_margin['data_y']);
		
		$data_x = $data_x;// + $margin_x;
		$data_y = $data_y + $data_top;
		
		$data_x = ($data_x < 0) ? 0 : $data_x;
		$data_y = ($data_y < 0) ? 0 : $data_y;
		
		//$data_x = ($data_x > 1264) ? 1264 : $data_x;
		//$data_y = ($data_y > 768) ? 768 : $data_y;
		
		$query = mysql_query("update tables set data_x = '$data_x', data_y ='$data_y' where table_id = '$id'");
		
}

function save_table($data){
		$query = mysql_query("insert into tables values($data)");
		
}

function get_first_building_id(){
	$query = mysql_query("select min(building_id) as result from buildings");
	$row = mysql_fetch_array($query);
	
	$result = ($row['result']) ? $row['result'] : 0 ; 
	return $result;
}

function get_building_name($building_id){
	$query = mysql_query("select building_name as result from buildings where building_id = '$building_id'");
	$row = mysql_fetch_array($query);
	
	$result = ($row['result']);
	return $result;
}
function get_building_img($building_id){
	$query = mysql_query("select building_img as result from buildings where building_id = '$building_id'");
	$row = mysql_fetch_array($query);
	
	$result = ($row['result']);
	return $result;
}

function get_item_kosong($building_id){
	$query = mysql_query("select count(a.table_id) as result  
							from tables a
							join table_types b on b.tt_id = a.tt_id
							join table_blocks c on c.tb_id = b.tb_id
							join buildings d on d.building_id = c.building_id 
							where d.building_id = '$building_id' and a.table_status = '0'");
	$row = mysql_fetch_array($query);
	
	$result = ($row['result']);
	return $result;
}


function get_item_terjual($building_id){
	$query = mysql_query("select count(a.table_id) as result  
							from tables a
							join table_types b on b.tt_id = a.tt_id
							join table_blocks c on c.tb_id = b.tb_id
							join buildings d on d.building_id = c.building_id 
							where d.building_id = '$building_id' and a.table_status = '1'");
	$row = mysql_fetch_array($query);
	
	$result = ($row['result']);
	return $result;
}


function create_config($table, $data){
	mysql_query("insert into $table values(".$data.")");
}



?>