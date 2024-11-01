<?php
/*
Plugin Name: Skysa Twitter Follow App
Plugin URI: http://wordpress.org/extend/plugins/skysa-twitter-follow-app
Description: Allows your site visitors to follow your twitter account with one click, without leaving your site.
Version: 1.4
Author: Skysa
Author URI: http://www.skysa.com
*/

/*
*************************************************************
*                 This app was made using the:              *
*                       Skysa App SDK                       *
*    http://wordpress.org/extend/plugins/skysa-app-sdk/     *
*************************************************************
This program is free software; you can redistribute it and/or
modify it under the terms of the GNU General Public License
as published by the Free Software Foundation; either version 2
of the License, or (at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program; if not, write to the Free Software
Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston,
MA  02110-1301, USA.
*/

// Make sure we don't expose any info if called directly
if ( !function_exists( 'add_action' ) ) exit;

// Skysa App plugins require the skysa-req subdirectory,
// and the index file in that directory to be included.
// Here is where we make sure it is included in the project.
include_once dirname( __FILE__ ) . '/skysa-required/index.php';


// TWITTER FOLLOW APP
$GLOBALS['SkysaApps']->RegisterApp(array( 
    'id' => '5026c97789c72',
    'label' => 'Twitter Follow',
	'options' => array(
		'option1' => array( // key is the field name
            'label' => 'Twitter Account to Follow',
			'info' => 'What is the Twitter account username you wish to promote?',
			'type' => 'text',
			'value' => '',
			'size' => '50|1'
		),
        'option2' => array(
            'label' => 'Show follower count?',
			'type' => 'selectbox',
			'value' => 'Yes|No',
			'size' => '10|1'
        ),
        'option4' => array(
            'label' => 'Button Language',
            'info' => 'English (en), French (fr), German (de), Italian (it), Spanish (es), Korean (ko) and Japanese (ja)',
			'type' => 'selectbox',
			'value' => 'en|fr|de|it|es|ko|ja',
			'size' => '10|1'
        )
	), 
    'fvars' => array(
        'count' => 'skysa_app_twitter_follow_fvar_count'
    ),
    'html' => '<div style="padding-left: 3px;" class="SKYUI-Mod-TwitterFollow-Button-holder"><span class="SKYUI-Mod-TwitterFollow-Button"><iframe allowtransparency="true" frameborder="0" scrolling="no" src="//platform.twitter.com/widgets/follow_button.html?screen_name=$app_option1&show_count=#fvar_count&button=blue&lang=$app_option4" style="width:300px; height:20px;"></iframe></span></div>',
    'js' => "
        S.load('cssStr','.SKYUI-Mod-TwitterFollow-Button-holder, .SKYUI-Mod-TwitterFollow-Button-holder iframe {width: '+('\$app_option2' != 'No' ? '300' : '200')+'px !important; text-align: center;} .SKYUI-Mod-TwitterFollow-Button iframe {margin: 5px auto 0 auto}',true);
     "
));

function skysa_app_twitter_follow_fvar_count($rec){
    if($rec['option2'] != 'No'){
        return 'true';
    }
    return 'false';
}

?>