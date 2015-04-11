<?php

function select(){
	$query = mysql_query("select * from tables order by table_id");
	return $query;
}

function save_table_location($id, $data_x, $data_y){
		$get_margin = (mysql_fetch_array(mysql_query("select * from tables where table_id = '$id' ")));
		$margin_x=($get_margin['data_x']);
		$margin_y=($get_margin['data_y']);
		
		$data_x = $data_x + $margin_x;
		$data_y = $data_y + $margin_y;
		
		$data_x = ($data_x < 0) ? 0 : $data_x;
		$data_y = ($data_y < 0) ? 0 : $data_y;
		
		$data_x = ($data_x > 1264) ? 1264 : $data_x;
		$data_y = ($data_y > 768) ? 768 : $data_y;
		
		$query = mysql_query("update tables set data_x = '$data_x', data_y ='$data_y' where table_id = '$id'");
		
}



function save_room($data){
		$query = mysql_query("insert into buildings values($data)");
		
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

function create_config($table, $data){
	mysql_query("insert into $table values(".$data.")");
}

function delete_tmp($table_id){
		$query =  mysql_query("select * 
								from transactions_tmp a
								where a.table_id = '$table_id'
								");
		while($row = mysql_fetch_array($query)){
			
			
			
			mysql_query("delete from transaction_tmp_details where transaction_id = '".$row['transaction_id']."'");
			
		}
		mysql_query("delete from transactions_tmp where table_id = '$table_id'");
}

function get_data_total($table_id){
	 $query = mysql_query("select sum(transaction_detail_total) as total
							  from transactions_tmp a
							  join transaction_tmp_details b on b.transaction_id = a.transaction_id
							  where table_id = '".$table_id."'");
	$row = mysql_fetch_array($query);
	
	return $row['total'];				 
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


function cancel_order($table_id){
		$query =  mysql_query("select * 
								from transactions_tmp a
								where a.table_id = '$table_id'
								");
		while($row = mysql_fetch_array($query)){
			
			mysql_query("delete from transaction_tmp_details where transaction_id = '".$row['transaction_id']."'");
			
		}
		mysql_query("delete from transactions_tmp where table_id = '$table_id'");
}


?>