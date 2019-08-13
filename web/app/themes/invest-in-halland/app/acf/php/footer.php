<?php 

if (function_exists('acf_add_local_field_group')) {
    acf_add_local_field_group(array(
    'key' => 'group_5d0774abdb08a',
    'title' => __('Sidfot', 'investinhalland'),
    'fields' => array(
        0 => array(
            'key' => 'field_5d0774b38dfb1',
            'label' => __('Beskrivning', 'investinhalland'),
            'name' => 'description',
            'type' => 'wysiwyg',
            'instructions' => __('Text under logotypen i sidfoten', 'investinhalland'),
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
            'tabs' => 'visual',
            'toolbar' => 'basic',
            'media_upload' => 1,
            'delay' => 0,
        ),
    ),
    'location' => array(
        0 => array(
            0 => array(
                'param' => 'options_page',
                'operator' => '==',
                'value' => 'acf-options-sidfot',
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
    'description' => 'Information kopplat till sidfoten.',
));
}