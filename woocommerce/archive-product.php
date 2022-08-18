<?php get_header(); ?>
<main id="main-all-product">
    <div id="all-product">
        

        <?php 

        $attribute_taxonomies = wc_get_attribute_taxonomies();

        


        echo "<h1>Categorias</h1>";

        wp_nav_menu(['menu' => 'categorias']);
        ?>
        <div id="all-filters-paginação">
            <h2>Pratos</h2>
            <div id="busca">
            <p>Buscar por Nome:<p\>
            <form role="search" method="get" class="woocommerce-product-search" action="http://comes-e-bebes.local/">
	                <label class="screen-reader-text" for="woocommerce-product-search-field-0">Search for:</label>
                    <input type="search" id="woocommerce-product-search-field-ap" class="search-field" value="" name="s">
	                <input type="hidden" name="post_type" value="product">
                </form>
            </div>
            <div id="all-product-ordenacao">
                <div id="ordencao-por">
                    <p>Ordernar por:</p>
                    <form class="woocommerce-ordering" method="get" id="selectorderf">
                        <select name="orderby" class="orderby" aria-label="Pedido da loja" id="selectorder">
                            <option value="menu_order" selected="selected"></option>
                            <option value="popularity">Ordenar por popularidade</option>
                            <option value="rating">Ordenar por média de classificação</option>
                            <option value="date">Ordenar por mais recente</option>
                            <option value="price">Ordenar por preço: menor para maior</option>
                            <option value="price-desc">Ordenar por preço: maior para menor</option>
                        </select>
                        <input type="hidden" name="paged" value="1">
                    </form>
            
                </div>
                
                <div id="preco-filtrado">
                <p>Filtro de preço:</p>
                <form class="filtro_preco" action="<?= $_SERVER['REQUEST_URI']; ?>" id="preco-filtradof">
                    <div>
                        <label for="min_price">De :</label>
                        <input type="text" name="min_price" id="min_price" value="<?= $_GET['min_price']; ?>" class="insertp">
                    </div>
                    <div>
                        <label for="max_price">Até :</label>
                        <input type="text" name="max_price" id="max_price" value="<?= $_GET['max_price']; ?>" class="insertp">
                    </div>
                    </form>

                </div>

                
            </div>
        </div> 
        <div id="show-all-products">
            <?php
            if(have_posts()){
            while(have_posts()){
                the_post();
                $id = get_the_ID();
                $product = wc_get_product($id);
                exibir_produto($product);
                }
            }
            ?>
        </div>
        <div id="all-product-paginacao">
            <?php echo get_the_posts_pagination();?>
        </div>
       
    </div>
</main>
<?php get_footer(); ?>