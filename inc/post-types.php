<?php
/**
 * Declare all used post types
 */
function ks_register_post_types(){

    $def_posttype_args = array(

        'labels'             => array(),
        'description'        => '',
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => '',
        'capability_type'    => 'post',
        'has_archive'        => true,
        'hierarchical'       => false,
        'menu_position'      => 4,
        'supports'           => array('title', 'thumbnail', 'editor', 'author', 'excerpt', 'page-attributes' ),
        'show_in_rest'		 => true

    );

    $def_taxonomy_args = array(
        'hierarchical'      => true,
        'labels'            => array(),
        'show_ui'           => true,
        'show_admin_column' => true,
        'query_var'         => true,
        'rewrite'           => '',
        'show_in_rest'		 => true,
        'show_in_quick_edit' => true,
    );

    $posttypes = array(

        'brokers' => array(
            'labels' => array(
                'name'               => __('Brokers'),
                'singular_name'      => __('Broker'),
                'menu_name'          => __('Brokers'),
                'name_admin_bar'     => __('Brokers'),
                'add_new'            => __('Novo Broker'),
                'add_new_item'       => __('Novo Broker'),
                'new_item'           => __('Novo Broker'),
                'edit_item'          => __('Editar Broker'),
                'view_item'          => __('Ver Broker'),
                'all_items'          => __('Brokers'),
                'search_items'       => __('Procurar por Brokers'),
                'parent_item_colon'  => __('Brokers pai:'),
                'not_found'          => __('Nenhum Broker encontrado.'),
                'not_found_in_trash' => __('Nenhum Broker encontrado na lixeira.')
            ),
            'menu_icon' => 'dashicons-store',
            'description' => __('Brokers'),
            'rest_base' =>'custom/brokers',
            'has_archive' => 'biblioteca/brokers',
            'rewrite'     => [
                'slug' => 'brokers',
            ],
            'supports'    => array('title', 'editor', 'thumbnail'),
            'show_in_rest' => false,  // @info inherited from old version

            'taxonomy'    => array(

                'brokers_categories' => array(

                    'hierarchical'      => true,
                    'labels'            => array(
                        'name'              => __('Categorias'),
                        'singular_name'     => __('Categoria'),
                        'search_items'      => __('Procurar por categoria' ),
                        'all_items'         => __('Categorias' ),
                        'parent_item'       => __('Categoria Pai' ),
                        'parent_item_colon' => __('Categorias Pai:' ),
                        'edit_item'         => __('Editar Categoria' ),
                        'update_item'       => __('Atualizar Categoria' ),
                        'add_new_item'      => __('Nova Categoria' ),
                        'new_item_name'     => __('Nova Categoria' ),
                        'menu_name'         => __('Categorias' ),
                    ),

                    'show_ui'           => true,
                    'show_admin_column' => true,
                    'query_var'         => true,
					'rewrite'           => array('slug' => 'brokers/categorias'),
					'show_in_rest'      => true,
                    'rest_base'         => 'brokers_categories'

                ),

            ),
        ),

        'vagas' => array(
            'labels' => array(
                'name'               => __('Vagas'),
                'singular_name'      => __('Vaga'),
                'menu_name'          => __('Vagas'),
                'name_admin_bar'     => __('Vagas'),
                'add_new'            => __('Nova Vaga'),
                'add_new_item'       => __('Nova Vaga'),
                'new_item'           => __('Nova Vaga'),
                'edit_item'          => __('Editar Vaga'),
                'view_item'          => __('Ver Vaga'),
                'all_items'          => __('Vagas'),
                'search_items'       => __('Procurar por Vagas'),
                'parent_item_colon'  => __('Vagas pai:'),
                'not_found'          => __('Nenhum Vaga encontrado.'),
                'not_found_in_trash' => __('Nenhum Vaga encontrado na lixeira.')
            ),
            'menu_icon' => 'dashicons-tag',
            'description' => __('Vagas'),
            'rest_base' =>'custom/vagas',
            'has_archive' => 'biblioteca/vagas',
            'rewrite'     => [
                'slug' => 'vagas',
            ],
            'supports'    => array('title', 'editor', 'thumbnail'),
            'show_in_rest' => false,  // @info inherited from old version

            'taxonomy'    => array(

                'vagas_categories' => array(

                    'hierarchical'      => true,
                    'labels'            => array(
                        'name'              => __('Categorias vagas'),
                        'singular_name'     => __('Categoria vaga'),
                        'search_items'      => __('Procurar por categoria' ),
                        'all_items'         => __('Categorias vagas' ),
                        'parent_item'       => __('Categoria Pai' ),
                        'parent_item_colon' => __('Categorias vagas Pai:' ),
                        'edit_item'         => __('Editar Categoria' ),
                        'update_item'       => __('Atualizar Categoria' ),
                        'add_new_item'      => __('Nova Categoria' ),
                        'new_item_name'     => __('Nova Categoria' ),
                        'menu_name'         => __('Categorias vagas' ),
                    ),

                    'show_ui'           => true,
                    'show_admin_column' => true,
                    'query_var'         => true,
					'rewrite'           => array('slug' => 'vagas/categorias'),
					'show_in_rest'      => true,
                    'rest_base'         => 'vagas_categories'

                ),

            ),
        ),

    );

    foreach ($posttypes as $posttype => $options) {

        $args = array_merge($def_posttype_args, $options);

        if(isset($args['taxonomy'])){

            $taxonomies = $args['taxonomy'];

            foreach($taxonomies as $taxonomy => $taxonomy_args){

                $taxonomy_args = array_merge($def_taxonomy_args, $taxonomy_args);

                register_taxonomy($taxonomy, array($posttype), $taxonomy_args);

            }

            unset($args['taxonomy']);

        }

        register_post_type($posttype, $args);

    }

}

add_action('init', 'ks_register_post_types', 10 );

/**
 * Change Native Posts labels
 */
function ks_change_post_label() {

    global $menu;
	global $submenu;

    $menu[5][0] = 'Notícias';
    $submenu['edit.php'][5][0] = 'Notícias';
    $submenu['edit.php'][10][0] = 'Adicionar Notícia';

}

add_action( 'admin_menu', 'ks_change_post_label' );

function ks_change_post_object() {

	global $wp_post_types;

    $labels = &$wp_post_types['post']->labels;
    $labels->name = 'Notícias';
    $labels->singular_name = 'Notícias';
	$labels->menu_name = 'Notícias';
	$labels->name_admin_bar = 'Notícias';
    $labels->add_new = 'Nova Notícia';
    $labels->add_new_item = 'Nova Notícia';
    $labels->new_item = 'Nova Notícia';
    $labels->edit_item = 'Editar Notícia';
    $labels->view_item = 'Ver Notícia';
    $labels->all_items = 'Notícias';
	$labels->search_items = 'Procurar Notícias';
	$labels->parent_item_colon = 'Notícias pai:';
    $labels->not_found = 'Nenhuma Notícia encontrada';
	$labels->not_found_in_trash = 'Nenhuma Notícia encontrada na lixeira';

}

add_action( 'init', 'ks_change_post_object' );
