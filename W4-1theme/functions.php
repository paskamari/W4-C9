<?php

  function custome_theme_init (){

		add_theme_support('post-thumbnails');

		add_theme_support('menus');

		$labels = array(
		    'name' => __('Portfolio'),
		    'singular_name' => __('portfolio'),
		    'add_new' => __('Add New'),
		    'add_new_item' => __('Add New Portfolio'),
		    'edit_item' => __('Edit Portfolio'),
		    'new_item' => __('New Portfolio'),
		    'view_item' => __('View Portfolio'),
		    'search_items' => __('Search Portfolio'),
		    'not_found' =>  __('No Portfolio found'),
		    'not_found_in_trash' => __('No Portfolio found in Trash'),
		    'parent_item_colon' => '',
		    'menu_name' => __('Portfolio')
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
