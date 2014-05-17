<?php

class migration extends CI_Controller {
    function __construct() {
        parent::__construct();
    }
    
    function index() {
		$year_month = '2014/03';
		
		// prepare data
		$table_old = 'post';
		$table_new = 'post_'.preg_replace('/[^0-9]+/i', '', $year_month);
		list($year, $month) = explode('/', $year_month);
		
		// post
		$array_post = $this->get_array($table_old, $year, $month);
		
		// insert to new table
		foreach ($array_post as $row) {
			$row['id'] = 0;
			$this->Post_model->update($row, $table_new);
		}
		
		// delete from old table
		foreach ($array_post as $row) {
			$this->Post_model->delete($row, $table_old);
		}
    }
	
	function get_array($table, $year, $month) {
		$array = array();
		
		$select_query = "
			SELECT *
			FROM $table
			WHERE
				YEAR(create_date) = '$year'
				AND MONTH(create_date) = '$month'
			ORDER BY id ASC
			LIMIT 2500
		";
        $select_result = mysql_query($select_query) or die(mysql_error());
		while ( $row = mysql_fetch_assoc( $select_result ) ) {
			$array[] = $row;
		}
		
		return $array;
	}
}