<?php

class detail extends CI_Controller {
    function __construct() {
        parent::__construct();
    }
    
    function index() {
		if (!empty($_POST['action'])) {
			$this->action($_POST);
		} else {
			$this->load->view( 'website/detail' );
		}
    }
	
	function action($param) {
		$action = $param['action'];
		unset($param['action']);
		
		// user
		$user = $this->User_model->get_session();
		
		$result = array( 'status' => false );
		if ($action == 'comment') {
			$comment_param['is_publish'] = 1;
			$comment_param['post_id'] = $param['post_id'];
			$comment_param['comment_time'] = $this->config->item('current_datetime');
			$comment_param['email'] = (!empty($param['email'])) ? $param['email'] : $user['email'];
			$comment_param['fullname'] = (!empty($param['fullname'])) ? $param['fullname'] : $user['fullname'];
			$comment_param['comment'] = strip_tags($param['comment']);
			$result = $this->Comment_model->update($comment_param);
			$result['status'] = true;
		}
		
		echo json_encode($result);
		exit;
	}
}