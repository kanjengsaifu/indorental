<div class="content">
    <div class="container-fluid">

        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <h4 class="page-title float-left">Indorental</h4>

                    <ol class="breadcrumb float-right">
                        <li class="breadcrumb-item"><a href="#">Indorental</a></li>
                        <li class="breadcrumb-item"><a href="#">Barang</a></li>
                        <li class="breadcrumb-item active">Data Barang</li>
                    </ol>

                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
        <!-- end row -->

<div class="row">
    <div class="col-md-12">
        <div class="card-box">
            <br/>
                <?php echo form_open('admin/pinjam/add', array('class'=>'form-horizontal')); ?>

               <div class="form-group row">
                    <label class="col-2 col-form-label" for="example-email">Nama Barang</label>
                    <div class="col-8">
                        <input type="text" id="nama_barang" name="nama_barang" class="form-control" placeholder="Nama Barang">
                    </div>
                    <span><a href="#data_barang" role="button" class="btn btn-sm green" data-toggle="modal" rel="tooltip" title="Klik untuk pilih Data Barang">  <i class="ace-icon fa fa-search"></i></a></span>
                </div>

                 <div class="form-group row">
                    <label class="col-2 col-form-label" for="example-email">Jumlah</label>
                    <div class="col-8">
                        <input type="text" id="example-email" name="jumlah" class="form-control" placeholder="Jumlah">
                    </div>
                </div>

                 <div class="form-group row">
                    <label class="col-2 col-form-label" for="example-email">Harga</label>
                    <div class="col-8">
                        <input type="text" id="example-email" name="harga" class="form-control" placeholder="Harga">
                    </div>
                </div>

                <button type="submit" name="submit" class="btn btn-primary btn-sm">Add +</button> &nbsp; <?php echo anchor('admin/pinjam/checkout','Next',array('class'=>'btn btn-success btn-sm'))?>
            </form>
        </div>
    </div>
</div>

        <div class="row">
            <div class="col-12">
                <div class="card-box table-responsive">

                    <table id="datatable" class="table table-bordered table-stripped">
                        <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Barang</th>
                            <th>Jumlah</th>
                            <th>Harga</th>
                            <th>Total Harga</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                       <?php $no=1; $total=0; foreach ($detail as $r){ ?>
                        <tr class="gradeU">
                            <td><?php echo $no ?></td>
                            <td><?php echo $r->nama_barang ?></td>
                            <td><?php echo $r->jumlah ?></td>
                            <td>Rp. <?php echo number_format($r->harga,2) ?></td>
                            <td>Rp. <?php echo number_format($r->jumlah*$r->harga,2) ?></td>
                            <td>
                                <a href="<?php anchor('admin/pinjam/remove/'.$r->id_detail,'Hapus',array('style'=>'color:red;')) ?>">Hapus</a>
                            </td>
                        </tr>
                        <?php $total=$total+($r->jumlah*$r->harga);
                        $no++; } ?>
                        <tr class="gradeA">
                            <td colspan="4">T O T A L</td>
                            <td>Rp. <?php echo number_format($total,2);?></td>

                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div> <!-- end row -->

        <!-- MODAL -->
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
                <table class="table table-bordered table-hover" id="tabel-peminjaman">
                    <thead>
                        <tr>
                            <th>Pilih</th>
                            <th>Kategori</th>
                            <th>Nama Barang</th>
                            <th>Spesiffikasi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tbody>
                            <?php foreach($all_barang as $i=>$data){ ?>
                            <tr>
                                <td>
                                    <a role="button" class="green" data-toggle="modal" rel="tooltip" title="Klik untuk pilih Data Konsumen" onclick="setDataBarang('<?php echo $data['nama_barang']; ?>');">  <i class="ace-icon fa fa-check"></i></a>
                                </td>
                                <td><?php echo $data['kategori']; ?></td>
                                <td><?php echo $data['nama_barang']; ?></td>
                                <td><?php echo $data['spek']; ?></td>
                            </tr>
                            <?php } ?>
                        </tbody>
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




