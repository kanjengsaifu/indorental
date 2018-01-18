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
                <div class="card-box table-responsive">
                    <div class="m-b-30">
                       <button class="btn btn-success" onclick="add_barang()"><i class="glyphicon glyphicon-plus"></i> Add Barang</button>
                        <button class="btn btn-default" onclick="reload_table()"><i class="glyphicon glyphicon-refresh"></i> Reload</button>
                        <br />
                        <br />
                    </div>
                    <table id="table" class="table table-striped table-bordered" cellspacing="0" width="100%">
                        <thead>
                        <tr>
                            <th>Kategori</th>
                            <th>Serial No</th>
                            <th>Nama Barang</th>
                            <th>Spek</th>
                            <th>Kondisi</th>
                            <th>Status</th>
                            <th style="width:150px;">Action</th>
                        </tr>
                        </thead>
                         <tbody>
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>Kategori</th>
                            <th>Serial No</th>
                            <th>Nama Barang</th>
                            <th>Spek</th>
                            <th>Kondisi</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </tfoot>
                    </table>
                </div>
            </div>
        </div>
        <!-- end row -->
    </div>
</div> <!-- content -->


<!-- DROPDOWN CHAIN -->
<script src="<?php echo base_url(); ?>assets/assets/js/jquery.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/assets/js/jquery.chained.min.js"></script>
<script type="text/javascript">
     $("#spek").chained("#kategori"); 
</script>
<script type="text/javascript">load();</script>
<script src="<?php echo base_url();?>assets/assets/js/jquery-1.11.2.min.js"></script>

<script src="<?php echo base_url('assets/assets/js/jquery-2.1.4.min.js')?>"></script>
<script src="<?php echo base_url('assets/assets/js/bootstrap.min.js')?>"></script>
<script src="<?php echo base_url('assets/assets/js/jquery.dataTables.min.js')?>"></script>
<script src="<?php echo base_url('assets/assets/js/dataTables.bootstrap.min.js')?>"></script>

<script type="text/javascript">
 
var save_method; //for save method string
var table;
var base_url = '<?php echo base_url();?>';
 
$(document).ready(function() {
 
    //datatables
    table = $('#table').DataTable({ 
 
        "processing": true, //Feature control the processing indicator.
        "serverSide": true, //Feature control DataTables' server-side processing mode.
        "order": [], //Initial no order.
 
        // Load data for the table's content from an Ajax source
        "ajax": {
            "url": "<?php echo site_url('admin/barang/ajax_list')?>",
            "type": "POST"
        },
 
        //Set column definition initialisation properties.
        "columnDefs": [
            { 
                "targets": [ -1 ], //last column
                "orderable": false, //set not orderable
            },
            { 
                "targets": [ -2 ], //2 last column (photo)
                "orderable": false, //set not orderable
            },
        ],
 
    });
 
    //set input/textarea/select event when change value, remove class error and remove text help block 
    $("input").change(function(){
        $(this).parent().parent().removeClass('has-error');
        $(this).next().empty();
    });
    
});
 
function add_barang()
{
    save_method = 'add';
    $('#form')[0].reset(); // reset form on modals
    $('.form-group').removeClass('has-error'); // clear error class
    $('.help-block').empty(); // clear error string
    $('#modal_form').modal('show'); // show bootstrap modal
    $('.modal-title').text('Add Barang'); // Set Title to Bootstrap modal title
}
 
function edit_barang(id)
{
    save_method = 'update';
    $('#form')[0].reset(); // reset form on modals
    $('.form-group').removeClass('has-error'); // clear error class
    $('.help-block').empty(); // clear error string
 
 
    //Ajax Load data from ajax
    $.ajax({
        url : "<?php echo site_url('admin/barang/ajax_edit')?>/" + id,
        type: "GET",
        dataType: "JSON",
        success: function(data)
        {
 
            $('[name="id"]').val(data.id);
            $('[name="kategori"]').val(data.kategori);
            $('[name="serial_no"]').val(data.serial_no);
            $('[name="nama_barang"]').val(data.nama_barang);
            $('[name="spek"]').val(data.spek);
            $('[name="kondisi"]').val(data.kondisi);
            $('[name="status"]').val(data.status);
            $('#modal_form').modal('show'); // show bootstrap modal when complete loaded
            $('.modal-title').text('Edit Kategori'); // Set title to Bootstrap modal title
        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            alert('Error get data from ajax');
        }
    });
}
 
function reload_table()
{
    table.ajax.reload(null,false); //reload datatable ajax 
}
 
