<div class="content">
    <div class="container-fluid">

        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <h4 class="page-title float-left">Indorental</h4>

                    <ol class="breadcrumb float-right">
                        <li class="breadcrumb-item"><a href="#">Indorental</a></li>
                        <li class="breadcrumb-item"><a href="#">Barang</a></li>
                        <li class="breadcrumb-item active">Data Barang</li>
                    </ol>

                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
        <!-- end row -->

<div class="row">
    <div class="col-md-12">
        <div class="card-box">
            <br/>
                <?php echo form_open('admin/pinjam/simpan', array('class'=>'form-horizontal')); ?>

               <div class="form-group row">
                    <label class="col-2 col-form-label" for="example-email">Nama Konsumen</label>
                    <div class="col-8">
                        <input type="text" id="nama_barang" name="nama_barang" class="form-control" placeholder="Nama Barang">
                    </div>
                    <span><a href="#data_barang" role="button" class="btn btn-sm green" data-toggle="modal" rel="tooltip" title="Klik untuk pilih Data Barang">  <i class="ace-icon fa fa-search"></i></a></span>
                </div>

                 <div class="form-group row">
                    <label class="col-2 col-form-label" for="example-email">Jumlah</label>
                    <div class="col-8">
                        <input type="text" id="example-email" name="jumlah" class="form-control" placeholder="Jumlah">
                    </div>
                </div>

                 <div class="form-group row">
                    <label class="col-2 col-form-label" for="example-email">Harga</label>
                    <div class="col-8">
                        <input type="text" id="example-email" name="harga" class="form-control" placeholder="Harga">
                    </div>
                </div>

                <button type="submit" name="submit" class="btn btn-primary btn-sm">Save</button>
            </form>
        </div>
    </div>
</div>