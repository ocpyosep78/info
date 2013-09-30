<?php
	// latest post
	$param_latest['is_publish'] = true;
	$param_latest['publish_date'] = $this->config->item('current_datetime');
	$param_latest['sort'] = '[{"property":"publish_date","direction":"DESC"}]';
	$param_latest['limit'] = 10;
	$array_latest = $this->Post_model->get_array($param_latest);
	
	// popular post
	$param_popular['is_hot'] = 1;
	$param_popular['is_publish'] = true;
	$param_popular['publish_date'] = $this->config->item('current_datetime');
	$param_popular['sort'] = '[{"property":"publish_date","direction":"DESC"}]';
	$param_popular['limit'] = 5;
	$array_popular = $this->Post_model->get_array($param_popular);
	
	// pendidikan post
	$param_pendidikan['is_popular'] = 1;
	$param_pendidikan['category_id'] = CATEGORY_PENDIDIKAN;
	$param_pendidikan['is_publish'] = true;
	$param_pendidikan['publish_date'] = $this->config->item('current_datetime');
	$param_pendidikan['sort'] = '[{"property":"publish_date","direction":"DESC"}]';
	$param_pendidikan['limit'] = 4;
	$array_pendidikan = $this->Post_model->get_array($param_pendidikan);
	
	// hiburan post
	$param_hiburan['is_popular'] = 1;
	$param_hiburan['category_id'] = CATEGORY_HIBURAN;
	$param_hiburan['is_publish'] = true;
	$param_hiburan['publish_date'] = $this->config->item('current_datetime');
	$param_hiburan['sort'] = '[{"property":"publish_date","direction":"DESC"}]';
	$param_hiburan['limit'] = 4;
	$array_hiburan = $this->Post_model->get_array($param_hiburan);
	
	// gaya post
	$param_gaya['is_popular'] = 1;
	$param_gaya['category_id'] = CATEGORY_GAYA_HIDUP;
	$param_gaya['is_publish'] = true;
	$param_gaya['publish_date'] = $this->config->item('current_datetime');
	$param_gaya['sort'] = '[{"property":"publish_date","direction":"DESC"}]';
	$param_gaya['limit'] = 4;
	$array_gaya = $this->Post_model->get_array($param_gaya);
	
	// teknologi post
	$param_teknologi['is_popular'] = 1;
	$param_teknologi['category_id'] = CATEGORY_TEKNOLOGI;
	$param_teknologi['is_publish'] = true;
	$param_teknologi['publish_date'] = $this->config->item('current_datetime');
	$param_teknologi['sort'] = '[{"property":"publish_date","direction":"DESC"}]';
	$param_teknologi['limit'] = 4;
	$array_teknologi = $this->Post_model->get_array($param_teknologi);
?>

