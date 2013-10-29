<?php
	// category
	$array_category = $this->Category_model->get_array();
	
	// random post
	$param_random['is_hot'] = 1;
	$param_random['is_publish'] = true;
	$param_random['publish_date'] = $this->config->item('current_datetime');
	$param_random['sort'] = '{"is_custom":"1","query":"RAND()"}';
	$param_random['limit'] = 6;
	$array_random = $this->Post_model->get_array($param_random);
	
	// picture post
	$param_picture['is_picture'] = true;
	$param_picture['is_publish'] = true;
	$param_picture['publish_date'] = $this->config->item('current_datetime');
	$param_latest['sort'] = '[{"property":"publish_date","direction":"DESC"}]';
	$param_picture['limit'] = 8;
	$array_picture = $this->Post_model->get_array($param_picture);
	
	// latest post
	$param_latest['is_publish'] = true;
	$param_latest['publish_date'] = $this->config->item('current_datetime');
	$param_latest['sort'] = '[{"property":"publish_date","direction":"DESC"}]';
	$param_latest['limit'] = 5;
	$array_latest = $this->Post_model->get_array($param_latest);
	
	// popular post
	$param_popular['is_hot'] = 1;
	$param_popular['is_publish'] = true;
	$param_popular['publish_date'] = $this->config->item('current_datetime');
	$param_popular['sort'] = '[{"property":"publish_date","direction":"DESC"}]';
	$param_popular['limit'] = 5;
	$array_popular = $this->Post_model->get_array($param_popular);
?>

<div class="primary-sidebar">
	<div id="search-3" class="widget widget_search">
		<form method="get" id="searchform" class="searchform" action="http://demo.bright-theme.com/presto/" role="search">
			<input type="search" name="s" value="" id="s" placeholder="To search type and hit enter" class="search-input" />
		</form>
	</div>
	
	<?php if ($this->config->item('online_widget')) { ?>
	<div id="presto-ads-300x250-3" class="widget widget-ads-300x250">
		<div class="ads-block">
			<script language="javascript">
			document.write('<scr'+'ipt language="javascript1.1" src="http://adserver.adtech.de/addyn/3.0/1353/4089427/0/170/ADTECH;loc=100;target=_blank;key=key1+key2+key3+key4;misc='+new Date().getTime()+'"></scri'+'pt>');
			</script>
			<noscript><a href="http://adserver.adtech.de/adlink/3.0/1353/4089427/0/170/ADTECH;loc=300;key=key1+key2+key3+key4" target="_blank"><img src="http://adserver.adtech.de/adserv/3.0/1353/4089427/0/170/ADTECH;loc=300;key=key1+key2+key3+key4" border="0" width="300" height="250"></a></noscript>
		</div>
	</div>
	<?php } ?>
	
	<?php if ($this->config->item('online_widget')) { ?>
	<div id="presto-ads-300x250-4" class="widget widget-ads-300x250">
		<div class="ads-block">
			<script type="text/javascript">
			var placementId = "4619716";
			var sizeId = "170"; 
			</script><script type="text/javascript" language="javascript" src="http://adr.adplus.co.id/script/adt.js"></script><noscript><a href="http://adsrv.adplus.co.id/adlink/3.0/1336/4619716/0/170/ADTECH;loc=300" target="_blank"><img src="http://adsrv.adplus.co.id/adserv/3.0/1336/4619716/0/170/ADTECH;loc=300" border="0" width="300" height="250">
			</a></noscript>
		</div>
	</div>
	<?php } ?>
	
	<div id="presto-tabber-2" class="widget widget-tabber">
		<div class="tabs tabber">
			<ul class="tab-header">
				<li><a href="#tab-latest-5239546daced6">Latest</a></li>
				<li><a href="#tab-popular-5239546daced6">Popular</a></li>
			</ul>
			<div class="tab-contents">
				<div id="tab-latest-5239546daced6" class="tab-content">
					<ul class="newsbox-list">
						<?php foreach ($array_latest as $key => $row) { ?>
						<li>
							<div class="newsbox-item">
								<div class="post-thumbnail">
									<a href="<?php echo $row['post_link']; ?>"><img src="<?php echo $row['thumbnail_small_link']; ?>" alt="<?php echo $row['name']; ?>" class=""></a>
								</div>
								<a href="<?php echo $row['post_link']; ?>" class="post-title" title="<?php echo $row['name']; ?>"><?php echo $row['name']; ?></a>
								<div class="postmeta">
									by <a class="meta-author"><?php echo $row['user_fullname']; ?></a>
									on <time class="postmeta-date" datetime="<?php echo GetFormatDate($row['publish_date'], array( 'FormatDate' => 'Y-m-d')); ?>"><?php echo GetFormatDate($row['publish_date']); ?></time>
								</div>
							</div>
						</li>
						<?php } ?>
					</ul>
				</div>
				<div id="tab-popular-5239546daced6" class="tab-content">
					<ul class="newsbox-list">
						<?php foreach ($array_popular as $key => $row) { ?>
						<li>
							<div class="newsbox-item">
								<?php if (!empty($row['thumbnail_small_link'])) { ?>
								<div class="post-thumbnail">
									<a href="<?php echo $row['post_link']; ?>"><img src="<?php echo $row['thumbnail_small_link']; ?>" alt="<?php echo $row['name']; ?>" class=""></a>
								</div>
								<?php } ?>
								
								<a href="<?php echo $row['post_link']; ?>" class="post-title" title="<?php echo $row['name']; ?>"><?php echo $row['name']; ?></a>
								<div class="postmeta">
									by <a class="meta-author"><?php echo $row['user_fullname']; ?></a>
									on <time class="postmeta-date" datetime="<?php echo GetFormatDate($row['publish_date'], array( 'FormatDate' => 'Y-m-d')); ?>"><?php echo GetFormatDate($row['publish_date']); ?></time>
								</div>
							</div>
						</li>
						<?php } ?>
					</ul>
				</div>
			</div>
		</div>
	</div>
	
	<div id="presto-news-picture-2" class="widget widget-news-picture">
		<div class="widget-title"><h3>Post in Picture &raquo;</h3></div>
		<ul>
			<?php foreach ($array_picture as $row) { ?>
			<li>
				<a href="<?php echo $row['post_link']; ?>" title="<?php echo $row['name']; ?>">
					<img src="<?php echo $row['thumbnail_small_link']; ?>" alt="<?php echo $row['name']; ?>" class="">
				</a>
			</li>
			<?php } ?>
		</ul>	
	</div>
	
	<!--
	<div id="presto-feedburner-2" class="widget widget-feedburner">
		<div class="widget-title"><h3>Keep Updates &raquo;</h3></div>
		<div class="feedburner-intro-text cf">										
			<i class="icon-rss fl"></i>										
			<p class="intro-text">
				Provide your email below, and we will notify you the latest news freely.			</p>
		</div>
		<form class="feedburner-form" action="http://feedburner.google.com/fb/a/mailverify" method="post" target="popupwindow" onsubmit="window.open('http://feedburner.google.com/fb/a/mailverify?uri=presto', 'popupwindow', 'scrollbars=yes,width=550,height=520');return true">
			<input type="text" name="email" placeholder="Your email here" class="feedburner-email">			
			<input type="hidden" value="presto" name="uri"/>
			<input type="hidden" name="loc" value="en_US"/>				
			<input class="feedburner-submit" type="submit" value="Subscribe">
		</form>
	</div>
	-->
