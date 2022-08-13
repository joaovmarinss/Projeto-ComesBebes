<?php
// Template Name: home
?>
<?php get_header();?>
    <main id="main-home">
        <div id="content-home">

            <div id="titulo-content-home">
                <h2>CONHEÇA NOSSA LOJA</h2>
            </div>

            <?php
                wp_nav_menu(['menu' => 'categorias'])
            ?>
        </div>
    </main>
<?php get_footer();?>