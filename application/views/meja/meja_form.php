<!-- Content Header (Page header) -->
<section class="content-header">
      <h1>
        meja <small>Pelanggan</small>
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
            <div class="box-title"><?=ucfirst($page)?> meja</div>
            <div class="pull-right">
                <a href="<?=site_url('meja')?>" class="btn btn-warning btn-flat">
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
                        <form action="<?=site_url('meja/process')?>" method="post">
                            <div class="form-group">
                                <label >meja Name *</label>
                                <input type="hidden" name="id" value="<?=$row->meja_id?>">
                                <input type="text" name="nomor_meja" value="<?=$row->nomor_meja?>" class="form-control" required>
                            </div>
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