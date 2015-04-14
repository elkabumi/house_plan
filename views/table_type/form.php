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
                                            <label>Tipe Rumah</label>
                                            <input required type="text" name="i_name" class="form-control" placeholder="Masukkan tipe rumah..." value="<?= $row->tt_name ?>"/>
                                        </div>
                                      
                                   		 <div class="form-group">
                                          <label>Blok - Wilayah</label>
                                           <select id="basic" name="i_tb_id" size="1" class="selectpicker show-tick form-control" data-live-search="true" />
                                           <?php
                                           while($r_tb = mysql_fetch_array($query_tb)){
										   ?>
                                             <option value="<?= $r_tb['tb_id'] ?>" <?php if($row->tb_id == $r_tb['tb_id']){ ?> selected="selected"<?php } ?>><?= $r_tb['tb_name']." - ".$r_tb['building_name']?></option>
                                             <?php
										   }
											 ?>
                                           </select>                                    
                                  		</div>
            
                                            <div class="form-group">
                                         <label>Images</label>
                                          <?php
                                        if($id){
											 $gambar = ($row->tt_img) ? $row->tt_img : "img_not_found.png";
										?>
                                        <br />
                                        <img src="<?= "../img/table_type/".$gambar ?>" style="max-width:100%;"/>
                                        <?php
										}
										?>
                                           <input type="file" name="i_img" id="i_img" />
                                        </div>
                                        
                                        
                                    	    <!-- Color Picker -->
                                    <div class="form-group">
                                        <label>Warna</label>                                         
                                        <input required name="i_color" type="text" class="form-control my-colorpicker1" value="<?= $row->tt_color ?>"/>
                                    </div><!-- /.form group -->

                                   

                                        
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