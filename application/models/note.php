<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Note extends CI_Model {

	public function addNote($note)
	{
		$query = "INSERT INTO notes (content, created_at, updated_at) VALUES (?, NOW(), NOW())";
		$values = array($note['content']);
		$this->db->query($query, $values);
		return $this->db->insert_id();
	}

	public function updateNote($note)
	{
		$query = "UPDATE notes SET content = ?, updated_at = NOW() WHERE id = ?";
		$values = array($note['content'], $note['id']);
		return $this->db->query($query, $values);
	}

	public function deleteNote($id)
	{
		$query = "DELETE FROM notes WHERE id = {$id}";
		return $this->db->query($query);
	}

	public function retrieveAll()
	{
		return $this->db->query("SELECT * FROM notes")->result_array();
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */