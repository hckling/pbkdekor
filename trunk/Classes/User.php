<?php
	include '..\Interfaces\IGuiItem.php';
	
	class User implements IGuiElement
	{
		public function getHtml() 
		{
			return 'User';
		}
	}
?>