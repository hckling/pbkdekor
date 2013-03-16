<?php
	include '..\Interfaces\IGuiItem.php';
	
	class NewsItem implements IGuiItem
	{
		public function getHtml()
		{
			return 'NewsItem';
		}
	}
?>