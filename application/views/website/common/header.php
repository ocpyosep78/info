<?php
	$array_category = $this->Category_model->get_array();
?>
<header class="site-header">
<div class="top-bar row">
	<div class="twelve columns">
		<nav class="top-navigation fl">
			<ul id="menu-top-menu" class="top-menu">
				<li><a href="#">Full Width</a></li>
				<li><a href="#">RTL</a></li>
				<li><a href="#">Blog</a></li>
				<li><a href="#">Review Post</a></li>
			</ul>
			<div class="top-menu-mobile">
				<span class="icon-menu"></span>
				<ul id="menu-top-menu-1" class="top-mobile-menu">
					<li><a href="#">Full Width</a></li>
					<li><a href="#">RTL</a></li>
					<li><a href="#">Blog</a></li>
					<li><a href="#">Review Post</a></li>
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
			<a href="<?php echo base_url(); ?>"><img src="<?php echo base_url(); ?>/static/img/ig_logo.gif" alt="Infogue"></a>
		</div>
		<div class="header-ads fr">
			<a target="_blank" rel="nofollow"><img src="<?php echo base_url(); ?>/static/upload/tutorials_728x90_v2.gif" alt=""></a>
		</div>
	</div>
</div>

<div class="row">
	<div class="twelve columns">
		<nav class="main-navigation">
			<ul id="menu-main-menu" class="main-menu">
				<li class="current-menu-item"><a href="<?php echo base_url(); ?>">Home</a></li>
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
						<li>
							<a href="http://demo.bright-theme.com/presto/top-50-classic-wedding-songs/">Top 50 Classic Wedding Songs</a>
							&mdash; Hey there where ya goin&#8217;, not exactly knowin&#8217;, who says&hellip;
						</li>
						<li>
							<a href="http://demo.bright-theme.com/presto/education-tips-15-ideas-that-will-encourage-kids-to-write/">Education Tips: 15 Ideas That Will Encourage Kids to Write</a>
							&mdash; Ten years ago a crack commando unit was sent to&hellip;
						</li>
						<li>
							<a href="http://demo.bright-theme.com/presto/your-money-13-money-saving-tips-for-2013/">Your Money: 13 Money-saving Tips for 2013</a>
							&mdash; Hong Kong Phooey, number one super guy. Hong Kong Phooey,&hellip;
						</li>
						<li>
							<a href="http://demo.bright-theme.com/presto/10-tips-for-a-better-time-schedule-and-management/">10 Tips for A Better Time Schedule and Management</a>
							&mdash; There&#8217;s a voice that keeps on calling me. Down the&hellip;
						</li>
						<li>
							<a href="http://demo.bright-theme.com/presto/top-10-tips-for-building-loving-relationships/">Top 10 Tips For Building Loving Relationships</a>
							&mdash; Top Cat! The most effectual Top Cat! Who&#8217;s intellectual close&hellip;
						</li>
						<li>
							<a href="http://demo.bright-theme.com/presto/news-portal-apps-for-your-android-gadgets/">News Portal Apps for Your Android Gadgets</a>
							&mdash; Ten years ago a crack commando unit was sent to&hellip;
						</li>
						<li>
							<a href="http://demo.bright-theme.com/presto/simplify-your-responsive-design-workflow-with-screensiz-es/">Simplify Your Responsive Design Workflow With Screensiz.es</a>
							&mdash; There&#8217;s a voice that keeps on calling me. Down the&hellip;
						</li>
						<li>
							<a href="http://demo.bright-theme.com/presto/11-tips-for-developing-a-mobile-app-that-users-will-love/">11 Tips for Developing a Mobile App that Users will Love</a>
							&mdash; ong Kong Phooey, number one super guy. Hong Kong Phooey,&hellip;
						</li>
						<li>
							<a href="http://demo.bright-theme.com/presto/samsung-premiere-2013-will-unveil-new-galaxy-and-ativ-devices/">Samsung Premiere 2013 Will Unveil New Galaxy and ATIV Devices</a>
							&mdash; 80 days around the world, no we won&#8217;t say a&hellip;
						</li>
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
					<li><a target="_blank" href="<?php echo base_url('feed'); ?>" class="icon-rss"></a></li>									
				</ul>
			</div>
		</div>
	</div>
</div>	
</header>