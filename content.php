<div id="preloader-container">

<div id="container">

<?php
  $args = array(
		'post_type' => 'post',
		'nopaging' => 'true',
		'orderby' => 'modified',
		'order' => 'ASC',
	);

	$query = new WP_Query($args);

	if($query->have_posts()){
		while($query->have_posts()){
			$query->the_post();
					
?>
<div class="widget portfolio web homepage">
    <div class="entry-container span4">
    
	<!-- Portfolio Image -->
	<div class="entry-image">
		<a href="<?php echo wp_get_attachment_url( get_post_thumbnail_id( $post->ID ) ); ?>" class="fancybox">
	  	<span class="entry-image-overlay"></span>
	 	<img width="300" height="225" src="<?php echo wp_get_attachment_url( get_post_thumbnail_id( $post->ID ) ); ?>" class="attachment-medium wp-post-image" alt="playmakers_zidane" />        </a>
	</div>
        

	<div class="entry drop-shadow curved ">
		<?php
			echo '<h1>'.get_the_title().'</h1>';

		?>
		<p>
			<?php the_content(); ?>
			<?php the_category() ?><br />
		</p>
		
	 <div class="entry-footer">
		 	<ul>
		 		<li class="left">دقایقی پیش</li>
		 		<li>توسط :<?php the_author() ?></li>
		 		<li class="right no-margin"><div class="icon comment"></div> 3</li>
		 		<li class="right"><div class="icon like"></div> 3</li>
		 	</ul>
		 </div>
		 	
		 <div class="stripes"></div>
	</div>

	<?php
			}
		}
		wp_reset_postdata();
	?>

</div>
</div>
</div>
</div>
