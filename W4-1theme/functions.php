<?php

  function custome_theme_init (){

		add_theme_support('post-thumbnails');

		add_theme_support('menus');

		$labels = array(
		    'name' => _x('Portfolio', 'post type general name'),
		    'singular_name' => _x('portfolio', 'post type singular name'),
		    'add_new' => _x('Add New', 'portfolio'),
		    'add_new_item' => __('Add New Portfolio'),
		    'edit_item' => __('Edit Portfolio'),
		    'new_item' => __('New Portfolio'),
		    'view_item' => __('View Portfolio'),
		    'search_items' => __('Search Portfolio'),
		    'not_found' =>  __('No Portfolio found'),
		    'not_found_in_trash' => __('No Portfolio found in Trash'),
		    'parent_item_colon' => '',
		    'menu_name' => _x('Portfolio', 'post type general name')
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
		    'supports' => array('title','editor','thumbnail','excerpt','category')
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

	add_action('init', 'custome_theme_init');
