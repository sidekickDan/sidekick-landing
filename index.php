<?php defined( '_JEXEC' ) or die( 'Restricted access' );?>



<?php
  $app = JFactory::getApplication();
  $menu = $app->getMenu()->getActive();
  $pageclass = '';
 
  if (is_object($menu))
    $pageclass = $menu->params->get('pageclass_sfx');
	
   
	
?>





<?php 

	/* Grab Sidebar Width That Is Set from Template parameters */
	$templateParamSidebarWidthSize = $this->params->get( 'SidebarWidthSize' );

	/* Assign Sidebar Width to a Variable. */
	$sidebarWidth = $templateParamSidebarWidthSize;
		
	/* Sets Main Component or Article area width based on the desired width of the sidebar area. */
	
	if ($this->countModules('sidebar-a or banners-sidebar-top or banners-sidebars-bottom')) {
	$componentWidth = 12-$sidebarWidth;
	} else {
	$componentWidth = 12;
	}
	
	/* Grab the Base Grid Setting from the Template Parameters - lg, md, sm, or xs and set the baseGrid variable used in the div's to the option chosen */
	$templateParamDisplayBaseGridChoice = $this->params->get( 'BaseGridChoice' );	
	$BaseGridChoice = $templateParamDisplayBaseGridChoice;
	
	
	switch ($BaseGridChoice)
	{
		case "0":
		  $baseGrid = 'lg';
		  break;
		case "1":
		  $baseGrid = 'md';
		  break;
		case "2":
		  $baseGrid = 'sm';
		  break;
		case "3":
		  $baseGrid = 'xs';
		  break;
		default:
		  $baseGrid = 'md';
	}
	
	/* Grab Sidebar Location That Is Set from Template parameters */
	$templateParamSidebarLocation = $this->params->get( 'SidebarLocation' );
	
	if ($templateParamSidebarLocation == 0) {
		$sidebarLocation = " ";
		$componentLocation = " ";
	} else {
		$sidebarLocation = "col-".$baseGrid."-pull-".$componentWidth;
		$componentLocation = "col-".$baseGrid."-push-".$sidebarWidth;
	}
	
	/* Grab Component Homepage Display setting from Template Parameters and set default to display. */
	$templateParamDisplayComponentOnHomePage = $this->params->get( 'ComponentHomePage' );
	$componentHomePageDisplay = 0;
	
	/* Determine if template parameter is set to hide or display component on home page. Then update variables if set to hide. */
	if ($templateParamDisplayComponentOnHomePage == 1) { 
	
		/* Determine if active page being viewed is the homepage. If so then set variable so component area is not displayed. */
		$menu = JFactory::getApplication()->getMenu();
		if ($menu->getActive() == $menu->getDefault()) {
			$componentHomePageDisplay = 1;
		} else {
			$componentHomePageDisplay = 0;
		}

	
	}
	


