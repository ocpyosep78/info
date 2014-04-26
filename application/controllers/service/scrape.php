<?php

class scrape extends CI_Controller {
    function __construct() {
        parent::__construct();
    }
    
    function index() {
		// get scrape source
		$scrape = $this->Scrape_model->get_by_id(array( 'older' => true ));
		
		// get list post
		$this->load->library('scrape/'.$scrape['library_name']);
		
		// insert to db
		$insert_post = 0;
		$array_post = $this->$scrape['library_name']->get_array($scrape);
		foreach ($array_post as $post) {
			// add parameter
			$post['user_id'] = $scrape['user_id'];
			$post['category_id'] = $scrape['category_id'];
			$post['post_status_id'] = POST_STATUS_PUBLISH;
			$post['create_date'] = $this->config->item('current_datetime');
			$post['publish_date'] = $this->config->item('current_datetime');
			
			// insert
			$this->Post_model->update($post);
		}
		
		// update scrape time
		$update_param['id'] = $scrape['id'];
		$update_param['last_update'] = $this->config->item('current_datetime');
		$this->Scrape_model->update($update_param);
		
		// show result
		echo count($array_post)." post inserted.";
    }
}