

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
    
    function dia(){
      $diasemana = array('Domingo', 'Segunda', 'Terça', 'Quarta', 'Quinta', 'Sexta', 'Sabado');
      $data = date('Y-m-d');
      $diasemana_numero = date('w', strtotime($data));
      // $diasdasemana_slug = array (1 => "Segunda-Feira",2 => "Terça-Feira",3 => "Quarta-Feira",4 => "Quinta-Feira",5 => "Sexta-Feira",6 => "Sábado",0 => "Domingo"); 
      return $diasemana[$diasemana_numero];
    }
    function dia_slug(){
      $diasemana = array('domingo', 'segunda', 'terca', 'quarta', 'quinta', 'sexta', 'sabado');
      $data = date('Y-m-d');
      $diasemana_numero = date('w', strtotime($data));
      // $diasdasemana_slug = array (1 => "Segunda-Feira",2 => "Terça-Feira",3 => "Quarta-Feira",4 => "Quinta-Feira",5 => "Sexta-Feira",6 => "Sábado",0 => "Domingo"); 
      return $diasemana[$diasemana_numero];
    }

    function produtos_em_promocao($quantidade){
      $dia = dia_slug();
      $args  = [
        'limit' => $quantidade,
        'orderby' => 'date',
        'order' => 'DESC',
        'tag' => $dia
      ];
      return wc_get_products($args);
    }

    require "inc/exibir-produtos.php";
    


?>