

<?php
    function meu_estilo_css(){
        add_theme_support('woocommerce');
        add_theme_support('woof');
      }
      
      add_action('after_setup_theme', 'meu_estilo_css');
      
      function woof_css(){
        wp_register_style('woof', get_template_directory_uri() . '/' . 'style.css', [], '1.0.0');
        wp_enqueue_style('woof', get_template_directory_uri() . '/' . 'style.css', [], '1.0.0');
      }
      add_action( 'wp_enqueue_scripts', 'woof_css');

    function resgistrar_menu(){
        register_nav_menu('menu-categorias', 'menu categorias');
    }
    add_action('init', 'resgistrar_menu');
    
?>