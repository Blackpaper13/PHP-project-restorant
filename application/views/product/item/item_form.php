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
            <div class="box-title"><?=ucfirst($page)?> item</div>
            <div class="pull-right">
                <a href="<?=site_url('item')?>" class="btn btn-warning btn-flat">
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
                        <?php echo form_open_multipart('item/process') ?>
                            <div class="form-group">
                                <label >Barcode *</label>
                                <input type="hidden" name="id" value="<?=$row->item_id?>">
                                <input type="text" name="barcode" value="<?=$row->barcode?>" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="product_name">Nama Menu *</label>
                                <input type="text" name="product_name" id="product_name" value="<?=$row->name?>" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label >Category *</label>
                                <select name="category" id="" class="form-control">
                                    <option value="">-Pilih-</option>
                                    <?php foreach($category->result() as $key => $data){?>
                                        <option value="<?=$data->category_id?>"><?=$data->name?></option>
                                   <?php } ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label >Unit *</label>
                                <?php echo form_dropdown('unit', $unit, $selected_unit, ['class' => 'form-control', 'required'=>'required'])?> 
                                
                            </div>
                            <div class="form-group">
                                <label >Price *</label>
                                <input type="number" name="price" value="<?=$row->price?>" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label > Image</label>
                                <?php if($page == 'edit'){
                                    if($row->image != null){?>
                                        <div style="margin: bottom 6px;">
                                        <img src="<?=base_url('uploads/product/' .$row->image)?>" style="width: 50%">
                                        </div>

                                        <?php
                                    }
                                }?>
                                <input type="file" name="image" class="form-control">
                                <small>Biarkan Kosong jika tidak <?=$page == 'edit' ? 'diganti' : 'ada'?></small>
                            </div>
                            <div class="form-group">
                                <button type="submit" name="<?=$page?>" class="btn btn-success btn-flat">
                                <i class="fa fa-paper-plane"></i> Submit</button>
                                <button type="reset" class="btn btn-warning btn-flat">Reset</button>
                            </div>
                        <?php echo form_close() ?>
                    </div>
                </div>
            </div>
            

        </div>

    </section>