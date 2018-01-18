<div class="content">
    <div class="container-fluid">

        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <h4 class="page-title float-left">Indorental</h4>

                    <ol class="breadcrumb float-right">
                        <li class="breadcrumb-item"><a href="#">Indorental</a></li>
                        <li class="breadcrumb-item"><a href="#">Kembali</a></li>
                        <li class="breadcrumb-item active">Tambah Data Barang</li>
                    </ol>

                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
        <!-- end row -->

<div class="row">
    <div class="col-12">
        <div class="card-box">
            <!-- <h4 class="m-t-0 header-title"><b>Input Sizes & Group</b></h4> -->
            <br/>
            <div class="p-20">
              <form method="post" action="<?php echo base_url();?>admin/kembali/done" method="post" accept-charset="utf-8">

                    <div class="form-group row">
                        <label class="col-2 col-form-label">No Invoice</label>
                        <div class="col-6">
                            <input type="text" name="no_invoice" id="no_invoice" value="<?php echo $no_invoice?>" class="form-control" readonly="" required="">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-2 col-form-label">No DN</label>
                        <div class="col-6">
                            <input type="text" name="no_dn" id="no_dn" value="<?php echo $no_dn?>" class="form-control" readonly="" required="">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-2 col-form-label">Tanggal Kembali</label>
                        <div class="col-6">
                            <input type="date" name="tanggal_kembali" id="tanggal_kembali" class="form-control" required="">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-2 col-form-label">Konsumen</label>
                        <div class="col-6">
                            <input type="text" name="perusahaan" id="perusahaan" value="<?php echo $perusahaan?>" class="form-control" >
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-2 col-form-label">Status Payment</label>
                        <div class="col-6">
                            <select class="form-control">
                                <option value="Lunas">Lunas</option>
                                <option value="Nunggak">Nunggak</option>
                            </select>
                        </div>
                    </div>

                     <div class="form-group row">
                        <label class="col-2 col-form-label">Keterangan</label>
                        <div class="col-6">
                            <textarea type="text" name="keterangan" id="keterangan"  class="form-control" ></textarea>
                        </div>
                    </div>

                     <div class="form-group row">
                        <label class="col-2 col-form-label"></label>
                        <div class="col-6">
                            <button type="submit" name="submit" class="btn btn-primary btn-sm">Save</button> 
                        </div>
                    </div>

                    
            </div>
                

            </div>
        </div> 
    </div> 
</div>

   <div class="row">
        <div class="col-12">
            <div class="card-box">

                <div class="table-rep-plugin">
                    <div class="table-responsive" data-pattern="priority-columns">
                         <table id="datatable" class="table ">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Kategori</th>
                                        <th>Nama Barang</th>
                                        <th>Spesifikasi</th>
                                        <th>Serial No</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no=1; $total=0; foreach ($detail as $r){ ?>
                                        <tr class="gradeU">
                                            <td><?php echo $no ?></td>
                                            <td><?php echo $r->kategori ?></td>
                                            <td><?php echo $r->nama_barang?></td>
                                            <td><?php echo $r->spek ?></td>
                                            <td><?php echo $r->serial_no ?></td>
                                            
                                        </tr>
                                </tbody>
                                <?php } ?>
                            </table>
                            
            </form>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div> <!-- End row -->

</div>


<div id="data_barang" class="modal fade bs-example-modal-lg" tabindex="-1">
<div class="modal-dialog modal-lg">
    <div class="modal-content">
        <div class="modal-header no-padding">
            <div class="table-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                    <span class="white">&times;</span>
                </button>
                Pilih Data Barang
            </div>
        </div>

        <div class="modal-body no-padding">
            <div id="data-karyawan">

            </div>
            <table class="table table-bordered table-hover" id="datatable">
                <thead>
                    <tr>
                        <th>Pilih</th>
                        <th>Kategori</th>
                        <th>Nama Barang</th>
                        <th>Spesiffikasi</th>
                    </tr>
                </thead>
                    <tbody>
                        <?php foreach($barang as $i=>$data){ ?>
                        <tr>
                            <td>
                                <a role="button" class="green" data-toggle="modal" rel="tooltip" title="Klik untuk pilih Data Konsumen" onclick="setDataBarang('<?php echo $data['nama_barang']; ?>','<?php echo $data['kategori']; ?>','<?php echo $data['spek']; ?>','<?php echo $data['serial_no']; ?>');"><button data-dismiss="modal"><i class="ace-icon fa fa-check"></i></button></a>
                            </td>
                            <td><?php echo $data['kategori']; ?></td>
                            <td><?php echo $data['nama_barang']; ?></td>
                            <td><?php echo $data['spek']; ?></td>
                        </tr>
                        <?php } ?>
                </tbody>
            </table>
        </div>

    </div><!-- /.modal-content -->
</div><!-- /.modal-dialog -->
</div>

<script >
     function setDataBarang(nama_barang,kategori,spek,serial_no)
     {
        $('#nama_barang').val(nama_barang);
        $('#kategori').val(kategori);
        $('#spek').val(spek);
        $('#serial_no').val(serial_no);
    }

</script>

