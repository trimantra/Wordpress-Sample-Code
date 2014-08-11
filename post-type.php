<?php

// We have to register post type in functions.php file.

// register_post_type -> is used to register post type.
/* 
    Usage ->  register_post_type( $post_type, $args );
    HERE,
    $post_type : (string) (required) Post type. (max. 20 characters, can not contain capital letters or spaces)
                 Default: None 
    $args      : (array) (optional) An array of arguments.
                 Default: None
                 
   Return Value : (object | WP_Error) 
                  The registered post type object, or an error object.                  
*/


// Register 'slider' post type
function theme_slider_post_type() {
          $labels = array(
                'name'                  => 'Slider',                        //general name for the post type.
                'singular_name'         => 'Slider',                        //name for one object of this post type.
                'add_new'               => 'Add New',                       //the add new text.
                'add_new_item'          => 'Add New Slide',                 //the add new item text.
                'edit_item'             => 'Edit Slide',                    //the edit item text.
                'new_item'              => 'New Slide',                     //the new item text.
                'all_items'             => 'All Slides',                    // the all items text used in the menu.
                'view_item'             => 'View Slide',                    //the view item text.
                'search_items'          => 'Search Slide',                  //the search items text.
                'not_found'             => 'No Slides found',               //the not found text.
                'not_found_in_trash'    => 'No Slides found in Trash',      //the not found in trash text.
                'parent_item_colon'     => '',                              //the parent text.
                'menu_name'             => 'Slider'                         //the menu name text.
          );

          $args = array(
                'labels'                => $labels,                         //(array) (optional) labels - An array of labels for this post type.
                'public'                => true,                            //(boolean) (optional) Whether a post type is intended to be used publicly either via the admin interface or by front-end users. Default: false 
                'exclude_from_search'   => false,                           //(boolean) (importance) Whether to exclude posts with this post type from front end search results.Default: value of the opposite of public argument 
                'publicly_queryable'    => true,                            //(boolean) (optional) Whether queries can be performed on the front end as part of parse_request().Default: value of public argument 
                'show_ui'               => true,                            //(boolean) (optional) Whether to generate a default UI for managing this post type in the admin.Default: value of public argument 
                'show_in_nav_menus'     => true,                            //(boolean) (optional) Whether post_type is available for selection in navigation menus.Default: value of public argument 
                'show_in_menu'          => true,                            //(boolean or string) (optional) Where to show the post type in the admin menu. show_ui must be true.Default: value of show_ui argument 
                'show_in_admin_bar'     => true,                            //(boolean) (optional) Whether to make this post type available in the WordPress admin bar.Default: value of the show_in_menu argument 
                'query_var'             => true,                            //(boolean or string) (optional) Sets the query_var key for this post type.Default: true - set to $post_type 
                'rewrite'               => array( 
                                            'slug' => 'slider' 
                                            ),                              //(boolean or array) (optional) Triggers the handling of rewrites for this post type. To prevent rewrites, set to false.Default: true and use $post_type as slug 
                'capability_type'       => 'post',                          //(string or array) (optional) The string to use to build the read, edit, and delete capabilities. 
                'capabilities'          => '',                              //(array) (optional) An array of the capabilities for this post type.Default: capability_type is used to construct  
                'map_meta_cap'          => '',                              //(boolean) (optional) Whether to use the internal default meta capability handling.Default: null 
                'has_archive'           => true,                            //(boolean or string) (optional) Enables post type archives. Will use $post_type as archive slug by default.Default: false 
                'hierarchical'          => false,                           //(boolean) (optional) Whether the post type is hierarchical (e.g. page).Default: false 
                'menu_position'         => 6,                               //(integer) (optional) The position in the menu order the post type should appear. show_in_menu must be true.Default: null - defaults to below Comments 
                'menu_icon'             => null,                            //(string) (optional) The url to the icon to be used for this menu or the name of the icon from the iconfont.Default: null - defaults to the posts icon 
                'supports'              => array(                           
                                            'title', 
                                            'editor', 
                                            'author', 
                                            'thumbnail' 
                                            ),                               //(array/boolean) (optional) An alias for calling add_post_type_support() directly.Default: title and editor 
                'register_meta_box_cb'  => '',                              //(callback ) (optional) Provide a callback function that will be called when setting up the meta boxes for the edit form.Default: None
                'taxonomies'            => '',                              //(array) (optional) An array of registered taxonomies like category or post_tag that will be used with this post type.Default: no taxonomies 
                'can_export'            => true,                              //(boolean) (optional) Can this post_type be exported.Default: true 
          );
          register_post_type( 'slider', $args );     
    }
    add_action( 'init', 'theme_slider_post_type' );
?>