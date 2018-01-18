<div class="content">
    <div class="container-fluid">

        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <h4 class="page-title float-left">Indorental</h4>

                    <ol class="breadcrumb float-right">
                        <li class="breadcrumb-item"><a href="#">Indorental</a></li>
                        <li class="breadcrumb-item"><a href="#">Spesifikasi</a></li>
                        <li class="breadcrumb-item active">Data Spesifikasi</li>
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
                        &nbsp;&nbsp;&nbsp;&nbsp;<button type="button" class="btn btn-gradient waves-light waves-effect w-md" data-toggle="modal" data-target="#signup-modal">Add +</button>
                    </div>
                    <table id="datatable-buttons" class="table table-striped table-bordered" cellspacing="0" width="100%">
                        <thead>
                        <tr>
                            <th>No</th>
                            <th>Kategori</th>
                            <th>Spesifikasi</th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                         <tbody>
                        <?php $no=1; foreach($spek as $s){ ?>
                        <tr>
                            <td><?php echo $no++ ?></td>
                            <td><?php echo $s['kategori']; ?></td>
                            <td><?php echo $s['spek']; ?></td>
                            <td>
                                <a href="<?php echo site_url('admin/spek/edit/'.$s['id_spek']); ?>"><i class="dripicons-document-edit"></i></a> &nbsp;
                                <a href="<?php echo site_url('admin/spek/remove/'.$s['id_spek']); ?>"><i class="dripicons-trash"></i></a>
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

                        <?php echo form_open('admin/spek/add'); ?>

                            <div>
                                <span class="text-danger">*</span>Kategori : 
                                <select name="id_kategori" class="form-control">
                                    <option value="">select kategori</option>
                                    <?php 
                                    foreach($all_kategori as $kategori)
                                    {
                                        $selected = ($kategori['id_kategori'] == $this->input->post('id_kategori')) ? ' selected="selected"' : "";

                                        echo '<option value="'.$kategori['id_kategori'].'" '.$selected.'>'.$kategori['kategori'].'</option>';
                                    } 
                                    ?>
                                </select>
                                <span class="text-danger"><?php echo form_error('id_kategori');?></span>
                            </div>
                            <div>
                                <span class="text-danger">*</span>Spek : 
                                <input type="text" class="form-control" name="spek" value="<?php echo $this->input->post('spek'); ?>" />
                                <span class="text-danger"><?php echo form_error('spek');?></span>
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

