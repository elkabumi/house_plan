     <?php
                if(isset($_GET['did']) && $_GET['did'] == 1){
                ?>
                <section class="content_new">
                   
                <div class="alert alert-info alert-dismissable">
                <i class="fa fa-check"></i>
                <button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>
                <b>Sukses !</b>
              Angsuran tersimpan
                </div>
           
                </section>
                <?php
                }
				?>
<script type="text/javascript">
       		function get_payment(id){
				if(id==2){
					document.getElementById("credit_form").style.display = "inline";
				}else{
					document.getElementById("credit_form").style.display  = "none";
				}
				
				
			}
			
			function get_angsuran(){
				var dp = document.getElementById('i_payment_dp').value;
				var tenor = document.getElementById('i_payment_tenor').value;
				var margin = document.getElementById('i_payment_margin').value;
				var price = document.getElementById('i_price').value;
				
				lama_tenor = 12 * tenor;
				margin_value = margin / 100 * price;
				total_angsuran = parseFloat(price) - parseFloat(dp) + parseFloat(margin_value);
				angsuran = (total_angsuran / lama_tenor);
				
				document.getElementById("i_payment_angsuran").value = angsuran;
				
				
			}
</script>

<!-- Content Header (Page header) -->
        

                <!-- Main content -->
                <section class="content">
                    <div class="row">
                      
                        <!-- right column -->
                        <div class="col-md-12">
                            <!-- general form elements disabled -->

                          
                          <div class="title_page"> <?= $title ?></div>

                             <form action="<?= $action?>" method="post" enctype="multipart/form-data" role="form">

                            <div class="box box-cokelat">
                                
                               
                                <div class="box-body">
                                    
                                    
                                        <div class="col-md-12">

                                           <div class="form-group">
                                            <label>Nama Pembeli</label>
                                            <input readonly="readonly" required type="text" name="i_buyer_name" class="form-control" placeholder="Masukkan nama pembeli..." value="<?= $row_buyer->buyer_name ?>"/>
                                        </div>
                                        
                                        <div class="form-group">
                                            <label>Telepon Pembeli</label>
                                            <input readonly="readonly" required type="text" name="i_buyer_phone" class="form-control" placeholder="Masukkan telepon pembeli..." value="<?= $row_buyer->buyer_phone ?>"/>
                                        </div>

                                        <div class="form-group">
                                            <label>Email Pembeli</label>
                                            <input readonly="readonly" required type="text" name="i_buyer_email" class="form-control" placeholder="Masukkan email pembeli..." value="<?= $row_buyer->buyer_email ?>"/>
                                        </div>
                                        
                                         <div class="form-group">
                                            <label>Alamat Pembeli</label>
                                            <textarea readonly="readonly" name="i_buyer_address" cols="" rows="3" class="form-control"><?= $row_buyer->buyer_address ?></textarea>
                                           
                                        </div>

                                        <div class="form-group">
                                            <label>Alamat Kantor Pembeli</label>
                                            <textarea readonly="readonly" name="i_buyer_office_address" cols="" rows="3" class="form-control"><?= $row_buyer->buyer_office_address ?></textarea>
                                           
                                        </div>
                                        
                                        <div class="form-group">
                                            <label>Nomor Rumah</label>
                                            <input required type="text" name="i_name" class="form-control" placeholder="Masukkan nomor rumah..." value="<?= $row->table_name ?>" readonly/>
                                        </div>
                                      
                                        <div class="form-group">
                                          <label>Tipe / Blok / Wilayah</label>
                                          <input required type="text" name="i_desc" class="form-control" placeholder="Masukkan nomor rumah..." value="<?= $row->tt_name." / ".$row->tb_name." / ".$row->building_name ?>" readonly/>
                                                                           
                                  		</div>
                                        
                                        
            
                                          <div class="form-group">
                                            <label>Harga Rumah</label>
                                            <input required type="text" name="i_price" id="i_price" class="form-control" placeholder="Masukkan harga rumah..." value="<?= $row->table_price ?>" readonly/>
                                        </div>
                                        
                                          <div class="form-group">
                                           <label>Nama Sales</label>
                                            <input required type="text" name="i_sales" id="i_sales" class="form-control" placeholder="Masukkan harga rumah..." value="<?= $row->nama_sales." ( ".$row->telp_sales." )" ?>" readonly/>                              
                                  		</div>
                                        
                                        
                                          <div class="form-group">
                                            <label>Metode Pembayaran</label>
   										<?php
                                        if($row->payment_method==1){ $metode_pembayaran = "Cash"; }else{ $metode_pembayaran = "Credit"; }
										?>
  <input required type="text" name="i_price" id="i_price" class="form-control" placeholder="Masukkan harga rumah..." value="<?= $metode_pembayaran?>" readonly/>
                                           
                                        </div>
                                       
                                       
                                       <div id="credit_form" <?php if($row_buyer->payment_method == 1){ ?>style="display:none"<?php }else{ ?>style="display:inline"<?php } ?>>
                                        <div class="form-group">
                                            <label>DP (Rp)</label>
                                            <input required type="text" name="i_payment_dp" id="i_payment_dp" class="form-control" placeholder="Masukkan dp..." value="<?= $row_buyer->payment_dp ?>" onChange="get_angsuran()" readonly="readonly" />
                                        </div>
                                       
                                       
                                         <div class="form-group">
                                            <label>Tenor (tahun)</label>
   
   <input required type="text" name="i_payment_dp" id="i_payment_dp" class="form-control" placeholder="Masukkan dp..." value="<?= $row_buyer->payment_tenor ?>" readonly="readonly" />
                                        </div>
                                        
                                         <div class="form-group">
                                            <label>Margin (%)</label>
                                            <input required type="text" name="i_payment_margin"  id="i_payment_margin" class="form-control" placeholder="Masukkan margin..." value="<?= $row_buyer->payment_margin ?>" onChange="get_angsuran(this.value)" readonly="readonly" />
                                        </div>
                                        
                                           <div class="form-group">
                                            <label>Angsuran per bulan (Rp)</label>
                                            <input required type="text" name="i_payment_angsuran" id="i_payment_angsuran" class="form-control" placeholder="" value="<?= $row_buyer->payment_angsuran ?>" readonly="readonly"/>
                                        </div>
                                        
                                        
                                         </div>
                                        
                                        
                                           <div class="form-group">
                                            <label>Tanggal</label>
                                            <input required type="text" name="i_payment_date" class="form-control" placeholder="Masukkan nama pembeli..." value="<?= $row_buyer->payment_date ?>" readonly="readonly" />
                                        </div>
                                        
                                        </div>
                                       
                                        <div style="clear:both;"></div>
                                     
                                </div><!-- /.box-body -->
                                
                                  <div class="box-footer">
                                 <?php
                                 if($row->table_status == 0){
								 ?>
                                <input class="btn btn-success" type="submit" value="Save"/>
                                <?php
								 }
								?>
                                <a href="<?= $close_button?>" class="btn btn-success" >Close</a>
                             
                             </div>
                            
                            </div><!-- /.box -->
                       </form>
                        </div><!--/.col (right) -->
                    </div>   <!-- /.row -->
              
                
                