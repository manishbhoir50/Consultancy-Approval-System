<?php
include("../assets/php_modules/common_methods.php");
include("../assets/php_modules/form_details.php");
include('../vendor/autoload.php');

$id = $_GET['id'];
$form = get_form_details($id);
$sdrn = $form['Sdrn'];
$status = 'approved';
$faculty = get_faculty_details($sdrn);

echo $id;
echo $form['Topic'];

$mpdf=new \Mpdf\mPDF();
$html=ob_get_contents();
$mpdf->writeHTML($html);
ob_clean();
$mpdf->output(time().".pdf",'I');

?>