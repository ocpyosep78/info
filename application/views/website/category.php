<?php
	// page
	$page_item = 10;
	$page_active = get_page();
	
	// category
	$category_alias = (isset($this->uri->segments[1])) ? $this->uri->segments[1] : '';
	$category = $this->Category_model->get_by_id(array( 'alias' => $category_alias ));
	
	// page base (page + category) => soon support latest & popular
	if (count($category) == 0) {
		$page_base = base_url('semua');
	} else {
		$page_base = $category['link'];
	}
	
	// post
	$param_post['is_publish'] = true;
	$param_post['publish_date'] = $this->config->item('current_datetime');
	$param_post['category_id'] = (count($category) > 0) ? $category['id'] : '';
	$param_post['sort'] = '[{"property":"publish_date","direction":"DESC"}]';
	$param_post['start'] = ($page_active - 1) * $page_item;
	$param_post['limit'] = $page_item;
	$array_post = $this->Post_model->get_array($param_post);
	$page_count = ceil($this->Post_model->get_count() / $page_item);
?>
<?php $this->load->view( 'website/common/meta.php' ); ?>
<body class="search search-results">
<div  class="site-wrap layout-3">
	<div class="container site-container">
		<?php $this->load->view( 'website/common/header.php' ); ?>
		
		<div class="site-main row">
			<div class="twelve columns"><div class="site-main-wrap">
				<div class="primary-content"><div class="primary-content-wrap">

<div class="widget widget-archive widget-search">
	<div class="archive-title">
		<h3>Kategori: <span><?php echo (empty($category['name']) ? 'Semua' : $category['name']); ?></span></h3>
	</div>
	
	<div class="search-posts">
		<div class="row"><div class="twelve columns">
			<?php foreach ($array_post as $key => $post) { ?>
			<div class="search-post cf">
				<?php if (!empty($post['thumbnail_small_link'])) { ?>
				<a href="<?php echo $post['post_link']; ?>" class="post-thumbnail fl" title="<?php echo $post['name']; ?>">
					<img src="<?php echo $post['thumbnail_small_link']; ?>" alt="<?php echo $post['name']; ?>" class="">
				</a>
				<?php } ?>
				<a href="<?php echo $post['post_link']; ?>" class="post-title" title="<?php echo $post['name']; ?>"><?php echo get_length_char($post['name'], 50, ' ...'); ?></a>
				<div class="post-excerpt"><?php echo $post['desc_limit']; ?></div>
			</div>
			<?php } ?>
		</div></div>
	</div>
	
	<div class="blog-pagination">
		<?php if ($page_active > 1) { ?>
		<?php $page_prev = $page_base.'/page-'.($page_active - 1); ?>
		<a class="prev page-numbers" href="<?php echo $page_prev; ?>">&laquo; Prev</a>
		<?php } ?>
		
		<?php for ($i = -5; $i <= 5; $i++) { ?>
		<?php $page_counter = $page_active + $i; ?>
		<?php $page_link = $page_base.'/page-'.$page_counter; ?>
		<?php if ($page_counter > 0 && $page_counter <= $page_count) { ?>
			<?php if ($i == 0) { ?>
			<span class="page-numbers current"><?php echo $page_counter; ?></span>
			<?php } else { ?>
			<a class="page-numbers" href="<?php echo $page_link; ?>"><?php echo $page_counter; ?></a>
			<?php } ?>
		<?php } ?>
		<?php } ?>
		
		<?php if ($page_active < $page_count) { ?>
		<?php $page_next = $page_base.'/page-'.($page_active + 1); ?>
		<a class="next page-numbers" href="<?php echo $page_next; ?>">Next &raquo;</a>
		<?php } ?>
	</div>
</div>
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