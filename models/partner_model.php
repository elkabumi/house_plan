<?php

function select(){
	$query = mysql_query("select a.* 
							from users a	
							where user_type_id  = 2
							order by user_id");
	return $query;
}

function read_id($id){
	$query = mysql_query("select *
			from users
			where user_id = '$id'");
	$result = mysql_fetch_object($query);
	return $result;
}


function create($data){
	mysql_query("insert into users values(".$data.")");
}

function update($data, $id){
	mysql_query("update sellers set ".$data." where seller_id = '$id'");
}

function delete($id){
	mysql_query("delete from sellers where seller_id = '$id'");
}
?>