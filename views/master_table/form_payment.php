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
                                            <input required type="text" name="i_buyer_name" class="form-control" placeholder="Masukkan nama pembeli..." value="<?= $row_buyer->buyer_name ?>"/>
                                        </div>
                                        
                                        <div class="form-group">
                                            <label>Telepon Pembeli</label>
                                            <input required type="text" name="i_buyer_phone" class="form-control" placeholder="Masukkan telepon pembeli..." value="<?= $row_buyer->buyer_phone ?>"/>
                                        </div>

                                        <div class="form-group">
                                            <label>Email Pembeli</label>
                                            <input required type="text" name="i_buyer_email" class="form-control" placeholder="Masukkan email pembeli..." value="<?= $row_buyer->buyer_email ?>"/>
                                        </div>
                                        
                                         <div class="form-group">
                                            <label>Alamat Pembeli</label>
                                            <textarea name="i_buyer_address" cols="" rows="3" class="form-control"><?= $row_buyer->buyer_address ?></textarea>
                                           
                                        </div>

                                        <div class="form-group">
                                            <label>Alamat Kantor Pembeli</label>
                                            <textarea name="i_buyer_office_address" cols="" rows="3" class="form-control"><?= $row_buyer->buyer_office_address ?></textarea>
                                           
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
                                           <select id="basic" name="i_seller_id" size="1" class="selectpicker show-tick form-control" data-live-search="true" />
                                           <?php
                                           while($r_seller = mysql_fetch_array($query_seller)){
										   ?>
                                             <option value="<?= $r_seller['user_id'] ?>" ><?= $r_seller['user_name']." / ".$r_seller['user_phone']; ?></option>
                                             <?php
										   }
											 ?>
                                           </select>                                    
                                  		</div>
                                        
                                        
                                          <div class="form-group">
                                            <label>Metode Pembayaran</label>
   
  <select name="i_payment_method" id="i_payment_method"  class="selectpicker show-tick form-control" data-live-search="true" onChange="get_payment(this.value)" >
                                     
                                        <option value="1" <?php if($row_buyer->payment_method == 1){ ?> selected="selected"<?php } ?>>Cash</option>
                                        <option value="2" <?php if($row_buyer->payment_method == 2){ ?> selected="selected"<?php } ?>>Credit</option>
                                       
                                        </select>
                                           
                                        </div>
                                       
                                       
                                       <div id="credit_form" <?php if($row_buyer->payment_method == 1){ ?>style="display:none"<?php }else{ ?>style="display:inline"<?php } ?>>
                                        <div class="form-group">
                                            <label>DP (Rp)</label>
                                            <input required type="text" name="i_payment_dp" id="i_payment_dp" class="form-control" placeholder="Masukkan dp..." value="<?= $row_buyer->payment_dp ?>" onChange="get_angsuran()"/>
                                        </div>
                                       
                                       
                                         <div class="form-group">
                                            <label>Tenor (tahun)</label>
   
  <select name="i_payment_tenor" id="i_payment_tenor"  class="selectpicker show-tick form-control" data-live-search="true" onChange="get_angsuran()" >
                                     
                                        <option value="10">10 tahun</option>
                                        <option value="20">20 tahun</option>
                                        <option value="30">30 tahun</option>
                                       
                                        </select>
                                        </div>
                                        
                                         <div class="form-group">
                                            <label>Margin (%)</label>
                                            <input required type="text" name="i_payment_margin"  id="i_payment_margin" class="form-control" placeholder="Masukkan margin..." value="<?= $row_buyer->payment_margin ?>" onChange="get_angsuran(this.value)"/>
                                        </div>
                                        
                                           <div class="form-group">
                                            <label>Angsuran per bulan (Rp)</label>
                                            <input required type="text" name="i_payment_angsuran" id="i_payment_angsuran" class="form-control" placeholder="" value="<?= $row_buyer->payment_angsuran ?>" readonly="readonly"/>
                                        </div>
                                        
                                        
                                         </div>
                                        
                                        
                                           <div class="form-group">
                                            <label>Tanggal</label>
                                            <input required type="text" name="i_payment_date" class="form-control" placeholder="Masukkan nama pembeli..." value="<?= $row_buyer->payment_date ?>"/>
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
                                 <a href="<?= $email_button?>" class="btn btn-success" >Send Email</a>
                                
                                <a href="<?= $close_button?>" class="btn btn-success" >Close</a>
                             
                             </div>
                            
                            </div><!-- /.box -->
                       </form>
                        </div><!--/.col (right) -->
                    </div>   <!-- /.row -->
                </section><!-- /.content -->