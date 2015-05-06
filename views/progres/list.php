
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
               Simpan pembayaran berhasil
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
                                                 <th>Nama Pembeli</th>
                                               <th>Telepon</th>
                                               <th>Alamat</th>
                                                <th>Progres Terakhir</th>
                                                <th>Foto</th>
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
                                               <td><?= $row['buyer_name'] ?></td>
                                              <td><?= $row['buyer_phone']?></td>
                                              <td><?= $row['buyer_address']?></td>
                                                <td>
                                                <?php
												$get_last_progress = get_last_progress($row['table_id']);
												$get_last_progress_img = get_last_progress_img($row['table_id']);
												$get_last_progress = ($get_last_progress) ? $get_last_progress." %" : "-";
												$get_last_progress_img = ($get_last_progress_img) ? $get_last_progress_img : "";
                                                echo $get_last_progress;
												?>
                                                </td>
                                                	<td><img src="<?php
											   if($get_last_progress_img){
											   		$image = "../img/progres/".$get_last_progress_img;
											   }else{
												   $image = "../img/img_not_found.png";
											    }
											    echo $image ?>" height="80" /></td>
                                              <td style="text-align:center;">
                                              <?php
                                              if($row['table_status']==0){
											  ?>
                                                 <?php
											  }else{
												 ?>
                                                <a href="progres.php?page=form_payment&id=<?= $row['table_id']?>" class="btn btn-default" ><i class="fa fa-search"></i></a>
                                                 <?php
                                                }
                                                 ?>

                                                </td> 
                                            </tr>
                                            <?php
											$no++;
                                            }
                                            ?>

                                           
                                          
                                        </tbody>
                                          <tfoot>
                                            <tr>
                                               
                                            </tr>
                                        </tfoot>
                                    </table>

                                </div><!-- /.box-body -->
                            </div><!-- /.box -->
                        </div>
                    </div>

                </section><!-- /.content -->