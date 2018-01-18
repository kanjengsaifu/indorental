<div class="content">
    <div class="container-fluid">

        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <h4 class="page-title float-left">Indorental</h4>

                    <ol class="breadcrumb float-right">
                        <li class="breadcrumb-item"><a href="#">Indorental</a></li>
                        <li class="breadcrumb-item"><a href="#">Invoice</a></li>
                        <li class="breadcrumb-item active">Tambah Data Barang</li>
                    </ol>

                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
        <!-- end row -->

<div class="row">
    <div class="col-12">
        <div class="card-box">
            <!-- <h4 class="m-t-0 header-title"><b>Input Sizes & Group</b></h4> -->
            <br/>
            <div class="p-20">
              <form method="post" action="<?php echo base_url();?>admin/invoice/add_barang" method="post" accept-charset="utf-8">

                    <div class="form-group row">
                        <label class="col-2 col-form-label">Nama Barang</label>
                        <div class="col-6">
                            <input type="text" name="nama_barang" id="nama_barang" class="form-control" placeholder="Nama Barang" readonly="" required="">
                        </div>
                        <span><a href="#data_barang" role="button" class="btn btn-sm green" data-toggle="modal" rel="tooltip" title="Klik untuk pilih Data Barang">  <i class="ace-icon fa fa-search"></i></a></span>
                    </div>

                    <div class="form-group row">
                        <label class="col-2 col-form-label">Jumlah</label>
                        <div class="col-6">
                            <input type="number" name="jumlah" id="jumlah" class="form-control" placeholder="Jumlah" required="" >
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-2 col-form-label">Harga</label>
                        <div class="col-6">
                            <input type="number" name="harga" id="harga" class="form-control" placeholder="Harga" required="" >
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-2 col-form-label">Lama Sewa</label>
                        <div class="col-6">
                            <input type="number" name="lama_sewa" id="lama_sewa" class="form-control" placeholder="Lama Sewa" required="" >
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-2 col-form-label"></label>
                        <div class="col-6">
                            <button type="submit" name="submit" class="btn btn-primary btn-sm">Add</button> | <?php echo anchor('admin/invoice/add_data','Next',array('class'=>'btn btn-success btn-sm'))?>
                        </div>
                    </div>
                          
                    </div>
                </form>

            </div>
        </div> 
    </div> 
</div>

   <div class="row">
        <div class="col-12">
            <div class="card-box">

                <div class="table-rep-plugin">
                    <div class="table-responsive" data-pattern="priority-columns">
                        <table class="table">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Barang</th>
                                        <th>Jumlah</th>
                                        <th>Harga</th>
                                        <th>Lama Sewa</th>
                                        <th>Total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no=1; $total=0; foreach ($detail as $r){ ?>
                                        <tr class="gradeU">
                                            <td><?php echo $no ?></td>
                                            <td><?php echo $r->nama_barang.' - '.anchor('admin/invoice/del_item/'.$r->id_detail,'Hapus',array('style'=>'color:red;')) ?></td>
                                            <td><?php echo $r->jumlah ?></td>
                                            <td>Rp. <?php echo number_format($r->harga,2) ?></td>
                                            <td><?php echo $r->lama_sewa ?></td>
                                            <td>Rp. <?php echo number_format($r->jumlah*$r->harga*$r->lama_sewa,2) ?></td>
                                        </tr>
                                    <?php $total=$total+($r->jumlah*$r->harga);
                                    $no++; } ?>
                                        <tr class="gradeA">
                                            <td></td>
                                            <td colspan="4">T O T A L</td>
                                            <td>Rp. <?php echo number_format($total,2);?></td>
                                        </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> <!-- End row -->

</div>


<div id="data_barang" class="modal fade bs-example-modal-lg" tabindex="-1">
<div class="modal-dialog modal-lg">
    <div class="modal-content">
        <div class="modal-header no-padding">
            <div class="table-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                    <span class="white">&times;</span>
                </button>
                Pilih Data Barang
            </div>
        </div>

        <div class="modal-body no-padding">
            <div id="data-karyawan">

            </div>
            <table class="table table-bordered table-hover" id="datatable">
                <thead>
                    <tr>
                        <th>Pilih</th>
                        <th>Kategori</th>
                        <th>Nama Barang</th>
                        <th>Spesiffikasi</th>
                    </tr>
                </thead>
                    <tbody>
                        <?php foreach($barang as $i=>$data){ ?>
                        <tr>
                            <td>
                                <a role="button" class="green" data-toggle="modal" rel="tooltip" title="Klik untuk pilih Data Konsumen" onclick="setDataBarang('<?php echo $data['nama_barang']; ?>');"><button type="button" class="btn btn-light waves-effect" data-dismiss='modal'><i class="fa fa-plus"></i></button></a>
                            </td>
                            <td><?php echo $data['kategori']; ?></td>
                            <td><?php echo $data['nama_barang']; ?></td>
                            <td><?php echo $data['spek']; ?></td>
                        </tr>
                        <?php } ?>
                </tbody>
            </table>
        </div>

        <div class="modal-footer no-margin-top">
            <button class="btn btn-sm btn-danger pull-left" data-dismiss="modal">
                <i class="ace-icon fa fa-times"></i>
                Close
            </button>
        </div>
    </div><!-- /.modal-content -->
</div><!-- /.modal-dialog -->
</div>

<script >
     function setDataBarang(nama_barang)
     {
        $('#nama_barang').val(nama_barang);
    }

</script>


