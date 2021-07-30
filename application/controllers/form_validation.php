<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Form_validation extends CI_Controller {

	function index()
	{
            $this->load->view('v_form_validation');

	}

	function aksi()
    {
        $this->form_validation->set_rules('nama', 'Nama', 'required|max_length[30]');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        $this->form_validation->set_rules('no_hp', 'No HP', 'required|numeric');
        $this->form_validation->set_rules('password', 'Password', 'required|min_length[5]');
        $this->form_validation->set_rules('konfirmasi_password', 'Konfirmasi Password', 'required|min_length[5]|matches[password]');

        if($this->form_validation->run() == FALSE)
        {
            $this->load->view('v_form_validation');
        }
        else
        {
    //dilanjutkan kehalaman berikut jika kon form validation bernilai TURE
            redirect('user');

        }
    }
}
?>