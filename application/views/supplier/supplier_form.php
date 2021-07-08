<!-- Content Header (Page header) -->
<section class="content-header">
      <h1>
        Supplier
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i></a></li>
        <li class="active">Data Supplier</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

        <div class="box">
            <div class="box-header">
            <div class="box-title"><?=ucfirst($page)?> Supplier</div>
            <div class="pull-right">
                <a href="<?=site_url('supplier')?>" class="btn btn-warning btn-flat">
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
                        <form action="<?=site_url('supplier/process')?>" method="post">
                            <div class="form-group">
                                <label >Supplier Name *</label>
                                <input type="hidden" name="id" value="<?=$row->supplier_id?>">
                                <input type="text" name="supplier_name" value="<?=$row->name?>" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label >Supplier Phone *</label>
                                <input type="tel" name="phone" value="<?=$row->phone?>" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label >Supplier Address *</label>
                                <input type="text" name="addr" value="<?=$row->address?>" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label >Supplier Description *</label>
                                <textarea name="desc"class="form-control" required cols="30" rows="10"><?=$row->description?></textarea>
                            </div>
                            <div class="form-group">
                                <label >Jumlah Supplier Stock Datang *</label>
                                <input type="text" name="stock_kotor" value="<?=$row->stock_kotor?>" class="form-control" required>
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