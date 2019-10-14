<?php 

if (function_exists('acf_add_local_field_group')) {
    acf_add_local_field_group(array(
    'key' => 'group_5d5262b5eac61',
    'title' => __('Kontaktperson', 'investinhalland'),
    'fields' => array(
        0 => array(
            'key' => 'field_5d52716d8b316',
            'label' => __('Bild', 'investinhalland'),
            'name' => 'image',
            'type' => 'image',
            'instructions' => __('BIld på person.', 'investinhalland'),
            'required' => 1,
            'conditional_logic' => 0,
            'wrapper' => array(
                'width' => '',
                'class' => '',
                'id' => '',
            ),
            'show_in_rest' => 1,
            'edit_in_rest' => 0,
            'return_format' => 'array',
            'preview_size' => 'medium',
            'library' => 'all',
            'min_width' => '',
            'min_height' => '',
            'min_size' => '',
            'max_width' => '',
            'max_height' => '',
            'max_size' => '',
            'mime_types' => '',
        ),
        1 => array(
            'key' => 'field_5d5262ba6c49e',
            'label' => __('Företag', 'investinhalland'),
            'name' => 'company',
            'type' => 'text',
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
            'default_value' => '',
            'placeholder' => '',
            'prepend' => '',
            'append' => '',
            'maxlength' => '',
        ),
        2 => array(
            'key' => 'field_5d5262d06c49f',
            'label' => __('E-post', 'investinhalland'),
            'name' => 'email',
            'type' => 'text',
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
            'default_value' => '',
            'placeholder' => '',
            'prepend' => '',
            'append' => '',
            'maxlength' => '',
        ),
        3 => array(
            'key' => 'field_5d5262ea6c4a0',
            'label' => __('Telefonnummer', 'investinhalland'),
            'name' => 'phone',
            'type' => 'text',
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
            'default_value' => '',
            'placeholder' => __('+46', 'investinhalland'),
            'prepend' => '',
            'append' => '',
            'maxlength' => '',
        ),
        4 => array(
            'key' => 'field_5d52631a6c4a1',
            'label' => __('LinkedIn', 'investinhalland'),
            'name' => 'linkedin',
            'type' => 'url',
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
            'default_value' => '',
            'placeholder' => '',
        ),
        5 => array(
            'key' => 'field_5da486637314e',
            'label' => __('Visa på kontaktsida', 'investinhalland'),
            'name' => 'show_on_contact_page',
            'type' => 'true_false',
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
            'message' => __('Visa person på kontaktsida', 'investinhalland'),
            'default_value' => 0,
            'ui' => 0,
            'ui_on_text' => '',
            'ui_off_text' => '',
        ),
    ),
    'location' => array(
        0 => array(
            0 => array(
                'param' => 'post_type',
                'operator' => '==',
                'value' => 'contact',
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
    'description' => 'Information som är kopplad till en kontaktperson.',
));
}