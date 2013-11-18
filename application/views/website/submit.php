<?php
	// user
	$this->User_model->required_login_website();
	
	// array category
	$array_category = $this->Category_model->get_array();
?>

<?php $this->load->view( 'website/common/meta.php' ); ?>
<body class="search search-results">
<div  class="site-wrap layout-3">
	<div class="container site-container">
		<?php $this->load->view( 'website/common/header.php' ); ?>
		
		<div class="site-main row">
			<div class="twelve columns"><div class="site-main-wrap">
				<div class="primary-content"><div class="primary-content-wrap">
<div class="hide">
	<iframe name="iframe_thumbnail" src="<?php echo base_url('panel/upload?callback_name=post_thumbnail'); ?>"></iframe>
</div>

<div id="respond" style="margin-top: 0px;">
	<h3 id="reply-title" class="comment-reply-title">Submit Berita</h3>
	<form id="commentform">
		<input type="hidden" name="action" value="update" />
		<p>
			<label>Kategori <span class="required">*</span></label>
			<select name="category_id">
				<?php echo ShowOption(array( 'Array' => $array_category, 'ArrayTitle' => 'name' )); ?>
			</select>
		</p>
		<p>
			<label>Judul <span class="required">*</span></label>
			<input name="name" type="text" />
		</p>
		<p>
			<label>Deskripsi <span class="required">*</span></label>
			<textarea name="desc" cols="45" rows="8"></textarea>
		</p>
		<p>
			<label>Gambar</label>
			<input name="thumbnail" type="text" readonly="readonly" />
			<input type="button" name="browse" value="Pilih Gambar" class="button button-red" />
		</p>
		<p>
			<label>Link <span class="required">*</span></label>
			<input name="link_source" type="text" />
		</p>
		<p class="form-submit">
			<input type="submit" id="submit" value="Submit Link" />
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

<script>
$(document).ready(function() {
	post_thumbnail = function(p) { $('[name="thumbnail"]').val(p.file_name); }
	
	// form
	$("#commentform").validate({
		rules: {
			category_id: { required: true },
			name: { required: true },
			desc: { required: true },
			link_source: { required: true, url: true }
		}
	});
	$('[name="browse"]').click(function() { window.iframe_thumbnail.browse(); });
	
	$('#commentform').submit(function() {
		if (! $("#commentform").valid()) {
			return false;
		}
		
		$('.cnt-message').hide();
		var param = Site.Form.GetValue('commentform');
		delete param.browse;
		Func.ajax({ url: web.host + 'submit/action', param: param, callback: function(result) {
			if (result.status) {
				window.location = result.redirect;
			} else {
				$('.cnt-message').slideDown();
				$('.cnt-message span').text(result.message);
			}
		} });
		
		return false;
	});
});
</script>

</body>
</html>