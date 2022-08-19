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
    
    add_filter( 'woocommerce_account_menu_items', 'remove_my_account_links' );
    function remove_my_account_links( $menu_links ){
      unset( $menu_links[ 'downloads' ] ); // Disable Downloads
      unset( $menu_links[ 'edit-account' ] ); // Remove Account details tab
     
      return $menu_links;
    }

    add_filter( 'woocommerce_save_account_details_required_fields', 'misha_myaccount_required_fields' );
    
    function link_2(){
      $link = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
      return $link;
    }
    add_filter('woocommerce_add_to_cart_redirect', 'link_2');

    function misha_myaccount_required_fields( $account_fields ) {
      //unset( $account_fields[ 'account_last_name' ] );
      //unset( $account_fields[ 'account_first_name' ] ); // First name
      unset( $account_fields[ 'account_display_name' ] ); // Display name
      return $account_fields;
        
    }

    add_filter( 'woocommerce_default_address_fields', 'misha_remove_fields' );
    function misha_remove_fields( $fields ) {
      unset( $fields[ 'company' ] );
      unset( $fields[ 'state' ] );
      unset( $fields[ 'company' ][ 'required' ] );
      unset( $fields[ 'country' ][ 'required' ] );
      unset( $fields[ 'state' ][ 'required' ] );
      return $fields;
    }

    add_filter( 'woocommerce_default_address_fields', 'misha_change_fname_field' );
    function misha_change_fname_field( $fields ) {
      $fields[ 'first_name' ][ 'placeholder' ] = 'Digite seu nome';
      $fields[ 'last_name' ][ 'placeholder' ] = 'Digite seu sobrenome';
      $fields[ 'postcode' ][ 'placeholder' ] = 'Digite seu CEP';
      $fields[ 'postcode' ][ 'priority' ] = 30;
      $fields[ 'address_1' ][ 'label' ] = 'Logradouro';
      $fields[ 'address_1' ][ 'placeholder' ] = 'Rua e número';
      $fields[ 'address_2' ][ 'label' ] = 'Complemento';
      $fields[ 'address_2' ][ 'placeholder' ] = 'Complemento do seu endereço';
      $fields[ 'address_2' ][ 'label_class' ] = [];
      $fields[ 'address_2' ][ 'required' ] = true;
      $fields[ 'city' ][ 'placeholder' ] = 'Sua cidade';      
      $fields[ 'city' ][ 'class' ] = array( 'form-row-last' ); 
   
      return $fields;
    }

    add_filter( 'woocommerce_default_address_fields', 'misha_add_field' );
    function misha_add_field( $fields ) {
      
      $fields[ 'district' ]   = array(
        'label'        => 'Bairro',
        'required'     => true,
        'class'        => array( 'form-row-first', 'my-custom-class' ),
        'priority'     => 80,
        'placeholder'  => 'Seu bairro',
      );
      
      return $fields;
    }


    function custom_address_formats( $formats ) {
      $formats[ 'default' ]  = " <div class='nome-cep'> <p> {name} </p> <p> {postcode} </p> </div> <div class='enderecos'> {company} <p> {address_1} </p> <p> {address_2} </p> <p> {city} </p> </div>";
      return $formats;
    }
    add_filter('woocommerce_localisation_address_formats', 'custom_address_formats');

    // add Painel no menu_links para alterar o hiperlink
    add_filter ( 'woocommerce_account_menu_items', 'add_painel', 40 );
    function add_painel( $menu_links ){
      $menu_links = array( 'edit-account' => 'Painel' ) + array_slice( $menu_links, 1, 3, true );
      return $menu_links;
    }

?>