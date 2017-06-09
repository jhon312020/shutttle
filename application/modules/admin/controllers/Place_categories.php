<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

	class Place_categories extends Admin_Controller {

	var $path = '';

	public function __construct() {
		parent::__construct();
		$this->load->model('place_categories/mdl_place_categories');
	}

	public function index() {
		$this->layout->set(array('categories'=>$this->mdl_place_categories->get()->result()));
		$this->layout->buffer('content', 'place_categories/index');
		$this->layout->render();
	}

	public function form($id = NULL) {
		$error = false;

		if ($this->input->post('name')) {
			$data = $this->input->post();
			if (!$this->mdl_place_categories->is_exists('name',$data['name'], $id)) {
				$id = $this->mdl_place_categories->save($id, $data);
			} else {
				$error = 'Name already exists!';
			}
		}
		echo json_encode(array('error'=>$error));
		exit;
	}
	
	public function view($id) {
		$error_flg = false;
		if ($this->input->post('btn_cancel')) {
			redirect('admin/place_categories');
		}

		if ($id) {
			$this->mdl_place_categories->prep_form($id);
		}
		$this->db->select(array('name','zone'));
		
		$this->layout->set(array('path'=>$this->path, 'readonly'=>true));
		$this->layout->buffer('content', 'place_categories/form');
		$this->layout->render();
	}
	
	public function delete($id) {
		$this->mdl_place_categories->delete($id);
		redirect('admin/place_categories');
	}
	
	public function toggle($id, $bool){
		if ($id){
			$bool = ($bool) ? false : true;
			$this->mdl_place_categories->save($id, array('is_active'=>$bool));
			redirect('admin/place_categories/index');
		}
	}
	
	
}
