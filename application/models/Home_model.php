<?php
/**
* 
*/
defined('BASEPATH') or exit('Error!');
class Home_model extends CI_Model
{
	
	public function __construct(){
		# code...
		parent::__construct();
		$this->load->database();
	}

	public function getPersonalityDesc($rand_id){

		$query = $this->db->select('pt_DESC');
		$query = $this->db->from('personality_test');
		$query = $this->db->where('pt_ID',$rand_id);
		$query = $this->db->get();

		return $query->result_array();
	}

	public function getRecordCount(){
		return $this->db->count_all_results('personality_test');
	}

	public function getUserResult($url){
		$query = $this->db->select('*');
		$query = $this->db->from('logs');
		
		$query = $this->db->join('personality_test','personality_test.pt_ID = logs.pID_result','INNER');
		$query = $this->db->where('logs.slug',$url);
		$query = $this->db->get();
		
		return $query->result_array();
	}

	public function insert_log($data){
		return $this->db->insert('logs',$data);
	}
}