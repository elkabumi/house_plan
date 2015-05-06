
                <?php
                if(isset($_GET['did']) && $_GET['did'] == 1){
                ?>
                <section class="content_new">
                   
                <div class="alert alert-info alert-dismissable">
                <i class="fa fa-check"></i>
                <button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>
                <b>Sukses !</b>
               Upload RAB Berhasil
                </div>
           
                </section>
                <?php
                }
                ?>

                <!-- Main content -->
                <section class="content">
                    <div class="row">
                        <div class="col-xs-12">
                            
                             <div class="title_page"> <?= $title ?></div>
                            
                            <div class="box">
                             
                                <div class="box-body2 table-responsive">
                                    <table id="example1" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                            <th width="5%">No</th>
                                                <th>Blok - Nomor - Tipe - Wilayah</th>
                                                
                                                <th>Harga</th>
                                                <th>Nama Pembeli</th>
                                               <th>Telepon</th>
                                               <th>Alamat</th>
                                                <th>File RAB</th> 
                                                <th>Config</th> 
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                           $no = 1;
										   while($row = mysql_fetch_array($query)){
                                            ?>
                                            <tr>
                                            <td><?= $no?></td>
                                            
                                               <td><?php echo $row['tb_name']?> - <?= $row['table_name']?> - <?php echo $row['tt_name']?> - <?php echo $row['nama_gedung']?></td>
                                             
                                                <td><?php echo tool_format_number($row['table_price']) ?></td>
                                              <td><?= $row['buyer_name'] ?></td>
                                              <td><?= $row['buyer_phone']?></td>
                                              <td><?= $row['buyer_address']?></td>
                                              <td style="text-align:center;">
                                            
                                            <?php
                                            if($row['payment_rab']){
											?>
                                            
                                            <a href="../file/rab/<?= $row['payment_rab']?>"><img src="../img/excel.png" width="50" /></a>
                                            
                                            <?php
											}
											?>

                                                </td> 
                                                <td align="center";>
                                                  <?php
												if($row['payment_rab']){
													$button_name = "Edit";
												}else{
													$button_name = "Upload";
												}
												?>
                                                       <a href="rab.php?page=form_upload&id=<?= $row['payment_id']?>" class="btn btn-default" ><?= $button_name?></a>
                                              
                                                </td>
                                            </tr>
                                            <?php
											$no++;
                                            }
                                            ?>

                                           
                                          
                                        </tbody>
                                         
                                    </table>

                                </div><!-- /.box-body -->
                            </div><!-- /.box -->
                        </div>
                    </div>

                </section><!-- /.content -->