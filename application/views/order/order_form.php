<!-- Content Header (Page header) -->
<section class="content-header">
      <h1>
        Customer <small>Pesanan</small>
      </h1>
      <form method="post" action="<?=site_url('order/approval/'.$get_id)?>">
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
                                <th>customer_id</th>
                                <th>nomor Meja</th>
                                <th>nama_pesanan</th>
                                <th>jumlah_pesanan</th>
                                <th>status</th>
                                <th>Approval</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $i =1;
                            foreach ($row->result() as $key =>$cari) {
                                ?>
                                <input type="hidden" name="[<?= $i ?>]" value="<?=$cari->kode?>">
                            <tr>
                                <td><?=$cari->customer_id?>
                                </td>
                                <td><?=$cari->nomor_meja?></td>
                                <td><?=$cari->nama_pesanan?></td>
                                <td><?=$cari->jumlah_pesanan?></td>
                                <td>
                                    <?php
                                        if($cari->status == 0)
                                        {
                                            ?>
                                                <span class="badge badge-warning">Pending</span>
                                           <?php

                                        }
                                        else{
                                            $row->status == 1 ? '<span class="badge badge-success">Siap Saji</span>' : '<span class="badge badge-warning">masih Masak</span>';
                                        }
                                    ?>
                                </td>
                                <td>
                                        <label>
                                            <input type="radio" name="status[<?= $i ?>]" value="1" required> Siap Saji
                                        </label>
                                        <label>
                                            <input type="radio" name="status[<?= $i ?>]" value="2" required> Lagi Masak
                                        </label>
                                </td>
                            </tr>
                            <?php $i++; }?>
                        </tbody>
                    </table>
                </div>
                <div class="card-footer text-right">
                        <a href="<?=site_url('order')?>" class="btn btn-secondary">Cancel</a>
                        <button type="submit" class="">Approval</button>
                </div>
          </form>
        </div>

    </section>