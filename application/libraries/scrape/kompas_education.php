<?php

class kompas_education {
    function __construct() {
        $this->CI =& get_instance();
    }
    
	function get_array($scrape) {
		$curl = new curl();
		$array_item = array();
		$content = $curl->get($scrape['index_link']);
		
		// array post
		$array_post = $this->get_array_clear($content);
		
		$array_result = array();
		foreach ($array_post as $array) {
			// hack
			// $array['link'] = 'http://inet.detik.com/read/2014/04/26/093248/2566235/323/awas-teror-heartbleed-ditunggangi-pencuri-data?i992202105';
			
			// content already exist
			$check = $this->CI->Post_model->get_by_id(array( 'link_source' => $array['link'] ));
			if (count($check) > 0) {
				continue;
			}
			
			$content_html = $this->get_content($array['link']);
			$desc = $this->get_desc($content_html);
			$image_source = $this->get_image($content_html);
			
			// set to array
			$temp = array();
			$temp['name'] = $array['title'];
			$temp['desc'] = $desc;
			$temp['thumbnail'] = $image_source;
			$temp['link_source'] = $array['link'];
			$temp['alias'] = get_name($array['title']);
			
			// set popular / hot
			$random = rand(1,10);
			if ($random >= 8) {
				$temp['is_hot'] = 1;
				$temp['is_popular'] = 1;
			} else if ($random >= 4) {
				$temp['is_hot'] = 0;
				$temp['is_popular'] = 1;
			}
			
			// add to result
			if (!empty($temp['name']) && !empty($temp['desc']) && !empty($temp['thumbnail'])) {
				$array_result[] = $temp;
			}
			
			// add limit
			if (count($array_result) >= 5) {
				break;
			}
		}
		
		return $array_result;
	}
	
	function get_array_clear($content) {
		$array_result = array();
		
		// remove start offset
		$offset = '<!-- Kanal LIST -->';
		$pos_first = strpos($content, $offset);
		$content = substr($content, $pos_first, strlen($content) - $pos_first);
		
		// remove end offset
		$offset = "<!-- /Kanal LIST -->";
		$pos_end = strpos($content, $offset);
		$content = substr($content, 0, $pos_end);
		
		// debug
		/*
		Write('scrape.html', $content);
		exit;
		/*	*/
		
		preg_match_all('/<h3><a href="([^"]+)">([^<]+)<\/a>/i', $content, $match);
		foreach ($match[0] as $key => $value) {
			$link = trim($match[1][$key]);
			$title = trim($match[2][$key]);
			$array_result[] = array('title' => $title, 'link' => $link);
		}
		
		return $array_result;
	}
	
	function get_content($link_source) {
		$curl = new curl();
		$content = $curl->get($link_source);
		$content = preg_replace('/[^\x20-\x7E|\x0A]/i', '', $content);
		
		// debug
		/*	
		Write('scrape.html', $content);
		exit;
		/*	*/
		
		// remove start offset
		$offset = '<!-- Konten Baca -->';
		$pos_first = strpos($content, $offset);
		$content = substr($content, $pos_first, strlen($content) - $pos_first);
		
		// remove end offset
		$offset = "<!-- Footer BBC dan ABC -->";
		$pos_end = strpos($content, $offset);
		$content = substr($content, 0, $pos_end);
		
		return $content;
	}
	
	function get_desc($content) {
		// debug
		/*	
		Write('scrape.html', $content);
		exit;
		/*	*/
		
		// remove start offset
		$offset = "<span style='font-size: 16px; color: #4b4b4b;'>";
		$pos_first = strpos($content, $offset) + strlen($offset);
		$content = substr($content, $pos_first, strlen($content) - $pos_first);
		
		// remove end offset
		$offset = '<div class="kcm-read-bottom-topic mb2">';
		$pos_end = strpos($content, $offset);
		if ($pos_end) {
			$content = substr($content, 0, $pos_end);
		}
		
		// remove 'kompas'
		$content = preg_replace('/<strong>[a-z\.\,\- ]+kompas[a-z\.\- ]+<\/strong>[\s\-]+/i', '', $content);
		$content = trim($content);
		
		// remove html tag
		$content = preg_replace('/<br( \/)*>/i', "\n", $content);
		$content = strip_tags($content);
		$result  = preg_replace("/\n/i", "<br />", trim($content));
		$result  = preg_replace("/(<br \/> *){3,}/i", "<br /><br />", $result);
		
		// endfix
		if (!empty($result)) {
			$result .= '<br /><br /><div>Sumber : Kompas Edukasi</div>';
		}
		
		return $result;
	}
	
	function get_image($content) {
		$result = '';
		
		// get image
		preg_match('/style="max-width:[\s\d]+px;"><img src="([^"]+)" alt/i', $content, $match);
		$link_image = (isset($match[1]) && !empty($match[1])) ? $match[1] : '';
		
		// write image
		if (!empty($link_image)) {
			$download_result = download_image($link_image);
			if ($download_result['status']) {
				$result = $download_result['dir_image_path'];
			}
		}
		
		return $result;
	}
}