<?php

function create_posttype() {

    register_post_type( 'maquillaje',
    // CPT Options
        array(
            'labels' => array(
                'name' => __( 'Maquillajes' ),
                'singular_name' => __( 'Maquillaje' ),
                 'add_new_item'       => __( 'Nombre del cliente' ),
                'add_new' => __( 'Nuevo Maquillaje' ),
                'search_items' => __( 'Buscar Maquillaje' ),
            ),
            'menu_icon' => 'dashicons-admin-customizer',
            'menu_position' => '1',
            'public' => true,
            'has_archive' => true,
            'rewrite' => array('slug' => 'maquillaje'),
        )
    );
}
// Hooking up our function to theme setup
add_action( 'init', 'create_posttype' );

function wpb_change_title_text( $title ){
     $screen = get_current_screen();
 
     if  ( 'maquillaje' == $screen->post_type ) {
          $title = 'Ingrese el nombre';
     }
 
     return $title;
}
 
add_filter( 'enter_title_here', 'wpb_change_title_text' );

add_filter( 'manage_edit-maquillaje_columns', 'my_edit_maquillaje_columns' ) ;

function my_edit_maquillaje_columns( $columns ) {

    $columns = array(
        'cb' => '<input type="checkbox" />',
        'title' => __( 'Nombre' ),
        'status' => __( 'Estado' ),
        'fecha' => __( 'Fecha' ),
        'telefono' => __( 'Telefono' ),
    );

    return $columns;
}

add_action( 'manage_maquillaje_posts_custom_column', 'my_manage_maquillaje_columns', 10, 2 );

function my_manage_maquillaje_columns( $column, $post_id ) {
    global $post;

    switch( $column ) {

        /* If displaying the 'duration' column. */
        case 'status' :

            /* Get the post meta. */
            $status = get_post_meta( $post_id, 'estado', true );

            /* If no duration is found, output a default message. */
            if ( empty( $status ) )
                echo __( 'Unknown' );

            /* If there is a duration, append 'minutes' to the text string. */
            else
                printf( __( '%s' ), ucwords(strtolower($status )));

            break;

 case 'fecha' :

            /* Get the post meta. */
            $fecha = get_post_meta( $post_id, 'fecha', true );

            /* If no duration is found, output a default message. */
            if ( empty( $fecha ) )
                echo __( 'Unknown' );

            /* If there is a duration, append 'minutes' to the text string. */
            else
                printf( __( '%s' ), $fecha );

            break;

    case 'telefono' :

            /* Get the post meta. */
            $tel = get_post_meta( $post_id, 'telefono', true );

            /* If no duration is found, output a default message. */
            if ( empty( $tel ) )
                echo __( 'Unknown' );

            /* If there is a duration, append 'minutes' to the text string. */
            else
                printf( __( '%s' ), $tel );

            break;

        default :
            break;
    }
}

// all columns in search
add_filter('posts_join', 'maquillaje_search_join' );
function maquillaje_search_join ($join){
    global $pagenow, $wpdb;
    // I want the filter only when performing a search on edit page of Custom Post Type named "segnalazioni"
    if ( is_admin() && $pagenow=='edit.php' && $_GET['post_type']=='maquillaje' && $_GET['s'] != '') {    
        $join .='LEFT JOIN '.$wpdb->postmeta. ' ON '. $wpdb->posts . '.ID = ' . $wpdb->postmeta . '.post_id ';
    }
    return $join;
}

add_filter( 'posts_where', 'maquillaje_search_where' );
function maquillaje_search_where( $where ){
    global $pagenow, $wpdb;
    // I want the filter only when performing a search on edit page of Custom Post Type named "segnalazioni"
    if ( is_admin() && $pagenow=='edit.php' && $_GET['post_type']=='maquillaje' && $_GET['s'] != '') {
        $where = preg_replace(
       "/\(\s*".$wpdb->posts.".post_title\s+LIKE\s*(\'[^\']+\')\s*\)/",
       "(".$wpdb->posts.".post_title LIKE $1) OR (".$wpdb->postmeta.".meta_value LIKE $1)", $where );
    }
    return $where;
}

// personalizar frase Gracias por crear con WordPress
function modify_footer_admin () {
  echo 'Página realizada por <a href="#">UruGlobal</a>';
}
add_filter('admin_footer_text', 'modify_footer_admin');

//sortable columns
function my_sortable_cake_column( $columns ) {
    $columns['status'] = 'maquillaje';
    $columns['fecha'] = 'maquillaje';
 
    //To make a column 'un-sortable' remove it from the array
    //unset($columns['date']);
 
    return $columns;
}
add_filter( 'manage_edit-maquillaje_sortable_columns', 'my_sortable_cake_column' );