    <div class="content">
        <div class="container">

<div class="row">
    <div class="col-sm-12">
        <h4 class="pull-left page-title">Barang</h4>
        <ol class="breadcrumb pull-right">
            <li><a href="#">Indorental</a></li>
            <li><a href="#">Barang</a></li>
            <li class="active">Tambah Barang</li>
        </ol>
    </div>
</div>

    <div class="row">
    <div class="col-sm-12">
        <div class="panel panel-default">
            <div class="panel-heading"><h3 class="panel-title">Tambah Barang</h3></div>
            <div class="panel-body">
               <form action="<?php echo base_url()?>/barang/save" method="post" class="form-horizontal" role="form" >
       <div class="form-group">
                        <label class="col-md-2 control-label" for="kategori">Kategori</label>
                        <div class="col-md-7">
                            <div class="input-group">
                                <span class="input-group-addon"><i class=" md-perm-data-setting"></i></span>
                                <select class="form-control select2" name="kategori" id="kategori" style="width: 100%;" required="">
                                    <?php foreach($listkategori as $value)   {   ?>
                                    <option value="<?php echo $value['id_kategori']?>"><?php echo $value['kategori']?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                    </div> <!-- form-group -->

                    <div class="form-group">
                        <label class="col-md-2 control-label" for="nama_barang">Nama Barang</label>
                        <div class="col-md-7">
                            <div class="input-group">
                                <span class="input-group-addon"><i class=" md-laptop-mac"></i></span>
                                <input type="text" id="nama_barang" name="nama_barang" class="form-control" placeholder="Nama Barang" required="">
                            </div>
                        </div>
                    </div> <!-- form-group -->

                    <div class="form-group">
                        <label class="col-md-2 control-label" for="spek">Spek</label>
                        <div class="col-md-7">
                            <div class="input-group">
                                <span class="input-group-addon"><i class=" md-local-play"></i></span>
                                <select class="form-control select2" name="spek" id="spek" required="" >
                                <?php foreach($listspek as $row) { ?>
                                <option value="<?php echo $row->id_spek?>" class="<?php echo $row->id_kategori; ?>"> <?php echo $row->spek?></option>
                                <?php } ?>
                                </select>
                            </div>
                        </div>
                    </div> <!-- form-group -->

                    <div class="form-group">
                        <label class="col-md-2 control-label" for="kondisi">Kondisi</label>
                        <div class="col-md-7">
                            <div class="input-group">
                                <span class="input-group-addon"><i class=" md-settings"></i></span>
                               <select class="form-control select2" name="kondisi" id="kondisi" style="width: 100%;" >
                                    <option value="Baik">Baik</option>
                                    <option value="Rusak">Rusak</option>
                                </select>
                            </div>
                        </div>
                    </div> <!-- form-group -->

                    <div class="form-group">
                        <label class="col-md-2 control-label" for="status">Status</label>
                        <div class="col-md-7">
                            <div class="input-group">
                                <span class="input-group-addon"><i class=" md-airplanemode-on"></i></span>
                               <select class="form-control select2" name="status" id="status" style="width: 100%;" required="" >
                                    <option value="Tersedia">Tersedia</option>
                                    <option value="Keluar">Keluar</option>
                                </select>
                            </div>
                        </div>
                    </div> <!-- form-group -->

                    <div class="form-group">
                        <label class="col-md-2 control-label" for="serial_no">Serial No</label>
                        <div class="col-md-7">
                            <div class="input-group">
                                <span class="input-group-addon"><i class=" ion-ios7-barcode-outline "></i></span>
                                <input type="text" id="serial_no" name="serial_no" class="form-control" placeholder="Serial No" required="">
                                <span class="input-group-addon"> <button onclick="myFunction()"></button></span>
                            </div>
                        </div>
                    </div> <!-- form-group -->

                <div class="container" id="QR-Code">
                <div class="panel panel-info">
                <div class="panel-heading">
                    <div class="navbar-form navbar-right">
                        <select class="form-control" id="camera-select"></select>
                        <div class="form-group">
                            <button title="Decode Image" class="btn btn-default btn-sm" id="decode-img" type="button" data-toggle="tooltip"><span class="glyphicon glyphicon-upload"></span></button>
                            <button title="Image shoot" class="btn btn-info btn-sm disabled" id="grab-img" type="button" data-toggle="tooltip"><span class="glyphicon glyphicon-picture"></span></button>
                            <button title="Play" class="btn btn-success btn-sm" id="play" type="button" data-toggle="tooltip"><span class="glyphicon glyphicon-play"></span></button>
                            <button title="Pause" class="btn btn-warning btn-sm" id="pause" type="button" data-toggle="tooltip"><span class="glyphicon glyphicon-pause"></span></button>
                            <button title="Stop streams" class="btn btn-danger btn-sm" id="stop" type="button" data-toggle="tooltip"><span class="glyphicon glyphicon-stop"></span></button>
                         </div>
                    </div>
                </div>
                <div class="panel-body text-center">
                    <div class="col-md-6">
                        <div class="well" style="position: relative;display: inline-block;">
                            <canvas width="320" height="240" id="webcodecam-canvas"></canvas>
                            <div class="scanner-laser laser-rightBottom" style="opacity: 0.5;"></div>
                            <div class="scanner-laser laser-rightTop" style="opacity: 0.5;"></div>
                            <div class="scanner-laser laser-leftBottom" style="opacity: 0.5;"></div>
                            <div class="scanner-laser laser-leftTop" style="opacity: 0.5;"></div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="thumbnail" id="result">
                            <div class="well" style="overflow: hidden;">
                                <img width="320" height="240" id="scanned-img" src="">
                            </div>
                            <div class="caption">
                                <p id="scanned-QR"></p>
                            </div>
                        </div>
                    </div>
                </div>
        </div>
        </div>

            </div>
            <div>
        <button type="submit" class="btn btn-primary">Simpan</button> 
            </div>
    </form>

</div> <!-- End row -->
</div> <!-- End row -->
</div> <!-- End row -->
</div> <!-- End row -->
</div> <!-- End row -->


<!-- WEBCAM BARCOD -->
<script type="text/javascript" src="<?php echo base_url();?>assets/js/filereader.js"></script> 
<script type="text/javascript" src="<?php echo base_url();?>assets/js/qrcodelib.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/js/webcodecamjs.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/js/main.js"></script>

<!-- DROPDOWN CHAIN -->
<script src="<?php echo base_url(); ?>assets/js/jquery.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery.chained.min.js"></script>
<script type="text/javascript">
     $("#spek").chained("#kategori"); 
</script>
<script type="text/javascript">load();</script>
<script src="<?php echo base_url();?>assets/js/jquery-1.11.2.min.js"></script>

<!-- TOGGLE HIDE DIV WEBCAM -->
<script>
function myFunction() {
    var x = document.getElementById("kamera");
    if (x.style.display === "none") {
        x.style.display = "block";
    } else {
        x.style.display = "none";
    }
}
</script>




