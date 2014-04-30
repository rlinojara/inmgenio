<?php
class Inicio extends MY_Controller
{
	public function index()
	{
		$this->bievenida();
	}
	
	public function bievenida()
	{
		$data['view'] = 'inicio';
		
		$this->load->view('index.php',$data);
		
	}
	
	public function cerrar_sesion()
	{
		session_destroy();
		
		redirect('login/index');
	}
	
}