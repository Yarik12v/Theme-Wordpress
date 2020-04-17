<?php

/* ================== Add Action =================== */
add_action('wp_print_styles', 'theme_style');
add_action('wp_print_scripts', 'theme_script');
add_action('after_setup_theme', 'theme_register_nav_menu');
add_action('init', 'register_post_types');


/* ================== Style =================== */
function theme_style(){
    wp_enqueue_style(
        'main-style',
        get_template_directory_uri() . '/dist/css/main.min.css'
    );
    wp_enqueue_style(
        'slick-slider', 
        'https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.css'
    );
}

/* ================== Script =================== */
function theme_script(){
    wp_enqueue_script(
        'main',
        get_template_directory_uri() . '/dist/js/app.min.js',
        array('jquery'),
        NULL,
        true
    );
	wp_enqueue_script(
        'slick-slider',
        'https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.js',
        array('jquery'),
        NULL,
        true
	);
};

/* ================== Menu =================== */
function theme_register_nav_menu(){
    register_nav_menus(array(
        'header' => esc_html__('header-menu', 'Header Menu'),
        'footer' => esc_html__('footer-menu', 'Footer Menu'),
    ));
}

/* ================== New Post Type =================== */
function register_post_types(){
    register_post_type('book', array(
        'labels' => array(
            'name' => 'Книги',
            'singular_name' => 'Книга',
            'add_new' => 'Добавить новую',
            'add_new_item' => 'Добавить новую книгу',
            'edit_item' => 'Редактировать книгу',
            'new_item' => 'Новая книга',
            'view_item' => 'Посмотреть книгу',
            'search_items' => 'Найти книгу',
            'not_found' => 'Книг не найдено',
            'not_found_in_trash' => 'В корзине книг не найдено',
            'parent_item_colon' => '',
            'menu_name' => 'Книги'
        ),
        'public' => true,
        'publicly_queryable' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'query_var' => true,
        'rewrite' => true,
        'capability_type' => 'post',
        'has_archive' => true,
        'hierarchical' => false,
        'menu_position' => null,
        'menu_icon' => 'dashicons-groups',
        'supports' => array('title', 'editor', 'author', 'thumbnail', 'excerpt')
    ));
}

/* ================== ACF Theme Settings =================== */
if( function_exists('acf_add_options_page') ) {
	
	acf_add_options_page(array(
		'page_title' 	=> 'Theme Settings',
		'menu_title'	=> 'Theme Settings',
		'menu_slug' 	=> 'options',
		'capability'	=> 'edit_posts',
		'redirect'		=> false
	));
		
}