<?php
    function meu_estilo_css(){
        add_theme_support('woocommerce');
        add_theme_support('woof');
      }
      
      add_action('after_setup_theme', 'meu_estilo_css');
      
      function woof_css(){
        wp_register_style('woof', get_template_directory_uri() . '/' . 'style.css', [], '1.0.0');
        wp_enqueue_style('woof', get_template_directory_uri() . '/' . 'style.css', [], '1.0.0');
        wp_enqueue_script('script', get_template_directory_uri() . '/header-script.js', ['jquery'], '1.0', true);
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

    function transforma_menu($itens){
      foreach($itens as $item){
        $thumbnail_id = get_term_meta($item->object_id, 'thumbnail_id', true);
        $image = wp_get_attachment_url($thumbnail_id);
        $css = 'background-image: url('. $image .')';
        $item->title = 
        '<div class="Categoria-content" style="'. $css .';">
          <div class="Categoria-titulo">
            <p class="Title">'.$item->title.'</p>
          </div>
        </div>';
      }
      return $itens;
    }
    add_filter('wp_nav_menu_objects', 'transforma_menu');

    require "inc/exibir-produtos.php";
    
    add_filter( 'woocommerce_account_menu_items', 'misha_remove_my_account_links' );

    function misha_remove_my_account_links( $menu_links ){
      unset( $menu_links[ 'downloads' ] ); // Disable Downloads
      unset( $menu_links[ 'edit-account' ] ); // Remove Account details tab
     
      return $menu_links;
    }



    add_filter( 'woocommerce_save_account_details_required_fields', 'misha_myaccount_required_fields' );
    function misha_myaccount_required_fields( $account_fields ) {
      unset( $account_fields[ 'account_last_name' ] );
      unset( $account_fields[ 'account_first_name' ] ); // First name
      unset( $account_fields[ 'account_display_name' ] ); // Display name
      return $account_fields;
        
    }

?>