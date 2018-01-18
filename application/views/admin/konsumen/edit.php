    <div class="content">
        <div class="container">

<div class="row">
    <div class="col-sm-12">
        <h4 class="pull-left page-title">Konsumen</h4>
        <ol class="breadcrumb pull-right">
            <li><a href="#">Indorental</a></li>
            <li><a href="#">Konsumen</a></li>
            <li class="active">Edit Konsumen</li>
        </ol>
    </div>
</div>

<div class="row">
    <div class="col-12">
        <div class="card-box">
    <div class="row">
    <div class="col-12">
        <div class="p-20">
               <!-- <?php echo form_open('admin/konsumen/edit/'.$konsumen['id_konsumen']); ?> -->
               <form action="<?php echo base_url('admin/konsumen/edit/'.$konsumen['id_konsumen']) ?>" method="post" enctype="multipart/form-data" />

                    <div>
                        <span class="text-danger">*</span>Konsumen : 
                        <input type="text" class="form-control"  name="konsumen" value="<?php echo ($this->input->post('konsumen') ? $this->input->post('konsumen') : $konsumen['konsumen']); ?>" />
                        <span class="text-danger"><?php echo form_error('konsumen');?></span>
                    </div>
                    <div>
                        <span class="text-danger">*</span>Perusahaan : 
                        <input type="text" class="form-control" name="perusahaan" value="<?php echo ($this->input->post('perusahaan') ? $this->input->post('perusahaan') : $konsumen['perusahaan']); ?>" />
                        <span class="text-danger"><?php echo form_error('perusahaan');?></span>
                    </div>
                    <div>
                        <span class="text-danger">*</span>No Telp : 
                        <input type="text" class="form-control" name="no_telp" value="<?php echo ($this->input->post('no_telp') ? $this->input->post('no_telp') : $konsumen['no_telp']); ?>" />
                        <span class="text-danger"><?php echo form_error('no_telp');?></span>
                    </div>
                    <div>
                        <span class="text-danger">*</span>Email : 
                        <input type="text" class="form-control" name="email" value="<?php echo ($this->input->post('email') ? $this->input->post('email') : $konsumen['email']); ?>" />
                        <span class="text-danger"><?php echo form_error('email');?></span>
                    </div>
                    <div>
                        <span class="text-danger">*</span>Alamat : 
                        <textarea class="form-control" name="alamat"><?php echo ($this->input->post('alamat') ? $this->input->post('alamat') : $konsumen['alamat']); ?></textarea>
                        <span class="text-danger"><?php echo form_error('alamat');?></span>
                    </div>

                    <div class="form-group">
                        <label class="col-lg-2 control-label">Dokumen saat ini</label>
                        <div class="col-lg-5">
                            <img src="<?php echo base_url('assets/dokumen/'.$konsumen['dokumen']);?>" width="200px" height="200px">
                        </div>
                    </div>
                    
                    
                    <div>
                        <?php echo form_upload(['name'=>'dokumen', 'class'=>'form-control']); ?>
                    </div>
                    
                    <button type="submit">Update</button>
                    </form>
                    
</div> <!-- End row -->
</div> <!-- End row -->
</div> <!-- End row -->
</div> <!-- End row -->
</div> <!-- End row -->
</div> <!-- End row -->
</div> <!-- End row -->


