<?php
namespace Inc\includeAssets;

class IncludeAssets
{
    public function __construct()
    {
        add_action('wp_enqueue_scripts', array($this, 'includeCss'));
    }
    
    public function includeCss()
    {
        if (! is_admin()) {
            wp_enqueue_style('style', get_template_directory_uri() . '/style.css', array(), '1');
        }
    }
}
new IncludeAssets();
