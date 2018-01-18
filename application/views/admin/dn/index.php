<div class="content">
    <div class="container-fluid">

        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <h4 class="page-title float-left">Indorental</h4>

                    <ol class="breadcrumb float-right">
                        <li class="breadcrumb-item"><a href="#">Indorental</a></li>
                        <li class="breadcrumb-item"><a href="#">DN</a></li>
                        <li class="breadcrumb-item active">Data DN</li>
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
                        &nbsp;&nbsp;&nbsp;&nbsp;<a href="<?php echo base_url('admin/dn/add');?>"><button type="button" class="btn btn-gradient waves-light waves-effect w-md">Add +</button></a>
                    </div>
                    <table id="datatable-buttons" class="table ">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>No DN</th>
                            <th>No Invoice</th>
                            <th>Konsumen</th>
                            <th>Tanggal DN</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <?php foreach($dn as $i=>$data){ ?>
                    <tbody>
                        <tr>
                            <td><?php echo ($i+1); ?></td>
                            <td><?php echo $data['no_dn']; ?></td>
                            <td><?php echo $data['no_invoice']; ?></td>
                            <td><?php echo $data['perusahaan']; ?></td> 
                            <td><?php echo $data['tanggal_dn']; ?></td>
                            <td>
                                <a href="<?php echo site_url('admin/dn/read/'.$data['id_dn']); ?>"><i class="dripicons-preview"></i></a> &nbsp;
                                <a href="<?php echo site_url('admin/dn/edit/'.$data['id_dn']); ?>"><i class="dripicons-document-edit"></i></a> &nbsp;
                                <a href="<?php echo site_url('admin/dn/delete/'.$data['id_dn']); ?>"><i class="dripicons-trash"></i></a>
                            </td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>

                </div>
            </div>
        </div>
        <!-- end row -->

    </div> <!-- container -->

</div> <!-- content -->