<?php $this->load->view( 'website/common/meta.php' ); ?>
<body class="home blog">
<div  class="site-wrap layout-3">
	<div class="container site-container">
		<?php $this->load->view( 'website/common/header.php' ); ?>
	
		<!-- top carousel -->
		<div class="site-top-content row" style="max-height: 275px;"><div class="twelve columns">
			<div id="presto-top-carousel-2" class="widget widget-top-carousel">
				<div class="row">
					<div class="twelve columns"><div class="top-carousel-wrap">
						<div class="row">
							<ul id="top-carousel" class="top-carousel">
								<?php foreach ($array_latest as $row) { ?>
								<?php if (empty($row['thumbnail_link'])) { continue; } ?>
								<li class="three columns">
									<div class="top-carousel-item post-hover-animate">
										<div class="post-thumbnail mb-10">
											<a href="<?php echo $row['post_link']; ?>" title="<?php echo $row['name']; ?>">
												<img src="<?php echo $row['thumbnail_link']; ?>" alt="<?php echo $row['name']; ?>" class=""></a>
											<div class="post-thumb-meta">
												<div class="fl">
													<time class="postmeta-date" datetime="<?php echo GetFormatDate($row['publish_date'], array( 'FormatDate' => 'Y-m-d')); ?>"><?php echo GetFormatDate($row['publish_date']); ?></time>
												</div>
												<div class="fr">
													<span class="postmeta-view"><i class="icon-eye"></i> <?php echo $row['view_count']; ?></span>
												</div>
											</div>
										</div>
										<div class="postmeta mb-5">
											by <a title="Posts by <?php echo $row['user_fullname']; ?>" rel="author"><?php echo $row['user_fullname']; ?></a>										</div>
										<a href="<?php echo $row['post_link']; ?>" title="<?php echo $row['name']; ?>" class="top-carousel-title"><?php echo $row['name']; ?></a>
									</div>
								</li>
								<?php } ?>
							</ul>
						</div>
						<div class="top-carousel-nav">
							<div class="top-carousel-nav-outer">
								<a id="top-carousel-prev" href="" class="top-carousel-prev"><i class="icon-left-open-big"></i></a>
								<a id="top-carousel-next" href="" class="top-carousel-next"><i class="icon-right-open-big"></i></a>
							</div>
						</div>
					</div></div>
				</div>
				<script type="text/javascript">
					var carousel = jQuery("#top-carousel");
					carousel.carouFredSel({
						responsive	: true,
						circular 	: false,
						infinite 	: false,
						prev 		: '#top-carousel-prev',
						next 		: '#top-carousel-next',
						height 		: "auto",
						width 		: "100%",
						auto 		: false,	
						duration 	: 1000,
						items 		: { visible: { min: 2, max: 4 }, width: 257 }, 
						onCreate 	: function() {
							jQuery(window).on('load', function(){
								carousel.parent().add(carousel).css({
									'height': Math.max.apply(Math, carousel.children().map(function(){ return jQuery(this).height(); }).get()) + 'px'});
							}).trigger('load');
							
							jQuery(window).on('resize', function(){
								carousel.parent().add(carousel).css('height', Math.max.apply(Math, carousel.children().map(function(){ return jQuery(this).height(); }).get()) + 'px');
							}).trigger('resize');
						}
					});
				</script>
			</div>
		</div></div>
		<!-- end top carousel -->
		
		<div class="site-main row">
			<div class="twelve columns"><div class="site-main-wrap">													
				<div class="primary-content"><div class="primary-content-wrap">

<!-- content index -->
<div id="presto-post-slider-2" class="widget widget-post-slider">
	<div class="post-slider-wrap">
		<div id="slider-5239546d6e677" class="flexslider post-slider post-slider-1">
			<ul class="slides">
				<?php foreach ($array_popular as $row) { ?>
				<li data-thumb="<?php echo $row['thumbnail_link']; ?>">
					<img src="<?php echo $row['thumbnail_link']; ?>" alt="<?php echo $row['name']; ?>" class="" />
					<div class="slider-caption">
						<h2 class="slider-title"><a href="<?php echo $row['post_link']; ?>"><?php echo $row['name']; ?></a></h2>
						<div class="post-slider-meta">
							<div class="fl">
								by <a title="Posts by <?php echo $row['user_fullname']; ?>" rel="author"><?php echo $row['user_fullname']; ?></a>
								on <time class="postmeta-date" datetime="<?php echo GetFormatDate($row['publish_date'], array( 'FormatDate' => 'Y-m-d')); ?>"><?php echo GetFormatDate($row['publish_date']); ?></time>
							</div>
							<div class="fr">
								<span class="postmeta-view"><i class="icon-eye"></i> <?php echo $row['view_count']; ?></span>
							</div>
						</div>
					</div>
				</li>
				<?php } ?>
			</ul>
		</div>
	</div>
	<script type="text/javascript">
	jQuery(document).ready(function(){
		jQuery("#slider-5239546d6e677").flexslider({
			controlNav	: "thumbnails",
			animation 	: "slide",
			nextText	: '<i class="icon-right-open-mini"></i>',
			prevText	: '<i class="icon-left-open-mini"></i>',
			useCSS 		: false
		});
	});
	</script>
</div>

