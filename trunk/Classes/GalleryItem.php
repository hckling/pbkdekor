<?php
	include '..\Interfaces\IGuiItem.php';
	
	class GalleryItemType
	{
		const Watercolour = 0;
		const Oil = 1;
		const Illustration = 2;
	}
	
	class GalleryItem implements IGuiElement
	{
		public function getHtml() 
		{
			return 'GalleryItem';
		}
	}
?>