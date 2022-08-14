<?php get_header(); ?>

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

<?php 

$attribute_taxonomies = wc_get_attribute_taxonomies();

// Loop por cada um dos atributos
foreach($attribute_taxonomies as $attribute) {
  // Utiliza a função the_widget de WordPress
  // para mostrar o widget já existente de WooCommerce
  the_widget('WC_Widget_Layered_Nav', [
    'title' => $attribute->attribute_label,
    'attribute' => $attribute->attribute_name,
  ]);
}


echo "<h1>Categorias</h1>";

wp_nav_menu(['menu' => 'categorias']);
woocommerce_catalog_ordering();
echo get_the_posts_pagination();
if(have_posts()){
  while(have_posts()){
    the_post();
    $id = get_the_ID();
    $product = wc_get_product($id);
    exibir_produto($product);
    }
}

 ?>

<?php get_footer(); ?>