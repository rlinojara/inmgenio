<?php
class Login extends CI_Controller
{
	
	public function index()
	{
		return $this->acceder_usuario();
	}
	
	
	/**
	 * @abstract vista acceder usuario
	 */
	public function acceder_usuario()
	{	
		if( isset($_SESSION['usuario']) )
		{
			redirect('inicio');	
		}
		else 
		{		
		
			$this->load->model('sucursal_model');	
		
			$data['sucursal'] = $this->sucursal_model->obtener_sucursal_activas();
			
			$this->load->view('login',$data);
		}	
		
	}
	
	
	/**
	 * @abstract logica acceder usuario
	 */
	public function set_acceder_usuario()
	{
		$this->load->model('usuario_model');
		$this->load->model('sucursal_model');
				
		$password = $this->input->post('password');
		$usuario = addslashes($this->input->post('usuario'));
		$parametros = array($usuario,$password);
		
		$result = $this->usuario_model->acceder($parametros);
		

		if( is_array($result) && count($result) == 1 )
		{
			$_SESSION['usuario'] = $result[0];
			
			$parametros = array($this->input->post('sucursal'));
			
			$_SESSION['usuario']['sucursal'] = $this->sucursal_model->
											   obtener_sucursal_por_id($parametros);
						
			redirect('inicio');
		}
		else 
		{
			$data['sucursal'] = $this->sucursal_model->obtener_sucursal_activas();
			
			$data['error'] = array('descripcion'=>'Usuario y/o Contrase&ntilde;a Inv&aacute;lida');

			$this->load->view('login.php',$data);
		}
		
	}
	
	
}