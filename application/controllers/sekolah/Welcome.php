<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public $mod = "dashboard";

	public function __construct(){
		parent::__construct();
	}

	public function index(){
		
		$data['admin'] = "antonius";

		$this->tema->set_ui('sekolah/dashboard',$data);
	}

}

/* End of file Welcome.php */
/* Location: ./application/controllers/sekolah/Welcome.php */