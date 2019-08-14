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
        1 => array(
            'key' => 'field_5d53b9e8d4137',
            'label' => __('Högerkolumn', 'investinhalland'),
            'name' => 'right_column',
            'type' => 'group',
            'instructions' => __('Högerkolumn i sidfoten', 'investinhalland'),
            'required' => 0,
            'conditional_logic' => 0,
            'wrapper' => array(
                'width' => '',
                'class' => '',
                'id' => '',
            ),
            'show_in_rest' => 0,
            'edit_in_rest' => 0,
            'layout' => 'block',
            'sub_fields' => array(
                0 => array(
                    'key' => 'field_5d53ba79d4139',
                    'label' => __('Titel', 'investinhalland'),
                    'name' => 'title',
                    'type' => 'text',
                    'instructions' => __('Titel för den högra kolumnen i sidfoten, t.ex. "Direktkontakt"', 'investinhalland'),
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
                    'key' => 'field_5d53ba95d413a',
                    'label' => __('Innehåll', 'investinhalland'),
                    'name' => 'content',
                    'type' => 'repeater',
                    'instructions' => __('Innehåll i högerkolumnen i sidfoten', 'investinhalland'),
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
                            'key' => 'field_5d53bb35441f7',
                            'label' => __('Länktext', 'investinhalland'),
                            'name' => 'label',
                            'type' => 'text',
                            'instructions' => __('Länktext som visas för användaren, t.ex. "Aftonbladet"', 'investinhalland'),
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
                            'key' => 'field_5d53badad413c',
                            'label' => __('Länk', 'investinhalland'),
                            'name' => 'url',
                            'type' => 'text',
                            'instructions' => __('URL som länken ska peka till, t.ex. "https://www.aftonbladet.se"', 'investinhalland'),
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
                    ),
                ),
            ),
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