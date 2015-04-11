<!-- Content Header (Page header) -->
        
                 <?php
                if(isset($_GET['did']) && $_GET['did'] == 1){
                ?>
                <section class="content_new">
                   
                <div class="alert alert-info alert-dismissable">
                <i class="fa fa-check"></i>
                <button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>
                <b>Simpan gagal !</b>
               Password dan confirm password tidak sama
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
                                    
                                        <!-- text input -->
                                        
                                      <!-- <div class="form-group">
                                            <label>Code</label>
                                            <input required type="text" name="i_code" class="form-control" placeholder="Enter code ..." value="<?= $row->user_code ?>"/>
                                        </div>-->
                                        <div class="col-md-12">
                                        
                                        <div class="form-group">
                                            <label>Name</label>
                                            <input required type="text" name="i_name" class="form-control" placeholder="Enter name ..." value="<?= $row->user_name ?>"/>
                                        </div>
                                        
                                        <div class="form-group">
                                        <label>Phone</label>
                                        <div class="input-group">
                                        <div class="input-group-addon">
                                        <i class="fa fa-phone"></i>
                                        </div>
                                        <input required class="form-control" type="text" name="i_phone" placeholder="Enter phone ..." value="<?= $row->user_phone?>">
                                        </div>
                                        </div>
                                        <div class="form-group">
                                          <label>Type</label>
                                           <select name="i_type" size="1" class="form-control"/>
                                             <option value="1">Admin</option>
                                           <option value="2">Non Admin</option>       
                                           </select>                                    
                                  		</div>

                                          <div class="form-group">
                                            <label>User login</label>
                                            <input required type="text" name="i_login" class="form-control" placeholder="Enter user login ..." value="<?= $row->user_login ?>"/>
                                        </div>
                                        <div class="form-group">
                                            <label>Password</label>
                                            <input required type="password" name="i_password" class="form-control" placeholder="Enter password ..." value=""/>
                                        </div>
                                        <div class="form-group">
                                            <label>Confirm Password</label>
                                            <input required type="password" name="i_confirm_password" class="form-control" placeholder="Enter confirm password ..." value=""/>
                                        </div>
                                         <div class="form-group">
                                         <label>Images</label>
                                           <input type="file" name="i_img" id="i_img" />
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