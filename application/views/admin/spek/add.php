    <div class="content">
        <div class="container">

<div class="row">
<div class="col-sm-12">
        <h4 class="pull-left page-title">Data Spesifikasi</h4>
        <ol class="breadcrumb pull-right">
            <li><a href="#">Indorental</a></li>
            <li><a href="#">Spesifikasi</a></li>
            <li class="active">Data Spesifikasi</li>
        </ol>
    </div>
</div>

    <div class="row">
    <div class="col-sm-12">
        <div class="panel panel-default">
            <div class="panel-heading"><h3 class="panel-title">Tambah Spesifikasi</h3></div>
            <div class="panel-body">
               <form action="<?php echo base_url()?>/spek/save" method="post" class="form-horizontal" role="form" >
                    <div class="form-group">
                        <label class="col-md-2 control-label" for="kategori">Kategori</label>
                        <div class="col-md-7">
                            <div class="input-group">
                                <span class="input-group-addon"><i class=" md-perm-data-setting"></i></span>
                                <select class="form-control select2" name="kategori" id="kategori" style="width: 100%;" >
                                   <?php
                                    foreach ($listkategori as $value) {
                                         echo"<option value='".$value['id_kategori']."'>".$value['kategori']."</option>";
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                    </div> <!-- form-group -->

                    <div class="form-group">
                        <label class="col-md-2 control-label" for="spek">Spesifikasi</label>
                        <div class="col-md-7">
                            <div class="input-group">
                                <span class="input-group-addon"><i class=" md-laptop-mac"></i></span>
                                <input type="text" id="spek" name="spek" class="form-control" placeholder="Nama Barang">
                            </div>
                        </div>
                    </div> <!-- form-group -->
            </div>
            <div>
        <button type="submit" class="btn btn-primary">Simpan</button> 
            </div>
    </form>

    </div>
</div> 
</div>
</div> 
</div> 
</div> 

