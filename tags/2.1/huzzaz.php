<?php
/*
Plugin Name: Huzzaz Video Gallery
Plugin URI: http://about.huzzaz.com/videogallery
Description: An awesome, easy to use YouTube and Vimeo video gallery powered by Huzzaz. Activate and use the shortcode: [huzzaz id="?" vpp="?" height="?" bg="?" color="?" button="?" highlight="?"]. Register at huzzaz.com/beta/join?src=wp to create a video collection. Visit the plugin site for more details.
Version: 2.1
Author: Huzzaz
Author URI: http://huzzaz.com
License: GPL2
*/

/*  Copyright 2013  James Yang  (email : james@huzzaz.com)

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

// [huzzaz id="collection ID" vpp="16" height="1700"]
function huzzaz_func( $atts ) {
	extract( shortcode_atts( array(
		'id' => 'infinitylist',
		'vpp' => '16',
		'height' => '1700',
        'bg' => '',
        'color' => '',
        'button' => '',
        'highlight' => '',
	), $atts ) );

	$gallery = '<div class="huzzazWrapper" style="width:100%; height: ' . $height . 'px; margin: 0 auto;"><iframe src="http://huzzaz.com/embed/' . $id . '?vpp=' . $vpp . '&bg=' . $bg . '&color=' . $color . '&button=' . $button . '&highlight=' . $highlight .'" height="100%" width="100%" frameborder="0" webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe></div>';

	return $gallery;
}
add_shortcode( 'huzzaz', 'huzzaz_func' );