<?php
class MY_Controller extends CI_Controller 
{
	public $sesion_usuario;
		
	public function __construct()
	{
		parent::__construct();
		
		if( isset($_SESSION['usuario']) )
		{
			$this->sesion_usuario = $_SESSION['usuario'];	
		}
		else 
		{
			redirect('login');
		}
		
	}
	
	
}

?>