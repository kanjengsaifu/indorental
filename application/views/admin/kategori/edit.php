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

                 <div class="form-group row">
                        <label class="col-2 col-form-label" for="example-email">Kategori</label>
                        <div class="col-10">
                           <input type="text" class="form-control" name="kategori" value="<?php echo ($this->input->post('kategori') ? $this->input->post('kategori') : $kategori['kategori']); ?>" />
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-2 col-form-label"></label>
                        <div class="col-10">
                           <button class="btn btn-gradient waves-light waves-effect w-md" type="submit">Save</button>
                        </div>
                    </div>
                
                <?php echo form_close(); ?>

</div> <!-- End row -->
</div> <!-- End row -->
</div> <!-- End row -->
</div> <!-- End row -->
</div> <!-- End row -->


