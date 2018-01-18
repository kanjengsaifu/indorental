
<div class="content">
    <div class="container-fluid">

        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <h4 class="page-title float-left"></h4>

                    <ol class="breadcrumb float-right">
                        <li class="breadcrumb-item"><a href="#"></a></li>
                        <li class="breadcrumb-item"><a href="#">Company</a></li>
                        <li class="breadcrumb-item active">Data Perusahaan</li>
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
                        &nbsp;&nbsp;&nbsp;&nbsp;<button type="button" class="btn btn-gradient  btn-rounded waves-light waves-effect w-md" data-toggle="modal" data-target="#signup-modal"><i class="mdi mdi-plus-circle-outline "></i></button>
                    </div>
                    <table id="datatable-buttons" class="table table-striped table-bordered" cellspacing="0" width="100%">
                        <thead>
                        <tr>
                            <th>Nama Perusahaan</th>
                            <th>No Telephone</th>
                            <th>Email</th>
                            <th>Alamat</th>
                            <th>logo</th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                         <tbody>
                       <?php foreach($company as $k){ ?>
                        <tr>
                            <td><?php echo $k['nama_comp']; ?></td>
                            <td><?php echo $k['no_telp_comp']; ?></td>
                            <td><?php echo $k['email_comp']; ?></td>
                            <td><?php echo $k['alamat_comp']; ?></td>
                            <td><img src="<?php echo base_url('assets/company/'.$k['logo']);?>" height="50px" width="150px"></td>
                            <td>
                                <a href="<?php echo site_url('admin/company/edit/'.$k['id_company']); ?>"><i class="dripicons-document-edit"></i></a> &nbsp;
                                <a href="<?php echo site_url('admin/company/remove/'.$k['id_company']); ?>"><i class="dripicons-trash"></i></a>
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
                        <!--<h2 class="text-uppercase text-center m-b-30">
                            <a href="index.html" class="text-success">
                                <span><img src="assets/images/logo_dark.png" alt="" height="20"></span>
                            </a>
                        </h2>

                        <?php echo form_open('admin/company/save'); ?> -->
                       <form action="<?php echo base_url('admin/company/save') ?>" method="post" enctype="multipart/form-data" />


                            <div>
                                <span class="text-danger">*</span>Nama Perusahaan : 
                                <input type="text" class="form-control" name="nama_comp" value="<?php echo $this->input->post('nama_comp'); ?>" />
                                <span class="text-danger"><?php echo form_error('nama_comp');?></span>
                            </div>
                            <div>
                                <span class="text-danger">*</span>No Telp : 
                                <input type="text" class="form-control" name="no_telp_comp" value="<?php echo $this->input->post('no_telp_comp'); ?>" />
                                <span class="text-danger"><?php echo form_error('no_telp_comp');?></span>
                            </div>
                            <div>
                                <span class="text-danger">*</span>Email : 
                                <input type="text" class="form-control" name="email_comp" value="<?php echo $this->input->post('email_comp'); ?>" />
                                <span class="text-danger"><?php echo form_error('email_comp');?></span>
                            </div>
                            <div>
                                <span class="text-danger">*</span>Alamat : 
                                <textarea class="form-control" name="alamat_comp"><?php echo $this->input->post('alamat_comp'); ?></textarea>
                                <span class="text-danger"><?php echo form_error('alamat_comp');?></span>
                            </div>
                            <!-- <div id="p_scents">
                                <span class="text-danger">*</span>Dokumen : <p><br/>
                                <input type="file" name="filefoto" class="dropify" />
                                <span><a href="#" id="add">Add</a></span>
                            </div>-->
                            <div>
                                <?php echo form_upload(['name'=>'logo', 'class'=>'form-control']); ?>
                            </div> 
                            <br/>
                            <button type="submit">Save</button>
                        
                        <!-- <?php echo form_close(); ?> -->


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