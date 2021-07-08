<!-- Content Header (Page header) -->
<section class="content-header">
      <h1>
        Items
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i></a></li>
        <li class="active">Menu Items</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <?php $this->view('messages')?>
        <div class="box">
            <div class="box-header">
            <div class="pull-right">
                <a href="<?=site_url('item/add')?>" class="btn btn-primary btn-flat">
                    <i class="fa fa-user-plus"></i> Create Menu Item 
                </a>
            </div>
                <h3 class="box-title">
                    Menu Items
                </h3>
                
            </div>
            
            </div>
            <div class="box-body table-responsive">
                    <table class="table table-bordered table-striped" id="table1">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th style="width:20%">barcode</th>
                                <th style="width:30%">Nama</th>
                                <th >Category</th>
                                <th >Unit</th>
                                <th>Price</th>
                                <th >Stock</th>
                                <th >Image</th>
                                <th style="width:50%" class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no=1; 
                            foreach($row->result() as $key =>$data) {?>
                            <tr>
                                <td style="width:5%;"><?=$no++?></td>
                                <td><?=$data->barcode?> <br>
                                    <a href="<?=site_url('item/barcode_qrcode/'.$data->item_id)?>" class="btn btn-default btn-xs text-center">
                                        Generate <i class="fa fa-barcode"></i>
                                    </a>
                                </td>
                                <td><?=$data->name?></td>
                                <td><?=$data->category_name?></td>
                                <td><?=$data->unit_name?></td>
                                <td><?=indo_currency($data->price)?></td>
                                <td><?=$data->stock?></td>
                                <td>
                                    <?php if($data->image != null) {?>
                                    <img src="<?=base_url('uploads/product/' .$data->image)?>" style="width: 100px">
                                    <?php }?>
                                </td>
                                <td class="text-center" width="120px">
                                    <a href="<?=site_url('item/edit/'.$data->item_id)?>" class="btn btn-info btn-xs">
                                    <i class="fa fa-pencil"></i> Update
                                    </a>
                                    <a href="<?=site_url('item/del/'.$data->item_id)?>" onclick="return confirm('Apakah anda Yakin Hapus?')" class="btn btn-danger btn-xs">
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