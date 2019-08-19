<?php 

if (function_exists('acf_add_local_field_group')) {
    acf_add_local_field_group(array(
    'key' => 'group_5d5a90b0d7e12',
    'title' => __('Relaterat innehåll', 'investinhalland'),
    'fields' => array(
        0 => array(
            'key' => 'field_5d5a90e679db0',
            'label' => __('Relaterat innehåll', 'investinhalland'),
            'name' => 'related_content',
            'type' => 'repeater',
            'instructions' => '',
            'required' => 0,
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
                    'key' => 'field_5d5a912379db1',
                    'label' => __('Artikel', 'investinhalland'),
                    'name' => 'article',
                    'type' => 'post_object',
                    'instructions' => __('Välj artikel eller fakta som är relaterad till den artikel som du är inne på just nu.', 'investinhalland'),
                    'required' => 0,
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
                        1 => 'opportunity',
                        2 => 'fact',
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