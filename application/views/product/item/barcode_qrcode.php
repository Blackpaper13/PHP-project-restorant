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
            <div class="box-title">Barcode Generator</div>
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
                 <?php
                $generator = new Picqer\Barcode\BarcodeGeneratorPNG();
                echo '<img src="data:image/png;base64,' . base64_encode($generator->getBarcode($row->barcode, $generator::TYPE_CODE_128)) . '">';
                ?>
                <br class="text-right">
                <?=$row->barcode?>
            </div>


            <div class="box-body">
                <img src="<?=base_url('uploads/qr-code/qrcode-'.$row->item_id.'.png')?>" alt="">
                <br class="text-right">
                <?=$row->barcode?>
            </div>
            

        </div>

    </section>