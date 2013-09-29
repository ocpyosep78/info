<script type='text/javascript' src='<?php echo base_url(); ?>static/js/jquery.carouFredSel.js'></script>
<script type='text/javascript' src='<?php echo base_url(); ?>static/js/jquery.hoverIntent.minified.js'></script>
<script type='text/javascript' src='<?php echo base_url(); ?>static/js/jquery.flexslider-min.js'></script>
<script type='text/javascript' src='<?php echo base_url(); ?>static/js/jquery.ui.core.js'></script>
<script type='text/javascript' src='<?php echo base_url(); ?>static/js/jquery.ui.widget.js'></script>
<script type='text/javascript' src='<?php echo base_url(); ?>static/js/jquery.ui.accordion.js'></script>
<script type='text/javascript' src='<?php echo base_url(); ?>static/js/jquery.ui.tabs.js'></script>
<script type='text/javascript' src='<?php echo base_url(); ?>static/js/jquery.tipsy.js'></script>
<script type='text/javascript' src='<?php echo base_url(); ?>static/js/theme.js'></script>


<?php if ($this->config->item('online_widget')) { ?>
<script>
(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
})(window,document,'script','//www.google-analytics.com/analytics.js','ga');
ga('create', 'UA-44319739-1', 'infogue.com');
ga('send', 'pageview');
</script>

<script type="text/javascript">
var sc_project=9274414; var sc_invisible=1; var sc_security="aa40600e"; 
var scJsHost = (("https:" == document.location.protocol) ? "https://secure." : "http://www.");
document.write("<sc"+"ript type='text/javascript' src='" + scJsHost+ "statcounter.com/counter/counter_xhtml.js'></"+"script>");
</script>
<?php } ?>