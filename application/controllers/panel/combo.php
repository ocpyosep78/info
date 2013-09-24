<?php

class combo extends CI_Controller {
	function __construct() {
		parent::__construct();
	}
	
	function index() {
		$array = array();
		$action = (!empty($_POST['action'])) ? $_POST['action'] : '';
		
		if ($action == 'category') {
			$array = $this->Category_model->get_array(array( ));
		} else if ($action == 'link_short') {
			$array = $this->Link_Short_model->get_array(array( ));
		} else if ($action == 'post_status') {
			$array = $this->Post_Status_model->get_array(array( ));
		} else if ($action == 'scrape_master') {
			$array = $this->Scrape_Master_model->get_array($_POST);
		} else if ($action == 'user') {
			$array = $this->User_model->get_array($_POST);
		} else if ($action == 'user_type') {
			$array = $this->User_Type_model->get_array(array( ));
		}
		
		echo json_encode($array);
		exit;
	}
}                                                