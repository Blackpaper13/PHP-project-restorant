<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Barcode Print</title>
</head>
    <body>
        <?php
            $generator = new Picqer\Barcode\BarcodeGeneratorPNG();
            echo '<img src="data:image/png;base64,' . base64_encode($generator->getBarcode($row->customer_id, $generator::TYPE_CODE_128)) . '">';
        ?>
            <br>
        <?=$row->customer_id?>
    </body>
</html>