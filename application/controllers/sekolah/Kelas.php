<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kelas extends CI_Controller {

	public $mod = "kelas";

	public function __construct(){
		parent::__construct();
		$this->load->model('mod/kelas_model');
	}

	public function index(){
		
		if($this->role->i("read")){

			if($this->input->is_ajax_request()){

				if ($this->input->post('act') == 'delete')
				{
					return $this->_delete();
				}
				else
				{

					$data = array();

					$this->json_output(['data' => $data, 'recordsFiltered' => $this->category_model->datatable('_all_category', 'count')]);

				}
			}else{

				$cek = $this->kelas_model->datatable('_all_kelas', 'data');

					echo "<pre>";
					print_r ($cek);
					echo "</pre>";

				$this->tema->set_ui('mod/kelas/view_index');
			}
		}

	}

}

/* End of file Kelas.php */
/* Location: ./application/controllers/sekolah/Kelas.php */