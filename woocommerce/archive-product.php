<?php get_header(); ?>
<main id="main-all-product">
    <div id="all-product">
        

        <?php 

        $attribute_taxonomies = wc_get_attribute_taxonomies();

        


        echo "<h1>SELECIONE UMA CATEGORIA</h1>";

        wp_nav_menu(['menu' => 'categorias']);
        ?>
        <div id="all-filters-paginação">
            <h2>Pratos</h2>
            <div id="busca">
                <?php get_product_search_form(); ?>
            </div>
            <div id="all-product-ordenacao">
                <div id="preco-filtrado">
                    <form class="filtro_preco" action="<?= $_SERVER['REQUEST_URI']; ?>">
                    <div>
                        <label for="min_price">De R$</label>
                        <input type="text" name="min_price" id="min_price" value="<?= $_GET['min_price']; ?>">
                    </div>
                    <div>
                        <label for="max_price">Até R$</label>
                        <input type="text" name="max_price" id="max_price" value="<?= $_GET['max_price']; ?>">
                    </div>
                        <button type="submit">Filtrar</button>
                    </form>
                </div>
                <div id="ordencao-por"><?php woocommerce_catalog_ordering();?></div>

                
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