?>
<?php
// Remove Scripts
$doc = JFactory::getDocument();
unset($doc->_styleSheets['/media/jui/css/bootstrap.min.css']);
unset($doc->_styleSheets['/media/jui/css/bootstrap-responsive.min.css']);
unset($doc->_styleSheets['/administrator/components/com_pmform/assets/bootstrap/css/bootstrap.css']);
?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php echo $this->language; ?>" lang="<?php echo $this->language; ?>" dir="<?php echo $this->direction; ?>" >
<head>  

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	
	<script src="<?php  echo JURI::base(); ?>templates/<?php echo $this->template; ?>/js/jquery-1.10.2.js"></script>
	
    <jdoc:include type="head" />

	<link rel="stylesheet" href="<?php  echo JURI::base(); ?>templates/system/css/system.css" type="text/css" />
	<link rel="stylesheet" href="<?php  echo JURI::base(); ?>templates/system/css/general.css" type="text/css" />
	

    <!-- Custom Google Web Font -->
    <link href="<?php  echo JURI::base(); ?>templates/<?php echo $this->template; ?>/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Lato:100,300,400,700,900,100italic,300italic,400italic,700italic,900italic' rel='stylesheet' type='text/css'>

	 <!-- Bootstrap 3 core CSS -->
    <link rel="stylesheet" href="<?php  echo JURI::base(); ?>templates/<?php echo $this->template; ?>/css/bootstrap.css"  type="text/css" />
	
	<!-- Core Template CSS -->
	<link rel="stylesheet" href="<?php  echo JURI::base(); ?>templates/<?php echo $this->template; ?>/css/template-core.css" type="text/css" />
	
	<!-- CSS Customization Overrides -->
	<link rel="stylesheet" href="<?php  echo JURI::base(); ?>templates/<?php echo $this->template; ?>/css/custom-style-overrides.css" type="text/css" />

	<!-- Insert Google Analytics Code from Template Parameters -->
	<script><?php echo $this->params->get( 'google-analytics-code' ) ?></script>
	
	
	
	<style>
	body {font-size: <?php echo $this->params->get( 'bodyFontSize' ) ?>;}
	p {font-size: <?php echo $this->params->get( 'paragraphFontSize' ) ?>;}
	h1 {font-size: <?php echo $this->params->get( 'h1FontSize' ) ?>;}
	h2 {font-size: <?php echo $this->params->get( 'h2FontSize' ) ?>;}
	h3 {font-size: <?php echo $this->params->get( 'h3FontSize' ) ?>;}
	h4 {font-size: <?php echo $this->params->get( 'h4FontSize' ) ?>;}	
	</style>

	<!-- IE Support -->
		<!--[if lt IE 9]>
		<script src="<?php  echo JURI::base(); ?>templates/<?php echo $this->template; ?>/js/html5shiv.min.js"></script>
		<script src="<?php  echo JURI::base(); ?>templates/<?php echo $this->template; ?>/js/respond.min.js"></script>
		<![endif]-->
	
	
</head>

<body id="<?php echo $pageclass ? htmlspecialchars($pageclass) : 'default'; ?>">
	<div id="sk-header-top">
	<div class="container">
	
					
					
					<?php if ($this->countModules('menu-top')) : ?>
							<div id="menu-top" class="col-sm-12">
							<jdoc:include type="modules" name="menu-top" style="suffixOnce" />
							</div>
					<?php endif; ?>
	</div>
	</div>
	
	<?php if ($this->countModules('logo-top or banners-header-right')) : ?>
	<div id="sk-header">
	<div class="container">
	
					<?php if ($this->countModules('logo-top')) : ?>
							<div id="logo-top" class="col-sm-5">
							<jdoc:include type="modules" name="logo-top" style="suffixOnce" />
							</div>
					<?php endif; ?>
					
					<?php if ($this->countModules('banners-header-right')) : ?>
							<div id="banners-header-right" class="col-sm-7">
							<jdoc:include type="modules" name="banners-header-right" style="suffixOnce" />
							</div>
					<?php endif; ?>
					
					
	</div>
	</div>
	<?php endif; ?>
	
    <nav class="navbar navbar-inverse navbar-default " role="navigation" id="slide-nav">
        <div class="container">
			
			
		
            <div class="navbar-header ">
				
				
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
					<span class="menu-text">Menu</span>
                </button>
				<div class=" logo col-xs-9 col-lg-12 "><jdoc:include type="modules" name="logo" style="suffixOnce" /></div>
                
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
			<div class="sr-only">Main Navigation</div>
			<div class="sr-only"><a title="Skip to content link" class="sr-only" href="#mainContentArea">Skip to Content</a></div>
			
            <div class="collapse navbar-collapse  navbar-ex1-collapse">
			
				<?php if ($this->countModules('navigation')) : ?>
						
							<jdoc:include type="modules" name="navigation" style="none" />
						
				<?php endif; ?>
                
            </div>
            <!-- /.navbar-collapse -->
			
        </div>
        <!-- /.container -->
    </nav>

	<!-- BEGINNING MAIN CONTAINER WRAPPER -->
	<div class="container main-container">
	
	<!-- SHOWCASE AREA START -->
	<?php if ($this->countModules('showcase-a or showcase-b')) : ?>
    <div id="sk-showcase" class="intro-header">

        <div class="container">

            <div class="row">
                <div class="col-lg-12">
                    
					<?php if ($this->countModules('showcase-a')) : ?>
						
							<jdoc:include type="modules" name="showcase-a" style="suffixOnce" />
						
					<?php endif; ?>
					<?php if ($this->countModules('showcase-b')) : ?>
						
							<jdoc:include type="modules" name="showcase-b" style="suffixOnce" />
						
					<?php endif; ?>
					
                </div>
            </div>

        </div>
        <!-- /.container -->

    </div>
    <!-- /.intro-header -->
	<?php endif; ?>
    <!-- SHOWCASE AREA END  -->

	<!-- PROMOTION AND HIGHLIGHT AREA START -->
	<?php if ($this->countModules('promotion or highlight')) : ?>
    <div id="sk-promotion" class="content-section-b">

        <div class="container">

            <div class="row">
                <div class="col-lg-12">
				
                   
							
					<?php if ($this->countModules('promotion')) : ?>
						
							<jdoc:include type="modules" name="promotion" style="suffixOnce" />
						
					<?php endif; ?>
					<?php if ($this->countModules('highlight')) : ?>
						
							<jdoc:include type="modules" name="highlight" style="suffixOnce" />
						
					<?php endif; ?>
					
                </div>
            </div>

        </div>
        <!-- /.container -->

    </div>
    <!-- /.intro-header -->
	<?php endif; ?>
    <!-- PROMOTION AND HIGHLIGHT AREA END  -->
	
		<!-- HIGHLIGHT BANNERS ROW START  2 BOXES WIDE/NARROW -->
