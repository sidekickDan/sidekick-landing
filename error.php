<?php
/**
 * @package     Joomla.Site
 * @subpackage  Template.system
 *
 * @copyright   Copyright (C) 2005 - 2014 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;
if (!isset($this->error))
{
	$this->error = JError::raiseWarning(404, JText::_('JERROR_ALERTNOAUTHOR'));
	$this->debug = false;
}
//get language and direction
$doc = JFactory::getDocument();
$this->language = $doc->language;
$this->direction = $doc->direction;


 jimport( 'joomla.application.module.helper' ); // to include joomla module helper on page
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php echo $this->language; ?>" lang="<?php echo $this->language; ?>" dir="<?php echo $this->direction; ?>">
<head>

	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title><?php echo $this->error->getCode(); ?> - <?php echo htmlspecialchars($this->error->getMessage()); ?></title>
	
	<?php if ($this->direction == 'rtl') : ?>
	<link rel="stylesheet" href="<?php echo $this->baseurl; ?>/templates/system/css/error_rtl.css" type="text/css" />
	<?php endif; ?>
	<?php
		$debug = JFactory::getConfig()->get('debug_lang');
		if (JDEBUG || $debug)
		{
	?>
		<link rel="stylesheet" href="<?php echo $this->baseurl ?>/media/cms/css/debug.css" type="text/css" />
	<?php
		}
	?>
	
	<link rel="stylesheet" href="<?php  echo JURI::base(); ?>templates/system/css/system.css" type="text/css" />
	<link rel="stylesheet" href="<?php  echo JURI::base(); ?>templates/system/css/general.css" type="text/css" />
	
    <!-- Bootstrap core CSS -->
    <link href="<?php  echo JURI::base(); ?>templates/<?php echo $this->template; ?>/css/bootstrap.css" rel="stylesheet">

    <!-- Custom Google Web Font -->
    <link href="<?php  echo JURI::base(); ?>templates/<?php echo $this->template; ?>/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Lato:100,300,400,700,900,100italic,300italic,400italic,700italic,900italic' rel='stylesheet' type='text/css'>

  

	<link rel="stylesheet" href="<?php  echo JURI::base(); ?>templates/<?php echo $this->template; ?>/css/template-core.css" type="text/css" />
	
	<!-- CSS Customization Overrides -->
	<link rel="stylesheet" href="<?php  echo JURI::base(); ?>templates/<?php echo $this->template; ?>/css/custom-style-overrides.css" type="text/css" />
	
	<style> * {color:#ffffff;} </style>
	
</head>
<body id="errorpage-styles">
 <nav class="navbar navbar-default navbar-fixed-top" role="navigation">
        <div class="container">
			
			
		
            <div class="navbar-header ">
				
				
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
					<span class="menu-text">Menu</span>
                </button>
				<div class=" logo col-xs-9 col-lg-12 ">
				
						<?php
						$position = 'logo'; // name of  the module you want to call
						foreach (JModuleHelper::getModules($position) as $mod) { // loop so that all other modules on same position can be called.
						$contents .= JModuleHelper::renderModule($mod); //assigning module data to $contents variable
						}
						echo $contents; // printing the final result, the assigned module data.
						?>
				
				</div>
                
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse navbar-right navbar-ex1-collapse">
			
						<?php
						$positionNav = 'navigation'; // name of  the module you want to call
						foreach (JModuleHelper::getModules($positionNav) as $modNav) { // loop so that all other modules on same position can be called.
						$mainMenuModule .= JModuleHelper::renderModule($modNav); //assigning module data to $contents variable
						}
						echo $mainMenuModule; // printing the final result, the assigned module data.
						?>
                
            </div>
            <!-- /.navbar-collapse -->
			
        </div>
        <!-- /.container -->
    </nav>
	
	<!-- SHOWCASE AREA START -->
	
    <div id="sk-showcase" class="banner" style="color:#ffffff !important;">

        	<div class="container">
		<div class="row">
		<div class="col-lg-8">
			
			<div class="404errormessage-module">
						
						<?php
						$positionError = '404errorpage'; // name of  the module you want to call
						
						foreach (JModuleHelper::getModules($positionError) as $moderrorMessage) { // loop so that all other modules on same position can be called.
						$customerrorMessage .= JModuleHelper::renderModule($moderrorMessage); //assigning module data to $contents variable
						}
						
						
						echo $customerrorMessage; // printing the final result, the assigned module data.
						
						?>
			</div>		
			<div style="clear:both;margin:25px 10px;">
				<p ><a class="btn-primary btn-lg" href="<?php echo $this->baseurl; ?>/index.php" title="<?php echo JText::_('JERROR_LAYOUT_GO_TO_THE_HOME_PAGE'); ?>"><?php echo JText::_('JERROR_LAYOUT_HOME_PAGE'); ?></a></p>
			</div>
				
		
		</div>
		<div class="col-lg-4">
			
			<div class="errorpage-errorType-box">
			<div id="errorpage-errorType"><p><?php echo $this->error->getCode(); ?> - <?php echo htmlspecialchars($this->error->getMessage()); ?></p></div>
			<p><strong><?php echo JText::_('JERROR_LAYOUT_NOT_ABLE_TO_VISIT'); ?></strong></p>
			<p>
				<ul>
					<li><?php echo JText::_('JERROR_LAYOUT_AN_OUT_OF_DATE_BOOKMARK_FAVOURITE'); ?></li>
					<li><?php echo JText::_('JERROR_LAYOUT_SEARCH_ENGINE_OUT_OF_DATE_LISTING'); ?></li>
					<li><?php echo JText::_('JERROR_LAYOUT_MIS_TYPED_ADDRESS'); ?></li>
					<li><?php echo JText::_('JERROR_LAYOUT_YOU_HAVE_NO_ACCESS_TO_THIS_PAGE'); ?></li>
					<li><?php echo JText::_('JERROR_LAYOUT_REQUESTED_RESOURCE_WAS_NOT_FOUND'); ?></li>
					<li><?php echo JText::_('JERROR_LAYOUT_ERROR_HAS_OCCURRED_WHILE_PROCESSING_YOUR_REQUEST'); ?></li>
				</ul>
			</p>
			

			
			</div>
		</div>
		
	</div>
        <!-- /.container -->

    </div>
    <!-- /.intro-header -->
	</div>
    <!-- SHOWCASE AREA END  -->
	 <!-- JavaScript -->
    <script src="<?php  echo JURI::base(); ?>templates/<?php echo $this->template; ?>/js/jquery-1.10.2.js"></script>
    <script src="<?php  echo JURI::base(); ?>templates/<?php echo $this->template; ?>/js/bootstrap.js"></script>
	

</body>
</html>
