<?php 

if (function_exists('acf_add_local_field_group')) {
    acf_add_local_field_group(array(
    'key' => 'group_5d5e8cad5c856',
    'title' => __('Artikel', 'investinhalland'),
    'fields' => array(
        0 => array(
            'key' => 'field_5d5e8cb1a8095',
            'label' => __('Ingress', 'investinhalland'),
            'name' => 'introduction',
            'type' => 'textarea',
            'instructions' => __('Fyll i en ingress', 'investinhalland'),
            'required' => 1,
            'conditional_logic' => 0,
            'wrapper' => array(
                'width' => '',
                'class' => '',
                'id' => '',
            ),
            'show_in_rest' => 1,
            'edit_in_rest' => 0,
            'default_value' => '',
            'placeholder' => '',
            'maxlength' => '',
            'rows' => '',
            'new_lines' => '',
        ),
    ),
    'location' => array(
        0 => array(
            0 => array(
                'param' => 'block',
                'operator' => '==',
                'value' => 'acf/introduction',
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
    'description' => '',
));
}