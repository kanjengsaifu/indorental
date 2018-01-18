<div class="content">
    <div class="container-fluid">

        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <h4 class="page-title float-left">Indorental</h4>

                    <ol class="breadcrumb float-right">
                        <li class="breadcrumb-item"><a href="#">Indorental</a></li>
                        <li class="breadcrumb-item"><a href="#">Kategori</a></li>
                        <li class="breadcrumb-item active">Data Kategori</li>
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
                        &nbsp;&nbsp;&nbsp;&nbsp;<a href="<?php echo base_url('admin/pinjam/add');?>"><button type="button" class="btn btn-outline-primary waves-light waves-effect w-md">ADD +</button></a>
                    </div>
                    <table id="datatable-buttons" class="table table-striped table-bordered" cellspacing="0" width="100%">
                        <thead>
                        <tr>
                            <th>No PO</th>
                            <th>Konsumen</th>
                            <th>Tanggal PO</th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                         <tbody>
                       <?php foreach($pinjam as $p){ ?>
                        <tr>
                            <td><?php echo $p['no_po']; ?></td>
                            <td><?php echo $p['id_konsumen']; ?></td>
                            <td><?php echo $p['tanggal_po']; ?></td>
                            <td>
                                <a href="<?php echo site_url('pinjam/edit/'.$p['no_po']); ?>">View</a> | 
                                <a href="<?php echo site_url('pinjam/edit/'.$p['no_po']); ?>">Edit</a> | 
                                <a href="<?php echo site_url('pinjam/remove/'.$p['no_po']); ?>">Delete</a>
                            </td>
                        </tr>
                        <?php } ?>
                    </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!-- end row -->

        <div id="signup-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="custom-width-modalLabel" aria-hidden="true" style="display: none;">
            <div class="modal-dialog">
                <div class="modal-content">

                    <div class="modal-body">
                        <h2 class="text-uppercase text-center m-b-30">
                            <a href="index.html" class="text-success">
                                <span><img src="assets/images/logo_dark.png" alt="" height="20"></span>
                            </a>
                        </h2>

                       <?php echo form_open('admin/kategori/add'); ?>

                            <div>
                                <span class="text-danger">*</span>Kategori : 
                                <input type="text" class="form-control" name="kategori" value="<?php echo $this->input->post('kategori'); ?>" />
                                <span class="text-danger"><?php echo form_error('kategori');?></span>
                            </div>
                            <br/>
                            <button type="submit">Save</button>

                        <?php echo form_close(); ?>


                    </div>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->

    </div> <!-- container -->

</div> <!-- content -->

