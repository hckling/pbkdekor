<?php
	require_once dirname(__FILE__) . '/../Interfaces/IGuiElement.php';
	
	class Comment implements IGuiElement
	{
		public function getHtml() 
		{
			return 'Comment';
		}
	}
?>