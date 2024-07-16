<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

    public function __construct() {
		parent::__construct();

		if(isset($_SESSION['id']) && $_SESSION['user_type']=='admin'){
			redirect('admin');
		}elseif(isset($_SESSION['id']) && $_SESSION['user_type']=='agent'){
            redirect('agent');
        }
	}

	public function index()
	{
		$this->load->view('login');
	}
    // login validation here...(y)
    public function check_login()
    {
        $this->form_validation->set_rules('email','Email Address','required');
        $this->form_validation->set_rules('password','Password','required');
        $this->form_validation->set_error_delimiters('<div style="color:red;font-size: 14px;">','</div>');
        if($this->form_validation->run()){
            $email = $this->input->post('email');
            $pass  = $this->input->post('password');
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
                    $this->session->set_userdata($sess_arr);
                    if ($remember == "on"){
                        //set up cookie
                        set_cookie("email", $email, time() + (86400 * 30)); 
                        set_cookie("password", $pass, time() + (86400 * 30)); 
                    }else{
                        delete_cookie("email");
                        delete_cookie("password");
                    }
                    if($query[0]['user_type']=='admin'){
                        $message = array(
                            'status' => 'admin',
                            'msg' => 'Logged in successfully'
                        );
                    }elseif($query[0]['user_type']=='agent'){
                        $message = array(
                            'status' => 'agent',
                            'msg' => 'Logged in successfully'
                        );
                    }elseif($query[0]['user_type']=='user'){
                        $message = array(
                            'status' => 'user',
                            'msg' => 'Logged in successfully'
                        );
                    }
                }else{
                    $message = array(
                        'status' => 2,
                        'msg' => 'Please contact to admin for account activation'
                    );
                }
            }else{
                $message = array(
                    'status' => 2,
                    'msg' => 'Incorrect Credentials'
                );
            }
        }else{
            $message = array(
                'status' => 2,
                'msg' => 'Incorrect Credentials'
            );
        }
        echo json_encode($message);
    }

    public function logout()
	{
		$this->session->sess_destroy();
		redirect('login');
	}

    public function forgot_password()
    {
        $this->load->view('forgot_pws');
    }

    public function forgot_password_link()
    {
        
		$this->form_validation->set_rules('reset_email','','required');
		if($this->form_validation->run()){
			$tomail = $this->input->post('reset_email');
			$where_data = array('email' => $tomail);
            $getUserData = $this->Db_model->select_data('*','px_userdata',$where_data);
			if($getUserData){

				$frommail = loop_select('id',1,'mail_user','px_mail_credential');
				$frompwd = loop_select('id',1,'mail_password','px_mail_credential');

				$title = loop_select('id',1,'website_title','px_owner_company');
				$token = substr(str_shuffle("0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, 50);
				$subject = 'Password Reset';
				
				$message = '';
				$message .= '<html><body>';
				$message .= "<h2>You are receiving this message in response to your request for password reset</h2>";
				$message .= "<p>Follow this link to reset your password <a href='".base_url()."login/resetpassword/".$token."' >Reset Password</a> </p>";
				$message .= "<p>If You did not make this request kindly ignore!</p>";
				$message .= "<P class='pj'><h2>Kind Regard: ".$title."</h2></p>";
                $message .= '</body></html>';

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
				
				// Set to, from, message, etc.
				$this->email->initialize($config);
				$this->email->from($frommail, $title);
				$this->email->to($tomail);
				
				$this->email->subject($subject);
				$this->email->message($message);
				
				if ($this->email->send()) {
					$reset_email = $this->input->post('reset_email');
					$ipadd = $this->input->ip_address();
					$insert = array(
					'email' => $tomail,
						'ipaddress' => $ipadd,
						'token' => $token
					);

					$this->Db_model->insert_data('px_passwordreset', $insert);
					$mail = $this->session->set_userdata('email');
					$message = array(
						'status' => 4,
						'msg' => 'Mail sent successfully'
					);
				}else{
					$message = array(
						'status' => 2,
						'msg' => 'Mail error found'
					);
				}

			}else{
				$message = array(
					'status' => 2,
					'msg' => 'Mail not exist'
				);
			}
		}else{
			$message = array(
				'status' => 2,
				'msg' => 'Field is required'
			);
		}
		echo json_encode($message);
    }




    public function resetpassword($token)
    {
        $tokendata['token'] = $token;
        $this->load->view('reset_password',$tokendata);
    }

    public function reset_password()
    {
        $this->load->view('reset_password');
    }

    public function getresetpassword()
    {
       $this->form_validation->set_rules('reset_password','','required');
       $this->form_validation->set_rules('conform_password','','required');
       if($this->form_validation->run()){
            $reset_password = $this->input->post('reset_password');
            $conform_password = $this->input->post('conform_password');
            $token = $this->input->post('token');
            $data = $this->Db_model->select_data('*','px_passwordreset',array('token' => $token));
            if($reset_password == $conform_password){
                $reset_email = $data[0]['email'];
                $password = md5($conform_password);
                $update = array(
                    'password' => $password
                );
                $updated = $this->Db_model->update_data('px_userdata',$update,array('email' => $reset_email));
                if($updated){
                    $message = array(
                        'status' => 1,
                        'msg' => 'Password changed successfully'
                    );
                }
            }
       }else{
            $message = array(
                'status' => 2,
                'msg' => 'Fields are required'
            );
       }
       echo json_encode($message);
    }
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    public function test_email_01()
    {
    
                echo '<h1>Sachin Email Code.</h1>';
    
			    $tomail = 'himanshu@maishainfotech.com';
		
				$title = loop_select('id',1,'website_title','px_owner_company');
				$token = substr(str_shuffle("0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, 50);
				$subject = 'Password Reset';
				$message = '';
				$message .= "<h2>You are receiving this message in response to your request for password reset</h2>"
						. "<p>Follow this link to reset your password <a href='".base_url()."login/resetpassword/".$token."' >Reset Password</a> </p>"
						. "<p>If You did not make this request kindly ignore!</p>"
						. "<P class='pj'><h2>Kind Regard: ".$title."</h2></p>"
						. "<style>"
						. ".pj{"
						. "color:green;"
						. "}"
						. "</style>"
						. "";

				if (sendEmail_v2($tomail, $subject, $message)) {
					$reset_email = $this->input->post('reset_email');
					$ipadd = $this->input->ip_address();
					$insert = array(
					'email' => $tomail,
						'ipaddress' => $ipadd,
						'token' => $token
					);
					
					$message = array(
						'status' => 4,
						'msg' => 'Mail sent successfully'
					);
				
				}else{
					$message = array(
						'status' => 2,
						'msg' => 'Mail error found'
					);
				}

		echo '<pre>';
		print_r($message);
		echo '</pre>';
		
    }

    
    
    public function test_email_02()
    {
    
    
    echo '<h1>Prebuild Email Code.</h1>';
    
			    $tomail = 'himanshu@maishainfotech.com';
		



				$title = loop_select('id',1,'website_title','px_owner_company');
				$token = substr(str_shuffle("0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, 50);
				$subject = 'Password Reset';
				
				$message = '';
				$message .= "<h2>You are receiving this message in response to your request for password reset</h2>";
				$message .=	"<p>Follow this link to reset your password <a href='".base_url()."login/resetpassword/".$token."' >Reset Password</a> </p>";
				$message .=	"<p>If You did not make this request kindly ignore!</p>";
				$message .=	"<P class='pj'><h2>Kind Regard: ".$title."</h2></p>";

				$frommail = loop_select('id',1,'mail_user','px_mail_credential');
				$frompwd = loop_select('id',1,'mail_password','px_mail_credential');

				$config = array();
				$config['protocol'] = loop_select('id',1,'server_type','px_mail_credential');
				$config['smtp_host'] = loop_select('id',1,'server_host','px_mail_credential');
				$config['smtp_port'] = loop_select('id',1,'server_port','px_mail_credential');
				$config['smtp_user'] = loop_select('id',1,'mail_user','px_mail_credential');
				$config['smtp_pass'] = loop_select('id',1,'mail_password','px_mail_credential');
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
					$ipadd = $this->input->ip_address();
					$insert = array(
					'email' => $tomail,
						'ipaddress' => $ipadd,
						'token' => $token
					);


					//$this->Db_model->insert_data('px_passwordreset', $insert);
					//$mail = $this->session->set_userdata('email');
					
					
					$message = array(
						'status' => 4,
						'msg' => 'Mail sent successfully'
					);
				}else{
					$message = array(
						'status' => 2,
						'msg' => 'Mail error found'
					);
				}

		
		
		//echo json_encode($message);
		
		
		echo '<pre>';
		print_r($message);
		echo '</pre>';
		
		
    }

    
    
    
    public function login_mobile()
    {
        //
    }
    
    
    
    
    
    
}
