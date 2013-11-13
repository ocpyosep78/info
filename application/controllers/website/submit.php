<?php

class submit extends CI_Controller {
    function __construct() {
        parent::__construct();
    }
    
    function index() {
		if (isset($this->uri->segments[2]) && !empty($this->uri->segments[2])) {
			$method_name = $this->uri->segments[2];
			$this->$method_name();
		} else {
			$this->load->view( 'website/submit' );
		}
    }
	
    function action() {
		$action = (!empty($_POST['action'])) ? $_POST['action'] : '';
		unset($_POST['action']);
		
		// user
		$is_login = $this->User_model->is_login();
		$user = $this->User_model->get_session();
		
		// post check
		$post_check = $this->Post_model->get_by_id(array( 'link_source' => $_POST['link_source'] ));
		
		// check illegal word
		$is_illegal = array( 'status' => false );
		$is_illegal = (!$is_illegal['status']) ? is_illegal_word($_POST['name']) : $is_illegal;
		$is_illegal = (!$is_illegal['status']) ? is_illegal_word($_POST['link_source']) : $is_illegal;
		
		if (! $is_login) {
			$result = array( 'status' => false, 'message' => 'Session Anda sudah berakhir, silahkan login kembali.' );
			echo json_encode($result);
			exit;
		} else if (count($post_check) > 0) {
			$result = array( 'status' => false, 'message' => 'Link ini sudah ada dalam database kami, silahkan memasukan link yang lain.' );
			echo json_encode($result);
			exit;
		} else if ($is_illegal['status']) {
			$result = array( 'status' => false, 'message' => 'Berita yang Anda posting mengandung kata ilegal ('.$is_illegal['word'].'). Maaf kami menambahkan filter tambahan karena website kami telah terblokir untuk beberapa operator internet.' );
			echo json_encode($result);
			exit;
		}
		
		$result = array( 'status' => false );
		if ($action == 'update') {
			$param['user_id'] = $user['id'];
			$param['name'] = $_POST['name'];
			$param['thumbnail'] = $_POST['thumbnail'];
			$param['link_source'] = $_POST['link_source'];
			$param['category_id'] = $_POST['category_id'];
			$param['desc'] = nl2br(strip_tags($_POST['desc']));
			$param['post_status_id'] = POST_STATUS_PUBLISH;
			$param['alias'] = $this->Post_model->get_name($_POST['name']);
			$param['create_date'] = $this->config->item('current_datetime');
			$param['publish_date'] = $this->config->item('current_datetime');
			$result = $this->Post_model->update($param);
			
			// post
			$post = $this->Post_model->get_by_id(array( 'id' => $result['id'] ));
			$result['redirect'] = $post['post_link'];
		}
		
		echo json_encode($result);
    }
}