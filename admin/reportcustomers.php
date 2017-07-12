<?php
require_once('tcpdf/examples/lang/eng.php');
require_once('tcpdf/tcpdf.php');
include'../db.php';
require_once('../auth.php');
$sel=mysqli_query($con,"select * from customer where cust_id='".$_REQUEST['id']."'") or die(mysqli_error($con));

  $row=mysqli_fetch_array($sel,MYSQLI_ASSOC);
//create new PDF document
$pdf=new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

//set header and footer fonts
$pdf->setHeaderFont(array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$pdf->setHeaderFont(array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

//set monospaced font
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

//set margins
$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
$pdf->setHeaderMargin(PDF_MARGIN_HEADER);
$pdf->setHeaderMargin(PDF_MARGIN_FOOTER);

//set auto page breaks
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

//set image scale factor
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

//set some Language-dependent strings
$pdf->setLanguageArray($l);

//set document information
//set font
$pdf->SetFont('helvetica', '8', 16);

//add a page
$pdf->AddPage();

$pdf->Write(0, $row['customer_fname'].' '.$row['customer_lname'],'',0,'L',true,0,false,false,0);

$pdf->SetFont('helvetica', '', 8);

$pdf->SetCreator(PDF_CREATOR);

$tbl_header = '<style>
table {
   border-collapse: collapse;
   border-spacing: 0;
   margin: 0 5px;
   width:670px;
}
tr {
   padding: 3px 0;
}

th {
   background-color: #CCCCCC;
   border: 1px solid #F5820F;
   color: #333333;
   font-family: trebuchet MS;
   font-size: 8px;
   padding-bottom: 4px;
   padding-left: 6px;
   padding-top: 5px;
   text-align: left;
}
td {
   background-color: #EEEEEE;
   border: 1px solid #F5820F;
   font-size: 12px;
   color: #5511FF;
   padding: 3px 7px 2px;
}
</style>
<table id="gallerytab"  cellspacing="0" cellpadding="7" border="0">
';
$tbl_footer = '</table>';
$tbl = '';

	 
$tbl .= '
   <tr><td><strong>Name:</strong></td><td>'.$row['customer_fname'].' '.$row['customer_lname'].'</td></tr>
    <tr><td><strong>Email:</strong></td><td>'.$row['customer_email'].'</td></tr>
	   <tr><td><strong>Contact:</strong></td><td>'.$row['customer_contact'].'</td></tr>
	   <tr><td><strong>Address:</strong></td><td>'.$row['customer_address'].'</td></tr>';
	   
// output the HTML content
$pdf->writeHTML($tbl_header . $tbl . $tbl_footer, true, false, false, false, '');

$pdf->Output($row['customer_fname'].'_'.$row['customer_lname'].'.pdf', 'I');
?>