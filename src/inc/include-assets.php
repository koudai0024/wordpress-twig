<?php
namespace Inc\includeAssets;

class IncludeAssets
{
    public function __construct()
    {
        add_action('wp_enqueue_scripts', array($this, 'includeCss'));
        add_action('wp_enqueue_scripts', array($this, 'includeJs'));
    }
    
    public function includeCss()
    {
        if (! is_admin()) {
            wp_enqueue_style('style', get_template_directory_uri() . '/style.css', array(), '1');
        }
    }

    public function includeJs()
    {
        if (! is_admin()) {
            wp_deregister_script('jquery');
            wp_enqueue_script('main-sctipt', get_template_directory_uri() . '/assets/js/main.js', array( 'jquery' ), '1', true);
        }
    }
}
new IncludeAssets();
