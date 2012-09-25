<?php
/**
* Elgg VeePlay Plugin
* @package veeplay
* @license http://www.gnu.org/licenses/old-licenses/gpl-2.0.html GNU Public License version 2
* @author Roger Grice
* @copyright 2012 DesignedbyRoger 
* @link http://DesignedbyRoger.com
* @version 1.8.3.3
*/

elgg_register_event_handler('init', 'system', 'veeplay_init');

function veeplay_init() {
	// Register jwplayer javascript
	$js_url = elgg_get_site_url() . 'mod/veeplay/player/jwplayer.js';
	elgg_register_js('veeplay', $js_url);
	// Extend system CSS with additional styles
	elgg_extend_view('css/elgg', 'veeplay/css');
  
  // need to load js on every page as we have no idea when
  // veeplay will be initiated
  elgg_load_js('veeplay');
  
  // register for embed extender parsing
  $embed = elgg_get_plugin_setting('embed_extender', 'veeplay');
  
  if ($embed != 'no') {
    elgg_register_plugin_hook_handler('embed_extender', 'custom_patterns', 'veeplay_embed_patterns');
    elgg_register_plugin_hook_handler('embed_extender', 'custom_embed', 'veeplay_embed');
  }
}

/**
 * Supplies a regex for embed_extender to use while parsing views
 * If a url matches our regex we'll embed a player
 * 
 * @param type $hook
 * @param type $type
 * @param type $return
 * @param type $params
 * @return string
 */
function veeplay_embed_patterns($hook, $type, $return, $params) {
  // localhost embeds
  $url = elgg_get_site_url() . 'file/view/';
  $parts = parse_url($url);
  $regex = '/(' . str_replace('/', '\/', $parts['scheme']) . ':\/\/)';
  $regex .= '(www\.)?';
  $regex .= '(' . str_replace('/', '\/', str_replace('.', '\.', $parts['host']));
  $regex .= str_replace('/', '\/', str_replace('.', '\.', $parts['path'])) . ')';
  $regex .= '(.*)/';
  
  if (!is_array($return)) {
    $return = array();
  }
  
  $return[] = $regex;
  return $return;
}

/**
 * Our regex matched a url, we need to replace the output with an embed
 * (if applicable)
 * 
 * @param type $hook
 * @param type $type
 * @param type $return
 * @param type $params
 */
function veeplay_embed($hook, $type, $return, $params) {
  $url = $params['url'];
  $guid = $params['guid'];
  $videowidth = $params['videowidth'];
  
  $regex = au_landing_get_localhost_embed_regex();
  if (preg_match($regex, $url)) {
    // get just the parts after the base url
    $file_url = str_ireplace(elgg_get_site_url(), "", $url);
  
    $parts = explode("/", $file_url);
    
    if (is_numeric($parts[2])) {
      $entity = get_entity($parts[2]);
      
      if ($entity && strpos($entity->mimetype, 'video') !== FALSE) {
        return elgg_view('file/specialcontent/video/default', array('entity' => $entity));
      }
      elseif ($entity && strpos($entity->mimetype, 'audio') !== FALSE) {
        return elgg_view('file/specialcontent/audio/default', array('entity' => $entity));
      }
    }
  }
  
  return $return;
}