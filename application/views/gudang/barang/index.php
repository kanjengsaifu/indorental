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
            <div class="col-12">
                <div class="card-box table-responsive">
                    <div class="m-b-30">
                        &nbsp;&nbsp;&nbsp;&nbsp;
                        <button type="button" class="btn btn-gradient waves-light waves-effect w-md" data-toggle="modal" data-target="#signup-modal">Add +</button>
                    </div>
                    <table id="datatable-buttons" class="table table-striped table-bordered" cellspacing="0" width="100%">
                        <thead>
                        <tr>
                            <th>No</th>
                            <th>Kategori</th>
                            <th>Serial No</th>
                            <th>Nama Barang</th>
                            <th>Spek</th>
                            <th>Kondisi</th>
                            <th>Status</th>
                            <!-- <th>Barcode</th> -->
                            <th>Actions</th>
                        </tr>
                        </thead>
                         <tbody>
                       <?php $no=1; foreach($barang as $b){ ?>
                        <tr>
                            <td><?php echo $no++?></td>
                            <td><?php echo $b['kategori']; ?></td>
                            <td><?php echo $b['serial_no']; ?></td>
                            <td><?php echo $b['nama_barang']; ?></td>
                            <td><?php echo $b['spek']; ?></td>
                            <td><?php echo $b['kondisi']; ?></td>
                            <td><?php echo $b['status']; ?></td>
                            <!-- <td><img style="width: 100px;" src="<?php echo base_url().'assets/barcode/'.$b->barcode;?>"></td> -->
                            <td>
                                <a href="<?php echo site_url('gudang/barang/edit/'.$b['id_barang']); ?>"><i class="dripicons-document-edit"></i></a> &nbsp;
                                <a href="<?php echo site_url('gudang/barang/remove/'.$b['id_barang']); ?>"><i class="dripicons-trash"></i></a>
                            </td>
                        </tr>
                        <?php } ?>
                        
                    </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!-- end row -->

        <div id="signup-modal" class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h5 class="modal-title" id="myLargeModalLabel">Tambah Barang</h5>
                </div>
                <div class="modal-body">
                    <?php echo form_open('gudang/barang/simpan'); ?>

                    <div class="form-group row">
                        <label class="col-2 col-form-label" for="kategori">Kategori</label>
                        <div class="col-10">
                            <select class="form-control select2" name="id_kategori" id="id_kategori" style="width: 100%;" required="">
                                    <?php foreach($all_kategori as $value)   {   ?>
                                    <option value="<?php echo $value['id_kategori']?>"><?php echo $value['kategori']?></option>
                                    <?php } ?>
                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-2 col-form-label" for="example-email">Barang</label>
                        <div class="col-10">
                           <input type="text" class="form-control" required name="nama_barang" value="<?php echo $this->input->post('nama_barang'); ?>" />
                        </div>
                    </div>

                     <div class="form-group row">
                        <label class="col-2 col-form-label" for="example-email">Spesifikasi</label>
                        <div class="col-10">
                            <select class="form-control select2" required="" name="id_spek" id="id_spek" required="" >
                                <?php foreach($all_spek as $row) { ?>
                                <option value="<?php echo $row->id_spek?>" class="<?php echo $row->id_kategori; ?>"> <?php echo $row->spek?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>

                     <div class="form-group row">
                        <label class="col-2 col-form-label" for="example-email">Kondisi</label>
                        <div class="col-10">
                           <select class="form-control" required="" name="kondisi" value="<?php echo $this->input->post('kondisi'); ?>" />
                                <option value="Baik">Baik</option>
                                    <option value="Rusak">Rusak</option>
                            </select>
                        </div>
                    </div>

                     <div class="form-group row">
                        <label class="col-2 col-form-label" for="example-email">Status</label>
                        <div class="col-10">
                            <select class="form-control" required="" name="status" value="<?php echo $this->input->post('status'); ?>" >
                                    <option value="Tersedia">Tersedia</option>
                                    <option value="Keluar">Keluar</option>
                            </select>
                        </div>
                    </div>

                     <div class="form-group row">
                        <label class="col-2 col-form-label" for="example-email">Serial No</label>
                        <div class="col-10">
                           <input type="text" class="form-control" name="serial_no" value="<?php echo $this->input->post('serial_no'); ?>" />
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-2 col-form-label"></label>
                        <div class="col-10">
                           <button class="btn btn-gradient waves-light waves-effect w-md" type="submit">Save</button>
                        </div>
                    </div>
                        <?php echo form_close(); ?>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->

    </div> <!-- container -->
</div> <!-- content -->

<!-- DROPDOWN CHAIN -->
<script src="<?php echo base_url(); ?>assets/assets/js/jquery.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/assets/js/jquery.chained.min.js"></script>
<script type="text/javascript">
     $("#id_spek").chained("#id_kategori"); 
</script>
<script type="text/javascript">load();</script>
<script src="<?php echo base_url();?>assets/assets/js/jquery-1.11.2.min.js"></script>

<!-- WEBCAM BARCOD -->
<script type="text/javascript" src="<?php echo base_url();?>assets/assets/js/filereader.js"></script> 
<script type="text/javascript" src="<?php echo base_url();?>assets/assets/js/qrcodelib.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/assets/js/webcodecamjs.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/assets/js/main.js"></script>

