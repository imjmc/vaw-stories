<?php
/*
Plugin Name: YouTube Player
Plugin URI: http://www.patrickgarman.com/
Description: Adds a YouTube shortcode to your WordPress site so you can easily embed YouTube videos.
Version: 1.0
Author: Patrick Garman
Author URI: http://www.patrickgarman.com/
License: GPLv2
*/

/*  Copyright 2011  Patrick Garman  (email : patrickmgarman@gmail.com)

This program is free software; you can redistribute it and/or modify
it under the terms of the GNU General Public License, version 2, as 
published by the Free Software Foundation.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program; if not, write to the Free Software
Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/

add_action('plugins_loaded', 'init_youtube_player');
function init_youtube_player() { $youtube_player = new youtube_player; }

class youtube_player {
	
	function __construct() {
		add_shortcode('youtube', array(&$this,'shortcode'));
		$this->framework();
	}
	
	function shortcode($atts) {
		extract(shortcode_atts(array(
			'id' => 'PE1il5znICA',
			'width' => get_option('ytp_width'),
			'height' => get_option('ytp_height'),
		), $atts));
		$embed = '<iframe width="'.$width.'" height="'.$height.'" src="http://www.youtube.com/embed/'.$id.'" frameborder="0" allowfullscreen></iframe>';
		return $embed;

	}
	
	function options_page() { ?>
		<div class="wrap">
			<div id="icon-themes" class="icon32"></div>
			<h2>Customize YouTube Player</h2>
			<form action="options.php" method="post">
					<div class="postbox-container" style="width:70%;">
					<div class="metabox-holder">	
						<form action="options.php" method="post">
							<div id="settings">
								<div class="inside">
									<?php settings_fields('ytp'); ?>
									<?php do_settings_sections(basename(__FILE__,'.php')); ?>
								</div>
							</div>
							<p class="submit"><input type="submit" class="button-primary" value="Save Changes" /></p>
						</form>
					</div>
				</div>
				<div class="postbox-container" style="width:29%;">
					<div class="metabox-holder">	
						<div id="support">
							<h3><span>Need Help?</span></h3>
							<div class="inside">
								<p>If you have any questions or problems with the plugin please contact me using the link below. I will help you get everything in order as quickly as I can.</p>
								<p><a href="https://patrickgarman.zendesk.com/anonymous_requests/new" target="_blank">Submit a support ticket, bug report, feature request.</a></p>
							</div>
						</div> 
						<div id="like-links">
							<h3><span>Like This Plugin?</span></h3>
							<div class="inside">
								<p><a href="http://wordpress.org/extend/plugins/addremove-form-outlines/" target="_blank">Rate the plugin here.</a></p>
								<p><a href="http://www.patrickgarman.com/donate/" target="_blank">Say "Thanks!" with a donation.</a></p>
								<div style="float:left;height:62px;">
									<div style="float:left;margin-top:2px;margin-right:5px;"><g:plusone size="tall" href="http://www.patrickgarman.com/"></g:plusone></div>
									<div style="float:left;margin-right:5px;"><a href="http://twitter.com/share" class="twitter-share-button" data-url="http://www.patrickgarman.com/" data-text="Check out the awesome #WordPress #plugins @pmgarman is developing!" data-count="vertical" data-via="pmgarman">Tweet</a></div>
									<div style="float:left;margin-top:2px;">
<iframe src="http://www.facebook.com/plugins/like.php?href=http%3A%2F%2Fwww.patrickgarman.com%2F&amp;send=false&amp;layout=box_count&amp;width=50&amp;show_faces=false&amp;action=like&amp;colorscheme=light&amp;font&amp;height=90" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:50px; height:90px;" allowTransparency="true"></iframe>
									</div>
								</div><div style="clear:both;"></div>
								<p><a href="http://www.twitter.com/pmgarman" target="_blank"><img src="http://twitter-badges.s3.amazonaws.com/follow_me-a.png" alt="Follow pmgarman on Twitter"/></a></p>
								<p><a href="http://profiles.wordpress.org/users/patrickgarman/" target="_blank">More Plugins by Patrick Garman</a></p>
							</div>
							<script type="text/javascript" src="https://apis.google.com/js/plusone.js"></script>
							<script type="text/javascript" src="http://platform.twitter.com/widgets.js"></script>
						</div> 
						<div id="subscribe">
							<h3><span>Keep Updated via Email</span></h3>
							<div class="inside">
								<p>Keep up to date with the latest updates to this and other plugins via email. Just enter your email address below and click "Subscribe"</p>
								<form action="http://feedburner.google.com/fb/a/mailverify" method="post" target="popupwindow" onsubmit="window.open('http://feedburner.google.com/fb/a/mailverify?uri=PatrickGarman', 'popupwindow', 'scrollbars=yes,width=550,height=520');return true"><p><input type="text" style="width:110px" name="email"/><input type="submit" value="Subscribe" /></p><input type="hidden" value="PatrickGarman" name="uri"/><input type="hidden" name="loc" value="en_US"/></form>
								<p>PS. Your information will <strong>not</strong> be shared, sold, spammed, etc, etc, etc...</p>
							</div>
						</div> 
					</div>
				</div>
			</form>
		</div>
	<?php }

	function admin_menus() {
		add_options_page('Customize YouTube Player', 'YouTube Player', 'edit_theme_options', basename(__FILE__,'.php'), array(&$this,'options_page'));
	}
	
	function settings_main(){ echo '<p>Manage the options for your YouTube videos.</p>'; }
	function settings_ytp_width(){ $this->textbox('ytp_width','default width'); }
	function settings_ytp_height(){ $this->textbox('ytp_height','default height'); }

	function settings_list() {
		$settings = array(
			array(
				'display' => 'Default Width',
				'name' => 'ytp_width',
				'value' => 640,
			),
			array(
				'display' => 'Default Height',
				'name' => 'ytp_height',
				'value' => 390,
			),
		);
		return $settings;
	}
	
	function textbox($name,$hint) {
		echo '<input type="textbox" name="'.$name.'" value="'.get_option($name).'" />';
		echo '<em>('.$hint.')</em>';
	}
	
	function plugin_data($key){
		//[Name],[PluginURI],[Version],[Description] ,[Author],[AuthorURI],[TextDomain],[DomainPath],[Network],[Title],[AuthorName]
		$data = get_plugin_data(__FILE__);
		return $data[$key];
	}
	
	function settings_link($links) {
		$support_link = '<a href="https://patrickgarman.zendesk.com/" target="_blank">Support</a>';
		array_unshift($links, $support_link);
		$settings_link = '<a href="options-general.php?page='.basename(__FILE__,'.php').'">Settings</a>';
		array_unshift($links, $settings_link);
		return $links;
	}
	
	function on_activation(){
		$settings = $this->settings_list();
		foreach ($settings as $setting) {
			add_option($setting['name'], $setting['value']);
		}
	}
	
	function on_deactivation(){
		$settings = $this->settings_list();
		foreach ($settings as $setting) {
			delete_option($setting['name']);
		}
	}
	
	function register_settings() {
		$settings = $this->settings_list();
		add_settings_section('ytp_options', 'General Options', array(&$this,'settings_main'), basename(__FILE__,'.php'));
		foreach ($settings as $setting) {
			register_setting('ytp',$setting['name']);
			add_settings_field($setting['name'], $setting['display'], array(&$this,'settings_'.$setting['name']), basename(__FILE__,'.php'), 'ytp_options');
		}
	}

	function framework() {
		if (is_admin()) {
			add_action('admin_menu', array(&$this,'admin_menus'));
			add_filter('plugin_action_links_'.plugin_basename(__FILE__), array(&$this,'settings_link'));
		}
		add_action('admin_init', array(&$this, 'register_settings'));
		register_activation_hook(__FILE__, array(&$this, 'on_activation'));
		register_deactivation_hook(__FILE__, array(&$this, 'on_deactivation'));
	}


}