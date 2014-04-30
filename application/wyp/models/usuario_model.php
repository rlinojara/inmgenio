<?php
class Usuario_model extends CI_Model
{
	
	/**
	 * @param usuario
	 * @param contrase–a
	 */
	public function acceder($arg0)
	{
		$sql = 'SELECT
				 	id_usuario,
					nombre,
					apellido,
					usuario,
					email
				FROM usuario 
				WHERE usuario = ? AND
					  password = md5(?)';
		
		$query = $this->db->query($sql,$arg0);
		
		return $query->result_array();
		
	}
	
	
	/**
	 * @param nombre
	 * @param apellido
	 * @param email
	 * @param usuario
	 * @param password
	 */
	public function registrar($arg0)
	{
		$sql = 'INSERT INTO usuario(nombre,apellido,email,usuario,password)
				VALUES (?,?,?,?,?)';
		
		$this->db->query($sql,$arg0);
	}
	
	
	/**
	 * @param nombre 
	 * @param apellido
	 * @param email
	 * @param password
	 * @param id_usuario
	 */
	public function editar($arg0)
	{
		$sql = 'UPDATE usuario
				SET nombre = ?,
					apellido = ?,
					email = ?,
					password = ?
				WHERE id_usuario = ?';

		$this->db->query($sql,$arg0);
	}
	
	public function deshabilitar($arg0)
	{
		$sql = 'UPDATE usuario
				SET estado = 2
				WHERE id_usuario = ?';
		
		$this->db->query($sql,$arg0);
	}
	
	public function habilitar($arg0)
	{
		$sql = 'UPDATE usuario
				SET estado = 1
				WHERE id_usuario = ?';
		
		$this->db->query($sql,$arg0);
	}
	
	/**
	 * @param usuario
	 */
	public function validar_usuario($arg0)
	{
		$sql = 'SELECT count(*) as cantidad FROM usuario 
				WHERE usuario = ?';
	
		$query = $this->db->query($sql,$arg0);

		$result = $query->result_array();
		 
		if ( $result[0]['cantidad'] == 0 )
		{
			return false;
		}
		else 
		{
			return true;
		}	
	}
	
	/**
	 * @param id_usario
	 */
	public function obtener_usuario_por_id($arg0)
	{
		$sql = 'SELECT id_usuario,
					   nombre,
					   apellido,
					   email,
					   password
				FROM usuario
				WHERE id_usuario = ?';
		
		$query = $this->db->query($sql,$arg0);
		
		$result = $query->result_array();
		
		if(is_array($result) && count($result) == 1)
		{
			return $result[0];
		}
		else 
		{
			return array();
		}	
	}
	
	/**
	 * @param email
	 * @param password
	 * @param id_usuario
	 */
	public function editar_perfil($arg0)
	{
		$sql = 'UPDATE usuario
				SET email = ?,
					password = ?
				WHERE id_usuario = ?';
		
		$this->db->query($sql,$arg0);
		
	}
	
	public function cantidad_total_usuarios()
	{
		$sql = 'SELECT COUNT(*) as total FROM usuario';
		
		$query = $this->db->query($sql);
		
		$result = $query->result_array();
		
		return $result[0]['total'];
		
	}
	
	
	/**
	 * @param por_pagina
	 * @param pagina
	 */
	public function paginacion_usuario($arg0)
	{
		$sql = 'SELECT * FROM usuario LIMIT ?,?';
		
		$query = $this->db->query($sql,$arg0);
		
		return $query->result_array();
	}
	
}