<?php
class Usuario extends MY_Controller
{
	
	/**
	 * @abstract vista de listar usuario
	 */
	public function listar_usuario()
	{
		$this->load->library('pagination');
		$this->load->model('usuario_model');
		
		$config['base_url'] = site_url('usuario/listar_usuario/');
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
		
		$data['usuarios'] = $this->usuario_model->
								  paginacion_usuario($parametros);
		
		$data['paginacion'] =  $this->pagination->create_links();
		
		
		
		$data['view'] = 'usuario/usuario-list';
		
		$this->load->view('index',$data);
	}
	
	/**
	 * @abstract logica de deshabilitar usuario
	 */
	public function deshabilitar_usuario()
	{
		$this->load->model('usuario_model');
		
		if( $this->uri->segment(3,0) > 0)
		{
			$parametro = array($this->uri->segment(3,0));
			
			$this->usuario_model->deshabilitar($parametro);	
		}	
		
		redirect('usuario/listar_usuario','refresh');
	}
	
	/**
	 * @abstract logica de deshabilitar usuario
	 */
	public function habilitar_usuario()
	{
		$this->load->model('usuario_model');
	
		if( $this->uri->segment(3,0) > 0)
		{
			$parametro = array($this->uri->segment(3,0));
				
			$this->usuario_model->habilitar($parametro);
		}
	
		redirect('usuario/listar_usuario','refresh');
	}
	
	
	/**
	 * @abstract vista de registrar usuario
	 */
	public function registrar_usuario()
	{
		
		$data['view'] = 'usuario/usuario-form';
		
		$data['url_form'] = 'usuario/set_registrar_usuario';
		
		$data['titulo'] = 'Registro';
		
		$this->load->view('index',$data);
	}
	
	/**
	 * @abstract logica de registrar usuario
	 */
	public function set_registrar_usuario()
	{
		if ( $this->agent->is_referral() )
		{
			$this->load->model('usuario_model');
		
			$nombre = trim(strtoupper($this->input->post('nombre')));
			$apellido = trim(strtoupper($this->input->post('apellido')));
			$email = trim(strtolower($this->input->post('email')));
			$usuario = trim(strtolower($this->input->post('usuario')));
			$password = md5(trim($this->input->post('password')));
			$data = array();
			
			/**
			 * @see Validacion de usuario
			 */
			$parametro = array($usuario);
			
			if( $this->usuario_model->validar_usuario($parametro) )
			{
				$data['error'] = 'Usuario ya se encuentra registrado';
				$data['proceso_form'] = false;
			}
			else
			{
				/**
				 * Registrando usuario
				 */
				$parametros = array($nombre,$apellido,$email,$usuario,$password);
				$this->usuario_model->registrar($parametros);
				$data['proceso_form'] = true;
			}
			
			
			/**
			 * @see Parametros para la vista
			 */
			$data['view'] = 'usuario/usuario-form';
			$data['titulo'] = 'Registro';
			$data['url_form'] = 'usuario/set_registrar_usuario';
		
			$this->load->view('index',$data);
		}
		else
		{
			redirect('usuario/registrar_usuario');
		}	 	
	}
	
	/**
	 * @abstract vista de editar usuario 
	 */
	public function editar_usuario()
	{
		$this->load->model('usuario_model');
		
		$data['view'] = 'usuario/usuario-form';
		
		if( $this->uri->segment(3,0) > 0 )
		{
			$parametro = array($this->uri->segment(3,0));
			
			$data['usuario'] = $this->usuario_model->obtener_usuario_por_id($parametro);
			
			$data['id'] = $this->uri->segment(3,0);
			
			$data['url_form'] = 'usuario/set_editar_usuario';
			
			$data['titulo'] = 'Edici&oacute;n';
			
			$this->load->view('index',$data);
		}
		else
		{
			redirect('usuario/registrar_usuario');
		}	
		
		
	}
	
	/**
	 * @abstract logica de editar usuario
	 */
	public function set_editar_usuario()
	{
		if ( $this->agent->is_referral() )
		{
			if( $this->input->post('id_usuario') )
			{
				$this->load->model('usuario_model');

				
				/**
				 * Datos e Edicion de usuario
				 */
				$nombre = trim(strtoupper($this->input->post('nombre')));
				$apellido = trim(strtoupper($this->input->post('apellido')));
				$email = trim(strtolower($this->input->post('email')));
				$password = md5(trim($this->input->post('password')));
				$id_usuario = $this->input->post('id_usuario');
				
				$parametros = array($nombre,$apellido,$email,$password,$id_usuario);
				$this->usuario_model->editar($parametros);
				$data['proceso_form'] = true;

				/**
				 * @see Obteniendo datos del actual usuario
				 */
				$parametro = array($id_usuario);
				$data['usuario'] = $this->usuario_model->obtener_usuario_por_id($parametro);
				
				/**
				 * Parametros para la vista de editar usuario
				 */
				$data['view'] = 'usuario/usuario-form';
				$data['id'] = $id_usuario;
				$data['url_form'] = 'usuario/set_editar_usuario';
				$data['titulo'] = 'Edici&oacute;n';
					
				$this->load->view('index',$data);
			}	
			else 
			{
				redirect('usuario/listar_usuario');
			}
		}
		else 
		{
			redirect('usuario/listar_usuario');
		}	 
			
	}
	
	public function perfil_usuario()
	{
		$this->load->model('usuario_model');
		
		$data['view'] = 'usuario/perfil';
		
		$id = $this->sesion_usuario['id_usuario'];
		
		$parametro = array($id);
		
		$data['usuario'] = $this->usuario_model->
								  obtener_usuario_por_id($parametro);
		
		$this->load->view('index',$data);
	}
	
	public function set_editar_perfil()
	{
		$this->load->model('usuario_model');
		
		if ( $this->agent->is_referral() )
		{
				
			$email = trim(strtolower($this->input->post('email')));
			$password = md5(trim($this->input->post('password')));
			$password_actual = md5($this->input->post('password_actual'));
			
			$id_usuario = $this->sesion_usuario['id_usuario'];
			
			$parametro = array($id_usuario);
			$usuario = $this->usuario_model->obtener_usuario_por_id($parametro);	
			
			/**
			 * @see Validaci—n si la contrase–a es correcta
			 */
			if($usuario['password'] != $password_actual)
			{		
				$data['error'] = 'La contrase&ntilde;a no coincide';
				$data['proceso_form'] = false;
			}
			else
			{
				$parametros = array($email,$password,$id_usuario);
				$this->usuario_model->editar_perfil($parametros);
				$data['proceso_form'] = true;
		
				$usuario = $this->usuario_model->obtener_usuario_por_id($parametro);
			}
			
			
			$data['usuario'] = $usuario;
			$data['view'] = 'usuario/perfil';
			$this->load->view('index',$data);
			
		}
		else
		{
			redirect('inicio');
		}
	}
	
	
}

?>