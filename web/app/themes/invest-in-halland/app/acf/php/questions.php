<?php 

if (function_exists('acf_add_local_field_group')) {
    acf_add_local_field_group(array(
    'key' => 'group_5cfe66f4e3ea8',
    'title' => __('Frågor', 'investinhalland'),
    'fields' => array(
        0 => array(
            'key' => 'field_5cfe66fee482e',
            'label' => __('Utvalda frågor', 'investinhalland'),
            'name' => 'featured_questions',
            'type' => 'relationship',
            'instructions' => __('Välj ett antal utvalda frågor. Minst 1 och max 10 stycken.', 'investinhalland'),
            'required' => 0,
            'conditional_logic' => 0,
            'wrapper' => array(
                'width' => '',
                'class' => '',
                'id' => '',
            ),
            'post_type' => array(
                0 => 'question',
            ),
            'taxonomy' => '',
            'filters' => array(
                0 => 'search',
                1 => 'post_type',
                2 => 'taxonomy',
            ),
            'elements' => '',
            'min' => 1,
            'max' => 10,
            'return_format' => 'object',
        ),
    ),
    'location' => array(
        0 => array(
            0 => array(
                'param' => 'options_page',
                'operator' => '==',
                'value' => 'acf-options-utvalda-fragor',
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
    'description' => 'Information kopplat till Frågor och Svar',
));
}