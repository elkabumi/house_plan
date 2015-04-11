<?php

function select(){
	$query = mysql_query("select a.* , b.building_name
							from table_blocks a
							join buildings b on b.building_id = a.building_id
							order by tb_id");
	return $query;
}

function select_building(){
	$query = mysql_query("select a.* 
							from buildings a
							order by building_id");
	return $query;
}

function read_id($id){
	$query = mysql_query("select *
			from table_blocks
			where tb_id = '$id'");
	$result = mysql_fetch_object($query);
	return $result;
}


function create($data){
	mysql_query("insert into table_blocks values(".$data.")");
}

function update($data, $id){
	mysql_query("update table_blocks set ".$data." where tb_id = '$id'");
}

function delete($id){
	mysql_query("delete from table_blocks where tb_id = '$id'");
}
?>