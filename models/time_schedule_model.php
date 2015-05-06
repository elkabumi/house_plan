<?php

function select(){
	$query = mysql_query("select a.* , b.tt_name, c.tb_name, d.building_name as nama_gedung, e.*, f.user_name as nama_sales
							from tables a
							join table_types b on b.tt_id = a.tt_id
							join table_blocks c on c.tb_id = b.tb_id
							join buildings d on d.building_id = c.building_id
							left join payments e on e.table_id = a.table_id
							left join users f on f.user_id = e.seller_id
							where table_status = 1
							order by a.table_id");
	return $query;
}

function read_id($id){
	$query = mysql_query("select payment_time_schedule
			from payments
			where payment_id = '$id'");
	$result = mysql_fetch_object($query);
	return $result;
}


function upload($data, $id){
	mysql_query("update payments set ".$data." where payment_id = '$id'");
}


function get_file_old($id){
	$query = mysql_query("select payment_time_schedule
			from payments
			where payment_id = '$id'");
	$result = mysql_fetch_array($query);
	return $result['payment_time_schedule'];
}


?>