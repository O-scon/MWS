<?php
require_once __DIR__ . "/PHPExcel/Classes/PHPExcel.php";
// Load an existing spreadsheet
$phpExcel = PHPExcel_IOFactory::load('A1.csv');
// Get the first sheet
$sheetpp = $phpExcel ->getActiveSheet();
$myfile = fopen("100luk.txt", "w") or die("Unable to open file!");//yeni text dosyasi ac
$txt = "\n"; //alt satir icin
$txt2 ="  ";//bir tab bosluk icin
$a=1;

for($i2=1; $i2<=12000;$i2++){ //600 sayisini kac tane entry varsa onu 100e bolup degisebilirsin
  for ($i = 1; $i <= 100; $i++) {

    $row = $sheetpp->getRowIterator($a)->current();
    $cellIterator = $row->getCellIterator();
    $cellIterator->setIterateOnlyExistingCells(false);

    foreach ($cellIterator as $cell) {
        // echo $cell->getValue();
        fwrite($myfile, $cell->getValue());
        fwrite($myfile, $txt2);
        //echo "    ";
    }
    echo $cellIterator->getCell()->getValue();
    //echo "<br>";
    $a++;
  }
  //echo "<br>";
  fwrite($myfile, $txt);
  fwrite($myfile, $txt);
  $a= ($a-100)+5; 
}

fclose($myfile);
?>