</div>

<div class="secondary-sidebar">
	<div id="presto-recent-random-posts-2" class="widget widget-latest-post-vertical">
		<div class="widget-title"><h3>Random &raquo;</h3></div>
		<ul class="latest-post-vertical">
			<?php foreach ($array_random as $key => $row) { ?>
			<li>
				<div><a href="<?php echo $row['post_link']; ?>" class="post-title" title="<?php echo $row['name']; ?>"><?php echo $row['name']; ?></a></div>
				<span class="post-time"><?php echo GetFormatDate($row['publish_date']); ?></span>
				<div class="postmeta">by <a class="meta-author"><?php echo $row['user_fullname']; ?></a></div>
			</li>
			<?php } ?>
		</ul>
	</div>
	
	<div id="presto-ads-160x600-2" class="widget widget-ads-160x600">
		<div class="widget-title"><h3>160&#215;600 Ads &raquo;</h3></div>
		<div class="ads-block">
			<a href="#" target="_blank" rel="nofollow"><img src="<?php echo base_url(); ?>static/upload/ffffff.gif" alt=""></a>
		</div>
	</div>
	
	<!--
	
	<div id="categories-3" class="widget widget_categories">
		<div class="widget-title"><h3>Categories &raquo;</h3></div>
		<ul>
			<?php foreach ($array_category as $category) { ?>
			<li class="cat-item"><a href="<?php echo $category['link']; ?>" title="<?php echo $category['name']; ?>"><?php echo $category['name']; ?></a></li>
			<?php } ?>
		</ul>
	</div>
	
	<div id="meta-2" class="widget widget_meta">
		<div class="widget-title"><h3>Meta &raquo;</h3></div>
		<ul>
			<li><a href="<?php echo base_url(); ?>feed" title="RSS"><abbr title="Infogue RSS">RSS</abbr></a></li>
		</ul>
	</div>
	-->
</div>