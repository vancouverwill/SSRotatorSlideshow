<?php
class HomeRotatorPage extends Page {

	public static $db = array(
	);

	public static $has_one = array(
	);
	
	static $has_many = array (
		'Rotators' => 'HomeRotatorPageObject'
	);
		
	function getCMSFields()
	{

		$projectFields = parent::getCMSFields();

		$tablefield = new ComplexTableField(
		//$tablefield = new DataObjectManager(
			 $this,					// Controller
			 'Rotators',				// Source name
			 'HomeRotatorPageObject',				// Source class
			 array(
			// 'ID' => 'ID',
	//		'Position' => 'Position',
			'SlideTitle' => 'Title',
	/*		'SlideDate' => 'Date',*/
			'ThumbnailLogo' => 'Thumbnail',
			'SlideLink' => 'Link'
		/*	'IsActive' => 'Status'*/
			 ),
			 'getRotatorCMSFields_forPopup'
		  );
		  
	//	$tablefield->removePermission("delete");
		//Permissions possible values are "show","edit", "delete" and "add".
		$tablefield->setPermissions(array('show','edit', 'add', 'delete')) ;
		$projectFields->addFieldToTab( 'Root.Content.Rotator', $tablefield );
			
		return $projectFields;
	}

}
class HomeRotatorPage_Controller extends Page_Controller {

	public static $allowed_actions = array (
	);

	public function init() {
		parent::init();
		 Validator::set_javascript_validation_handler('none');   
		 Requirements::set_write_js_to_body(false); 
	//	Requirements::themedCSS('MainRotator'); 
		Requirements::css("SSRotatorSlideshow/css/MainRotator.css");
		Requirements::javascript("SSRotatorSlideshow/javascript/jquery-1.3.2.min.js");
		Requirements::javascript("SSRotatorSlideshow/javascript/rotateSetup.js");
		//$this->renderWith(array("/SSRotatorSlideshow/HomeRotatorPage"));
			
	}
}