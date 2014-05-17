<?php
	// latest post
	/*
	$param_post['is_publish'] = true;
	$param_post['publish_date'] = $this->config->item('current_datetime');
	$param_post['sort'] = '[{"property":"publish_date","direction":"DESC"}]';
	$param_post['limit'] = 5;
	$array_post = $this->Post_model->get_array($param_post);
	/*	*/
	$array_post = array();
	
	// popular tag
	/*
	$param_tag['publish_date'] = date("Y-m-d", strtotime("-2 weeks"));
	$param_tag['limit'] = 15;
	$array_tag = $this->Tag_model->get_popular($param_tag);
	/*	*/
	$array_tag = array();
?>
<footer class="site-footer">
	<div class="footer-widget-area"><div class="row">
		<div class="three columns footer-widget-area-1">
			<div id="text-2" class="widget widget_text">
				<div class="textwidget">
					<img src="<?php echo base_url(); ?>static/img/ig_logo.gif" alt=""><br>
					<strong>Infogue</strong> adalah web site yang berisi informasi dari segala bidang kebutuhan ilmu pengetahuan dan hiburan (movie dan game) yang dikumpulkan berdasarkan dari info-info trendy, popular, dan selalu update untuk dinikmati semua kalangan netter-netter mania.
				</div>
			</div>
			<div id="presto-social-links-2" class="widget widget-social-links">
				<ul class="social-profiles">
					<li><a href="#" class="icon-facebook" title="Facebook"></a></li>
					<li><a href="#" class="icon-twitter" title="Twitter"></a></li>
					<li><a href="#" class="icon-gplus" title="Google+"></a></li>
					<li><a href="#" class="icon-pinterest" title="Pinterest"></a></li>
					<li><a href="#" class="icon-linkedin" title="LinkedIn"></a></li>
					<li><a href="#" class="icon-flickr" title="Flickr"></a></li>
					<li><a href="#" class="icon-instagram" title="Instagram"></a></li>
					<li><a href="#" class="icon-picasa" title="Picasa"></a></li>
					<li><a href="#" class="icon-vimeo" title="Vimeo"></a></li>
					<li><a href="#" class="icon-dribbble" title="Dribbble"></a></li>
					<li><a href="#" class="icon-tumblr" title="Tumblr"></a></li>
					<li><a href="#" class="icon-stumbleupon" title="Stumbleupon"></a></li>
					<li><a href="#" class="icon-skype" title="Skype"></a></li>
					<li><a href="#" class="icon-behance" title="Behance"></a></li>
				</ul>
			</div>
		</div>
		<div class="three columns footer-widget-area-2">
			<div id="presto-links-2" class="widget widget-links">
				<div class="widget-title"><h3>Informasi Lainnya &raquo;</h3></div>
				<ul>
					<li><a href="#" rel="nofollow" target="_blank">Bright Theme</a></li>
					<li><a href="#" rel="nofollow" target="_blank">Theme Forest</a></li>
					<li><a href="#" rel="nofollow" target="_blank">Web Design Tuts+</a></li>
					<li><a href="#" rel="nofollow" target="_blank">Smashing Magazine</a></li>
					<li><a href="#" rel="nofollow" target="_blank">Pixeden</a></li>
					<li><a href="#" rel="nofollow" target="_blank">WordPress Codex</a></li>
					<li><a href="#" rel="nofollow" target="_blank">WordPress</a></li>
				</ul>
			</div>
		</div>
		<div class="three columns footer-widget-area-3">
			<div id="recent-posts-2" class="widget widget_recent_entries">
				<div class="widget-title"><h3>Post Terbaru &raquo;</h3></div>
				<ul>
					<?php foreach ($array_post as $post) { ?>
					<li><a href="<?php echo $post['post_link']; ?>" title="<?php echo $post['name']; ?>"><?php echo $post['name']; ?></a></li>
					<?php } ?>
				</ul>
			</div>
		</div>
		<div class="three columns footer-widget-area-4">
			<div id="tag_cloud-2" class="widget widget_tag_cloud">
				<div class="widget-title"><h3>Tag &raquo;</h3></div>
				<div class="tagcloud">
					<?php foreach ($array_tag as $row) { ?>
					<a href="<?php echo $row['tag_link']; ?>" class="tag-link-7" title="<?php echo $row['total']; ?> post"><?php echo $row['name']; ?></a>
					<?php } ?>
				</div>
			</div>
		</div>
	</div></div>
	<div class="footer-copyright">
		<div class="row">
			<div class="twelve columns">
				<div class="fl">Copyright &copy; Infogue. All rights reserved.</div>
				<div class="fr"><a href="#" class="back-to-top icon-up-open"></a></div>
			</div>
		</div>
	</div>
</footer>

<!-- Google -->
<script>
(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
})(window,document,'script','//www.google-analytics.com/analytics.js','ga');
ga('create', 'UA-44319739-1', 'infogue.com');
ga('send', 'pageview');
</script>
<!-- End Google -->

<!-- StatCounter -->
<script type="text/javascript">
var sc_project=9274414; var sc_invisible=1; var sc_security="aa40600e"; var scJsHost = (("https:" == document.location.protocol) ? "https://secure." : "http://www.");
document.write("<sc"+"ript type='text/javascript' src='" + scJsHost + "statcounter.com/counter/counter.js'></"+"script>");
</script>
<!-- End StatCounter -->