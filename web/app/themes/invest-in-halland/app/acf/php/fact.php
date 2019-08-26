<?php 

if (function_exists('acf_add_local_field_group')) {
    acf_add_local_field_group(array(
    'key' => 'group_5d1ca39e510b8',
    'title' => __('Fakta', 'investinhalland'),
    'fields' => array(
        0 => array(
            'key' => 'field_5d1cb4200a5c3',
            'label' => __('Fakta', 'investinhalland'),
            'name' => 'fact',
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
            'edit_in_rest' => 1,
            'post_type' => array(
                0 => 'fact',
            ),
            'taxonomy' => '',
            'allow_null' => 0,
            'multiple' => 0,
            'return_format' => 'object',
            'ui' => 1,
        ),
    ),
    'location' => array(
        0 => array(
            0 => array(
                'param' => 'block',
                'operator' => '==',
                'value' => 'acf/fact',
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
    'description' => 'Fakta om Halland som är utvald att visas i en artikel.',
));
}