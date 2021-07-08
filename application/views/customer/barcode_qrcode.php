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
            <!--<div class="box-title">Barcode GEnerator</div>-->
            <div class="pull-right">
                <a href="<?=site_url('customer')?>" class="btn btn-warning btn-flat">
                    <i class="fa fa-arrow-circle-left"></i> Back
                </a>
              </div>
            </div>
            <div class="box-body">
              <!--  <?php
                    $generator = new Picqer\Barcode\BarcodeGeneratorPNG();
                    echo '<img src="data:image/png;base64,' . base64_encode($generator->getBarcode($row->customer_id, $generator::TYPE_CODE_128)) . '">';
                ?>
                <br>
                <?=$row->customer_id?>
                <br><br>
                <a href="<?=site_url('customer/barcode_print/'.$row->customer_id)?>" target="_blank" class="btn btn-default btn-sm">
                     <i class="fa fa-print"></i> Print
                    </a>-->
            </div>
        </div>
            

        <div class="box no-border">
            <div class="box-header">
            <div class="box-title">Qr Code Generator <i class="fa fa-qrcode"></i></div>
            <div class="pull-right">
              </div>
            </div>
            <div class="box-body">
                <?php
                    $result = Endroid\QrCode\Builder\Builder::create()
                    ->writer(new Endroid\QrCode\Writer\PngWriter())
                    ->writerOptions([])
                    ->data($row->name)
                    ->encoding(new Endroid\QrCode\Encoding\Encoding('UTF-8'))
                    ->errorCorrectionLevel(new Endroid\QrCode\ErrorCorrectionLevel\ErrorCorrectionLevelHigh())
                    ->size(200)
                    ->margin(10)
                    ->roundBlockSizeMode(new Endroid\QrCode\RoundBlockSizeMode\RoundBlockSizeModeMargin())
                    ->build();

                    $result->saveToFile('uploads/qr-code/customer-'.$row->customer_id.'.png');
                    $dataUri = $result->getDataUri();
                    //header('Content-Type: '.$result->getMimeType());
                    //echo $result->getString();
                ?>
                <img src="<?=base_url('uploads/qr-code/customer-'.$row->customer_id.'.png')?>" alt="">
                <br>
                <?=$row->customer_id?>
                <br><br>
                  <a href="<?=site_url('customer/qrcode_print/'.$row->customer_id)?>" class="btn btn-default btn-sm">
                     <i class="fa fa-print"></i> Print
                  </a>
            </div>
        </div>
            

        </div>

    </section>