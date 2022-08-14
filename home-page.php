<?php
// Template Name: home
?>
<?php get_header();?>
    <main id="main-home">
        <div id="content-home">

            <div id="titulo-content-home">
                <h2>CONHEÇA NOSSA LOJA</h2>
            </div>

            <div id="texto-pratos-principais">
                <p>Tipos de pratos principais</p>
            </div>

            <?php
                wp_nav_menu(['menu' => 'categorias'])
            ?>
            <div id="texto-pratos-dia">
                <p >Pratos do dia de hoje:</p>
                <?php
                    $dia = dia();
                ?>
                <p class="dia-da-semana"><?php echo "$dia"; ?></p>
            </div>
            
            
            <div id="pratos-dia">
                <?
                    $products = produtos_em_promocao(4);

                    exibir_produtos($products);
                ?>   
            </div>
            <div id="Opcoes">
                <a href="http://projeto-comes-e-bebes.local/shop/"><input type="submit" value="Veja Outras Opçoes"></a>   
            </div>
        </div>
    </main>
<?php get_footer();?>