<?php if ($this->countModules('highlight-a or highlight-b')) : ?>

	<div id="sk-highlight" class="content-section-a">

        <div class="container">

            <div class="row">
                <div class="col-lg-12">
					
					<?php if ($this->countModules('highlight-a')) : ?>
                    <div  class="col-<?php echo $baseGrid; ?>-8">
		
							<jdoc:include type="modules" name="highlight-a" style="suffixOnce" />
					
					</div>
					<?php endif; ?>
					
					<?php if ($this->countModules('highlight-b')) : ?>
					<div  class="col-<?php echo $baseGrid; ?>-4">
					
							<jdoc:include type="modules" name="highlight-b" style="suffixOnce" />
						
					</div>
					<?php endif; ?>
					
                </div>
            </div>

        </div>
        <!-- /.container -->

    </div>
<?php endif; ?>
    <!-- FEATURE ROW END  -->
	
	<!-- FEATURE ROW START  3 BOXES -->
<?php if ($this->countModules('feature-a or feature-b or feature-c')) : ?>

	<div id="sk-feature1" class="content-section-b">

        <div class="container">

            <div class="row">
                <div class="col-lg-12">
                    <div  class="col-<?php echo $baseGrid; ?>-4">
					<?php if ($this->countModules('feature-a')) : ?>
						
							<jdoc:include type="modules" name="feature-a" style="suffixOnce" />
						
					<?php endif; ?>
					</div>
					
					<div  class="col-<?php echo $baseGrid; ?>-4">
					<?php if ($this->countModules('feature-b')) : ?>
						
							<jdoc:include type="modules" name="feature-b" style="suffixOnce" />
						
					<?php endif; ?>
					</div>
					
					<div class="col-<?php echo $baseGrid; ?>-4">
					<?php if ($this->countModules('feature-c')) : ?>
						
							<jdoc:include type="modules" name="feature-c" style="suffixOnce" />
						
					<?php endif; ?>
					</div>
                </div>
            </div>

        </div>
        <!-- /.container -->

    </div>
<?php endif; ?>
    <!-- FEATURE ROW END  -->
	
	<!-- FEATURE ROW START  2 BOXES WIDE/NARROW -->
<?php if ($this->countModules('feature-d or feature-e')) : ?>

	<div id="sk-feature2" class="content-section-a">

        <div class="container">

            <div class="row">
                <div class="col-lg-12">
                    <div  class="col-<?php echo $baseGrid; ?>-8">
					<?php if ($this->countModules('feature-d')) : ?>
						
							<jdoc:include type="modules" name="feature-d" style="suffixOnce" />
						
					<?php endif; ?>
					</div>
					
					<div  class="col-<?php echo $baseGrid; ?>-4">
					<?php if ($this->countModules('feature-e')) : ?>
						
							<jdoc:include type="modules" name="feature-e" style="suffixOnce" />
						
					<?php endif; ?>
					</div>
					
					
                </div>
            </div>

        </div>
        <!-- /.container -->

    </div>
