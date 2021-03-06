<div id="preloader-container">
<div id="container">

<?php 
  dynamic_sidebar('Sidebar Right');
  $args = array(
    'post_type' => 'portfolio',
    'orderby' => 'name',
    'order' => 'ASC'
  );

  $query = new WP_Query($args);


  if($query->have_posts()){
    while($query->have_posts()){
      $class_name ='portfolio';
      $query->the_post();

      $meta = get_post_custom();
      $price = count($meta['price'])>0 ? $meta['price'][0] : 0;

      $types = get_the_terms($post->ID,'type');
      if($types){
        foreach($types as $type) {
          $class_name .= " hp_".$type->slug;
        }
      }
?>
  <div class="widget <?php echo $class_name;?> web homepage">
    <div class="entry-container span4">
    
      <!-- Portfolio Image -->
      <div class="entry-image">
        <a href="<?php echo wp_get_attachment_url( get_post_thumbnail_id( $post->ID ) ); ?>" class="fancybox">
          <span class="entry-image-overlay"></span>
          <?php the_post_thumbnail('medium'); ?>
        </a>
      </div>

      <div class="entry drop-shadow curved ">

        <!-- Portfolio Heading -->
        <h5 class="heading">
          <a href="portfolio-single.html">
            <?php the_title(); ?>
          </a>
        </h5>
        <div class="entry-footer">
          <ul>
            <li class="left">گرافیک</li>
            <li>توسط :<?php the_author() ?></li>
            <li class="right no-margin">Price : <b class="bolding"><?php echo $price; ?></b>$</li>
      
          </ul>
        </div>

        <p><?php the_excerpt(); ?></p>
          
        <div class="stripes"></div>
      </div>      
    </div>
  </div>
<?php
  } //END WHILE
  } //END IF
  wp_reset_postdata();
?>
</div>
</div>
