<?php
class Sucursal_model extends CI_Model
{
	public function obtener_sucursal_activas()
	{
		$sql = 'SELECT 
					id_sucursal,
					nombre
				FROM sucursal
				WHERE estado = 1';
		
		$query = $this->db->query($sql);
		
		return $query->result_array();
		
	}
	
	/**
	 * @param id_sucursal
	 */
	public function obtener_sucursal_por_id($arg0)
	{
		$sql = 'SELECT id_sucursal,
					   nombre
				FROM sucursal
				WHERE id_sucursal = ?';
		
		
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