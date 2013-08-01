<!-- Our Work Section -->
<div id="work" class="page">
  <div class="container">
      <!-- Title Page -->
        <div class="row">
            <div class="span12">
                <div class="title-page">
                    <h2 class="title">Our Work</h2>
                    <h3 class="title-description">Check Out Our Projects on <a href="#">Dribbble</a>.</h3>
                </div>
            </div>
        </div>
        <!-- End Title Page -->
        
        <!-- Portfolio Projects -->
        <div class="row">
          <div class="span3">
              <!-- Filter -->
                <nav id="options" class="work-nav">
                    <ul id="filters" class="option-set" data-option-key="filter">
                      <li class="type-work">Type of Work</li>
                        <li><a href="#filter" data-option-value="*" class="selected">All Projects</a></li>
                        <?php
                          $taxonomies = array('types');
                          $args = array(
                            'orderby' => 'name',
                            'order' => 'ASC',
                            'hide_empty' => True
                          );

                          $all_types = get_terms( $taxonomies, $args );
                          foreach($all_types as $type) {
                            echo "<li><a href=\"#filter\" data-option-value=\".hp_$type->slug\">$type->name</a></li>\n";
                          } 
                        ?>
                    </ul>
                </nav>
                <!-- End Filter -->
            </div>
            
            <div class="span9">
              <div class="row">
                <section id="projects">
                  <ul id="thumbs">

                    <?php 
                      $args = array(
                        'post_type' => 'portfolio',
                        'orderby' => 'name',
                        'order' => 'ASC'
                      );
                      $query = new WP_Query($args);
                      if($query->have_posts()){
                        while($query->have_posts()){
                          $class_name ='';
                          $query->the_post(); 
                          $types = get_the_terms($post->ID,'types');
                          if($types){
                            foreach($types as $type) {
                              $class_name .=" hp_".$type->slug;
                            }
                          }
                    ?>
                    
                    <!-- Item Project and Filter Name -->
                      <li class="item-thumbs span3<?php echo $class_name;?>">
                        <!-- Fancybox - Gallery Enabled - Title - Full Image -->
                        <a class="hover-wrap fancybox" data-fancybox-group="gallery" title="<?php the_title(); ?>" href="<?php echo wp_get_attachment_url( get_post_thumbnail_id( $post->ID ) ); ?>">
                          <span class="overlay-img"></span>
                          <span class="overlay-img-thumb font-icon-plus"></span>

                        </a>
                        <!-- Thumb Image and Description -->
                        <img src="<?php echo wp_get_attachment_url( get_post_thumbnail_id( $post->ID ) ); ?>" alt="<?php the_excerpt(); ?>">
                      </li>
                      <!-- End Item Project -->
                      <?php
                          }
                        }
                      ?>
                  </ul>
                </section>
              </div>
            </div>
        </div>
        <!-- End Portfolio Projects -->
    </div>
</div>
<!-- End Our Work Section -->