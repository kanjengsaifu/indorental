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
    <div class="col-12">
        <div class="card-box">
    <div class="row">
    <div class="col-12">
        <div class="p-20">
                <?php echo form_open('admin/barang/simpan_update/'.$barang['id_barang']); ?>

                <div class="form-group row">
                        <label class="col-2 col-form-label" for="kategori">Kategori</label>
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
                        <label class="col-2 col-form-label" for="example-email">Barang</label>
                        <div class="col-10">
                           <input type="text" class="form-control" name="nama_barang" value="<?php echo ($this->input->post('nama_barang') ? $this->input->post('nama_barang') : $barang['nama_barang']); ?>" />
                        </div>
                    </div>

                     <div class="form-group row">
                        <label class="col-2 col-form-label" for="example-email">Spesifikasi</label>
                        <div class="col-10">
                            <select name="id_spek" class="form-control">
                                <option value="">select spek</option>
                                <?php 
                                foreach($all_spek as $spek)
                                {
                                    $selected = ($spek['id_spek'] == $barang['id_spek']) ? ' selected="selected"' : "";
                                    echo '<option value="'.$spek['id_spek'].'" '.$selected.'>'.$spek['spek'].'</option>';
                                } 
                                ?>
                            </select>
                        </div>
                    </div>

                     <div class="form-group row">
                        <label class="col-2 col-form-label" for="kondisi">Kondisi</label>
                        <div class="col-10">
                            <select class="form-control" name="kondisi" value="<?php echo ($this->input->post('kondisi') ? $this->input->post('kondisi') : $barang['kondisi']); ?>" />
                                <option value="Baik">Baik</option>
                                <option value="Rusak">Rusak</option>
                            <select>
                        </div>
                    </div>

                     <div class="form-group row">
                        <label class="col-2 col-form-label" for="status">Status</label>
                        <div class="col-10">
                            <select class="form-control" name="status" value="<?php echo ($this->input->post('status') ? $this->input->post('status') : $barang['status']); ?>" />
                                <option value="Tersedia">Tersedia</option>
                                <option value="Keluar">Keluar</option>
                            </select>
                        </div>
                    </div>

                     <div class="form-group row">
                        <label class="col-2 col-form-label" for="example-email">Serial No</label>
                        <div class="col-10">
                           <input type="text" class="form-control" name="serial_no" value="<?php echo ($this->input->post('serial_no') ? $this->input->post('serial_no') : $barang['serial_no']); ?>" />
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


<!-- WEBCAM BARCOD -->
<script type="text/javascript" src="<?php echo base_url();?>assets/assets/js/filereader.js"></script> 
<script type="text/javascript" src="<?php echo base_url();?>assets/assets/js/qrcodelib.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/assets/js/webcodecamjs.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/assets/js/main.js"></script>

<!-- DROPDOWN CHAIN -->
<script src="<?php echo base_url(); ?>assets/assets/js/jquery.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/assets/js/jquery.chained.min.js"></script>
<script type="text/javascript">
     $("#id_spek").chained("#id_kategori"); 
</script>
<script type="text/javascript">load();</script>
<script src="<?php echo base_url();?>assets/assets/js/jquery-1.11.2.min.js"></script>

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




