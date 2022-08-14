<?php
// Template Name: home
?>
<?php get_header();?>
    <main id="main-home">
        <div id="content-home">

            <div id="titulo-content-home">
                <h2>CONHEÇA NOSSA LOJA</h2>
            </div>

            <div id="texto-">
                
            </div>
            <?php
                wp_nav_menu(['menu' => 'categorias'])
            ?>
            <div id="texto-pratos-dia">
                <p >Pratos do dia de hoje:</p>
                <?php
                    $diasdasemana = array (1 => "Segunda-Feira",2 => "Terça-Feira",3 => "Quarta-Feira",4 => "Quinta-Feira",5 => "Sexta-Feira",6 => "Sábado",0 => "Domingo");
                    $hoje = getdate();
                    $diadasemana = $hoje["wday"];
                    $nomediadasemana = $diasdasemana[$diadasemana];
                ?>
                <p class="dia-da-semana"><?php echo "$nomediadasemana"; ?></p>
            </div>
        </div>
    </main>
<?php get_footer();?>