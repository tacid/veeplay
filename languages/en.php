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
// English language file
$english = array(
		// Processing errors
		'veeplay:dbase:runerror' => "Error opening file",
		'veeplay:dbase:notvalid' => "File is an unknown type",
		// Skin options
		'veeplay:skin:options' => "VeePlay uses JW Player (http://www.longtailvideo.com) for both video and audio playback.<br /><br /><p>Make sure that any other audio or video players are disabled while VeePlay is enabled. Also make sure that the plugin <em>File</em> is installed, enabled and above VeePlay. Although VeePlay attempts to play as many filetypes as possible, automagically falling back to either flash or HTML5, the matrix of filetypes to browsers successfully playing all filetypes is improving but still incomplete.<br /><p>I made this for my own benefit. Use it at your own risk - I make no guarantees. It has been tested in the latest (Linux) versions of Firefox, Chrome/Chromium and Opera using Elgg 1.8.3.<br /><p>Enjoy.",
		'veeplay:skin:title' => "Skins",
		'veeplay:skin:skins' => "The following skins are available. You can apply these skins to either the video player or the audio player, independently.",
		'veeplay:skin:skina' => "Select the AUDIO skin you wish to apply:",
		'veeplay:skin:skinv' => "Select the VIDEO skin you wish to apply:",
		'veeplay:skin:default' => "Default",
		'veeplay:skin:glow' => "Glow",
		'veeplay:skin:blueratio' => "Blue Ratio",
		'veeplay:skin:darksunset' => "Dark Sunset",
		'veeplay:skin:grungetape' => "Grunge Tape",
		'veeplay:skin:stijl' => "Stijl",
		// Effect options
		'veeplay:effect:on' => "Visualization effect",
		'veeplay:effect:off' => "Without effect (H23xW560)",
		'veeplay:effect:visual' => "Audio Visual Effects",
		'veeplay:effect:select' => "Select audio visualization to Visualizer, Equalizer or Off:",
		'veeplay:effect:desc' => "Graphic effects are available for the audio player, a Visualization effect and an Equalizer effect. Only one of these can be set at a time. The effects can be set independently from the player size. This means it is possible to set the effects on with a minimized control bar. If you set the set the control bar to minimum height (23), switch off effects to save bandwidth.<br />These effects do not display in video mode.",
		'veeplay:effect:eq' => "Equalizer effect",
		'veeplay:effect:equalon' => "Equalizer",
		'veeplay:effect:visualon' => "Visualization",
		// Size options
		'veeplay:player:size:desc' => "The default player window size is H315 W560. The height for the audio control bar without visualization is H23. You can set height and width to any value you desire.<p>The height and width of both the video and audio player can be set independently.<p><em>Note, if you select audio control bar to H23, it makes no sense to keep visualization set to on.</em>",
		'veeplay:player:size' => "Player Size",
		'veeplay:audio:size' => "Select audio player size (Default H315 x W560):",
		'veeplay:audio:size:height' => "Audio player height",
		'veeplay:audio:size:width' => "Audio player width",
		'veeplay:video:size' => "Select video player size (Default H315 x W560):",
		'veeplay:video:size:height' => "Video player height",
		'veeplay:video:size:width' => "Video player width",
		'veeplay:size:option' => "Note: To reset the height and width to default, empty the fields and save.",
		// Options
		'veeplay:yes' => "Yes",
		'veeplay:no' => "No",
		'veeplay:on' => "On",
		'veeplay:off' => "Off",
		// Screen size image
		'veeplay:screen' => "Different screen sizes, for reference.",
		// Autoplay
		'veeplay:autoplay:autoplay' => "Autoplay/Autostart",
		'veeplay:autoplay:desc' => "Both the video and audio players can be independently set to start automatically or require the user to manually start the media file. By default, autoplay/autostart is set to <em>Off</em>.",
		'veeplay:autoplay:audio' => "Select Autoplay for Audio files:",
		'veeplay:autoplay:video' => "Select Autoplay for Video files:",
		'veeplay:autoplay:off' => "Off",
		'veeplay:autoplay:on' => "On",
		// Sharing
		'veeplay:share:share' => "Select share function ON or OFF.<br />This affects both the audio and video player simultaneously:",
		'veeplay:share:sharing' => "Sharing",
		// Encoding
		'veeplay:rawurlencode' => "Rawencode",
		'veeplay:urlencode' => "Encode",
		'veeplay:encoding:desc' => "Some browser/player combinations fail to play media files with spaces in the file name. If you have this problem, try selecting one of these options. By default, URL Encoding is set to <em>Off</em>.<br /><br /><em><b>encode:</b></em> This option returns a filename in which all non-alphanumeric characters except <em>-_.</em> have been replaced with a percent (%) sign followed by two hex digits and spaces encoded as plus (+) signs. This differs from the » RFC 3986 encoding (see rawencode) in that for historical reasons, spaces are encoded as plus (+) signs.<br /><em><b>rawencode:</b></em> This option returns the file name in which all non-alphanumeric characters except
   <em>-_.~</em> have been replaced with a percent
   (<em>%</em>) sign followed by two hex digits.  This is the
   encoding described in RFC 3986.",
		'veeplay:encode:encoding' => "Select URL encode function to: Encode, Rawencode or OFF.<br />This affects both the audio and video player simultaneously:",
		'veeplay:encode:encode' => "URL Encoding",
);
add_translation("en", $english);
