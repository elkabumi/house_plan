<?php

function select(){
	$query = mysql_query("select a.* , b.tt_name, c.tb_name, d.building_name as nama_gedung,(SELECT progres_persen
							FROM table_progres z
							JOIN TABLES y ON y.table_id = z.table_id
							JOIN progress x ON x.progres_id = z.progres_id
							WHERE z.table_id = a.table_id
							ORDER BY progres_persen DESC
							LIMIT 1) as progres
							from tables a
							join table_types b on b.tt_id = a.tt_id
							join table_blocks c on c.tb_id = b.tb_id
							join buildings d on d.building_id = c.building_id
							where a.table_status = 1
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

function read_progres(){
	$query = mysql_query("select * from progress order by progres_id");
	return $query;
}

function select_progres($id){
	$query = mysql_query("select a.*,b.* from table_progres a
						join progress b on b.progres_id = a.progres_id
						where table_id = $id");
	return $query;
}

function select_progres_id($id){
	$query = mysql_query("select * from table_progres where table_progres_id = $id");
	$result = mysql_fetch_object($query);
	return $result;
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

function create_progres($data){
	mysql_query("insert into table_progres values(".$data.")");
}

function update($data, $id){
	mysql_query("update tables set ".$data." where table_id = '$id'");
}

function update_progres($data, $id){
	mysql_query("update table_progres set ".$data." where table_progres_id = '$id'");
	//echo $a;
	
}

function update_payment($data, $id){
	mysql_query("update payments set ".$data." where table_id = '$id'");
}

function delete($id){
	mysql_query("delete from tables where table_id = '$id'");
}

function delete_progres($id){
	mysql_query("delete from table_progres where table_progres_id= '$id'");
}


function get_payment($id){
	$query = mysql_query("select table_id from payments where table_id = '$id'");
	$result = mysql_fetch_array($query);
	return $result['table_id'];
}

function get_img_old($id){
	$query = mysql_query("select table_progres_img
			from table_progres
			where table_progres_id = '$id'");
	$result = mysql_fetch_array($query);
	return $result['table_progres_img'];
}
?>