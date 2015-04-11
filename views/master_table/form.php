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
                                            <input required type="text" name="i_name" class="form-control" placeholder="Masukkan nomor rumah..." value="<?= $row->table_name ?>"/>
                                        </div>
                                      
                                        <div class="form-group">
                                          <label>Tipe - Blok - Wilayah</label>
                                           <select id="basic" name="i_tt_id" size="1" class="selectpicker show-tick form-control" data-live-search="true" />
                                           <?php
                                           while($r_tt = mysql_fetch_array($query_tt)){
										   ?>
                                             <option value="<?= $r_tt['tt_id'] ?>" <?php if($row->tt_id == $r_tt['tt_id']){ ?> selected="selected"<?php } ?>><?= $r_tt['tt_name']." - ".$r_tt['tb_name']." - ".$r_tt['building_name'] ?></option>
                                             <?php
										   }
											 ?>
                                           </select>                                    
                                  		</div>
            
                                          <div class="form-group">
                                            <label>Harga Rumah</label>
                                            <input required type="text" name="i_price" class="form-control" placeholder="Masukkan harga rumah..." value="<?= $row->table_price ?>"/>
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