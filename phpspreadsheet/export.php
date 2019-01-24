<?php 
require 'vendor/autoload.php';
use phpoffice\phpSpreadsheet\Spreadsheet as Spreadsheet;
use phpoffice\phpSpreadsheet\Writer\xlsx as xlsx;
use phpoffice\phpSpreadsheet\IOFactory;

$spreadsheet = new spreadsheet();
$sheet = $spreadsheet->getActiveSheet();
$sheet->setcelvalue('A1','firstname');
$sheet->setcelvalue('B1','lastname');
$sheet->setcelvalue('C1','firstname');
$sheet->setcelvalue('D1','lastname');

$filename='sample-'.time().'.xlsx';
//redirect output to client
 header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
 header('Content-Disposition: attachment;filename="'.$filename.'"'); 
 header('Catch-Control: max-age=0');

?>