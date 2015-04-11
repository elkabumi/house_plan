              
                    <div class="row">
                        <div class="col-xs-12">
                            
                            
                            <div class="box">
                             
                              <div class="box-body2 table-responsive">
                              <div class="box-header" style="cursor: move;">
<h3 class="box-title"><strong>Menu Partner</strong></h3>
</div>
                                    <table id="example1" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                            <th width="5%">No</th>
                                                <th>Nama Partner</th>
                                                <th>Qty</th>
                                                <th>Total Margin</th>
                                                
                                            </tr>
                                        </thead>
                                        <tbody>
                                                 <?php
                                           $no_partner = 1;
										   $grand_total_partner = 0;
                                            while($row_partner = mysql_fetch_array($query_partner)){
												
												//$total_partner = $jumlah * $row_partner['menu_price'];
                                       ?>
                                            <tr>
                                            <td><?= $no_partner	 ?></td>
												<td><?= $row_partner['partner_name']; ?></td>
                                                <td><?= tool_format_number($row_partner['jumlah_qty']); ?></td>
                                                 <td><?= tool_format_number($row_partner['jumlah_margin']); ?></td>
                                               
                                             
                                                 </tr>
                                        

                                              <?php
											  $grand_total_partner = $grand_total_partner + $row_partner['jumlah_margin'];
											$no_partner++;
                                            }
                                            ?>
                                            </tbody>
                                            <tfoot>
											<tr>
                                            
                                                 <td colspan="3" align="right"  style="font-size:22px; font-weight:bold;">TOTAL</td>
                                                <td><?= tool_format_number_report($grand_total_partner)?></td>
                                             
                                              </tr>
                                          </tfoot>
                                        
                                         
                                    </table>

                                </div><!-- /.box-body -->
                            </div><!-- /.box -->
                        </div>
                    </div>
                  

                