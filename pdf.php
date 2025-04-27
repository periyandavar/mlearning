<?php
namespace Clegginabox\PDFMerger;

require($_SERVER['DOCUMENT_ROOT'].'/mlearning/PDFMerger.php');

$pdf = new PDFMerger;

$pdf->addPDF('1.pdf', '1, 3, 4')
    ->addPDF('2.pdf', '1-2')
    
    ->merge('file', 'TEST2.pdf'); // REPLACE 'file' WITH 'browser', 'download', 'string', or 'file' for output options

	?>