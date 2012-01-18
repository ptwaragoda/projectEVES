<?php if(!defined('BASEPATH')) exit('No direct script access allowed');
class Media extends CI_Controller {

	function __construct()
	{
		parent::__construct();
	}
	
	function browse()
	{
		prettyPrint($_GET);exit;
		// Required: anonymous function reference number as explained above.
		$funcNum = $_GET['CKEditorFuncNum'] ;
		// Optional: instance name (might be used to load a specific configuration file or anything else).
		$CKEditor = $_GET['CKEditor'] ;
		// Optional: might be used to provide localized messages.
		$langCode = $_GET['langCode'] ;
		 
		// Check the $_FILES array and save the file. Assign the correct path to a variable ($url).
		$url = base_url().'public/admin/css/redmond/images/ui-bg_flat_0_aaaaaa_40x100.png';
		// Usually you will only assign something here if the file could not be uploaded.
		$message = '';
		 
		echo "<script type='text/javascript'>window.parent.CKEDITOR.tools.callFunction($funcNum, '$url', '$message');</script>";
		
	}

	function upload()
	{
		echo "Upload!";
	}
}