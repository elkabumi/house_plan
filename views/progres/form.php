<!-- Content Header (Page header) -->
        
 <?php
                if(isset($_GET['did']) && $_GET['did'] == 1){
                ?>
                <section class="content_new">
                   
                <div class="alert alert-info alert-dismissable">
                <i class="fa fa-check"></i>
                <button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>
                <b>Sukses !</b>
               Simpan Berhasil
                </div>
           
                </section>
                <?php
                }else if(isset($_GET['did']) && $_GET['did'] == 2){
                ?>
                <section class="content_new">
                   
                <div class="alert alert-info alert-dismissable">
                <i class="fa fa-check"></i>
                <button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>
                <b>Sukses !</b>
               Edit Berhasil
                </div>
           
                </section>
                <?php
                }else if(isset($_GET['did']) && $_GET['did'] == 3){
                ?>
                <section class="content_new">
                   
                <div class="alert alert-info alert-dismissable">
                <i class="fa fa-check"></i>
                <button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>
                <b>Sukses !</b>
               Delete Berhasil
                </div>
           
                </section>
                <?php
                } else if(isset($_GET['did']) && $_GET['did'] == 4){
                ?>
                <section class="content_new">
                   
                <div class="alert alert-info alert-dismissable">
                <i class="fa fa-check"></i>
                <button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>
                <b>Sukses !</b>
               Send Email berhasil
                </div>
           
                </section>
                <?php
                }else if(isset($_GET['err']) && $_GET['err'] == 1){
                ?>
                <section class="content_new">
                   
                <div class="alert alert-info alert-dismissable">
                <i class="fa fa-check"></i>
                <button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>
                <b>Gagal !</b>
               Send Email gagal
                </div>
           
                </section>
                <?php
                }
                ?>
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
                                
                                <a href="<?= $email_button?>" class="btn btn-success" >Send Email</a>
                                <a href="<?= $close_button?>" class="btn btn-success" >Close</a>
                             
                             </div>
                            
                            </div><!-- /.box -->
                       </form>
                        </div><!--/.col (right) -->
                    </div>   <!-- /.row -->
                   
                   
                     <?php
              if(isset($_GET['id'])){
			  ?>
                    <div class="row">
                        <div class="col-md-12">
                             <div class="title_page">Progress</div>
                            
                            <div class="box">
                             
                                <div class="box-body2 table-responsive">
                                    <table id="example1" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                            	<th width="5%">No</th>
                                                <th>Tanggal</th>
                                                <th>Progres</th>
                                                <th>Gambar</th>
                                              	<th>Config</th> 
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $q_progres = select_progres($id);
											$no_progres = 1;
                                            while($r_progres = mysql_fetch_array($q_progres)){
                                            ?>
                                            <tr>
                                            	<td><?= $no_progres?></td>
                                                <td><?= format_date($r_progres['table_progres_date'])?></td>
                                                <td><?= $r_progres['progres_persen']." %"?></td>
                                              	<td><img src="<?php
											   if($r_progres['table_progres_img']){
											   		$image = "../img/progres/".$r_progres['table_progres_img'];
											   }else{
												   $image = "../img/img_not_found.png";
											    }
											    echo $image ?>" height="80" /></td>
                                                 <td style="text-align:center;">

                                                    <a href="progres.php?page=form_progres&p_id=<?= $r_progres['table_progres_id']?>&id=<?= $_GET['id']?>" class="btn btn-default" ><i class="fa fa-pencil"></i></a>
                                                    <a href="javascript:void(0)" onclick="confirm_delete(<?= $r_progres['table_progres_id']; ?>,'progres.php?page=delete_progres&id=<?= $_GET['id'] ?>&p_id=')" class="btn btn-default" ><i class="fa fa-trash-o"></i></a>

                                                </td> 
                                            </tr>
                                            <?php
											$no_progres++;
                                            }
                                            ?>

                                           
                                          
                                        </tbody>
                                          <tfoot>
                                            <tr>
                                                <td colspan="5"><a href="progres.php?page=form_progres&id=<?= $_GET['id']?>" class="btn btn-success " >Add</a></td>
                                               
                                            </tr>
                                        </tfoot>
                                    </table>

                                </div><!-- /.box-body -->
                            </div><!-- /.box -->
                        </div>
                    </div>
                    <?php
			  }
					?>
                </section><!-- /.content -->