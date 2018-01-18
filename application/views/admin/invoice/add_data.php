<div class="content">
    <div class="container-fluid">

        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <h4 class="page-title float-left">Indorental</h4>

                    <ol class="breadcrumb float-right">
                        <li class="breadcrumb-item"><a href="#">Indorental</a></li>
                        <li class="breadcrumb-item"><a href="#">Invoice</a></li>
                        <li class="breadcrumb-item active">Tambah Data Pinjam</li>
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
              <form method="post" action="<?php echo base_url();?>admin/invoice/done" method="post" accept-charset="utf-8">

                    <div class="form-group row">
                        <label class="col-2 col-form-label">Perusahaan</label>
                        <div class="col-6">
                            <input type="text" name="id_company" id="id_company" class="form-control" placeholder="Perusahaan" readonly="" required="">
                        </div>
                        <span><a href="#data_perusahaan" role="button" class="btn btn-sm green" data-toggle="modal" rel="tooltip" title="Klik untuk pilih Data Perusahaan">  <i class="ace-icon fa fa-search"></i></a></span>
                    </div>

                     <div class="form-group row">
                        <label class="col-2 col-form-label">No Invoice</label>
                        <div class="col-6">
                            <input type="text" name="no_invoice" id="no_invoice" class="form-control" placeholder="No Invoice" value="<?php echo $no_invoice;?>" required="" >
                        </div>
                    </div>
                    
                    <div class="form-group row">
                        <label class="col-2 col-form-label">Tanggal Invoice</label>
                        <div class="col-6">
                            <input type="date" name="tanggal_invoice" id="tanggal_invoice" class="form-control" placeholder="Tanggal Invoice" required="" >
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-2 col-form-label">Tanggal Deadline</label>
                        <div class="col-6">
                            <input type="date" name="tanggal_tempo" id="tanggal_tempo" class="form-control" placeholder="Tanggal Deadline" required="" >
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-2 col-form-label">Metode Bayar</label>
                        <div class="col-6">
                            <select class="form-control" name="metode_bayar">
                                <option value="DP">DP</option>
                                <option value="COD">COD</option>
                                <option value="Transper">Transper</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-2 col-form-label">DP</label>
                        <div class="col-6">
                            <input type="number" name="dp" id="dp" class="form-control" placeholder="Rp." required="" >
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-2 col-form-label">Konsumen</label>
                        <div class="col-6">
                            <input type="text" name="id_konsumen" id="id_konsumen" class="form-control" placeholder="Konsumen" readonly="" required="">
                        </div>
                        <span><a href="#data_konsumen" role="button" class="btn btn-sm green" data-toggle="modal" rel="tooltip" title="Klik untuk pilih Data Perusahaan">  <i class="ace-icon fa fa-search"></i></a></span>
                    </div>

                    <div class="form-group row">
                        <label class="col-2 col-form-label">Email</label>
                        <div class="col-6">
                            <input type="text" name="email" id="email" class="form-control" placeholder="Email" required="" readonly="" >
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-2 col-form-label">No Telephone</label>
                        <div class="col-6">
                            <input type="number" name="no_telp" id="no_telp" class="form-control" placeholder="No Telephone" required="" readonly="" >
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-2 col-form-label">Lokasi Pengiriman</label>
                        <div class="col-6">
                            <textarea name="lokasi_kirim" id="lokasi_kirim" class="form-control" placeholder="Lokasi Pengiriman" required=""  ></textarea>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-2 col-form-label"></label>
                        <div class="col-6">
                    <button type="submit"  class="btn btn-purple btn-custom waves-effect waves-light m-b-5">Save</button>
                    </div>
                </form>

                    </div>

            </div>
        </div> 
    </div> 

<div id="data_konsumen" class="modal fade bs-example-modal-lg" tabindex="-1">
<div class="modal-dialog modal-lg">
    <div class="modal-content">
        <div class="modal-header no-padding">
            <div class="table-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                    <span class="white">&times;</span>
                </button>
                <b>Pilih Data Konsumen</b>
            </div>
        </div>

        <div class="modal-body no-padding">
            <div id="data-karyawan">

            </div>
            <table id="datatable" class="table table-bordered" >
                <thead>
                    <tr>
                        <th>Pilih</th>
                        <th>Perusahaan</th>
                        <th>Email</th>
                        <th>No Telepehone</th>
                        <th>Alamat</th>
                    </tr>
                </thead>
                    <tbody>
                        <?php foreach($konsumen as $i=>$data){ ?>
                        <tr>
                            <td>
                                <a role="button" class="green" data-toggle="modal" rel="tooltip" title="Klik untuk pilih Data Konsumen" onclick="setDataKonsumen('<?php echo $data['id_konsumen']; ?>','<?php echo $data['email']; ?>','<?php echo $data['no_telp']; ?>');"><button type="button" class="btn btn-icon waves-effect btn-light" data-dismiss="modal"><i class="fa fa-plus"></i></button></a>
                            </td>
                            <td><?php echo $data['perusahaan']; ?></td>
                            <td><?php echo $data['email']; ?></td>
                            <td><?php echo $data['no_telp']; ?></td>
                            <td><?php echo $data['alamat']; ?></td>
                        </tr>
                        <?php } ?>
                    </tbody>
            </table>
        </div>
    </div><!-- /.modal-content -->
</div><!-- /.modal-dialog -->
</div>

<div id="data_perusahaan" class="modal fade bs-example-modal-lg" tabindex="-1">
<div class="modal-dialog modal-lg">
    <div class="modal-content">
        <div class="modal-header no-padding">
            <div class="table-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                    <span class="white">&times;</span>
                </button>
                <b>Pilih Data Perusahaan</b>
            </div>
        </div>

        <div class="modal-body no-padding">
            <div>

            </div>
            <table id="datatable" class="table table-bordered" >
                <thead>
                    <tr>
                        <th>Pilih</th>
                        <th>Perusahaan</th>
                        <th>Email</th>
                        <th>No Telepehone</th>
                        <th>Alamat</th>
                    </tr>
                </thead>
                    <tbody>
                        <?php foreach($company as $i=>$data){ ?>
                        <tr>
                            <td>
                                <a role="button" class="green" data-toggle="modal" rel="tooltip" title="Klik untuk pilih Data Konsumen" onclick="setDataPerusahaan('<?php echo $data['id_company']; ?>');"><button type="button" class="btn btn-icon waves-effect btn-light" data-dismiss="modal"><i class="mdi mdi-check-circle"></i></button></a>
                            </td>
                            <td><?php echo $data['nama_comp']; ?></td>
                            <td><?php echo $data['email_comp']; ?></td>
                            <td><?php echo $data['no_telp_comp']; ?></td>
                            <td><?php echo $data['alamat_comp']; ?></td>
                        </tr>
                        <?php } ?>
                    </tbody>
            </table>
        </div>
    </div><!-- /.modal-content -->
</div><!-- /.modal-dialog -->
</div>

    </div> <!-- container -->
</div> <!-- content -->

<script >
     function setDataKonsumen(id_konsumen,email,no_telp)
     {
        $('#id_konsumen').val(id_konsumen);
        $('#email').val(email);
        $('#no_telp').val(no_telp);
    }

     function setDataPerusahaan(id_company)
     {
        $('#id_company').val(id_company);
    }

</script>


