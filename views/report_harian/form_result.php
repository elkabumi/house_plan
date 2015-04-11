<div class="row">
<?php
$title = array(
		"Jumlah Hari",
		"Jumlah Penjualan",
		"Total Penjualan"
		
		);
$content = array($jumlah_hari, $jumlah_penjualan, "<span style='font-size:20px'>Rp. </span>".$total_penjualan);
for($i=0; $i<=2; $i++){
?>
                        <div class="col-lg-4 col-xs-6">
                            <!-- small box -->
                            <div  style="background-color:#FFF;">
                                     <div class="box box-primary" style="padding:10px;">
                               
                                    <span style="font-size:36px; font-weight:bold;">
                                        <?= $content[$i]?>
                                    </span>
                                    <p>
                                       <?= $title[$i]?>
                                    </p>
                             
                               </div>
                               
                            </div>
                        </div><!-- ./col -->
                        
                        
                      <?php
}
					  ?>
                       
                    </div><!-- /.row -->