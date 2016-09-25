<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Login  extends CI_Controller {

	function __construct() {
		parent::__construct();
		$this->load->model('LoginModel','Login');
	}

	public function Index()
	{
		if($this->session->userdata('user_id'))
		{
			return redirect('Admin/Index');
		}
		else
		{
			$data['title'] = "ABC Pharmacy";
			if($this->input->post()){
				$this->load->library('form_validation');

				if($this->form_validation->run('LoginForm')){
					$username = $this->input->post('Username');
					$password = $this->input->post('Password');

					$UserId = $this->Login->Login_Access($username,$password);
					if( $UserId != 0){
						//$this->session->set_userdata('UserId',$UserId);

						//return redirect('Admin/Index');
						$this->session->set_flashdata('errorMessage',"Happy Now :P.");
						return redirect('Login',$data);
					}
					else{
						$this->session->set_flashdata('errorMessage',"Invalid Username or Password.");
						return redirect('Login',$data);
					}
				}else{
					$this->load->view('Login/Index',$data);
				}
			}else{
				$this->load->view('Login/Index',$data);
			}
		}
	}


	public function ResetPassword()
	{
		$key = $this->input->post('Username');
		$data["User_info"] = $this->Login->getUserEmail($key);
	
		// The mail sending protocol.
		$config['protocol'] = 'smtp';
		// SMTP Server Address for Gmail.
		$config['smtp_host'] = 'ssl://smtp.googlemail.com';
		// SMTP Port - the port that you is required
		$config['smtp_port'] = '465';
		$config['smtp_timeout'] = '7';
		$config['charset']    = 'utf-8';

        $config['newline']    = "\r\n";

        $config['mailtype'] = 'text'; // or html

        $config['validation'] = TRUE; // bool whether to validate email or not
		// SMTP Username like. (abc@gmail.com)
		$config['smtp_user'] = 'talukder.it2016@gmail.com';
		// SMTP Password like (abc***##)
		$config['smtp_pass'] = 'T@lukder';
		// Load email library and passing configured values to email library
		$this->load->library('email', $config);
		// Sender email address
		$this->email->from('talukder.it2016@gmail.com', "ABC Pharmacy Admin");
		// Receiver email address.for single email
		$this->email->to($data["User_info"]->Email);

		// Subject of email
		$this->email->subject('ABC Pharmacy Reset Password');
		// Message in email
		$this->email->message('Reset Your Password Here: '.base_url('Login/NewPassword').'/'.$data["User_info"]->UserId);
		// It returns boolean TRUE or FALSE based on success or failure
		$this->email->send();

		$this->session->set_flashdata('errorMessage',"Password reset link sended to your email address.Please check your email.");
		return redirect('Login',$data);
	}

	public function ForgotPassword()
	{
		$data['title'] = "ABC Pharmacy";
		
		$this->load->view('Login/ForgotPassword',$data);
	}

	public function LockAccount()
	{
		$data['title'] = "ABC Pharmacy";

		if($this->input->post()){
			$username = $this->input->post('username');
			$password = $this->input->post('password');

					$UserId = $this->Login->Login_Access($username,$password);
					if( $UserId != 0){
						//$this->session->set_userdata('UserId',$UserId);

						//return redirect('Admin/Index');
						$this->session->set_flashdata('errorMessage',"Happy Now :P.");
						return redirect('Login/LockAccount',$data);
					}
					else{
						$this->session->set_flashdata('errorMessage',"Invalid Username or Password.");
						return redirect('Login/LockAccount',$data);
					}
		}else{
			$this->load->view('Login/LockAccount',$data);
		}
	}

	public function NewPassword()
	{
		$data['title'] = "Reset Password";

		$data['UserId'] = $this->uri->segment(3);

		if($this->input->post()){
			$this->load->library('form_validation');
			if($this->form_validation->run('NewPasswordForm')){
				$confirmPassword = $this->input->post('ConfirmPassword');
				$password = $this->input->post('Password');
				$UserId = $data['UserId'];

				$changeStatus = $this->Login->Change_Password($UserId,$confirmPassword);
				if($changeStatus){
					$this->session->set_flashdata('errorMessage',"Your password was reset.Now you can login with your new password.");
					return redirect('Login',$data);
				}else{
					$this->session->set_flashdata('errorMessage',"Your password was not reset.Please try again!");
					return redirect('Login',$data);
				}
			}else{
				$this->load->view('Login/NewPassword',$data);
			}
		}else{
			$this->load->view('Login/NewPassword',$data);
		}
	}

	public function logout()
	{
		$this->session->unset_userdata('user_id');
		return redirect('Login');
	}
}
