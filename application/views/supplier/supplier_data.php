<!-- Content Header (Page header) -->
<section class="content-header">
      <h1>
        Supplier
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i></a></li>
        <li class="active">Pemasok Barang</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

        <div class="box">
            <div class="box-header">
            <div class="pull-right">
                <a href="<?=site_url('supplier/add')?>" class="btn btn-primary btn-flat">
                    <i class="fa fa-user-plus"></i> Create 
                </a>
                
            </div>
                <h3 class="box-title">
                    Data Users
                </h3>
                
            </div>
            
            </div>
            <div class="box-body table-responsive">
                    <table class="table table-bordered table-striped" id="table1">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Nama</th>
                                <th>Phone</th>
                                <th>Address</th>
                                <th>Description</th>
                                <th>Stock Kotor (Kg)</th>
                                <th>Tanggal Masuk Barang</th>
                                <th>Tanggal Update Barang</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no=1; 
                            foreach($row->result() as $key =>$data) {?>
                            <tr>
                                <td style="width:5%;"><?=$no++?></td>
                                <td><?=$data->name?></td>
                                <td><?=$data->phone?></td>
                                <td><?=$data->address?></td>
                                <td><?=$data->description?></td>
                                <td><?=$data->stock_kotor?></td>
                                <td><?=$data->created?></td>
                                <td><?=$data->updated?></td>
                                <td class="text-center" width="120px">
                                    <a href="<?=site_url('supplier/edit/'.$data->supplier_id)?>" class="btn btn-info btn-xs">
                                    <i class="fa fa-pencil"></i> Update
                                    </a>
                                   <!-- <a href="<?=site_url('supplier/del/'.$data->supplier_id)?>" onclick="return confirm('Apakah anda Yakin Hapus?')" class="btn btn-danger btn-xs">
                                    <i class="fa fa-trash"></i> Delete
                                    </a>-->

                                    <a href="#modalDelete" data-toggle="modal" onclick="$('#modalDelete #formDelete').attr('action', '<?=site_url('supplier/del/'.$data->supplier_id)?>')" class="btn btn-danger btn-xs">
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

    <div class="modal fade" id="modalDelete">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data.dimiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <h4 class="modal-title">Yakin Anda akan Menghapus</h4>
                </div>
                <div class="modal-footer">
                        <form id="formDelete" action="" method="post">
                                <button class="btn btn-default" data-dismiss="modal">Cancel</button>
                                <button class="btn btn-danger" type="submit">Hapus</button>
                        </form>

                </div>
            </div>
        </div>
    </div>