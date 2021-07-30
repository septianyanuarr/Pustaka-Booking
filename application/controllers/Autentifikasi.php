<?php
    class Autentifikasi extends CI_Controller
    {
        
    public function index()
    {
    //jika statusnya sudah login, maka tidak bisa mengakses halaman login alias dikembalikan ke tampilan user
    if($this->session->userdata('email')){
        redirect('user');
    }
        $this->form_validation->set_rules('email', 'Alamat Email', 'required|trim|valid_email', [
        'required' => 'Email Harus diisi!!',
        'valid_email' => 'Email Tidak Benar!!'
    ]);
        $this->form_validation->set_rules('password', 'Password', 'required|trim', [
        'required' => 'Password Harus diisi'
    ]);
    if ($this->form_validation->run() == false) {
        $data['judul'] = 'Login';
        $data['user'] = '';
    //kata 'login' merupakan nilai dari variabel judul dalam array $data dikirimkan ke view aute_header
        $this->load->view('templates/aute_header',$data);
        $this->load->view('autentifikasi/login');
        $this->load->view('templates/aute_footer');
    } else {
	       $this->_login();
	    }
    }

    private function _login()
    {
        $email = htmlspecialchars($this->input->post('email', true));
        $password = $this->input->post('password', true);

        $user = $this->ModelUser->cekData(['email' => $email])->row_array();

        //jika usernya ada
        if ($user) {
        //jika user sudah aktif
        if ($user['is_active'] == 1) {
        //cek password
        	if (password_verify($password, $user['password'])) { $data = [
        		'email' => $user['email'],
        		'role_id' => $user['role_id']
        		];

        		$this->session->set_userdata($data);

        		if ($user['role_id'] == 1) {
        			redirect('admin');
        		} else {
        			if ($user['image'] == 'default.jpg') {
        				$this->session->set_flashdata('pesan', '<div class="alert alert-info alert-message" role="alert">Silahkan Ubah Profile Anda untuk Ubah Photo Profil</div>');
        			}
        			redirect('admin');
        		}
        	} else {
        		$this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-message" role="alert">Password salah!!</div>');
        		redirect('autentifikasi');
        	}
        } else {
        	$this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-message" role="alert">User belum diaktifasi!!</div>');
        	redirect('autentifikasi');
            }
        } else {
        	$this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-message" role="alert">Email tidak terdaftar!!</div>');
        	redirect('autentifikasi');
        }
    }

    public function logout()
	{
		{
            $this->session->unset_userdata('email');
            $this->session->unset_userdata('role_id');
            $this->session->set_flashdata('pesan', '<div class="alert alertsuccess alert-message" role="alert">Anda telah logout!!</div>');
            redirect('Autentifikasi');
            }
    }
    
    public function blok()
    {
        $this->load->view('autentifikasi/blok');
    }

    public function gagal()
    {
        $this->load->view('autentifikasi/gagal');
    }

    public function registrasi()
    {
    if ($this->session->userdata('email')) {
        redirect('user');
    }
        $this->form_validation->set_rules('nama', 'Nama Lengkap', 'required', [
        'required' => 'Nama Belum diisi!!'
    ]);
        $this->form_validation->set_rules('email', 'Alamat Email', 'required|trim|valid_email|is_unique[user.email]', [
        'valid_email' => 'Email Tidak Benar!!',
        'required' => 'Email Belum diisi!!',
        'is_unique' => 'Email Sudah Terdaftar!'
    ]);
        $this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[3]|matches[password2]', [
        'matches' => 'Password Tidak Sama!!',
        'min_length' => 'Password Terlalu Pendek'
    ]);
        $this->form_validation->set_rules('password2', 'Repeat Password', 'required|trim|matches[password1]');

    if ($this->form_validation->run() == false) {
        $data['judul'] = 'Registrasi Member';
        $this->load->view('templates/aute_header', $data);
        $this->load->view('autentifikasi/registrasi');
        $this->load->view('templates/aute_footer');
    } else {
        $email = $this->input->post('email', true);
        $data = [
        'nama' => htmlspecialchars($this->input->post('nama', true)),
        'email' => htmlspecialchars($email),
        'image' => 'default.jpg',
        'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
        'role_id' => 2,
        'is_active' => 1,
        'tanggal_input' => time()
    ];

        $this->db->insert('user', $data);
        $this->db->set($data);
        


        $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-message" role="alert">Selamat!! akun member anda sudah dibuat. Silahkan Aktivasi Akun anda</div>');
        redirect('autentifikasi');
        }
    }   

    private function _sendEmail($token, $type){
        $config = [
            'protocol'  =>'smtp',
            'smtp_host' =>'ssl://smtp.googlemail.com',
            'smtp_user' => 'killua060701@gmail.com',
            'smtp_pass' => 'killuazoldyck123',
            'smtp_port' => 465,
            'mailtype'  => 'html',
            'charset'   => 'utf-8',
            'newline'   => "\r\n"
        ];
        $this->load->library('email', $config);
        $this->email->initialize($config);
        $this->email->from('killua060701@gmail.com', 'Alfian Winuarto');
        $this->email->to($this->input->post('email'));
        if($type == 'verify'){
            $this->email->subject('Account Verification');
            $this->email->message('Click this link to verify your account : <a
            href="'. base_url() . 'autentifikasi/verify?email=' . $this->input->post('email') . '&
            token=' . urlencode($token) . '">Activate</a>');
        }
        else if ($type == 'forgot'){
            $this->email->subject('Reset Password');
            $this->email->message('Click this link to reset your password : <a
            href="'. base_url() . 'autentifikasi/resetpassword?email=' . $this->input->post('email') . '&
            token=' . urlencode($token) . '">Reset Password</a>');
        }

        if($this->email->send()){
            return true;
        }   else  {
                echo $this->email->print_debugger();
                die;
        }
    
    }

    public function forgotPassword()
    {
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
        if($this->form_validation->run() == false){
        $data['title'] = 'Forgot Password';
        $this->load->view('templates/aute_header',$data);
        $this->load->view('autentifikasi/forgotPassword');
        $this->load->view('templates/aute_footer');
    } else {
        $email = $this->input->post('email');
        $user = $this->db->get_where('user', ['email' => $email, 'is_active' => 1])->row_array();

    if($user){  
            require_once ('lib/random.php');
        $token = base64_encode(random_bytes(32));
        $user_token = [
            'email' => $email,
            'token' => $token,
            'date_created' => time()
        
        ]; 

        $this->db->insert('user_token', $user_token);
        $this->_sendEmail($token, 'forgot');

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            please check your email to reset your password!</div>');
        redirect('autentifikasi');

    } else {
        $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
            email is not registered or activated!</div>');
        redirect('autentifikasi');
        }
    }

  }
 

        public function resetpassword(){
            $email = $this->input->get('email');
            $token = $this->input->get('token');

            $user = $this->db->get_where('user', [ 'email' => $email])->row_array();

            if($user){
                $user_token = $this->db->get_where('user_token',['email' => $email])
                ->row_array();
                if($user_token){
                    $this->session->set_userdata('reset_email', $email);
                    $this->changePassword();  

                } 
                else    {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
            Reset Password Failed! Wrong Token!</div>');
        redirect('autentifikasi');
                }

            }
            else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
            Reset Password Failed! Wrong Email!</div>');
        redirect('autentifikasi');
            }
        }

        public function changePassword()
        {
            if(!$this->session->userdata('reset_email')) {
                redirect('autentifikasi');
            }

            $this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[4]|matches[password2]');
            $this->form_validation->set_rules('password2', 'Repeat Password', 'required|trim|min_length[4]|matches[password1]'); 
            
            if($this->form_validation->run() == false){
                $data['judul'] = 'Change Password';
                $this->load->view('templates/aute_header',$data);
                $this->load->view('autentifikasi/changePassword');
                $this->load->view('templates/aute_footer');
        }   else {
            $password = password_hash($this->input->post('password1'),
            PASSWORD_DEFAULT);
            $email = $this->session->userdata('reset_email');

            $this->db->set('password', $password);
            $this->db->where('email', $email);    
            $this->db->update('user');

            $this->session->unset_userdata('reset_email');
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Password has been changed ! Please Login.</div>');
                        redirect('autentifikasi');

        }
            
        }
    }