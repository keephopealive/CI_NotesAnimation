<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mains extends CI_Controller {

	public function index()
	{
		$results = $this->note->retrieveAll();
		// echo "<pre>";
		// print_r($results);
		// die('in controller');
		$this->load->view('/ajaxNotesView', array('results' => $results) );
	}

	public function addNote()
	{
		$result_id = $this->note->addNote($this->input->post());
		$results['result_id'] = $result_id;
		$results['action'] = 'addNote';
		echo json_encode($results);
	}

	public function deleteNote($id)
	{
		$results['status'] = $this->note->deleteNote($id);
		$results['action'] = 'deleteNote';
		echo json_encode($results);
	}

	public function updateNote()
	{
		$result = $this->note->updateNote($this->input->post());
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */