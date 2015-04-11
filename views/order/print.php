<?php
/*
$outprint = "Just the test printer";
$printer = printer_open("58 Printer(1)");
printer_set_option($printer, PRINTER_MODE, "RAW");
printer_start_doc($printer, "Tes Printer");
printer_start_page($printer);
printer_write($printer, $outprint);
printer_end_page($printer);
printer_end_doc($printer);
printer_close($printer);
*/
?>
<style type="text/css">
.frame{
	border:1px solid #000;
	width:10%;
	margin-left:auto;
	margin-right:auto;
	padding:10px;
}
table{
	font-size:12px;
	
}
.header{
	text-align:center;
	font-weight:bold;
	font-size:12px;
	
}
.back_to_order{
	width:30%;
	margin-left:auto;
	margin-right:auto;
	line-height:100px;
	color:#fff;
	font-size:36px;
	font-weight:bold;
	background:#09F;
	text-align:center;
	margin-top:50px;
	border-radius:10px;
}
.back_to_order:hover{
	background:#069;
}
</style>
<body  onload=print()>
<!--<body>-->
<div class="header"><span style=" font-size:16px; ">Kedai Taman <br />Soto Kudus</span><br>
Jl. Gayungsari Timur X No.1 Surabaya<br />
083831059355

</div>
<br />

<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td>Meja 1</td>
   
    <td align="right" >11/03/2015 19:00</td>
  </tr>
</table>
<br />
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td>Soto Kudus</td>
    <td align="right">&nbsp;</td>
  </tr>
  <tr>
    <td>2 x 9.500</td>
    <td align="right">19.000</td>
  </tr>
  <tr>
    <td>Ayam Bakar</td>
    <td align="right">&nbsp;</td>
  </tr>
  <tr>
    <td>2 x 17.000</td>
    <td align="right">34.000</td>
  </tr>
  
</table>
<br />
<table width="100%" border="0" cellspacing="0" cellpadding="0" style="font-size:20px;">
  <tr>
    <td><strong>Total</strong></td>
    <td align="right"><strong>53.000</strong></td>
  </tr>
</table>

<br />
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td align="center">TERIMA KASIH <br />ATAS<br /> KUNJUNGAN ANDA</td>
  </tr>
</table>

<a href="#" style="text-decoration:none;"><div class="back_to_order">BACK TO ORDER</div></a>
</body>