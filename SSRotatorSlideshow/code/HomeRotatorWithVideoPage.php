<?php
class HomeRotatorWithVideoPage extends HomeRotatorPage {

	public static $db = array(
	'videoColumn' => 'HTMLText'
	);

	public static $has_one = array(
		'homePageVideo' => 'File'
	);
	
	static $has_many = array (
		// 'Rotators' => 'HomeRotatorPageObject'
		
	);
		
	function getCMSFields()
	{

		$projectFields = parent::getCMSFields();
		
		$homePageVideo = new FileUploadField('homePageVideo',  $title = "Upload the video");
		//$homePageVideo->setFileTypes(array('swf'));

		//$projectFields->addFieldToTab( 'Root.Content.Slider', $homePageVideo  );
		
		$projectFields->addFieldToTab('Root.Content.Video', new HtmlEditorField('videoColumn', 'Video Column'));

		/*   $tablefield = new ComplexTableField(
		//$tablefield = new DataObjectManager(
			 $this,					// Controller
			 'Rotators',				// Source name
			 'HomeRotatorPageObject',				// Source class
			 array(
			// 'ID' => 'ID',
	//		'Position' => 'Position',
			'SlideTitle' => 'Title',
	//		'SlideDate' => 'Date',
			'ThumbnailLogo' => 'Thumbnail',
			'SlideLink' => 'Link'
			//'IsActive' => 'Status'
			 ),
			 'getRotatorCMSFields_forPopup'
		  );
		  
	//	$tablefield->removePermission("delete");
		//Permissions possible values are "show","edit", "delete" and "add".
		$tablefield->setPermissions(array('show','edit', 'add')) ;
		$projectFields->addFieldToTab( 'Root.Content.Rotator', $tablefield );  */
			
		return $projectFields;
	}

}
class HomeRotatorWithVideoPage_Controller extends HomeRotatorPage_Controller {

	public static $allowed_actions = array (
	);

	public function init() {
		parent::init();
		
			
	}

	public function getHomePageVideo(){
		return $this->homePageVideo()->Filename;
}
}
