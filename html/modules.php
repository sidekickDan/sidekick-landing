<?php
// No direct access.
defined('_JEXEC') or die;



  function modChrome_suffixOnce( $module, &$params, &$attribs ) {
    
    echo '<div class="' .$params->get( 'moduleclass_sfx' ) .'" >';
 
    if ($module->showtitle) 
    {
      echo '<h2>' . $module->title . '</h2>';
    }
 
    echo '<div class="content-box">';
    echo $module->content;
	echo '</div>';
    echo '</div>';
  }
?>
