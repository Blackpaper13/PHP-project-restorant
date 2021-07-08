<!-- Content Header (Page header) -->
<section class="content-header">
      <h1>
        Pekerja
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i></a></li>
        <li class="active">Users</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

        <div class="box">
            <div class="box-header">
            <div class="pull-right">
                <a href="<?=site_url('user/add')?>" class="btn btn-primary btn-flat">
                    <i class="fa fa-user-plus"></i> Create 
                </a>
                <div class="navbar-form navbar-left">
            </div>
            </div>
                <h3 class="box-title">
                    Data Karyawan AKB
                </h3>
                
            </div>
            
            </div>
            <div class="box-body table-responsive">
                    <table class="table table-bordered table-striped" id="table1">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>username</th>
                                <th>Nama</th>
                                <th>Alamat</th>
                                <th>Level</th>
                                <th>Tanggal Gabung</th>
                                <th>Status kerja</th>
                                <th style="width:5%;">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no=1; 
                            foreach($row->result() as $key =>$data) {?>
                            <tr>
                                <td><?=$no++?></td>
                                <td><?=$data->username?></td>
                                <td><?=$data->name?></td>
                                <td><?=$data->address?></td>
                                <td><?=$data->level == 1 ? 'Admin' :($data->level == 2 ? 'Kasir' : ($data->level == 3 ? 'chef' :($data->level == 4 ? 'Owner' : 'Waiter'))); ?></td>
                                <td><?=$data->tanggal_masuk?></td>
                                <td><?=$data->status_kerja == 0 ? 'Online' : 'Offline'?></td>
                                <td class="text-center" width="120px">
                                    <a href="<?=site_url('user/edit/'.$data->user_id)?>" class="btn btn-info btn-xs">
                                    <i class="fa fa-pencil"></i> Update
                                    </a>
                                    <form action="<?=site_url('user/del')?>" method="post">
                                    <input type="hidden" name="user_id" value="<?=$data->user_id?>">
                                        <button onclick="return confirm('Apakah anda Yakin Hapus datanya?')" type="submit" class="btn btn-danger btn-xs">
                                             <i class="fa fa-trash"></i> Delete
                                        </button>
                                    </form>
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