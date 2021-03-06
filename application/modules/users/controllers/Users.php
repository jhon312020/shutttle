<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/*
 * FusionInvoice
 * 
 * A free and open source web based invoicing system
 *
 * @package		FusionInvoice
 * @author		Jesse Terry
 * @copyright	Copyright (c) 2012 - 2013, Jesse Terry
 * @license		http://www.fusioninvoice.com/license.txt
 * @link		http://www.fusioninvoice.
 * 
 */

class Users extends Admin_Controller {

    public function __construct()
    {
        parent::__construct();

        $this->load->model('mdl_users');
    }

    public function index()
    {
        $this->layout->set('users', $this->mdl_users->paginate()->result());
        $this->layout->set('user_types', $this->mdl_users->user_types());
        $this->layout->buffer('content', 'users/index');
        $this->layout->render();
    }

    public function form($id = NULL)
    {
        if ($this->input->post('btn_cancel'))
        {
            redirect('users');
        }

        if ($this->mdl_users->run_validation(($id) ? 'validation_rules_existing' : 'validation_rules'))
        {
            $this->mdl_users->save($id);
            redirect('users');
        }

        if ($id and !$this->input->post('btn_submit'))
        {
            $this->mdl_users->prep_form($id);
        }

        $this->load->model('users/mdl_user_clients');
        $this->load->model('clients/mdl_clients');

        $this->layout->set(
            array(
                'id'           => $id,
                'user_types'   => $this->mdl_users->user_types(),
                'user_clients' => $this->mdl_user_clients->where('fi_user_clients.user_id', $id)->get()->result()
            )
        );
        
        $this->layout->buffer('user_client_table', 'users/partial_user_client_table');
        $this->layout->buffer('modal_user_client', 'users/modal_user_client');
        $this->layout->buffer('content', 'users/form');
        $this->layout->render();
    }

    public function change_password($user_id)
    {
        if ($this->input->post('btn_cancel'))
        {
            redirect('users');
        }

        if ($this->mdl_users->run_validation('validation_rules_change_password'))
        {
            $this->mdl_users->save_change_password($user_id, $this->input->post('user_password'));
            redirect('users/form/' . $user_id);
        }

        $this->layout->buffer('content', 'users/form_change_password');
        $this->layout->render();
    }

    public function delete($id)
    {
        $this->mdl_users->delete($id);
        redirect('users');
    }

    public function delete_user_client($user_id, $user_client_id)
    {
        $this->load->model('mdl_user_clients');

        $this->mdl_user_clients->delete($user_client_id);

        redirect('users/form/' . $user_id);
    }

}

?>