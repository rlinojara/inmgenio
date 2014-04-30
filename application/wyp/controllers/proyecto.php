<?php
class Proyecto extends MY_Controller
{
	public function listar_proyecto()
	{		
		$this->load->library('pagination');
		$this->load->model('usuario_model');
		
		$config['base_url'] = site_url('proyecto/listar_proyecto/');
		$config['total_rows'] = $this->usuario_model->cantidad_total_usuarios();
		$config['per_page'] = 1;
	
		
		$config['num_links'] = '2'; 

		$config['prev_link'] = 'anterior';
		
		$config['next_link'] = 'siguiente'; 
		
		$config['uri_segment'] = '3'; 
		
		$config['first_link'] = '<<';
		
		$config['last_link'] = '>>';
		
		$this->pagination->initialize($config);
		
		
		$parametros = array( 
							 
							 intval($this->uri->segment(3,0)),
							 intval($config['per_page'])
						   );
		
		$data['proyectos'] = $this->usuario_model->
								  paginacion_usuario($parametros);
		
		$data['paginacion'] =  $this->pagination->create_links();
		
		$data['pagina'] = $this->uri->segment(3,'');
		
		$data['view'] = 'proyecto/proyecto-list';
		
		$this->load->view('index',$data);
	}
	
	public function registrar_proyecto()
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