function save()
{
    $('#btnSave').text('saving...'); //change button text
    $('#btnSave').attr('disabled',true); //set button disable 
    var url;
 
    if(save_method == 'add') {
        url = "<?php echo site_url('admin/barang/ajax_add')?>";
    } else {
        url = "<?php echo site_url('admin/barang/ajax_update')?>";
    }
 
    // ajax adding data to database
 
    var formData = new FormData($('#form')[0]);
    $.ajax({
        url : url,
        type: "POST",
        data: formData,
        contentType: false,
        processData: false,
        dataType: "JSON",
        success: function(data)
        {
 
            if(data.status) //if success close modal and reload ajax table
            {
                $('#modal_form').modal('hide');
                reload_table();
            }
            else
            {
                for (var i = 0; i < data.inputerror.length; i++) 
                {
                    $('[name="'+data.inputerror[i]+'"]').parent().parent().addClass('has-error'); //select parent twice to select div form-group class and add has-error class
                    $('[name="'+data.inputerror[i]+'"]').next().text(data.error_string[i]); //select span help-block class set text error string
                }
            }
            $('#btnSave').text('save'); //change button text
            $('#btnSave').attr('disabled',false); //set button enable 
 
 
        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            alert('Error adding / update data');
            $('#btnSave').text('save'); //change button text
            $('#btnSave').attr('disabled',false); //set button enable 
 
        }
    });
}
 
function delete_barang(id)
{
    if(confirm('Are you sure delete this data?'))
    {
        // ajax delete data to database
        $.ajax({
            url : "<?php echo site_url('admin/barang/ajax_delete')?>/"+id,
            type: "POST",
            dataType: "JSON",
            success: function(data)
            {
                //if success reload ajax table
                $('#modal_form').modal('hide');
                reload_table();
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                alert('Error deleting data');
            }
        });
 
    }
}
 
</script>

<!-- DROPDOWN CHAIN -->
<script src="<?php echo base_url(); ?>assets/assets/js/jquery.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/assets/js/jquery.chained.min.js"></script>
<script type="text/javascript">
     $("#spek").chained("#kategori"); 
</script>
<script type="text/javascript">load();</script>
<script src="<?php echo base_url();?>assets/assets/js/jquery-1.11.2.min.js"></script>

<div class="modal fade" id="modal_form" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h3 class="modal-title">Form Barang</h3>
            </div>
            <div class="modal-body form">
                <form action="#" id="form" class="form-horizontal">
                    <input type="hidden" value="" name="id_kategori"/> 
                    <div class="form-body">
                        <div class="form-group">
                            <label class="control-label col-md-3">Kategori</label>
                            <div class="col-12">
                               <select class="form-control select2" name="kategori" id="kategori" style="width: 100%;" required="">
                                    <?php foreach($listkategori as $value)   {   ?>
                                    <option value="<?php echo $value['id_kategori']?>"><?php echo $value['kategori']?></option>
                                    <?php } ?>
                                </select>
                                <span class="help-block"></span>
                            </div>
                        </div>

                         <div class="form-group m-b-25">
                                <div class="col-12">
                                    <label for="serial_no">Serial No</label>
                                    <input class="form-control" type="text" id="serial_no" name="serial_no" required="" placeholder="Serial No">
                                    <span class="help-block"></span>
                                </div>
                            </div>

                            <div class="form-group m-b-25">
                                <div class="col-12">
                                    <label for="nama_barang">Nama Barang</label>
                                    <input class="form-control" type="text" required="" id="nama_barang" name="nama_barang" placeholder="Nama Barang">
                                    <span class="help-block"></span>
                                </div>
                            </div>

                             <div class="form-group m-b-25">
                                <div class="col-12">
                                    <label for="nama_barang">Spek</label>
                                     <select class="form-control select2" name="spek" id="spek" required="" >
                                    <?php foreach($listspek as $row) { ?>
                                    <option value="<?php echo $row->id_spek?>" class="<?php echo $row->id_kategori; ?>"> <?php echo $row->spek?></option>
                                    <?php } ?>
                                    </select>
                                    <span class="help-block"></span>
                                </div>
                            </div>

                             <div class="form-group m-b-25">
                                <div class="col-12">
                                    <label for="nama_barang">Kondisi</label>
                                   <select class="form-control select2" name="kondisi" id="kondisi" required="" >
                                        <option value="Baik">Baik</option>
                                        <option value="Rusak">Rusak</option>
                                    </select>
                                    <span class="help-block"></span>
                                </div>
                            </div>

                             <div class="form-group m-b-25">
                                <div class="col-12">
                                    <label for="status">Status</label>
                                    <select class="form-control select2" name="status" id="status" required="" >
                                        <option value="Tersedia">Tersedia</option>
                                        <option value="Keluar">Keluar</option>
                                        <span class="help-block"></span>
                                    </select>
                                </div>
                            </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" id="btnSave" onclick="save()" class="btn btn-primary">Save</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
</div><!-- /.modal -->
</div><!-- /.modal -->