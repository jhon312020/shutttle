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

class Sessions extends Base_Controller {

    public function index()
    {
        redirect('admin/sessions/login');
    }

    public function login()
    {
        if ($this->input->post('btn_login'))
        {
            if ($this->authenticate($this->input->post('email'), $this->input->post('password')))
            {
                if ($this->session->userdata('user_type') == 1)
                {
                    redirect('admin/dashboard');
                }
                elseif ($this->session->userdata('user_type') == 2)
                {
                    redirect('guest');
                }
            }
        }

        $this->load->view('sessions/session_login');
    }

    public function logout()
    {
        $this->session->sess_destroy();

        redirect('admin/sessions/login');
    }

    public function authenticate($email_address, $password)
    {
        $this->load->model('sessions/mdl_sessions');

        if ($this->mdl_sessions->auth($email_address, $password))
        {
            return TRUE;
        }

        return FALSE;
    }

}

?>
