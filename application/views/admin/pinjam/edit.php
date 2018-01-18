    <div class="content">
        <div class="container">

<div class="row">
    <div class="col-sm-12">
        <h4 class="pull-left page-title">Kategori</h4>
        <ol class="breadcrumb pull-right">
            <li><a href="#">Indorental</a></li>
            <li><a href="#">Kategori</a></li>
            <li class="active">Edit Kategori</li>
        </ol>
    </div>
</div>
<div class="row">
    <div class="col-12">
        <div class="card-box">
    <div class="row">
    <div class="col-12">
        <div class="p-20">
               <?php echo form_open('admin/kategori/edit/'.$kategori['id_kategori']); ?>

                <div>
                    <span class="text-danger">*</span>Kategori : 
                    <input type="text" class="form-control" name="kategori" value="<?php echo ($this->input->post('kategori') ? $this->input->post('kategori') : $kategori['kategori']); ?>" />
                    <span class="text-danger"><?php echo form_error('kategori');?></span>
                </div>
                
                <button type="submit">Save</button>
                
                <?php echo form_close(); ?>

</div> <!-- End row -->
</div> <!-- End row -->
</div> <!-- End row -->
</div> <!-- End row -->
</div> <!-- End row -->


