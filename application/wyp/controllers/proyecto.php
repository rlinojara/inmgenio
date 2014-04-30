<?php
class Proyecto extends CI_Controller
{
	public function listar_proyecto()
	{		
		$data['view'] = 'proyecto/proyecto-list';
		$this->load->view('index',$data);
	}
	
	public function ingresar_proyecto()
	{
		$data['view'] = 'proyecto/proyecto-form';
		$this->load->view('index',$data);
	}
	
	public function editar_proyecto()
	{
		$data['view'] = 'proyecto/proyecto-form';
		$this->load->view('index',$data);
	}
	
	public function deshabilitar_proyecto()
	{
		
	}
	
	public function habilitar_proyecto()
	{
		
	}
}