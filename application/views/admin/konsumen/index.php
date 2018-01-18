<div class="content">
    <div class="container-fluid">

        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <h4 class="page-title float-left">Indorental</h4>

                    <ol class="breadcrumb float-right">
                        <li class="breadcrumb-item"><a href="#">Indorental</a></li>
                        <li class="breadcrumb-item"><a href="#">Konsumen</a></li>
                        <li class="breadcrumb-item active">Data Konsumen</li>
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
                            <th>Nama Konsumen</th>
                            <th>Perusahaan</th>
                            <th>No Telephone</th>
                            <th>Email</th>
                            <th>Alamat</th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                         <tbody>
                       <?php foreach($konsumen as $k){ ?>
                        <tr>
                            <td><?php echo $k['konsumen']; ?></td>
                            <td><?php echo $k['perusahaan']; ?></td>
                            <td><?php echo $k['no_telp']; ?></td>
                            <td><?php echo $k['email']; ?></td>
                            <td><?php echo $k['alamat']; ?></td>
                            <td>
                                <a href="<?php echo site_url('admin/konsumen/edit/'.$k['id_konsumen']); ?>"<i class="dripicons-document-edit"></i></a> &nbsp; 
                                <a href="<?php echo site_url('admin/konsumen/remove/'.$k['id_konsumen']); ?>"><i class="dripicons-trash"></i></a>
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
                    <h5 class="modal-title" id="myLargeModalLabel">Tambah Konsumen</h5>
                </div>
                <div class="modal-body">
                       <form action="<?php echo base_url('admin/konsumen/save') ?>" method="post" enctype="multipart/form-data" />

                        <div class="form-group row">
                            <label class="col-2 col-form-label" for="example-email">Konsumen</label>
                            <div class="col-10">
                               <input type="text" class="form-control" required name="konsumen" value="<?php echo $this->input->post('konsumen'); ?>" />
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-2 col-form-label" for="example-email">Perusahaan</label>
                            <div class="col-10">
                               <input type="text" class="form-control" required name="perusahaan" value="<?php echo $this->input->post('perusahaan'); ?>" />
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-2 col-form-label" for="example-email">No Telephone</label>
                            <div class="col-10">
                               <input type="text" class="form-control" required name="no_telp" value="<?php echo $this->input->post('no_telp'); ?>" />
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-2 col-form-label" for="example-email">Email</label>
                            <div class="col-10">
                               <input type="text" class="form-control" required name="email" value="<?php echo $this->input->post('email'); ?>" />
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-2 col-form-label" for="example-email">Alamat</label>
                            <div class="col-10">
                               <input type="text" class="form-control" required name="alamat" value="<?php echo $this->input->post('alamat'); ?>" />
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-2 col-form-label" for="example-email">Dokumen</label>
                            <div class="col-10">
                               <?php echo form_upload(['name'=>'dokumen', 'class'=>'form-control']); ?>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-2 col-form-label" for="example-email"></label>
                            <div class="col-10">
                               <button class="btn btn-gradient waves-light waves-effect w-md" type="submit">Save</button>
                            </div>
                        </div>

                    </div>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->

    </div> <!-- container -->

</div> <!-- content -->

<!-- <script type="text/javascript">
$(function() {
        var scntDiv = $('#p_scents');
        var i = $('#p_scents p').size() + 1;
        
        $('#add').live('click', function() {
                $('<p><input type="file" id="dokumen" size="20" name="dokumen' + i +'" /> <a href="#" id="remScnt">Remove</a></p>').appendTo(scntDiv);
                i++;
                return false;
        });
        
        $('#remScnt').live('click', function() { 
                if( i > 2 ) {
                        $(this).parents('p').remove();
                        i--;
                }
                return false;
});
</script> -->
<script type="text/javascript" src="<?php echo base_url().'assets/assets/js/jquery.js'?>"></script>
<script type="text/javascript" src="<?php echo base_url().'assets/assets/js/bootstrap.js'?>"></script>
<script type="text/javascript" src="<?php echo base_url().'assets/assets/js/dropify.min.js'?>"></script>
<script type="text/javascript">
    $(document).ready(function(){
        $('.dropify').dropify({
            messages: {
                default: 'Drag atau drop untuk memilih gambar',
                replace: 'Ganti',
                remove:  'Hapus',
                error:   'error'
            }
        });
    });
    
</script>