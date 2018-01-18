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
              <form method="post" action="<?php echo base_url();?>admin/detail_dn/done" method="post" accept-charset="utf-8">

                    <div class="form-group row">
                        <label class="col-2 col-form-label">No DN</label>
                        <div class="col-6">
                            <input type="text" name="no_dn" id="no_dn" class="form-control" placeholder="No DN" readonly="" required="">
                        </div>
                        <span><a href="#data_dn" role="button" class="btn btn-sm green" data-toggle="modal" rel="tooltip" title="Klik untuk pilih Data DN">  <i class="ace-icon fa fa-search"></i></a></span>
                    </div>

                     <div class="form-group row">
                        <label class="col-2 col-form-label">No Invoice</label>
                        <div class="col-6">
                            <input type="text" name="no_invoice" id="no_invoice" class="form-control" placeholder="No Invoice"  required="" readonly="" >
                        </div>
                    </div>
                    
                    <div class="form-group row">
                        <label class="col-2 col-form-label">Tanggal Invoice</label>
                        <div class="col-6">
                            <input type="text" name="tanggal_invoice" id="tanggal_invoice" class="form-control" placeholder="Tanggal Invoice" required="" readonly="" >
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-2 col-form-label">Tanggal DN</label>
                        <div class="col-6">
                            <input type="text" name="tanggal_dn" id="tanggal_dn" class="form-control" placeholder="Tanggal DN" required="" readonly="" >
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

<div id="data_dn" class="modal fade bs-example-modal-lg" tabindex="-1">
<div class="modal-dialog modal-lg">
    <div class="modal-content">
        <div class="modal-header no-padding">
            <div class="table-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                    <span class="white">&times;</span>
                </button>
                <b>Pilih Data DN</b>
            </div>
        </div>

        <div class="modal-body no-padding">
            <div>

            </div>
            <table id="datatable" class="table table-bordered" >
                <thead>
                    <tr>
                        <th>Pilih</th>
                        <th>No DN</th>
                        <th>No Invoice</th>
                        <th>Tanggal Invoice</th>
                        <th>Tanggal DN</th>
                    </tr>
                </thead>
                    <tbody>
                        <?php foreach($dn as $i=>$data){ ?>
                        <tr>
                            <td>
                                <a role="button" class="green" data-toggle="modal" rel="tooltip" title="Klik untuk pilih Data Konsumen" onclick="setDataDn('<?php echo $data['no_dn']; ?>','<?php echo $data['no_invoice']; ?>','<?php echo $data['tanggal_invoice']; ?>','<?php echo $data['tanggal_dn']; ?>');"><button type="button" class="btn btn-icon waves-effect btn-light" data-dismiss="modal"><i class="fa fa-plus"></i></button></a>
                            </td>
                            <td><?php echo $data['no_dn']; ?></td>
                            <td><?php echo $data['no_invoice']; ?></td>
                            <td><?php echo $data['tanggal_invoice']; ?></td>
                            <td><?php echo $data['tanggal_dn']; ?></td>
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
     function setDataDn(no_dn,no_invoice,tanggal_invoice,tanggal_dn)
     {
        $('#no_dn').val(no_dn);
        $('#no_invoice').val(no_invoice);
        $('#tanggal_invoice').val(tanggal_invoice);
        $('#tanggal_dn').val(tanggal_dn);
    }

</script>


