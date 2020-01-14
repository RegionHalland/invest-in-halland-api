<?php 

if (function_exists('acf_add_local_field_group')) {
    acf_add_local_field_group(array(
    'key' => 'group_5e1d8a76d2eb9',
    'title' => __('Faktabakgrund', 'investinhalland'),
    'fields' => array(
        0 => array(
            'key' => 'field_5e1d8a95d543b',
            'label' => __('Faktabakgrund', 'investinhalland'),
            'name' => 'fact_chart',
            'type' => 'select',
            'instructions' => __('Välj vilken typ av diagram som ska visas i bakgrunden av faktakortet', 'investinhalland'),
            'required' => 0,
            'conditional_logic' => 0,
            'wrapper' => array(
                'width' => '',
                'class' => '',
                'id' => '',
            ),
            'show_in_rest' => 0,
            'edit_in_rest' => 0,
            'choices' => array(
                'circle' => __('Cirkeldiagram', 'investinhalland'),
                'bar' => __('Stapeldiagram', 'investinhalland'),
                'line' => __('Linjediagram', 'investinhalland'),
            ),
            'default_value' => array(
                0 => __('circle', 'investinhalland'),
            ),
            'allow_null' => 0,
            'multiple' => 0,
            'ui' => 0,
            'return_format' => 'value',
            'ajax' => 0,
            'placeholder' => '',
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
                'value' => 'company_story',
            ),
        ),
        2 => array(
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
    'description' => 'Fält för att välja bakgrundsdiagram till en faktaruta',
));
}