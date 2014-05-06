<?php
class Proyecto_model extends CI_Model
{
	public function cantidad_total_proyectos()
	{
		$sql = 'SELECT COUNT(*) as total FROM proyecto WHERE estado = 1';
		
		$query = $this->db->query($sql);
		
		$result = $query->result_array();
		
		return $result[0]['total'];
		
	}
	
	
	/**
	 * @param por_pagina
	 * @param pagina
	 */
	public function paginacion_proyecto($arg0)
	{
		$sql = 'SELECT
					id_proyecto,
					nombre,
					descripcion,
					estado,
					email_contacto  
				FROM proyecto 
				WHERE estado = 1 LIMIT ?,?';
		
		$query = $this->db->query($sql,$arg0);
		
		return $query->result_array();
	}
	
	/**
	 * @param id_usario
	 */
	public function obtener_proyecto_por_id($arg0)
	{	
		$sql = 'SELECT id_proyecto,
					   nombre,
					   estado,
					   img_principal,
					   descripcion,
					   img_logo,
					   direccion,
					   email_contacto,
					   ubicacion_latitud,
					   ubicacion_longitud,
					   telefono_contacto
				FROM proyecto
				WHERE id_proyecto = ?';
	
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
	 * @param usuario
	 */
	public function validar_proyecto($arg0)
	{
		$sql = 'SELECT count(*) as cantidad FROM proyecto 
				WHERE nombre = ?';
	
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
	
	
	public function registrar($arg0)
	{
		$sql = 'INSERT INTO proyecto
				(nombre,descripcion,direccion,email,telefono) VALUES
				VALUES(?,?,?,?,?)';
		
		$this->db->query($sql,$arg0);
	}

}