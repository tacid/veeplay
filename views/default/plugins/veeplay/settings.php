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
// Back-end settings
// Set Defaults
if (!isset($vars['entity']->encode)) {
	$vars['entity']->encode = 'off';
	}
if (!isset($vars['entity']->skin_typea)) {
	$vars['entity']->skin_typea = 'default';
	}
if (!isset($vars['entity']->skin_typev)) {
	$vars['entity']->skin_typev = 'default';
	}
if (!isset($vars['entity']->audio_effect)) {
	$vars['entity']->audio_effect = 'off';
	}
if (!isset($vars['entity']->audio_wd)) {
	$vars['entity']->audio_wd = '560';
	}
if (!isset($vars['entity']->audio_ht)) {
	$vars['entity']->audio_ht = '315';
	}
if (!isset($vars['entity']->video_wd)) {
	$vars['entity']->video_wd = '560';
	}
if (!isset($vars['entity']->video_ht)) {
	$vars['entity']->video_ht = '315';
	}
if (!isset($vars['entity']->video_start)) {
	$vars['entity']->video_start = 'false';
	}
if (!isset($vars['entity']->audio_start)) {
	$vars['entity']->audio_start = 'false';
	}
if (!isset($vars['entity']->med_sharing)) {
	$vars['entity']->med_sharing = 'off';
	}
