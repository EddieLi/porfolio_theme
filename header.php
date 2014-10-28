<!DOCTYPE html>
<html lang="en">

	<head>
		 <meta charset="utf-8">
	    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	    <meta name="viewport" content="width=device-width, initial-scale=1">

		<title><?php wp_title('|',1,'right'); ?> <?php bloginfo('name'); ?></title>


		<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
	    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	    <!--[if lt IE 9]>
	      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
	      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	    <![endif]-->

		<!-- Latest compiled and minified CSS -->
		<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
		<link href="<?php bloginfo('stylesheet_url');?>" rel="stylesheet">
 		<link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Roboto">

	    <?php wp_head(); ?>
		<!-- Latest compiled and minified JavaScript -->
	</head>

	<body>
		<header>
			<section class="header container">
				<div class="top-menu navbar navbar-inverse navbar-fixed-top row" role="navigation">
					<div class="nav-top">
						<div class="container">
							<div class="navbar-header">
								<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
						            <span class="sr-only">Toggle navigation</span>
						            <span class="icon-bar"></span>
						            <span class="icon-bar"></span>
						            <span class="icon-bar"></span>
					         	</button>
								<a class="navbar-brand" href="<?php echo site_url(); ?>"><?php bloginfo('name'); ?></a>
							</div>
							<div class="navbar-collapse collapse" style="height: 1px;">
					          
					            <?php get_search_form(); ?>
					            
						</div>
					</div>
					<nav class="navbar-collapse bs-navbar-collapse collapse bottom-nav" role="navigation" style="height: 1px;">
						<div class="container">

						        <?php wp_nav_menu( array( 'sort_column' => 'menu_order', 'menu_class' => "nav navbar-nav navbar-left" ) ); ?>

						      <?php wp_nav_menu( array( 'menu' => 'top-right-menu','sort_column' => 'menu_order', 'menu_class' => "nav navbar-nav navbar-right" ) ); ?>
						</div>
				    </nav>
				</div>
			</section>
		</header>