<div id="presto-newsbox-4" class="widget widget-newsbox">
	<div class="widget-title"><h3>Hiburan &raquo;</h3></div>
	<div class="newsbox-layout-1">
		<div class="row">	
			<div class="six columns">
				<?php $row = (isset($array_hiburan[0])) ? $array_hiburan[0] : array(); ?>
				<?php if (count($row) > 0) { ?>
				<div class="newsbox-post-item post-hover-animate">
					<div class="post-thumbnail mb-10">
						<a href="<?php echo $row['post_link']; ?>">
							<img src="<?php echo $row['thumbnail_link']; ?>" alt="" class=""></a>
						<div class="post-thumb-meta">
							<div class="fl">
								<time class="postmeta-date" datetime="<?php echo GetFormatDate($row['publish_date'], array( 'FormatDate' => 'Y-m-d')); ?>"><?php echo GetFormatDate($row['publish_date']); ?></time>
							</div>
							<div class="fr"><span class="postmeta-view"><i class="icon-eye"></i> <?php echo $row['view_count']; ?></span></div>
						</div>
					</div>
					<div class="postmeta mb-5">by <a title="Posts by <?php echo $row['user_fullname']; ?>" rel="author"><?php echo $row['user_fullname']; ?></a></div>
					<h2 class="post-title"><a href="<?php echo $row['post_link']; ?>"><?php echo $row['name']; ?></a></h2>
					<div class="post-excerpt"><?php echo $row['desc_limit']; ?></div>
				</div>
				<?php } ?>
			</div>
			<div class="six columns">
				<ul class="newsbox-list">
					<?php foreach ($array_hiburan as $key => $row) { ?>
					<?php if (empty($key)) { continue; } ?>
					<li>
						<div class="newsbox-item">
							<?php if (!empty($row['thumbnail_link'])) { ?>
							<div class="post-thumbnail">
								<a href="<?php echo $row['post_link']; ?>" title="<?php echo $row['name']; ?>">
									<img src="<?php echo $row['thumbnail_link']; ?>" alt="<?php echo $row['name']; ?>" class="">
								</a>
							</div>
							<?php } ?>
							<a href="<?php echo $row['post_link']; ?>" title="<?php echo $row['name']; ?>" class="post-title"><?php echo $row['name']; ?></a>
							<div class="postmeta">
								by <a class="meta-author"><?php echo $row['user_fullname']; ?></a>
								on <time class="meta-time" datetime="<?php echo GetFormatDate($row['publish_date'], array( 'FormatDate' => 'Y-m-d')); ?>"><?php echo GetFormatDate($row['publish_date']); ?></time>
							</div>
						</div>
					</li>
					<?php } ?>
				</ul>
			</div>
		</div>
	</div>
</div>

<div id="presto-double-newsbox-list-2" class="widget widget-double-newsbox-list">
	<div class="row">
		<div class="six columns">
			<div class="first-newsbox-list">
				<div class="widget-title"><h3>Pendidikan &raquo;</h3></div>
				<ul class="newsbox-list">
					<?php foreach ($array_pendidikan as $key => $row) { ?>
					<li>
						<div class="newsbox-item">
							<?php if (!empty($row['thumbnail_small_link'])) { ?>
							<div class="post-thumbnail">
								<a href="<?php echo $row['post_link']; ?>" title="<?php echo $row['name']; ?>">
									<img src="<?php echo $row['thumbnail_small_link']; ?>" alt="<?php echo $row['name']; ?>" class=""></a>
							</div>
							<?php } ?>
							<a href="<?php echo $row['post_link']; ?>" class="post-title" title="<?php echo $row['name']; ?>"><?php echo $row['name']; ?></a>
							<div class="postmeta">
								by <a class="meta-author"><?php echo $row['user_fullname']; ?></a>
								on <time class="meta-time" datetime="<?php echo GetFormatDate($row['publish_date'], array( 'FormatDate' => 'Y-m-d')); ?>"><?php echo GetFormatDate($row['publish_date']); ?></time>
							</div>
						</div>
					</li>
					<?php } ?>
				</ul>
			</div>
		</div>
		
		<div class="six columns">
			<div class="first-newsbox-list">
				<div class="widget-title"><h3>Gaya Hidup &raquo;</h3></div>
				<ul class="newsbox-list">
					<?php foreach ($array_gaya as $key => $row) { ?>
					<li>
						<div class="newsbox-item">
							<?php if (!empty($row['thumbnail_small_link'])) { ?>
							<div class="post-thumbnail">
								<a href="<?php echo $row['post_link']; ?>" title="<?php echo $row['name']; ?>">
									<img src="<?php echo $row['thumbnail_small_link']; ?>" alt="<?php echo $row['name']; ?>" class=""></a>
							</div>
							<?php } ?>
							<a href="<?php echo $row['post_link']; ?>" class="post-title" title="<?php echo $row['name']; ?>"><?php echo $row['name']; ?></a>
							<div class="postmeta">
								by <a class="meta-author"><?php echo $row['user_fullname']; ?></a>
								on <time class="meta-time" datetime="<?php echo GetFormatDate($row['publish_date'], array( 'FormatDate' => 'Y-m-d')); ?>"><?php echo GetFormatDate($row['publish_date']); ?></time>
							</div>
						</div>
					</li>
					<?php } ?>
				</ul>
			</div>
		</div>
	</div>
