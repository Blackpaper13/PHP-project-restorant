<!-- Content Header (Page header) -->
<section class="content-header">
      <h1>
        Customer <small>Pelanggan</small>
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
                                <th>customer_id</th>
                                <th>status Pesanan</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no=1; 
                            foreach($row->result() as $key =>$data) {?>
                            <tr>
                                <td style="width:5%;"><?=$no++?></td>
                                <td><?=$data->customer_id?>
                                <td><?php
                                        if($data->status == 0)
                                        {
                                            ?>
                                                <span class="badge badge-warning">Pending</span>
                                           <?php

                                        }
                                        else{
                                            $data->status == 1 ? '<span class="badge badge-success">Siap Saji</span>' : '<span class="badge badge-warning">masih Masak</span>';
                                        }
                                    ?></td>
                                </td>
                                <td>
                                  <a href="<?=site_url('order/edit/'.$data->customer_id)?>">Ubah Status Pesan</a>
                                </td>
                            </tr>
                            <?php }?>
                        </tbody>
                    </table>
                </div>
        </div>

    </section>