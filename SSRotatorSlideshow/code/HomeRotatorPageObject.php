<?php 
class HomeRotatorPageObject extends DataObject
{
	static $db = array (
		'Position' => "Enum('1, 2, 3, 4, 5, 6')"
		,'SlideTitle' => 'Text'
		,'SlideDescription' => 'Text'
		,'SlideDate' => 'Date'
		,'SlideLink' => 'Text'
		, 'Status' => 'Text'
		 
	);
	
   
     static $has_one = array(
	 'HomePage' => 'HomeRotatorPage',
		'SlideThumb' => 'Image',
		'SlideImage' => 'Image'
   );
	
 	static $has_many = array(

	);

	

	
	public function getRotatorCMSFields_forPopup()
	{
		if (class_exists('ImageUploadField')) {
		
		$slideImage = new ImageUploadField('SlideThumb',  $title = "Upload the thumbnail");
		$thumbImage = new ImageUploadField('SlideImage',  $title = "Upload the main image");
		$slideImage->setUploadFolder("homepage_rotator/");
		$thumbImage->setUploadFolder("homepage_rotator/");
		}
		else {
			$slideImage = new ImageField('SlideThumb',  $title = "Upload the thumbnail",null, null, null,"homepage_rotator/");
			$thumbImage = new ImageField('SlideImage',  $title = "Upload the main image",null, null, null,"homepage_rotator/");
			
		}
		
		
		return new FieldSet(
			new TextField('SlideTitle', 'Slide Title')
			,new TextareaField('SlideDescription', 'Slide Description')
			,new TextField('SlideLink', 'Slide Link')		
		, $slideImage
		, $thumbImage
		, new OptionsetField($name = "Status",
					   $title = "Status",
					   $source = array(
						  "active" => "Active",
						  "inactive" => "Inactive"
					   ),
					   "Status"
					)
		);
	}
	
	function ThumbnailLogo() {
		$Image = $this->SlideThumb();
		if ( $Image ) {
			return $Image->CMSThumbnail();
		} else {
			return null;
		}
	}
   
 }
 
 class HomeRotatorPageObject_Controller extends Controller	{


}

?>
