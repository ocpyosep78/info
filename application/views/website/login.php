<?php $this->load->view( 'website/common/meta.php' ); ?>
<body class="search search-results">
<div  class="site-wrap layout-3">
	<div class="container site-container">
		<?php $this->load->view( 'website/common/header.php' ); ?>
		
		<div class="site-main row">
			<div class="twelve columns"><div class="site-main-wrap">
				<div class="primary-content"><div class="primary-content-wrap">

<div id="respond" style="margin-top: 0px;">
	<h3 id="reply-title" class="comment-reply-title">Login</h3>
	<form id="commentform">
		<input type="hidden" name="action" value="login" />
		<p>
			<label>Username / Email <span class="required">*</span></label>
			<input name="alias" type="text" />
		</p>
		<p>
			<label>Password <span class="required">*</span></label>
			<input name="passwd" id="passwd" type="password" />
		</p>
		<p class="form-submit">
			<input name="submit" type="submit" id="submit" value="Register" />
		</p>
	</form>
</div>

<div class="cnt-message alert alert-error hide">
	<h3 class="alert-title">Error</h3>
	<span></span>
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

<script type="text/javascript">
$('#commentform').validate({
	rules: {
		user_name: { required: true, minlength: 5 },
		passwd: { required: true }
	}
});

$('#commentform').submit(function(event) {
	event.preventDefault();
	if (! $('#commentform').valid()) {
		return false;
	}
	
	$('.cnt-message').hide();
	var param = Site.Form.GetValue('commentform');
	Func.ajax({ url: web.host + 'login/action', param: param, callback: function(result) {
		if (result.status) {
			window.location = web.host;
		} else {
			$('.cnt-message span').text(result.message);
			$('.cnt-message').slideDown('slow');
		}
	} });
});
</script>

</body>
</html>