</div>

<div id="presto-newsbox-3" class="widget widget-newsbox">
	<div class="widget-title"><h3>Teknologi &raquo;</h3></div>
	<div class="newsbox-layout-1">
		<div class="row">	
			<div class="six columns">
				<?php $row = (isset($array_teknologi[0])) ? $array_teknologi[0] : array(); ?>
				<?php if (count($row) > 0) { ?>
				<div class="newsbox-post-item post-hover-animate">
					<div class="post-thumbnail mb-10">
						<a href="<?php echo $row['post_link']; ?>">
							<img src="<?php echo $row['thumbnail_link']; ?>" alt="" class=""></a>
						<div class="post-thumb-meta">
							<div class="fl">
								<time class="postmeta-date" datetime="<?php echo GetFormatDate($row['publish_date'], array( 'FormatDate' => 'Y-m-d')); ?>"><?php echo GetFormatDate($row['publish_date']); ?></time>
							</div>
							<div class="fr"><span class="postmeta-view"><i class="icon-eye"></i> <?php echo $row['view_count']; ?></span></div>
						</div>
					</div>
					<div class="postmeta mb-5">by <a title="Posts by <?php echo $row['user_fullname']; ?>" rel="author"><?php echo $row['user_fullname']; ?></a></div>
					<h2 class="post-title"><a href="<?php echo $row['post_link']; ?>"><?php echo $row['name']; ?></a></h2>
					<div class="post-excerpt"><?php echo $row['desc_limit']; ?></div>
				</div>
				<?php } ?>
			</div>
			<div class="six columns">
				<ul class="newsbox-list">
					<?php foreach ($array_teknologi as $key => $row) { ?>
					<?php if (empty($key)) { continue; } ?>
					<li>
						<div class="newsbox-item">
							<?php if (!empty($row['thumbnail_link'])) { ?>
							<div class="post-thumbnail">
								<a href="<?php echo $row['post_link']; ?>" title="<?php echo $row['name']; ?>">
									<img src="<?php echo $row['thumbnail_link']; ?>" alt="<?php echo $row['name']; ?>" class="">
								</a>
							</div>
							<?php } ?>
							<a href="<?php echo $row['post_link']; ?>" title="<?php echo $row['name']; ?>" class="post-title"><?php echo $row['name']; ?></a>
							<div class="postmeta">
								by <a class="meta-author"><?php echo $row['user_fullname']; ?></a>
								on <time class="meta-time" datetime="<?php echo GetFormatDate($row['publish_date'], array( 'FormatDate' => 'Y-m-d')); ?>"><?php echo GetFormatDate($row['publish_date']); ?></time>
							</div>
						</div>
					</li>
					<?php } ?>
				</ul>
			</div>
		</div>
	</div>
</div>
<!-- end content index -->

				</div></div>
				
				<?php $this->load->view( 'website/common/sidebar.php' ); ?>
			</div></div>
		</div>
		
		<?php $this->load->view( 'website/common/footer.php' ); ?>
	</div>
	
	<?php $this->load->view( 'website/common/navigation_float.php' ); ?>
</div>

<?php $this->load->view( 'website/common/js.php' ); ?>
</body>
</html>