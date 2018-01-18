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
               <?php echo form_open('admin/spek/edit/'.$spek['id_spek']); ?>

                   <div class="form-group row">
                        <label class="col-2 col-form-label" for="example-email">Spesifikasi</label>
                        <div class="col-10">
                           <select name="id_kategori" class="form-control">
                                <option value="">select kategori</option>
                                <?php 
                                foreach($all_kategori as $kategori)
                                {
                                    $selected = ($kategori['id_kategori'] == $barang['id_kategori']) ? ' selected="selected"' : "";
                                    echo '<option value="'.$kategori['id_kategori'].'" '.$selected.'>'.$kategori['kategori'].'</option>';
                                } 
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-2 col-form-label" for="example-email">Spesifikasi</label>
                        <div class="col-10">
                           <input type="text" class="form-control" name="spesifikasi" value="<?php echo ($this->input->post('spek') ? $this->input->post('spek') : $spek['spek']); ?>" />
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