<?php endif; ?>
    <!-- FEATURE ROW END  -->
	
<!-- FEATURE FULL WIDTH ROW AREA START -->
	<?php if ($this->countModules('feature-row-a')) : ?>
    <div id="sk-feature-row" class="content-section-b">

        <div class="container">

            <div class="row">
                <div class="col-lg-12">
				
                   
							
					<?php if ($this->countModules('feature-row-a')) : ?>
						
							<jdoc:include type="modules" name="feature-row-a" style="suffixOnce" />
						
					<?php endif; ?>
					
					
                </div>
            </div>

        </div>
        <!-- /.container -->

    </div>
    <!-- /.intro-header -->
	<?php endif; ?>
    <!-- PROMOTION AND HIGHLIGHT AREA END  -->
	
	<!-- FEATURE ROW START  2 BOXES NARROW/WIDE -->
<?php if ($this->countModules('feature-f or feature-g')) : ?>

	<div id="sk-feature3" class="content-section-b">

        <div class="container">

            <div class="row">
                <div class="col-lg-12">
                    <div  class="col-<?php echo $baseGrid; ?>-8">
					<?php if ($this->countModules('feature-f')) : ?>
						
							<jdoc:include type="modules" name="feature-f" style="suffixOnce" />
						
					<?php endif; ?>
					</div>
					
					<div  class="col-<?php echo $baseGrid; ?>-4">
					<?php if ($this->countModules('feature-g')) : ?>
						
							<jdoc:include type="modules" name="feature-g" style="suffixOnce" />
						
					<?php endif; ?>
					</div>
					
					
                </div>
            </div>

        </div>
        <!-- /.container -->

    </div>
<?php endif; ?>
    <!-- FEATURE ROW END  -->
	
<!-- UTILITY ROW START  4 BOXES -->
<?php if ($this->countModules('utility-a or utility-b or utility-c or utility-d')) : ?>

	<div id="sk-feature1" class="content-section-b">

        <div class="container">

            <div class="row">
                <div class="col-lg-12">
                    <div  class="col-<?php echo $baseGrid; ?>-3">
					<?php if ($this->countModules('utility-a')) : ?>
						
							<jdoc:include type="modules" name="utility-a" style="suffixOnce" />
						
					<?php endif; ?>
					</div>
					
					<div  class="col-<?php echo $baseGrid; ?>-3">
					<?php if ($this->countModules('utility-b')) : ?>
						
							<jdoc:include type="modules" name="utility-b" style="suffixOnce" />
						
					<?php endif; ?>
					</div>
					
					<div class="col-<?php echo $baseGrid; ?>-3">
					<?php if ($this->countModules('utility-c')) : ?>
						
							<jdoc:include type="modules" name="utility-c" style="suffixOnce" />
						
					<?php endif; ?>
					</div>
					
					<div class="col-<?php echo $baseGrid; ?>-3">
					<?php if ($this->countModules('utility-d')) : ?>
						
							<jdoc:include type="modules" name="utility-d" style="suffixOnce" />
						
					<?php endif; ?>
					</div>
                </div>
            </div>

        </div>
        <!-- /.container -->

    </div>
<?php endif; ?>
    <!-- UTILITY ROW END  -->
	
    
