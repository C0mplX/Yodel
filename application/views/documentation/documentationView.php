<?php
require_once( 'application/views/headerView.php' );
?>

<div class="container">
	<div class="row mt centered">
		<div class="col-lg-6 col-lg-offset-3">
			<h1>Documentation</h1>
			<h3>Here you will find everything you need to get started with Yodel. It is simple and easy</h3>
		</div>
	</div><!-- /row -->
	
	<div class="row">
		<div class="col-md-3 col-xs-12 side-menu">
			<h2>Overview</h2>
			<ul>
				<a href="<?php echo SITEURL; ?>documentation/started"><li>Getting started</li></a>
				<a href="<?php echo SITEURL; ?>documentation/controllers"><li>Add new controllers</li></a>
				<a href="<?php echo SITEURL; ?>docmentation/views"><li>Add new Views</li></a>
			</ul>
		</div>
		<div class="col-md-9 col-xs-12 side-view">
			<h2>Getting started</h2>
			<?php echo $data->text; ?>
			<?php
			var_dump($data->array2);
			?>
		</div>
	</div><!-- /row -->
</div><!-- /container -->
<?php
require_once( 'application/views/footerView.php' );
?>