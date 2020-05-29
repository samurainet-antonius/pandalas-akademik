<?php 

class Tema
{
	public $_folder;

	function __construct()
	{
		// menggabungkan controller ci ke variabel $this->ci
		$this->ci =& get_instance();
		// load model menu
		// $this->ci->load->model('Makses');
		$this->_folder = $this->ci->uri->segment(1);
	}

	function set_ui($file, $data=array())
	{
		// menyimpan data konten yang dinamis
		$_data['_content'] = $this->ci->load->view($this->_folder."/".$file, $data, TRUE);
		$_data['_menu'] = $this->ci->load->view($this->_folder.'/layout/menu', NULL, TRUE);
		// $_data['_user'] = $this->ci->session->userdata("userlogin");

		// dimasukkan ke template utama
		$this->ci->load->view($this->_folder.'/layout/layout', $_data);
	}
}