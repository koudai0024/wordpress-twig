<?php
namespace Inc\Init;

class Init
{
    public function __construct()
    {
        add_filter('show_admin_bar', '__return_false');
        add_action('after_setup_theme', array($this, 'setupTheme'));
    }

    public function setupTheme()
    {
        add_theme_support('title-tag');
    // アイキャッチ画像有効化.
        add_theme_support('post-thumbnails');
    // メニュー有効化.
        add_theme_support('menus');
    // HTML5サポート.
        add_theme_support('html5', array( 'comment-list', 'comment-form', 'search-form', 'gallery', 'caption'));
    }
}
new Init();
