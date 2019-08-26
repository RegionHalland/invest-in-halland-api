<?php 

if (function_exists('acf_add_local_field_group')) {
    acf_add_local_field_group(array(
    'key' => 'group_5d5a90b0d7e12',
    'title' => __('Relaterat innehåll', 'investinhalland'),
    'fields' => array(
        0 => array(
            'key' => 'field_5d5bbbccd09ef',
            'label' => __('Relaterade artiklar', 'investinhalland'),
            'name' => 'related_articles',
            'type' => 'repeater',
            'instructions' => '',
            'required' => 1,
            'conditional_logic' => 0,
            'wrapper' => array(
                'width' => '',
                'class' => '',
                'id' => '',
            ),
            'show_in_rest' => 1,
            'edit_in_rest' => 0,
            'collapsed' => '',
            'min' => 0,
            'max' => 2,
            'layout' => 'table',
            'button_label' => '',
            'sub_fields' => array(
                0 => array(
                    'key' => 'field_5d5bbbebd09f0',
                    'label' => __('Relaterad artikel', 'investinhalland'),
                    'name' => 'related_article',
                    'type' => 'post_object',
                    'instructions' => '',
                    'required' => 1,
                    'conditional_logic' => 0,
                    'wrapper' => array(
                        'width' => '',
                        'class' => '',
                        'id' => '',
                    ),
                    'show_in_rest' => 1,
                    'edit_in_rest' => 0,
                    'post_type' => array(
                        0 => 'company_story',
                        1 => 'fact',
                        2 => 'opportunity',
                    ),
                    'taxonomy' => '',
                    'allow_null' => 0,
                    'multiple' => 0,
                    'return_format' => 'object',
                    'ui' => 1,
                ),
            ),
        ),
    ),
    'location' => array(
        0 => array(
            0 => array(
                'param' => 'post_type',
                'operator' => '==',
                'value' => 'opportunity',
            ),
        ),
        1 => array(
            0 => array(
                'param' => 'post_type',
                'operator' => '==',
                'value' => 'company_story',
            ),
        ),
    ),
    'menu_order' => 0,
    'position' => 'normal',
    'style' => 'default',
    'label_placement' => 'top',
    'instruction_placement' => 'label',
    'hide_on_screen' => '',
    'active' => true,
    'description' => 'Relaterat innehåll läggs här',
));
}