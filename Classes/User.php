<?php
	require_once dirname(__FILE__) . '/../Interfaces\IGuiElement.php';
	
	class User implements IGuiElement
	{
		public function getHtml() 
		{
			return 'User';
		}
	}
?>