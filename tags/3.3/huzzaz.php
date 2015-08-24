<?php
/*
Plugin Name: Huzzaz Video Gallery
Plugin URI: http://about.huzzaz.com/videogallery
Description: An awesome, easy to use YouTube and Vimeo video gallery powered by Huzzaz. Activate and use the shortcode: [huzzaz id="?" vpp="?" height="?" bg="?" color="?" button="?" highlight="?"]. Register at huzzaz.com/beta/join?src=wp to create a video collection. Visit the plugin site for more details.
Version: 3.3
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
        'id' => 'huzzaz-videos',
        'vpp' => '16',
        'height' => '1700',
        'bg' => '',
        'color' => '',
        'button' => '',
        'highlight' => '',
        'pro' => 0,
        'layout' => '',
        'search' => '',
        'gicon' => '',
        'popoutlink' => 0,
        'linktext' => 'Click Me'
    ), $atts ) );

    if( !$pro )
        $gallery = '<div class="huzzazWrapper" style="width:100%; height: ' . $height . 'px; margin: 0 auto;"><iframe src="https://huzzaz.com/embed/' . $id . '?vpp=' . $vpp . '&bg=' . $bg . '&color=' . $color . '&button=' . $button . '&highlight=' . $highlight .'" height="100%" width="100%" frameborder="0" webkitAllowFullScreen mozallowfullscreen allowFullScreen allowTransparency="true"></iframe></div>';
    else {
        if ( !$popoutlink )
            $gallery = '<div class="huzzazWrapper" style="width:100%; height: ' . $height . 'px; margin: 0 auto;"><iframe src="https://huzzaz.com/proembed/' . $id . '?layout=' . $layout . '&vpp=' . $vpp . '&bg=' . $bg . '&color=' . $color . '&button=' . $button . '&highlight=' . $highlight . '&search=' . $search . '&gicon=' . $gicon . '" height="100%" width="100%" frameborder="0" webkitAllowFullScreen mozallowfullscreen allowFullScreen allowTransparency="true"></iframe></div>';
        else
            $gallery = '<a class="huzzazPopoutLink" onclick="window.open(\'https://huzzaz.com/proembed/' . $id . '?layout=popout' . '&search=' . $search . '\', \'newwindow\', \'width=1025, height=650\'); return false;" href="/' . $id . '">' . $linktext . '</a>';
    }
    return $gallery;
}
add_shortcode( 'huzzaz', 'huzzaz_func' );