<?php
	$array_category = $this->Category_model->get_array();
?>
<div class="floated-navigation"><div class="container"><div class="row"><div class="twelve columns">
	<nav class="float-navigation">
		<ul id="menu-main-menu-2" class="float-menu">
			<li class="current-menu-item current_page_item menu-item-home">
				<a href="<?php echo base_url(); ?>" title="Infogue - Home"><img src="<?php echo base_url(); ?>static/img/ig_logo.gif" alt="Infogue - Home"></a>
			</li>
			<li><a href="<?php echo base_url('semua'); ?>">Semua</a></li>
			<?php foreach ($array_category as $category) { ?>
			<li><a href="<?php echo $category['link']; ?>"><?php echo $category['name']; ?></a></li>
			<?php } ?>
		</ul>
	</nav>
</div></div></div></div>