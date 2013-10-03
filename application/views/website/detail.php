<?php
	$post = $this->Post_model->get_link();
	if (count($post) == 0 || $post['post_status_id'] == POST_STATUS_DRAFT) {
		header("HTTP/1.1 301 Moved Permanently");
		header('Location: '.base_url());
		exit;
	} else {
		$this->Post_model->increment_view(array( 'id' => $post['id'], 'view_count' => $post['view_count'] ));
	}
	
	// post detail
	$post = $this->Post_model->get_by_id(array( 'id' => $post['id'], 'tag_include' => true ));
	
	// related post
	$param_post['max_id'] = $post['id'];
	$param_post['category_id'] = $post['category_id'];
	$param_post['sort'] = '[{"property":"publish_date","direction":"DESC"}]';
	$param_post['limit'] = 9;
	$array_post = $this->Post_model->get_array($param_post);
	
	// param meta
	$param_meta['title'] = 'Infogue - '.$post['category_name'].' - '.$post['name'];
	$param_meta['desc'] = $post['desc_limit'];
	$param_meta['tag_meta'][] = array( 'property' => 'og:url', 'content' => $post['post_link'] );
	$param_meta['tag_meta'][] = array( 'property' => 'og:type', 'content' => $post['category_name'] );
	$param_meta['tag_meta'][] = array( 'property' => 'og:title', 'content' => $post['name'] );
	$param_meta['tag_meta'][] = array( 'property' => 'og:description', 'content' => $post['desc_limit'] );
	if (!empty($post['thumbnail_link'])) {
		$param_meta['tag_meta'][] = array( 'property' => 'og:image', 'content' => $post['thumbnail_link'] );
	}
?>

<?php $this->load->view( 'website/common/meta.php' ); ?>
<body class="single single-post single-format-standard">
<div class="site-wrap layout-3">
	<div class="container site-container">
		<?php $this->load->view( 'website/common/header.php' ); ?>
		
		<div class="site-main row">
			<div class="twelve columns"><div class="site-main-wrap">
				<div class="primary-content"><div class="primary-content-wrap">

<article class="post-72 post type-post status-publish format-standard hentry category-entertainment category-lifestyle tag-love tag-song post-single">
	<h1 class="single-post-title"><?php echo $post['name']; ?></h1>
	
	<div class="postmeta">
		by <a class="meta-author"><?php echo $post['user_fullname']; ?></a>
		on <time class="meta-time" datetime="<?php echo GetFormatDate($post['publish_date'], array( 'FormatDate' => 'Y-m-d')); ?>"><?php echo GetFormatDate($post['publish_date']); ?></time><br />
		
		Kategori: <a href="<?php echo $post['category_link']; ?>" title="<?php echo $post['category_name']; ?>" rel="category tag"><?php echo $post['category_name']; ?></a>
	</div>
	
	<div class="post-body cf">
		<img src="<?php echo $post['thumbnail_link']; ?>" alt="<?php echo $post['name']; ?>" class="img-single" />
		<?php echo $post['desc']; ?>
	</div>
	
	<?php if (count($post['array_tag']) > 0) { ?>
	<div class="tagcloud cf">
		<div style="float: left; padding: 2px 5px 0 0;">Tag :</div>
		<?php foreach ($post['array_tag'] as $tag) { ?>
		<a href="<?php echo $tag['tag_link']; ?>" rel="tag"><?php echo $tag['tag_name']; ?></a>
		<?php } ?>
		<div style="clear: both;"></div>
	</div>
	<?php } ?>
	
	<a href="<?php echo $post['link_source']; ?>" style="text-align: center; display: block;" target="_blank" class="button button-red" rel="nofollow">Lihat Sumber</a>
</article>

<!--
<div class="author-info">
	<h3>Author:  <span>Iskandar</span></h3>
	<div class="author-status">9 stories / <a href="http://demo.bright-theme.com/presto/author/Iskandar/">Browse all stories</a></div>
	<div class="author-description cf">
		<img alt='' src='static/upload/ad516503a11cd5ca435acc9bb6523536.png' class='avatar avatar-80 photo' height='80' width='80' />
		Hi, I'm Iskandar. A newbie web designer and WordPress theme developer from Indonesia. You can see my portfolios at Theme Forest. Please write more about yourself here.
	</div>
</div>
-->

<div class="related-post">
	<h3>Berita Lainnya &raquo;</h3>
	<div class="row">
		<?php foreach ($array_post as $row) { ?>
		<div class="four columns mb-10">
			<?php if (!empty($row['thumbnail_link'])) { ?>
			<div class="post-thumbnail mb-10">
				<a href="<?php echo $row['post_link']; ?>" title="<?php echo save_html_tag($row['name']); ?>">
					<img src="<?php echo $row['thumbnail_link']; ?>" alt="<?php echo save_html_tag($row['name']); ?>" class="" />
				</a>
			</div>
			<?php } ?>
			<div class="postmeta mb-5">by <a title="Posts by <?php echo $post['user_fullname']; ?>" rel="author"><?php echo $post['user_fullname']; ?></a></div>
			<a href="<?php echo $row['post_link']; ?>" class="post-title" title="<?php echo save_html_tag($row['name']); ?>"><?php echo $row['name']; ?></a>
		</div>
		<?php } ?>
	</div>
