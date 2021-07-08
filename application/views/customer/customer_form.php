<!-- Content Header (Page header) -->
<section class="content-header">
      <h1>
        Customer <small>Pelanggan</small>
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
            <div class="box-title"><?=ucfirst($page)?> customer</div>
            <div class="pull-right">
                <a href="<?=site_url('customer')?>" class="btn btn-warning btn-flat">
                    <i class="fa fa-arrow-circle-left"></i> Back
                </a>
              </div>
                <h3 class="box-title">
                    
                </h3>
                
            </div>
            
            </div>
            <div class="box-body">
                <div class="row">
                    <div class="col-md-4 col-md-offset-4">
                        <form action="<?=site_url('customer/process')?>" method="post">
                            <div class="form-group">
                                <label >customer Name *</label>
                                <input type="hidden" name="id" value="<?=$row->customer_id?>">
                                <input type="text" name="customer_name" value="<?=$row->name?>" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label >customer Gender *</label>
                                <label for=""></label>
                                <select name="gender" id="" class="form-control" required>
                                    <option value="">-Pilih-</option>
                                    <option value="L" <?=$row->gender == 'L' ? 'selected' : ''?>>Laki-Laki</option>
                                    <option value="P" <?=$row->gender == 'P' ? 'selected' : ''?>>Perempuan</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label >customer Phone *</label>
                                <input type="tel" name="phone" value="<?=$row->phone?>" class="form-control"  >
                            </div>
                            <div class="form-group">
                                <label >customer Address *</label>
                                <input type="text" name="addr" value="<?=$row->address?>" class="form-control"  required>
                            </div>
                            <div class="form-group">
                                <label >customer Email *</label>
                                <input type="text" name="email" value="<?=$row->email?>" class="form-control">
                            </div>
                            <div class="form-group">
                                <label >Nomor Meja *</label>
                                <input type="text" name="nomor_meja" value="<?=$row->nomor_meja?>" class="form-control" required>
                            </div>
                            <label >status Pesan Customer* </label>
                                <select name="status_pesan" id="" class="form-control" required>
                                    <option value="">- Pilih -</option>
                                    <option value="book" <?=$row->status_pesan == 'book' ? 'selected' : ''?>>Book</option>
                                    <option value="terkonfirmasi" <?=$row->status_pesan == 'terkonfirmasi' ? 'selected' : ''?>>Terkonfirmasi</option>
                                </select>
                            <div class="form-group">
                                <button type="submit" name="<?=$page?>" class="btn btn-success btn-flat">
                                <i class="fa fa-paper-plane"></i> Submit</button>
                                <button type="reset" class="btn btn-warning btn-flat">Reset</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            

        </div>

    </section>