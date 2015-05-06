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
                                        <label>Tanggal</label>
                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                <i class="fa fa-calendar"></i>
                                            </div>
                                            <input readonly required type="hidden" name="i_progres_id" class="form-control" placeholder="Masukkan nama pembeli..." value="<?= $row->table_progres_id ?>"/>
                                            <input type="text" required class="form-control pull-right" id="date_picker1" name="i_progres_date" value="<?= format_date($row->table_progres_date) ?>"/>
                                           
                                        </div><!-- /.input group -->
                                    </div><!-- /.form group -->
                                        <div class="form-group">
                                          <label>Persentasi Progres</label>
                                           <select id="basic" name="i_progres_id" size="1" class="selectpicker show-tick form-control" data-live-search="true" />
                                           <?php
                                           while($r_progres = mysql_fetch_array($query_progres)){
										   ?>
                                             <option value="<?= $r_progres['progres_id'] ?>"<?php if( $row->progres_id == $r_progres['progres_id']){ ?> selected="selected"<?php } ?> ><?= $r_progres['progres_persen'] ?></option>
                                             <?php
										   }
											 ?>
                                           </select>                                    
                                  		</div>
                                      
            							 <div class="form-group">
                                         <label>Gambar</label>
                                          <?php
                                        if($id){
											 $gambar = ($row->table_progres_img) ? $row->table_progres_img : "img_not_found.png";
										?>
                                        <br />
                                        <img src="<?= "../img/progres/".$gambar ?>" style="max-width:100%;"/>
                                        <?php
										}
										?>
                                           <input type="file" name="i_img" id="i_img" />
                                        </div>
                                        
                                         <div class="form-group">
                                            <label>Keterangan</label>
                                            <textarea  name="i_description" cols="" rows="3" class="form-control"><?= $row->table_progres_dercription ?></textarea>
                                           
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