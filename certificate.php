<?php
include 'db/session.php';
if ($_SESSION['userinfo']['level'] < 5 || $_SESSION['userinfo']['type'] != 'user'){
    die("Forbidden Access");
}
//include 'db/db.php';
//require_once 'vendor\spipu\html2pdf\src\html2pdf.php';
//
//use Spipu\Html2Pdf\Html2Pdf;
//use Spipu\Html2Pdf\Exception\Html2PdfException;
//use Spipu\Html2Pdf\Exception\ExceptionFormatter;

require __DIR__.'/vendor/autoload.php';

use Spipu\Html2Pdf\Html2Pdf;
ob_start();
include 'certificate_render.php';
$content = ob_get_clean();
try {
    $html2pdf = new HTML2PDF('L', 'A4', 'en');//, true, 'UTF-8', array(25.4, 20.4, 25.4, 20.4));
    $lg = Array();
    $lg['a_meta_charset'] = 'UTF-8';
    $lg['a_meta_dir'] = 'ltr';
    $lg['a_meta_language'] = 'fa';
    $lg['w_page'] = 'page';
    $html2pdf->pdf->setLanguageArray($lg);
    $html2pdf->WriteHTML($content);
}
catch (\Exception $e) {
    $html2pdf->clean();
    echo $e->getMessage();
}
ob_flush();
ob_end_clean();
$pdf= $html2pdf->output('certificate.pdf');
