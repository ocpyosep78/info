<?php

class register extends CI_Controller {
    function __construct() {
        parent::__construct();
    }
    
    function index() {
		if (isset($this->uri->segments[2]) && !empty($this->uri->segments[2])) {
			$method_name = $this->uri->segments[2];
			$this->$method_name();
		} else {
			$this->load->view( 'website/register' );
		}
    }
	
	function action() {
		$action = (!empty($_POST['action'])) ? $_POST['action'] : '';
		unset($_POST['action']);
		
		$result = array( 'status' => false );
		if ($action == 'register') {
			$user = $this->User_model->get_by_id(array( 'email' => $_POST['email'] ));
			if (count($user) > 0) {
				$result['message'] = 'Email Anda sudah terdaftar, silahkan login.';
				echo json_encode($result);
				exit;
			}
			
			$param = $_POST;
			$param['is_active'] = 1;
			$param['user_type_id'] = USER_TYPE_MEMBER;
			$param['register_date'] = $this->config->item('current_datetime');
			$param['passwd'] = EncriptPassword($param['passwd']);
			$result = $this->User_model->update($param);
			
			// set user
			$result['status'] = true;
			$user = $this->User_model->get_by_id(array( 'id' => $result['id'] ));
			$this->User_model->set_session($user);
		}
		
		echo json_encode($result);
	}
}