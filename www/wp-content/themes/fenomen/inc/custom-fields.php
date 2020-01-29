<?php

    define( 'SETTING_SLUG', 'fenomen-settings' );

    add_action( 'acf/init', 'add_fenomen_settings' );

    function add_fenomen_settings() {
        if ( function_exists( 'acf_add_options_page' ) ) {
	
            acf_add_options_page( array(
                'page_title' 	  => 'Настройки темы Fenomen',
                'menu_title'	  => 'Fenomen',
                'menu_slug' 	  => SETTING_SLUG,
                'capability'	  => 'edit_posts',
                'update_button'   => __( 'Сохранить', 'fenomen' ),
                'updated_message' => __( "Настройки сохранены", 'fenomen' ),
                'icon_url'        => 'dashicons-excerpt-view',
            ));
            
        }
    }

    add_action( 'acf/init', 'fenomen_add_acf_fields_settings' );

    function fenomen_add_acf_fields_settings() {
        if ( function_exists( 'acf_add_local_field_group' ) ) {
            acf_add_local_field_group(array(
                'key'    => 'group_fenomen_settings',
                'title'  => 'Настройки для шаблона Fenomen',
                'fields' => array(
                    array(
                        'key'     => 'field_header_fenomen_phone',
                        'label'   => 'Номер телефона',
                        'name'    => 'header_fenomen_phone',
                        'type'    => 'text',
                        'wrapper' => array(
                            'width' => '50',
                        ),
                    ),
                    array(
                        'key'     => 'field_fenomen_instagram',
                        'label'   => 'Ссылка на Instagram',
                        'name'    => 'fenomen_instagram',
                        'type'    => 'text',
                        'wrapper' => array(
                            'width' => '50',
                        ),
                    ),
                    array(
                        'key'    => 'field_fenomen_head_enquqe_script',
                        'label'  => 'Блок вставки в head',
                        'name'   => 'fenomen_head_enquqe_script',
                        'type'   => 'repeater',
                        'min'    => 0,
                        'max'    => 0,
                        'layout' => 'table',
                        'sub_fields' => array(
                            array(
                                'key'      => 'field_fenomen_head_enquqe_script_name',
                                'label'    => 'Название',
                                'name'     => 'fenomen_head_enquqe_script_name',
                                'type'     => 'text',
                                'required' => 1,
                            ),
                            array(
                                'key'      => 'field_fenomen_head_enquqe_script_area',
                                'label'    => 'Элемент вставки',
                                'name'     => 'fenomen_head_enquqe_script_area',
                                'type'     => 'textarea',
                                'rows'     => 12,
                            ),
                        ),
                    ),
                    array(
                        'key'    => 'field_fenomen_footer_enquqe_script',
                        'label'  => 'Блок вставки в footer',
                        'name'   => 'fenomen_footer_enquqe_script',
                        'type'   => 'repeater',
                        'min'    => 0,
                        'max'    => 0,
                        'layout' => 'table',
                        'sub_fields' => array(
                            array(
                                'key'      => 'field_fenomen_footer_enquqe_script_name',
                                'label'    => 'Название',
                                'name'     => 'fenomen_footer_enquqe_script_name',
                                'type'     => 'text',
                                'required' => 1,
                            ),
                            array(
                                'key'      => 'field_fenomen_footer_enquqe_script_area',
                                'label'    => 'Элемент вставки',
                                'name'     => 'fenomen_footer_enquqe_script_area',
                                'type'     => 'textarea',
                                'rows'     => 12,
                            ),
                        ),
                    ),
                ),
                'location' => array(
                    array(
                        array(
                            'param' => 'options_page',
                            'operator' => '==',
                            'value' => SETTING_SLUG,
                        ),
                    ),
                ),
                'menu_order' => 0,
                'position' => 'normal',
                'style' => 'seamless',
                'label_placement' => 'top',
                'instruction_placement' => 'label',
                'active' => true,
            ));
        }
    }

    add_action( 'wp_head', 'fenomen_add_head_scripts' );
    add_action( 'wp_footer', 'fenomen_add_head_scripts' );
    function fenomen_add_head_scripts() {
        $hook = doing_filter( 'wp_head' ) ? 'head' : 'footer';
        $opt  = get_option( 'options_fenomen_' . $hook . '_enquqe_script' );
        if ( isset( $opt ) && $opt > 0 ) {
            for( $i = 0; $i < $opt; $i++ ) {
                ?>
                    <!-- <?= get_option( 'options_fenomen_' . $hook . '_enquqe_script_' . $i . '_fenomen_' . $hook . '_enquqe_script_name' ) ?> -->
                        <?= get_option( 'options_fenomen_' . $hook . '_enquqe_script_' . $i . '_fenomen_' . $hook . '_enquqe_script_area' ) ?>
                    <!-- end <?= get_option( 'options_fenomen_' . $hook . '_enquqe_script_' . $i . '_fenomen_' . $hook . '_enquqe_script_name' ) ?> -->
                <?php
            }
        }
    }

    add_action( 'admin_print_styles-toplevel_page_' . SETTING_SLUG, 'fenomen_add_code_styles' );
    function fenomen_add_code_styles() {
        $settings = wp_enqueue_code_editor( array( 'type' => 'text/html' ) );

        if ( $settings === false ) return;

        $id = '';
        $count = get_option( 'options_fenomen_head_enquqe_script' );

        if ( $count > 0 ) {
            for ( $i = 0; $i < $count; $i++ ) {
                $id = 'acf-field_fenomen_head_enquqe_script-row-' . $i . '-field_fenomen_head_enquqe_script_area';

                wp_add_inline_script(
                    'code-editor',
                    sprintf( 'jQuery(function(){wp.codeEditor.initialize("%s", %s );} )', $id, wp_json_encode( $settings ) )
                );
                
            }
        }

        $count = get_option( 'options_fenomen_footer_enquqe_script' );
        if ( $count > 0 ) {
            for ( $i = 0; $i < $count; $i++ ) {
                $id = 'acf-field_fenomen_footer_enquqe_script-row-' . $i . '-field_fenomen_footer_enquqe_script_area';

                wp_add_inline_script(
                    'code-editor',
                    sprintf( 'jQuery(function(){wp.codeEditor.initialize("%s", %s );} )', $id, wp_json_encode( $settings ) )
                );
                
            }
        }
    }

?>