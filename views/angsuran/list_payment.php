

                    <div class="row">
                        <div class="col-xs-12">
                            
                             <div class="title_page"> <?= $title ?></div>
                            
                            <div class="box">
                             
                                <div class="box-body2 table-responsive">
                                    <table id="example1" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                            <th >Angsuran Ke</th>
                                              
                                                
                                                <th>Bulan</th>
                                                <th>Tahun</th>
                                               <th>Angsuran</th>
                                               <th>Status</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                           $no = 1;
										   while($row_angsuran = mysql_fetch_array($query_angsuran)){
                                            ?>
                                            <tr>
                                           
                                              <td><?= $row_angsuran['pd_number'] ?></td>
                                              <?php
                                              $bulan = array('','Januari','Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober',  'November', 'Desember');
											  ?>
                                              <td><?= $bulan[$row_angsuran['pd_month']]?></td>
                                              <td><?= $row_angsuran['pd_year']?></td>
                                              <td><?= tool_format_number($row_angsuran['pd_angsuran']) ?></td>
                                              <td><?= "Lunas" ?></td>
                                            
                                            </tr>
                                            <?php
											$no++;
                                            }
                                            ?>

                                           
                                          
                                        </tbody>
                                             <tfoot>
                                            <tr>
                                                <td colspan="5">
                                                <table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td> <a href="<?= $add_angsuran ?>" class="btn btn-info " >Bayar Angsuran</a></td>
    <td>
    
    </td>
    <td align="right" >
     <div class="col-md-12">
    <div class="form-group">
                                            <label>Jumlah Angsuran terbayar</label>
                                            <input required type="text" name="i_payment_angsuran" id="i_payment_angsuran" class="form-control" placeholder="" value="<?= $get_angsuran_terbayar ?>" readonly="readonly"  style="height:50px; font-size:20px; text-align:right;"/>
                                        </div>
                                        <div class="form-group">
                                            <label>Sisa</label>
                                            <input required type="text" name="i_payment_angsuran" id="i_payment_angsuran" class="form-control" placeholder="" value="<?= $get_angsuran_sisa ?>" readonly="readonly" style="height:50px; font-size:20px; text-align:right;"/>
                                        </div>
                              </div>          
    
    </td>
  </tr>

  
</table>

                                               </td>
                                               
                                            </tr>
                                        </tfoot>
                                    </table>

                                </div><!-- /.box-body -->
                            </div><!-- /.box -->
                        </div>
                    </div>

                </section><!-- /.content -->