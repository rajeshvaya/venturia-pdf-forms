<?php

// configurations
error_reporting(E_ALL);

//declarations
define('PDFTK_SERVER_PATH', '/usr/local/bin/pdftk '); //ensure to add a trailing space. To find the server path of your server, in terminal type "which pdftk"

//include
require_once('lib/Command2.php');
require_once('lib/File.php');
require_once('lib/Command.php');
require_once('lib/Pdf.php');
require_once('lib/FdfFile.php');

use mikehaertl\pdftk\Pdf;

function get_fields(){
	
	//file to read
	$file = "./sample/sample_venturia.pdf";

	// Get form data fields
	$pdf = new Pdf($file);
	$data = $pdf->getDataFields();
	echo nl2br($data);
}


function fill_form(){
	//file to read
	$file = "./sample/sample_venturia.pdf";

	//create the pdf object
	$pdf = new Pdf($file);

	//fill the field value as an array 
	$pdf->fillForm(array(
		'topmostSubform[0].Page3[0].Q1_Last_Name[0]'=>'Vaya',
		'topmostSubform[0].Page3[0].Q2_Your_first_name[0]' => 'Rajesh',

	));
	$t = time();
    $pdf->flatten()->saveAs("filled/filled_{$t}.pdf");
}


fill_form();



?>