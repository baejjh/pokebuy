<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Poke extends CI_Model {

	public function count_poked($user_id)
	{
		$query = "SELECT * FROM pokes LEFT JOIN users ON pokes.user_id = users.id WHERE pokee_id = ?";
		$values = array($user_id);
		return $this->db->query($query,$values)->result_array();
	}
	public function get_all_users()
	{
		$query = "SELECT users.alias, users.email, users.id, users.name, SUM(poke_count) AS 'Total_pokes' FROM pokes LEFT JOIN users ON users.id = pokes.pokee_id GROUP BY pokee_id;";
		return $this->db->query($query)->result_array();
	}
	public function add_poke($id)
	{
		$poker_id = $this->session->userdata['record']['id'];
		$query = "SELECT * FROM pokes WHERE pokes.user_id = ? && pokes.pokee_id = ?";
		$values = array($poker_id,$id);
		$poke = $this->db->query($query,$values)->result_array();
		if ($poke != null) 
		{
			$query1 = "UPDATE pokes SET poke_count = poke_count + 1 WHERE pokes.user_id = ? AND pokee_id = ?;";
			$values1 = array($poker_id,$id);
			return $this->db->query($query1,$values1);
		}
		else
		{
		$query2 = "INSERT INTO pokes (user_id, pokee_id, poke_count, created_at, updated_at) VALUES (?,?,1,NOW(),NOW())";
		$values2 = array($poker_id,$id);
		return $this->db->query($query2, $values2);
		}
	}
}