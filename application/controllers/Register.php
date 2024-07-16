<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Register extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();


        // 		if(isset($_SESSION['id'])){
// 		    print_r($_SESSION['id']);
// 			redirect('dashboard');
// 		}

        if (isset($_SESSION['isMobileApp'])) {
            $login_page_url = base_url('login_mobile');
        } else {
            $login_page_url = base_url('login');
        }
    }

    public function index()
    {
        $this->load->view('register');
    }

    public function registered()
    {
        $this->form_validation->set_rules('full_name', '', 'trim|required');
        $this->form_validation->set_rules('email', '', 'required');
        $this->form_validation->set_rules('password', '', 'required');
        $this->form_validation->set_rules('phone', '', 'required');
        $this->form_validation->set_rules('user_type', '', 'required');
        $this->form_validation->set_error_delimiters('<div style="color:red;font-size: 14px;">', '</div>');
        $pattern = '/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[$@!%*?&])[A-Za-z\d$@!%*?&]{8,255}$/';
        if ($this->form_validation->run()) {
            if (!preg_match($pattern, $this->input->post('password'))) {
                $message = array(
                    'status' => 2,
                    'msg' => 'Password must contain uppercase, lowercase, special and numeric characters. Length 8 to 200'
                );
            }else if( strlen($this->input->post('phone')) < 7 ){
                $message = array(
                    'status' => 2,
                    'msg' => 'Please enter valid phone number'
                );
            }
             else {


                $password = $this->input->post('password');
                $pass = md5($password);
                $email = $this->input->post('email');
                $exist_email = $this->Db_model->select_data('email', 'px_userdata', array('email' => $email));
                if ($exist_email) {
                    $message = array(
                        'status' => 2,
                        'msg' => 'Email already exist'
                    );
                    echo json_encode($message);
                    die();
                }
                $full_nm = $this->input->post('full_name');
                $rg_phone = $this->input->post('rg_phone');
                $phone = $this->input->post('phone');
                $register_phone = $rg_phone . $phone;
                $user_type = $this->input->post('user_type');
                if ($user_type == 'agent') {
                    $data = array(
                        'full_name' => $full_nm,
                        'email' => $email,
                        'password' => $pass,
                        'phone' => $register_phone,
                        'user_type' => $user_type,
                        'status' => 1
                    );
                } else if ($user_type == 'user') {
                    $data = array(
                        'full_name' => $full_nm,
                        'email' => $email,
                        'password' => $pass,
                        'phone' => $register_phone,
                        'user_type' => $user_type,
                        'status' => 1
                    );
                }
                $result = $this->Db_model->insert_data('px_userdata', $data);

                if ($result) {
                    $message = array(
                        'status' => 4,
                        'msg' => 'You have registered successfully',
                        'action' => 'register',
                    );
                }
            }
        } else {
            $message = array(
                'status' => 2,
                'msg' => 'Fields are required'
            );
        }
        echo json_encode($message);
    }
}