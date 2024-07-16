<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ApiController extends CI_Controller {

	public function __construct() {
		parent::__construct();
	}
	
	 public function login()
    {
        header('Content-Type: application/json; charset=utf-8');
        
        $message = array(
                'status' => 'false',
                'msg' => 'error',
                'url' => '',
                'user_type' => '',
        );
        
        $this->form_validation->set_rules('email','Email Address','required');
        $this->form_validation->set_rules('password','Password','required');
        //$this->form_validation->set_error_delimiters('<div style="color:red;font-size: 14px;">','</div>');
        if($this->form_validation->run()){
           
            $email = $this->input->post('email');
            $pass = $this->input->post('password');
            $password = md5($pass);
            $remember=$this->input->post('remember');
            $email = $this->security->xss_clean($email);
			$password = $this->security->xss_clean($password);
            $where = array(
                'email' => $email,
                'password' => $password
            );
            $query = $this->Db_model->select_data('*','px_userdata',$where,1);
            if(!empty($query)){
                if($query[0]['status']==1){
                    $se_id = $query[0]['id'];
                    $se_email = $query[0]['email'];
                    $se_utype = $query[0]['user_type'];
                    $profile_photo = $query[0]['profile_photo'];
                    $sess_arr = array(
                        'id' => $se_id,
                        'email' => $se_email,
                        'user_type' => $se_utype,
                        'remember' => $remember,
                        'profile_photo' => $profile_photo,
                        'islogged' => TRUE
                    );
                   

                    $directLogin = 'https://resalebro.com/login-token?tk='.encrypt_decrypt($sess_arr);

                    if($query[0]['user_type']=='admin'){
                        // $message = array(
                        //     'status' => 'admin',
                        //     'msg' => 'Logged in successfully',
                        //     'url' => $directLogin
                        // );
                        $message = array(
                            'status' => 'false',
                            'msg' => 'Incorrect Credentials',
                            'url' => '',
                            'user_type' => '',
                        );
                    }elseif($query[0]['user_type']=='agent'){
                        $message = array(
                            'status' => 'true',
                            'msg' => 'Logged in successfully',
                            'url' => $directLogin,
                            'user_type' => 'agent'
                        );
                    }elseif($query[0]['user_type']=='user'){
                        $message = array(
                            'status' => 'true',
                            'msg' => 'Logged in successfully',
                            'url' => $directLogin,
                            'user_type' => 'user'
                        );
                    }
                }else{
                    $message = array(
                        'status' => 'false',
                        'msg' => 'Please contact to admin for account activation',
                        'url' => '',
                        'user_type' => '',
                    );
                }
            }else{
                $message = array(
                    'status' => 'false',
                    'msg' => 'Incorrect Credentials',
                    'url' => '',
                    'user_type' => '',
                );
            }
        }else{
            $message = array(
                'status' => 'false',
                'msg' => 'Incorrect Credentials',
                'url' => '',
                'user_type' => '',
            );
        }

        echo json_encode($message);

    }

	
	public function signup()
	{
        header('Content-Type: application/json; charset=utf-8');
        $this->form_validation->set_rules('full_name','','required');
        $this->form_validation->set_rules('email','','required');
        $this->form_validation->set_rules('password','','required');
        $this->form_validation->set_rules('phone','','required');
        $this->form_validation->set_rules('user_type','','required');
        if ($this->form_validation->run()) {
           $password = $this->input->post('password');
           $pass = md5($password);
           $email = $this->input->post('email');
           $exist_email = $this->Db_model->select_data('email','px_userdata',array('email' => $email));
           if($exist_email){
                $message = array(
                    'status' => 'false',
                    'msg' => 'Email already exist',
                    'url' => '',
                );
                echo json_encode($message);die();
           }
           $full_nm = $this->input->post('full_name');
           $rg_phone = $this->input->post('rg_phone');
           $phone = $this->input->post('phone');
           $phone = str_replace("+","",$phone);
           $register_phone = $rg_phone.$phone;
           $user_type = $this->input->post('user_type');
           if(strtolower($user_type)=='agent'){
                $data = array(
                    'full_name'=>$full_nm,
                    'email'=>$email,
                    'password'=>$pass,
                    'phone'=>$register_phone,
                    'user_type' => $user_type,
                    'status' => 1
                );
           }else if(strtolower($user_type)=='user'){
                $data = array(
                    'full_name'=>$full_nm,
                    'email'=>$email,
                    'password'=>$pass,
                    'phone'=>$register_phone,
                    'user_type' => $user_type,
                    'status' => 1
                );
           }
          $result = $this->Db_model->insert_data('px_userdata',$data);
          if ($result) {
              
                $CI =& get_instance();
                $CI->db->from( 'px_userdata' );
                $CI->db->where( ['id' => $result ] );
                $userInfoGet = $CI->db->get()->row();

                $sess_arr = array(
                    'id' => $userInfoGet->id,
                    'email' => $userInfoGet->email,
                    'user_type' => $userInfoGet->user_type,
                    'islogged' => TRUE
                );

            $directLogin = 'https://resalebro.com/login-token?tk='.encrypt_decrypt($sess_arr);
            
            $message = array(
                'status' => 'true',
                'msg' => 'You have registered successfully',
                'url' => $directLogin
            );
          }
        }else{
            $message = array(
                'status' => 'false',
                'msg' => 'Fields are required',
                'url' => ''
            );
        }
        echo json_encode($message);
	}
	
	
	public function loginToken(){
	    
	    if( isset($_GET['tk']) ){
	        
	        $sess_arr = encrypt_decrypt($_GET['tk'], 'decrypt');
	        if($sess_arr){

	            $sess_arr = json_decode(json_encode($sess_arr), true);
	            $sess_arr['ismobile'] = 'yes';
	            $this->session->set_userdata($sess_arr);
	             redirect('homepage/index');

	        }else{
	            
	            //echo 'login page redirect';
	            redirect('homepage/index');
	        }
	        
	    }else{
	        //echo 'login page redirect';
	        redirect('homepage/index');
	    }
	    
	}
	
	
	public function forgotPassword(){
	 
	    header('Content-Type: application/json; charset=utf-8');
		$this->form_validation->set_rules('reset_email','','required');
		if($this->form_validation->run()){
			$tomail = $this->input->post('reset_email');
			$where_data = array('email' => $tomail);
            $getUserData = $this->Db_model->select_data('*','px_userdata',$where_data);
			if($getUserData){
				$frommail =loop_select('id',1,'mail_user','px_mail_credential');
				$frompwd =loop_select('id',1,'mail_password','px_mail_credential');
				$title = loop_select('id',1,'website_title','px_owner_company');
				$token = substr(DIGIT_OTP_4(), 0, 4);
				$subject = 'Password Reset';
				$message = '';
				$message .= "<h2>You are receiving this message in response to your request for password reset</h2>"
						. "<p>OTP: ".$token
						. "<p>If You did not make this request kindly ignore!</p>"
						. "<P class='pj'><h2>Kind Regard: ".$title."</h2></p>"
						. "";

				$config = array();
				$config['protocol'] = loop_select('id',1,'server_type','px_mail_credential');
				$config['smtp_host'] = loop_select('id',1,'server_host','px_mail_credential');
				$config['smtp_port'] = loop_select('id',1,'server_port','px_mail_credential');
				$config['smtp_user'] = $frommail;
				$config['smtp_pass'] = $frompwd;
				$config['charset'] = "utf-8";
				$config['mailtype'] = "html";
				$config['smtp_crypto'] = loop_select('id',1,'mail_encryption','px_mail_credential');
				$config['newline'] = "\r\n";
				
				//Set to, from, message, etc.
				$this->email->initialize($config);
				$this->email->from($frommail, $title);
				$this->email->to($tomail);
				
				$this->email->subject($subject);
				$this->email->message($message);

				if ($this->email->send()) {
					$reset_email = $this->input->post('reset_email');
					$insert = array(
					    'email' => $tomail,
						'otp' => $token
					);
					$this->Db_model->insert_data('temp_otp', $insert);
					$message = array(
					    'status' => 'true',
						'msg' => "Mail sent successfully."
					);
				}else{
					$message = array(
						'status' => 'false',
						'msg' => 'Mail error found'
					);
				}

			}else{
				$message = array(
					'status' => 'false',
					'msg' => 'Mail not exist'
				);
			}
		}else{
			$message = array(
				'status' => 'false',
				'msg' => 'Field is required'
			);
		}
		echo json_encode($message);

	}
	
	
	
	public function forgotPasswordVerification(){

        header('Content-Type: application/json; charset=utf-8');
        $message = '';
		$this->form_validation->set_rules('reset_email','','required');
		$this->form_validation->set_rules('reset_otp','','required');
		$this->form_validation->set_rules('password','','required');
		if($this->form_validation->run()){
			$tomail = $this->input->post('reset_email');
			$reset_otp = $this->input->post('reset_otp');
			$reset_password = $this->input->post('password');
			$where_data = array('email' => $tomail);
            $getUserData = $this->Db_model->select_data('*','px_userdata',$where_data);
			if($getUserData){
	            $getTempOtp = _getWhere('temp_otp', ['email' => $tomail, 'otp' => $reset_otp, 'is_used' => 'n']);
	            if($getTempOtp){
	                
	                
	                //OTP Used
            		_updateWhere( 'temp_otp', ['email' => $tomail, 'otp' => $reset_otp, 'is_used' => 'n'], [
            			'is_used' => 'y',
            		] );
            		
            		_updateWhere( 'px_userdata', ['email' => $tomail], [
            			'password' => md5($reset_password),
            		] );
	                
	                $message = array(
    					'status' => 'true',
    					'msg' => 'Your password has been changed successfully.'
				    );
	                
	            }else{
	                $message = array(
    					'status' => 'false',
    					'msg' => 'invalid otp'
				    );
	            }
			}else{
				$message = array(
					'status' => 'false',
					'msg' => 'Mail not exist'
				);
			}
		}else{
			$message = array(
				'status' => 'false',
				'msg' => 'Field is required'
			);
		}
		echo json_encode($message);
	    
	}
	
}

