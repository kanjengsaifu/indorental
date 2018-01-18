<div class="content">
    <div class="container-fluid">

        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <h4 class="page-title float-left">Indorental</h4>

                    <ol class="breadcrumb float-right">
                        <li class="breadcrumb-item"><a href="#">Indorental</a></li>
                        <li class="breadcrumb-item"><a href="#">User</a></li>
                        <li class="breadcrumb-item active">Data User</li>
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
                        &nbsp;&nbsp;&nbsp;&nbsp;
                        <button type="button" class="btn btn-gradient waves-light waves-effect w-md" data-toggle="modal" data-target="#signup-modal">Add +</button>
                    </div>
                    <table id="datatable-buttons" class="table table-striped table-bordered" cellspacing="0" width="100%">
                        <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Username</th>
                            <th>Level User</th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                         <tbody>
                       <?php $no=1; foreach($user as $k){ ?>
                        <tr>
                            <td><?php echo $no++ ?></td>
                            <td><?php echo $k['nama_lengkap']; ?></td>
                            <td><?php echo $k['username']; ?></td>
                            <td><?php echo $k['nama_level']; ?></td>
                            <td>
                                <a href="<?php echo site_url('admin/user/edit/'.$k['id']); ?>"<i class="dripicons-document-edit"></i></a> &nbsp; 
                                <a href="<?php echo site_url('admin/user/remove/'.$k['id']); ?>"><i class="dripicons-trash"></i></a>
                            </td>
                        </tr>
                        <?php } ?>
                    </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!-- end row -->

        <div id="signup-modal" class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h5 class="modal-title" id="myLargeModalLabel">Tambah User</h5>
                </div>
                <div class="modal-body">
                       <form action="<?php echo base_url('admin/user/save') ?>" method="post" enctype="multipart/form-data" />

                        <div class="form-group row">
                            <label class="col-2 col-form-label" for="example-email">Level user</label>
                            <div class="col-10">
                               <select name="id_level_user" class="form-control">
                                    <option value="">Pilih Level User</option>
                                    <?php 
                                    foreach($all_level_user as $level_user)
                                    {
                                        $selected = ($level_user['id_level_user'] == $this->input->post('id_level_user')) ? ' selected="selected"' : "";

                                        echo '<option value="'.$level_user['id_level_user'].'" '.$selected.'>'.$level_user['id_level_user'].'</option>';
                                    } 
                                    ?>
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-2 col-form-label" for="example-email">Nama</label>
                            <div class="col-10">
                               <input type="text" class="form-control" required name="nama_lengkap" value="<?php echo $this->input->post('nama_lengkap'); ?>" />
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-2 col-form-label" for="example-email">Username</label>
                            <div class="col-10">
                               <input type="text" class="form-control" required name="username" value="<?php echo $this->input->post('username'); ?>" />
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-2 col-form-label" for="example-email">Password</label>
                            <div class="col-10">
                               <input type="text" class="form-control" required name="password" value="<?php echo $this->input->post('password'); ?>" />
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-2 col-form-label" for="example-email"></label>
                            <div class="col-10">
                               <button class="btn btn-gradient waves-light waves-effect w-md" type="submit">Save</button>
                            </div>
                        </div>

                    </div>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->

    </div> <!-- container -->

</div> <!-- content -->

