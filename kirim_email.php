<?php

 include 'lib/config.php';
 include 'lib/function.php';
 
 	$id = 43;

    $myquery="select a.*, b.progres_persen 
				from table_progres a
				join progress b on b.progres_id = a.progres_id
				where a.table_id = '$id'
				";
    $daftarprogres = mysql_query($myquery) or die (mysql_error());
	
	$query = mysql_query("select a.*, b.tt_name, c.tb_name, d.building_name, e.*, f.user_name as nama_sales, f.user_phone as telp_sales
			from tables a
			join table_types b on b.tt_id = a.tt_id
							join table_blocks c on c.tb_id = b.tb_id
							join buildings d on d.building_id = c.building_id
							left join payments e on e.table_id = a.table_id
							left join users f on f.user_id = e.seller_id
			where a.table_id = '$id'");
	$row = mysql_fetch_array($query);
	
    $laporan = "Halo Sdr ".$row['buyer_name'].",<br><br>";
	$laporan .= "Berikut kami laporkan progres pembangunan rumah Anda<br><br>";
	$laporan .= "Perumahan : ".$row['building_name']."<br>";
	$laporan .= "Blok :".$row['tb_name']."<br>";
	$laporan .= "Nomor :".$row['table_name']."<br>";
	$laporan .= "Tipe :".$row['tt_name']."<br><br>";
    $laporan .="<table width=\"100%\" border=\"1\" align=\"center\" cellpadding=\"3\" cellspacing=\"0\" style='border:1px solid #ccc;'>";
    $laporan .="<tr style='background-color:#FF0; height:40px; font-weight:bold;'>";
    $laporan .="<td>Tanggal</td>
				<td>Progress</td>
				<td>Foto</td>
				<td>Keterangan</td>
				";
    $laporan .="</tr>";
    while($dataku=mysql_fetch_object($daftarprogres))
    {
        $laporan .="<tr>";
        $laporan .="<td>";
		$laporan .= format_date($dataku->table_progres_date); 
		$laporan .= "</td>
					<td>$dataku->progres_persen %</td>
					<td><img src='../img/progres/$dataku->table_progres_img' width='100' /></td>
					<td>$dataku->table_progres_dercription</td>";
        $laporan .="</tr>";
    }
    $laporan .="</table><br><br>";
	$laporan .= "Terima kasih<br><br>";
	$laporan .= "<b>Candra Dwi Prasetyo</b>";
    require_once("lib/PHPMailer-master/class.phpmailer.php");
    $sendmail = new PHPMailer();
    $sendmail->setFrom('house_plan@it-addict.net','Candra Dwi Prasetyo'); //email pengirim
    $sendmail->addReplyTo('house_plan@it-addict.net','Candra Dwi Prasetyo'); //email replay
    $sendmail->addAddress('candra@elkabumi.com','Nama Tujuan'); //email tujuan
    $sendmail->Subject = 'Progress Pembangunan'; //subjek email
    $sendmail->Body=$laporan; //isi pesan dalam format laporan
    $sendmail->isHTML(true);
    if(!$sendmail->Send()) 
    {
        echo "Email gagal dikirim : " . $sendmail->ErrorInfo;  
    } 
    else
    { 
        echo "Email berhasil terkirim!";  
    }
?>