<span class="tooltip-text2 scrollpanel no4 content">
 <?php
  $no_item = 1;
  $total_price = 0;
  $query_item = mysql_query("select a.* ,b.tt_name,b.tt_img, c.tb_name
							from tables a
							join table_types b on b.tt_id = a.tt_id
							join table_blocks c on c.tb_id = b.tb_id
							join buildings d on d.building_id = c.building_id
							  where a.table_id = '".$row['table_id']."'");
 $row_item = mysql_fetch_array($query_item);
  ?>
  <table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="47%">
    <div class="tooltip_left">
     <img src="  <?php
                                                   if($row_item['tt_img']){
                                                        $image = "../img/table_type/".$row_item['tt_img'];
                                                   }else{
                                                       $image = "../img/table_type/img_not_found.png";
                                                    }
                                                    echo $image ?>" class="img_tooltip-item" />
	</div>
    </td>
    </tr>
    <tr>
    <td width="53%" valign="top">
    <div class="tooltip_right">
	<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td class="tooltip_item_name">NO / BLOK</td>
    <td class="tooltip_item_name" align="right">TIPE</td>
  </tr>
  <tr>
    <td class="tooltip_item_name2"><?php echo $row_item['table_name'] ?> / <?php echo $row_item['tb_name']; ?></td>
    <td class="tooltip_item_name2" align="right"><?= $row_item['tt_name'] ?></td>
  </tr>
  
</table>

    </div>
    
   <div class="footer_button">
    	<?php
        if($row['table_status'] == 1){
			
		?>
        <div class="btn_sold">SOLD !</div>
        <?php
		}else{
		?>
    	<div class="btn_edit_item">Rp <?php echo get_rupiah($row['table_price'])?></div>
        <?php
		}
		?>
    </div>
    
  

    </td>
  </tr>
</table>


</span>
