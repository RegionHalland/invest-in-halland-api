<?php 

if (function_exists('acf_add_local_field_group')) {
    acf_add_local_field_group(array(
    'key' => 'group_5dd3c3707d37a',
    'title' => __('Notiser', 'investinhalland'),
    'fields' => array(
        0 => array(
            'key' => 'field_5dd3c3943c48b',
            'label' => __('Notiser', 'investinhalland'),
            'name' => 'fomo',
            'type' => 'repeater',
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
            'collapsed' => '',
            'min' => 0,
            'max' => 0,
            'layout' => 'table',
            'button_label' => '',
            'sub_fields' => array(
                0 => array(
                    'key' => 'field_5dd3c3a43c48c',
                    'label' => __('Meddelande', 'investinhalland'),
                    'name' => 'fomo_message',
                    'type' => 'wysiwyg',
                    'instructions' => __('Innehåll i meddelandet', 'investinhalland'),
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
                    'tabs' => 'all',
                    'toolbar' => 'basic',
                    'media_upload' => 1,
                    'delay' => 0,
                ),
                1 => array(
                    'key' => 'field_5dd3c42a3c48d',
                    'label' => __('Länk', 'investinhalland'),
                    'name' => 'fomo_url',
                    'type' => 'url',
                    'instructions' => __('Länk för notisen', 'investinhalland'),
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
                ),
            ),
        ),
    ),
    'location' => array(
        0 => array(
            0 => array(
                'param' => 'options_page',
                'operator' => '==',
                'value' => 'acf-options-notiser',
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
    'description' => 'Innehåller fält för notiser på siten.',
));
}