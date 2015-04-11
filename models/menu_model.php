<?php

function select(){
	$query = mysql_query("select a.* , b.menu_type_name, c.partner_name
							from menus a
							join menu_types b on b.menu_type_id = a.menu_type_id 
							join partners c on c.partner_id = a.partner_id
							order by menu_id");
	return $query;
}

function select_menu_type(){
	$query = mysql_query("select * from menu_types order by menu_type_id");
	return $query;
}

function select_partner(){
	$query = mysql_query("select * from partners order by partner_id");
	return $query;
}

function read_id($id){
	$query = mysql_query("select *
			from menus 
			where menu_id = '$id'");
	$result = mysql_fetch_object($query);
	return $result;
}


function create($data){
	mysql_query("insert into menus values(".$data.")");
}

function update($data, $id){
	mysql_query("update menus set ".$data." where menu_id = '$id'");
}

function delete($id){
	mysql_query("delete from menus  where menu_id = '$id'");
}
function get_img_old($id){
	$query = mysql_query("select menu_img from menus 
						where menu_id = '".$id."'");
	$result = mysql_fetch_array($query);
	$row = $result['menu_img'];
	return $row;
}

?>