<?php

  function custome_theme_init (){

		add_theme_support('post-thumbnails');

		add_theme_support('menus');

		register_sidebar(array(
			'name' => 'Sidebar Right',
			'id' => 'sidebar-r',
			'description' => 'Right panel ...',
			'before_widget' => '<div class="widget portfolio homepage isotope-item %2$s" style="position: absolute; left: 0px; top: 0px; -webkit-transform: translate(22px, 22px);"><div class="entry-container span-full"><div class="entry drop-shadow curved">',
		    'after_widget' => '<br> </p><div class="stripes"></div></div></div></div>',
		    'before_title' => '<h2 class="textcenter oswald">',
		    'after_title' => '</h2><p class="textcenter">'
		));

		$labels = array(
		    'name' => __('Portfolio','WP3e'),
		    'singular_name' => __('portfolio','WP3e'),
		    'add_new' => __('Add New','WP3-1Theme'),
		    'add_new_item' => __('Add New Portfolio','WP3'),
		    'edit_item' => __('Edit Portfolio','WP3e'),
		    'new_item' => __('New Portfolio','WP3e'),
		    'view_item' => __('View Portfolio','WP3e'),
		    'search_items' => __('Search Portfolio','WP3e'),
		    'not_found' =>  __('No Portfolio found','WP3e'),
		    'not_found_in_trash' => __('No Portfolio found in Trash','WP3e'),
		    'parent_item_colon' => '',
		    'menu_name' => __('Portfolio','WP3e')
		);

		$args = array(
		    'labels' => $labels,
		    'public' => true,
		    'publicly_queryable' => true,
		    'show_ui' => true,
		    'show_in_menu' => true,
		    'query_var' => true,
		    'rewrite' => true,
		    'capability_type' => 'post',
		    'has_archive' => true,
		    'hierarchical' => false,
		    'menu_position' => 15,
		    'menu_icon' => get_bloginfo('template_url') . '/images/portfolio_icon.png', // 16x16
		    'supports' => array('title','editor','thumbnail','excerpt','category','custom-fields')
		);

		register_post_type ('portfolio',$args);

		//register_taxonomy_for_object_type('category', 'portfolio');

		register_taxonomy(

			'type',
			'portfolio',
			array(
				'label' => _x( 'Type',"Portfolio taxonomy"),
				'rewrite' => array( 'slug' => 'type' )
			)
		);

	}

	add_action('add_meta_boxes', 'add_custom_box');
	function add_custom_box() {
	  add_meta_box('priceid', 'Price', 'price_box', 'portfolio','side');
	  // add_meta_box($id, $title, $callback, $post_type, $context);
	  // ali.md/wpref/add_meta_box
	}

	function price_box() {
	  $price = 0;
	  if ( isset($_REQUEST['post']) ) {
	    $postID = (int)$_REQUEST['post'];
	    $price = get_post_meta($postID,'portfolio_price',true);
		$sale = get_post_meta($postID,'portfolio_sale',true);
	    // ali.md/wpref/get_post_meta
	    $price = (float) $price;
	  }

	  echo "<label for='portfolio_price'>Portfolio Price</label>";
	  echo "<input id='portfolio_price' class='widefat' name='portfolio_price' size='20' type='text' value='$price'>";
  	  echo "<label for='portfolio_sale'>Portfolio Sale</label>";
  	  echo "<input id='portfolio_sale' class='widefat' name='portfolio_sale' size='20' type='text' value='$sale'>";

	}


	add_action('save_post','save_meta');
	function save_meta($postID) {
	  if ( is_admin() ) {
	    if ( isset($_POST['portfolio_price']) ) {
	      $price = (float) $_POST['portfolio_price'];
	      $sale = (float) $_POST['portfolio_sale'];
	      update_post_meta($postID,'portfolio_price', $price);
	      update_post_meta($postID,'portfolio_sale', $sale);
	      // ali.md/wpref/update_post_meta
	    }
	  }
}

	add_action('init', 'custome_theme_init');
