<?php

function select(){
	$query = mysql_query("select a.* , b.tt_name, c.tb_name, d.building_name as nama_gedung, e.*, f.user_name as nama_sales
							from tables a
							join table_types b on b.tt_id = a.tt_id
							join table_blocks c on c.tb_id = b.tb_id
							join buildings d on d.building_id = c.building_id
							left join payments e on e.table_id = a.table_id
							left join users f on f.user_id = e.seller_id
							where table_status = 1 and payment_method = 2
							
							order by a.table_id");
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

function select_angsuran($table_id){
	$query = mysql_query("select b.* 
							from payments a 
							join payment_details b on b.payment_id = a.payment_id
							where table_id = '$table_id'
							and b.pd_status = '1'
							order by b.pd_number
							");
	return $query;
}

function get_angsuran_terbayar($table_id){
	$query = mysql_query("select sum(pd_angsuran) as jumlah 
							from payments a 
							join payment_details b on b.payment_id = a.payment_id
							where table_id = '$table_id'
							and b.pd_status = '1'
							order by b.pd_number
							");
	$result = mysql_fetch_array($query);
	return $result['jumlah'];
}

function get_angsuran_sisa($table_id){
	$query = mysql_query("select sum(pd_angsuran) as jumlah 
							from payments a 
							join payment_details b on b.payment_id = a.payment_id
							where table_id = '$table_id'
							and b.pd_status = '0'
							order by b.pd_number
							");
	$result = mysql_fetch_array($query);
	return $result['jumlah'];
}

function select_seller(){
	$query = mysql_query("select * from users where user_type_id = '2' order by user_id");
	return $query;
}


function read_id($id){
	$query = mysql_query("select a.*, b.tt_name, c.tb_name, d.building_name, e.*, f.user_name as nama_sales, f.user_phone as telp_sales
			from tables a
			join table_types b on b.tt_id = a.tt_id
							join table_blocks c on c.tb_id = b.tb_id
							join buildings d on d.building_id = c.building_id
							left join payments e on e.table_id = a.table_id
							left join users f on f.user_id = e.seller_id
			where a.table_id = '$id'");
	$result = mysql_fetch_object($query);
	return $result;
}

function read_new_angsuran($id){
	$query = mysql_query("select * from payment_details where pd_id = '$id'
							");
	$result = mysql_fetch_object($query);
	return $result;
}

function get_new_angsuran($id){
	$query = mysql_query("select b.pd_id
							from payments a 
							join payment_details b on b.payment_id = a.payment_id
							where table_id = '$id'
							and b.pd_status = '0'
							order by b.pd_number
							limit 1
							");
	$result = mysql_fetch_array($query);
	return $result['pd_id'];
}


function read_payment_id($id){
	$query = mysql_query("select *
			from payments
			where table_id = '$id'");
	$result = mysql_fetch_object($query);
	return $result;
}

function save_angsuran($data, $id){
	mysql_query("update payment_details set ".$data." where pd_id = '$id'");
}


function get_payment($id){
	$query = mysql_query("select table_id from payments where table_id = '$id'");
	$result = mysql_fetch_array($query);
	return $result['table_id'];
}
?>