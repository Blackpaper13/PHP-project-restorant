<!-- Content Header (Page header) -->
<section class="content-header">
      <h1>
        meja <small>Pelanggan</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i></a></li>
        <li class="active"></li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

        <div class="box">
            <div class="box-header">
            <div class="pull-right">
                <a href="<?=site_url('meja/add')?>" class="btn btn-primary btn-flat">
                    <i class="fa fa-user-plus"></i> Create 
                </a>
                <div class="navbar-form navbar-left">
            </div>
            </div>
                
            </div>
            
            </div>
            <div class="box-body table-responsive">
                    <table class="table table-bordered table-striped" id="table1">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Nomor Meja</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no=1; 
                            foreach($row->result() as $key =>$data) {?>
                            <tr>
                                <td style="width:5%;"><?=$no++?></td>
                                <td><?=$data->nomor_meja?>
                                </td>
                                <td class="text-center" width="120px">
                                    <a href="<?=site_url('meja/edit/'.$data->meja_id)?>" class="btn btn-info btn-xs">
                                        <i class="fa fa-pencil"></i> Update
                                    </a>
                                    <a href="<?=site_url('meja/del/'.$data->meja_id)?>" onclick="return confirm('Apakah anda Yakin Hapus?')" class="btn btn-danger btn-xs">
                                    <i class="fa fa-trash"></i> Delete
                                    </a>
                                </td>
                            </tr>
                            <?php }?>
                        </tbody>
                    </table>
                    </div>
            <div class="box-body">
            
            </div>

        </div>

    </section>