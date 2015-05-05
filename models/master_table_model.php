<?php

function select(){
	$query = mysql_query("select a.* , b.tt_name, c.tb_name, d.building_name as nama_gedung
							from tables a
							join table_types b on b.tt_id = a.tt_id
							join table_blocks c on c.tb_id = b.tb_id
							join buildings d on d.building_id = c.building_id
							order by table_id");
	return $query;
}

function select_tt(){
	$query = mysql_query("select a.*, c.tb_name, d.building_name 
						from table_types a 
						join table_blocks c on c.tb_id = a.tb_id
						join buildings d on d.building_id = c.building_id
						order by tt_id");
	return $query;
}

function select_seller(){
	$query = mysql_query("select * from users where user_type_id = '2' order by user_id");
	return $query;
}


function read_id($id){
	$query = mysql_query("select a.*, b.tt_name, c.tb_name, d.building_name
			from tables a
			join table_types b on b.tt_id = a.tt_id
							join table_blocks c on c.tb_id = b.tb_id
							join buildings d on d.building_id = c.building_id
			where a.table_id = '$id'");
	$result = mysql_fetch_object($query);
	return $result;
}

function read_payment_id($id){
	$query = mysql_query("select *
			from payments
			where table_id = '$id'");
	$result = mysql_fetch_object($query);
	return $result;
}


function create($data){
	mysql_query("insert into tables values(".$data.")");
}


function create_payment($data){
	mysql_query("insert into payments values(".$data.")");
}

function update($data, $id){
	mysql_query("update tables set ".$data." where table_id = '$id'");
}

function update_payment($data, $id){
	mysql_query("update payments set ".$data." where table_id = '$id'");
}

function delete($id){
	mysql_query("delete from tables where table_id = '$id'");
}

function get_payment($id){
	$query = mysql_query("select table_id from payments where table_id = '$id'");
	$result = mysql_fetch_array($query);
	return $result['table_id'];
}
?>