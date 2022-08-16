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
    <div id="all-visite-loja">
                <div id="visite-loja">
                    <div id="text-visite-loja">
                        <h2>VISITE A NOSSA LOJA FÍSICA</h2>
                    </div>
                    <div id="content-visite-loja">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d14700.760673396595!2d-43.1333917!3d-22.9063556!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xb39c7c0639fbc9e8!2sIN%20Junior%20-%20Empresa%20Junior%20de%20Computa%C3%A7%C3%A3o%20da%20UFF!5e0!3m2!1spt-BR!2sbr!4v1659217850287!5m2!1spt-BR!2sbr" width="250" height="175" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                        
                        <div class="img-palavras">
                            <img class="espacamento" src="<?php echo get_stylesheet_directory_uri()?>/assets/talheres.png">
                            <p>Rua lorem ipsum, 123, LI, Brasil</p>
                        </div>

                        <div class="img-palavras">
                            <img class="espacamento" src="<?php echo get_stylesheet_directory_uri()?>/assets/telefone.png">
                            <p>(XX) XXXX-XXXX</p>
                        </div>
                    </div>
                </div>
            </div>
<?php get_footer();?>