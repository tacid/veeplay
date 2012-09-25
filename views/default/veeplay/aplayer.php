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
// Processor for AUDIO media
// Load jwplayer javascript
elgg_load_js('veeplay');
// Set location variables
$swf_url = elgg_get_site_url() . 'mod/veeplay/player/player.swf';
$file_url = elgg_get_site_url() . 'file/download/'.$vars['file_guid'];
$view_url = elgg_get_site_url() . 'file/view/'.$vars['file_guid'];
// Set JW-Player options
$skin_url = "";
if($plugin_skin_typea = elgg_get_plugin_setting("skin_typea", "veeplay")){
$skins_home = elgg_get_site_url() . 'mod/veeplay/player/skins/';
switch ($plugin_skin_typea){
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
$visual_plugin = '';
if($plugin_audio_effect = elgg_get_plugin_setting("audio_effect", "veeplay")){
	if($plugin_audio_effect == 'equal') {
	$visual_plugin = 'subeq-1';
	}
	elseif($plugin_audio_effect == 'visual') {
	$visual_plugin = 'revolt-1';
	}
	else  {
	$visual_plugin = '';
	}
}
$widtha = '560';
if($plugin_audio_wd = elgg_get_plugin_setting("audio_wd", "veeplay")){
	$widtha = $plugin_audio_wd;
}
$heighta = '315';
if($plugin_audio_ht = elgg_get_plugin_setting("audio_ht", "veeplay")){
	$heighta = $plugin_audio_ht;
}
$autostarta = 'false';
if($plugin_audio_start = elgg_get_plugin_setting("audio_start", "veeplay")){
	$autostarta = $plugin_audio_start;
}
$sharing = "";
if($plugin_med_sharing = elgg_get_plugin_setting("med_sharing", "veeplay")){
	if($plugin_med_sharing == 'on') {
	$sharing = 'sharing-3';
	}
}
// Go to the DB and pull down the original media filename
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
		<div class="AudioPlayer">
			<video
				id="mediaplayer02"
				height="<?php echo $heighta; ?>"
				width="<?php echo $widtha; ?>">
				<source src="<?php echo $pathfile;?>" />
			</video>
		</div>
<!-- Set options for JWPlayer -->
	<script type="text/javascript">
		jwplayer("mediaplayer02").setup({
			flashplayer: '<?php echo $swf_url; ?>',
			skin: '<?php echo $skin_url; ?>',
			autoplay:'<?php echo $autostarta;?>',
			plugins: { "<?php echo $sharing; ?>": {
				link: "<?php echo $file_url;?>"
				},"<?php echo $visual_plugin;?>": {}
			},
			controlbar: 'bottom'
		});
	</script>
	</div><!-- mediaspace -->
</div><!-- skin -->
