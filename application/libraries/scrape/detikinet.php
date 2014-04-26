<?php

class detikinet {
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
			if (count($array_result) >= 3) {
				break;
			}
		}
		
		return $array_result;
	}
	
	function get_array_clear($content) {
		$array_result = array();
		
		// remove start offset
		$offset = '<ul class="list_berita_1">';
		$pos_first = strpos($content, $offset);
		$content = substr($content, $pos_first, strlen($content) - $pos_first);
		
		// remove end offset
		$offset = "<!--E:NHL -->";
		$pos_end = strpos($content, $offset);
		$content = substr($content, 0, $pos_end);
		
		// fix content
		$content = str_replace(array('<br />', '<em>', '</em>', '<i>', '</i>'), '', $content);
		
		// debug
		/*
		Write('scrape.html', $content);
		exit;
		/*	*/
		
		preg_match_all('/<h3 class="[^\"]+"><a href="([^\"]+)">([^<]+)<\/a><\/h3>\s*<img[^>]+>([^<]+)<div class=\"clearfix"><\/div>/i', $content, $match);
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
		$offset = '<h1 class="l_blue2_detik">';
		$pos_first = strpos($content, $offset);
		$content = substr($content, $pos_first, strlen($content) - $pos_first);
		
		// remove end offset
		$offset = "<!--E:AUTHOR INISIAL-->";
		$pos_end = strpos($content, $offset);
		$content = substr($content, 0, $pos_end);
		
		return $content;
	}
	
	function get_desc($content) {
		// remove start offset
		$offset = '<div class="text_detail">';
		$pos_first = strpos($content, $offset);
		$content = substr($content, $pos_first, strlen($content) - $pos_first);
		
		// remove end offset
		$offset = '<div class="multipaging">';
		$pos_end = strpos($content, $offset);
		if ($pos_end) {
			$content = substr($content, 0, $pos_end);
		}
		
		// remove paging
		$content = preg_replace('/<a[^>]+>(next)<\/a>/i', '', $content);
		
		// remove html tag
		$content = preg_replace('/<br( \/)*>/i', "\n", $content);
		$content = strip_tags($content);
		$result  = preg_replace("/\n/i", "<br />", trim($content));
		$result  = preg_replace("/(<br \/> *){3,}/i", "<br /><br />", $result);
		
		// endfix
		if (!empty($result)) {
			$result .= '<br /><br /><div>Sumber : Detikinet</div>';
		}
		
		return $result;
	}
	
	function get_download($content) {
		$result = '';
		
		// make it clean
		$content = str_replace('&nbsp;', ' ', $content);
		$content = preg_replace('/ (style|class|target|rel)\=\"[^\"]+\"/i', '', $content);
		$content = preg_replace('/<\/?(b|span)([^\>]+)?>/i', '', $content);
		
		// remove start offset
		$offset = '<div dir="ltr" trbidi="on">';
		$pos_first = strpos($content, $offset);
		$content = '<div '.substr($content, $pos_first, strlen($content) - $pos_first);
		
		// remove end offset
		$offset = "<center>";
		$pos_end = strpos($content, $offset);
		$content = substr($content, 0, $pos_end);
		
		// remove empty link
		$content = preg_replace('/\| <strike>[^\<]+<\/strike>/i', '', $content);
		$content = preg_replace('/<strike>[^\<]+<\/strike> \|/i', '', $content);
		
		// get common link
		preg_match_all('/div>([^\<]+)<\/div>\s<div>\s*(<a href="[^"]+"\>[^<]+<\/a>[ \|]*)+/i', $content, $match);
		foreach ($match[0] as $key => $value) {
			$label = trim($match[1][$key]);
			preg_match_all('/<a href="([^"]+)"\>([^<]+)<\/a>/i', $value, $array_link);
			
			// validation
			if (count($array_link[0]) == 0) {
				continue;
			}
			
			$result .= (empty($result)) ? "$label\n" : "\n$label\n";
			foreach ($array_link[0] as $counter => $temp) {
				$link_href = $array_link[1][$counter];
				$link_title = $array_link[2][$counter];
				
				$result .= $link_href.' '.$link_title."\n";
			}
		}
		
		// get multiplart link
		preg_match_all('/div>([^\<]+)<\/div>\s<div>\s([a-z0-9 ]+[=]\s*(<a href="[^"]+"\>[a-z]+<\/a>[ \|]*)*\s*)*/i', $content, $match);
		foreach ($match[0] as $key => $raw_html) {
			// check link
			$raw_link = $match[2][$key];
			if (empty($raw_link)) {
				continue;
			}
			
			// primary label
			$label_file = trim($match[1][$key]);
			
			$temp_result = '';
			preg_match_all('/([a-z0-9 ]+)[=]\s*(<a href="[^"]+"\>[a-z]+<\/a>[ \|]*)*/i', $raw_html, $raw_link);
			foreach ($raw_link[0] as $key => $value) {
				$temp_part = '';
				$label_part = trim($raw_link[1][$key]);
				
				preg_match_all('/<a href="([^"]+)"\>([a-z]+)<\/a>/i', $value, $array);
				foreach ($array[0] as $i => $j) {
					$temp_part .= $array[1][$i].' '.$array[2][$i]."\n";
				}
				
				$temp_result .= trim($label_part."\n".$temp_part)."\n\n";
			}
			
			// trim it
			$temp_result = trim($temp_result);
			
			// write label once
			if (!empty($label_file)) {
				$result .= "\n\n$label_file\n\n";
				$label_file = '';
			}
			
			// write part link
			$result .= $temp_result;
		}
		
		// trim it
		$result = trim($result);
		
		return $result;
	}
	
	function get_image($content) {
		$result = '';
		
		// get image
		preg_match('/class="pic_artikel">\s*<img.+src="([^"]+)"/i', $content, $match);
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