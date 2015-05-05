

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
                                            <label>Angsuran Ke</label>
                                            <input readonly="readonly" required type="text" name="i_buyer_name" class="form-control" placeholder="Masukkan nama pembeli..." value="<?= $row->pd_number ?>"/>
                                        </div>
                                        
                                          <div class="form-group">
                                            <label>Bulan</label>
                                              <?php
                                              $bulan = array('','Januari','Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober',  'November', 'Desember');
											  ?>
                                            <input readonly="readonly" required type="text" name="i_buyer_name" class="form-control" placeholder="Masukkan nama pembeli..." value="<?= $bulan[$row->pd_month]; ?>"/>
                                        </div>
                                        
                                          <div class="form-group">
                                            <label>Tahun</label>
                                            <input readonly="readonly" required type="text" name="i_buyer_name" class="form-control" placeholder="Masukkan nama pembeli..." value="<?= $row->pd_year ?>"/>
                                        </div>
                                        
                                          <div class="form-group">
                                            <label>Jumlah Angsuran</label>
                                            <input readonly="readonly" required type="text" name="i_buyer_name" class="form-control" placeholder="Masukkan nama pembeli..." value="<?= $row->pd_angsuran ?>"/>
                                        </div>
                                       
                                        </div>
                                       
                                        <div style="clear:both;"></div>
                                     
                                </div><!-- /.box-body -->
                                
                                  <div class="box-footer">
                               
                                <input class="btn btn-success" type="submit" value="Save"/>
                             
                                <a href="<?= $close_button?>" class="btn btn-success" >Cancel</a>
                             
                             </div>
                            
                            </div><!-- /.box -->
                       </form>
                        </div><!--/.col (right) -->
                    </div>   <!-- /.row -->
              
                
                