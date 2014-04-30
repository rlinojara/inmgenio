<?php
class Proyecto extends MY_Controller
{
	public function listar_proyecto()
	{		
		$this->load->library('pagination');
		$this->load->model('proyecto_model');
		
		$config['base_url'] = site_url('proyecto/listar_proyecto/');
		$config['total_rows'] = $this->proyecto_model->cantidad_total_proyectos();
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
		
		$data['proyectos'] = $this->proyecto_model->
								    paginacion_proyecto($parametros);
		
		$data['paginacion'] =  $this->pagination->create_links();
		
		$data['pagina'] = $this->uri->segment(3,'');
		
		$data['view'] = 'proyecto/proyecto-list';
		
		$this->load->view('index',$data);
	}
	
	public function registrar_proyecto()
	{
		$data['url_form'] = 'proyecto/set_registrar_proyecto';
		$data['titulo'] = 'Registro';
		$data['view'] = 'proyecto/proyecto-form';
		$this->load->view('index',$data);
	}
	
	public function editar_proyecto()
	{
		$this->load->model('proyecto_model');
		
		$data['view'] = 'proyecto/proyecto-form';
		
		if( $this->uri->segment(3,0) > 0 )
		{
			$parametro = array($this->uri->segment(3,0));
				
			$data['proyecto'] = $this->proyecto_model->obtener_proyecto_por_id($parametro);
				
			$data['id'] = $this->uri->segment(3,0);
				
			$data['url_form'] = 'proyecto/set_editar_proyecto';
				
			$data['titulo'] = 'Edici&oacute;n';
				
			$this->load->view('index',$data);
		}
		else
		{
			redirect('proyecto/registrar_proyecto');
		}

	}
	
	public function deshabilitar_proyecto()
	{
		
	}
	
	public function habilitar_proyecto()
	{
		
	}
}