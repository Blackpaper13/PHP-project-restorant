<!-- Content Header (Page header) -->
<section class="content-header">
      <h1>
        Stock out <small> Bahan Keluar </small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i></a></li>
        <li class="active">Stock Out</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <?php $this->view('messages')?>
        <div class="box">
            <div class="box-header">
            <div class="pull-right">
                <a href="<?=site_url('stock/out/add')?>" class="btn btn-primary btn-flat">
                    <i class="fa fa-user-plus"></i> Add Stock Out
                </a>
            </div>
                <h3 class="box-title">
                    Data Categories
                </h3>
                
            </div>
            
            </div>
            <div class="box-body table-responsive">
                    <table class="table table-bordered table-striped" id="table1">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th style="width:20%">Barode</th>
                                <th>Product Items</th>
                                <th>Qty</th>
                                <th>Date</th>
                                <th style="text-center;">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1; 
                            foreach($row as $key => $data){?>
                                <tr>
                                    <td style="width:5%;"><?=$no++?>.</td>
                                    <td><?=$data->barcode?></td>
                                    <td><?=$data->item_name?></td>
                                    <td class="text-right"><?=$data->qty?></td>
                                    <td><?=indo_date($data->date)?></td>
                                    <td class="text-center" width="160px">
                                        <a href="<?=site_url('stock/out/del/'.$data->stock_id. '/' .$data->item_id)?>" onclick="return confirm('Apakah anda Yakin Hapus?')" class="btn btn-danger btn-xs">
                                            <i class="fa fa-trash"></i> Delete
                                        </a>
                                    </td>
                                </tr>
                            <?php }?>
                        </tbody>
                    </table>            
            </div>

        </div>

    </section>
