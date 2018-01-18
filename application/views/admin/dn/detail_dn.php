    <div class="content">
        <div class="container-fluid">

            <div class="row">
                <div class="col-12">
                    <div class="page-title-box">
                        <h4 class="page-title float-left">Invoice</h4>

                        <ol class="breadcrumb float-right">
                            <li class="breadcrumb-item"><a href="#">Abstack</a></li>
                            <li class="breadcrumb-item"><a href="#">Extras</a></li>
                            <li class="breadcrumb-item active">Invoice</li>
                        </ol>

                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>
            <!-- end row -->

            <div class="row">
                <div class="col-md-12">
                    <div class="card-box">
                        <div class="clearfix">
                            
                            <div class="pull-right">
                            </div>
                        </div>

                        

                        <div class="row">
                            <div class="col-7">
                                <div class="pull-left">
                                    <img src="<?php echo base_url('assets/company/'.$logo);?>" height="50px" width="150px">
                                </div>
                            </div><!-- end col -->
                            <div class="col-4 offset-2">
                                <div class="mt-3 pull-right">
                                    <h6>Alamat Kantor</h6>

                                <address class="line-h-24">
                                    <?php echo $nama_comp; ?><br>
                                    <?php echo $alamat_comp; ?><br>
                                    <?php echo $email_comp; ?><br>
                                    <abbr title="Phone">P:</abbr><?php echo $no_telp_comp; ?>
                                </address>
                                    
                                </div>
                            </div><!-- end col -->
                        </div>
                        <hr>
                        <!-- end row -->

                        <div class="row mt-3">
                            <div class="col-9">
                                <h6>Alamat Kirim</h6>

                                <address class="line-h-24">
                                    <?php echo $perusahaan; ?><br>
                                    <?php echo $alamat; ?><br>
                                    <?php echo $email; ?><br>
                                    <abbr title="Phone">P:</abbr> <?php echo $no_telp; ?>
                                </address>

                            </div>
                            <div class="col-3">
                                <address class="line-h-24">
                                    <strong>Invoice Date: </strong><?php echo $tanggal_invoice; ?><br>
                                    <strong>Invoice ID: </strong><?php echo $no_invoice; ?><br>
                                    <strong>DN Date: </strong><?php echo $tanggal_dn; ?><br>
                                    <strong>DN ID: </strong><?php echo $no_dn; ?><br>
                                </address>
                                <!-- <p class="m-b-10"><strong>Invoice Date: </strong><?php echo $tanggal_invoice; ?></p>
                                <p class="m-b-10"><strong>Invoice ID: </strong>#<?php echo $no_invoice; ?></p> -->
                            </div>
                            
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="table-responsive">
                                    <table class="table mt-4">
                                        <thead>
                                        <tr><th>#</th>
                                            <th>Item</th>
                                            <th>Jumlah</th>
                                            <th>Harga</th>
                                            <th>Lama Sewa</th>
                                            <th>Total</th>
                                        </tr>
                                    </thead>
                                    <?php $total=0; foreach ($detail_table as $a => $data) { ?>
                                        <tbody>
                                            <tr>
                                                <td><?php echo ($a+1); ?></td>
                                                <td><b><?php echo $data['kategori']?></b> <br/> 
                                                    <?php echo $data['nama_barang']?>
                                                </td>
                                                <td><?php echo $data['jumlah'] ?> Unit</td>
                                                <td>Rp. <?php echo number_format ($data['harga'])?></td>
                                                <td><?php echo $data['lama_sewa']?> Hari</td>
                                                <td>Rp. <?php echo number_format($data['lama_sewa']*$data['jumlah']*$data['harga']) ?></td>
                                            </tr>

                                            <?php 
                                            $subtotal = $total+($data['jumlah']*$data['harga']*$data['lama_sewa']);
                                            $ppn = 10/100;
                                            $total = ($subtotal * $ppn) + $subtotal;
                                             } ?>
                                        <tr class="gradeA">
                                            <td></td>
                                            <td colspan="4" align="right"><b>Subtotal :</b></td>
                                            <td>Rp. <?php echo number_format($subtotal);?></td>
                                        </tr>
                                         <tr class="gradeA">
                                            <td></td>
                                            <td colspan="4" align="right"><b>PPN :</b></td>
                                            <td>10% (<?php echo number_format(($subtotal * $ppn))?>)</td>
                                        </tr>
                                         <tr class="gradeA">
                                            <td></td>
                                            <td colspan="4" align="right"><b>Total</b></td>
                                            <td>Rp. <?php echo number_format($total);?></td>
                                        </tr>

                                        </tbody>
                                        <div class="col-6">
                                        <div class="clearfix"></div>
                                        </div>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <div class="clearfix pt-5">
                                    <h6 class="text-muted">Notes:</h6>

                                    <small>
                                        All accounts are to be paid within 7 days from receipt of
                                        invoice. To be paid by cheque or credit card or direct payment
                                        online. If account is not paid within 7 days the credits details
                                        supplied as confirmation of work undertaken will be charged the
                                        agreed quoted fee noted above.
                                    </small>
                                </div>
                                
                            </div>
                           <!--  <div class="col-6">
                                <div class="float-right">
                                    <?php $total=$total+($data['jumlah']*$data['harga']); ?>
                                    <p><b>Sub-total:</b> Rp. <?php echo number_format($total);?></p>
                                    <p><b>PPN :</b> 10%>
                                    <h4>Rp. <?php echo number_format($total,2);?></h4>
                                </div>
                                <div class="clearfix"></div>
                            </div> -->
                        </div>
                        

                        <div class="hidden-print mt-4 mb-4">
                            <div class="text-right">
                                <a href="javascript:window.print()" class="btn btn-primary waves-effect waves-light"><i class="fa fa-print m-r-5"></i> Print</a>
                            </div>
                        </div>
                    </div>

                </div>

            </div>
            <!-- end row -->

        </div> <!-- container -->

    </div> <!-- content -->

