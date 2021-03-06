<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

	class Paths extends Admin_Controller {

	var $path = '';

	public function __construct() {
		parent::__construct();
		$this->load->model('paths/mdl_paths');
		$this->load->model('cities/mdl_cities');
		$this->load->model('place_categories/mdl_place_categories');
		$this->load->model('locations/mdl_locations');
		$this->load->model('vehicles/mdl_vehicles');
		$this->path = "./assets/cc/images/cities/";
	}

	public function index() {
		$categories = $this->mdl_place_categories->getList();
		$locations = $this->mdl_locations->get()->result();
		$vehicles = $this->mdl_vehicles->getPrivateList();

		$select_location = array();
		$country_relation = array();

		foreach ($locations as $location) {
			$select_location[$categories[$location->category_id]][$location->id] = $location->location;
		}

		$data_array['select_location'] = $select_location;
		$data_array['pickup_locations'] = $this->mdl_paths->group_by('pickup_location_id')->get()->result();
		$data_array['cities'] = $this->mdl_cities->getList();
		$data_array['locations'] = $this->mdl_locations->getList();
		$this->layout->set($data_array);
		$this->layout->set(array('site_url'=>$this->mdl_settings->setting('site_url')));
		$this->layout->buffer('content', 'paths/index');
		$this->layout->render();
	}

	public function form($id = null) {
		ini_set('max_input_vars', 3000);
		$error_flg = false;
		$error = '';

		$data = $this->input->post();
		if ($data) {
			if ($data['pickup_location_id']) {
				// new records
				$new_rows = array();
				if ($data['new_record']){
					$this->mdl_paths->save_records($data['new_record'], $data['pickup_location_id'], $data['pickup_city_id']);
				}
				if ($data['edit_record']) {
					$this->mdl_paths->update_records($data['edit_record'], $data['pickup_location_id'], $data['pickup_city_id']);
				}
				redirect('admin/paths');
			}
		}

		$paths = array();
		if ($id) {
			$paths = $this->mdl_paths->where('pickup_location_id',$id)->get()->result();
		}

		$cities = $this->mdl_cities->getList();
		$categories = $this->mdl_place_categories->getList();
		$locations = $this->mdl_locations->get()->result();
		$vehicles = $this->mdl_vehicles->getPrivateList();

		$select_location = array();
		$country_relation = array();

		foreach ($locations as $location) {
			$select_location[$categories[$location->category_id]][$location->id] = $location->location;
			$city_relation[$location->id] = $location->city_id;
		}

		$dump_data = array('cities','categories','locations','select_location','city_relation','vehicles','paths');
		foreach ($dump_data as $field) {
			$data_array[$field] = ${$field};
		}
		$data_array['pickup_id'] = $id;
		$this->layout->set($data_array);
		$this->layout->buffer('content', 'paths/form');
		$this->layout->render();
	}

	public function delete($id) {
		$this->mdl_paths->delete($id);
		redirect('admin/paths');
	}
	
	public function toggle($id, $bool){
		if ($id){
			$bool = ($bool) ? 0 : 1;
			$query = "update tbl_paths set is_active='$bool' where pickup_location_id=".$id;
			$this->db->query($query);
			redirect('admin/paths');
		}
	}

	public function deleteAll($id) {
		$query = "delete from tbl_paths where pickup_location_id=".$id;
		$this->db->query($query);
		redirect('admin/paths');
	}

	public function duplicate($old_id, $new_id) {
		if ($old_id == $new_id) {
			redirect('admin/paths');
		}
		$paths = $this->mdl_paths->where('pickup_location_id',$old_id)->get()->result_array();
		$location = $this->mdl_locations->findById($old_id);
		$new_location = $this->mdl_locations->findById($new_id);
		if ($location && $new_location) {
			if (isset($new_location['id']) && $new_location['id']) {
				$current_time = date('Y-m-d H:i:s');
				foreach ($paths as $key=>$path) {
					unset($paths[$key]['id']);
					$paths[$key]['created_at'] = $current_time;
					$paths[$key]['updated_at'] = $current_time;
					$paths[$key]['pickup_location_id'] = $new_location['id'];
					$paths[$key]['pickup_city_id'] = $new_location['city_id'];
				}
			}
			$this->db->insert_batch('tbl_paths',$paths);
		}
		redirect('admin/paths');
	}

	public function actions() {
		$ids = explode(',',$this->input->post('ids'));
		foreach ($ids as $key=>$id) {
			$ids[$key] = (int)str_replace('ids_', '', $id);
		}
		switch($this->input->post('method')){
			case 'all_activate':
					$this->db->set('is_active',1);
					$this->db->where_in('pickup_location_id',$ids);
					$this->db->update('paths');
				break;
			case 'all_deactivate':
					$this->db->set('is_active',0);
					$this->db->where_in('pickup_location_id',$ids);
					$this->db->update('paths');
				break;
			case 'all_delete':
					$this->db->where_in('pickup_location_id',$ids);
					$this->db->delete('paths');
				break;
		}
		redirect('admin/paths');
	}

}
