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

					foreach ($this->kelas_model->datatable('_all_kelas', 'data') as $key => $val) 
					{
						// row fortmat
						$row = [];

						// checkbox
						// checkbox
						$row[] = '<div class="text-center"><input type="checkbox" class="row_data" value="'. encrypt($val['id_kelas']) .'"></div>';

						// nomer
						$row[] = $key+1;
						
						// title
						$row[] = $val['nama_kelas'];
						
						// status
						$row[] = ($val['status_kelas'] == 'Y' ? '<span class="btn btn-success btn-xs">Aktif</span>' : '<span class="btn btn-default btn-xs">Tidak Aktif</span>');

						// parent
						$row[] = $this->kelas_model->get_parent_kelas($val['parent']);
						
						

						// action
						$row[] = '
						<a href="'.base_url($this->mod.'/edit/'.$val['id_kelas']).'" class="btn btn-sm btn-warning" data-toggle="tooltip" data-placement="top" data-title="Edit"><i class="fa fa-pencil-alt"></i></a>
						<button type="button" class="btn btn-sm btn-danger delete_single" data-toggle="tooltip" data-placement="top" data-title="Delete" data-pk="'. encrypt($val['id_kelas']).'"><i class="fa fa-trash"></i></button>
						';
						// generate rows data
						$data[] = $row;
					}

					json_output(['data' => $data, 'recordsFiltered' => $this->kelas_model->datatable('_all_kelas', 'count')]);

				}
			}else{

				$ip = $_SERVER['HTTP_HOST'];

				$arrayData = array(
					"ip" => $ip,
				);

				$this->tema->set_ui('mod/kelas/view_index',$arrayData);
			}
		}

	}

	public function add(){

		$this->form_validation->set_rules(array(
			array(
				'field' 	=> 'nama_kelas',
				'label' 	=> 'Kelas',
				'rules' 	=> 'required|trim|min_length[1]|max_length[50]',
			),
			array(
				'field' => 'status_kelas',
				'label' => 'Status',
				'rules' => 'trim|required|max_length[1]',
			)
		));

		$this->form_validation->set_message('required','%s wajib di isi.');

		if ($this->form_validation->run()) 
		{

			$data_form = array(
				'nama_kelas'       => xss_filter('Kelas '.$this->input->post('nama_kelas'), 'xss'),
				'id_sekolah'       => 1,
				'status_kelas'      => $this->input->post('status_kelas')
			);

			$this->kelas_model->insert($data_form);
			$response['success'] = true;
			$response['alert']['type'] = 'success';
			$response['alert']['content'] = $this->mod." berhasil disimpan";
			json_output($response);
		}
		else 
		{
			$response['success'] = false;
			$response['alert']['type'] = 'error';
			$response['alert']['content'] = validation_errors();
			json_output($response);
		}
	}

}

/* End of file Kelas.php */
/* Location: ./application/controllers/sekolah/Kelas.php */