<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

	class Vehicles extends Admin_Controller {

	var $path = '';

	public function __construct() {
		parent::__construct();
		$this->load->model('vehicles/mdl_vehicles');
		$this->path = "./assets/cc/images/vehicles/";
	}

	public function index() {
		$this->layout->set(array('vehicles'=>$this->mdl_vehicles->get()->result()));
		$this->layout->set(array('site_url'=>$this->mdl_settings->setting('site_url')));
		$this->layout->buffer('content', 'vehicles/index');
		$this->layout->render();
	}

	public function form($id = NULL) {
		$error_flg = false;
		$error = '';
		
		if ($this->input->post('btn_cancel')) {
			redirect('admin/vehicles');
		}

		if ($this->input->post('btn_submit')) {
			unset($_POST['btn_submit']);
			$data = $this->input->post();

			if(isset($_FILES['image']['name']) && $_FILES['image']['name'] != "") {
				if (!file_exists($this->path))
					mkdir($this->path);
				$config['upload_path'] = $this->path;
				$config['allowed_types'] = 'gif|jpg|png|jpeg';
				$this->load->library('upload', $config);
				if ($this->upload->do_upload("image")){
					$media = $this->upload->data();
					$data['image'] = $media['file_name'];
				} else {
					$error = $this->upload->display_errors();
				}
			}

			if ($error == '') {
				if ($this->mdl_vehicles->run_validation()) {
					if (!$this->mdl_vehicles->is_exists('name',$data['name'], $id)) {
						$id = $this->mdl_vehicles->save($id, $data);
						if(!$error_flg)
						redirect('admin/vehicles');
					} else {
						$error = 'Name already exists!';
					}
				}
			}

		}

		if ($id) {
			$this->mdl_vehicles->prep_form($id);
		}

		$this->layout->set(array('id'=>$id, 'path'=>$this->path, 'readonly'=>false,'error'=>$error));
		$this->layout->buffer('content', 'vehicles/form');
		$this->layout->render();
	}
	
	public function view($id) {
		$error_flg = false;
		if ($this->input->post('btn_cancel')) {
			redirect('admin/vehicles');
		}

		if ($id) {
			$this->mdl_vehicles->prep_form($id);
		}
		$this->db->select(array('name','zone'));
		
		$this->layout->set(array('path'=>$this->path, 'readonly'=>true));
		$this->layout->buffer('content', 'vehicles/form');
		$this->layout->render();
	}
	
	public function delete($id) {
		$this->mdl_vehicles->delete($id);
		redirect('admin/vehicles');
	}
	
	public function toggle($id, $bool){
		if ($id){
			$bool = ($bool) ? false : true;
			$this->mdl_vehicles->save($id, array('is_active'=>$bool));
			redirect('admin/vehicles/index');
		}
	}
	
	
}
