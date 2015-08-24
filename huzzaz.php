<?php
/*
Plugin Name: Huzzaz Video Gallery
Plugin URI: http://about.huzzaz.com/videogallery
Description: An awesome, easy to use YouTube and Vimeo video gallery powered by Huzzaz. Activate and use the shortcode: [huzzaz id="?" vpp="?" bg="?" color="?" button="?" highlight="?"]. Register at huzzaz.com/join?src=wp to create a video collection. Visit the plugin site for more details.
Version: 5.1
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

// [huzzaz id="collection ID" vpp="16"]
function huzzaz_func( $atts ) {
    extract( shortcode_atts( array(
        'id' => 'huzzaz-videos',
        'vpp' => '16',
        'bg' => '',
        'color' => '',
        'button' => '',
        'highlight' => '',
        'pro' => 0,
        'layout' => '',
        'search' => '',
        'gicon' => '',
        'titleoverlay' => '',
        'showvideos' => '',
        'arrows' => '',
        'autoplay' => '',
        'popoutlink' => 0,
        'linktext' => 'Click Me',
        'class' => 'huzzazWrapper'
    ), $atts ) );

    if( !$pro ) {
        $src = 'https://huzzaz.com/embed/' . $id . '?vpp=' . $vpp . '&bg=' . $bg . '&color=' . $color . '&button=' . $button . '&highlight=' . $highlight;
        $gallery = '<div class="' . esc_attr($class) . '"><iframe class="hzframe" src="' . esc_url($src) . '" height="100%" width="100%" frameborder="0" webkitAllowFullScreen mozallowfullscreen allowFullScreen allowTransparency="true"></iframe><script src="https://huzzaz.com/js/hzframe.js"></script></div>';
    } else {
        if ( !$popoutlink ) {
            if ( $layout != "card" ){
                $src = 'https://huzzaz.com/proembed/' . $id . '?layout=' . $layout . '&vpp=' . $vpp . '&bg=' . $bg . '&color=' . $color . '&button=' . $button . '&highlight=' . $highlight . '&search=' . $search . '&gicon=' . $gicon . '&titleoverlay=' . $titleoverlay . '&showvideos=' . $showvideos . '&arrows=' . $arrows . '&hzauto=' . $autoplay;
                $gallery = '<div class="' . esc_attr($class) . '"><iframe class="hzframe" src="' . esc_url($src) . '" height="100%" width="100%" frameborder="0" webkitAllowFullScreen mozallowfullscreen allowFullScreen allowTransparency="true"></iframe><script src="https://huzzaz.com/js/hzframe.js"></script></div>';
            } else {
                $src = 'https://huzzaz.com/proembed/' . $id . '?layout=' . $layout . '&vpp=' . $vpp . '&bg=' . $bg . '&color=' . $color . '&button=' . $button . '&highlight=' . $highlight . '&search=' . $search . '&gicon=' . $gicon . '&titleoverlay=' . $titleoverlay . '&showvideos=' . $showvideos . '&hzauto=' . $autoplay;
                $gallery = '<div class="' . esc_attr($class) . '" style="padding-bottom: 54.8%; position: relative; padding-top: 25px; height: 0; margin-bottom: 16px; overflow: hidden;"><iframe style="position: absolute; top: 0; left: 0;" src="' . esc_url($src) . '" height="100%" width="100%" frameborder="0" webkitAllowFullScreen mozallowfullscreen allowFullScreen allowTransparency="true"></iframe></div>';
            }
        }
        else {
            $href = 'https://huzzaz.com/proembed/' . $id . '?layout=popout' . '&search=' . $search . '&bg=' . $bg . '&color=' . $color . '&button=' . $button . '&highlight=' . $highlight . '&gicon=' . $gicon . '&titleoverlay=' . $titleoverlay . '&hzauto=' . $autoplay;
            $gallery = '<a class="huzzazPopoutLink" onclick="window.open(\'' . esc_url($href) . '\', \'newwindow\', \'scrollbars=1,width=1025, height=650\'); return false;" href="' . esc_url($href) . '">' . esc_html($linktext) . '</a>';
        }
    }
    return $gallery;
}
add_shortcode( 'huzzaz', 'huzzaz_func' );