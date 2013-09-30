<?php
	// user
	$is_login = $this->User_model->is_login();
	
	// array category
	$array_category = $this->Category_model->get_array();
	
	// latest post
	$param_post['is_publish'] = true;
	$param_post['publish_date'] = $this->config->item('current_datetime');
	$param_post['sort'] = '[{"property":"publish_date","direction":"DESC"}]';
	$param_post['limit'] = 5;
	$array_post = $this->Post_model->get_array($param_post);
?>
<header class="site-header">
<div class="top-bar row">
	<div class="twelve columns">
		<nav class="top-navigation fl">
			<ul id="menu-top-menu" class="top-menu">
				<?php if ($is_login) { ?>
				<li><a href="<?php echo base_url('submit'); ?>">Submit</a></li>
				<li><a href="<?php echo base_url('logout'); ?>">Logout</a></li>
				<?php } else { ?>
				<li><a href="<?php echo base_url('login'); ?>">Login</a></li>
				<li><a href="<?php echo base_url('register'); ?>">Register</a></li>
				<li><a href="<?php echo base_url('submit'); ?>">Submit</a></li>
				<?php } ?>
			</ul>
			<div class="top-menu-mobile">
				<span class="icon-menu"></span>
				<ul id="menu-top-menu-1" class="top-mobile-menu">
					<?php if ($is_login) { ?>
					<li><a href="<?php echo base_url('submit'); ?>">Submit</a></li>
					<li><a href="<?php echo base_url('logout'); ?>">Logout</a></li>
					<?php } else { ?>
					<li><a href="<?php echo base_url('login'); ?>">Login</a></li>
					<li><a href="<?php echo base_url('register'); ?>">Register</a></li>
					<li><a href="<?php echo base_url('submit'); ?>">Submit</a></li>
					<?php } ?>
				</ul>
			</div>
		</nav>
		<div class="top-search fr">
			<form class="search-form" method="post" action="<?php echo base_url('search'); ?>">
				<input class="top-search-input" name="keyword" placeholder="To search type and hit enter" type="text" />
			</form>
		</div>
	</div>
</div>

<div class="main-header row">
	<div class="twelve columns">
		<div class="logo fl">
			<a href="<?php echo base_url(); ?>"><img src="<?php echo base_url(); ?>static/img/ig_logo.gif" alt="Infogue"></a>
		</div>
		<div class="header-ads fr">
			<a target="_blank" rel="nofollow"><img src="<?php echo base_url(); ?>static/upload/tutorials_728x90_v2.gif" alt=""></a>
		</div>
	</div>
</div>

<div class="row">
	<div class="twelve columns">
		<nav class="main-navigation">
			<ul id="menu-main-menu" class="main-menu">
				<li class="current-menu-item"><a href="<?php echo base_url(); ?>">Home</a></li>
				<li><a href="<?php echo base_url('semua'); ?>">Semua</a></li>
				<?php foreach ($array_category as $category) { ?>
				<li><a href="<?php echo $category['link']; ?>"><?php echo $category['name']; ?></a></li>
				<?php } ?>
			</ul>
			<div class="main-menu-mobile">
				<div class="placeholder-menu cf">
					<span class="icon-menu"></span>
					<span class="placeholder-text">Select Menu</span>
					<span class="icon-arrow-combo mobile-menu-button"></span>
				</div>
				<ul id="menu-main-menu-1" class="main-mobile-menu">
					<li><a href="<?php echo base_url(); ?>">Home</a></li>
					<?php foreach ($array_category as $category) { ?>
					<li><a href="<?php echo $category['link']; ?>"><?php echo $category['name']; ?></a></li>
					<?php } ?>
				</ul>
			</div>
		</nav>
		
		<div class="bottom-nav">
			<div class="newsticker fl">
				<div class="newsticker-heading">
					<h3>Don't Miss</h3>
					<span class="newsticker-pad"></span>
				</div>
				<div class="newsticker-content">
					<ul id="newsticker-1">
						<?php foreach ($array_post as $row) { ?>
						<li>
							<a href="<?php echo $row['post_link']; ?>" title="<?php echo $row['name']; ?>"><?php echo $row['name']; ?></a>
							&mdash; <?php echo get_length_char($row['desc_limit'], 75, ''); ?> &hellip;
						</li>
						<?php } ?>
					</ul>
					<script type="text/javascript">
					jQuery(document).ready(function(){
						var newsticker = jQuery("#newsticker-1");
						jQuery("#newsticker-1").carouFredSel({
							direction: "up", items : { height  : 30, width : "variable"},
							scroll: { items: 1, fx: "cover-fade", duration: 1000, pauseOnHover: "immediate" }
						});
					});
					</script>
				</div>
			</div>
			<div class="social-links fr">
				<ul>
					<!--
					<li><a target="_blank" href="http://facebook.com/envato" class="icon-facebook"></a></li>
					<li><a target="_blank" href="http://twitter.com/envato" class="icon-twitter"></a></li>
					<li><a target="_blank" href="https://plus.google.com/107285294994146126204" class="icon-gplus"></a></li>
					<li><a target="_blank" href="http://pinterest.com/envato" class="icon-pinterest"></a></li>
					<li><a href="http://demo.bright-theme.com/presto?random=1" class="icon-shuffle"></a></li>
					-->
					<li><a target="_blank" href="<?php echo base_url('rss'); ?>" class="icon-rss"></a></li>									
				</ul>
			</div>
		</div>
	</div>
</div>	
</header>