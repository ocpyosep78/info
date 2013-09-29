<?php $this->load->view( 'website/common/meta.php' ); ?>
<body class="search search-results">
<div  class="site-wrap layout-3">
	<div class="container site-container">
		<?php $this->load->view( 'website/common/header.php' ); ?>
		
		<div class="site-main row">
			<div class="twelve columns"><div class="site-main-wrap">
				<div class="primary-content"><div class="primary-content-wrap">

<div id="respond" style="margin-top: 0px;">
	<h3 id="reply-title" class="comment-reply-title">Register</h3>
	<form id="commentform">
		<p>
			<label>Username <span class="required">*</span></label>
			<input name="user_name" type="text" />
		</p>
		<p>
			<label>Password <span class="required">*</span></label>
			<input name="passwd" type="password" />
		</p>
		<p class="form-submit">
			<input name="submit" type="submit" id="submit" value="Post Comment" />
			<input type="hidden" name="comment_parent" id="comment_parent" value="0" />
		</p>
	</form>
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