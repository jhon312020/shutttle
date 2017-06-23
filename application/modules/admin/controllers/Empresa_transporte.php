<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

	class Empresa_transporte extends Admin_Controller {

	var $path = '';

	public function __construct() {
		parent::__construct();
		$this->load->model('shuttles/mdl_shuttles');
		$this->load->model('empresa_transporte/mdl_empresa_transporte');
		$this->path = "./assets/cc/images/empresa_transporte/";
	}

	public function index() {
		$this->layout->set(array('transports'=>$this->mdl_empresa_transporte->get()->result()));
		$this->layout->set(array('site_url'=>$this->mdl_settings->setting('site_url')));
		$this->layout->buffer('content', 'empresa_transporte/index');
		$this->layout->render();
	}

	public function form($id = NULL) {
		$error_flg = false;
		$error = '';
		
		if ($this->input->post('btn_cancel')) {
			redirect('admin/empresa_transporte');
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
				if ($this->mdl_empresa_transporte->run_validation()) {
					if (!$this->mdl_empresa_transporte->is_exists('name',$data['name'], $id)) {
						$id = $this->mdl_empresa_transporte->save($id, $data);
						if(!$error_flg)
						redirect('admin/empresa_transporte');
					} else {
						$error = 'Name already exists!';
					}
				}
			}

		}

		if ($id) {
			$this->mdl_empresa_transporte->prep_form($id);
		}

		$booking_array = $this->mdl_shuttles->select('booking.version,booking.bcnarea_address_id,booking.address as book_address,collaborators_address.address as mainaddress,collaborators_address.zone as col_zone,collaborators.address as col_address,booking.round_trip,booking.price,booking.book_status,booking.payment_method,booking.journey_completed,booking.id,booking.extra_array,booking.collaborator_id,booking.kids,booking.adults,booking.baby,booking.start_from,
                                            booking.end_at,booking.zone,booking.hour,booking.arrival_time,booking.price,booking.start_journey,
                                            booking.return_book_id,booking.return_journey,booking.country,booking.flight_no,booking.created,collaborators.name,booking.client_id,booking.client_array,
                                            clients.name as first_name, clients.surname,calendars.reference_id')
                                            ->join('collaborators', 'collaborators.id=booking.collaborator_id', 'left')
                                            ->join('clients', 'clients.id=booking.client_id', 'left')
                                            ->join('collaborators_address', 'collaborators_address.id = booking.collaborator_address_id', 'left')
                                            ->join('calendars', 'calendars.id=booking.calendar_id', 'left')
                                            ->where("booking.is_active = 1 and tbl_booking.empresa_id ='".$id."' and tbl_booking.round_trip = 0")
                                            ->order_by('booking.created', 'desc')
                                            ->get()->result_array();

		$this->layout->set(array('id'=>$id, 'path'=>$this->path, 'readonly'=>false,'error'=>$error,'booking_array'=>$booking_array));
		$this->layout->buffer('content', 'empresa_transporte/form');
		$this->layout->render();

	}
	
	public function view($id) {
		$error_flg = false;
		if ($this->input->post('btn_cancel')) {
			redirect('admin/empresa_transporte');
		}

		if ($id) {
			$this->mdl_empresa_transporte->prep_form($id);
		}
		$this->db->select(array('name','zone'));
		
		$booking_array = $this->mdl_shuttles->select('booking.version,booking.bcnarea_address_id,booking.address as book_address,collaborators_address.address as mainaddress,collaborators_address.zone as col_zone,collaborators.address as col_address,booking.round_trip,booking.price,booking.book_status,booking.payment_method,booking.journey_completed,booking.id,booking.extra_array,booking.collaborator_id,booking.kids,booking.adults,booking.baby,booking.start_from,
                                            booking.end_at,booking.zone,booking.hour,booking.arrival_time,booking.price,booking.start_journey,
                                            booking.return_book_id,booking.return_journey,booking.country,booking.flight_no,booking.created,collaborators.name,booking.client_id,booking.client_array,
                                            clients.name as first_name, clients.surname,calendars.reference_id')
                                            ->join('collaborators', 'collaborators.id=booking.collaborator_id', 'left')
                                            ->join('clients', 'clients.id=booking.client_id', 'left')
                                            ->join('collaborators_address', 'collaborators_address.id = booking.collaborator_address_id', 'left')
                                            ->join('calendars', 'calendars.id=booking.calendar_id', 'left')
                                            ->where("booking.is_active = 1 and tbl_booking.empresa_id ='".$id."' and tbl_booking.round_trip = 0")
                                            ->order_by('booking.created', 'desc')
                                            ->get()->result_array();

		$this->layout->set(array('path'=>$this->path, 'readonly'=>true,'booking_array'=>$booking_array));
		$this->layout->buffer('content', 'empresa_transporte/form');
		$this->layout->render();
	}
	
	public function delete($id) {
		$this->mdl_empresa_transporte->delete($id);
		redirect('admin/empresa_transporte');
	}
	
	public function toggle($id, $bool){
		if ($id){
			$bool = ($bool) ? false : true;
			$this->mdl_empresa_transporte->save($id, array('is_active'=>$bool));
			redirect('admin/empresa_transporte/index');
		}
	}
	

}
