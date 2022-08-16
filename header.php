<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php bloginfo("name") ?></title>
    <?php wp_head(); ?>
</head>
<body>
    <header>
        <div id="content-box-h">
            <div id="left-box-h">
                <img src="<?php echo get_stylesheet_directory_uri() ?>\assets/ComeBebeIMG.png" id="cbi-h">
                <div id="contentsearch-h" >
                <form role="search" method="get" class="woocommerce-product-search" action="http://comes-e-bebes.local/">
	                <label class="screen-reader-text" for="woocommerce-product-search-field-0">Search for:</label>
	                <button type="submit" value="Search" id="lupbut-header"><img src="<?php echo get_stylesheet_directory_uri() ?>\assets/LupIMG.png" id="lpimg-h"></button>
                    <input type="search" id="woocommerce-product-search-field-header" class="search-field" value="" name="s">
	                <input type="hidden" name="post_type" value="product">
                </form>
                </div>         
            </div>
            <div id="right-box-h">
                <button id="bttrqst-h">Faça um pedido</button>
                <img onclick="carrinho()" src="<?php echo get_stylesheet_directory_uri() ?>\assets/CarIMG.png" id="carimg-h" >
                <img src="<?php echo get_stylesheet_directory_uri() ?>\assets/UsuIMG.png" id="usuimg-h">
            </div>
        </div>
        <div id = "modalcarrinho-h">
            <div>
                <p onclick="fecharcar()" id="xprafechar-h">X</p>                
                <h1 id="title-modalcarrinho">CARRINHO</h1>
            </div>
            <div>

            </div>
            <div id="totalbtn-modalcar-h">
                <div id="total-modal-h">
                <p>Total do Carrinho:</p>
                
                </div>
                <button id="btnbuy-mc-h">COMPRAR</button>    
            </div>        
        
        
        
        
        </div>
        <div id = "escmodalcarrinh-h" onclick = "fecharcar()">
        
        </div>
    
    </header>
        
<body <?php body_class(); ?>>