</div>
	
<div id="comments" class="comments-area">
	<h3 class="comments-heading">7 comments on <span class="comment-post-title">Top 50 Classic Wedding Songs</span></h3>
	<ol class="comments-list">
		<li class="comment even thread-even depth-1" id="li-comment-4">
			<div class="comment-post" id="comment-4">
				<div class="comment-avatar">
					<img alt='' src='<?php echo base_url(); ?>static/img/user.png' class='avatar avatar-60 photo' height='60' width='60' />
				</div>
				<div class="comment-detail">
					<span class="t-pad"></span>
					<div class="comment-user"><a href='http://fr' rel='external nofollow' class='url'>hy</a></div>
									<div class="comment-meta">
						<time datetime="2013-05-29T11:28:20+00:00" class="comment-date">
						May 29, 2013 at 11:28 am					</time>
											 / <a class='comment-reply-link' href='/presto/top-50-classic-wedding-songs/?replytocom=4#respond' onclick='return addComment.moveForm("comment-4", "4", "respond", "72")'>Reply</a>				</div>
					<div class="comment-message"><p>Le Lorem Ipsum est simplement du faux texte employé dans la composition et la mise en page avant impression. Le Lorem Ipsum est le faux texte standard de l&#8217;imprimerie depuis les années 1500,</p></div>
				</div>
			</div>
		</li>
		<li class="comment even thread-even depth-1" id="li-comment-4">
			<div class="comment-post" id="comment-4">
				<div class="comment-avatar">
					<img alt='' src='<?php echo base_url(); ?>static/img/user.png' class='avatar avatar-60 photo' height='60' width='60' />
				</div>
				<div class="comment-detail">
					<span class="t-pad"></span>
					<div class="comment-user"><a href='http://fr' rel='external nofollow' class='url'>hy</a></div>
									<div class="comment-meta">
						<time datetime="2013-05-29T11:28:20+00:00" class="comment-date">
						May 29, 2013 at 11:28 am					</time>
											 / <a class='comment-reply-link' href='/presto/top-50-classic-wedding-songs/?replytocom=4#respond' onclick='return addComment.moveForm("comment-4", "4", "respond", "72")'>Reply</a>				</div>
					<div class="comment-message"><p>Le Lorem Ipsum est simplement du faux texte employé dans la composition et la mise en page avant impression. Le Lorem Ipsum est le faux texte standard de l&#8217;imprimerie depuis les années 1500,</p></div>
				</div>
			</div>
		</li>
		<li class="comment even thread-even depth-1" id="li-comment-4">
			<div class="comment-post" id="comment-4">
				<div class="comment-avatar">
					<img alt='' src='<?php echo base_url(); ?>static/img/user.png' class='avatar avatar-60 photo' height='60' width='60' />
				</div>
				<div class="comment-detail">
					<span class="t-pad"></span>
					<div class="comment-user"><a href='http://fr' rel='external nofollow' class='url'>hy</a></div>
									<div class="comment-meta">
						<time datetime="2013-05-29T11:28:20+00:00" class="comment-date">
						May 29, 2013 at 11:28 am					</time>
											 / <a class='comment-reply-link' href='/presto/top-50-classic-wedding-songs/?replytocom=4#respond' onclick='return addComment.moveForm("comment-4", "4", "respond", "72")'>Reply</a>				</div>
					<div class="comment-message"><p>Le Lorem Ipsum est simplement du faux texte employé dans la composition et la mise en page avant impression. Le Lorem Ipsum est le faux texte standard de l&#8217;imprimerie depuis les années 1500,</p></div>
				</div>
			</div>
		</li>
	</ol>
	
	<div id="respond" class="comment-respond">
		<h3 id="reply-title" class="comment-reply-title">Leave a Reply</h3>
		<form action="http://demo.bright-theme.com/presto/wp-comments-post.php" method="post" id="commentform" class="comment-form">
			<p class="comment-notes">Your email address will not be published. Required fields are marked <span class="required">*</span></p>
			<p class="comment-form-author">
				<label for="author">Name <span class="required">*</span></label>
				<input id="author" name="author" type="text" value="" size="30" aria-required='true' />
			</p>
			<p class="comment-form-email">
				<label for="email">Email <span class="required">*</span></label>
				<input id="email" name="email" type="text" value="" size="30" aria-required='true' />
			</p>
			<p class="comment-form-url">
				<label for="url">Website</label>
				<input id="url" name="url" type="text" value="" size="30" />
			</p>
			<p class="comment-form-comment">
				<label for="comment">Comment</label>
				<textarea id="comment" name="comment" cols="45" rows="8" aria-required="true"></textarea>
			</p>
			<p class="form-submit">
				<input name="submit" type="submit" id="submit" value="Post Comment" />
			</p>
		</form>
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