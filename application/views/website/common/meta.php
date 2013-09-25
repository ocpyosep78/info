<?php
	$web['host'] = base_url();
	$title = (!empty($title)) ? $title : 'Infogue - Web Portal';
	$desc = (!empty($desc)) ? $desc : 'Infogue - Web Portal Kamu';
	$tag_meta = (isset($tag_meta) && is_array($tag_meta)) ? $tag_meta : array();
?>

<!DOCTYPE html>
<!--[if lt IE 7]><html class="no-js lt-ie9 lt-ie8 lt-ie7" lang="en-US"><![endif]-->
<!--[if IE 7]><html class="no-js lt-ie9 lt-ie8" lang="en-US"><![endif]-->
<!--[if IE 8]><html class="no-js lt-ie9" lang="en-US"><![endif]-->
<!--[if gt IE 8]><!--><html class="no-js" lang="en-US"><!--<![endif]-->
<head>
	<meta charset="UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<meta name="description" content="<?php echo save_html_tag($desc); ?>" />
	<?php foreach ($tag_meta as $meta) { ?>
	<meta property="<?php echo $meta['property']; ?>" content="<?php echo save_html_tag($meta['content']); ?>">
	<?php } ?>
	<title><?php echo htmlspecialchars($title); ?></title>
	
	<link rel="shortcut icon" href="<?php echo base_url(); ?>static/img/favicon.ico">
	<link rel="alternate" type="application/rss+xml" title="Infogue Feed" href="<?php echo base_url(); ?>rss/" />
	<link rel='stylesheet' type='text/css' media='screen' href='<?php echo base_url(); ?>static/css/tp_twitter_plugin.css' />
	<link rel='stylesheet' type='text/css' media='screen' href='<?php echo base_url(); ?>static/css/fontello.css' />
	<link rel='stylesheet' type='text/css' media='screen' href='<?php echo base_url(); ?>static/css/base.css' />
	<link rel='stylesheet' type='text/css' media='screen' href='<?php echo base_url(); ?>static/css/responsive.css' />
	<link rel='stylesheet' type='text/css' media='screen' href='<?php echo base_url(); ?>static/css/default.css' />
	<link rel='stylesheet' type='text/css' media='screen' href='<?php echo base_url(); ?>static/css/presto-custom.css' />
	<script> var web = <?php echo json_encode($web); ?></script>
	<script type='text/javascript' src='<?php echo base_url(); ?>static/js/jquery.js'></script>
	<script type='text/javascript' src='<?php echo base_url(); ?>static/js/jquery-migrate.min.js'></script>
	
	<!--[if lt IE 9]>
	<script type='text/javascript' src='<?php echo base_url(); ?>static/js/html5.js'></script>
	<script type='text/javascript' src='<?php echo base_url(); ?>static/js/respond.min.js'></script>
	<![endif]-->
</head>