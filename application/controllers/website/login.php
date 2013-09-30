<?php

class login extends CI_Controller {
    function __construct() {
        parent::__construct();
    }
    
    function index() {
		if (isset($this->uri->segments[2]) && !empty($this->uri->segments[2])) {
			$method_name = $this->uri->segments[2];
			$this->$method_name();
		} else {
			$this->load->view( 'website/login' );
		}
    }
	
	function action() {
		$action = (!empty($_POST['action'])) ? $_POST['action'] : '';
		unset($_POST['action']);
		
		$result = array( 'status' => false );
		if ($action == 'login') {
			$user_alias = $this->User_model->get_by_id(array( 'alias' => $_POST['alias'] ));
			$user_email = $this->User_model->get_by_id(array( 'email' => $_POST['alias'] ));
			$user = (count($user_email) > 0) ? $user_email : $user_alias;
			
			if (count($user) == 0) {
				$result['message'] = 'Email Anda tidak terdaftar, silahkan register.';
			} else if (empty($user['is_active'])) {
				$result['message'] = 'Maaf, user Anda tidak aktif, mohon menghubungi Admin untuk pengaktifan kembali.';
			} else if ($user['passwd'] != EncriptPassword($_POST['passwd'])) {
				$result['message'] = 'Password Anda tidak sama, harap isikan password yang benar.';
			} else {
				$result['status'] = true;
				$this->User_model->set_session($user);
			}
		}
		
		echo json_encode($result);
	}
}