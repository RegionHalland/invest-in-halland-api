<?php 

if (function_exists('acf_add_local_field_group')) {
    acf_add_local_field_group(array(
    'key' => 'group_5df0c72d0cfa3',
    'title' => __('Rubrikmarkering', 'investinhalland'),
    'fields' => array(
        0 => array(
            'key' => 'field_5df0c74ec5ec2',
            'label' => __('Markering', 'investinhalland'),
            'name' => 'highlight',
            'type' => 'text',
            'instructions' => __('Skriv ord som ska markeras i rubriken', 'investinhalland'),
            'required' => 0,
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
            'prepend' => '',
            'append' => '',
            'maxlength' => '',
        ),
    ),
    'location' => array(
        0 => array(
            0 => array(
                'param' => 'post_type',
                'operator' => '==',
                'value' => 'fact',
            ),
        ),
        1 => array(
            0 => array(
                'param' => 'post_type',
                'operator' => '==',
                'value' => 'opportunity',
            ),
        ),
        2 => array(
            0 => array(
                'param' => 'post_type',
                'operator' => '==',
                'value' => 'company_story',
            ),
        ),
    ),
    'menu_order' => -1,
    'position' => 'normal',
    'style' => 'default',
    'label_placement' => 'top',
    'instruction_placement' => 'label',
    'hide_on_screen' => '',
    'active' => true,
    'description' => 'Fält för att markera text i rubriker.',
));
}