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
// Processor for VIDEO media
// Load jwplayer javascript
elgg_load_js('veeplay');
// Set location variables
$swf_url = elgg_get_site_url() . 'mod/veeplay/player/player.swf';
$file_url = elgg_get_site_url() . 'file/download/'.$vars['file_guid'];
$view_url = elgg_get_site_url() . 'file/view/'.$vars['file_guid'];
// Set JW-Player options
$skin_url = "";
if($plugin_skin_typev = elgg_get_plugin_setting("skin_typev", "veeplay")){
$skins_home = elgg_get_site_url() . 'mod/veeplay/player/skins/';
switch ($plugin_skin_typev){
    case glow:
	$skin_url = $skins_home."glow/glow.xml";
        break;
    case blueratio:
	$skin_url = $skins_home."blueratio/blueratio.xml";
        break;
    case darksunset:
	$skin_url = $skins_home."darksunset/darksunset.xml";
        break;
    case grungetape:
	$skin_url = $skins_home."grungetape/grungetape.xml";
        break;
    case stijl:
	$skin_url = $skins_home."stijl/stijl.xml";
        break;
    default:// catches empty or unknown skins
	$skin_url = "";
        break;
	}
}
$widthv = '560';
if($plugin_video_wd = elgg_get_plugin_setting("video_wd", "veeplay")){
	$widthv = $plugin_video_wd;
}
$heightv = '315';
if($plugin_video_ht = elgg_get_plugin_setting("video_ht", "veeplay")){
	$heightv = $plugin_video_ht;
}
$autostartv = 'false';
if($plugin_video_start = elgg_get_plugin_setting("video_start", "veeplay")){
	$autostartv = $plugin_video_start;
}
$sharing = "";
if($plugin_med_sharing = elgg_get_plugin_setting("med_sharing", "veeplay")){
	if($plugin_med_sharing == 'on') {
	$sharing = 'sharing-3';
	}
}
// Go to DB and pull down filename data
$result = mysql_query("SELECT {$CONFIG->dbprefix}metastrings.string
FROM {$CONFIG->dbprefix}metastrings
LEFT JOIN {$CONFIG->dbprefix}metadata
ON {$CONFIG->dbprefix}metastrings.id = {$CONFIG->dbprefix}metadata.value_id
LEFT JOIN {$CONFIG->dbprefix}objects_entity
ON {$CONFIG->dbprefix}metadata.entity_guid = {$CONFIG->dbprefix}objects_entity.guid
WHERE ({$CONFIG->dbprefix}objects_entity.guid = '{$vars['file_guid']}') AND ({$CONFIG->dbprefix}metastrings.string LIKE 'file/%')");
// Check query ran and result is populated
if (!$result) {
// Query failed, return to origin page with error
	register_error(elgg_echo('veeplay:dbase:runerror'));
	forward(REFERER);
}
// Query worked but returned empty row, slightly unneccesary, but anyway...
if (mysql_num_rows($result) == 0) {
	register_error(elgg_echo('veeplay:dbase:notvalid'));
	forward(REFERER);
}
// Dump results into array
$row = mysql_fetch_array($result);
// Filename details
$ext = pathinfo($row['string'], PATHINFO_EXTENSION);
$filename = substr(pathinfo($row['string'], PATHINFO_FILENAME).".". pathinfo($row['string'], PATHINFO_EXTENSION),10);
// Full filename and path including entity guid
// JW-Player is not happy with token names. Have to point to real name
// to exploit player fallback features
$entity_guid = get_input("guid");
// Should we urlencode the filename?
$pathfile = $file_url."/".$filename;
if($plugin_encode = elgg_get_plugin_setting("encode", "veeplay")){
	if($plugin_encode == 'urlencode') {
		$pathfile = $file_url."/".urlencode($filename);
	}
	elseif($plugin_encode == 'rawurlencode') {
		$pathfile = $file_url."/".rawurlencode($filename);
	}
	else  {
		$pathfile = $file_url."/".$filename;
	}
}
?>
<!-- Place holder for JWPlayer-->
<div class="skin">
	<div name="mediaspace" id="mediaspace">
		<div class="VideoPlayer">
			<video
				id="mediaplayer01"
				height="<?php echo $heightv; ?>"
				width="<?php echo $widthv; ?>">
				<source src="<?php echo $pathfile;?>" />
			</video>
		</div>
<!-- Set options for JWPlayer -->
	<script type="text/javascript">
		jwplayer("mediaplayer01").setup({
			flashplayer: '<?php echo $swf_url; ?>',
			skin: '<?php echo $skin_url; ?>',
			autoplay:'<?php echo $autostartv;?>',
			plugins: {"<?php echo $sharing; ?>": {
				link: "<?php echo $view_url;?>"
				}  
			},
			controlbar: 'bottom'
		});
	</script>
	</div><!-- mediaspace -->
</div><!-- skin -->
