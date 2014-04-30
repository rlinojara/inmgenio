<?php
class Proyecto_model extends CI_Model
{
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
		$sql = 'SELECT
					id_proyecto,
					nombre,
					descripcion,
					estado,
					email_contacto  
				FROM proyecto LIMIT ?,?';
		
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
}