    <div class="content">
        <div class="container">

<div class="row">
    <div class="col-sm-12">
        <h4 class="pull-left page-title">Kategori</h4>
        <ol class="breadcrumb pull-right">
            <li><a href="#">Indorental</a></li>
            <li><a href="#">Kategori</a></li>
            <li class="active">Tambah Kategori</li>
        </ol>
    </div>
</div>

    <div class="row">
    <div class="col-sm-9">
        <div class="panel panel-default">
            <div class="panel-heading"><h3 class="panel-title">Tambah Kategori</h3></div>
            <div class="panel-body">
               <form action="<?php echo base_url()?>/gudang/kategori/save" method="post" class="form-horizontal" role="form" >
           <div class="form-group">
                        <label class="col-md-2 control-label" for="nama_barang">Kategori</label>
                        <div class="col-md-7">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="md-perm-data-setting"></i></span>
                                <input type="text" id="kategori" name="kategori" class="form-control" placeholder="Kategori">
                            </div>
                        </div>
             </div> <!-- form-group -->
            </div>
            <div>
            <button type="submit" class="btn btn-primary">Simpan</button> 
            </div>
            <br/>
    </form>
            </div> <!-- panel-body -->
        </div> <!-- panel -->
    </div> <!-- col -->
</div> <!-- End row -->
</div> <!-- End row -->
</div> <!-- End row -->
</div> <!-- End row -->
</div> <!-- End row -->

