<?php
/**
 * 
 */

defined('_JEXEC') or die;


?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php echo $this->language; ?>" lang="<?php echo $this->language; ?>" dir="<?php echo $this->direction; ?>">
<head>
	<jdoc:include type="head" />

<!--[if lte IE 6]>
	<link href="<?php echo $this->baseurl ?>/templates/<?php echo $this->template; ?>/css/ieonly.css" rel="stylesheet" type="text/css" />
<![endif]-->
<!--[if lt IE 9]>
	<script src="<?php echo $this->baseurl ?>/media/jui/js/html5.js"></script>
<![endif]-->
<link rel="stylesheet" href="<?php  echo JURI::base(); ?>templates/system/css/system.css" type="text/css" />
	<link rel="stylesheet" href="<?php  echo JURI::base(); ?>templates/system/css/general.css" type="text/css" />
	
    <!-- Bootstrap core CSS -->
    <link href="<?php  echo JURI::base(); ?>templates/<?php echo $this->template; ?>/css/bootstrap.css" rel="stylesheet">

    <!-- Custom Google Web Font -->
    <link href="<?php  echo JURI::base(); ?>templates/<?php echo $this->template; ?>/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Lato:100,300,400,700,900,100italic,300italic,400italic,700italic,900italic' rel='stylesheet' type='text/css'>

  
    <link href="<?php  echo JURI::base(); ?>templates/<?php echo $this->template; ?>/css/landing-page.css" rel="stylesheet">
	<link rel="stylesheet" href="<?php  echo JURI::base(); ?>templates/<?php echo $this->template; ?>/css/template.css" type="text/css" />
	
	<!-- CSS Customization Overrides -->
	<link rel="stylesheet" href="<?php  echo JURI::base(); ?>templates/<?php echo $this->template; ?>/css/custom-style-overrides.css" type="text/css" />
	
</head>
<body id="printPageStyles" class="container">
	<div class="row">
		<div class="col-lg-12">
			<jdoc:include type="message" />
			<jdoc:include type="component" />
		</div>
	</div>
	
	 <!-- JavaScript -->
    <script src="<?php  echo JURI::base(); ?>templates/<?php echo $this->template; ?>/js/jquery-1.10.2.js"></script>
    <script src="<?php  echo JURI::base(); ?>templates/<?php echo $this->template; ?>/js/bootstrap.js"></script>
	
</body>

</html>
