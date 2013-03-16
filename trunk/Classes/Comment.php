<?php
	include '..\Interfaces\IGuiItem.php';
	
	class Comment implements IGuiElement
	{
		public function getHtml() 
		{
			return 'Comment';
		}
	}
?>