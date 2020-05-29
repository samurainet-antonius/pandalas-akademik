<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kelas_model extends CI_Model {

	private $_table = 'kelas';
	private $_column_order = array(null, 'id_kelas', 'nama_kelas', 'deskripsi_kelas', 'parent', 'status_kelas', null);
	private $_column_search = array('id_kelas', 'nama_kelas', 'deskripsi_kelas', 'parent');

	public function __construct()
	{
		parent::__construct();
	}


	public function datatable($method, $type = 'data')
	{
		$result = NULL;

		if ($type === 'count')
		{
			$this->$method();
			$result = $this->db->get()->num_rows();
		}

		if ($type === 'data')
		{
			$this->$method();
			if ($this->input->post('length') != -1) 
			{
				$length = xss_filter($this->input->post('length'), 'xss');
				$start = xss_filter($this->input->post('start'), 'xss');
				$this->db->limit($length, $start);
				$query = $this->db->get();
			}
			else
			{
				$query = $this->db->get();
			}
			
			$result = $query->result_array();
		}

		return $result;
	}

	private function _all_kelas()
	{
		$this->db->select('id_kelas,parent,nama_kelas,deskripsi_kelas,status_kelas');
		$this->db->from($this->_table);

		$i = 0;	
		foreach ($this->_column_search as $item) 
		{
			if ( $this->input->post('search')['value'] )
			{
				$search_key = xss_filter($this->input->post('search')['value'], 'xss');
				$search_key = trim($search_key);
				if ( $i == 0 )
				{
					$this->db->group_start();
					$this->db->like($item, $search_key);
				}
				else
				{
					$this->db->or_like($item, $search_key);
				}

				if ( count($this->_column_search)-1 == $i ) 
				{
					$this->db->group_end(); 
				}
			}
			$i++;
		}
		
		if ( !empty($this->input->post('order')) ) 
		{
			$field = xss_filter($this->_column_order[$this->input->post('order')['0']['column']],'xss');
			$value = xss_filter($this->input->post('order')['0']['dir'],'xss');
			$this->db->order_by($field,$value);
		}
		else
		{
			$this->db->order_by('id_kelas','DESC');
		}
	}

}

/* End of file Kelas_model.php */
/* Location: ./application/models/mod/Kelas_model.php */