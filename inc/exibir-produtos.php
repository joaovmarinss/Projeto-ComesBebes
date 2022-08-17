<?php 
function exibir_produtos($products){
  ?>
  <ul class="lista-produtos">
    <?php foreach($products as $product) { ?>
    <li class="item-produto">
        <div class="info-produto">
          <div class="img-show-produto">
            <?= $product->get_image(); ?>
          </div>

          <div class="purple-background">

            <div class="nome-prato">
              <p><?= $product->get_name(); ?></p>
            </div>

            <div class="conteudo-prato">
              <p class="preco-conteudo"><?= $product->get_price_html(); ?></p>
              <a class="carrinho-link" href="<?= $product->get_permalink(); ?>"> 
                <img class="carrinho-image"  src="<?php echo get_stylesheet_directory_uri()?>/assets/carrinho.png">
              </a>
            </div>

          </div>
 
        </div>
    </li>
    <?php } ?>
  </ul>
  <?php 
}
?>

<?php
function exibir_produto($product){
  ?>  
  <ul class="lista-produtos">
    <li class="item-produto">
        <div class="info-produto">
          <div class="img-show-produto">
            <?= $product->get_image(); ?>
          </div>

          <div class="purple-background">

            <div class="nome-prato">
              <p><?= $product->get_name(); ?></p>
            </div>

            <div class="conteudo-prato">
              <p class="preco-conteudo"><?= $product->get_price_html(); ?></p>
              <a class="carrinho-link" href="<?= $product->get_permalink(); ?>"> 
                <img class="carrinho-image"  src="<?php echo get_stylesheet_directory_uri()?>/assets/carrinho.png">
              </a>
            </div>

          </div>
 
        </div>
    </li>
  </ul>
  <?php 
}

?>

<?php 
function produtos_mais_vendidos($quantidade){
  $args  = [
    'limit' => $quantidade,
    'orderby' => 'date',
    'order' => 'DESC'
  ];
  return wc_get_products($args);
}

// function produtos_em_promocao($quantidade){
//   $args  = [
//     'limit' => $quantidade,
//     'meta_key' => 'total_sales',
//     'orderby' => 'meta_value_num',
//     'order' => 'DESC'
//   ];
//   return wc_get_products($args);
// }


?>