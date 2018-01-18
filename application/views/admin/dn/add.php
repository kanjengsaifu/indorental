<div class="content">
    <div class="container-fluid">

        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <h4 class="page-title float-left">Indorental</h4>

                    <ol class="breadcrumb float-right">
                        <li class="breadcrumb-item"><a href="#">Indorental</a></li>
                        <li class="breadcrumb-item"><a href="#">Invoice</a></li>
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
              <form method="post" action="<?php echo base_url();?>admin/dn/done" method="post" accept-charset="utf-8">

                    <div class="form-group row">
                        <label class="col-2 col-form-label">No DN</label>
                        <div class="col-6">
                            <input type="text" name="no_dn" id="no_dn" value="<?php echo $no_dn;?>" class="form-control" required="" >
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-2 col-form-label">Tanggal DN</label>
                        <div class="col-6">
                            <input type="date" name="tanggal_dn" id="tanggal_dn" class="form-control" placeholder="Tanggal DN" required="" >
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-2 col-form-label">Pengirim</label>
                        <div class="col-6">
                            <input type="text" name="pengirim" id="pengirim" class="form-control" placeholder="Pengirim" required="" >
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-2 col-form-label">No Invoice</label>
                        <div class="col-6">
                            <input type="text" name="no_invoice" id="no_invoice" class="form-control" placeholder="No Invoice" readonly="" required="">
                        </div>
                        <span><a href="#data_invoice" role="button" class="btn btn-sm green" data-toggle="modal" rel="tooltip" title="Klik untuk pilih Data Barang">  <i class="ace-icon fa fa-search"></i></a></span>
                    </div>

                    <div class="form-group row">
                        <label class="col-2 col-form-label">Perusahaan</label>
                        <div class="col-6">
                            <input type="text" name="perusahaan" id="perusahaan" class="form-control" placeholder="Perusahaan" required="" >
                        </div>
                    </div>

                   
                    <div class="form-group row">
                        <label class="col-2 col-form-label"></label>
                        <div class="col-6">
                          <button type="submit" name="submit" class="btn btn-primary btn-sm">Save</button>
                      </div>
                  </div>
                    </div>
                </form>

            </div>
        </div> 
    </div> 
</div>

    </div>
</div> <!-- End row -->

</div>


<div id="data_invoice" class="modal fade bs-example-modal-lg" tabindex="-1">
<div class="modal-dialog modal-lg">
    <div class="modal-content">
        <div class="modal-header no-padding">
            <div class="table-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                    <span class="white">&times;</span>
                </button>
                Pilih Data Invoice
            </div>
        </div>

        <div class="modal-body no-padding">
            <div id="data-karyawan">

            </div>
            <table class="table table-bordered table-hover" id="datatable">
                <thead>
                    <tr>
                        <th>Pilih</th>
                        <th>No Invoice</th>
                        <th>Perusahaan</th>
                    </tr>
                </thead>
                    <tbody>
                        <?php foreach($invoice as $i=>$data){ ?>
                        <tr>
                            <td>
                                <a role="button" class="green" data-toggle="modal" rel="tooltip" title="Klik untuk pilih Data Invoice" onclick="setDataInvoice('<?php echo $data['no_invoice']; ?>','<?php echo $data['perusahaan']; ?>');"> <button type="button" class="btn btn-icon waves-effect btn-light" data-dismiss="modal"><i class="fa fa-plus"></i></button></a>
                            </td>
                            <td><?php echo $data['no_invoice']; ?></td>
                            <td><?php echo $data['perusahaan']; ?></td>
                        </tr>
                        <?php } ?>
                </tbody>
            </table>
        </div>

        <div class="modal-footer no-margin-top">
            <button class="btn btn-sm btn-danger pull-left" data-dismiss="modal">
                <i class="ace-icon fa fa-times"></i>
                Close
            </button>
        </div>
    </div><!-- /.modal-content -->
</div><!-- /.modal-dialog -->
</div>

<script >
     function setDataInvoice(no_invoice,perusahaan)
     {
        $('#no_invoice').val(no_invoice);
        $('#perusahaan').val(perusahaan);
    }

</script>


