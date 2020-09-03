<?php
require_once __DIR__ . "/PHPExcel/Classes/PHPExcel.php";

// Load an existing spreadsheet
$phpExcel = PHPExcel_IOFactory::load('A1.csv');
// Get the first sheet
$sheetpp = $phpExcel ->getActiveSheet();
$a=101;
$myfile = fopen("5lik.txt", "w") or die("Unable to open file!");
$txt = "\n";
$txt2 ="  ";

for($i2=1; $i2<=12000;$i2++){
  for ($i = 1; $i <= 5; $i++) {

    $row = $sheetpp->getRowIterator($a)->current();

    $cellIterator = $row->getCellIterator();
    $cellIterator->setIterateOnlyExistingCells(false);

    foreach ($cellIterator as $cell) {
        echo $cell->getValue();
        fwrite($myfile, $cell->getValue());
        fwrite($myfile, $txt2);
        echo "    ";
    }
    fwrite($myfile, $txt);
    echo "<br>";
    $a++;
  }
  echo "<br>";
  fwrite($myfile, $txt);
  //$a= $a+5; 
}

fclose($myfile);
?>

?>

