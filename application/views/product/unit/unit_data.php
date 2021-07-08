<!-- Content Header (Page header) -->
<section class="content-header">
      <h1>
        Unit
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i></a></li>
        <li class="active">Unit Satuan Barang</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <?php $this->view('messages')?>
        <div class="box">
            <div class="box-header">
            <div class="pull-right">
                <a href="<?=site_url('unit/add')?>" class="btn btn-primary btn-flat">
                    <i class="fa fa-user-plus"></i> Create 
                </a>
                
            </div>
                <h3 class="box-title">
                   Data Units
                </h3>
                
            </div>
            
            </div>
            <div class="box-body table-responsive">
                    <table class="table table-bordered table-striped" id="table1">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th style="width:50%;">Nama</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no=1; 
                            foreach($row->result() as $key =>$data) {?>
                            <tr>
                                <td style="width:5%;"><?=$no++?></td>
                                <td><?=$data->name?></td>
                                <td class="text-center" width="120px">
                                    <a href="<?=site_url('unit/edit/'.$data->unit_id)?>" class="btn btn-info btn-xs">
                                    <i class="fa fa-pencil"></i> Update
                                    </a>
                                    <a href="<?=site_url('unit/del/'.$data->unit_id)?>" onclick="return confirm('Apakah anda Yakin Hapus?')" class="btn btn-danger btn-xs">
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