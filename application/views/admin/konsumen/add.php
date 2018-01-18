    <div class="content">
        <div class="container">

<div class="row">
    <div class="col-sm-12">
        <h4 class="pull-left page-title">Data Konsumen</h4>
        <ol class="breadcrumb pull-right">
            <li><a href="#">Indorental</a></li>
            <li><a href="#">Konsumen</a></li>
            <li class="active">Data Konsumen</li>
        </ol>
    </div>
</div>

    <div class="row">
    <div class="col-sm-9">
        <div class="panel panel-default">
            <div class="panel-heading"><h3 class="panel-title">Tambah Konsumen</h3></div>
            <div class="panel-body">
               <form action="<?php echo base_url()?>/konsumen/save" method="post" class="form-horizontal" role="form" >
                    <div class="form-group">
                        <label class="col-md-2 control-label" for="konsumen">Nama</label>
                        <div class="col-md-7">
                            <div class="input-group">
                                <span class="input-group-addon"><i class=" md-group-add"></i></span>
                                <input type="text" id="konsumen" name="konsumen" class="form-control" placeholder="Nama Konsumen" required="">
                            </div>
                        </div>
                    </div> <!-- form-group -->

                    <div class="form-group">
                        <label class="col-md-2 control-label" for="perusahaan">Perusahaan</label>
                        <div class="col-md-7">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="ion-ios7-home "></i></span>
                                <input type="text" id="perusahaan" name="perusahaan" class="form-control" placeholder="Perusahaan" required="">
                            </div>
                        </div>
                    </div> <!-- form-group -->

                    <div class="form-group">
                        <label class="col-md-2 control-label" for="email">Email</label>
                        <div class="col-md-7">
                            <div class="input-group">
                                <span class="input-group-addon"><i class=" md-email"></i></span>
                                <input type="email" id="email" name="email" class="form-control" placeholder="Email" required="">
                            </div>
                        </div>
                    </div> <!-- form-group -->

                     <div class="form-group">
                        <label class="col-md-2 control-label" for="no_telp">No Telephone</label>
                        <div class="col-md-7">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="md-phone"></i></span>
                                <input type="text" id="no_telp" name="no_telp" class="form-control" placeholder="No Telephone" required="">
                            </div>
                        </div>
                    </div> <!-- form-group -->

                     <div class="form-group">
                        <label class="col-md-2 control-label" for="alamat">Alamat</label>
                        <div class="col-md-7">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="md-home"></i></span>
                                <input type="text" id="alamat" name="alamat" class="form-control" placeholder="Alamat" required="">
                            </div>
                        </div>
                    </div> <!-- form-group -->

                    <div class="form-group">
                        <label class="col-md-2 control-label" for="no_telp">Dokumen</label>
                        <div class="col-md-7">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="ion-document-text "></i></span>
                                <input type="text" multiple id="dokumen" name="dokumen" class="form-control" placeholder="Dokumen">
                                <span class="input-group-addon"> <a href="javascript:;" class="md-trigger btn btn-primary waves-effect waves-light" data-modal="modal-5"></a></span>
                            </div>
                        </div>
                    </div> <!-- form-group -->
            </div>
                <div>
                <button type="submit" class="btn btn-primary">Simpan</button> 
                </div>
            <br/>
    </form>

         <div class="md-modal md-effect-5" id="modal-5">
            <div class="md-content">
                <h3>Modal Dialog</h3>
                <div>
                    <p>This is a modal window. You can do the following things with it:</p>
                    <form action="<?php echo base_url()?>/konsumen/save" class="dropzone" id="dropzone" action="<?php echo base_url().'konsumen/upload_image'?>" method="post">
                      <div class="fallback">
                        <input name="file" type="file" multiple />
                      </div>
                      <button type="submit" class="btn btn-primary">Upload</button>
                    </form>
                    <br/>
                    
                </div>
            </div>
        </div>

            </div> <!-- panel-body -->
        </div> <!-- panel -->
    </div> <!-- col -->
</div> <!-- End row -->
</div> <!-- End row -->
</div> <!-- End row -->
</div> <!-- End row -->
</div> <!-- End row -->

