<?php

function select(){
	$query = mysql_query("select a.* , b.tb_name, c.building_name
							from table_types a
							join table_blocks b on b.tb_id = a.tb_id
							join buildings c on c.building_id = b.building_id
							order by tt_id");
	return $query;
}

function select_table_block(){
	$query = mysql_query("select a.* , b.building_name
							from table_blocks a
							join buildings b on b.building_id = a.building_id
							order by building_id");
	return $query;
}

function read_id($id){
	$query = mysql_query("select *
			from table_types
			where tt_id = '$id'");
	$result = mysql_fetch_object($query);
	return $result;
}

function get_img_old($id){
	$query = mysql_query("select tt_img
			from table_types
			where tt_id = '$id'");
	$result = mysql_fetch_array($query);
	return $result['tt_img'];
}


function create($data){
	mysql_query("insert into table_types values(".$data.")");
}

function update($data, $id){
	mysql_query("update table_types set ".$data." where tt_id = '$id'");
}

function delete($id){
	mysql_query("delete from table_types where tt_id = '$id'");
}
?>