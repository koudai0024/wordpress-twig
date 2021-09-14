<?php
namespace Inc\Init;

class Init
{
    public function __construct()
    {
        add_filter('show_admin_bar', '__return_false');
        add_action('after_setup_theme', array($this, 'setupTheme'));
        add_action('init', array($this, 'removeEement'));
        add_action('after_setup_theme', array($this, 'customMenu'));
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

    public function removeEement()
    {
        // WP REST API エンドポイントの削除.
        remove_action('template_redirect', 'rest_output_link_header', 11);
        // 絵文字用のスタイル削除.
        remove_action('wp_head', 'print_emoji_detection_script', 7);
        remove_action('admin_print_scripts', 'print_emoji_detection_script');
        remove_action('wp_print_styles', 'print_emoji_styles');
        remove_action('admin_print_styles', 'print_emoji_styles');
        remove_filter('the_content_feed', 'wp_staticize_emoji');
        remove_filter('comment_text_rss', 'wp_staticize_emoji');
        remove_filter('wp_mail', 'wp_staticize_emoji_for_email');
        // oembed機能の削除.
        remove_action('wp_head', 'rest_output_link_wp_head');
        remove_action('wp_head', 'wp_oembed_add_discovery_links');
        remove_action('wp_head', 'wp_oembed_add_host_js');
        // 外部投稿ツール用リンクの削除.
        remove_action('wp_head', 'rsd_link');
        remove_action('wp_head', 'wlwmanifest_link');
        // WordPress情報の削除.
        remove_action('wp_head', 'wp_generator');
    }

    public function customMenu()
    {
        register_nav_menus(
            array(
                'header'  => 'ヘッダーナビ',
            )
        );
    }
}
new Init();
