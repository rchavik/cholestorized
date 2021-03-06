<?php
/**
 *
 * PHP versions 4 and 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright 2005-2009, Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright 2005-2009, Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       cake
 * @subpackage    cake.cake.console.libs.templates.skel.views.layouts
 * @since         CakePHP(tm) v 0.10.0.1076
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<?php echo $html->charset(); ?>
	<title>
		<?php __('CakePHP: the rapid development php framework:'); ?>
		<?php echo $title_for_layout; ?>
	</title>
	<?php
		echo $html->meta('icon');

		echo $html->css(array(
			'jquery/jquery-ui-1.7.2.custom',
			'jqgrid/ui.jqgrid',
			)
		);
	
		echo $javascript->link(array(
			'jquery/jquery-1.3.2.min',
			'jquery/jquery-ui-1.7.2.custom.min',
			'jqgrid/i18n/grid.locale-en',
			'jqgrid/jquery.jqGrid.min',
			)
		);
		echo $scripts_for_layout;
	?>
</head>
<body style='font-size: 90%'>
	<div id="container">
		<div id="header">
			<h1><?php echo $html->link(__('CakePHP: the rapid development php framework', true), 'http://cakephp.org'); ?></h1>
		</div>
		<div id="content" style="width: 100%">

			<?php $session->flash(); ?>

			<?php echo $content_for_layout; ?>

		</div>

		<div id="footer">
			<?php echo $html->link(
					$html->image('cake.power.gif', array('alt'=>__("CakePHP: the rapid development php framework", true), 'border'=>"0")),
					'http://www.cakephp.org/',
					array('target' => '_blank', 'escape' => false)
				);
			?>
		</div>
	</div>
	<?php echo $cakeDebug; ?>
<script type="text/javascript">
var gaJsHost = (("https:" == document.location.protocol) ? "https://ssl." : "http://www.");
document.write(unescape("%3Cscript src='" + gaJsHost + "google-analytics.com/ga.js' type='text/javascript'%3E%3C/script%3E"));
</script>
<script type="text/javascript">
var pageTracker = _gat._getTracker("UA-179760-1");
pageTracker._initData();
pageTracker._trackPageview();
</script>

</body>
</html>
