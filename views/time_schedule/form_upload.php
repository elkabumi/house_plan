  

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
                                            <label>File</label>
                                            <?php
                                            if($row->payment_time_schedule){
											?>
                                            <br />
											<a href="../file/time_schedule/<?= $row->payment_time_schedule?>"><img src="../img/excel.png" /></a>
											<br />
                                            <br />
											<?php
											}
											?>
                                           <input name="i_file" type="file" />
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
              
                
                