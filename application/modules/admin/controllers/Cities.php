<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

	class Cities extends Admin_Controller {

	var $path = '';

	public function __construct() {
		parent::__construct();
		$this->load->model('cities/mdl_cities');
		$this->load->model('place_categories/mdl_place_categories');
		$this->load->model('locations/mdl_locations');
		$this->path = "./assets/cc/images/cities/";
	}

	public function index() {
		$this->layout->set(array('cities'=>$this->mdl_cities->get()->result()));
		$this->layout->set(array('site_url'=>$this->mdl_settings->setting('site_url')));
		$this->layout->buffer('content', 'cities/index');
		$this->layout->render();
	}

	public function form() {
		$error_flg = false;
		$error = '';

		if ($this->input->post('city')) {
			unset($_POST['btn_submit']);
			$data = $this->input->post();
			$cities = array_filter(array_unique($data['city']));
			$existingCities = $this->mdl_cities->getList();
			$cities = array_diff($cities, $existingCities);
			$rows= [];
			foreach ($cities as $city) {
				$rows[] = array('name'=>$city);
			}
			if ($rows) {
				$this->db->insert_batch('cities',$rows);
			}
		}
		redirect('admin/cities');
	}


	public function updateCityName($id) {
		$error = false;
		if ($this->input->post('name')) {
			$data = $this->input->post();
			if (!$this->mdl_cities->is_exists('name',$data['name'], $id)) {
				$id = $this->mdl_cities->save($id, $data);
			} else {
				$error = 'Name already exists!';
			}
		}
		echo json_encode(array('error'=>$error));
		exit;
	}
	
	public function delete($id) {
		$this->mdl_cities->delete($id);
		redirect('admin/cities');
	}
	
	public function toggle($id, $bool){
		if ($id){
			$bool = ($bool) ? false : true;
			$this->mdl_cities->save($id, array('is_active'=>$bool));
			redirect('admin/cities/index');
		}
	}

	public function editCityLocations($id) {
		if ($id) {
			$city = $this->mdl_cities->findById($id);
			if ($city) {
				$data_array['categories'] = $this->mdl_place_categories->getList();
				$data_array['city'] = $city;
				$data_array['locations'] = $this->mdl_locations->where('city_id', $id)->get()->result();
				$this->layout->set($data_array);
				$this->layout->buffer('content', 'cities/location');
				$this->layout->render();
			}
		}
	}

	public function addLocations($id) {
		if ($id) {
			$city = $this->mdl_cities->findById($id);

			if ($city) {
				if ($this->input->post('category') && $this->input->post('location')) {
					unset($_POST['btn_submit']);
					$data = $this->input->post();
					foreach ($data['category'] as $key=>$value) {
						if ($value && isset($data['location'][$key]) && $data['location'][$key]) {
							$rows[] = array('city_id'=>$id, 'category_id'=>$value, 'location'=>$data['location'][$key]);
						}
					}
					if ($rows) {
						$this->db->insert_batch('locations',$rows);
					}
				}				
			}
		}
		redirect('admin/cities/editCityLocations/'.$id);
	}

	public function updateLocation($id){
		$error = false;
		if ($this->input->post('category_id') && $this->input->post('location')) {
			$data = $this->input->post();
			$id = $this->mdl_locations->save($id, $data);
			if (!$id) {
				$error = 'Sorry something wrong in your input';
			}
		}
		echo json_encode(array('error'=>$error));
		exit;
	}

	public function deleteLocation($id, $city_id) {
		$this->mdl_locations->delete($id);
		redirect('admin/cities/editCityLocations/'.$city_id);
	}

}