<?php if ($componentHomePageDisplay == 0) : ?>
	
	<!-- COMPONENT AREA START -->
	<div id="sk-component-area" class="content-section-b">

        <div class="container">

            <div class="row">
			
				
			
				<!-- MAIN CONTENT AREA -->
                <div id="main-content-area" class="col-<?php echo $baseGrid; ?>-<?php echo $componentWidth; ?>  <?php echo $componentLocation; ?>">
					 
					 <?php if ($this->countModules('banners-alert')) : ?>
							<div id="banners-alert" class="col-<?php echo $baseGrid; ?>-12">
							<jdoc:include type="modules" name="banners-alert" style="suffixOnce" />
							</div>
					<?php endif; ?>
					
					<?php if ($this->countModules('banners-featured-top')) : ?>
							<div id="banners-featured-top" class="col-<?php echo $baseGrid; ?>-12">
							<jdoc:include type="modules" name="banners-featured-top" style="suffixOnce" />
							</div>
					<?php endif; ?>
					
					<!-- CONTENT TOP AREA -->
					<?php if ($this->countModules('content-top-a or content-top-b')) : ?>
					<div class="col-lg-12">

					
										<div class="col-lg-12">
										
											<div  class="col-<?php echo $baseGrid; ?>-6">
											<?php if ($this->countModules('content-top-a')) : ?>
												
													<jdoc:include type="modules" name="content-top-a" style="suffixOnce" />
												
											<?php endif; ?>
											</div>
											
											<div  class="col-<?php echo $baseGrid; ?>-6">
											<?php if ($this->countModules('content-top-b')) : ?>
												
													<jdoc:include type="modules" name="content-top-b" style="suffixOnce" />
												
											<?php endif; ?>
											</div>
											
											
										</div>
									

								
								<!-- /.container -->

							
													
												
					</div>
					<?php endif; ?>
					
					<!-- CONTENT TOP AREA END -->
					
					
					<!-- COMPONENT CONTENT AREA -->
					<div id="mainContentArea" class="col-lg-12">
							<jdoc:include type="message" />
							
							
							<?php if ($this->countModules('breadcrumb')) : ?>
								<div class="col-lg-12">
									<jdoc:include type="modules" name="breadcrumb" style="suffixOnce" />
								</div>
							<?php endif; ?>
							
							
							<jdoc:include type="component" />
					</div>
					<!-- COMPONENT CONTENT AREA END -->
					
					
					<!-- CONTENT BOTTOM AREA -->
					<?php if ($this->countModules('content-bottom-a or content-bottom-b')) : ?>
					<div class="col-lg-12">

					
										<div class="col-lg-12">
										
											<div  class="col-<?php echo $baseGrid; ?>-6">
											<?php if ($this->countModules('content-bottom-a')) : ?>
												
													<jdoc:include type="modules" name="content-bottom-a" style="suffixOnce" />
												
											<?php endif; ?>
											</div>
											
											<div  class="col-<?php echo $baseGrid; ?>-6">
											<?php if ($this->countModules('content-bottom-b')) : ?>
												
													<jdoc:include type="modules" name="content-bottom-b" style="suffixOnce" />
												
											<?php endif; ?>
											</div>
											
											
										</div>
									

								
								<!-- /.container -->

												
					</div>
					<?php endif; ?>
					
					<!-- CONTENT BOTTOM AREA END -->
					
					
					
                </div>
				<!-- MAIN CONTENT AREA END -->
				
				
				
				<!-- SIDEBAR AREA -->
				<?php if ($this->countModules('sidebar-a or banners-sidebar-top or banners-sidebar-bottom')) : ?>

	
                <div id="sidebar-a" class="col-<?php echo $baseGrid; ?>-<?php echo $sidebarWidth; ?>  <?php echo $sidebarLocation; ?>">
                    
							
							<?php if ($this->countModules('banners-sidebar-top')) : ?>
							<div id="banners-sidebar-top" class="col-<?php echo $baseGrid; ?>-12 hidden-xs">
							<jdoc:include type="modules" name="banners-sidebar-top" style="suffixOnce" />
							</div>
							<?php endif; ?>
							
							<?php if ($this->countModules('sidebar-a')) : ?>							
							<jdoc:include type="modules" name="sidebar-a" style="suffixOnce" />
							<?php endif; ?>
							
							<?php if ($this->countModules('banners-sidebar-bottom')) : ?>
							<div id="banners-sidebar-bottom" class="col-<?php echo $baseGrid; ?>-12 hidden-xs">
							<jdoc:include type="modules" name="banners-sidebar-bottom" style="suffixOnce" />
							</div>
							<?php endif; ?>
						
					

                </div>

				<?php endif; ?>
				<!-- SIDEBAR AREA END -->
				
				
				
			</div>
								
				
				
        </div>

    </div>
        <!-- /.container -->

    </div>
    <!-- COMPONENT AREA END -->
