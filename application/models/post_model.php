<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Post_model extends CI_Model {
    function __construct() {
        parent::__construct();
		
        $this->field = array(
			'id', 'user_id', 'category_id', 'post_status_id', 'alias', 'name', 'desc', 'thumbnail', 'link_source', 'create_date', 'publish_date',
			'view_count', 'is_hot', 'is_popular'
		);
		$this->table = array( '201309', '201310', '201311', '201312', '201401', '201402', '201403' );
    }

    function update($param, $table = POST) {
        $result = array();
		
        if (empty($param['id'])) {
            $insert_query  = GenerateInsertQuery($this->field, $param, $table);
            $insert_result = mysql_query($insert_query) or die(mysql_error());
           
            $result['id'] = mysql_insert_id();
            $result['status'] = '1';
            $result['message'] = 'Data berhasil disimpan.';
        } else {
            $update_query  = GenerateUpdateQuery($this->field, $param, $table);
            $update_result = mysql_query($update_query) or die(mysql_error());
           
            $result['id'] = $param['id'];
            $result['status'] = '1';
            $result['message'] = 'Data berhasil diperbaharui.';
        }
		
		$param['id'] = $result['id'];
		$this->update_tag($param);
		$this->resize_image($param);
		
        return $result;
    }
	
	function update_tag($param) {
		if (isset($param['tag'])) {
			$this->Post_Tag_model->delete(array( 'post_id' => $param['id'] ));
			$array_tag = explode(',', $param['tag']);
			foreach ($array_tag as $tag_queue) {
				$tag_name = trim($tag_queue);
				if (empty($tag_name)) {
					continue;
				}
				
				$tag_alias = $this->Tag_model->get_name($tag_name);
				$tag = $this->Tag_model->get_by_id(array( 'alias' => $tag_alias, 'name' => $tag_name, 'force_insert' => true ));
				
				// insert
				$param_tag['post_id'] = $param['id'];
				$param_tag['tag_id'] = $tag['id'];
				$this->Post_Tag_model->update($param_tag);
			}
		}
	}
	
    function get_by_id($param) {
        $array = array();
		$table_name = (isset($param['table_name'])) ? $param['table_name'] : POST;
		$param['tag_include'] = (isset($param['tag_include'])) ? $param['tag_include'] : false;
       
        if (isset($param['id'])) {
            $select_query  = "
				SELECT Post.*, User.fullname user_fullname, Category.name category_name, Category.alias category_alias
				FROM ".$table_name." Post
				LEFT JOIN ".CATEGORY." Category ON Category.id = Post.category_id
				LEFT JOIN ".USER." User ON User.id = Post.user_id
				WHERE Post.id = '".$param['id']."'
				LIMIT 1
			";
		} else if (isset($param['year']) && isset($param['month']) && isset($param['alias'])) {
			$check_name = $param['year'].$param['month'];
			if (in_array($check_name, $this->table)) {
				$table_name = POST.'_'.$check_name;
			}
			
			$select_query  = "SELECT * FROM ".$table_name." WHERE YEAR(create_date) = '".$param['year']."' AND MONTH(create_date) = '".$param['month']."' AND alias = '".$param['alias']."' LIMIT 1";
        } else if (isset($param['link_source'])) {
			$select_query  = "SELECT * FROM ".POST." WHERE link_source = '".$param['link_source']."' LIMIT 1";
        } else if (isset($param['alias'])) {
			$select_query  = "SELECT alias FROM ".POST." WHERE alias = '".$param['alias']."' LIMIT 1";
        }
		
        $select_result = mysql_query($select_query) or die(mysql_error());
        if (false !== $row = mysql_fetch_assoc($select_result)) {
			$row['table_name'] = $table_name;
            $array = $this->sync($row);
        }
		
		if (count($array) > 0 && $param['tag_include']) {
			$array['array_tag'] = $this->Post_Tag_model->get_array(array( 'post_id' => $array['id'] ));
		}
		
        return $array;
    }
	
    function get_array($param = array()) {
        $array = array();
		
		// replace
		$param['field_replace']['name'] = 'Post.name';
		$param['field_replace']['category_name'] = 'Category.name';
		
		$string_is_hot = (isset($param['is_hot'])) ? "AND Post.is_hot = '".$param['is_hot']."'" : '';
		$string_is_popular = (!empty($param['is_popular'])) ? "AND Post.is_popular = '1'" : '';
		$string_is_picture = (!empty($param['is_picture'])) ? "AND Post.thumbnail != ''" : '';
		$string_month = (isset($param['month'])) ? "AND MONTH(Post.create_date) = '".$param['month']."'" : '';
		$string_year = (isset($param['year'])) ? "AND YEAR(Post.create_date) = '".$param['year']."'" : '';
		$string_namelike = (!empty($param['namelike'])) ? "AND Post.name LIKE '%".$param['namelike']."%'" : '';
		$string_max_id = (!empty($param['max_id'])) ? "AND Post.id < '".$param['max_id']."'" : '';
		$string_category = (!empty($param['category_id'])) ? "AND Post.category_id = '".$param['category_id']."'" : '';
		$string_is_publish = (isset($param['is_publish'])) ? "AND Post.post_status_id = '".POST_STATUS_PUBLISH."'" : '';
		$string_publish_date = (!empty($param['publish_date'])) ? "AND Post.publish_date <= '".$param['publish_date']."'" : '';
		$string_filter = GetStringFilter($param, @$param['column']);
		$string_sorting = GetStringSorting($param, @$param['column'], 'Post.name ASC');
		$string_limit = GetStringLimit($param);
		
		$select_query = "
			SELECT SQL_CALC_FOUND_ROWS Post.*, User.fullname user_fullname,
				Category.name category_name, PostStatus.name post_status_name
			FROM ".POST." Post
			LEFT JOIN ".USER." User ON User.id = Post.user_id
			LEFT JOIN ".CATEGORY." Category ON Category.id = Post.category_id
			LEFT JOIN ".POST_STATUS." PostStatus ON PostStatus.id = Post.post_status_id
			WHERE 1
				$string_is_hot $string_is_popular $string_is_picture $string_month $string_year $string_namelike
				$string_category $string_max_id $string_is_publish $string_publish_date $string_filter
			ORDER BY $string_sorting
			LIMIT $string_limit
		";
        $select_result = mysql_query($select_query) or die(mysql_error());
		while ( $row = mysql_fetch_assoc( $select_result ) ) {
			$array[] = $this->sync($row, @$param['column']);
		}
		
        return $array;
    }

    function get_count($param = array()) {
		$select_query = "SELECT FOUND_ROWS() TotalRecord";
		$select_result = mysql_query($select_query) or die(mysql_error());
		$row = mysql_fetch_assoc($select_result);
		$TotalRecord = $row['TotalRecord'];
		
		return $TotalRecord;
    }
	
    function delete($param, $table = POST) {
		// detele image
		if (isset($param['id'])) {
			$post = $this->get_by_id(array( 'id' => $param['id'] ));
			$image_path = $this->config->item('base_path') . '/static/upload/';
			$image_source = $image_path . $post['thumbnail'];
			$image_small = preg_replace('/\.(jpg|jpeg|png|gif)/i', '_s.$1', $image_source);
			@unlink($image_source);
			@unlink($image_small);
		}
		
		$delete_query  = "DELETE FROM $table WHERE id = '".$param['id']."' LIMIT 1";
		$delete_result = mysql_query($delete_query) or die(mysql_error());
		
		$result['status'] = '1';
		$result['message'] = 'Data berhasil dihapus.';

        return $result;
    }
	
	function sync($row, $column = array()) {
		$row = StripArray($row, array( 'create_date', 'publish_date' ));
		
		// desc
		if (isset($row['desc'])) {
			$row['desc_limit'] = get_length_char(strip_tags($row['desc']), 125, ' ...');
		}
		
		// generate link
		if (isset($row['create_date'])) {
			$date_temp = preg_replace('/-/i', '/', substr($row['create_date'], 0, 8));
			$row['post_link'] = base_url($date_temp.$row['alias']);
		}
		if (isset($row['category_alias'])) {
			$row['category_link'] = base_url($row['category_alias']);
		}
		
		if (!empty($row['thumbnail'])) {
			$file_path = $this->config->item('base_path').'/static/upload/'.$row['thumbnail'];
			$file_link = base_url('static/upload/'.$row['thumbnail']);
			$file_small_path = preg_replace('/\.(jpg|jpeg|png|gif)/i', '_s.$1', $file_path);
			$file_small_link = preg_replace('/\.(jpg|jpeg|png|gif)/i', '_s.$1', $file_link);
			
			if (! file_exists($file_path) && ! file_exists($file_small_path)) {
				$param['id'] = $row['id'];
				$param['thumbnail'] = '';
				$this->update($param);
			}
			
			if (file_exists($file_path)) {
				$row['thumbnail_link'] = $file_link;
				$row['thumbnail_small_link'] = $file_small_link;
			} else {
				$row['thumbnail_link'] = $file_small_link;
				$row['thumbnail_small_link'] = $file_small_link;
			}
		}
		
		return $row;
	}
	
	function resize_image($param) {
		if (!empty($param['thumbnail'])) {
			$image_path = $this->config->item('base_path') . '/static/upload/';
			$image_source = $image_path . $param['thumbnail'];
			$image_result = $image_source;
			$image_small = preg_replace('/\.(jpg|jpeg|png|gif)/i', '_s.$1', $image_result);
			
			ImageResize($image_source, $image_small, 120, 80, 1);
			ImageResize($image_source, $image_result, 280, 180, 1);
		}
	}
	
	function get_link() {
		$post = array();
		
		preg_match('/(\d{4})\/(\d{2})\/([a-z0-9-]+)/i', $_SERVER['REQUEST_URI'], $match);
		if (count($match) >= 4) {
			$year = (!empty($match[1])) ? $match[1] : '';
			$month = (!empty($match[2])) ? $match[2] : '';
			$alias = (!empty($match[3])) ? $match[3] : '';
			
			$post = $this->get_by_id(array( 'year' => $year, 'month' => $month, 'alias' => $alias ));
		}
		
		return $post;
	}
	
	function get_name($post_name) {
		$post_name = get_name($post_name);
		
		$result = '';
		for ($i = 0; $i <= 10; $i++) {
			if (empty($i)) {
				$name_check = $post_name;
			} else {
				$name_check = $post_name.'-'.$i;
			}
			
			$post = $this->get_by_id(array( 'alias' => $name_check ));
			if (count($post) == 0) {
				$result = $name_check;
				break;
			}
		}
		
		if (empty($result)) {
			$result = $post_name.'-'.time();
		}
		
		return $result;
	}
	
	function increment_view($param) {
		if (isset($param['view_count'])) {
			$param['view_count']++;
		}
		
		$this->update($param);
	}
}