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
                                            <label>Nomor Rumah</label>
                                            <input required type="text" name="i_name" class="form-control" placeholder="Masukkan nomor rumah..." value="<?= $row->table_name ?>" readonly/>
                                        </div>
                                      
                                        <div class="form-group">
                                          <label>Tipe / Blok / Wilayah</label>
                                          <input required type="text" name="i_desc" class="form-control" placeholder="Masukkan nomor rumah..." value="<?= $row->tt_name." / ".$row->tb_name." / ".$row->building_name ?>" readonly/>
                                                                           
                                  		</div>
                                        
                                        
            
                                          <div class="form-group">
                                            <label>Harga Rumah</label>
                                            <input required type="text" name="i_price" class="form-control" placeholder="Masukkan harga rumah..." value="<?= $row->table_price ?>" readonly/>
                                        </div>
                                        
                                          <div class="form-group">
                                          <label>Nama Sales</label>
                                           <select id="basic" name="i_seller_id" size="1" class="selectpicker show-tick form-control" data-live-search="true" />
                                           <?php
                                           while($r_seller = mysql_fetch_array($query_seller)){
										   ?>
                                             <option value="<?= $r_seller['seller_id'] ?>" ><?= $r_seller['seller_name']." / ".$r_seller['seller_address']; ?></option>
                                             <?php
										   }
											 ?>
                                           </select>                                    
                                  		</div>
                                        
                                        
                                          <div class="form-group">
                                            <label>Metode Pembayaran</label><br />
                                            <table width="100%" border="0" cellspacing="0" cellpadding="4">
  <tr>
    <td><input type="radio" name="i_payment_method" class="minimal" value="1" required  <?php if($row_buyer->payment_method == 1){ echo "checked='checked'"; } ?> /> Cash</td>
  </tr>
  <tr>
    <td><input type="radio" name="i_payment_method" class="minimal" value="2" required   <?php if($row_buyer->payment_method == 2){ echo "checked='checked'"; } ?> /> Kredit</td>
  </tr>
  <tr>
    <td> <input type="radio" name="i_payment_method" class="minimal" value="3"  required   <?php if($row_buyer->payment_method == 3){ echo "checked='checked'"; } ?> /> Kredit Bank</td>
  </tr>
</table>

                                           
                                        </div>
                                       
                                        <div class="form-group">
                                            <label>DP</label>
                                            <input required type="text" name="i_payment_dp" class="form-control" placeholder="Masukkan dp..." value="<?= $row_buyer->payment_dp ?>"/>
                                        </div>
                                        
                                        <div class="form-group">
                                            <label>Nama Pembeli</label>
                                            <input required type="text" name="i_buyer_name" class="form-control" placeholder="Masukkan nama pembeli..." value="<?= $row_buyer->buyer_name ?>"/>
                                        </div>
                                        
                                        <div class="form-group">
                                            <label>Telepon Pembeli</label>
                                            <input required type="text" name="i_buyer_phone" class="form-control" placeholder="Masukkan telepon pembeli..." value="<?= $row_buyer->buyer_phone ?>"/>
                                        </div>
                                        
                                         <div class="form-group">
                                            <label>Alamat Pembeli</label>
                                            <textarea name="i_buyer_address" cols="" rows="3" class="form-control"><?= $row_buyer->buyer_address ?></textarea>
                                           
                                        </div>
                                        
                                        
                                           <div class="form-group">
                                            <label>Tanggal</label>
                                            <input required type="text" name="i_payment_date" class="form-control" placeholder="Masukkan nama pembeli..." value="<?= $row_buyer->payment_date ?>"/>
                                        </div>
                                        
                                        </div>
                                       
                                        <div style="clear:both;"></div>
                                     
                                </div><!-- /.box-body -->
                                
                                  <div class="box-footer">
                                 
                                <input class="btn btn-success" type="submit" value="Save"/>
                                
                                <a href="<?= $close_button?>" class="btn btn-success" >Close</a>
                             
                             </div>
                            
                            </div><!-- /.box -->
                       </form>
                        </div><!--/.col (right) -->
                    </div>   <!-- /.row -->
                </section><!-- /.content -->