<?php endif; ?>
	
	<!-- BOTTOM ROW START  3 BOXES -->
<?php if ($this->countModules('bottom-a or bottom-b or bottom-c')) : ?>

	<div id="sk-bottom-row" >

        <div class="container">

            <div class="row">
                <div class="col-lg-12">
                    <div  class="col-<?php echo $baseGrid; ?>-4">
					<?php if ($this->countModules('bottom-a')) : ?>
						
							<jdoc:include type="modules" name="bottom-a" style="suffixOnce" />
						
					<?php endif; ?>
					</div>
					
					<div  class="col-<?php echo $baseGrid; ?>-4">
					<?php if ($this->countModules('bottom-b')) : ?>
						
							<jdoc:include type="modules" name="bottom-b" style="suffixOnce" />
						
					<?php endif; ?>
					</div>
					
					<div class="col-<?php echo $baseGrid; ?>-4">
					<?php if ($this->countModules('bottom-c')) : ?>
						
							<jdoc:include type="modules" name="bottom-c" style="suffixOnce" />
						
					<?php endif; ?>
					</div>
                </div>
            </div>

        </div>
        <!-- /.container -->

    </div>
<?php endif; ?>
    <!-- BOTTOM ROW END  -->

    <!-- BOTTOM INFO ROW START  4 BOXES -->
<?php if ($this->countModules('bottom-info-a or bottom-info-b or bottom-info-c or bottom-info-d')) : ?>

	<div id="sk-bottom-info" class="content-section-b">

        <div class="container">

            <div class="row">
                <div class="col-lg-12">
                    <div  class="col-<?php echo $baseGrid; ?>-3">
					<?php if ($this->countModules('bottom-info-a')) : ?>
						
							<jdoc:include type="modules" name="bottom-info-a" style="suffixOnce" />
						
					<?php endif; ?>
					</div>
					
					<div  class="col-<?php echo $baseGrid; ?>-3">
					<?php if ($this->countModules('bottom-info-b')) : ?>
						
							<jdoc:include type="modules" name="bottom-info-b" style="suffixOnce" />
						
					<?php endif; ?>
					</div>
					
					<div class="col-<?php echo $baseGrid; ?>-3">
					<?php if ($this->countModules('bottom-info-c')) : ?>
						
							<jdoc:include type="modules" name="bottom-info-c" style="suffixOnce" />
						
					<?php endif; ?>
					</div>
					
					<div class="col-<?php echo $baseGrid; ?>-3">
					<?php if ($this->countModules('bottom-info-d')) : ?>
						
							<jdoc:include type="modules" name="bottom-info-d" style="suffixOnce" />
						
					<?php endif; ?>
					</div>
                </div>
            </div>

        </div>
        <!-- /.container -->

    </div>
<?php endif; ?>
    <!-- BOTTOM INFO ROW END  -->

	</div>
	<!-- END MAIN CONTAINER WRAPPER -->
	
    <footer>
        <div id="sk-footer" class="container">
            <div class="row">
                <div class="col-lg-12">
                    <?php if ($this->countModules('footer')) : ?>
						
							<jdoc:include type="modules" name="footer" style="suffixOnce" />
							
						
					<?php endif; ?>
                    
                </div>
            </div>
        </div>
    </footer>

    <!-- JavaScript -->
					<?php if ($this->countModules('debug')) : ?>
							<div class=" debug col-xs-12" >
							<jdoc:include type="modules" name="debug" style="suffixOnce" />
							</div>
					<?php endif; ?>
					<?php if ($this->countModules('popup')) : ?>
							<div  class=" jcepopup popup col-xs-12" >
							<jdoc:include type="modules" name="popup" style="suffixOnce" />
							</div>
					<?php endif; ?>

   
</body>
 <script src="<?php  echo JURI::base(); ?>templates/<?php echo $this->template; ?>/js/bootstrap.js"></script>
					
</html>
