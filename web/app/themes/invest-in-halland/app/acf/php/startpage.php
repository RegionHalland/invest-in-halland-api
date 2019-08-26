<?php 

if (function_exists('acf_add_local_field_group')) {
    acf_add_local_field_group(array(
    'key' => 'group_5d526d10f381b',
    'title' => __('Startsida', 'investinhalland'),
    'fields' => array(
        0 => array(
            'key' => 'field_5d526d3361dc8',
            'label' => __('Första delen', 'investinhalland'),
            'name' => 'first_part',
            'type' => 'text',
            'instructions' => __('Ex: Nothing but', 'investinhalland'),
            'required' => 1,
            'conditional_logic' => 0,
            'wrapper' => array(
                'width' => '',
                'class' => '',
                'id' => '',
            ),
            'show_in_rest' => 1,
            'edit_in_rest' => 0,
            'default_value' => __('Nothing but', 'investinhalland'),
            'placeholder' => '',
            'prepend' => '',
            'append' => '',
            'maxlength' => '',
        ),
        1 => array(
            'key' => 'field_5d526d9161dc9',
            'label' => __('Ord', 'investinhalland'),
            'name' => 'words',
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
            'min' => 1,
            'max' => 0,
            'layout' => 'table',
            'button_label' => '',
            'sub_fields' => array(
                0 => array(
                    'key' => 'field_5d526e3561dca',
                    'label' => __('Ord', 'investinhalland'),
                    'name' => 'word',
                    'type' => 'text',
                    'instructions' => __('Ex: opportunities', 'investinhalland'),
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
                    'prepend' => '',
                    'append' => '',
                    'maxlength' => '',
                ),
            ),
        ),
    ),
    'location' => array(
        0 => array(
            0 => array(
                'param' => 'options_page',
                'operator' => '==',
                'value' => 'acf-options-startsida',
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
    'description' => 'Information kopplad till startsidan.',
));
}