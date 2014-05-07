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
	
	public function set_registrar_proyecto()
	{
		$this->load->library('upload');
		
		if ( $this->agent->is_referral() )
		{
			$this->load->model('proyecto_model');
		
			$nombre = trim($this->input->post('nombre'));
			$descripcion = trim($this->input->post('descripcion'));
			$img_logo = '';
			$direccion = trim($this->input->post('direccion'));
			$email = trim(strtolower($this->input->post('email')));
			$telefono = trim(strtolower($this->input->post('telefono')));

			$data = array();
			
			/**
			 * @see Validacion de proyecto
			 */
			$parametro = array($nombre);
			
			if( $this->proyecto_model->validar_proyecto($parametro) )
			{
				$data['error'] = 'Proyecto ya se encuentra registrado';
				$data['proceso_form'] = false;
			}
			else
			{
				/**
				 * Registrando proyecto
				 */
				$parametros = array($nombre,$descripcion,$direccion,$email,$telefono);
				$id_proyecto = $this->proyecto_model->registrar($parametros);
				$data['proceso_form'] = true;
			}
				
			/**
			 * @see Registrando la imagen principal
			 */
				
			$config['upload_path'] = 'upload/proyecto';
			$config['allowed_types'] = 'gif|jpg|png';
			$config['file_name'] = 'img_principal_'.$id_proyecto;
			$config['overwrite'] = true;
			$config['max_size']	= '100';
			$config['max_width']  = '1024';
			$config['max_height']  = '768';
				
			$this->upload->initialize($config);
				
			if ( !$this->upload->do_upload('img_principal') )
			{
				$error = array('error' => $this->upload->display_errors());
			}
			else
			{
				$data = array('upload_data' => $this->upload->data());
				$parametros = array($data['upload_data']['file_name'],
									$id_proyecto);
				$this->proyecto_model->actualizar_img_principal($parametros);
			}
			
			/**
			 * @see Registrando el logo
			 */
			$conf['upload_path'] = 'upload/proyecto';
			$conf['allowed_types'] = 'gif|jpg|png';
			$conf['file_name'] = 'img_logo_'.$id_proyecto;
			$conf['max_size']	= '100';
			$conf['max_width']  = '1024';
			$conf['max_height']  = '768';
			$conf['overwrite'] = true;
				
			$this->upload->initialize($conf);
			
			if ( !$this->upload->do_upload('img_logo') )
			{
				$error = array('error' => $this->upload->display_errors());
			}
			else
			{
				$data = array('upload_data' => $this->upload->data());
				$parametros = array($data['upload_data']['file_name'],$id_proyecto);
				$this->proyecto_model->actualizar_img_logo($parametros);
			}
			

			/**
			 * @see Parametros para la vista
			 */
			$data['view'] = 'proyecto/proyecto-form';
			$data['titulo'] = 'Registro';
			$data['url_form'] = 'proyecto/set_registrar_proyecto';
		
			$this->load->view('index',$data);
		}
		else
		{
			redirect('proyecto/registrar_proyecto');
		}
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
	
	/**
	 * @abstract logica de editar proyecto
	 */
	public function set_editar_proyecto()
	{
		if ( $this->agent->is_referral() )
		{
			if( $this->input->post('id_proyecto') )
			{
				$this->load->model('proyecto_model');
				$this->load->library('upload');
	
				/**
				 * Datos e Edicion de proyecto
				 */
				
				$id_proyecto = $this->input->post('id_proyecto');
				$nombre = trim($this->input->post('nombre'));
				$img_principal = '';
				$descripcion = trim($this->input->post('descripcion'));
				$img_logo = '';
				$direccion = trim($this->input->post('direccion'));
				$email = trim(strtolower($this->input->post('email')));
				$telefono = trim(strtolower($this->input->post('telefono')));
				
				$parametros = array(
									$nombre,
									$descripcion,
									$direccion,
									$email,
									$telefono,
									$id_proyecto
								  );
				
				
				$this->proyecto_model->editar($parametros);
				$data['proceso_form'] = true;
				
				
				/**
				 * @see Registrando la imagen principal
				 */
				
				if( $_FILES['img_principal']['size'] > 0 )
				{	
					echo '<pre>';
					print_r($_FILES);
					echo '</pre>';		
					
					$config['upload_path'] = 'upload/proyecto';
					$config['allowed_types'] = 'gif|jpg|png';
					$config['file_name'] = 'img_principal_'.$id_proyecto;
					$config['overwrite'] = true;
					$config['max_size']	= '100';
					$config['max_width']  = '1024';
					$config['max_height']  = '768';
					
					$this->upload->initialize($config);
					
					if ( !$this->upload->do_upload('img_principal') )
					{
						$error = array('error' => $this->upload->display_errors());
					}
					else
					{
						$data = array('upload_data' => $this->upload->data());
						$parametros = array($data['upload_data']['file_name'],
								$id_proyecto);
						$this->proyecto_model->actualizar_img_principal($parametros);
					}
				}
					
				/**
				 * @see Registrando el logo
				 */
				if( $_FILES['img_logo']['size'] > 0 )
				{	
					$conf['upload_path'] = 'upload/proyecto';
					$conf['allowed_types'] = 'gif|jpg|png';
					$conf['file_name'] = 'img_logo_'.$id_proyecto;
					$conf['max_size']	= '100';
					$conf['max_width']  = '1024';
					$conf['max_height']  = '768';
					$conf['overwrite'] = true;
					
					$this->upload->initialize($conf);
						
					if ( !$this->upload->do_upload('img_logo') )
					{
						$error = array('error' => $this->upload->display_errors());
					}
					else
					{
						$data = array('upload_data' => $this->upload->data());
						$parametros = array($data['upload_data']['file_name'],$id_proyecto);
						$this->proyecto_model->actualizar_img_logo($parametros);
					}
				}
				
				/**
				 * @see Obteniendo datos del actual usuario
				 */
				$parametro = array($id_proyecto);
				$data['proyecto'] = $this->proyecto_model->
										   obtener_proyecto_por_id($parametro);
	
				/**
				 * Parametros para la vista de editar usuario
				*/
				$data['view'] = 'proyecto/proyecto-form';
				$data['id'] = $id_proyecto;
				$data['url_form'] = 'proyecto/set_editar_proyecto';
				$data['titulo'] = 'Edici&oacute;n';
					
				$this->load->view('index',$data);
			}
			else
			{
				redirect('proyecto/listar_proyecto');
			}
		}
		else
		{
			redirect('usuario/listar_usuario');
		}
			
	}
	
	public function deshabilitar_proyecto()
	{
		$this->load->model('proyecto_model');
		
		if( $this->uri->segment(3,0) > 0)
		{
			$parametro = array($this->uri->segment(3,0));
		
			$this->proyecto_model->deshabilitar($parametro);
		}
		
		$pagina = $this->uri->segment(4,'');
		
		if(isset($_SESSION['proyecto']['busqueda']))
		{
			redirect('proyecto/buscar/'.$pagina,'refresh');
		}
		else
		{
			redirect('proyecto/listar_proyecto/'.$pagina,'refresh');
		}
	}
	
	public function habilitar_proyecto()
	{
		$this->load->model('marca_model');
		
		if( $this->uri->segment(3,0) > 0)
		{
			$parametro = array($this->uri->segment(3,0));
		
			$this->marca_model->habilitar($parametro);
		}
		
		$pagina = $this->uri->segment(4,'');
		
		if(isset($_SESSION['proyecto']['busqueda']))
		{
			redirect('proyecto/buscar/'.$pagina,'refresh');
		}
		else
		{
			redirect('proyecto/listar_proyecto/'.$pagina,'refresh');
		}
	}
}