echo elgg_echo("veeplay:skin:options") . '<br /><br />';
echo '<p style="padding-bottom:20px;border-bottom:solid 1px #999999;width:100%;">';
// Setup option for urlencoding
echo "<p><label style='color:#304ebd;text-decoration:underline;text-transform:uppercase;'>" . elgg_echo("veeplay:encode:encode") . "</label></p>";
echo elgg_echo("veeplay:encoding:desc") . '<p>';
echo "<br /><label>" . elgg_echo("veeplay:encode:encoding") . "</label><p>";
echo '<div style="margin-left:25px;">';
echo elgg_view('input/dropdown', array(
	'name' => 'params[encode]',
	'options_values' => array(
		'urlencode' => elgg_echo('veeplay:urlencode'),
		'rawurlencode' => elgg_echo('veeplay:rawurlencode'),
		'off' => elgg_echo('veeplay:off')
	),
	'value' => $vars['entity']->encode,
));
echo '<div style="margin-top:15px;text-align:center;">';
echo '<input type="submit" value="'.elgg_echo('save').'" class="elgg-button elgg-button-submit" /></div>';
echo '</div><p style="padding-bottom:20px;border-bottom:solid 1px #999999;width:100%;">';
// Setup option for autostart
echo "<p><label style='color:#304ebd;text-decoration:underline;text-transform:uppercase;'>" . elgg_echo("veeplay:autoplay:autoplay") . "</label></p>";
echo elgg_echo("veeplay:autoplay:desc") . '<p>';
echo "<br /><label>" . elgg_echo("veeplay:autoplay:audio") . "</label><p>";
echo '<div style="margin-left:25px;">';
echo elgg_view('input/dropdown', array(
	'name' => 'params[audio_start]',
	'options_values' => array(
		'false' => elgg_echo('veeplay:autoplay:off'),
		'true' => elgg_echo('veeplay:autoplay:on')
	),
	'value' => $vars['entity']->audio_start,
));
echo "<p></div>";
echo "<p><label>" . elgg_echo("veeplay:autoplay:video") . "</label><p>";
echo '<div style="margin-left:25px;">';
echo elgg_view('input/dropdown', array(
	'name' => 'params[video_start]',
	'options_values' => array(
		'false' => elgg_echo('veeplay:autoplay:off'),
		'true' => elgg_echo('veeplay:autoplay:on')
	),
	'value' => $vars['entity']->video_start,
));
echo '<div style="margin-top:15px;text-align:center;">';
echo '<input type="submit" value="'.elgg_echo('save').'" class="elgg-button elgg-button-submit" /></div>';
echo '</div><p style="padding-bottom:20px;border-bottom:solid 1px #999999;width:100%;">';
echo "<p><label style='color:#304ebd;text-decoration:underline;text-transform:uppercase;'>" . elgg_echo("veeplay:skin:title") . "</label><p>";
echo elgg_echo("veeplay:skin:skins") . "<p>";
echo '<div><div style="float:left;width:277px;font-size:110%;text-align:center;margin:0 10px 0 0;"><img src="' . elgg_get_site_url() . 'mod/veeplay/graphics/default.jpg" style="border:0;height:166px;width:277px;padding-bottom:0.5em;" alt="'.elgg_echo("veeplay:skin:default").'" />'.elgg_echo("veeplay:skin:default").'</div><div style="float:left;width:277px;font-size:110%;text-align:center;margin:0 10px 0 0;"><img src="'. elgg_get_site_url() . 'mod/veeplay/graphics/glow.jpg" style="border:0;height:166px;width:277px;padding-bottom:0.5em;" alt="'.elgg_echo("veeplay:skin:glow").'" />'.elgg_echo("veeplay:skin:glow").'</div>
<div style="float:left;width:277px;font-size:110%;text-align:center;margin:0 10px 0 0;"><img src="'. elgg_get_site_url() . 'mod/veeplay/graphics/blueratio.jpg" style="border:0;height:166px;width:277px;padding-bottom:0.5em;" alt="'.elgg_echo("veeplay:skin:blueratio").'" />'.elgg_echo("veeplay:skin:blueratio").'</div>
<div style="float:left;width:277px;font-size:110%;text-align:center;margin:0 10px 0 0;"><img src="'. elgg_get_site_url() . 'mod/veeplay/graphics/darksunset.jpg" style="border:0;height:166px;width:277px;padding-bottom:0.5em;" alt="'.elgg_echo("veeplay:skin:darksunset").'" />'.elgg_echo("veeplay:skin:darksunset").'</div>
<div style="float:left;width:277px;font-size:110%;text-align:center;margin:0 10px 0 0;"><img src="'. elgg_get_site_url() . 'mod/veeplay/graphics/grungetape.jpg" style="border:0;height:166px;width:277px;padding-bottom:0.5em;" alt="'.elgg_echo("veeplay:skin:grungetape").'" />'.elgg_echo("veeplay:skin:grungetape").'</div>
<div style="float:left;width:277px;font-size:110%;text-align:center;margin:0 10px 0 0;"><img src="'. elgg_get_site_url() . 'mod/veeplay/graphics/stijl.jpg" style="border:0;height:166px;width:277px;padding-bottom:0.5em;" alt="'.elgg_echo("veeplay:skin:stijl").'" />'.elgg_echo("veeplay:skin:stijl").'</div>
</div><p style="clear:both;"><p>';
// Setup option for A&V skins
echo "<label>" . elgg_echo("veeplay:skin:skina") . "</label><p>";
echo '<div style="margin-left:25px;">';
echo elgg_view('input/dropdown', array(
	'name' => 'params[skin_typea]',
	'options_values' => array(
		'default' => elgg_echo('veeplay:skin:default'),
		'glow' => elgg_echo('veeplay:skin:glow'),
		'blueratio' => elgg_echo('veeplay:skin:blueratio'),
		'darksunset' => elgg_echo('veeplay:skin:darksunset'),
		'grungetape' => elgg_echo('veeplay:skin:grungetape'),
		'stijl' => elgg_echo('veeplay:skin:stijl')
	),
	'value' => $vars['entity']->skin_typea,
));
echo '<p></div>';
echo "<p><label>" . elgg_echo("veeplay:skin:skinv") . "</label><p>";
echo '<div style="margin-left:25px;">';
echo elgg_view('input/dropdown', array(
	'name' => 'params[skin_typev]',
	'options_values' => array(
		'default' => elgg_echo('veeplay:skin:default'),
		'glow' => elgg_echo('veeplay:skin:glow'),
		'blueratio' => elgg_echo('veeplay:skin:blueratio'),
		'darksunset' => elgg_echo('veeplay:skin:darksunset'),
		'grungetape' => elgg_echo('veeplay:skin:grungetape'),
		'stijl' => elgg_echo('veeplay:skin:stijl')
	),
	'value' => $vars['entity']->skin_typev,
));
echo '<div style="margin-top:15px;text-align:center;">';
echo '<input type="submit" value="'.elgg_echo('save').'" class="elgg-button elgg-button-submit" /></div>';
echo '</div><p style="padding-bottom:20px;border-bottom:solid 1px #999999;width:100%;">';
// Setup option for sharing
echo "<p><label style='color:#304ebd;text-decoration:underline;text-transform:uppercase;'>" . elgg_echo("veeplay:share:sharing") . "</label><p>";
echo '<div><div style="float:left;width:277px;font-size:110%;text-align:center;margin:0 10px 0 0;"><img src="' . elgg_get_site_url() . 'mod/veeplay/graphics/share2.jpg" style="border:0;height:166px;width:277px;padding-bottom:0.5em;" alt="'.elgg_echo("veeplay:share:sharing").'" />'.elgg_echo("veeplay:share:sharing").'</div><div style="float:left;width:277px;font-size:110%;text-align:center;margin:0 10px 0 0;"><img src="'. elgg_get_site_url() . 'mod/veeplay/graphics/share.jpg" style="border:0;height:166px;width:277px;padding-bottom:0.5em;" alt="'.elgg_echo("veeplay:share:sharing").'" />'.elgg_echo("veeplay:share:sharing").'</div></div><p style="clear:both;"><p>';
echo "<label>" . elgg_echo("veeplay:share:share") . "</label><p>";
echo '<div style="margin-left:25px;">';
echo elgg_view('input/dropdown', array(
	'name' => 'params[med_sharing]',
	'options_values' => array(
		'on' => elgg_echo('veeplay:on'),
		'off' => elgg_echo('veeplay:off')
	),
	'value' => $vars['entity']->med_sharing,
));
echo '<div style="margin-top:15px;text-align:center;">';
echo '<input type="submit" value="'.elgg_echo('save').'" class="elgg-button elgg-button-submit" /></div>';
echo '</div><p style="padding-bottom:20px;border-bottom:solid 1px #999999;width:100%;">';
// Setup Visualization option
echo "<p><p><label style='color:#304ebd;text-decoration:underline;text-transform:uppercase;'>" . elgg_echo("veeplay:effect:visual") . "</label><p>";
echo elgg_echo("veeplay:effect:desc") . "<p>";
echo '<div><div style="float:left;width:277px;font-size:110%;text-align:center;margin:0 10px 0 0;"><img src="' . elgg_get_site_url() . 'mod/veeplay/graphics/effect.jpg" style="border:0;height:166px;width:277px;padding-bottom:0.5em;" alt="'.elgg_echo("veeplay:effect:on").'" />'.elgg_echo("veeplay:effect:on").'
</div><div style="float:left;width:277px;font-size:110%;text-align:center;margin:0 10px 0 0;"><img src="'. elgg_get_site_url() . 'mod/veeplay/graphics/equal.jpg" style="border:0;height:166px;width:277px;padding-bottom:0.5em;" alt="'.elgg_echo("veeplay:effect:eq").'" />'.elgg_echo("veeplay:effect:eq").'</div><p style="clear:both;">';
echo '<div><div style="float:left;width:560px;font-size:110%;text-align:center;margin:0 10px 0 0;"><img src="'. elgg_get_site_url() . 'mod/veeplay/graphics/noeffect.jpg" style="border:0;height:23px;width:560px;padding-bottom:0.5em;" alt="'.elgg_echo("veeplay:effect:off").'" />'.elgg_echo("veeplay:effect:off").'</div>
</div><p style="clear:both;"><p>';
echo "<label>" . elgg_echo("veeplay:effect:select") . "</label><p>";
echo '<p><div style="margin-left:25px;">';
echo elgg_view('input/dropdown', array(
	'name' => 'params[audio_effect]',
	'options_values' => array(
		'equal' => elgg_echo('veeplay:effect:equalon'),
		'visual' => elgg_echo('veeplay:effect:visualon'),
		'off' => elgg_echo('veeplay:off')
	),
	'value' => $vars['entity']->audio_effect,
));
echo '<div style="margin-top:15px;text-align:center;">';
echo '<input type="submit" value="'.elgg_echo('save').'" class="elgg-button elgg-button-submit" /></div>';
echo '</div><p style="padding-bottom:20px;border-bottom:solid 1px #999999;width:100%;">';
// Setup A&V screens height and width 
echo '<p>';
echo "<label style='color:#304ebd;text-decoration:underline;text-transform:uppercase;'>" . elgg_echo("veeplay:player:size") . "</label><p>";
echo elgg_echo("veeplay:player:size:desc") . "<p>";
echo "<label>" . elgg_echo("veeplay:video:size") . "</label><p>";
echo '<div style="float:left;width:50px;margin:0 10px 0 0;height:35px;padding-left:25px;">';
echo elgg_view('input/text', array(
	'name' => 'params[video_ht]',
	'class' => 'veeplay-admin-input',
	'value' => $vars['entity']->video_ht,
));
echo '</div><div style="float:left;width:400px;margin:6px 0 0 20px;"><label>'. elgg_echo("veeplay:video:size:height") .'</label></div><p style="clear:both;"><p>';
echo '<div style="float:left;width:50px;margin:0 10px 0 0;height:35px;padding-left:25px;">';
echo elgg_view('input/text', array(
	'name' => 'params[video_wd]',
	'class' => 'veeplay-admin-input',
	'value' => $vars['entity']->video_wd,
));
echo '</div><div style="float:left;width:400px;margin:6px 0 0 20px;"><label>'. elgg_echo("veeplay:video:size:width") .'</label></div><p style="clear:both;"><p>';
echo "<label>" . elgg_echo("veeplay:audio:size") . "</label><p>";
echo '<div style="float:left;width:50px;margin:0 10px 0 0;height:35px;padding-left:25px;">';
echo elgg_view('input/text', array(
	'name' => 'params[audio_ht]',
	'class' => 'veeplay-admin-input',
	'value' => $vars['entity']->audio_ht,
));
echo '</div><div style="float:left;width:400px;margin:6px 0 0 20px;"><label>'. elgg_echo("veeplay:audio:size:height") .'</label></div><p style="clear:both;"><p>';
echo '<div style="float:left;width:50px;margin:0 10px 0 0;height:35px;padding-left:25px;">';
echo elgg_view('input/text', array(
	'name' => 'params[audio_wd]',
	'class' => 'veeplay-admin-input',
	'value' => $vars['entity']->audio_wd,
));
echo '</div><div style="float:left;width:400px;margin:6px 0 0 20px;"><label>'. elgg_echo("veeplay:audio:size:width") .'</label></div><p style="clear:both;"><p>';
echo "<em>" . elgg_echo("veeplay:size:option") . "</em><p>";
// Show an image of reference screen sizes
echo '<div style="float:right;width:587px;font-size:110%;text-align:center;margin:0 10px 0 0;"><img src="'. elgg_get_site_url() . 'mod/veeplay/graphics/screens.jpg" style="border:0;height:355px;width:587px;padding-bottom:0.5em;" alt="'.elgg_echo("veeplay:screen").'" /><br />'.elgg_echo("veeplay:screen").'</div><p style="clear:both;">';
