<?php 

if (function_exists('acf_add_local_field_group')) {
    acf_add_local_field_group(array(
    'key' => 'group_5d517bb2d658f',
    'title' => __('Ansvarig kontaktperson', 'investinhalland'),
    'fields' => array(
        0 => array(
            'key' => 'field_5d517bb771954',
            'label' => __('Rubrik', 'investinhalland'),
            'name' => 'title',
            'type' => 'text',
            'instructions' => __('Ex: Vill du veta mer om hur det är att starta företag i Halland?', 'investinhalland'),
            'required' => 0,
            'conditional_logic' => 0,
            'wrapper' => array(
                'width' => '',
                'class' => '',
                'id' => '',
            ),
            'show_in_rest' => 0,
            'edit_in_rest' => 0,
            'default_value' => '',
            'placeholder' => '',
            'prepend' => '',
            'append' => '',
            'maxlength' => '',
        ),
        1 => array(
            'key' => 'field_5d517c0f71955',
            'label' => __('Kontaktperson', 'investinhalland'),
            'name' => 'contact',
            'type' => 'post_object',
            'instructions' => '',
            'required' => 0,
            'conditional_logic' => 0,
            'wrapper' => array(
                'width' => '',
                'class' => '',
                'id' => '',
            ),
            'show_in_rest' => 0,
            'edit_in_rest' => 0,
            'post_type' => array(
                0 => 'contact',
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
                'param' => 'post_type',
                'operator' => '==',
                'value' => 'company_story',
            ),
        ),
        1 => array(
            0 => array(
                'param' => 'post_type',
                'operator' => '==',
                'value' => 'opportunity',
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
    'description' => 'Utvald kontaktperson för en artikel.',
));
}