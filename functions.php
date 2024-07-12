<?php

add_theme_support('post-thumbnails');

function tab_periodica_scripts() { 
    wp_enqueue_style('bootstrap-css', 'https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css');
    wp_enqueue_script('bootstrap-js', 'https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js', array('jquery'), null, true);
    wp_enqueue_script('jquery-js', 'https:/code.jquery.com/jquery-3.2.1.min.js');
    wp_enqueue_script('slick', 'https://unpkg.com/slick-carousel@1.6.0/slick/slick.js');
}
add_action('wp_enqueue_scripts', 'tab_periodica_scripts');

function tab_periodica_enqueue_styles() {
    wp_enqueue_style('main-styles', get_stylesheet_uri());
    wp_enqueue_style('tab-periodica_style', get_stylesheet_uri(), array(), filemtime(get_stylesheet_directory() . '/style.css'));
}
add_action('wp_enqueue_scripts', 'tab_periodica_enqueue_styles');

function create_tp_cpt() {

	$labels = array(
		'name'                  => _x( 'Elementos', 'Post Type General Name', 'text_br_domain' ),
		'singular_name'         => _x( 'Elemento', 'Post Type Singular Name', 'text_br_domain' ),
		'menu_name'             => __( 'Elemento', 'text_br_domain' ),
		'name_admin_bar'        => __( 'Elementos', 'text_br_domain' ),
		'archives'              => __( 'Elemento arquivado', 'text_br_domain' ),
		'attributes'            => __( 'Atributos do Elemento', 'text_br_domain' ),
		'parent_item_colon'     => __( 'Item Pai:', 'text_br_domain' ),
		'all_items'             => __( 'Todos os Elementos', 'text_br_domain' ),
		'add_new_item'          => __( 'Adicionar novo Elemento', 'text_br_domain' ),
		'add_new'               => __( 'Adicionar novo Elemento', 'text_br_domain' ),
		'new_item'              => __( 'Novo item', 'text_br_domain' ),
		'edit_item'             => __( 'Editar Elemento', 'text_br_domain' ),
		'update_item'           => __( 'Atualizar Elemento', 'text_br_domain' ),
		'view_item'             => __( 'Visualizar Elemento', 'text_br_domain' ),
		'view_items'            => __( 'Visualizar os Elementos', 'text_br_domain' ),
		'search_items'          => __( 'Buscar Elemento', 'text_br_domain' ),
		'not_found'             => __( 'Nenhum Elemento', 'text_br_domain' ),
		'not_found_in_trash'    => __( 'Não encontrado na lixeira', 'text_br_domain' ),
		'featured_image'        => __( 'Featured Image', 'text_br_domain' ),
		'set_featured_image'    => __( 'Set featured image', 'text_br_domain' ),
		'remove_featured_image' => __( 'Remove featured image', 'text_br_domain' ),
		'use_featured_image'    => __( 'Use as featured image', 'text_br_domain' ),
		'insert_into_item'      => __( 'Insert into item', 'text_br_domain' ),
		'uploaded_to_this_item' => __( 'Uploaded to this item', 'text_br_domain' ),
		'items_list'            => __( 'Items list', 'text_br_domain' ),
		'items_list_navigation' => __( 'Items list navigation', 'text_br_domain' ),
		'filter_items_list'     => __( 'Filter items list', 'text_br_domain' ),
	);
	$args = array(
		'label'                 => __( 'Elemento', 'text_br_domain' ),
		'description'           => __( 'Criar elemento da Tabela Periódica', 'text_br_domain' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'thumbnail', 'custom-fields', 'page-attributes' ),
		'taxonomies'            => array( 'category', 'post_tag' ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 20,
		'menu_icon'             => 'dashicons-heading',
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'page',
	);
	register_post_type( 'Elemento', $args );

}
add_action( 'init', 'create_tp_cpt', 0 );

?>