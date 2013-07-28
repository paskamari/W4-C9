<?php

  function custome_theme_init (){

		add_theme_support('post-thumbnails');

		add_theme_support('menus');

		$labels = array(
		    'name' => __('Portfolio','W4Project'),
		    'singular_name' => __('portfolio','W4Project'),
		    'add_new' => __('Add New','W4Project'),
		    'add_new_item' => __('Add New Portfolio','W4Project'),
		    'edit_item' => __('Edit Portfolio','W4Project'),
		    'new_item' => __('New Portfolio','W4Project'),
		    'view_item' => __('View Portfolio','W4Project'),
		    'search_items' => __('Search Portfolio','W4Project'),
		    'not_found' =>  __('No Portfolio found','W4Project'),
		    'not_found_in_trash' => __('No Portfolio found in Trash','W4Project'),
		    'parent_item_colon' => '',
		    'menu_name' => __('Portfolio','W4Project')
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
		    'menu_position' => 20,
		    'menu_icon' => get_bloginfo('template_url') . '/_include/img/filter-icon.png', // 16x16
		    'supports' => array('title','editor','thumbnail','excerpt','category')
		);

		register_post_type ('Portfolio',$args);

		//register_taxonomy_for_object_type('category', 'portfolio');

		register_taxonomy (
			'types',
			'portfolio',
			array(
				'labels' => array(
					'name' => __('Types'),
					'singular_name' => __('Types'),
					'menu_name' => __('Type'),
					'all_items' => __('All Types'),
					'edit_item' => __('Edit Type'),
					'view_item' => __('View Type'),
					'update_item' => __('Update Type'),
					'add_new_item' => __('Add New Type','W4Project'),
					'new_item_name' => __('New Type Name'),
					'parent_item' => __('Parent Type'),
					'search_items' => __('Search Types'),
					'popular_items' => __('Popular Types'),
					'parent_item_colon' => __('Popular Types :'),
					'separate_items_with_commas' => __('Separate Types with commas'),
					'add_or_remove_items' => __('Add or remove Type'),
					'choose_from_most_used' => __('Choose from the most used Types'),
					'not_found' => __( 'No Type found.' )
				),
				'public' => true,
				'show_ui' => true,
				'show_in_nav_menus' => true,
				'show_tagcloud' => true,
				'hierarchical' => true,
				'query_var' => 'type',
				'rewrite' => array( 'slug' => 'type' )
			)
		);

	}

	add_action('init', 'custome_theme_init');
	
	add_action('after_setup_theme', 'my_theme_setup');

	function my_theme_setup(){
	    load_theme_textdomain('W4Project', get_template_directory() . '/languages');
	}